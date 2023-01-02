<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\unitofmeasure;

class UnitofMeasureContraller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitofmeasure = unitofmeasure::orderBy('id')->paginate(10);
        return $unitofmeasure;
    }
    public function getunite()
    {
        $unitofmeasure = unitofmeasure::get();
        return $unitofmeasure;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return unitofmeasure::create([
            'id' => $request-> code,
            'code' => $request-> code,
            'unit_code' => $request->unit_code,
            'unit_of_measure' => $request->unit_of_measure,
            'type' => $request->type,
            'bom_no' => $request->bom_no,
            'quantity' => $request->quantity,
            'inactived' => "yes",
            'created_by' => "Chin Pov",
        ]);
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
        //
        $unitcode = unitofmeasure::find($id);
        $unitcode -> unit_code = $request -> unit_code;
        $unitcode -> unit_of_measure = $request -> unit_of_measure;
        $unitcode -> type = $request -> type;
        $unitcode -> bom_no = $request -> bom_no;
        $unitcode -> quantity = $request -> quantity;
        $unitcode -> inactivated = "yes";
        $unitcode -> is_deleted = null;
        $unitcode -> created_by = "Chin Pov";
        $unitcode -> update_by = "Chin Pov";
        $unitcode->save();
        if($unitcode){
            return ['statue :'=>"SUCCESSE"];
       }else{
                  return ['statue :'=>"Note Date"];
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
        //
        $unitcode = unitofmeasure::find($id);
        $unitcode->delete();
        return response()->json(['message' => 'Unitcode deleted successfully']);
    }
}
