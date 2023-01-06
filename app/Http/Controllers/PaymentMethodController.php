<?php

namespace App\Http\Controllers;

use App\Models\paymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curency = paymentMethod::get();
        return $curency;
    }

    public function create( Request $request)
    {
        $setup = setup::first();
        $main_curency_no = $setup->main_Currency;
        $exchangerate = paymentMethod::create([
            'paymentmethod_code' => $request['paymentmethod_code'],
            'paymentmethod' => $request['paymentmethod'],
            'description' => $request['description'],
            'statue' => $request['statue'],
            'inactived' => $request['inactived'],
            'created_by' => 'Chhin Pov'
        ]);
        if($exchangerate){
            return exchangerate::get();
        }else{
            return ['statue :'=>"faile"];
        }
    }

    public function update($id,Request $request)
    {
        $exchangerate = paymentMethod::find($id);  
        $exchangerate -> paymentmethod_code = $request ->paymentmethod_code;
        $exchangerate -> paymentmethod = $request ->paymentmethod;
        $exchangerate -> description = $request ->description;
        $exchangerate -> statue = $request ->statue;
        $exchangerate -> inactived = $request ->inactived;
        $exchangerate->save();
        if($exchangerate){
            return $exchangerate;
        }else{
           return ['statue :'=>"faile"];
        }
    }
    public function destroy($id)
    {
        $curency = paymentMethod::find($id);
        $curency->delete();
        return paymentMethod::get();
    }
}
