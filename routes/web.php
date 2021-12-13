<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\DetalleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/Ventas', [VentasController::class, 'index']);

Route::resources([
    'productos' => ProductosController::class,
    'ventas' => VentasController::class,
    'detalle' => DetalleController::class
]);
Route::get('/productos/{id}/{state}',[ProductosController::class,'change'])->name('change');
// Route::get('/Productos', [ProductosController::class, 'index']);
