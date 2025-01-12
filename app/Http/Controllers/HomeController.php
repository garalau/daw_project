<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        
        $user = Auth::user();

        return view('proyectos.index');
    }

    //redirigir a login si no estas registrado
    public function herramientas() {
        if(Auth::check()) {
            return view('herramientas');
        }
        
        return redirect()->route('login');
    }
    
}
