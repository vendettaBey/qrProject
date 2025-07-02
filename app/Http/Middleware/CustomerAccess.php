<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CustomerAccess
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (!Auth::check()) {
      return redirect('/login');
    }

    // Kullanıcının rollerini kontrol et
    /** @var \App\Models\User $user */
    $user = Auth::user();

    // Super admin ise super admin paneline yönlendir
    if ($user->hasRole('super_admin')) {
      return redirect('/super-admin');
    }

    // Customer rolü yoksa erişimi reddet
    if (!$user->hasRole('customer')) {
      Auth::logout();
      return redirect('/login')->with('error', 'Bu panele erişim yetkiniz bulunmamaktadır.');
    }

    // Kullanıcı aktif değilse erişimi reddet
    if (!$user->is_active) {
      Auth::logout();
      return redirect('/login')->with('error', 'Hesabınız aktif değil. Lütfen yönetici ile iletişime geçin.');
    }

    // Tenant aktif değilse erişimi reddet
    if ($user->tenant && !$user->tenant->isActive()) {
      Auth::logout();
      return redirect('/login')->with('error', 'Hesabınız askıya alınmış. Lütfen yönetici ile iletişime geçin.');
    }

    return $next($request);
  }
}