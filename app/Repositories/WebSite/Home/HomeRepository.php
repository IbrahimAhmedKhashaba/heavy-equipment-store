<?php

namespace App\Repositories\WebSite\Home;

use App\Models\Product;
use App\Models\Slider;

class HomeRepository
{
    public function getSliders()
    {
        return Slider::all();
    }

    public function getProducts()
    {
        return Product::with('images')->get();
    }
}
