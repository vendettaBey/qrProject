<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QrCode extends Model
{
    protected $fillable = [
        'menu_id',
        'table_number',
        'qr_code',
        'qr_image',
        'is_active',
        'scan_count',
        'last_scanned_at',
        'settings',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'last_scanned_at' => 'datetime',
        'settings' => 'array',
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function getQrImageUrlAttribute(): string
    {
        return $this->qr_image ? asset('storage/' . $this->qr_image) : $this->generateQrCode();
    }

    public function generateQrCode(): string
    {
        $url = route('menu.show', ['menu' => $this->menu_id, 'table' => $this->table_number]);

        $qrCode = QrCodeGenerator::format('png')
            ->size(300)
            ->margin(10)
            ->generate($url);

        $filename = 'qr-codes/' . $this->qr_code . '.png';
        Storage::disk('public')->put($filename, $qrCode);

        $this->update(['qr_image' => $filename]);

        return asset('storage/' . $filename);
    }

    public function incrementScanCount(): void
    {
        $this->increment('scan_count');
        $this->update(['last_scanned_at' => now()]);
    }

    public function getMenuUrlAttribute(): string
    {
        return route('menu.show', ['menu' => $this->menu_id, 'table' => $this->table_number]);
    }

    public function scans()
    {
        return $this->hasMany(QrCodeScan::class);
    }
}
