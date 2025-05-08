<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class AuthHelper
{
    public static function check()
    {
        return Session::has('user_id');
    }
    
    public static function user()
    {
        if (Session::has('user_id')) {
            return (object) [
                'id' => Session::get('user_id'),
                'nom' => Session::get('user_name'),
                'email' => Session::get('user_email'),
                'type_utilisateur' => Session::get('user_type'),
            ];
        }
        
        return null;
    }
    
    public static function id()
    {
        return Session::get('user_id');
    }
    
    public static function isAdmin()
    {
        return Session::get('user_type') === 'admin';
    }
}