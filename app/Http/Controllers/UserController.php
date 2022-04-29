<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        //dd('UserController@index');
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        dd('UserController@show', $id);
        //return view('users.index');
    }
}
