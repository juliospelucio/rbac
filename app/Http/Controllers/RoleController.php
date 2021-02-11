<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     *
     *
     * @return App\Models\Role
     */
    public function list()
    {
        return Role::get();
    }

    public function create(Request $request)
    {
        $role = new Role($request->all());
        $role->save();

        return $role;
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return $role;
    }

    public function edit(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());

        return $role;
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();

        return true;
    }

    public function users($role_id)
    {
        $users = Role::find($role_id)->users;

        return $users;
    }

    public function group($role_id)
    {
        $group = Role::find($role_id)->group;

        return $group;
    }
}
