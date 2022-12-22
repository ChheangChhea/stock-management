<?php
use App\Http\Controllers\{
    BrandsController,
    UserController,
    HomeController,
    OrderController,
    CategorysController,
    ProductgroupController,
    UnitofMeasureContraller,
    SuppliyerController,
    ProductContraller,
    SerailController,
    ProductBomContraller,
    PurcheaOrderContraller,
    ReceiveOrderContraller
};

/*php
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//test api


Route::group(['prefix' => 'v1'], function () {
    //brand api
    Route::post('brands/create',[BrandsController::class,'create']);
    Route::get('brands/edit/{brand}',[BrandsController::class,'edit']);
    Route::post('brands/update/{brand}',[BrandsController::class,'update']);
    Route::get('brands/delete/{brand}',[BrandsController::class,'destroy']);
    Route::get('brands/show/{brand}',[BrandsController::class,'show']);
    Route::get('brands/',[BrandsController::class,'index']);
    Route::post('brands/search/',[BrandsController::class,'search']);
    Route::get('brands/getdata/',[BrandsController::class,'getdata']);

    //category
    Route::post('categorys/create',[CategorysController::class,'store']);
    Route::get('category/edit/{category}',[CategorysController::class,'edit']);
    Route::put('categorys/updete/{category}',[CategorysController::class,'update']);
    Route::delete('category/delete/{category}',[CategorysController::class,'destroy']);
    Route::get('category/show/{category}',[CategorysController::class,'show']);
    Route::get('category/',[CategorysController::class,'index']);
    Route::get('category/getcat',[CategorysController::class,'getcat']);
    
    //Group product  
    Route::post('progroups/create',[ProductgroupController::class,'create']);
    Route::get('progroups/edit/{progroups}',[ProductgroupController::class,'edit']);
    Route::post('progroups/updete/{progroups}',[ProductgroupController::class,'update']);
    Route::get('progroups/delete/{progroups}',[ProductgroupController::class,'destroy']);
    Route::get('progroups/',[ProductgroupController::class,'index']);
    Route::get('progroups/getdatagroup',[ProductgroupController::class,'getdatagroup']);

    

    Route::get('units/',[UnitofMeasureContraller::class,'index']);



    //Product
    Route::post('products/create/',[ProductContraller::class,'create']);
    Route::post('products/create/{product}',[ProductContraller::class,'crateUnite']);
    Route::get('products/units/{product}',[ProductContraller::class,'getUnit']);
    Route::get('products/viewpro',[ProductContraller::class,'viewpro']);
    Route::get('products/edite/{product}',[ProductContraller::class,'edit']);
    Route::get('products/editlink/{product}',[ProductContraller::class,'editlink']);
    Route::get('products/destLink/{product}',[ProductContraller::class,'destLink']);
    Route::get('products/getProductCAt/{product}',[ProductContraller::class,'getProductCAt']);
    Route::post('products/update/{product}',[ProductContraller::class,'update']);  
    Route::post('products/updateProductLinke/{product}',[ProductContraller::class,'updateProductLinke']);
    Route::post('products/getlinkunit/{product}',[ProductContraller::class,'getlinkunit']);
    Route::post('products/getboomline/{product}',[ProductContraller::class,'getboomline']);
    Route::get('products/productsearch/',[ProductContraller::class,'productsearch']);
    Route::post('purchase/delete/getPrulinkUnit/{purchase}', [PurcheaOrderContraller::class, 'getPrulinkUnit']);


    Route::get('category/', [CategorysController::class, 'index']);
    Route::post('categorys/store', [CategorysController::class, 'store']);
    Route::post('categorys/update/{category}', [CategorysController::class, 'updates']);
    Route::post('category/delete/{category}', [CategorysController::class, 'destroy']);
    Route::get('category/getCatName', [CategorysController::class, 'getCatName']);

    //Brands
    Route::get('brands/', [BrandsController::class, 'index']);
    Route::post('brands/store', [BrandsController::class, 'store']);
    Route::post('brands/update/{brand}', [BrandsController::class, 'update']);
    Route::post('brands/delete/{brand}', [BrandsController::class, 'destroy']);

    //suppliyers
    Route::get('suppliyers/getdatasub', [SuppliyerController::class, 'getdatasub']);
    Route::get('suppliyers/', [SuppliyerController::class, 'index']);
    Route::post('suppliyers/store/', [SuppliyerController::class, 'store']);
    Route::post('suppliyers/update/{suppliyers}', [SuppliyerController::class, 'update']);
    Route::post('suppliyers/delete/{suppliyers}', [SuppliyerController::class, 'destroy']);

    //Units code
    Route::get('units/',[UnitofMeasureContraller::class,'index']);
    Route::post('units/store',[UnitofMeasureContraller::class,'store']);
    Route::post('units/update/{units}',[UnitofMeasureContraller::class,'update']);
    Route::post('units/delete/{units}',[UnitofMeasureContraller::class,'destroy']);

    Route::get('serail/', [SerailController::class, 'index']);
    Route::post('serail/store/', [SerailController::class, 'store']);
    Route::post('serail/update/{serail}', [SerailController::class, 'update']);
    Route::post('serail/delete/{serail}', [SerailController::class, 'destroy']);
    
    Route::get('boomproduct/', [ProductBomContraller::class, 'index']);
    Route::post('boomproduct/{broid}', [ProductBomContraller::class, 'getboom']);
    Route::post('boomcreate/{broid}', [ProductBomContraller::class, 'boomcreate']);
    Route::get('getproductboom/{broid}', [ProductBomContraller::class, 'getproductboom']);
    Route::put('boomproduct/update/{broid}', [ProductBomContraller::class, 'update']);
    Route::get('boomproduct/search/{broid}', [ProductBomContraller::class, 'search']);
    Route::get('boomproduct/destroy/{broid}', [ProductBomContraller::class, 'destroy']);

    //Purchase Order and Purchase Line 
    Route::get('purchase/', [PurcheaOrderContraller::class, 'index']);
    Route::post('purchase/store/', [PurcheaOrderContraller::class, 'store']);
    Route::get('purchase/purchaseorder/view', [PurcheaOrderContraller::class, 'purchaseorderView']);
    Route::get('purchase/edit/purchaseorder/{purchase}', [PurcheaOrderContraller::class, 'editPurchaseorder']);
    Route::post('purchase/update/purchaseorder/{purchase}', [PurcheaOrderContraller::class, 'updatePurchaseorder']);
    Route::post('purchase/delete/purchaseorder/{purchase}', [PurcheaOrderContraller::class, 'deletePurchaseorder']);
    Route::post('purchase/addrow/purchaseline/{purchase}', [PurcheaOrderContraller::class, 'addrowPurchaseline']);
    Route::get('purchase/edit/purchaseline/{purchase}', [PurcheaOrderContraller::class, 'editPurchaseline']);
    Route::post('purchase/delete/purchaseline/{purchase}', [PurcheaOrderContraller::class, 'deletePurchaseline']);
    Route::post('purchase/update/purchaseline/{purchase}', [PurcheaOrderContraller::class, 'updatePurchaseline']);
    Route::post('purchase/delete/purchaseorder/{purchase}', [PurcheaOrderContraller::class, 'deletePurchaseorder']);
    Route::post('purchase/delete/getPrulinkUnit/{purchase}', [PurcheaOrderContraller::class, 'getPrulinkUnit']);
    Route::post('purchase/PrulinkeSave/', [PurcheaOrderContraller::class, 'PrulinkeSave']);
    // ReceiveOrderContraller
    Route::get('receive/getpurchea', [ReceiveOrderContraller::class, 'getshowpurchea']);
    Route::post('receive/receptlink/', [ReceiveOrderContraller::class, 'receptlink']);
    Route::post('receive/recept/', [ReceiveOrderContraller::class, 'store']);
});
