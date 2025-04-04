<?php

namespace App\Services\Dashboard\Catalog;

use App\Models\Catalog;
use App\Repositories\Dashboard\Catalog\CatalogRepository;
use App\Utils\ImageManger;
use Illuminate\Support\Facades\Cache;

class CatalogService
{

    public $imageManger , $catalogRepository;
    public function __construct(ImageManger $imageManger , CatalogRepository $catalogRepository)
    {
        $this->imageManger = $imageManger;
        $this->catalogRepository = $catalogRepository;
    }

    public function store($request){
        $catalog = $this->catalogRepository->getCatalog();
        if($catalog){
            $this->imageManger->deleteImageFromLocal('uploads/settings/'.$catalog->file_path);
            $catalog->delete();
        }
            $file = $request->file('pdf');
            $name = time().'catalog'.rand(1,20).'.pdf';
            $file_name = $file->storeAs('/', $name, ['disk'=>'settings']);

            $catalog = $this->catalogRepository->store($file_name);
            Cache::forget('catalog');
            return $catalog;
    }
}
