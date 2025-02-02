<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function dashboard()
    {
        return view('user.index'); // Asegúrate de que esta vista exista
    }
    public function index()
    {
        // // Obtener todos los usuarios de la base de datos
        // $users = User::all();

        // // Retornar la vista con los usuarios
        // return view('users.index', compact('users'));
        return view('user.index'); // Asegúrate de que esta vista exista
    
    }
}
