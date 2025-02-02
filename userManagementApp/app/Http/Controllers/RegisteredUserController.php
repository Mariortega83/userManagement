<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    // Crear el usuario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        // Asignar rol dependiendo de si es el primer usuario
        'role' => User::count() === 0 ? 'superAdmin' : 'user',
    ]);

    // Autenticar al usuario después de registrarse
    Auth::login($user);

    return redirect('/index'); // Redirige al lugar que desees
}
}