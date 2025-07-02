<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductViewLog extends Model
{
    protected $fillable = [
        'product_id',
        'menu_id',
        'viewed_at',
        'ip_address',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class);
    }
}
