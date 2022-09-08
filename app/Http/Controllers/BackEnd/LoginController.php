<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'user') {
                return redirect()->intended('user');
            } elseif ($user->role == 'gardener') {
                return redirect()->intended('gardener');
            } elseif ($user->role == 'designer') {
                return redirect()->intended('designer');
            }
        }
        return view('BackEnd.Auth.Login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('email','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                
                return redirect(route('backend.index'));
            }

        return redirect(route('backend.index'));
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}
