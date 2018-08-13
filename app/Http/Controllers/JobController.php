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
            $category->setMoreJobs(Job::countActiveJobs($category->id) - $max_jobs_on_homepage);
        }

        return view('job/index', ['categories' => $categories]);
    }

    public function list()
    {
        $jobs = DB::table('jobs')->get();

        return view('job/list', ['jobs' => $jobs]);
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
        
        return view('job/new', [
            'job' => $job,          
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->category_id = $request->get('category');
        $job->position = $request->get('position');
        $job->type = $request->get('type');
        $job->location = $request->get('location');        
        $job->is_public = '1';
        $job->is_activated = '1';        
        $job->company = $request->get('company');
        $job->url = $request->get('url');
        if($request->file('logo')) { $job->logo = $request->file('logo')->store('logos'); }
        $job->description = $request->get('description');
        $job->how_to_apply = $request->get('how_to_apply');
        $job->email = $request->get('email');
        $job->save();
 
        return redirect()->route('job.index');
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

        return view('job/show', ['job' => $job]);
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

        return view('job/edit', [
                'job' => $job,
                'categories' => $categories
            ]);
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
        $job->category_id = $request->get('category');
        $job->position = $request->get('position');
        $job->type = $request->get('type');
        $job->location = $request->get('location');
        $job->token = 'token';
        $job->company = $request->get('company');
        if($request->file('logo')) { $job->logo = $request->file('logo')->store('logos'); }
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
}
