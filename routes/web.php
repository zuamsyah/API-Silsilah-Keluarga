<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api'], function () use ($app) {
    $app->get('silsilah', 'SilsilahController@getAll');
    $app->get('silsilah/anak/{id}', 'SilsilahController@getChild');
    $app->get('silsilah/cucu/{id}[/{jk}]', 'SilsilahController@getGrandChild');
    $app->get('silsilah/bibi/{id}', 'SilsilahController@getAunt');
    $app->get('silsilah/sepupu/{id}', 'SilsilahController@getCousin');
    $app->post('silsilah', 'SilsilahController@create');
    $app->delete('silsilah/{id}', 'SilsilahController@delete');
    $app->put('silsilah/{id}', 'SilsilahController@update');
});