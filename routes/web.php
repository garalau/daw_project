<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;

use App\Http\Controllers\EspeciesConiferasControlador;
use App\Http\Controllers\CalculoValorConiferaController;

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
    
//vista noticias
Route::prefix('noticias')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('noticias');
    Route::get('{id}', [NewsController::class, 'show'])->name('noticia.id');
});

    
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/panel', [HomeController::class, 'index'])->name('panel');
    
});

//administracion de noticias
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/news', [NewsController::class, 'adminIndex'])->name('news');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('users');
    Route::get('/admin/edit/{id}', [UserController::class, 'edit'])->name('user.edit'); 
    Route::put('/admin/update/{id}', [UserController::class, 'update'])->name('user.update'); 
    Route::delete('/admin/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware('auth')->group(function () {
//     Route::get('proyectos', [ProyectosController::class, 'index'])->name('proyectos.index');
//     Route::get('proyectos/trash', [ProyectosController::class, 'trash'])->name('proyectos.trash');
//     Route::get('proyectos/forum', [ProyectosController::class, 'forum'])->name('proyectos.forum');
//     Route::get('proyectos/create', [CalculoValorConiferaController::class, 'showForm'])->name('proyectos.create');
//     Route::post('proyectos/create', [CalculoValorConiferaController::class, 'calcularValorConifera'])->name('proyectos.resultado');
//     Route::post('proyectos/store', [ProyectosController::class, 'store'])->name('proyectos.store');
//     Route::get('/forum', [ProyectosController::class, 'forum'])->name('proyectos.forum');
//     Route::post('/forum', [ProyectosController::class, 'storeQuestion'])->name('proyectos.storeQuestion');
//     Route::post('/forum/{question}/reply', [ProyectosController::class, 'storeReply'])->name('proyectos.storeReply');
//     Route::get('/forum/{id}', [ProyectosController::class, 'showQuestion'])->name('proyectos.showQuestion');
//     Route::post('/proyectos/reply/{reply}', [ProyectosController::class, 'storeNestedReply'])->name('proyectos.storeNestedReply');
// });

Route::middleware('auth')->group(function () {
    Route::get('proyectos', [ProyectosController::class, 'index'])->name('proyectos.index');
    Route::get('proyectos/trash', [ProyectosController::class, 'trash'])->name('proyectos.trash');
    Route::get('proyectos/create', [CalculoValorConiferaController::class, 'showForm'])->name('proyectos.create');
    Route::post('proyectos/create', [CalculoValorConiferaController::class, 'calcularValorConifera'])->name('proyectos.resultado');
    Route::post('proyectos/store', [ProyectosController::class, 'store'])->name('proyectos.store');
    Route::delete('proyectos/{id}', [ProyectosController::class, 'destroy'])->name('proyectos.destroy');
    Route::get('proyectos/{id}/export-pdf', [ProyectosController::class, 'exportToPDF'])->name('proyectos.export-pdf');
    Route::get('proyectos/{id}/export-excel', [ProyectosController::class, 'exportToExcel'])->name('proyectos.export-excel');
});


Route::middleware('auth')->prefix('forum')->name('forum.')->group(function () {
    Route::get('/', [ForumController::class, 'index'])->name('index');
    Route::post('/', [ForumController::class, 'storeQuestion'])->name('storeQuestion');
    Route::get('/{id}', [ForumController::class, 'showQuestion'])->name('show');
    Route::post('/{question}/reply', [ForumController::class, 'storeReply'])->name('storeReply');
    Route::post('/reply/{reply}', [ForumController::class, 'storeNestedReply'])->name('storeNestedReply');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/especies', [EspeciesConiferasControlador::class, 'index'])->name('especies.index');
    Route::get('/especies/create', [EspeciesConiferasControlador::class, 'create'])->name('especies.create');
    Route::post('/especies', [EspeciesConiferasControlador::class, 'store'])->name('especies.store');
});

//hecho por Jon 
//Route::get('/factor-extrinseco/create', [FactorExtrinsecoController::class, 'create'])->name('factor_extrinsecos.create');
//Route::post('/factor-extrinseco', [FactorExtrinsecoController::class, 'store'])->name('factor_extrinsecos.store');

//RUTA DEL FORMULARIO NUEVO da error

// Ruta para mostrar el formulario
//Route::middleware('auth')->get('/coniferas/create', [CalculoValorConiferaController::class, 'showForm'])->name('coniferas.create');

// Ruta para calcular el valor de la conífera
//Route::post('/coniferas/calcular', [CalculoValorConiferaController::class, 'calcularValorConifera'])->name('calcular.valor.conifera');

require __DIR__.'/auth.php';
