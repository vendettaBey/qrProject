<?php

namespace App\Filament\Resources\QrCodeResource\Pages;

use App\Filament\Resources\QrCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQrCode extends EditRecord
{
    protected static string $resource = QrCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('qrCodeRegenerate')
                ->label('QR Kodunu Yenile')
                ->action(function () {
                    $this->record->generateQrCode();
                    $this->record->refresh();
                    $this->notify('', 'QR kodu başarıyla yeniden oluşturuldu!');
                })
                ->color('primary')
                ->icon('heroicon-o-arrow-path'),
        ];
    }
}