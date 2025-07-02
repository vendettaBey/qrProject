<?php

namespace App\Filament\Customer\Resources\ProductResource\Pages;

use App\Filament\Customer\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
  protected static string $resource = ProductResource::class;

  protected function mutateFormDataBeforeCreate(array $data): array
  {
    // menu_id artık formdan geliyor, ek bir işlem gerekmiyor
    return $data;
  }
}