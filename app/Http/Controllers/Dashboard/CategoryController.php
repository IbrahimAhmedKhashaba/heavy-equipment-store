<?php

namespace App\Http\Controllers\Dashboard;

use App\Services\Dashboard\Category\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        return view('dashboard.categories.index');
    }
    public function getAll()
    {
        return $this->categoryService->getAll();
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->store($request);

        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category dose not created',
            ], 500);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Category created successfully',
            ], 201);
        }
    }
    public function update(CategoryRequest $request, string $id)
    {
        $category = $this->categoryService->update($request, $id);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully',
        ], 200);
    }

    public function destroy(string $id)
    {
        $category = $this->categoryService->destroy($id);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully',
        ], 200);
    }
}
