<?php

namespace App\Http\Controllers;

use App\Models\exchangerate;
use App\Models\setup;
use App\Models\curency;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curency = exchangerate::get();
        return $curency;
    }
    public function getSetup()
    {
        $setup = setup::first();
        return $setup;
    }

    public function getcurency()
    {
        $setup = setup::first();
        $exchane = exchangerate::addSelect('curency_no')->get();
        $curency = curency::where('curency_no', '!=', $setup->main_Currency)
        ->whereNotIn('curency_no',$exchane)
        ->get();
        return $curency;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $setup = setup::first();
        $main_curency_no = $setup->main_Currency;
        $exchangerate = exchangerate::create([
            'main_curency_no' => $main_curency_no,
            'curency_no' => $request['curency_no'],
            'exchange_rate' => $request['exchange_rate'],
            'inactived' => $request['inactived'],
            'created_by' => 'Chhin Pov'
        ]);
        if($exchangerate){
            return exchangerate::get();
        }else{
            return ['statue :'=>"faile"];
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $exchangerate = exchangerate::find($id);  
        $exchangerate -> curency_no = $request ->curency_no;
        $exchangerate -> exchange_rate = $request ->exchange_rate;
        $exchangerate -> inactived = $request ->inactived;
        $exchangerate->save();
        if($exchangerate){
            return $exchangerate;
        }else{
           return ['statue :'=>"faile"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curency = exchangerate::find($id);
        $curency->delete();
        return exchangerate::get();
    }
}
