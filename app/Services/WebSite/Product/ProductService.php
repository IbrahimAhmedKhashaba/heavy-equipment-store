<?php

namespace App\Services\WebSite\Product;

use App\Repositories\WebSite\Product\ProductRepository;

class ProductService
{
    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        //
        $this->productRepository = $productRepository;
    }

    public function getProducts(){
        return $this->productRepository->getProducts();
    }

    public function getProduct($id){
        return $this->productRepository->getProduct($id);
    }

    public function getProductsByCategoryId($id){
        return $this->productRepository->getProductsByCategoryId($id);
    }
}
