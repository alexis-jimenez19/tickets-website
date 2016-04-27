<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});

/* Clientes */
$app->get('/clientes', 'ClienteController@index'); //Se visualizan todos los clientes
$app->post('/clientes', 'ClienteController@store'); //Se agrega un nuevo cliente
$app->get('/clientes/{clientes}', 'ClienteController@show'); //se visualiza solo un cliente
$app->patch('/clientes/{clientes}', 'ClienteController@update'); //Se actualiza la informacion de un cliente
$app->put('/clientes/{clientes}', 'ClienteController@update'); //Se actualiza la informacion de un cliente
$app->delete('/clientes/{clientes}', 'ClienteController@destroy'); //Se puede eliminar un Cliente en caso de que no tenga boletos pendientes y se le envian los boletos que tiene comprados de nuevo como informacion a su e-mail

/* Roles */
$app->get('/roles', 'RolController@index'); //Se pueden verificar los roles que existen
$app->post('/roles', 'RolController@store'); //Se puede agregar un nuevo rol
$app->get('/roles/{roles}', 'RolController@show'); // Se puede obtener la informacion de un rol por su id
$app->patch('/roles/{roles}', 'RolController@update'); //Se puede mofidicar el nombre de un rol
$app->put('/roles/{roles}', 'RolController@update');//Se puede mofidicar el nombre de un rol
$app->delete('/roles/{roles}', 'RolController@destroy'); // Se puede eliminar un rol existente pero no debe de estar asignado a nadie

/* Administradores */
$app->get('/administradores', 'AdministradorController@index'); //Se puede obtener todo el personal administrativo
//$app->post('/administradores', 'AdministradorController@store');
$app->get('/administradores/{administradores}', 'AdministradorController@show'); //Puede obtener una persona que se encuentra en el personal administrativo
//$app->patch('/administradores/{administradores}', 'Administradroller@update');
//$app->delete('/administradores/{administradores}', 'AdministradorController@destroy');

/* RolAdministrador */
$app->get('/roles/{roles}/administradores', 'RolAdministradorController@index'); //puede obtener todos los administradores de un rol en especifico
$app->post('/roles/{roles}/administradores', 'RolAdministradorController@store');//puede agregar un administrador pero debe de existir el rol
$app->get('/roles/{roles}/administradores/{administradores}', 'RolAdministradorController@show'); //Se puede obtener espeificamente una administrador de acuerdo a un especifico rol
$app->patch('/roles/{roles}/administradores/{administradores}', 'RolAdministradorController@update'); //Se pueden actualizar los datos de un administrativo
$app->put('/roles/{roles}/administradores/{administradores}', 'RolAdministradorController@update');//Se pueden actualizar los datos de un administrativo
$app->delete('/roles/{roles}/administradores/{administradores}', 'RolAdministradorController@destroy');//Se pueden eliminar una persona del personal administrativo

/* Eventos */
$app->get('/eventos', 'EventoController@index'); //se puede obtener todos los eventos
//$app->post('/eventos', 'EventoController@store');
$app->get('/eventos/{eventos}', 'EventoController@show');//Se puede obtener un evento en especifico
//$app->patch('/eventos/{eventos}', 'EventoController@update');
//$app->put('/eventos/{eventos}', 'EventoController@update');
//$app->delete('/eventos/{eventos}', 'EventoController@destroy');

/* Categorias */
$app->get('/categorias', 'CategoriaController@index'); //Se pueden obtener todas las categorias
$app->post('/categorias', 'CategoriaController@store'); //Se puede agregar una categoria
$app->get('/categorias/{categorias}', 'CategoriaController@show'); //Se puede solicitar la informacion de una categoria
$app->patch('/categorias/{categorias}', 'CategoriaController@update'); //Se puede actualizar la informacion de una categoria
$app->put('/categorias/{categorias}', 'CategoriaController@update'); // Se puede actualizar la informacion de una categoria
$app->delete('/categorias/{categorias}', 'CategoriaController@destroy'); //Se puede eliminar una categoria siempre y cuando no se tengan subcategorias agregadas a dicha categoria

