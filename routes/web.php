<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Setting;
use App\Http\Livewire\Setting\Permission;
use App\Http\Livewire\Setting\Role;
use App\Http\Livewire\Setting\RolePermission;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/role', Role::class)->name('role');
    Route::get('/permission', Permission::class)->name('permission');
    Route::get('/permission-role/{role_id}', RolePermission::class)->name('permission-role');
});
