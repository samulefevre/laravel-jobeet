<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Job;

class CategoryController extends Controller
{
    public function show($slug, $page)
    {        
        $category = Category::where('name', $slug)->first();

        $total_jobs = Job::countActiveJobs($category->id);
        $jobs_per_page = 10;
        $last_page = ceil($total_jobs / $jobs_per_page);
        $previous_page = $page > 1 ? $page - 1 : 1;
        $next_page = $page < $last_page ? $page + 1 : $last_page;

        $category->setActiveJobs(Job::getActiveJobs($category->id, $jobs_per_page, ($page - 1) * $jobs_per_page));
        
        return view('category/show',
        ['category' => $category,
        'last_page' => $last_page,
        'previous_page' => $previous_page,
        'current_page' => $page,
        'next_page' => $next_page,
        'total_jobs' => $total_jobs,
        'feedId' => ''
        ]);
    }
}
