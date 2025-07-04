<?php

namespace App\Filament\SuperAdmin\Resources\ThemeResource\Pages;

use App\Filament\SuperAdmin\Resources\ThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTheme extends CreateRecord
{
  protected static string $resource = ThemeResource::class;

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}