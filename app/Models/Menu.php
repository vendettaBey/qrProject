<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tenant_id',
        'name',
        'description',
        'slug',
        'restaurant_id',
        'is_active',
        'logo',
        'cover_image',
        'settings',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'settings' => 'array',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function qrCodes(): HasMany
    {
        return $this->hasMany(QrCode::class);
    }

    public function activeCategories(): HasMany
    {
        return $this->categories()->where('is_active', true)->orderBy('sort_order');
    }

    public function getLogoUrlAttribute(): string
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('images/default-logo.png');
    }

    public function getCoverImageUrlAttribute(): string
    {
        return $this->cover_image ? asset('storage/' . $this->cover_image) : asset('images/default-cover.jpg');
    }
}
