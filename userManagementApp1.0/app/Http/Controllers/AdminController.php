<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function home()
    {
        $users = User::all();

        // Pasar los usuarios a la vista
        return view('admin.index', compact('users'));
    }
}
