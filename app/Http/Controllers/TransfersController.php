<?php

namespace App\Http\Controllers;

use App\Company;
use App\Transfers;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class TransfersController extends Controller
{
    public function saveTransfer (Request $request){
        $transfer = new Transfers;
        $transfer->date = intval($request->input('date'));
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
    public function saveNote (Request $request){
        $transfer = Transfers::where('id',$request->input('id'))->first();
        $transfer->admin_note = $request->input('note');
        if($transfer->save()){
            return response()->json('updated');
        }
    }
    public function filterAppointment (Request $request){
        $data = [];
        if($request->input('filterId')){
            $data['id'] = $request->input('filterId');
        }
        if($request->input('filterGuest')){
            $data['guest_name'] = $request->input('filterGuest');
        }
        if($request->input('filterFlight')){
            $data['flight_number'] = $request->input('filterFlight');
        }
        if($request->input('status') === 'all'){
            if($request->input('com_id') === 'admin'){
                $transfers = Transfers::where($data)
                ->whereBetween('date',[intval($request->input('start_date')),intval($request->input('end_date'))])
                    ->orderBy('id','DESC')->get();
                return response()->json($transfers);
            }
            $data['company_id'] = $request->input('com_id');
            $transfers = Transfers::where($data)
                ->whereBetween('date',[intval($request->input('start_date')),intval($request->input('end_date'))])
                ->orderBy('id','DESC')->get();
            return response()->json($transfers);
        }else{
            if($request->input('com_id') === 'admin'){
                $data['status'] = $request->input('status');
                $transfers = Transfers::where($data)
                    ->whereBetween('date',[intval($request->input('start_date')),intval($request->input('end_date'))])
                    ->orderBy('id','DESC')->get();

                return response()->json($transfers);
            }
            $data['status'] = $request->input('status');
            $data['company_id'] = $request->input('com_id');
            $transfers = Transfers::where($data)
                ->whereBetween('date',[intval($request->input('start_date')),intval($request->input('end_date'))])
                ->orderBy('id','DESC')->get();
            return response()->json($transfers);
        }
    }
    public function changeStatus  (Request $request) {
        if($request->input('status') === 'completed'){
            $company = Company::where('id',$request->input('company_id'))->first();
            $company->balance = strval(intval($company['balance']) + intval($request->input('order_amount')));
            $company->save();
        }
        $transfer = Transfers::where('id',$request->input('id'))->first();
        $transfer->status = $request->input('status');
        if($transfer->save()){
            return response()->json('updated');
        }
    }
    function getTransfer (Request $request){
        if($request->query('com-id') === 'admin'){
            return response()->json(Transfers::where('status','accepted')->orderBy('id','DESC')->get());
        }
        $transfers = Transfers::where(['company_id' => $request->query('com-id'), 'status' => 'accepted'])->orderBy('id','DESC')->get();
        return response()->json($transfers);
    }
    function getTransferAll (Request $request){
        if($request->query('com-id') === 'admin'){
            return response()->json(Transfers::orderBy('id','DESC')->get());
        }
        $transfers = Transfers::where('company_id',$request->query('com-id'))->orderBy('id','DESC')->get();
        return response()->json($transfers);
    }
    function getOneAppointment(Request $request){
        $ap = Transfers::where('id',$request->input('id'))->first();
        return response()->json($ap);
    }
    public function updateTransfer(Request $request){
        $transfer = Transfers::where('id',$request->input('id'))->first();
        $transfer->date = intval($request->input('date'));
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
            return response()->json(['message'=>"updated"]);
        }
    }
}

