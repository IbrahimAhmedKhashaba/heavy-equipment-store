<?php

namespace App\Services\Dashboard\Slider;

use App\Repositories\Dashboard\Slider\SliderSRepository;
use App\Utils\ImageManger;

class SliderService
{
    protected $imageManager, $sliderSRepository;
    public function __construct(ImageManger $imageManager, SliderSRepository $sliderSRepository)
    {
        $this->imageManager = $imageManager;
        $this->sliderSRepository = $sliderSRepository;
    }

    public function getAll()
    {
        return $this->sliderSRepository->getAll();
    }

    public function store($request)
    {
        foreach ($request->images as $image) {
            $file_name = $this->imageManager->uploadSingleImage('/', $image, 'sliders');
            $this->sliderSRepository->store($file_name);
        }
        return true;
    }

    public function deleteImage($id)
    {
        $image = $this->sliderSRepository->getSlider($id);
        if (!$image) {
            return false;
        }
        $img = $this->sliderSRepository->destroy($image);
        $this->imageManager->deleteImageFromLocal('uploads/sliders/' . $image->file_name);
        return $img ? true : false;
    }
}
