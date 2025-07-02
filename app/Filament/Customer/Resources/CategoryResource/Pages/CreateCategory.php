<?php

namespace App\Filament\Customer\Resources\CategoryResource\Pages;

use App\Filament\Customer\Resources\CategoryResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateCategory extends CreateRecord
{
  protected static string $resource = CategoryResource::class;

  protected function mutateFormDataBeforeCreate(array $data): array
  {
    // Kullanıcının tenant_id'sini al
    $data['tenant_id'] = Auth::user()->tenant_id;

    return $data;
  }
}