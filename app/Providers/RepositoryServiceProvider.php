<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Repository\Category\CategoryRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }
    public function boot()
    {
        //
    }
}
