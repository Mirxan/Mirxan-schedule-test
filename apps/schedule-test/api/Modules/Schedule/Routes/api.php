<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/schedule', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'schedule',
], function () {
    
    Route::controller(ScheduleController::class)->group(function () {
        Route::group(['prefix' => 'schedule'], function () {
            Route::get('/list', 'list');
        });
    });

    Route::apiResources([
        'schedule' => ScheduleController::class,
        'group' => GroupController::class,
        'teacher' => TeacherController::class,
        'room' => RoomController::class,
    ]);
});

