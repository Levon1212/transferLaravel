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
    public function updatePrice (Request $request){
        $comp = Company::where('id',$request->input('id'))->first();
        $comp->balance = $request->input('balance');
        if($comp->save()){
            return response()->json(['message' => 'updated']);
        }
    }
    public function getCompanies (){
        return response()->json(Company::all());
    }
    public function authCompany (Request $request){
        $company = Company::where('login',$request->input('login'))->first();
        return response()->json($company->id);
    }
    public function getUser (Request $request){
        $company = Company::where('id',$request->input('user_id'))->first();
        return response()->json($company);
    }
    public function getSingleUser (Request $request){
        $company = Company::where('id',$request->input('user_id'))->first();
        return response()->json($company);
    }
}
