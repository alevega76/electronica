<?php
use App\Http\Controllers\TecnicoController;
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

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tecnicos', [TecnicoController::class, 'index'])->name('tecnico.index');
Route::get('/tecnicos/create',[TecnicoController::class, 'create'])->name('tecnico.create');
Route::get('/tecnicos/{tecnico}/edit',[TecnicoController::class, 'edit'])->name('tecnico.edit');
Route::patch('/tecnicos/{tecnico}/update',[TecnicoController::class, 'update'])->name('tecnico.update');
Route::post('/tecnicos/store',[TecnicoController::class, 'store'])->name('tecnico.store');
Route::delete('/tecnicos/{tecnico}/destroy',[TecnicoController::class, 'destroy'])->name('tecnico.destroy');  