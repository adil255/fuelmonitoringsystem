<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:member');
        $this->middleware('member');
    }

    public function index()
    {
        return view('users.log');
    }
}
