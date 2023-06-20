<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product_Detail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'tpye',
        'value',
        'language',
        'is_active',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class , 'product_id', 'id');
    }
}
