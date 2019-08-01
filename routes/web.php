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
Route::group(['prefix' => 'candidato', 'as'=>'candidate.', 'middleware' => ['candidate']], function () {
  Route::get('/', 'Candidate\CandidateController@index')->name('index');
  Route::post('/password', 'Candidate\CandidateController@password')->name('password');
  Route::get('/novo/dados/{id}', 'Candidate\CandidateController@data')->name('data');
  Route::post('/novo/update', 'Candidate\CandidateController@update')->name('update');
  Route::get('/novo/melhorar/{id}', 'Candidate\CandidateController@better')->name('better');
  Route::get('/mensagem', 'Candidate\CandidateController@indexMessage')->name('index.message');
  Route::get('/editar', 'Candidate\CandidateController@edit')->name('edit');
  Route::get('/oportunidade/{id}', 'Candidate\CandidateController@showOpportunity')
    ->name('show.opportunity')->middleware('check.plan');
  Route::get('/visualizar', 'Candidate\CandidateController@show')->name('show');
  Route::get('/assinaturas', 'Admin\PagSeguroController@subscriptions')->name('subscriptions');
  Route::get('/candidaturas', 'Candidate\CandidateController@app')->name('app');
  Route::get('/candidatura/{id}', 'Candidate\CandidateController@application')->name('application');

  Route::group(['prefix' => 'formacao', 'as' => 'formation.'], function () {
    Route::post('store', 'Candidate\FormationController@store')->name('store');
    Route::post('update', 'Candidate\FormationController@update')->name('update');
    Route::get('delete/{formation}', 'Candidate\FormationController@delete')->name('delete');
  });
  Route::group(['prefix' => 'experiencia-profissional', 'as' => 'professional.'], function () {
    Route::post('store', 'Candidate\ProfessionalController@store')->name('store');
    Route::post('update', 'Candidate\ProfessionalController@update')->name('update');
    Route::get('delete/{professional}', 'Candidate\ProfessionalController@delete')->name('delete');
  });

  Route::group(['prefix' => 'idioma', 'as' => 'language.'], function () {
    Route::post('store', 'Candidate\LanguageController@store')->name('store');
    Route::post('update', 'Candidate\LanguageController@update')->name('update');
    Route::get('delete/{language}', 'Candidate\LanguageController@delete')->name('delete');
  });

  Route::group(['prefix' => 'conhecimentos-informatica', 'as' => 'knowledge.'], function () {
    Route::post('store', 'Candidate\KnowledgeController@store')->name('store');
    Route::post('update', 'Candidate\KnowledgeController@update')->name('update');
    Route::get('delete/{knowledge}', 'Candidate\KnowledgeController@delete')->name('delete');
  });
// Transações
  Route::group(['prefix' => 'transacao', 'as' => 'transaction.'], function (){
    Route::get('/generate', 'Admin\PagSeguroController@getSession')->name('generate');
    Route::post('/hash', 'Admin\PagSeguroController@hash')->name('hash');
    Route::get('/checkout', 'Admin\PagSeguroController@checkout')->name('checkout');
    Route::post('/checkout', 'Admin\PagSeguroController@finishCheckout')->name('finishCheckout');
  });

});
//Candidato
Route::group(['prefix' => 'candidato', 'as'=>'candidate.',], function () {
  Route::get('/nova/cidade', 'Company\OpportunityController@cities')->name('cities');

  Route::get('/pesquisa', 'Candidate\CandidateController@opportunity')->name('opportunity');
  Route::get('/pesquisar', 'Candidate\CandidateController@search')->name('search');
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
Route::group(['prefix' => 'empresa', 'as'=>'company.'], function () {
  Route::get('/', 'Company\CompanyController@index')->name('index');
  Route::post('session', 'Company\CompanyController@session')->name('session');
  Route::get('/perfil', 'Company\CompanyController@show')->name('show');
  Route::get('/login', 'CompanyAuth\LoginController@showLoginForm')->name('login');
  Route::get('/nova/criar', 'Company\CompanyController@create')->name('create');
  Route::post('/nova/store', 'Company\CompanyController@store')->name('store');
  Route::get('/candidatos', 'Company\CompanyController@candidate')->name('candidate');
  Route::get('/candidato/{id}', 'Company\CompanyController@showCV')->name('cv')->middleware('check.plan');;
  Route::get('/assinaturas', 'Admin\PagSeguroController@subscriptions')->name('subscriptions');

  Route::group(['prefix' => 'transacao', 'as' => 'transaction.'], function (){
    Route::get('/generate', 'Admin\PagSeguroController@getSession')->name('generate');
    Route::post('/hash', 'Admin\PagSeguroController@hash')->name('hash');
    Route::get('/checkout', 'Admin\PagSeguroController@checkout')->name('checkout');
    Route::post('/checkout', 'Admin\PagSeguroController@finishCheckout')->name('finishCheckout');
    Route::get('/cancelar/', 'Admin\PagSeguroController@cancelPlan')->name('cancel');
  });

  
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
Route::group(['prefix' => 'empresa', 'as'=>'company.', 'middleware' => ['company']], function () {
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
  Route::get('/criar', 'Company\OpportunityController@create')->name('create')->middleware('check.plan');
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
  Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
  Route::get('/paginas', 'Admin\PagesController@index')->name('pages');
Route::group(['prefix' => 'paginas','as'=>'pages.'], function(){
  Route::get('/edit/{id}', 'Admin\PagesController@edit')->name('edit');
  Route::post('/update', 'Admin\PagesController@update')->name('update');
});

  Route::get('frequentes/', 'Admin\AdminController@frequently')->name('frequentlys');
  Route::get('/frequentes/create/', 'Admin\AdminController@createFrequently')->name('frequently.create');
  Route::post('/frequentes/store', 'Admin\AdminController@storeFrequently')->name('frequently.store');
  Route::get('/frequentes/edit/{id}', 'Admin\AdminController@editFrequently')->name('frequently.edit');
  Route::post('/frequentes/update', 'Admin\AdminController@updateFrequently')->name('frequently.update');

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
  Route::get('/candidatos/edit/{id}', 'Admin\CandidateController@edit')->name('candidate.edit');
  Route::post('/candidatos/update', 'Admin\CandidateController@update')->name('candidate.update');
  Route::get('/planos', 'Admin\PagSeguroController@index')->name('plan');
  
  Route::group(['prefix' => 'planos', 'as' => 'plan.'], function(){
    Route::get('/criar', 'Admin\PagSeguroController@create')->name('create');
    Route::post('/criar', 'Admin\PagSeguroController@store')->name('store');
    Route::get('/edit/{id}', 'Admin\PagSeguroController@edit')->name('edit');
    Route::post('/update', 'Admin\PagSeguroController@update')->name('update');
    Route::get('/usuarios/{id}', 'Admin\PagSeguroController@allUsers')->name('all-users');

  });

  Route::get('/parceiros', 'Admin\PartnerController@index')->name('partner');
  Route::group(['prefix' => 'parceiros', 'as' => 'partner.'], function(){
    Route::get('/criar', 'Admin\PartnerController@create')->name('create');
    Route::post('/criar', 'Admin\PartnerController@store')->name('store');
    Route::get('/editar/{id}', 'Admin\PartnerController@edit')->name('edit');
    Route::post('/editar', 'Admin\PartnerController@update')->name('update');
    Route::get('/remover/{id}', 'Admin\PartnerController@delete')->name('delete');

  });

  Route::get('/videos', 'Admin\VideoController@index')->name('video');
  Route::group(['prefix' => 'videos', 'as' => 'video.'], function(){
    Route::get('/criar', 'Admin\VideoController@create')->name('create');
    Route::post('/criar', 'Admin\VideoController@store')->name('store');
    Route::get('/editar/{id}', 'Admin\VideoController@edit')->name('edit');
    Route::post('/editar', 'Admin\VideoController@update')->name('update');
    Route::get('/remover/{id}', 'Admin\VideoController@delete')->name('delete');

  });
});

Route::post('cursos/', 'Candidate\CandidateController@getCourses')->name('get-courses');
Route::post('cidades/', 'Candidate\CandidateController@getCities')->name('get-cities');
Route::post('conhecimentos/', 'Candidate\CandidateController@getSubknowledges')->name('get-subknowledges');

Route::get('perguntas-frequentes', 'Admin\AdminController@showFrequently')->name('frequentlys');
Route::get('/paginas/{urn}', 'Admin\PagesController@footer')->name('footer');
