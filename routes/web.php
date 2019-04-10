<?php

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
    return view('index.index');
})->name('index');
//Candidato
Route::group(['prefix' => 'candidate', 'as'=>'candidate.',], function () {
  Route::get('/candidato', function (){return view('candidate.pages.index');})->name('index');
  Route::get('/novo-candidato', 'Candidate\CandidateController@create')->name('create');
  Route::post('/novo-candidato/store', 'Candidate\CandidateController@store')->name('store');
  Route::get('/novo-candidato/dados/{id}', 'Candidate\CandidateController@data')->name('data');
  Route::post('/novo-candidato/update', 'Candidate\CandidateController@update')->name('update');
  Route::get('/novo-candidato/melhorar/{id}', 'Candidate\CandidateController@better')->name('better');
  Route::get('/candidato/editar/{id}', 'Candidate\CandidateController@edit')->name('edit');
  Route::post('candidato/formacao', 'Candidate\CandidateController@formation')->name('formation');
  Route::post('candidato/experiencia', 'Candidate\CandidateController@experience')->name('experience');
  Route::post('candidato/idiomas', 'Candidate\CandidateController@language')->name('language');
  Route::post('candidato/conhecimento', 'Candidate\CandidateController@knowledge')->name('knowledge');
  Route::get('candidato/pesquisar', 'Candidate\CandidateController@search')->name('search');

  //Controle de Registro e Login
  Route::get('/login', 'CandidateAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CandidateAuth\LoginController@login');
  Route::post('/logout', 'CandidateAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CandidateAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CandidateAuth\RegisterController@register');

  Route::post('/password/email', 'CandidateAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CandidateAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CandidateAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CandidateAuth\ResetPasswordController@showResetForm');
});

//Empresa
Route::group(['prefix' => 'company', 'as'=>'company.',], function () {
  Route::get('/empresa', function (){return view('company.pages.index-empresa');})->name('index');
  Route::post('/nova-empresa/store', 'Company\CompanyController@store')->name('store');
  Route::get('/nova-empresa/dados/{id}', 'Company\CompanyController@data')->name('data');
  Route::post('/nova-empresa/update', 'Company\CompanyController@update')->name('update');
  Route::get('/nova-empresa/vaga/{id}', 'Company\CompanyController@opportunity')->name('opportunity');
  // Route::get('/candidato/editar/{id}', 'Company\CompanyController@edit')->name('edit');
  // Route::post('candidato/formacao', 'Company\CompanyController@formation')->name('formation');
  // Route::post('candidato/experiencia', 'Company\CompanyController@experience')->name('experience');
  // Route::post('candidato/idiomas', 'Company\CompanyController@language')->name('language');
  // Route::post('candidato/conhecimento', 'Company\CompanyController@knowledge')->name('knowledge');
  // Route::get('candidato/pesquisar', 'Company\CompanyController@search')->name('search');


  Route::get('/login', 'CompanyAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CompanyAuth\LoginController@login');
  Route::post('/logout', 'CompanyAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CompanyAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CompanyAuth\RegisterController@register');

  Route::post('/password/email', 'CompanyAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CompanyAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CompanyAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CompanyAuth\ResetPasswordController@showResetForm');
});

//Administrador
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
