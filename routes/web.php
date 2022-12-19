<?php
use Illuminate\Support\Facades\Route;
// Companies
Route::post('/create-company','CompaniesController@createCompany');
Route::get('/get-companies','CompaniesController@getCompanies');
Route::post('/update-companies-price','CompaniesController@updatePrice');
// Appointments
Route::post('/add-appointment','TransfersController@saveTransfer');
Route::get('/get-appointment','TransfersController@getTransfer');
Route::post('/get-one-appointment','TransfersController@getOneAppointment');
Route::get('/get-appointment-all','TransfersController@getTransferAll');
Route::post('/search-filter','TransfersController@filterAppointment');
Route::post('/update-status','TransfersController@changeStatus');
Route::post('/update-note','TransfersController@saveNote');
Route::post('/update-transfer','TransfersController@updateTransfer');

// Login
Route::post('/auth-company','CompaniesController@authCompany');
Route::post('/get-user','CompaniesController@getUser');
Route::post('/get-single-user','CompaniesController@getSingleUser');
// Driver
Route::resource('/driver','DriverController');
