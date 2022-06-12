<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
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

Auth::routes();

//rbac
Route::group(['middleware' => ['auth']], function() {

    //admin only 
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //user profile edit dbsc
    Route::get('profile', [ProfileController::class,'index'])->name('profile');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('editProfile');
    Route::post('/update-profile', [ProfileController::class, 'update'])->name('updateProfile');

    //user edit login credential
    Route::get('changeprofile', ['as' => 'profileedit', 'uses' => 'App\Http\Controllers\ProfileController@loginedit']);
    Route::put('settingprofile', ['as' => 'profileupdate', 'uses' => 'App\Http\Controllers\ProfileController@loginupdate']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    
});

//public reset pass
Route::get('/reset', [App\Http\Controllers\HomeController::class, 'resetpassword'])->name('resetpass');

Route::post('/forgot-password', [App\Http\Controllers\HomeController::class, 'sendresetpassword'])->name('password.email');



//Language Translation
// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
//Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

