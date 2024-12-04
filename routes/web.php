<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyectosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if(Auth::check()) {
        $role = Auth::user()->role;
        
        //si un usuario esta registrado welcome de usuarios
        if($role === 'user') {
            return view('welcome_user');
        } 
    }
    //si no esta registrado
    return view('welcome');
})->name('welcome');

Route::get('/conocenos', function () {
    return view('conocenos'); 
})->name('conocenos');

Route::get('/noticias', function () {
    return view('noticias');
})->name('noticias');

Route::get('/herramientas',[HomeController::class, 'herramientas'])->
    middleware('auth')->name('herramientas');

Route::get('/home',[HomeController::class, 'index'])->
    middleware('auth')->name('home');

    
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/panel', [HomeController::class, 'panel'])->name('panel');
    Route::get('/admin/edit/{id}', [HomeController::class, 'edit'])->name('admin.edit'); // Ruta para editar usuario
    Route::put('/admin/update/{id}', [HomeController::class, 'update'])->name('admin.update'); // Ruta para actualizar usuario
    Route::delete('/admin/destroy/{id}', [HomeController::class, 'destroy'])->name('admin.destroy'); // Ruta para eliminar usuario
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('proyectos/create', [ProyectosController::class, 'create'])->name('proyectos.create');
    Route::get('proyectos', [ProyectosController::class, 'index'])->name('proyectos.index');
    Route::get('proyectos/trash', [ProyectosController::class, 'trash'])->name('proyectos.trash');
});

require __DIR__.'/auth.php';
