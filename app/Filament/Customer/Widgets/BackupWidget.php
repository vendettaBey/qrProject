<?php

namespace App\Filament\Customer\Widgets;

use Filament\Widgets\Widget;
use Filament\Forms\Components\Button;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Artisan;

class BackupWidget extends Widget
{
  protected static string $view = 'filament.customer.widgets.backup-widget';

  public function triggerBackup()
  {
    // Artisan ile yedekleme komutunu çalıştır
    Artisan::call('backup:run');
    Notification::make()
      ->title('Yedekleme başlatıldı!')
      ->success()
      ->send();
  }

  protected function getViewData(): array
  {
    return [];
  }
}