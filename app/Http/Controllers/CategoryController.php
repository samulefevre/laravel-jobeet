<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Category;

class CategoryController extends Controller
{
    public function show($slug, $page)
    {
        $category = Category::where('name', $slug)->first();
        
        return view('category/show', ['category' => $category, 'page' => $page]);
    }
}
