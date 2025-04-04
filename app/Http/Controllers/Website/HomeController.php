<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\WebSite\Home\HomeService;

class HomeController extends Controller
{
    private $homeService;
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }
    public function index()
    {
        $sliders = $this->homeService->getSliders();
        $products = $this->homeService->getProducts();
        return view('website.index', compact('products', 'sliders'));
    }
}
