<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function list()
    {
        return User::all();
    }

    public function create(Request $request)
    {
        $user = new User($request->all());
        $user->password = $request->input('password');
        $user->save();

        return $user;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        // $user->delete();

        return true;
    }

    public function role($user_id)
    {
        $role = User::find($user_id)->role();

        return response()->json($role);
    }
}
