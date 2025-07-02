<?php

namespace App\Filament\Customer\Resources\ThemeResource\Pages;

use App\Filament\Customer\Resources\ThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListThemes extends ListRecords
{
  protected static string $resource = ThemeResource::class;

  protected function getHeaderActions(): array
  {
    return [
      // Tema oluşturmayı kaldırdık çünkü temalar sistem tarafından oluşturulacak
    ];
  }

  public function getTabs(): array
  {
    return [
      'all' => Tab::make('Tüm Temalar'),
      'active' => Tab::make('Aktif Tema')
        ->modifyQueryUsing(fn(Builder $query) => $query->where('is_active', true)),
    ];
  }

  protected function getHeaderWidgets(): array
  {
    return [
      ThemeResource\Widgets\ActiveThemeOverview::class,
    ];
  }
}