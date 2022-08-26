<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::simplePaginate(10);

        return view('admin.all-users')->with(['users' => $users]);
    }

    public function create()
    {
        $flag = "create";
        return view('admin.add-new-user')->with(['flag' => $flag]);
    }
}
