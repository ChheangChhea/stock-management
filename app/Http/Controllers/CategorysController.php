<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\category;

class CategorysController extends Controller
{

    public function index(Request $request)
    {
        $category =  category::where('cat_name', "LIKE", '%' . $request->search . '%')
            ->orwhere('cat_name_2', "LIKE", '%' . $request->search . '%')
            ->orwhere('inactived', "LIKE", '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(2);
        return $category;
    }

    public function store(Request $request)
    {
        return category::create([
            'id' => $request->cat_code,
            'cat_code' => $request->cat_code,
            'cat_name' => $request->cat_name,
            'cat_name_2' => $request->cat_name_2,
            'inactived' => $request->inactived,
            'is_deleted' => "0",
            'created_by' => "Chhin Pov",
        ]);
    }
    public function update($id, Request $request)
    {
        $category = category::findorFail($id);
        $category->cat_name = $request->cat_name;
        $category->cat_name_2 = $request->cat_name_2;
        $category->inactived = $request->inactived;
        $category->updete_by = "Chhin Pov";
        $category->save();
        return $category;
    }
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return response()->json(['message' => 'category deleted successfully']);
    }

    public function getCatName()
    {
        $category =  category::orderBy('cat_code')->get();
        return $category;
    }
}
