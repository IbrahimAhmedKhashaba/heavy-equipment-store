<?php

namespace App\Repositories\Dashboard\Product;

use App\Models\Product;
use App\Models\ProductImage;
use App\Utils\ImageManger;

class ProductRepository
{
    private $imageManager;

    public function __construct(ImageManger $imageManager)
    {
        $this->imageManager = $imageManager;
    }
    public function getAll(){
        return Product::latest()->get();
    }

    public function store($request){
        return Product::create($request->except('images'));
    }

    public function getProduct($id){
        return Product::with('images')->findOrFail($id);
    }

    public function update($product , $request){
        return $product->update($request->except('images'));
    }

    public function destroy($product){
        return $product->delete();
    }

    public function getProductImage($request){
        return ProductImage::find($request->key);
    }

    public function deleteProductImage($image){
        $this->imageManager->deleteImageFromLocal('uploads/products/' . $image->file_name);
        return $image->delete();
    }
}
