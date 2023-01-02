<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand =  brand::orderBy('brand_code')->paginate(10);
        return $brand;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $brand = brand::create([
            'id' => $request['brand_code'],
            'brand_code' => $request['brand_code'],
            'brand_name' => $request['brand_name'],
            'brand_name_2' => $request['brand_name_2'],
            'inactived' => $request['inactived'],
            'created_by' => 'Chhin Pov'
        ]);
        if($brand){
          return $brand;
        }else{
            return ['statue :'=>"faile"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = find::brand($id);
        return $brand;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = brand::where('id', '=',$id)->first();
        return $brand;
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
        $brand = brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_name_2 = $request->brand_name_2;
        $brand->inactived = $request->inactived;
        $brand->updete_by = "Chhin Pov";
        $brand->save();
        if($brand){
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
        $brand = brand::find($id);
        $brand -> delete();
        if($brand){
            return ['statue :'=> "Succes full"];
        }else{
           return ['statue :'=>"faile Delete"];
        }
    }

    public function search(Request $request)
    {

         $brand =  brand::orderBy('brand_code')->paginate(15);
         return $brand;
    }
    public function getdata()
    {
         $brand = brand::get();
         return $brand;
    }

}
