<?php

namespace App\Filament\Customer\Resources\MenuResource\Pages;

use App\Filament\Customer\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMenu extends EditRecord
{
  protected static string $resource = MenuResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\DeleteAction::make()
        ->label('Menüyü Sil'),
    ];
  }

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}