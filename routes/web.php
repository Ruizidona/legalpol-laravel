<?php

use Illuminate\Support\Facades\Route;


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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'AbogadosController@index')->name('inicio');
Auth::routes();
//Route::resource('eventos', 'EventosController')->middleware('auth');
//Route::resource('DB', 'EventosController')->middleware('auth');

//El middleware(auth) evita entrar sin estar logeado
Route::get('/home/{id?}', 'HomeController@index')->name('home')->middleware('auth');


Route::get('consulta', function () {
    return view('consulta');
})->name('consultar');


//Route::get('abogado', 'EventosController@index')->middleware('auth');

//Route::get('cliente', 'EventosController@showClientes')->middleware('auth');

//Route::get('admin', 'EventosController@showAll')->middleware('auth');


//Route::get('eventos/{evento}', 'EventosController@show')->middleware('auth')->name('eventos.abogados');

Route::get('/eventos', 'EventosController@index')->middleware('auth');

Route::post('/eventos/store', 'EventosController@store')->middleware('auth')->name('eventos.store');
Route::patch('/eventos/{evento}/update', 'EventosController@update')->middleware('auth')->name('eventos.update');
Route::delete('/eventos/{evento}/delete', 'EventosController@destroy')->middleware('auth')->name('eventos.destroy');



Route::get('/eventos/show', 'EventosController@show')->middleware('auth')->name('eventos.abogados');

Route::get('/eventos/showClientes', 'EventosController@showClientes')->middleware('auth')->name('eventos.showCliente');



Route::get('/eventos/showAll', 'EventosController@showAll')->middleware('auth')->name('eventos.showAll');


Route::get('/eventos/{idabogado?}', 'EventosController@get')->middleware('auth')->name('eventos.get');
Route::get('/eventos', 'EventosController@get')->middleware('auth')->name('eventos.get2');




// Con este codigo haces funcionar todas las rutas, sino podes hacer una por una como aca arriba
//Route::resource('/abogados', 'AbogadosController')->middleware('auth');




Route::get('/perfil/{id}', 'AbogadosController@profile')->name('profile');










//formulario sin validar y bugeadito :3
Route::post('/eventos/crear', 'EventosController@formulario')->middleware('auth')->name('eventos.formulario');

Route::get('/exito', function () {
    return view('crear');
})->name("exito");
//{{ route('profile', ['id']=>Auth::user()->id)}}




/* API DE PAGO */
Route::post('/payments/pay', 'PaymentController@pay')->name('pay');
Route::get('/payments/approval', 'PaymentController@approval')->name('approval');
Route::get('/payments/cancelled', 'PaymentController@cancelled')->name('cancelled');





// Route::get('/home/{idabogado?}', 'EventosController@get')->middleware('auth')->name('home.get');


Route::get('/abogados', function () {
    return view('abogados.lista');
})->name("lista");