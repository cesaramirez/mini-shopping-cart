<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $with = [
        'item',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_colors_id',
        'quantity',
    ];

    public function item()
    {
        return $this->belongsTo(ProductColor::class, 'id');
    }
}
