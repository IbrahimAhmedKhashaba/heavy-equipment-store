<?php

namespace App\Services\Dashboard\Profile;

use App\Repositories\Dashboard\Profile\ProfileRepository;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    private $profileRepository;
    public function __construct(ProfileRepository $profileRepository){
        $this->profileRepository = $profileRepository;
    }
    public function getUser(){
        return $this->profileRepository->getUser();
    }

    public function update($request)
    {
         $user = $this->getUser();

         if(!Hash::check($request->password, $user->password)){
            return false;
         }
         $user->update($request->except(['password' , '_token']));
         return $user;

    }
}
