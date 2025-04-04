<?php

namespace App\Repositories\Dashboard\Catalog;

use App\Models\Catalog;

class CatalogRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCatalog(){
        return Catalog::first();
    }

    public function store($file_name){
        return Catalog::create([
            'file_path' => $file_name,
        ]);
    }
}
