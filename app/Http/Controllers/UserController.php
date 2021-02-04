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
        return User::get();
    }

    public function create(Request $request)
    {
        $company = new User($request->all());
        $company->password = $request->input('password');
        $company->save();

        return $company;
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
}
