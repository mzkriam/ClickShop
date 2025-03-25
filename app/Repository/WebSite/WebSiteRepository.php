<?php

namespace App\Repository\WebSite;

use App\Interfaces\WebSite\WebSiteRepositoryInterface;
use App\Models\Category;
use App\Models\CategoryTranslation;

class WebSiteRepository implements WebSiteRepositoryInterface
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('welcome', compact('categories'));
    }
}
