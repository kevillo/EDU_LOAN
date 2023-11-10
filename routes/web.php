<?php

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/inicioAdmin', function () {
    return view('menu_principal');
});

Route::get('/usuario', function () {
    return view('usuario');
});

Route::get('/equipos', function () {
    return view('equipos');
});

Route::get('/prestamos', function () {
    return view('prestamos');
});
Route::get('/InicioEstudiantes', function () {
    return view('estudiantes');
});

