<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Job;

use Carbon\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::getWithJobs();
        $max_jobs_on_homepage = 10;

        foreach($categories as $category)
        {
            $category->setActiveJobs(Job::getActiveJobs($category->id, $max_jobs_on_homepage));            
        }

        return view('job/index', compact('categories', 'max_jobs_on_homepage'));
    }

    public function list()
    {
        $jobs = DB::table('jobs')->get();

        return view('job/list', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = new Job();
        $categories = Category::get();
        
        return view('job/new', compact('job', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'company' => 'required',
            'url' => 'required',
            'position' => 'required',
            'location' => 'required',
            'description' => 'required',
            'how_to_apply' => 'required',
            'email' => 'required'
        ]);
        
        $job = new Job();
        $job->category_id = $request->get('category_id');
        $job->position = $request->get('position');
        $job->type = $request->get('type');
        $job->location = $request->get('location');        
        $job->is_public = $request->has('is_public') ? 1 : 0;              
        $job->company = $request->get('company');        
        if($request->file('logo')) { $job->logo = $request->file('logo')->store('logos'); }
        $job->url = $request->get('url');
        $job->description = $request->get('description');
        $job->how_to_apply = $request->get('how_to_apply');
        $job->email = $request->get('email');
        $job->save();
 
        return redirect()->route('job.index')->with('status', 'Job created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $company, $location, $position)
    {
        $job = Job::find($id);       

        return view('job/show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        $categories = Category::get();

        return view('job/edit', compact('job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        $job->category_id = $request->get('category_id');
        $job->position = $request->get('position');
        $job->type = $request->get('type');
        $job->location = $request->get('location');
        $job->is_public = $request->has('is_public') ? 1 : 0;        
        $job->company = $request->get('company');
        if($request->file('logo')) { $job->logo = $request->file('logo')->store('logos'); }
        $job->url = $request->get('url');
        $job->description = $request->get('description');
        $job->how_to_apply = $request->get('how_to_apply');
        $job->email = $request->get('email');
        $job->save();
                
        return redirect()->action('JobController@show', [
            'id' => $job->id,
            'company' => str_slug($job->company),
            'location' => str_slug($job->location),            
            'position' => str_slug($job->position)
        ])->with('status', 'Job updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = 'No results found, please try with different keywords.';        
        // Making sure the user entered a keyword.
        if($request->has('query')) {

            // Using the Laravel Scout syntax to search the jobs table.
            $jobs = Job::search($request->get('query'))->where('is_activated', 1)->paginate(20);           

            // If there are results return them, if none, return the error message.
            if($jobs->count()) {
                return view('job/search', compact('q','jobs'));
            } else {
                return redirect()->route('job.index', compact('q'))->with('status', $error);
            }

        }

        // Return the error message if no keywords existed
        return redirect()->route('job.index')->with('status', $error);
        
    }
    
}
