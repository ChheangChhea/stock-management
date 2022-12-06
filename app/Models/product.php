<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table ="product";
    protected $fillable = [
        'id',
        'product_no',
        'product_barcode',
        'description',
        'description_2',
        'image_url',
        'stock_unit_of_measure_code',
        'purche_unit_of_measure_code',
        'bom_no',
        'sup_code',
        'variant_code',
        'unit_price',
        'inactived',
        'is_deleted',
        'created_by',
        'updete_by',
        'delete_by'
    ];
    public function product()
    {
        return $this->belongsTo(Post::class, 'product_no');
    }
}
