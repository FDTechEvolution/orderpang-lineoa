<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrgController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orgs', [OrgController::class, 'index']);
Route::get('/orgs/restore', [OrgController::class, 'restore']);

Route::post('/org-create', [OrgController::class, 'create']);
Route::post('/org-edit', [OrgController::class, 'update']);
Route::post('/org-delete', [OrgController::class, 'delete']);
Route::post('/org-restore', [OrgController::class, 'patch']);
