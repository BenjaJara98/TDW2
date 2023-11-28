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
    $router->post('create', [PerroController::class, 'create']);
    $router->get('list', [PerroController::class, 'show']);
    $router->put('update/{id}', [PerroController::class, 'update']);
    $router->delete('delete/{id}', [PerroController::class, 'destroy']);
});

Route::prefix('/interaccion')->group(function () use ($router) {
    $router->post('create', [InteraccionController::class, 'create']);
    $router->get('list/{id}', [InteraccionController::class, 'listOne']);
    $router->delete('delete/{id}', [InteraccionController::class, 'destroy']);
});