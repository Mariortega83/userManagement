<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated($request, $user)
    {
        // Redirigir según el rol del usuario
        if ($user->role == 'superAdmin') {
            return redirect()->route('superAdmin');
        } elseif ($user->role == 'admin') {
            return redirect()->route('admin');
        } elseif ($user->role == 'user') {
            return redirect()->route('user');
        }

        // Si no tiene un rol válido, redirigir a la página de inicio por defecto

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
