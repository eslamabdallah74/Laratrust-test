<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
        //Check if the user logged in - Check if the role is manger|user|viewer
        public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('role:admin|manger|user|viewer');
        }

        public function dashboard()
        {
            return view('user.dashboard');
        }
}
