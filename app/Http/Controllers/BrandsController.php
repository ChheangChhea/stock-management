<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\brand;

class BrandsController extends Controller
{
    public function index(Request $request)
    {
        // $brand =  brand::orderBy('brand_code')->paginate(10);
        // return $brand;
        $brand =  brand::where('brand_name', "LIKE", '%' . $request->search . '%')
            ->orwhere('brand_name_2', "LIKE", '%' . $request->search . '%')
            ->orwhere('inactived', "LIKE", '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(15);
        return $brand;
    }
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
        if ($brand) {
            return $brand;
        } else {
            return ['statue :' => "faile"];
        }
    }
    public function update($id, Request $request)
    {
        $brand = brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_name_2 = $request->brand_name_2;
        $brand->inactived = $request->inactived;
        $brand->updete_by = "Chhin Pov";
        $brand->save();
        if ($brand) {
            return ['statue :' => "Succesfull"];
        } else {
            return ['statue :' => "faile "];
        }
    }

    public function destroy($id)
    {
        $brand = brand::find($id);
        $brand->delete();
        if ($brand) {
            return ['statue :' => "Succes full"];
        } else {
            return ['statue :' => "faile Delete"];
        }
    }
    public function getdata()
    {
        $brand = brand::get();
        return $brand;
    }
}
