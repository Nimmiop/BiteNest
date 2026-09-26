<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' =>['required', 'string', 'max:15', 'unique:users'],
            'password' =>['required', 'confirmed', Password::defaults()],
            'role' =>['required', 'in:customer,shop,delivey']
        ]);      

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);
    
        Auth::login($user);
        return redirect(route('dashboard'));
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
      $validated = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
      ]);

      if(!Auth::attempt($validated, $request->has('remember'))){
        return back()->withErrors([
            'email' => 'The provided credentials did not match our records',
        ]);
      }

       $request->session()->regenerate();
        return redirect()->intended(route('home'));
        
    }

     public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('home'));
    }
}
