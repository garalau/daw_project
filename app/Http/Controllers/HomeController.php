<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        
        if(Auth::id()) {

            $role=Auth()->user()->role;

            if($role=='user') {
                return view('dashboard');
            }

            else if($role=='admin') {
                return redirect()->route('panel');
            }

            else {
                return redirect()->back();
            }
        }
    }
    //redirigir a login si no estas registrado
    public function herramientas() {
        if(Auth::check()) {
            return view('herramientas');
        }
        
        return redirect()->route('login');
    }

    public function panel() {
    $users = User::all();
    return view('admin.adminhome', compact('users'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }
    
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('panel')->with('success', 'User updated successfully');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('panel')->with('success', 'User deleted successfully');
    }    
    
}
