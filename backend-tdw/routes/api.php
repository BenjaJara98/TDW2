<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/perro')->group(function () use ($router) {
    $router->post('create', [PerroController::class, 'CREATE']);
    $router->get('get', [PerroController::class, 'GET']);
    $router->put('update/{id}', [PerroController::class, 'UPDATE']);
    $router->delete('delete/{id}', [PerroController::class, 'DESTROY']);
});

Route::prefix('/interaccion')->group(function () use ($router) {
    $router->post('create', [InteraccionController::class, 'CREATE']);
    $router->get('get/{id}', [InteraccionController::class, 'GET']);
    $router->delete('delete/{id}', [InteraccionController::class, 'DELETE']);
});