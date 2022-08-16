<?php
use Illuminate\Support\Facades\Route;
// Companies
Route::post('/create-company','CompaniesController@createCompany');
Route::post('/add-appointment','TransfersController@saveTransfer');
Route::get('/get-companies','CompaniesController@getCompanies');
