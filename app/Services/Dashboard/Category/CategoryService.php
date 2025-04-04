<?php

namespace App\Services\Dashboard\Category;

use App\Repositories\Dashboard\Category\CategoryRepository;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class CategoryService
{
    public $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        //
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        $categories = $this->categoryRepository->getAll();
        return DataTables::of($categories)

            ->addIndexColumn()
            ->addColumn('name_translated', function ($category) {
                return $category->getTranslation('name', app()->getLocale());
            })
            ->addColumn('action', function ($category) {
                return view('dashboard.categories.datatables._action', compact('category'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store($request)
    {
        $category = $this->categoryRepository->store($request);
        if ($category) {
            Cache::forget('categories');
            Cache::forget('categories_count');
        }
        return $category;
    }

    public function update($request, $id)
    {
        $category = $this->categoryRepository->getCategory($id);
        if (!$category) {
            return $category;
        }
        $category = $this->categoryRepository->update($category, $request);
        if ($category) {
            Cache::forget('categories');
            Cache::forget('categories_count');
        }
        return $category;
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->getCategory($id);
        if (!$category) {
            return $category;
        }
        $category = $this->categoryRepository->destroy($category);
        if ($category) {
            Cache::forget('categories');
            Cache::forget('categories_count');
        }
        return $category;
    }
}
