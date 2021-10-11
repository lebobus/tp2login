<?php

namespace App\Http\Controllers;

use App\Models\Etudiants;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) return redirect('/')->withSuccess('Vous êtes déjà connecté.');

        return view('auth.login');
    }

    public function loginPost(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $sessionData = [
                'username' => $request->email,
                'logged_in' => true,
                'etudiant_id' => DB::table('etudiants')->select('id')->where('etudiant_email', $request->email)->get()
            ];

            foreach ($sessionData as $key => $val) {
                session()->put($key, $val);
            }

            return redirect('/')->withSuccess("Connecté en tant que $request->email");
        } else {
            return redirect('/login')->withSuccess('Authentification invalide.');
        }
    }
    
    public function register() {
        return view('auth.register');
        
    }
    
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Etudiants::create([
            'etudiant_nom' => $request->name,
            'etudiant_adresse' => $request->adresse,
            'etudiant_phone' => $request->phone,
            'etudiant_email' => $request->email,
            'etudiant_dateNaissance' => $request->naissance,
            'ville_id' => 1
        ]);
        
        return redirect('/')->withSuccess('Vous avez été enregistré.');
    }
    
    public function logout() {
        session()->flush();
        Auth::logout();
    
        return redirect('/')->withSuccess('Vous avez été déconnecté.');
    }
}
