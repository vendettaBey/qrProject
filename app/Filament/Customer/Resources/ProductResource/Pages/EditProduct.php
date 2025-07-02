<?php

namespace App\Filament\Customer\Resources\ProductResource\Pages;

use App\Filament\Customer\Resources\ProductResource;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
  protected static string $resource = ProductResource::class;

  protected function mutateFormDataBeforeSave(array $data): array
  {
    // menu_id artık formdan geliyor, ek bir işlem gerekmiyor
    return $data;
  }
}