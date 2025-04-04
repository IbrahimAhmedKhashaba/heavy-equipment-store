<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Services\Dashboard\Profile\ProfileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    private $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    public function index()
    {
        return view('dashboard.profile.index');
    }
    public function update(ProfileRequest $request, $id)
    {
        $user = $this->profileService->update($request);

        $user ? Session::flash('success', __('dashboard.success_msg')) :
            Session::flash('error', __('dashboard.credentials_not_match'));
        return redirect()->back();
    }
}
