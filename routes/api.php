<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TechonologyController;
use App\Http\Controllers\Api\TypeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route for project API
Route::get('/projects', [ProjectController::class, 'projects']);
Route::get('/paginate', [ProjectController::class, 'paginate']);
Route::get('/project/{id}', [ProjectController::class, 'project']);

//Route for Technology API
Route::get('/technologies', [TechonologyController::class, 'index']);
Route::get('/technology/{slug}', [TechonologyController::class, 'show']);

//Route fo Type API
Route::get('/types', [TypeController::class, 'index']);
Route::get('/type/{slug}', [TypeController::class, 'show']);