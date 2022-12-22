<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\product;
use App\Models\productvariantcode;
use App\Models\productbom;
use App\Models\Serail;
use App\Models\product_view;
use App\Models\unitofmeasure;
use App\Models\cat_produc;

class ProductContraller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { 
        $serail_no = Serail::where('id', '=','Products')->first();
        $Prifixcode = $serail_no->prefix_code;
        $Code​​​_qty = $serail_no->qty_code;
        $Sart_at = $serail_no->start_code;
        $End_code = $serail_no->end_code;
        $newCode = (int)$Sart_at + (int)$End_code;
        $serail_no = $Prifixcode;
       for($i = 0;$i<((int)$Code​​​_qty - strlen($newCode));$i++){ $serail_no = $serail_no."0"; }
        $serail_no =$serail_no.$newCode;
        $product = product::create([
            'id' => $serail_no,
            'product_no'  => $serail_no,
            'description' => 'Medichince Product',
            'created_by'  => 'Chhin Pov'
        ]);
        if($product){
                 for($i=0;$i<2;$i++){
                    $productvariantcode = productvariantcode::create([
                        'product_no' => $serail_no,
                        'description' => 'Medichince Product',
                        'created_by' => 'Chhin Pov'
                    ]);
                 }
                if($productvariantcode){
                      $serilano = Serail::where('id', '=','Products')->first();
                      $serilano->end_code = $newCode;
                      $serilano->save();
                      if($serilano){
                        $product = product::where('product_no','=',$serail_no)->get();
                        return $product;
                      }else{
                        return ['statue :'=>"faile Create"];
                      }
                }else{
                    return ['statue :'=>"faile Create"];
                }
        }else{
           return ['statue :'=>"faile Create"];
        }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crateUnite($id){
        $serail_no = product::where('product_no','=',$id)->first();
        $decrip =  $serail_no ->description;
        $productvariantcode = productvariantcode::create([
            'product_no' => $id,
            'description' => $decrip,
            'created_by' => 'Chhin Pov'
        ]);
        if($productvariantcode){
            $serail_no = productvariantcode::where('product_no','=',$id)->get();
             return $serail_no;
          }else{
            return ['statue :'=>"faile Create"];
          }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUnit($id){
            $productvariantcode = productvariantcode::where('product_no','=',$id)->first();  
             if($productvariantcode){
                return $productvariantcode;
             }else{
                return ['statue :'=>"Note Date"];
             }
    }

    public function savelink($id){
        $productvariantcode = productvariantcode::where('id','=',$id)->get();  
        $productvariantcode->save();
         if($productvariantcode){
            return $productvariantcode;
         }else{
            return ['statue :'=>"Note Date"];
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewpro(Request $request)
    {
        $product_view = product::orderBy('product_no', 'asc')->paginate(9);
         if($product_view){
            return $product_view;
         }else{
            return ['statue :'=>"Note Date"];
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
        $posts = product::where('product_no', '=',$id)->first();
        if($posts){
            return $posts;
        }else{
            return ['statue :'=>"Note Date"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editlink($id)
    {
        $productvariantcode = productvariantcode::where('product_no','=',$id)->get();  
        
        if($productvariantcode){
            return $productvariantcode;
        }else{
            return ['statue :'=>"Note Date"];
        }
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
            $product = product::find($id);
            $product->product_barcode = $request->product_barcode;
            $product->description = $request->description;
            $product->description_2 = $request->description_2;
            $product->image_url = $request->image_url;
            $product->stock_unit_of_measure_code = $request->stock_unit_of_measure_code;
            $product->purche_unit_of_measure_code = $request->purche_unit_of_measure_code;
            $product->sup_code = $request->sup_code;
            $product->brand_code = $request->brand_code;
            $product->group_code = $request->group_code;
            $product->cat_code = $request->cat_code;
            $product->unit_price = $request->unit_price;
            $product->inactived = $request->inactived;
            $product->variant_code = 'Yes';
            $product->updete_by = 'chhin pov';
            $product->save();
          if($product){
                    return ['statue :'=>"success full"];
         }else{
                    return ['statue :'=> "Note Date"];
         }
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProductLinke($id,Request $request)
    {
        $productvariantcode = productvariantcode::find($id);
        $productvariantcode ->product_no = $request -> product_no; 
        $productvariantcode ->description = $request -> description; 
        $productvariantcode ->description_2 = $request -> description_2; 
        $productvariantcode ->image_url = $request -> image_url; 
        $productvariantcode ->variant_unit_of_measure_code = $request -> variant_unit_of_measure_code; 
        $productvariantcode ->quantity_per_unit = $request -> quantity_per_unit; 
        $productvariantcode ->unit_price = $request -> unit_price; 
        $productvariantcode ->curency_code = $request -> curency_code; 
        $productvariantcode ->inactived = $request -> inactived; 
        $productvariantcode ->updete_by = 'chhin pov'; 
        $productvariantcode->save();
        if($productvariantcode){
             return $productvariantcode;
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
        
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destLink($id)
    {
        $productvariantcode = productvariantcode::find($id); 
        $product_no =  $productvariantcode ->product_no;
        $productvariantcode -> delete();
        if($productvariantcode){
            $productvariantcode = productvariantcode::where('product_no','=',$product_no)->get();  
            if($productvariantcode){
                return $productvariantcode;
            }else{
                return ['statue :'=>"Note Date"];
            }
        }else{
            return ['statue :'=>"Note Date"];
        }
    }
    
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadPhoto(Request $request)
    {
        $dir = 'img' . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR;
        $this->makeDirectory($dir);
        $img = time() . '.' . explode(';', explode('/', $request->photo)[1])[0];
        image::make($request->photo)->save(public_path($dir) . $img);
        return $img;
    }
    public function getboomline($id)
    {
                $productvariantcode = productvariantcode::groupBy('variant_unit_of_measure_code')
                ->addSelect('variant_unit_of_measure_code')
                ->whereNotIn('variant_unit_of_measure_code',productbom::select('bom_unit_of_measure_code')->where('product_no', '=', $id)->where('bom_unit_of_measure_code', '=',"")->get())
                ->where('product_no','=',$id)
                ->get(); 
                return $productvariantcode;
    }

    public function getlinkunit($id)
    {
            $productvariantcode = unitofmeasure::whereNotIn('unit_code',productvariantcode::select('variant_unit_of_measure_code')
             ->where('product_no', '=', $id)->get())
             ->get(); 
             if(count($productvariantcode)<1){
                $productvariantcode = unitofmeasure::get();
                return $productvariantcode;
             }
            return $productvariantcode;
    }

    public function productsearch(Request $request)
    {
        $product_view = product::orderBy('product_no', 'asc')
        ->addSelect('id','product_no','product_barcode', 'description', 'description_2','image_url', 'stock_unit_of_measure_code','purche_unit_of_measure_code','bom_no','reorder_point', 'sup_code', 'brand_code', 'group_code', 'cat_code','variant_code', 'unit_price', 'inactived', 'is_deleted','created_by','updete_by', 'delete_by', 'created_at', 'updated_at')
         ->whereIn('product_no',product::select('product_no')
         ->where('description','LIKE',"%{$request->description}%")
         ->where('description_2','LIKE',"%{$request->description_2}%")
         ->where('stock_unit_of_measure_code','LIKE',"%{$request->stock_unit_of_measure_code}%")
         ->where('purche_unit_of_measure_code','LIKE',"%{$request->purche_unit_of_measure_code}%")
         ->where('group_code','LIKE',"%{$request->group_code}%")
         ->where('cat_code','LIKE',"%{$request->cat_code}%")
         ->where('inactived','LIKE',"%{$request->inactived}%")
         ->get())->paginate(9);
        return $product_view;
    }

    public function getProductCAt($id)
    {
        $productvariantcode = cat_produc::where('product_no','=',$id)->first();  
        if($productvariantcode){
            return $productvariantcode;
        }else{
            return ['statue :'=>"Note Date"];
        }
    }
}
