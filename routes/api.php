<?php

use Illuminate\Http\Request;



Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
    //Route::group(['middleware' => 'auth'], function() {

        Route::get('agentes', 'AgentesController@getData');
        Route::post('create_agente', 'AgentesController@store');
        Route::get('agente/{id}', 'AgentesController@show');
        Route::put('update_agente/{id}', 'AgentesController@update');
        Route::delete('delete_agente/{id}', 'AgentesController@delete');


        Route::get('clientes', 'ClientesController@getData');
        Route::post('create_cliente', 'ClientesController@store');
        Route::get('cliente/{id}', 'ClientesController@show');
        Route::get('dataAgente', 'ClientesController@getAgentes');
        Route::put('update_cliente/{id}', 'ClientesController@update');
        Route::delete('delete_cliente/{id}', 'ClientesController@delete');

    //});
});

