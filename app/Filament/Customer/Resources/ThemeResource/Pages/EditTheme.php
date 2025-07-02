<?php

namespace App\Filament\Customer\Resources\ThemeResource\Pages;

use App\Filament\Customer\Resources\ThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class EditTheme extends EditRecord
{
  protected static string $resource = ThemeResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\Action::make('preview')
        ->label('Önizle')
        ->icon('heroicon-o-eye')
        ->url(fn() => route('theme.preview', ['themeId' => $this->record->id]))
        ->openUrlInNewTab(),

      Actions\Action::make('activate')
        ->label('Aktif Et')
        ->icon('heroicon-o-check-circle')
        ->visible(fn() => !$this->record->is_active)
        ->action(function () {
          // Önce tüm temaları deaktif et
          $user = Auth::user();
          $tenant = Tenant::where('id', $user->tenant_id)->first();

          if ($tenant) {
            // Tenant'a ait tüm temaları deaktif et
            \App\Models\Theme::where('id', '!=', $this->record->id)->update(['is_active' => false]);

            // Seçilen temayı aktif et
            $this->record->is_active = true;
            $this->record->save();

            // Tenant'ın tema ID'sini güncelle
            $tenant->theme_id = $this->record->id;
            $tenant->save();

            Notification::make()
              ->title('Tema aktif edildi')
              ->success()
              ->send();
          }
        }),
    ];
  }

  protected function getSavedNotification(): ?Notification
  {
    return Notification::make()
      ->success()
      ->title('Tema güncellendi')
      ->body('Tema başarıyla güncellendi.');
  }
}