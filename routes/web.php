<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeInfractionController;
use App\Http\Controllers\DeactivateUserController;
use App\Http\Controllers\DeputyModsController;
use App\Http\Controllers\DeputyModsInfractionController;
use App\Http\Controllers\DeputyModsNteController;
use App\Http\Controllers\InfractionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\ModBirthdayPictureController;
use App\Http\Controllers\ModDashboardController;
use App\Http\Controllers\NteController;
use App\Http\Controllers\ModinfractionController;
use App\Http\Controllers\ModScoreSummaryController;
use App\Http\Controllers\NtereplyController;
use App\Http\Controllers\QaDashboardController;
use App\Http\Controllers\TeamAssignmentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamDeputyController;
use App\Http\Controllers\TeamDeputyHistoryController;
use App\Http\Controllers\TicketsupportController;
use App\Http\Controllers\UserManualAccessController;
use App\Http\Controllers\UserManualController;
use App\Http\Controllers\UserTypeAssignController;
use App\Http\Controllers\UserTypeController;

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
    Route::post('/event',[ProfileController::class, 'event']);

    Route::get('/ticketlist',[TicketsupportController::class, 'index'])->name('mytickets');
    //user edit login credential
    Route::get('changeprofile', ['as' => 'profileedit', 'uses' => 'App\Http\Controllers\ProfileController@loginedit']);
    Route::put('settingprofile', ['as' => 'profileupdate', 'uses' => 'App\Http\Controllers\ProfileController@loginupdate']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    //deactivate user
    Route::resource('deactivate-user', DeactivateUserController::class);
    Route::get('/deactivate-user/remove/{id}',[DeactivateUserController::class,'remove'])->name('deactivate-user.remove');
    Route::get('/deactivate-user/restore/{id}',[DeactivateUserController::class,'restore'])->name('deactivate-user.restore');
    Route::post('/deactivate-user/remove-multiple',[DeactivateUserController::class,'removemultiple'])->name('deactivate-user.remove-multiple');

    //infraction
    Route::resource('infraction', InfractionController::class);
    Route::get('/infraction/delete/{id}',[InfractionController::class,'destroy'])->name('infraction.delete');

    //attribute
    Route::resource('attribute', AttributeController::class);
    Route::get('/attribute/delete/{id}',[AttributeController::class,'destroy'])->name('attribute.delete');

    //attribute infraction
    Route::resource('attrib-infra', AttributeInfractionController::class);
    Route::get('/attrib-infra/delete/{id}',[AttributeInfractionController::class,'destroy'])->name('attrib-infra.delete');

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
    Route::resource('score-summary', ModScoreSummaryController::class);
    Route::get('/score-summary/view/{id}',[ModScoreSummaryController::class,'show'])->name('score-summary.show');

    //deputy mods
    Route::resource('deputy-mods', DeputyModsController::class);
    Route::resource('deputy-mods-nte', DeputyModsNteController::class);
    Route::resource('deputy-mods-infra', DeputyModsInfractionController::class);

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

    //QA dashboard
    Route::resource('qa-dashboard', QaDashboardController::class);

    //Mod dashboard
    Route::resource('mod-dashboard', ModDashboardController::class);

    //exports
    Route::get('export-team-summary',[QaDashboardController::class,'exportTeamSummary'])->name('export-team-summary');
    Route::get('export-team-infraction',[QaDashboardController::class,'exportTeamInfraction'])->name('export-team-infraction');
    Route::get('export-infraction-attribute',[QaDashboardController::class,'exportInfractionAttribute'])->name('export-infraction-attribute');
    Route::get('export-summary-infraction',[QaDashboardController::class,'exportSummaryCommittedInfraction'])->name('export-summary-infraction');
    Route::get('export-attribute-summary',[QaDashboardController::class,'exportAttributeSummary'])->name('export-attribute-summary');

    //Users Manual
    Route::resource('user-manual', UserManualController::class);
    Route::get('/user-manual/view/{id}/{filename}',[UserManualController::class,'show'])->name('user-manual.show');
    Route::get('/user-manual/delete/{id}',[UserManualController::class,'destroy'])->name('user-manual.delete');

    //Users Manual Access
    Route::resource('user-manual-access', UserManualAccessController::class);
    //Route::get('/user-manual-access/view/{id}/{filename}',[UserManualController::class,'show'])->name('user-manual.show');
    //Route::get('/user-manual-access/update/{id}', [UserManualAccessController::class, 'update'])->name('user-manual-access.update');
    Route::get('/user-manual-access/delete/{id}',[UserManualAccessController::class,'destroy'])->name('user-manual-access.delete');
    Route::post('/user-manual-access/assign-access',[UserManualAccessController::class,'assign_access'])->name('user-manual.assign-access');

    //User Type
    Route::resource('user-type', UserTypeController::class);
    Route::get('/user-type/delete/{id}',[UserTypeController::class,'destroy'])->name('user-type.delete');
    //Route::get('/user-type/mods',[UserTypeController::class,'mods']);
    
    //Assign User Type
    Route::resource('assign-user-type', UserTypeAssignController::class);
    //Route::get('/assign-user-type/assign/{id}',[UserTypeAssignController::class,'assign'])->name('user-type.assign');
    Route::post('/assign-user-type/assign-multiple',[UserTypeAssignController::class,'assign_usertype'])->name('user-type.assign-multiple');
    
    //calendar
    Route::get('/schedules',  [App\Http\Controllers\HomeController::class, 'index'])->name('index');
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

