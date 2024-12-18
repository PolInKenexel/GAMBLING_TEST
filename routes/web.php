<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Models\Lore;

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

Route::get('/MAIN', [TestController::class, 'main']);

Route::get('/INFO', [TestController::class, 'index']);
Route::post('/INFO', [TestController::class, 'store']);

Route::post('/INFO/create', [TestController::class, 'check']);
Route::get('/INFO/create', [TestController::class, 'create']);

Route::get('/INFO/{lore_Id}', [TestController::class, 'show']);
Route::delete('/INFO/{lore_Id}', [TestController::class, 'destroy']);
//En teoría, deberías haber hecho también el de actualizar, pero ahora tendrás que esperar al API