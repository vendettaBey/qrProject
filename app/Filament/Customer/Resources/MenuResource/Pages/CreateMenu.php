<?php

namespace App\Filament\Customer\Resources\MenuResource\Pages;

use App\Filament\Customer\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateMenu extends CreateRecord
{
  protected static string $resource = MenuResource::class;

  protected function mutateFormDataBeforeCreate(array $data): array
  {
    // Kullanıcının tenant_id'sini otomatik olarak ekle
    $data['tenant_id'] = Auth::user()->tenant_id;

    return $data;
  }

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}