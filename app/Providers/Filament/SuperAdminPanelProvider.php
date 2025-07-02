<?php

namespace App\Providers\Filament;

use App\Http\Middleware\SuperAdminAccess;
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

class SuperAdminPanelProvider extends PanelProvider
{
  public function panel(Panel $panel): Panel
  {
    return $panel
      ->id('super-admin')
      ->path('super-admin')
      ->login()
      ->colors([
        'primary' => Color::Purple,
      ])
      ->brandName('QR Menü - Super Admin')
      ->brandLogo(asset('images/logo.png'))
      ->favicon(asset('favicon.ico'))
      ->discoverResources(in: app_path('Filament/SuperAdmin/Resources'), for: 'App\\Filament\\SuperAdmin\\Resources')
      ->discoverPages(in: app_path('Filament/SuperAdmin/Pages'), for: 'App\\Filament\\SuperAdmin\\Pages')
      ->pages([
        Pages\Dashboard::class,
      ])
      ->discoverWidgets(in: app_path('Filament/SuperAdmin/Widgets'), for: 'App\\Filament\\SuperAdmin\\Widgets')
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
        SuperAdminAccess::class,
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
      ], isPersistent: true)
      ->resources([
        \App\Filament\SuperAdmin\Resources\TenantResource::class,
        // Diğer kaynaklar buraya eklenebilir
      ]);
  }
}