$app->get('/categorias/{categorias}/subcategorias', 'SubcategoriaController@index');//Se pueden solicitar todas las subcategorias
$app->post('/categorias/{categorias}/subcategorias', 'SubcategoriaController@store');//Se puede crear una nueva subcategoria
$app->get('/categorias/{categorias}/subcategorias/{subcategorias}', 'SubcategoriaController@show');//Se puede solicitar el nombre de una subcategoria
$app->patch('/categorias/{categorias}/subcategorias/{subcategorias}', 'SubcategoriaController@update');//Se puede actualizar el nombre de dicha subcategoria
$app->put('/categorias/{categorias}/subcategorias/{subcategorias}', 'SubcategoriaController@update');//Se puede actualizar el nombre de dicha subcategoria
$app->delete('/categorias/{categorias}/subcategorias/{subcategorias}', 'SubcategoriaController@destroy');//Se puede eliminar la subcategoria siempre y cuando no existan eventos relacionados

$app->get('/subcategorias/{subcategorias}/evento', 'SubcategoriaEventoController@index'); //Se visualizan todos los eventos relacionadas a la subcategoria
$app->post('/subcategorias/{subcategorias}/evento', 'SubcategoriaEventoController@store'); //Se puede agregar un nuevo evento siempre y cuando este relacionado a una subcategoria
//$app->get('/subcategorias/{subcategorias}/evento/{eventos}', 'SubcategoriaEventoController@show'); //se visualiza solo un eventos
$app->patch('/subcategorias/{subcategorias}/evento/{eventos}', 'SubcategoriaEventoController@update'); //Se actualiza la informacion de un evento
$app->put('/subcategorias/{subcategorias}/evento/{eventos}', 'SubcategoriaEventoController@update'); //Se actualiza la informacion de un evento
$app->delete('/subcategorias/{subcategorias}/evento/{eventos}', 'SubcategoriaEventoController@destroy'); //Se puede eliminar un Evento en caso de que no tenga boletos pendientes y se le envian los boletos que tiene comprados de nuevo como informacion a su e-mail



$app->get('/eventos/{eventos}/boletos', 'BoletosController@index'); //se pueden obtener todos los boletos de tal evento ej de primera fila o de palco y respectiva informacion
$app->post('/eventos/{eventos}/boletos', 'BoletosController@store'); //se puede guardar un nuevo boleto a dicho evento
$app->get('/eventos/{eventos}/boletos/{boletos}', 'BoletosController@show'); //se puede obtener un boleto especifico en caso de quere comprar ese
$app->patch('/eventos/{eventos}/boletos/{boletos}', 'BoletosController@update'); //se puede actualizar la informacion de dicho boleto 
$app->put('/eventos/{eventos}/boletos/{boletos}', 'BoletosController@update'); //se puede actualizar la informacion de dicho boleto
$app->delete('/eventos/{eventos}/boletos/{boletos}', 'BoletosController@destroy'); //Se puede eliminar dicho boleto en caso de que aun no haya sido asignado

$app->get('/clientes/{clientes}/boletos', 'CompraBoletoController@index'); //Se visualizan todos los boletos que estan relacionados a un cliente los cuales tiene comprados aunq estos ya hayan sido pagados o esten pendientes
$app->post('/clientes/{clientes}/boletos', 'CompraBoletoController@store'); //Se puede agregar un boleto a un cliente debemos de recordar que mande status pendiente para despues cambiarlo a pagado en caso de haber recibido correctamente el pago
$app->get('/clientes/{clientes}/boletos/{boletos}', 'CompraBoletoController@show'); //se visualiza algun boleto especifico comprado por un cliente
//$app->patch('/clientes/{clientes}/boletos/{boletos}', 'CompraBoletoController@update'); 
//$app->put('/clientes/{clientes}/boletos/{boletos}', 'CompraBoletoController@update');  
$app->delete('/clientes/{clientes}/boletos/{boletos}', 'CompraBoletoController@destroy'); //Se puede eliminar un Boleto o el paquete de boletos que un cliente en caso de estar pendientes volvemos a poner la disponibilidad de estos aumentando contador de boletos con ese id