<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Services\Dashboard\Product\ProductService;
use App\Utils\ImageManger;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $categories = $this->productService->getCategories();
        return view('dashboard.products.index', compact('categories'));
    }
    public function getAll()
    {
        return $this->productService->getAll();
    }
    public function store(ProductRequest $request)
    {
        $product = $this->productService->store($request);
        $product ? Session::flash('success', __('dashboard.success_msg')) :
            Session::flash('error', __('dashboard.error_msg'));
        return redirect()->back();
    }
    public function edit($id)
    {
        $categories = $this->productService->getCategories();
        $product = $this->productService->getProduct($id);
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = $this->productService->update($request, $id);
        $product ? Session::flash('success', __('dashboard.success_msg')) :
            Session::flash('error', __('dashboard.error_msg'));
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $product = $this->productService->destroy($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.product_not_found'),
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg'),
        ], 200);
    }
    public function deleteImage(Request $request, $id)
    {
        $image = $this->productService->deleteImage($request, $id);
        if (!$image) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg'),
            ], 404);
        }
        return true;
    }
}
