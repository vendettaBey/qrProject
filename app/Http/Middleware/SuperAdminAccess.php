<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminAccess
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

    // Super admin rolü yoksa erişimi reddet
    if (!$user->hasRole('super_admin')) {
      // Eğer customer rolü varsa müşteri paneline yönlendir
      if ($user->hasRole('customer')) {
        return redirect('/panel');
      }

      // Hiçbir rolü yoksa çıkış yap
      Auth::logout();
      return redirect('/login')->with('error', 'Bu panele erişim yetkiniz bulunmamaktadır.');
    }

    return $next($request);
  }
}