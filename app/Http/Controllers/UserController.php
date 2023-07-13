<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        
        return view('dashboard.owners.view', compact('users'));
    }

    public function view(){
        $users = User::latest()->get();
        
        return view('dashboard.users.view', compact('users'));
    }
}
