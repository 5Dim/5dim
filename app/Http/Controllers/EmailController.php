<?php

namespace App\Http\Controllers;

use App\Mail\FinDeRonda;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index() // http://homestead.test/panelControl/emailResetRonda
    {
        $users = User::all()->pluck('email');
        Mail::bcc($users)->send(new FinDeRonda());
        return redirect('/');
    }
}
