<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Repository\Category\CategoryRepository;
use App\Interfaces\WebSite\WebSiteRepositoryInterface;
use App\Repository\WebSite\WebSiteRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(WebSiteRepositoryInterface::class, WebSiteRepository::class);
    }
    public function boot()
    {
        //
    }
}
