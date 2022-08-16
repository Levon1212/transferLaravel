<?php

namespace App\Http\Controllers;

use App\Transfers;
use Illuminate\Http\Request;

class TransfersController extends Controller
{
    public function saveTransfer (Request $request){
        $transfer = new Transfers;
        $transfer->date = $request->input('date');
        $transfer->service = $request->input('service');
        $transfer->guest_name = $request->input('guest_name');
        $transfer->car_category = $request->input('car_category');
        $transfer->guide = $request->input('guide');
        $transfer->carseat = $request->input('carseat');
        $transfer->order_amount = $request->input('order_amount');
        $transfer->status = $request->input('status');
        $transfer->company_id = $request->input('company_id');
        $transfer->flight_number = $request->input('flight_number');
        $transfer->adults = $request->input('adults');
        $transfer->children = $request->input('children');
        $transfer->guest_email = $request->input('guest_email');
        $transfer->contact_number = $request->input('contact_number');
        $transfer->notes = $request->input('notes');
        if($transfer->save()){
            return response()->json(['message'=>'created']);
        }
    }
}
