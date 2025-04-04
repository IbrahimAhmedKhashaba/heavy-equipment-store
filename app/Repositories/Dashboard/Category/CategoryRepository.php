<?php

namespace App\Repositories\Dashboard\Category;

use App\Models\Category;

class CategoryRepository
{

    public function getAll()
    {
        return Category::all();
    }

    public function store($request){
        return Category::create([
            'name' => $request->name,
        ]);
    }

    public function getCategory($id){
        return Category::find($id);
    }

    public function update($category , $request){
        $category->name = $request->name;
        $category->save();
        return $category;
    }

    public function destroy($category){
        $category->delete();
        return $category;
    }
}
