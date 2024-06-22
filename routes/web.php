<?php
use App\Http\Controllers\ComprobanteController;

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AparatoController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepararController;
use Illuminate\Support\Facades\Route;
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
});


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/reparar', [RepararController::class, 'index'])->name('reparar.index');
Route::get('/reparar/importdata',[RepararController::class, 'ImportData'])->name('reparar.importdata');

Route::get('/reparar/create',[RepararController::class, 'create'])->name('reparar.create');
Route::get('/reparar/{reparar}/edit',[RepararController::class, 'edit'])->name('reparar.edit');
Route::patch('/reparar/{reparar}/update',[RepararController::class, 'update'])->name('reparar.update');
Route::post('/reparar/store',[RepararController::class, 'store'])->name('reparar.store');
Route::delete('/reparar/{reparar}/destroy',[RepararController::class, 'destroy'])->name('reparar.destroy');  



Route::get('/tecnicos', [TecnicoController::class, 'index'])->name('tecnico.index');
Route::get('/tecnicos/create',[TecnicoController::class, 'create'])->name('tecnico.create');
Route::get('/tecnicos/{tecnico}/edit',[TecnicoController::class, 'edit'])->name('tecnico.edit');
Route::patch('/tecnicos/{tecnico}/update',[TecnicoController::class, 'update'])->name('tecnico.update');
Route::post('/tecnicos/store',[TecnicoController::class, 'store'])->name('tecnico.store');

Route::delete('/tecnicos/{tecnico}/destroy',[TecnicoController::class, 'destroy'])->name('tecnico.destroy');  


Route::get('/marcas', [MarcaController::class, 'index'])->name('marca.index');
Route::get('/marcas/create',[MarcaController::class, 'create'])->name('marca.create');
Route::get('/marcas/{marca}/edit',[MarcaController::class, 'edit'])->name('marca.edit');
Route::patch('/marcas/{marca}/update',[MarcaController::class, 'update'])->name('marca.update');
Route::post('/marcas/store',[MarcaController::class, 'store'])->name('marca.store');
Route::delete('/marcas/{marca}/destroy',[MarcaController::class, 'destroy'])->name('marca.destroy');  

Route::get('/comprobante/{reparar}/show', [ComprobanteController::class, 'show'])->name('comprobante.show');
Route::get('/comprobante/{reparar}/pdf', [ComprobanteController::class, 'downloadPDF'])->name('comprobante.pdf');

Route::get('/aparatos', [AparatoController::class, 'index'])->name('aparato.index');
Route::get('/aparatos/create',[AparatoController::class, 'create'])->name('aparato.create');
Route::get('/aparatos/{aparato}/edit',[AparatoController::class, 'edit'])->name('aparato.edit');
Route::patch('/aparatos/{aparato}/update',[AparatoController::class, 'update'])->name('aparato.update');
Route::post('/aparatos/store',[AparatoController::class, 'store'])->name('aparato.store');
Route::delete('/aparatos/{aparato}/destroy',[AparatoController::class, 'destroy'])->name('aparato.destroy');  


Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresa.index');
Route::get('/empresas/create',[EmpresaController::class, 'create'])->name('empresa.create');
Route::get('/empresas/{empresa}/edit',[EmpresaController::class, 'edit'])->name('empresa.edit');
Route::patch('/empresas/{empresa}/update',[EmpresaController::class, 'update'])->name('empresa.update');
Route::post('/empresas/store',[EmpresaController::class, 'store'])->name('empresa.store');
Route::delete('/empresas/{empresa}/destroy',[EmpresaController::class, 'destroy'])->name('empresa.destroy');  



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');