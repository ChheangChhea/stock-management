<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductStockExpritDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW product_stock_exprit_date AS (
             SELECT ps.product_no,ps.exprit_date,	ps.description,P .reorder_point, ps.unit_of_measure_code,ps.unit_price,SUM (TO_NUMBER(inventory, '999999999')) AS inventorys FROM product_stock_keeping_units ps INNER JOIN product P ON ps.product_no = P .product_no WHERE ps.statuse ='open' GROUP BY ps.exprit_date,ps.product_no,ps.description,P .reorder_point,ps.unit_price, ps.unit_of_measure_code
        )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS product_stock_exprit_date');
    }
}
