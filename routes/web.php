<?php

use App\Http\Controllers\Mycontroller;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'Mycontroller@home')->name('home');
    Route::get('/viewproduct', 'Mycontroller@Viewproduct');
    Route::get('/managecategory', 'Mycontroller@managecategory');
});

Route::view('/login', 'login')->name("login");
Route::view('/register', 'Registration');
Route::view('/addproduct', 'Addproduct');
Route::view('/addcategory', 'Add_category');

Route::get('/logout', 'Mycontroller@logout');
Route::get('deleteprod/{id}', 'Mycontroller@deleteprod');
Route::get('/statustogle/{id}', 'Mycontroller@statustogle');
Route::get('/cattogle/{id}', 'Mycontroller@cattogle');

Route::post('/adduser', 'Mycontroller@adduser');
Route::post('/login1', 'Mycontroller@login1');
Route::post('/insertproduct', 'Mycontroller@insertproduct');
Route::post('/insertcategory', 'Mycontroller@insertcategory');

Route::get('/myajax/{id}', 'ajaxcontroller@deleteproduct');
