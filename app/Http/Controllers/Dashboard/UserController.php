<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index');
    }
    public function getAll()
    {
        $users = User::where('id' , '!=' , auth()->user()->id)->get();
        return DataTables::of($users)

            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                return view('dashboard.users.datatables._action', compact('user'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:400'],
            'email' => ['required', 'string', 'email', 'max:400', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        // dd($user);
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
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:400'],
            'email' => ['required', 'string', 'email', 'max:400', 'unique:users'],
        ];
        if ($request->password) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }
        $request->validate($rules);
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }


        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
        ], 200);
    }

    public function destroy(string $id)
    {
        $category = User::find($id);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found',
            ], 404);
        }

        $category->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully',
        ], 200);
    }
}
