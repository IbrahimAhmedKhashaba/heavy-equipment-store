<?php

namespace App\Repositories\Dashboard\Slider;

use App\Models\Slider;

class SliderSRepository
{
    public function getAll(){
        return $sliders = Slider::all();
    }

    public function store($file_name){
        return Slider::create([
            'file_name'=>$file_name,
        ]);
    }

    public function getSlider($id){
        return Slider::find($id);
    }

    public function destroy($slider){
        return $slider->delete();
    }
}
