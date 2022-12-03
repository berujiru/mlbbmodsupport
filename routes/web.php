<?php

use App\Http\Controllers\DeputyModsController;
use App\Http\Controllers\DeputyModsNteController;
use App\Http\Controllers\InfractionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\ModBirthdayPictureController;
use App\Http\Controllers\NteController;
use App\Http\Controllers\ModinfractionController;
use App\Http\Controllers\ModScoreSummaryController;
use App\Http\Controllers\NtereplyController;
use App\Http\Controllers\TeamAssignmentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamDeputyController;
use App\Http\Controllers\TeamDeputyHistoryController;
use App\Http\Controllers\TicketsupportController;

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
    Route::get('profile/{moderator?}', [ProfileController::class,'moderator'])->name('seeprofile');
    // Route::post('/search-profile', [ProfileController::class, 'search'])->name('searchProfile');
    Route::post('/search-profile',[ProfileController::class, 'search']);
    Route::get('/search-profile',[ProfileController::class, 'search']);
    //ticket support on profile change mod id
    // Route::post('/ticket-profile',[ProfileController::class, 'ticket']);
    Route::post('/ticket',[ProfileController::class, 'ticket']);
    Route::get('/ticketlist',[TicketsupportController::class, 'index'])->name('mytickets');
    //user edit login credential
    Route::get('changeprofile', ['as' => 'profileedit', 'uses' => 'App\Http\Controllers\ProfileController@loginedit']);
    Route::put('settingprofile', ['as' => 'profileupdate', 'uses' => 'App\Http\Controllers\ProfileController@loginupdate']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    //infraction
    Route::resource('infraction', InfractionController::class);
    Route::get('/infraction/delete/{id}',[InfractionController::class,'destroy'])->name('infraction.delete');

    //team management
    Route::resource('team-deputy', TeamDeputyController::class);
    Route::get('/team-deputy/delete/{id}',[TeamDeputyController::class,'destroy'])->name('team-deputy.delete');
    Route::get('/team-deputy/update-deputy/{id}', [TeamDeputyController::class, 'updatedeputy'])->name('team-deputy.update-deputy');
    Route::patch('/team-deputy/update-record/{id}', [TeamDeputyController::class, 'updaterecord'])->name('team-deputy.update-record');
    Route::resource('team', TeamController::class);
    Route::get('/team/delete/{id}',[TeamController::class,'destroy'])->name('team.delete');
    Route::get('/team/enable/{id}',[TeamController::class,'activate'])->name('team.enable');
    Route::resource('team-deputy-history', TeamDeputyHistoryController::class);

    //mod team assignment
    Route::resource('team-assignment', TeamAssignmentController::class);
    Route::get('/team-assignment/assign',[TeamAssignmentController::class,'assign'])->name('team-assignment.assign');
    Route::post('/team-assignment/mod-assign',[TeamAssignmentController::class,'savemodteam'])->name('team-assignment.mod-assign');
    Route::get('/team-assignment/remove/{id}',[TeamAssignmentController::class,'remove'])->name('team-assignment.remove');

    //mod score summary
    Route::resource('mod-score-summary', ModScoreSummaryController::class);

    //deputy mods
    Route::resource('deputy-mods', DeputyModsController::class);
    Route::resource('deputy-mods-nte', DeputyModsNteController::class);
    
    //mailbox
    Route::get('/mailbox',[MailboxController::class,'index'])->name('mailbox');
    Route::get('/mailbox/{id}',[MailboxController::class,'show'])->name('mailboxview');

    //ntes
    Route::get('/notice/{id}',[NteController::class,'show'])->name('nteview');
    Route::get('/notice',[NteController::class,'index'])->name('nteindex');
    Route::post('/notice/store',[NteController::class,'store'])->name('ntestore');

    //nte replies
    Route::resource('ntereply', NtereplyController::class);
    Route::get('/notice-reply',[NtereplyController::class,'index'])->name('ntereply.index');
    Route::get('/notice-reply/view/{id}',[NtereplyController::class,'show'])->name('ntereply.show');
    Route::get('/notice-reply/search',[NtereplyController::class,'searchreply'])->name('ntereply.search');

    //evaluation assigning of infractions
    Route::get('/evaluation',[ModinfractionController::class,'index'])->name('modeval');
    Route::post('/evaluation',[ModinfractionController::class,'store'])->name('modevalstore');
    Route::get('/evaluation/destroy/{id}',[ModinfractionController::class,'destroy'])->name('modevaldestroy');

    //birthday card
    Route::resource('birthday-card', ModBirthdayPictureController::class);
    Route::get('/birthday-card/delete/{id}',[ModBirthdayPictureController::class,'destroy'])->name('birthday-card.delete');
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

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

