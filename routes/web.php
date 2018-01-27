<?php

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

Route::get('/', 'TestController@welcome');


Route::get('/prueba', function () {
    return 'Ruta de prueba';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');  

Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');

Route::post('/order','CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){
    
        //con prefix('admin') se elimina el /admin/ antes del nombre de las rutas de abajo...
		// ejemplo: Si no tuviera prefix('admin') se tendria que poner la linea asi:
		// Route::get('/admin/products','Admin\ProductController@index');  //listado
		
		//con namespace('Admin') se elimina el Admin\ antes del nombre del controlador.
		//ejemplo: Si no tuviera namespace('Admin'), se tendria que poner la linea asi:
		// Route::get('/products','Admin\ProductController@index');  //listado
		
    
        Route::get('/products','ProductController@index');  //listado
        Route::get('/products/create','ProductController@create');  //Formulario de nuevos productos
        Route::post('/products','ProductController@store');  //Registra nuevos productos

        Route::get('/products/{id}/edit','ProductController@edit');  //Formulario edicion
        Route::post('/products/{id}/edit','ProductController@update');  //Actualizar

        Route::delete('/products/{id}','ProductController@destroy');  //Form para eliminar
		
		Route::get('/products/{id}/images','ImageController@index');  // Listado y formulario
		Route::post('/products/{id}/images', 'ImageController@store'); //Registrar nuevas fotos
		Route::delete('/products/{id}/images','ImageController@destroy');  //Form para eliminar
		Route::get('/products/{id}/images/select/{image}','ImageController@select'); //destacar imagen
    
});




