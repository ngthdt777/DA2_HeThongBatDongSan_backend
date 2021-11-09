<?php

use Illuminate\Http\Request;
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
Route::get('a', [App\Http\Controllers\AreaController::class, 'index']);
Route::get('p', [App\Http\Controllers\ProjectController::class, 'index']);
Route::get('pm', [App\Http\Controllers\ProjectMediaController::class, 'index']);
Route::get('re', [App\Http\Controllers\RealEstateController::class, 'index']);
Route::get('ret', [App\Http\Controllers\RealEstateTypeController::class, 'index']);
Route::get('rem', [App\Http\Controllers\RealEstateMediaController::class, 'index']);
Route::get('u', [App\Http\Controllers\UserController::class, 'index']);
Route::get('ur', [App\Http\Controllers\UserRoleController::class, 'index']);
Route::get('wl', [App\Http\Controllers\WishListController::class, 'index']);
Route::get('wlre', [App\Http\Controllers\WishListRealEstateController::class, 'index']);

Route::get('a/{id}', [App\Http\Controllers\AreaController::class, 'show']);
Route::get('p/{id}', [App\Http\Controllers\ProjectController::class, 'show']);
Route::get('pm/{id}', [App\Http\Controllers\ProjectMediaController::class, 'show']);
Route::get('re/{id}', [App\Http\Controllers\RealEstateController::class, 'show']);
Route::get('ret/{id}', [App\Http\Controllers\RealEstateTypeController::class, 'show']);
Route::get('rem/{id}', [App\Http\Controllers\RealEstateMediaController::class, 'show']);
Route::get('u/{id}', [App\Http\Controllers\UserController::class, 'show']);
Route::get('ur/{id}', [App\Http\Controllers\UserRoleController::class, 'show']);
Route::get('wl/{id}', [App\Http\Controllers\WishListController::class, 'show']);
Route::get('wlre/{id}', [App\Http\Controllers\WishListRealEstateController::class, 'show']);

/*
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::apiResources([
        'a' => AreaController::class,
        'p' => ProjectController::class,
        'pm' => ProjectMediaController::class,
        're' => RealEstateController::class,
        'ret' => RealEstateTypeController::class,
        'rem' => RealEstateMediaController::class,
        'u' => UserController::class,
        'ur' => UserRoleController::class,
        'wl' => WishListController::class,
        'wlre' => WishListRealEstateController::class,
    ]);
});
*/

Route::post('a', [App\Http\Controllers\AreaController::class, 'store']);
Route::post('p', [App\Http\Controllers\ProjectController::class, 'store']);
Route::post('pm', [App\Http\Controllers\ProjectMediaController::class, 'store']);
Route::post('re', [App\Http\Controllers\RealEstateController::class, 'store']);
Route::post('ret', [App\Http\Controllers\RealEstateTypeController::class, 'store']);
Route::post('rem', [App\Http\Controllers\RealEstateMediaController::class, 'store']);
Route::post('u', [App\Http\Controllers\UserController::class, 'store']);
Route::post('ur', [App\Http\Controllers\UserRoleController::class, 'store']);
Route::post('wl', [App\Http\Controllers\WishListController::class, 'store']);
Route::post('wlre', [App\Http\Controllers\WishListRealEstateController::class, 'store']);

Route::put('a/{id}', [App\Http\Controllers\AreaController::class, 'update']);
Route::put('p/{id}', [App\Http\Controllers\ProjectController::class, 'update']);
Route::put('pm/{id}', [App\Http\Controllers\ProjectMediaController::class, 'update']);
Route::put('re/{id}', [App\Http\Controllers\RealEstateController::class, 'update']);
Route::put('ret/{id}', [App\Http\Controllers\RealEstateTypeController::class, 'update']);
Route::put('rem/{id}', [App\Http\Controllers\RealEstateMediaController::class, 'update']);
Route::put('u/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::put('ur/{id}', [App\Http\Controllers\UserRoleController::class, 'update']);
Route::put('wl/{id}', [App\Http\Controllers\WishListController::class, 'update']);
Route::put('wlre/{id}', [App\Http\Controllers\WishListRealEstateController::class, 'update']);

Route::delete('a/{id}', [App\Http\Controllers\AreaController::class, 'destroy']);
Route::delete('p/{id}', [App\Http\Controllers\ProjectController::class, 'destroy']);
Route::delete('pm/{id}', [App\Http\Controllers\ProjectMediaController::class, 'destroy']);
Route::delete('re/{id}', [App\Http\Controllers\RealEstateController::class, 'destroy']);
Route::delete('ret/{id}', [App\Http\Controllers\RealEstateTypeController::class, 'destroy']);
Route::delete('rem/{id}', [App\Http\Controllers\RealEstateMediaController::class, 'destroy']);
Route::delete('u/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
Route::delete('ur/{id}', [App\Http\Controllers\UserRoleController::class, 'destroy']);
Route::delete('wl/{id}', [App\Http\Controllers\WishListController::class, 'destroy']);
Route::delete('wlre/{id}', [App\Http\Controllers\WishListRealEstateController::class, 'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
