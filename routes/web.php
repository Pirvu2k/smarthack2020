<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/paper/create', 'PaperController@create')->name('paper.create')->middleware('auth');
Route::post('/paper/create', 'PaperController@addPaper')->name('paper.creation')->middleware('auth');

Route::get('/complete/paper/{doc}', 'PaperController@showPaper')->name('paper.complete')->middleware('auth');
Route::post('/complete/paper/{doc}', 'PaperController@submitPaper')->name('paper.submit')->middleware('auth');
Route::get('/paper/create', 'PaperController@create')->name('paper.create');
Route::post('/paper/create', 'PaperController@addPaper')->name('paper.creation');
Route::get('/admin/companies', 'AdminController@list')->name('admin.companies.list')->middleware('auth');
Route::get('/document/{id}/pdf', 'PaperController@pdf')->name('paper.pdf');
Route::get('/admin/c/{company_id}/', 'AdminController@showCompany')->name('admin.company.documents')->middleware('auth');

