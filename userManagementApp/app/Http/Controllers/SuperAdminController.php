<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superAdmin.index'); // Asegúrate de que esta vista exista
    }
}
