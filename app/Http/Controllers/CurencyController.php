<?php

namespace App\Http\Controllers;

use App\Models\curency;
use Illuminate\Http\Request;

class CurencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curency = curency::get();
        return $curency;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $brand = curency::create([
            'id' => $request['curency_no'],
            'curency_no' => $request['curency_no'],
            'curency' => $request['curency'],
            'inactived' => $request['inactived'],
            'created_by' => 'Chhin Pov'
        ]);
        if($brand){
            return curency::get();
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
    public function update($id, Request $request)
    {
        $curency = curency::find($id);
        $curency->curency = $request->curency;
        $curency->inactived = $request->inactived;
        $curency->updete_by = "Chhin Pov";
        $curency->save();
        if($curency){
            return ['statue :'=> "Succesfull"];
        }else{
           return ['statue :'=>"faile "];
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
        $curency = curency::find($id);
        $curency -> delete();
        if($curency){
            return ['statue :'=> "Succes full"];
        }else{
           return ['statue :'=>"faile Delete"];
        }
    }
}
