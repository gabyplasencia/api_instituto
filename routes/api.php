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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('alumnos', 'App\Http\Controllers\AlumnoRESTController');

Route::apiResource('asignaturas', 'App\Http\Controllers\AsignaturaRESTController');

Route::apiResource('matriculas', 'App\Http\Controllers\MatriculaRESTController');

Route::apiResource('users', 'App\Http\Controllers\UserRESTController');
