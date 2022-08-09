<?php
use Illuminate\Support\Facades\Route;
// Companies
Route::post('/create-company','CompaniesController@createCompany');
Route::get('/get-companies','CompaniesController@getCompanies');
