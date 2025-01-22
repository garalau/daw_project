<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        
        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('admin.panel'); 
        }

        return view('herramientas');
    }

    //redirigir a login si no estas registrado
    public function herramientas() {
        if(Auth::check()) {
            return view('herramientas');
        }
        
        return redirect()->route('login');
    }
    
}
