<?php
use App\Http\Controllers\AdminvideoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');







Route::resource('dashboard','AdminController');

Route::get('/myprofile',[App\Http\Controllers\UserController::class, 'myprofile'])->name('profiles.myprofile');

Route::get( '/changename',[App\Http\Controllers\UserController::class, 'changename'])->name('profiles.changename');
Route::post( '/changename',[App\Http\Controllers\UserController::class, 'changename'])->name('profiles.changename');

Route::get( '/changeemail',[App\Http\Controllers\UserController::class, 'changeemail'])->name('profiles.changeemail');
Route::post( '/changeemail',[App\Http\Controllers\UserController::class, 'changeemail'])->name('profiles.changemail');

Route::get( '/updatepassword',[App\Http\Controllers\UserController::class, 'updatepassword'])->name('profiles.updatepassword');
Route::post( '/updatepassword',[App\Http\Controllers\UserController::class, 'updatepassword'])->name('profiles.updatepassword');



Route::resource('video', VideoController::class)->middleware('auth','permission:admin');

Route::resource('adminvideo', AdminvideoController::class)->middleware('auth','permission:admin');

Route::resource('admin', AdminController::class)->middleware('auth','permission:admin');

Route::get('/deleteuser', function () {

    return view ('admin.index');


}) ->name('deleteuser')->middleware('auth', 'role:admin');




