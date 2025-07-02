<?php

namespace App\Filament\Customer\Resources\ThemeResource\Widgets;

use Filament\Widgets\Widget;

class ActiveThemeOverview extends Widget
{
  protected static string $view = 'filament.customer.resources.theme-resource.widgets.active-theme-overview';

  protected int|string|array $columnSpan = 'full';

  public function getActiveTheme()
  {
    // Test için örnek veri döndür
    return (object) ['name' => 'Test Tema'];
  }
}