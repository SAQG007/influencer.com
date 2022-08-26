<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->simplePaginate(10);

        return view('admin.all-users')->with(['users' => $users]);
    }

    public function create()
    {
        $flag = "create";
        $roles = Role::all();
        return view('admin.upsert-user')->with(['flag' => $flag, 'roles' => $roles]);
    }

    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $user->attachRole($request->input('role'));

        return redirect()->route('users.all.show');
    }

    public function edit($id)
    {
        $flag = "edit";
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.upsert-user')->with(['flag' => $flag, 'user' => $user, 'roles' => $roles]);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->detachRole($user->roles[0]->id);
        $user->attachRole($request->input('role'));

        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect()->route('users.all.show');
    }

    public function changeStatus($id)
    {
        $user = User::find($id);

        if($user->status == "active")
        {
            $user->status = "inactive";
        }
        else
        {
            $user->status = "active";
        }

        $user->save();

        return redirect()->back();
    }
}
