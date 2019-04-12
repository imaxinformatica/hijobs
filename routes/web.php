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
Route::group(['prefix' => 'candidate', 'as'=>'candidate.', 'middleware' => ['candidate']], function () {
  Route::get('/candidato', function (){return view('candidate.pages.index');})->name('index');
  Route::get('/novo/dados/{id}', 'Candidate\CandidateController@data')->name('data');
  Route::post('/novo/update', 'Candidate\CandidateController@update')->name('update');
  Route::get('/novo/melhorar/{id}', 'Candidate\CandidateController@better')->name('better');
  Route::get('/editar', 'Candidate\CandidateController@edit')->name('edit');
  Route::get('/visualizar', 'Candidate\CandidateController@show')->name('show');
  Route::post('/formacao', 'Candidate\CandidateController@formation')->name('formation');
  Route::post('/experiencia', 'Candidate\CandidateController@experience')->name('experience');
  Route::post('/idiomas', 'Candidate\CandidateController@language')->name('language');
  Route::post('/conhecimento', 'Candidate\CandidateController@knowledge')->name('knowledge');
  Route::get('/formacao/{id}', 'Candidate\CandidateController@formationDestroy')->name('formation.destroy');
  Route::get('/experiencia/{id}', 'Candidate\CandidateController@experienceDestroy')->name('experience.destroy');
  Route::get('/idiomas/{id}', 'Candidate\CandidateController@languageDestroy')->name('language.destroy');
  Route::get('/conhecimento/{id}', 'Candidate\CandidateController@knowledgeDestroy')->name('knowledge.destroy');
  Route::get('/pesquisa', 'Candidate\CandidateController@opportunity')->name('opportunity');
  Route::get('/pesquisar', 'Candidate\CandidateController@search')->name('search');
});

Route::group(['prefix' => 'candidate', 'as'=>'candidate.',], function () {

  //Controle de Registro e Login
  Route::get('/novo', 'Candidate\CandidateController@create')->name('create');
  Route::post('/novo/store', 'Candidate\CandidateController@store')->name('store');
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
Route::group(['prefix' => 'company', 'as'=>'company.', 'middleware' => ['company']], function () {
  Route::get('/', function (){return view('company.pages.index-empresa');})->name('index');
  Route::post('session', 'Company\CompanyController@session')->name('session');
  Route::get('/perfil', 'Company\CompanyController@show')->name('show');
  Route::get('/nova/criar', 'Company\CompanyController@create')->name('create');
  Route::post('/nova/store', 'Company\CompanyController@store')->name('store');
  Route::get('/nova/editar', 'Company\CompanyController@edit')->name('edit');
  Route::post('/password', 'Company\CompanyController@password')->name('password');
  Route::get('/nova/dados', 'Company\CompanyController@data')->name('data');
  Route::post('/nova/update', 'Company\CompanyController@update')->name('update');
  Route::get('/candidatos', 'Company\CompanyController@candidate')->name('candidate');


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
//Vagas
Route::group(['prefix' => 'vaga', 'as'=>'opportunity.', 'middleware' => ['company']], function () {
  Route::get('/empresa/', 'Company\OpportunityController@index')->name('index');
  Route::get('/criar', 'Company\OpportunityController@create')->name('create');
  Route::post('/store', 'Company\OpportunityController@store')->name('store');
  Route::get('/editar/{id}', 'Company\OpportunityController@edit')->name('edit');
  Route::post('/update', 'Company\OpportunityController@update')->name('update');
  Route::get('/publish/{id}', 'Company\OpportunityController@publish')->name('publish');
  Route::get('/destroy/{id}', 'Company\OpportunityController@destroy')->name('destroy');
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
