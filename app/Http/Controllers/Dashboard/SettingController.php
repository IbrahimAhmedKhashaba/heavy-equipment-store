<?php

namespace App\Http\Controllers\Dashboard;

use App\Services\Dashboard\Setting\SettingService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingRequest;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    protected $settingService;
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function index()
    {
        return view('dashboard.settings.index');
    }
    public function update(SettingRequest $request, $id)
    {
        $setting = $this->settingService->update($request);
        $setting ? Session::flash('success', __('dashboard.success_msg')) :
            Session::flash('error', __('dashboard.error_msg'));
        return redirect()->back();
    }
}
