<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\productgroup;

class ProductgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productgroup = productgroup::orderBy('group_code')->paginate(15);
        return $productgroup;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $productgroup = productgroup::create([
            'id' => $request['group_code'],
            'group_code' => $request['group_code'],
            'group_name' => $request['group_name'],
            'image_url' => $request['image_url'],
            'group_name_2' => $request['group_name_2'],
            'brand_code' => $request['brand_code'],
            'cat_code' => $request['cat_code'],
            'inactived' => $request['inactived'],
            'created_by' => 'Chhin Pov'
        ]);
        if($productgroup){
          return ['statue :'=>"succese"];
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
        $productgroup = productgroup::find($id);
        $productgroup->group_name = $request->group_name;
        $productgroup->image_url = $request->image_url;
        $productgroup->group_name_2 = $request->group_name_2;
        $productgroup->brand_code = $request->brand_code;
        $productgroup->inactived = $request->inactived;
        $productgroup->cat_code = $request->cat_code;
        $productgroup->updete_by = "Chhin Pov";
        $productgroup->save();
        if($productgroup){
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
        $productgroup = productgroup::find($id);
        $productgroup ->delete();
        if($productgroup){
            return ['statue :'=> "Succesfull"];
        }else{
           return ['statue :'=>"faile "];
        }
    }
}
