<?php

namespace App\Services\Dashboard\User;

use App\Repositories\Dashboard\User\UserRepository;
use Yajra\DataTables\Facades\DataTables;

class UserService
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        //
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        $users = $this->userRepository->getAll();
        return DataTables::of($users)

            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                return view('dashboard.users.datatables._action', compact('user'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store($request)
    {
        return $this->userRepository->store($request);
    }

    public function update($request, $id)
    {
        $user = $this->userRepository->getUser($id);
        if (!$user) {
            return false;
        }
        $user = $this->userRepository->update($user, $request);
        return $user;
    }

    public function destroy(string $id)
    {
        $user = $this->userRepository->getUser($id);
        if (!$user) {
            return false;
        }
        $user = $this->userRepository->destroy($user);
        return $user;
    }
}
