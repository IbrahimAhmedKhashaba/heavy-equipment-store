<?php

namespace App\Services\Dashboard\Setting;

use App\Repositories\Dashboard\Setting\SettingRepository;
use App\Utils\ImageManger;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    private $settingRepository, $imageManager;
    public function __construct(SettingRepository $settingRepository, ImageManger $imageManger)
    {
        //
        $this->settingRepository = $settingRepository;
        $this->imageManager = $imageManger;
    }

    public function update($request)
    {
        $data = $request->all();
        $setting = Cache::get('setting');

        if (array_key_exists('site_logo', $data) && $data['site_logo'] != null) {
            $data['site_logo'] = $this->updateFile('site_logo', $data, $setting);
        }
        if (array_key_exists('about_us_image', $data) && $data['about_us_image'] != null) {
            $data['about_us_image'] = $this->updateFile('about_us_image', $data, $setting);
        }
        if (array_key_exists('site_favicon', $data) && $data['site_favicon'] != null) {
            $data['site_favicon'] = $this->updateFile('site_favicon', $data, $setting);
        }

        return $this->settingRepository->update($setting , $data) ? true : false;
    }

    public function updateFile($key, $data, $setting)
    {
        $this->imageManager->deleteImageFromLocal($setting->$key);
        $file_name = $this->imageManager->uploadSingleImage('/', $data[$key], 'settings');
        return $file_name;
    }
}
