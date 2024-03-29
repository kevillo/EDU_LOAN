<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\RolUsuarioController;
use App\Http\Controllers\TipoEquipoController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ConsultaController;

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



/*
--------------------------------------------------------------------------
| Rutas para la gestion de usuarios
--------------------------------------------------------------------------

Estas rutas son para la gestion de usuarios, en ellas se encuentran las rutas 
para la creacion, edicion, eliminacion y visualizacion de usuarios
*/

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
// rutas para la creacion de usuarios
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');

// rutas para la vista de usuarios
Route::get('/usuarios/{usuario}', [UserController::class, 'show'])->name('usuarios.show');

// rutas para la edicion de usuarios
Route::get('/usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update');

// rutas para la eliminacion de usuarios
Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');

//ruta para consultas



Route::get('/consultas', [ConsultaController::class, 'index'])->name('consultas.index');

Route::get('/consultas/usuarios', [ConsultaController::class, 'usuarios_index'])->name('consultas.usuarios_index');
Route::get('/consultas/estudiantes', [ConsultaController::class, 'estudiantes_index'])->name('consultas.estudiantes_index');
Route::get('/consultas/equipos', [ConsultaController::class, 'equipos_index'])->name('consultas.equipos_index');
Route::get('/consultas/prestamos', [ConsultaController::class, 'prestamos_index'])->name('consultas.prestamos_index');

Route::get('/consultas/Updf', [ConsultaController::class, 'Usuarios_pdf'])->name('consultas.Updf');
Route::get('/consultas/Epdf', [ConsultaController::class, 'Estudiantes_pdf'])->name('consultas.Epdf');
Route::get('/consultas/Epqdpf', [ConsultaController::class, 'Equipos_pdf'])->name('consultas.Eqpdf');
Route::get('/consultas/Ppdf', [ConsultaController::class, 'Prestamos_pdf'])->name('consultas.Ppdf');
/*
--------------------------------------------------------------------------
| Rutas para la gestion de estudiantes
--------------------------------------------------------------------------

Estas rutas son para la gestion de estudiantes, en ellas se encuentran las rutas
para la creacion, edicion, eliminacion y visualizacion de estudiantes
*/

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
// rutas para la creacion de estudiantes
Route::get('/estudiantes/create', [EstudianteController::class, 'create'])->name('estudiantes.create');
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');

// rutas para la vista de estudiantes
Route::get('/estudiantes/{estudiante}', [EstudianteController::class, 'show'])->name('estudiantes.show');

// rutas para la edicion de estudiantes
Route::get('/estudiantes/{estudiante}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{estudiante}', [EstudianteController::class, 'update'])->name('estudiantes.update');

// rutas para la eliminacion de estudiantes
Route::delete('/estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');

/*
--------------------------------------------------------------------------
| Rutas para la gestion de equipos
--------------------------------------------------------------------------
Estas rutas son para la gestion de equipos, en ellas se encuentran las rutas
para la creacion, edicion, eliminacion y visualizacion de equipos
*/


Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');

// rutas para la creacion de equipos
Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');

// rutas para la vista de equipos
Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');

// rutas para la edicion de equipos
Route::get('/equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('equipos.edit');
Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');

// rutas para la eliminacion de equipos
Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');

/*
--------------------------------------------------------------------------
| Rutas para la gestion de tipos de equipos
--------------------------------------------------------------------------
Estas rutas son para la gestion de tipos de equipos, en ellas se encuentran las rutas
para la creacion, edicion, eliminacion y visualizacion de tipos de equipos
*/

Route::get('/tipo_equipos/create', [TipoEquipoController::class, 'create'])->name('tipo_equipos.create');
Route::post('/tipo_equipos', [TipoEquipoController::class, 'store'])->name('tipo_equipos.store');


/*
--------------------------------------------------------------------------
| Rutas para la gestion de prestamos
--------------------------------------------------------------------------
Estas rutas son para la gestion de prestamos, en ellas se encuentran las rutas
para la creacion, edicion, eliminacion y visualizacion de prestamos
*/

Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
Route::get('/prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create');
Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');

// se actualiza se ejecuta de un solo el metodo update
Route::put('/prestamos/{prestamo}', [PrestamoController::class, 'update'])->name('prestamo.update');

/*
--------------------------------------------------------------------------
| Rutas para la gestion de bitacoras
--------------------------------------------------------------------------
Estas rutas son para la gestion de bitacoras, en ellas se encuentran las rutas
para la creacion, edicion, eliminacion y visualizacion de bitacoras
*/

Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');
Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.bitacora');
/*
--------------------------------------------------------------------------
| Rutas para la gestion de cursos
--------------------------------------------------------------------------
Estas rutas son para la gestion de cursos, en ellas se encuentran las rutas
para la creacion, edicion, eliminacion y visualizacion de cursos
*/

Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');



/*
--------------------------------------------------------------------------
| Rutas para la gestion de roles
--------------------------------------------------------------------------
Estas rutas son para la gestion de roles, en ellas se encuentran las rutas
para la creacion, edicion, eliminacion y visualizacion de roles
*/

Route::get('/roles/create', [RolUsuarioController::class, 'create'])->name('roles.create');
Route::post('/roles', [RolUsuarioController::class, 'store'])->name('roles.store');


/* 
--------------------------------------------------------------------------
| Rutas para los menus principales
--------------------------------------------------------------------------
Estas rutas son para los menus principales, en ellas se encuentran las rutas
para los menus principales de los usuarios
*/



Route::get('/', [UserController::class, 'main'])->name('usuarios.main');

/*
--------------------------------------------------------------------------
| Rutas para el login
--------------------------------------------------------------------------
Estas rutas son para el login
*/

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('usuario.login');

// cerrar sesion
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

/*
--------------------------------------------------------------------------
| Rutas para las consultas
--------------------------------------------------------------------------
Estas rutas son para las consultas
*/
Route::post('/buscar-usuario', [UserController::class, 'buscar'])->name('buscar.usuario');
Route::post('/buscar-equipos', [EquipoController::class, 'buscar'])->name('buscar.equipos');
Route::post('/buscar-estudiantes', [EstudianteController::class, 'buscar'])->name('buscar.estudiantes');
