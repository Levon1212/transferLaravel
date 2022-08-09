<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function createCompany(Request $request){
        $company = new Company;
        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->login = $request->input('login');
        $company->password = $request->input('password');
        $company->balance = $request->input('balance');
        if($company->save()){
            return response()->json(['message' => 'created']);
        }
    }
    public function getCompanies (){
        return response()->json(Company::all());
    }
}
