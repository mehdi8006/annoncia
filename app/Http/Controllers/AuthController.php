<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use App\Models\Utilisateur;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Show the auth form
    public function showAuthForm()
    {
        return view('auth');
    }
    
    // Process login
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // Attempt to find the user by email
        $user = Utilisateur::where('email', $request->email)->first();
        
        // Check if user exists and password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Store user in session
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->nom);
            Session::put('user_email', $user->email);
            Session::put('user_type', $user->type_utilisateur);
            
            // Set success message
            Session::flash('success', 'Connexion réussie! Bienvenue ' . $user->nom);
            
            // Redirect to home page
            return redirect('/home');
        }
        
        // Authentication failed
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->withInput($request->except('password'));
    }
    
    // Process registration
    public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateurs,email',
            'phone' => 'required|string|min:9|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        // Create new user
        $user = new Utilisateur();
        $user->nom = $request->name;
        $user->email = $request->email;
        $user->telephon = $request->phone;
        $user->password = Hash::make($request->password);
        $user->ville = 'Casablanca'; // Default value, can be updated later
        $user->type_utilisateur = 'normal';
        $user->statut = 'valide';
        $user->save();
        
        // Login the new user
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->nom);
        Session::put('user_email', $user->email);
        Session::put('user_type', $user->type_utilisateur);
        
        // Set success message
        Session::flash('success', 'Inscription réussie! Bienvenue ' . $user->nom);
        
        // Redirect to home page
        return redirect('/home');
    }
    
    // Process password reset request
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $user = Utilisateur::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->withErrors([
                'email' => 'Aucun compte n\'est associé à cette adresse email.',
            ]);
        }
        
        // Generate a password reset token (simplified version)
        $token = Str::random(60);
        
        // In a real application, you would store this token in a database table
        // and send an email with a reset link
        
        Session::flash('success', 'Un lien de réinitialisation a été envoyé à votre adresse email.');
        
        return redirect('/auth');
    }
    
    // Show password reset form
    public function showResetForm()
    {
        return view('components.auth.forgotpwd');
    }
    
    // Process logout
    public function logout()
    {
        // Clear session
        Session::forget(['user_id', 'user_name', 'user_email', 'user_type']);
        
        // Set success message
        Session::flash('success', 'Vous avez été déconnecté avec succès.');
        
        // Redirect to home page
        return redirect('/home');
    }
    
    // Check if user is authenticated
    public static function check()
    {
        return Session::has('user_id');
    }
    
    // Get authenticated user
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
}