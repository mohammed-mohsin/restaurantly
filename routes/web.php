<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChefsController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\MyReservations;
use App\Models\Chefs;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\UsersController;
// use App\Http\Controllers\UsersController;
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

Route::get('/',[HomeController::class,'home' ] );

Route::group(['prefix' => 'admin', 'middleware' => 'auth','middleware' => 'isAdmin'], function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');

    Route::get('/restoreReservation/{reservation_id}', [AdminController::class, 'restoreReservation'])->name('restoreReservation');
    Route::get('/forcedDeleteReservation/{reservation_id}', [AdminController::class, 'forcedDeleteReservation'])->name('forcedDeleteReservation');
    Route::get('/confirmedReservation/{reservation_id}', [AdminController::class, 'confirmedReservation'])->name('confirmedReservation');
    Route::get('/cancelReservation/{reservation_id}', [AdminController::class, 'cancelReservation'])->name('cancelReservation');
    Route::post('/contact', [AdminController::class, 'contact'])->name('contact');
    Route::get('/contacts', [AdminController::class, 'contactShow'])->name('contact.index');
    Route::delete('/contactSeen/{contact_id}', [AdminController::class, 'contactSeen'])->name('contactSeen');


    Route::resource('/reservation', ReservationController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/item', ItemController::class);
    Route::resource('/chefs', ChefsController::class);
   
    // Route::resource('category',CategoryController::class);
    // Route::resource('item',ItemController::class);
    // Route::resource('reservation',ReservationController::class);
});

// Route::get('/user/dashboard', function () {
//     return view('user.dashboard')->name('user.dashboard');
// });
Route::resource('admin/reservation', ReservationController::class);
Route::post('admin/contact', [AdminController::class, 'contact'])->name('contact');
Route::resource('admin/testimonials', TestimonialsController::class);
Route::resource('admin/profile', ProfileController::class);
Route::resource('/myReservations', MyReservations::class);
Route::get('/user/dashboard', [AdminController::class, 'user'])->name('user.dashboard');
Route::get('home', [HomeController::class, 'home'])->name('home');



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
