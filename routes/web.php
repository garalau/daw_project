<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\NewsController;

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
    Route::get('/admin/edit/{id}', [HomeController::class, 'edit'])->name('admin.edit'); 
    Route::put('/admin/update/{id}', [HomeController::class, 'update'])->name('admin.update'); 
    Route::delete('/admin/destroy/{id}', [HomeController::class, 'destroy'])->name('admin.destroy'); 
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

Route::prefix('noticias')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('noticias');
    Route::get('{id}', [NewsController::class, 'show'])->name('noticia.id');
});


require __DIR__.'/auth.php';
