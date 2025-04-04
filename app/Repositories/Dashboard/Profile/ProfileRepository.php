<?php

namespace App\Repositories\Dashboard\Profile;

use App\Models\User;

class ProfileRepository
{
    public function getUser(){
        return User::findOrFail(auth('web')->user()->id);
    }
}
