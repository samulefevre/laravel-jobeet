<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Job;

class JobController extends Controller
{
    public function index()
    {
        $categories = Category::getWithJobs();

        foreach($categories as $category)
        {
            $category->setActiveJobs(Job::getActiveJobs($category->id));
            $category->setMoreJobs(Job::countActiveJobs($category->id));
        }

        return view('job/index', ['categories' => $categories]);
    }
    
    public function list()
    {
        $jobs = DB::table('jobs')->get();

        return view('job/list', ['jobs' => $jobs]);
    }

    public function show($company, $location, $id, $position)
    {
        $job = DB::table('jobs')->where('id', $id)->first();        

        return view('job/show', ['job' => $job]);
    }

    public function edit($id)
    {
        $job = DB::table('jobs')->where('id', $id)->first();        

        return view('job/edit', ['job' => $job]);
    }
}
