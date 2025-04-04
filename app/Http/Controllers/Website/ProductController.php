<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Services\WebSite\Product\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $products = $this->productService->getProducts();
        return view('website.products',compact('products'));
    }
    public function showProduct($id)
    {
        $product = $this->productService->getProduct($id);
        return view('website.show',compact('product'));
    }
    public function getProductsByCatId($id)
    {
        $products = $this->productService->getProductsByCategoryId($id);
        return view('website.products', compact('products'));
    }
}
