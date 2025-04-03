<?php

use App\Http\Controllers\Admin\CircularController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberRegController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\ForecastActualController;
use App\Http\Controllers\Admin\EnergySourceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserloginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/', [MemberRegController::class, 'welcome'])->name('welcome');

// Route::get('/MemberLogin', function () {
//     return view('front/login');
// });

// Route::get('/MemberLogin', function () {
//     return view('front/register');
// });


// Route::view('/MemberLogin', 'front.login')->name('MemberLogin');

Route::get('/member_login', [LoginController::class, 'showMemberLoginForm'])->name('MemberLogin');
Route::view('/new_member_request', 'front.register')->name('MemberReg');
Route::post('/login', [LoginController::class, 'login']);

Route::view('/contact_us', 'front.contact')->name('Contact');

Route::view('/repa_mart', 'front.repamart')->name('repamart');

// Route::view('/Events', 'front.events')->name('Events');

Route::view('/why', 'front.why')->name('Why');


Route::view('/team', 'front.team')->name('team');
Route::view('/consultants', 'front.consultants')->name('consultants');

Route::view('/advocates', 'front.advocate')->name('advocate');


Route::view('/downloads', 'front.download')->name('download');

Route::view('/committee', 'front.committee')->name('committee');


Route::get('forcastvsactuals', [MemberRegController::class, 'forcastvsactuals'])->name('forcastvsactuals');
Route::get('showprofile', [MemberRegController::class, 'showprofile'])->name('showprofile');



Route::get('showenergy', [MemberRegController::class, 'showenergy'])->name('showenergy');

Route::post('/profile/update/{id}', [MemberRegController::class, 'updateProfile'])->name('profile.update');


Route::get('/members', [MemberRegController::class, 'memberlist'])->name('memberlist');


// Route::get('/memberdetails', [MemberRegController::class, 'memberdetails'])->name('memberdetails');

Route::get('/memberdetails/{id}', [MemberRegController::class, 'membershow'])
    ->name('membershow');
    

Route::get('/oems', [MemberRegController::class, 'memberlist'])->name('oems');
Route::get('/amc_service_providers', [MemberRegController::class, 'memberlist'])->name('amc_service');


Route::get('/vendors', [MemberRegController::class, 'memberlist'])->name('vendors');

Route::get('/other_service_providers', [MemberRegController::class, 'memberlist'])->name('otherservice');


 Route::get('event_details/{id}', [MemberRegController::class, 'show'])->name('event_details');
 
Route::post('/register-member', [MemberRegController::class, 'store'])->name('register.member');

Route::get('/index', [MemberRegController::class, 'index'])->name('member.index');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');Route::group(['middleware' => 'guest'], function () {

// });
// Route::get('/profile', [LoginController::class, 'show'])->name('MemberProfile');
// Route::view('/MemberLogin', 'front.login')->name('MemberLogin');

Route::get('/member_login', function (Request $request) {
    if ($request->has('redirect_url')) {
        session(['redirect_url' => $request->redirect_url]); // Store the redirect URL in session
    }
    return view('front.login');
})->name('MemberLogin');
Route::view('/new_member_request', 'front.register')->name('MemberReg');
Route::group(['middleware' => 'auth'], function () {
    Route::get('adminpanel/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

   
});

Route::view('/contact_us', 'front.contact')->name('Contact');
Route::view('/event', 'front.events')->name('Events');
Route::view('/objectives', 'front.why')->name('Why');
Route::view('/office_bearers', 'front.team')->name('team');
Route::view('/executive_committee', 'front.committee')->name('committee');

//Route::post('/register-member', [MemberRegController::class, 'store'])->name('register.member');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('members', MemberController::class)->names([
        'index' => 'members.index'
    ]);
Route::post('/fees/store', [FeeController::class, 'store'])->name('fees.store');

Route::post('/members/import', [MemberController::class, 'import'])->name('members.import');

    Route::get('/members/{id}', [MemberController::class, 'show'])->name('members.show');

    Route::post('/updateStatus', [FeeController::class, 'update'])->name('updateStatus');

     Route::resource('events', EventsController::class);

    Route::resource('forecast', ForecastActualController::class);
    
  Route::match(['put', 'post'], '/forecast/update', [ForecastActualController::class, 'update'])->name('forecast.update');

 Route::get('/payments', [MemberController::class, 'payments'])->name('payments');

Route::delete('/forecast/delete/{id}', [ForecastActualController::class, 'destroy'])->name('forecast.delete');


// Route::delete('/forecast/delete/{id}', [ForecastActualController::class, 'destroy'])->name('forecast.destroy');

    Route::resource('energysource', EnergySourceController::class);

    Route::put('/admin/energysource/{energysource}', [EnergySourceController::class, 'update'])
    ->name('energysource.update');

    Route::get('/availability', [EnergySourceController::class, 'availability'])->name('availability');
    Route::post('/availability-store', [EnergySourceController::class, 'availabilitystore'])->name('availabilitystore');
    
   Route::put('/admin/update-availability/{id}', [EnergySourceController::class, 'updateAvailability'])
    ->name('updateAvailability');

Route::delete('/delete-availability/{id}', [EnergySourceController::class, 'deleteAvailability'])->name('deleteAvailability');


    
    Route::post('/formstore', [CircularController::class, 'formstore'])->name('circular.formstore');
    
     Route::post('/commentsstore', [CircularController::class, 'commentsstore'])->name('circular.commentsstore');
     
        Route::get('formindex', [CircularController::class, 'formindex'])->name('circular.formindex');
        
              Route::get('annualindex', [CircularController::class, 'annualindex'])->name('circular.annualindex');
              
                Route::get('commentsindex', [CircularController::class, 'commentsindex'])->name('circular.commentsindex');
     
        Route::post('/annualreportstore', [CircularController::class, 'annualreportstore'])->name('circular.annualreportstore');

    Route::resource('circular', CircularController::class);
    
Route::get('/circulars/view/{id}', [CircularController::class, 'viewPdf'])
    ->middleware('auth') // Ensures only logged-in users can access
    ->name('circulars.view');

Route::get('/comments/view/{id}', [CircularController::class, 'commentsview'])
    ->middleware('auth') // Ensures only logged-in users can access
    ->name('comments.view');

    Route::post('/payments/store', [MemberController::class, 'paymentstore'])->name('payments.store');

    Route::get('/latestnews', [MemberController::class, 'latestnews'])->name('latestnews');
    Route::post('/lateststore', [MemberController::class, 'lateststore'])->name('lateststore');
    
    
    Route::post('/latestnews/update', [MemberController::class, 'latestupdate'])->name('latestnews.update');
Route::post('/latestnews/delete', [MemberController::class, 'latestdelete'])->name('latestnews.delete');
    

    Route::put('/form/update/{id}', [CircularController::class, 'formUpdate'])->name('form.update');
    Route::delete('/circular/{id}/delete', [CircularController::class, 'formdestroy'])->name('form.destroy');

    Route::put('/annual/update/{id}', [CircularController::class, 'annualUpdate'])->name('annual.update');
    Route::delete('/annual/{id}/delete', [CircularController::class, 'annualdestroy'])->name('annual.destroy');

    Route::put('/comment/update/{id}', [CircularController::class, 'commentUpdate'])->name('comment.update');
    Route::delete('/comment/{id}/delete', [CircularController::class, 'commentdestroy'])->name('comment.destroy');


});





