<?php

namespace App\Repositories\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function getAll(){
        return User::where('id' , '!=' , auth('web')->id())->get();
    }

    public function store($request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    public function getUser($id){
        return User::find($id);
    }

    public function update($user , $request){
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        return $user->save();
    }

    public function destroy($user){
        return $user->delete();
    }
}
