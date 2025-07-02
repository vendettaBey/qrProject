<?php

namespace App\Filament\Customer\Resources\ThemeResource\Widgets;

use App\Models\Theme;
use App\Models\Tenant;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class ActiveThemeOverview extends Widget
{
  protected static string $view = 'filament.customer.resources.theme-resource.widgets.active-theme-overview';

  protected int|string|array $columnSpan = 'full';

  public function getActiveTheme()
  {
    $user = Auth::user();
    if (!$user || !$user->tenant_id) {
      return null;
    }

    $tenant = Tenant::find($user->tenant_id);
    if (!$tenant || !$tenant->theme_id) {
      return null;
    }

    return Theme::find($tenant->theme_id);
  }
}