<?php

namespace App\Filament\SuperAdmin\Resources\ThemeResource\Pages;

use App\Filament\SuperAdmin\Resources\ThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThemes extends ListRecords
{
  protected static string $resource = ThemeResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\CreateAction::make()
        ->label('Yeni Tema Ekle'),
    ];
  }
}