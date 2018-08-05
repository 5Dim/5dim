<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\User;

class PrincipalController extends Controller{
    public function index(){
        return view('principal.index');
    }

    public function configuracion () {
        return view('configuracion');
    }
    public function update()
    {
        $user = Auth::user();
        $emailDup = "";
        $error = false;

        if (!empty(request()->input('name'))) {
            $user->name = request()->input('name');
        }
        if (!empty(request()->input('email')) and request()->input('email') != $user->email) {
            $listUsers = User::all();
            foreach ($listUsers as $user) {
                if ($user->email == request()->input('email')) {
                    $error = true;
                }
            }
            if (!$error) {
                $user->email =  request()->input('email');
            }else{
                $emailDup = "La direccion de email " . request()->input('email') ." ya está en uso";
            }
        }
        if (!empty(request()->input('password')) and request()->input('password') == request()->input('password_confirmation')) {
            $user->password = \Hash::make(request()->input('password'));
        }
        $user->save();

        if ($error) {
            return view('configuracion', compact('emailDup'));
        }else{
            return view('home');
        }
    }
}