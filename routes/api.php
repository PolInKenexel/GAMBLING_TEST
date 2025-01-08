<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiControllers\LoreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*API para simular las peticiones CRUD, que ya hacía en web y por extensión en el controlador,
 pero supongo que lo pasare todo a API para que la lógica de Back-End y Front-End este 100% separada*/
Route::get('/INFO', [LoreController::class, 'index']);

Route::get('/INFO/{lore_Id}', function(){
    return 'Obteniendo info individual';
});

Route::post('/INFO', [LoreController::class, 'store']);

Route::delete('/INFO/{lore_Id}', function(){
    return 'Eliminando información del sospechoso';
});
Route::put('/INFO/{lore_Id}', function(){
    return 'Actualizando información del sospechoso';
});