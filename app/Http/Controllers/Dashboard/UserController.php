<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserRequest;
use App\Services\Dashboard\User\UserService;


class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('dashboard.users.index');
    }
    public function getAll()
    {
        return $this->userService->getAll();
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->store($request);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User dose not created',
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
        ], 201);
    }
    public function update(UserRequest $request, string $id)
    {
        $user = $this->userService->update($request, $id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
        ], 200);
    }

    public function destroy(string $id)
    {
        $user = $this->destroy($id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully',
        ], 200);
    }
}
