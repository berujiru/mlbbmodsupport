<?php

use App\Http\Controllers\InfractionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\ModinfractionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamDeputyController;
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

    //infraction
    Route::resource('infraction', InfractionController::class);

    //team management
    Route::resource('team-deputy', TeamDeputyController::class);
    Route::resource('team', TeamController::class);

    //sheetdb
    Route::get('/mailbox',[MailboxController::class,'index'])->name('mailbox');
    Route::get('/mailbox/{id}',[MailboxController::class,'show'])->name('mailboxview');

    //evaluation assigning of infractions
    Route::get('/evaluation',[ModinfractionController::class,'index'])->name('modeval');
    Route::post('/evaluation',[ModinfractionController::class,'store'])->name('modevalstore');
    Route::get('/evaluation/destroy/{id}',[ModinfractionController::class,'destroy'])->name('modevaldestroy');
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

