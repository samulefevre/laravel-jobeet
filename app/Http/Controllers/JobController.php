<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function list()
    {
        $jobs = DB::table('jobs')->get();

        return view('job/list', ['jobs' => $jobs]);
    }

    public function show($id)
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
