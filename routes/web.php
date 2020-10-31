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

Route::middleware(['auth', 'confirmed'])->group(function() {
    Route::get('/companies', 'CompanyController@list')->name('companies.list');
    Route::get('/c/{company_id}', 'CompanyController@show')->name('companies.show');
    Route::get('/documents', 'PaperController@list')->name('documents.list');

    Route::get('/paper/create', 'PaperController@create')->name('paper.create');
    Route::post('/paper/create', 'PaperController@addPaper')->name('paper.creation');
    Route::get('/admin/companies', 'AdminController@list')->name('admin.companies.list');
    Route::get('/admin/c/{company_id}/', 'AdminController@showCompany')->name('admin.company.documents');
    Route::get('/complete/paper/{doc}', 'PaperController@showPaper')->name('paper.complete');
    Route::post('/complete/paper/{doc}', 'PaperController@submitPaper')->name('paper.submit');
    Route::get('/document/{id}/pdf', 'PaperController@pdf')->name('paper.pdf');
  
    Route::middleware(['admin'])->group(function(){
        Route::get('/admin/users/pending', 'AdminController@pendingUsers')->name('admin.users.pending');
        Route::get('/admin/users/pending/{user_id}', 'AdminController@pendingUser')->name('admin.user.pending');
        Route::post('/user/activate/{user_id}', 'AdminController@activateUser')->name('user.activate');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
