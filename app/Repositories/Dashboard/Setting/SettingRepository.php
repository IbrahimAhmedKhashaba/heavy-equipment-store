<?php

namespace App\Repositories\Dashboard\Setting;

class SettingRepository
{
    public function update($setting , $data){
        return $setting->update($data);
    }
}
