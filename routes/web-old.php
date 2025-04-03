<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberRegController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\EventsController;
Route::get('/', function () {
    return view('welcome');
});


// Route::get('/MemberLogin', function () {
//     return view('front/login');
// });

// Route::get('/MemberLogin', function () {
//     return view('front/register');
// });


Route::view('/MemberLogin', 'front.login')->name('MemberLogin');
Route::view('/MemberReg', 'front.register')->name('MemberReg');

Route::view('/Contact', 'front.contact')->name('Contact');

//Route::view('/event_details', 'front.event_details')->name('event_details');



Route::view('/why', 'front.why')->name('Why');

Route::view('/team', 'front.team')->name('team');


Route::view('/committee', 'front.committee')->name('committee');


Route::post('/register-member', [MemberRegController::class, 'store'])->name('register.member');

 Route::get('/event_details/{id}', [MemberRegController::class, 'show'])->name('event_details');

Route::get('/index', [MemberRegController::class, 'index'])->name('member.index');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');Route::group(['middleware' => 'guest'], function () {

// });
Route::view('/MemberLogin', 'front.login')->name('MemberLogin');
Route::view('/MemberReg', 'front.register')->name('MemberReg');
Route::group(['middleware' => 'auth'], function () {
    Route::get('adminpanel/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::view('/Contact', 'front.contact')->name('Contact');
Route::view('/Events', 'front.events')->name('Events');
Route::view('/why', 'front.why')->name('Why');
Route::view('/team', 'front.team')->name('team');
Route::view('/committee', 'front.committee')->name('committee');

Route::post('/register-member', [MemberRegController::class, 'store'])->name('register.member');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('members', MemberController::class)->names([
        'index' => 'members.index'
    ]);

    Route::resource('events', EventsController::class);
    
   

});





