<?php

namespace App\Providers\Filament;

use App\Http\Middleware\CustomerAccess;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class CustomerPanelProvider extends PanelProvider
{
  public function panel(Panel $panel): Panel
  {
    return $panel
      ->id('customer')
      ->path('panel')
      ->login()
      ->colors([
        'primary' => Color::Amber,
      ])
      ->brandName('QR Menü - Müşteri Paneli')
      ->brandLogo(asset('images/logo.png'))
      ->favicon(asset('favicon.ico'))
      ->discoverResources(in: app_path('Filament/Customer/Resources'), for: 'App\\Filament\\Customer\\Resources')
      ->discoverPages(in: app_path('Filament/Customer/Pages'), for: 'App\\Filament\\Customer\\Pages')
      ->pages([
        Pages\Dashboard::class,
      ])
      ->discoverWidgets(in: app_path('Filament/Customer/Widgets'), for: 'App\\Filament\\Customer\\Widgets')
      ->widgets([
        Widgets\AccountWidget::class,
      ])
      ->middleware([
        EncryptCookies::class,
        AddQueuedCookiesToResponse::class,
        StartSession::class,
        AuthenticateSession::class,
        ShareErrorsFromSession::class,
        VerifyCsrfToken::class,
        SubstituteBindings::class,
        DisableBladeIconComponents::class,
        DispatchServingFilamentEvent::class,
        CustomerAccess::class,
      ])
      ->authMiddleware([
        Authenticate::class,
      ])
      ->authGuard('web')
      ->authPasswordBroker('users')
      ->login()
      ->passwordReset()
      ->emailVerification()
      ->profile()
      ->tenant(null)
      ->tenantMiddleware([
        'verify-tenant-access',
      ], isPersistent: true);
  }
}