<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Job;

class CategoryController extends Controller
{
    public function show(Request $request, $id, $slug)
    {        
        $jobs_per_page = 20;

        $category = Category::where('name', $slug)->first();
        $category->setActiveJobs(Job::getActiveJobs($category->id, $jobs_per_page));

        if($request->query('_format') == 'atom') {
            return view('category/feed', compact('category'));
        }
        
        return view('category/show', compact('category'));
    }
}
