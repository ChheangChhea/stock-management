<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllProductinstock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW allproductinstock AS (
            select 
            p.product_no,
            p.product_barcode,
            p.description,
            p.stock_unit_of_measure_code,
            p.reorder_point,
            SUM(TO_NUMBER(pu.inventory, '999999999')) as inventory,
            pu.statuse from product p LEFT OUTER JOIN product_stock_keeping_units pu on p.product_no = pu.product_no
            GROUP BY p.product_no,p.product_barcode,p.description,p.stock_unit_of_measure_code,p.reorder_point,pu.statuse
        )"
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS allproductinstock');
    }
}
