<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuViewLog extends Model
{
    protected $fillable = [
        'menu_id',
        'product_id',
        'viewed_at',
        'ip_address',
    ];

    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
