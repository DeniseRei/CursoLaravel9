<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //dd('UserController@index');
        return view('users.index');
    }

    public function show($id)
    {
        dd('UserController@show', $id);
        //return view('users.index');
    }
}
