<?php

namespace App\Repository\WebSite;

use App\Interfaces\WebSite\WebSiteRepositoryInterface;
use App\Models\Category;

class WebSiteRepository implements WebSiteRepositoryInterface
{
    public function index()
    {
        $categories = Category::all();        
        return view('welcome', compact('categories'));
    }
}