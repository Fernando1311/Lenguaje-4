<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\NotaController;

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



//grupo de rutas para Contactos

Route::get('/contactos', [ContactoController::class, 'index'])->name('contacto.index');

Route::get('/contactos/{id}', [ContactoController::class, 'show'])->name('contacto.mostrar')->where('id', '[0-9]+');;

Route::get('/contactos/crear', [ContactoController::class, 'create'])->name('contacto.crear');

Route::post('/contactos/crear', [ContactoController::class, 'store'])->name('contacto.guardar');


//mostrar formulario de edicion de los Contactos
Route::get('/contactos/{id}/editar', [ContactoController::class, 'edit'])
->name('contacto.edit')->where('id', '[0-9]+');

Route::put('/contactos/{id}/editar', [ContactoController::class, 'update'])
->name('contacto.update')->where('id','[0-9]+');

Route::delete('/contactos/{id}/borrar', [ContactoController::class, 'destroy'])
->name('contacto.borrar')->where('id', '[0-9]+');





//Grupo de rutas para Eventos

Route::get('/eventos', [EventoController::class, 'index'])->name('evento.index');

Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('evento.mostrar')->where('id', '[0-9]+');;

Route::get('/eventos/crear', [EventoController::class, 'create'])->name('evento.crear');

Route::post('/eventos/crear', [EventoController::class, 'store'])->name('evento.guardar');


//Mostrar formulario de edicion de los Eventos
Route::get('/eventos/{id}/editar', [EventoController::class, 'edit'])
->name('evento.edit')->where('id', '[0-9]+');

Route::put('/eventos/{id}/editar', [EventoController::class, 'update'])
->name('evento.update')->where('id','[0-9]+');

Route::delete('/eventos/{id}/borrar', [EventoController::class, 'destroy'])
->name('evento.borrar')->where('id', '[0-9]+');



//Grupo de rutas para Notas

Route::get('/notas', [NotaController::class, 'index'])->name('nota.index');

Route::get('/notas/{id}', [NotaController::class, 'show'])->name('nota.mostrar')->where('id', '[0-9]+');;

Route::get('/notas/crear', [NotaController::class, 'create'])->name('nota.create');

Route::post('/notas/crear', [NotaController::class, 'store'])->name('nota.agregar');


//Mostrar formulario de edicion de los Notas
Route::get('/notas/{id}/editar', [NotaController::class, 'edit'])
->name('nota.edit')->where('id', '[0-9]+');

Route::put('/notas/{id}/editar', [NotaController::class, 'update'])
->name('nota.update')->where('id','[0-9]+');

Route::delete('/notas/{id}/borrar', [NotaController::class, 'destroy'])
->name('nota.borrar')->where('id', '[0-9]+');



