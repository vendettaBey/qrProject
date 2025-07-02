<?php

namespace App\Filament\SuperAdmin\Resources\ThemeResource\Pages;

use App\Filament\SuperAdmin\Resources\ThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTheme extends EditRecord
{
  protected static string $resource = ThemeResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\DeleteAction::make()
        ->label('Temayı Sil'),
    ];
  }

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}