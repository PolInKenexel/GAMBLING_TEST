<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/INFO', function(){
    return 'Obteniendo info completa';
});
Route::get('/INFO/{lore_Id}', function(){
    return 'Obteniendo info individual';
});
Route::post('/INFO', function(){
    return 'Agregando información del nuevo sospechoso';
});
Route::delete('/INFO/{lore_Id}', function(){
    return 'Eliminando información del sospechoso';
});
Route::put('/INFO/{lore_Id}', function(){
    return 'Actualizando información del sospechoso';
});