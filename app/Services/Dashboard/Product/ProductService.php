<?php

namespace App\Services\Dashboard\Product;

use App\Repositories\Dashboard\Product\ProductRepository;
use App\Utils\ImageManger;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductService
{
    protected $imageManager, $productRepository;
    public function __construct(ImageManger $imageManager, ProductRepository $productRepository)
    {
        $this->imageManager = $imageManager;
        $this->productRepository = $productRepository;
    }

    public function getCategories()
    {
        return Cache::get('categories');
    }

    public function getAll()
    {
        $products = $this->productRepository->getAll();
        return DataTables::of($products)
            ->addIndexColumn()
            ->addColumn('name_translated', function ($product) {
                return $product->getTranslation('name', app()->getLocale());
            })
            ->addColumn('description_translated', function ($product) {
                return view('dashboard.products.datatables._description', compact('product'));
            })
            ->addColumn('category_name', function ($product) {
                return $product->category->name;
            })
            ->addColumn('product_images', function ($product) {
                return view('dashboard.products.datatables._images', compact('product'));
            })
            ->addColumn('action', function ($product) {
                return view('dashboard.products.datatables._action', compact('product'));
            })
            ->rawColumns(['product_images', 'action', 'description_translated'])
            ->make(true);
    }

    public function store($request)
    {
        DB::beginTransaction();
        $product = $this->productRepository->store($request);
        try {
            if (!$product) {
                return false;
            }
            if ($request->hasFile('images')) {
                $this->imageManager->uploadImages($request->images, $product, 'products');
            }
            DB::commit();

            Cache::forget('products_count');

            return $product;
        } catch (\Exception $e) {
            DB::rollback();
            return $product;
        }
    }

    public function getProduct($id)
    {
        return $this->productRepository->getProduct($id);
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $product = $this->getProduct($id);
            $result = $this->productRepository->update($product, $request);
            if (!$result) {
                return false;
            }
            if ($request->hasFile('images')) {
                $this->imageManager->uploadImages($request->images, $product, 'products');
            }
            DB::commit();

            Cache::forget('products_count');

            return $result;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function destroy(string $id)
    {
        $product = $this->getProduct($id);
        if (!$product) {
            return $product;
        }

        // delete images from local
        foreach ($product->images as $image) {
            $this->imageManager->deleteImageFromLocal('uploads/products/' . $image->file_name);
        }

        $product = $this->productRepository->destroy($product);

        Cache::forget('products_count');
        return $product;
    }

    public function deleteImage($request, $id)
    {
        $image = $this->productRepository->getProductImage($request);
        if (!$image) {
            return false;
        }
        $image = $this->productRepository->deleteProductImage($image);
        return true;
    }
}
