<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Interfaces\WebSite\WebSiteRepositoryInterface;

class WebSiteController extends Controller
{
    private $webSite;
    public function __construct(WebSiteRepositoryInterface $webSite)
    {
        $this->webSite = $webSite;
    }
    public function index()
    {
        return $this->webSite->index();
    }   
}
