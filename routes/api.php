<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'tasks'
], function() {
    Route::get('/', 'TaskController@fetchAll');
    Route::get('/{id}', 'TaskController@fetchOne');
    Route::post('/', 'TaskController@saveTask');
    Route::post('/update', 'TaskController@updateTask');

    Route::group([
        'prefix' => 'complete'
    ], function() {
        Route::post('/', 'TaskController@completeTask');
        Route::post('/negate', 'TaskController@negateCompleteTask');
    });

    Route::group([
        'prefix' => 'delete'
    ], function() {
        Route::post('/', 'TaskController@deleteTask');
        Route::post('/negate', 'TaskController@negateDeleteTask');
    });
});