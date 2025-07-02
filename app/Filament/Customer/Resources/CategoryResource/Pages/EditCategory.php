<?php

namespace App\Filament\Customer\Resources\CategoryResource\Pages;

use App\Filament\Customer\Resources\CategoryResource;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
  protected static string $resource = CategoryResource::class;
}