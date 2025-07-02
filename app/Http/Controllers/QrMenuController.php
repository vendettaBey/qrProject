<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Tenant;
use App\Models\Theme;
use App\Models\QrCode;
use App\Models\QrCodeScan;
use App\Models\MenuViewLog;
use Illuminate\Http\Request;

class QrMenuController extends Controller
{
  /**
   * QR menü sayfasını göster
   *
   * @param  string  $menuSlug
   * @return \Illuminate\View\View
   */
  public function show($menuSlug)
  {
    // Menüyü slug'a göre bul
    $menu = Menu::where('slug', $menuSlug)->firstOrFail();

    // QR koddan geliniyorsa table parametresi ile gelir
    $tableNumber = request('table');
    if ($tableNumber) {
      $qrCode = QrCode::where('menu_id', $menu->id)
        ->where('table_number', $tableNumber)
        ->first();
      if ($qrCode) {
        QrCodeScan::create([
          'qr_code_id' => $qrCode->id,
          'scanned_at' => now(),
          'ip_address' => request()->ip(),
        ]);
        $qrCode->incrementScanCount();
      }
    }

    // Menüye ait restoranı ve kiracıyı (tenant) bul
    $restaurant = $menu->restaurant;
    $tenant = $restaurant->tenant;

    // Tema bilgisini al
    $theme = $tenant->theme ?? Theme::first();

    // Menüye ait kategorileri ve ürünleri al
    $categories = Category::where('menu_id', $menu->id)->with('products')->get();
    $products = Product::where('menu_id', $menu->id)->get();

    // Öne çıkan ürünleri al (featured alanı true olanlar veya rastgele 6 ürün)
    $featuredProducts = Product::where('menu_id', $menu->id)
      ->where('featured', true)
      ->take(6)
      ->get();

    // Eğer öne çıkan ürün yoksa, rastgele 6 ürün al
    if ($featuredProducts->isEmpty()) {
      $featuredProducts = Product::where('menu_id', $menu->id)
        ->inRandomOrder()
        ->take(6)
        ->get();
    }

    // Menü görüntüleme logu ekle
    MenuViewLog::create([
      'menu_id' => $menu->id,
      'viewed_at' => now(),
      'ip_address' => request()->ip(),
    ]);

    // Tema adına göre view dosyasını belirle
    $themeView = 'themes.' . ($theme->folder_name ?? 'restoran') . '.menu';

    return view($themeView, [
      'menu' => $menu,
      'restaurant' => $restaurant,
      'tenant' => $tenant,
      'categories' => $categories,
      'products' => $products,
      'featuredProducts' => $featuredProducts,
      'title' => $menu->name . ' - ' . $restaurant->name
    ]);
  }

  /**
   * QR kod sayfasını göster
   *
   * @param  string  $menuSlug
   * @return \Illuminate\View\View
   */
  public function showQrCode($menuSlug)
  {
    // Menüyü slug'a göre bul
    $menu = Menu::where('slug', $menuSlug)->firstOrFail();

    // Menüye ait restoranı ve kiracıyı (tenant) bul
    $restaurant = $menu->restaurant;
    $tenant = $restaurant->tenant;

    // Tema bilgisini al
    $theme = $tenant->theme ?? Theme::first();

    // QR kod için URL oluştur
    $url = route('qr.menu.show', $menuSlug);

    // QR kod görüntüsünü oluştur (SimpleSoftwareIO/simple-qrcode paketi kullanılabilir)
    // Eğer paket yoksa, Google Charts API kullanarak QR kod oluşturalım
    $qrCodeImage = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . urlencode($url) . "&choe=UTF-8";

    // Tema adına göre view dosyasını belirle
    $themeView = 'themes.' . ($theme->folder_name ?? 'restoran') . '.qr';

    return view($themeView, [
      'menu' => $menu,
      'restaurant' => $restaurant,
      'tenant' => $tenant,
      'qrCodeImage' => $qrCodeImage,
      'title' => 'QR Kod - ' . $menu->name
    ]);
  }
}