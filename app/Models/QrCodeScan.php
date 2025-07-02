<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrCodeScan extends Model
{
    protected $fillable = [
        'qr_code_id',
        'scanned_at',
        'ip_address',
    ];

    public function qrCode()
    {
        return $this->belongsTo(QrCode::class);
    }
}
