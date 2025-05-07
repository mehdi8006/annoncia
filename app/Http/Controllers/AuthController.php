<?php

namespace App\Http\Controllers;



class AuthController extends Controller
{
    public function showAuthForm()
    {
        return view('auth');
    }
    
}