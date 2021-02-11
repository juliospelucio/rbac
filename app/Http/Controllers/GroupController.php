<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
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
        return Group::all();
    }

    public function create(Request $request)
    {
        $group = new Group($request->all());
        $group->password = $request->input('password');
        $group->save();

        return $group;
    }

    public function show($id)
    {
        $group = Group::findOrFail($id);
        return $group;
    }

    public function edit(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $group->update($request->all());

        return $group;
    }

    public function delete($id)
    {
        Group::findOrFail($id)->delete();
        // $group->delete();

        return true;
    }

    public function roles($group_id)
    {
        $roles = Group::find($group_id)->roles;

        return $roles;
    }
}
