<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'theme_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    /**
     * Tenant'ın kullanabileceği tüm temaları getir
     */
    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
}
