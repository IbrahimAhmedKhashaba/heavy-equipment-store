<?php

namespace App\Repositories\WebSite\Product;

use App\Models\Product;

class ProductRepository
{
    public function getProducts(){
        return Product::with('images')->get();
    }

    public function getProduct($id){
        return Product::with('images')->find($id);
    }

    public function getProductsByCategoryId($id){
        return Product::with('images')->where('category_id', $id)->get();
    }
}
