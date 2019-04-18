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

Route::get('/', 'Candidate\CandidateController@home')->name('home');
//Candidato middleware
Route::group(['prefix' => 'candidate', 'as'=>'candidate.', 'middleware' => ['candidate']], function () {
  Route::get('/candidato', 'Candidate\CandidateController@index')->name('index');
  Route::get('/novo/dados/{id}', 'Candidate\CandidateController@data')->name('data');
  Route::post('/novo/update', 'Candidate\CandidateController@update')->name('update');
  Route::get('/nova/cidade', 'Company\OpportunityController@cities')->name('cities');
  Route::get('/novo/melhorar/{id}', 'Candidate\CandidateController@better')->name('better');
  Route::get('/mensagem', 'Candidate\CandidateController@indexMessage')->name('index.message');
  Route::get('/editar', 'Candidate\CandidateController@edit')->name('edit');
  Route::get('/visualizar', 'Candidate\CandidateController@show')->name('show');
  Route::get('/candidatura/{id}', 'Candidate\CandidateController@application')->name('application');
  Route::post('/formacao', 'Candidate\CandidateController@formation')->name('formation');
  Route::get('/formacao/curso', 'Candidate\CandidateController@courseFormation')->name('course');
  Route::post('/experiencia', 'Candidate\CandidateController@experience')->name('experience');
  Route::post('/idiomas', 'Candidate\CandidateController@language')->name('language');
  Route::post('/conhecimento', 'Candidate\CandidateController@knowledge')->name('knowledge');
  Route::get('/formacao/{id}', 'Candidate\CandidateController@formationDestroy')->name('formation.destroy');
  Route::get('/experiencia/{id}', 'Candidate\CandidateController@experienceDestroy')->name('experience.destroy');
  Route::get('/idiomas/{id}', 'Candidate\CandidateController@languageDestroy')->name('language.destroy');
  Route::get('/conhecimento/subconhecimento', 'Candidate\CandidateController@subknowledge')->name('subknowledge');
  Route::get('/conhecimento/{id}', 'Candidate\CandidateController@knowledgeDestroy')->name('knowledge.destroy');
});
//Candidato
Route::group(['prefix' => 'candidate', 'as'=>'candidate.',], function () {

  Route::get('/pesquisa', 'Candidate\CandidateController@opportunity')->name('opportunity');
  Route::get('/pesquisar', 'Candidate\CandidateController@search')->name('search');
  Route::get('/oportunidade/{id}', 'Candidate\CandidateController@showOpportunity')->name('show.opportunity');
  //Controle de Registro e Login
  Route::get('/novo', 'Candidate\CandidateController@create')->name('create');
  Route::post('/novo/store', 'Candidate\CandidateController@store')->name('store');
  Route::get('/login', 'CandidateAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CandidateAuth\LoginController@login');
  Route::get('/logout', 'CandidateAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CandidateAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CandidateAuth\RegisterController@register');

  Route::post('/password/email', 'CandidateAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CandidateAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CandidateAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CandidateAuth\ResetPasswordController@showResetForm');
});

//Empresa
Route::group(['prefix' => 'company', 'as'=>'company.'], function () {
  Route::get('/', 'Company\CompanyController@index')->name('index');
  Route::post('session', 'Company\CompanyController@session')->name('session');
  Route::get('/perfil', 'Company\CompanyController@show')->name('show');
  Route::get('/login', 'CompanyAuth\LoginController@showLoginForm')->name('login');
  Route::get('/nova/criar', 'Company\CompanyController@create')->name('create');
  Route::post('/nova/store', 'Company\CompanyController@store')->name('store');
  Route::get('/candidatos', 'Company\CompanyController@candidate')->name('candidate');
  Route::get('/candidato/{id}', 'Company\CompanyController@showCV')->name('cv');
  
  Route::post('/login', 'CompanyAuth\LoginController@login');

  Route::get('/register', 'CompanyAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CompanyAuth\RegisterController@register');

  Route::post('/password/email', 'CompanyAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CompanyAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CompanyAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CompanyAuth\ResetPasswordController@showResetForm');
  Route::get('/logout', 'CompanyAuth\LoginController@logout')->name('logout');
});

//Empresa middleware
Route::group(['prefix' => 'company', 'as'=>'company.', 'middleware' => ['company']], function () {
  Route::post('/candidato', 'Company\CompanyController@message')->name('message');
  Route::get('/mensagem', 'Company\CompanyController@indexMessage')->name('index.message');
  Route::get('/nova/editar', 'Company\CompanyController@edit')->name('edit');
  Route::post('/password', 'Company\CompanyController@password')->name('password');
  Route::get('/nova/dados', 'Company\CompanyController@data')->name('data');
  Route::post('/nova/update', 'Company\CompanyController@update')->name('update');
});

//Vagas
Route::group(['prefix' => 'vaga', 'as'=>'opportunity.', 'middleware' => ['company']], function () {
  Route::get('/empresa/', 'Company\OpportunityController@index')->name('index');
  Route::get('/criar', 'Company\OpportunityController@create')->name('create');
  Route::post('/store', 'Company\OpportunityController@store')->name('store');
  Route::get('/nova/cidade', 'Company\OpportunityController@cities')->name('cities');
  Route::get('/editar/{id}', 'Company\OpportunityController@edit')->name('edit');
  Route::post('/update', 'Company\OpportunityController@update')->name('update');
  Route::get('/publish/{id}', 'Company\OpportunityController@publish')->name('publish');
  Route::get('/destroy/{id}', 'Company\OpportunityController@destroy')->name('destroy');
  Route::get('visualizar/{id}', 'Company\OpportunityController@show')->name('show');
  Route::get('candidatos/{id}', 'Company\OpportunityController@showCandidate')->name('candidate');
});

//Administrador
Route::group(['prefix' => 'admin', 'as'=>'admin.'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'admin','as'=>'admin.', 'middleware' =>['admin']], function(){
  Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard')
  ;
  Route::get('/pages', 'Admin\AdminController@pages')->name('pages');
  Route::get('/pages/edit/{id}', 'Admin\AdminController@editPages')->name('pages.edit');
  Route::post('/pages/update', 'Admin\AdminController@updatePages')->name('pages.update');

  Route::get('/vagas', 'Admin\AdminController@indexOpportunity')->name('opportunities');
  Route::post('/vagas/update', 'Admin\AdminController@updateOpportunity')->name('opportunities.update');
  Route::get('/vagas/edit/{id}', 'Admin\AdminController@editOpportunity')->name('opportunities.edit');
  Route::get('/vagas/show/{id}', 'Admin\AdminController@showOpportunity')->name('opportunities.show');
  Route::get('/vagas/remove/{id}', 'Admin\AdminController@removeOpportunity')->name('opportunities.remove');

  Route::get('/empresas', 'Admin\AdminController@indexCompany')->name('company');
  Route::get('/empresas/edit/{id}', 'Admin\AdminController@editCompany')->name('company.edit');
  Route::post('/empresas/update', 'Admin\AdminController@updateCompany')->name('company.update');
  Route::get('/empresas/show/{id}', 'Admin\AdminController@showCompany')->name('company.show');
  Route::get('/empresas/remove/{id}', 'Admin\AdminController@removeCompany')->name('company.remove');

  Route::get('/candidatos', 'Admin\AdminController@indexCandidate')->name('candidate');
  Route::get('/candidatos/edit/{id}', 'Admin\AdminController@editCandidate')->name('candidate.edit');
  Route::post('/candidatos/update', 'Admin\AdminController@updateCandidate')->name('candidate.update');
});

Route::get('/{urn}', 'Admin\AdminController@footer')->name('footer');
