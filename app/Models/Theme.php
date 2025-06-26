<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'name',
        'description',
        'preview_image',
        'is_premium',
        'price',
        'is_active',
        'config',
        'version',
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'config' => 'array',
    ];

    public function getPreviewImageUrlAttribute(): string
    {
        return $this->preview_image ? asset('storage/' . $this->preview_image) : asset('images/default-theme.jpg');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFree($query)
    {
        return $query->where('is_premium', false);
    }

    public function scopePremium($query)
    {
        return $query->where('is_premium', true);
    }
}
