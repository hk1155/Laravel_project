<?php

use App\Http\Controllers\ajaxcontroller;
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
    Route::get('/home', 'Mycontroller@home');
    Route::get('/viewproduct', 'Mycontroller@Viewproduct');
    Route::get('/managecategory', 'Mycontroller@managecategory');
    Route::get('/managecompany', 'Mycontroller@managecompany');
    Route::get('/addproduct', 'Mycontroller@addproduct');
    Route::get('/addcategory', 'Mycontroller@addcategory');
    Route::get('/managedata', 'ajaxcontroller@managedata');
    Route::get('/getData/{id?}', 'ajaxcontroller@getdata');

    Route::get('deleteprod/{id}', 'Mycontroller@deleteprod');
    Route::get('/statustogle/{id}', 'Mycontroller@statustogle');
    Route::get('/cattogle/{id}', 'Mycontroller@cattogle');
    Route::post('/insertproduct', 'Mycontroller@insertproduct');
    // Route::post('/insertcategory', 'Mycontroller@insertcategory');
    Route::post('/insertcompany', 'Mycontroller@insertcompany');
    Route::post('/insertcat', 'ajaxcontroller@insertcat');

    Route::get('/myajax/{id}', 'ajaxcontroller@deleteproduct');
    Route::get('/showcat/{compid}', 'ajaxcontroller@showcatdd');
    Route::get('/getData/{id?}', 'ajaxcontroller@getdata');
    Route::get('/editcat/{id}', 'Mycontroller@editcat');
    Route::post('/updatecat', 'Mycontroller@updatecat');
});

Route::view('/login', 'login')->name("login");
Route::view('/register', 'Registration');
Route::get('/logout', 'Mycontroller@logout');
Route::post('/adduser', 'Mycontroller@adduser');
Route::post('/login1', 'Mycontroller@login1');
