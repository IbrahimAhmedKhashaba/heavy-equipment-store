<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slider;
use App\Utils\ImageManger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SliderRequest;
use App\Services\Dashboard\Slider\SliderService;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    private $sliderService;
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    public function index()
    {
        $sliders = $this->sliderService->getAll();
        return view('dashboard.settings.slider',compact('sliders'));
    }
    public function store(SliderRequest $request)
    {
        $this->sliderService->store($request);
        Session::flash('success',__('dashboard.success_msg'));
        return redirect()->back();

    }
    public function deleteImage(Request $request ,$id)
    {
        $image = $this->sliderService->deleteImage($id);
        if(!$image){
            return response()->json([
                'status'=>'error',
                'message'=>__('dashboard.error_msg'),
            ],404);
        }
        return true;
    }
}
