<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemePreviewController extends Controller
{
  /**
   * Tema önizleme sayfasını göster
   *
   * @param  int  $themeId
   * @return \Illuminate\View\View
   */
  public function preview($themeId)
  {
    // Temayı bul
    $theme = Theme::findOrFail($themeId);

    // Örnek veriler oluştur
    $restaurant = $this->createSampleRestaurant();
    $menu = $this->createSampleMenu($restaurant);
    $categories = $this->createSampleCategories($menu);
    $products = $this->createSampleProducts($categories, $menu);
    $tenant = $this->createSampleTenant($theme);

    // Tema adına göre view dosyasını belirle
    $themeView = 'themes.' . ($theme->folder_name ?? 'restoran') . '.menu';

    return view($themeView, [
      'menu' => $menu,
      'restaurant' => $restaurant,
      'tenant' => $tenant,
      'categories' => $categories,
      'products' => $products,
      'featuredProducts' => $products->take(6),
      'title' => 'Tema Önizleme - ' . $theme->name,
      'isPreview' => true
    ]);
  }

  /**
   * Örnek bir restoran oluştur
   *
   * @return object
   */
  private function createSampleRestaurant()
  {
    return (object) [
      'id' => 1,
      'name' => 'Örnek Restoran',
      'description' => 'Bu bir örnek restoran açıklamasıdır.',
      'address' => 'Örnek Mahallesi, Lezzet Caddesi No:123, İstanbul',
      'phone' => '+90 (212) 123 45 67',
      'email' => 'info@ornekrestoran.com',
      'logo' => null,
      'is_active' => true
    ];
  }

  /**
   * Örnek bir menü oluştur
   *
   * @param  object  $restaurant
   * @return object
   */
  private function createSampleMenu($restaurant)
  {
    return (object) [
      'id' => 1,
      'name' => 'Ana Menü',
      'description' => 'Restoranımızın özel menüsü',
      'restaurant_id' => $restaurant->id,
      'restaurant' => $restaurant,
      'is_active' => true
    ];
  }

  /**
   * Örnek kategoriler oluştur
   *
   * @param  object  $menu
   * @return \Illuminate\Support\Collection
   */
  private function createSampleCategories($menu)
  {
    $categories = collect();

    $categoryNames = ['Kahvaltı', 'Ana Yemekler', 'Tatlılar', 'İçecekler'];

    foreach ($categoryNames as $index => $name) {
      $category = (object) [
        'id' => $index + 1,
        'name' => $name,
        'description' => $name . ' kategorisi açıklaması',
        'menu_id' => $menu->id,
        'is_active' => true,
        'products' => collect()
      ];

      $categories->push($category);
    }

    return $categories;
  }

  /**
   * Örnek ürünler oluştur
   *
   * @param  \Illuminate\Support\Collection  $categories
   * @param  object  $menu
   * @return \Illuminate\Support\Collection
   */
  private function createSampleProducts($categories, $menu)
  {
    $products = collect();
    $productId = 1;

    // Kahvaltı ürünleri
    $breakfast = $categories[0];
    $breakfastItems = [
      ['Serpme Kahvaltı', 'Zengin içerikli serpme kahvaltı tabağı', 120.00],
      ['Omlet', 'Peynirli veya sebzeli omlet seçenekleri', 45.00],
      ['Menemen', 'Domates, biber ve yumurta ile hazırlanan geleneksel lezzet', 50.00],
      ['Simit Tabağı', 'Taze simit, peynir, zeytin ve bal ile servis edilir', 60.00]
    ];

    foreach ($breakfastItems as $item) {
      $product = $this->createProduct($productId++, $item[0], $item[1], $item[2], $breakfast->id, $menu->id);
      $products->push($product);
      $breakfast->products->push($product);
    }

    // Ana Yemekler
    $mains = $categories[1];
    $mainItems = [
      ['Izgara Köfte', 'Özel baharatlarla hazırlanmış ızgara köfte, pilav ve salata ile', 85.00],
      ['Tavuk Şiş', 'Marine edilmiş tavuk şiş, pilav ve közlenmiş sebzeler ile', 80.00],
      ['Karışık Izgara', 'Köfte, pirzola, tavuk ve dana eti içeren karışık ızgara tabağı', 150.00],
      ['Mantı', 'El yapımı mantı, yoğurt ve özel sos ile', 70.00]
    ];

    foreach ($mainItems as $item) {
      $product = $this->createProduct($productId++, $item[0], $item[1], $item[2], $mains->id, $menu->id);
      $products->push($product);
      $mains->products->push($product);
    }

    // Tatlılar
    $desserts = $categories[2];
    $dessertItems = [
      ['Künefe', 'Özel peyniri ile hazırlanan sıcak künefe', 60.00],
      ['Baklava', 'Fıstıklı özel baklava', 65.00],
      ['Sütlaç', 'Fırında pişirilmiş geleneksel sütlaç', 40.00],
      ['Dondurma', 'Çeşitli meyve tatlarında dondurma', 35.00]
    ];

    foreach ($dessertItems as $item) {
      $product = $this->createProduct($productId++, $item[0], $item[1], $item[2], $desserts->id, $menu->id);
      $products->push($product);
      $desserts->products->push($product);
    }

    // İçecekler
    $drinks = $categories[3];
    $drinkItems = [
      ['Türk Kahvesi', 'Geleneksel Türk kahvesi', 25.00],
      ['Çay', 'Demlik çay', 10.00],
      ['Ayran', 'Ev yapımı ayran', 15.00],
      ['Meyve Suyu', 'Taze sıkılmış portakal, elma veya nar suyu', 20.00]
    ];

    foreach ($drinkItems as $item) {
      $product = $this->createProduct($productId++, $item[0], $item[1], $item[2], $drinks->id, $menu->id);
      $products->push($product);
      $drinks->products->push($product);
    }

    return $products;
  }

  /**
   * Örnek bir ürün oluştur
   *
   * @param  int  $id
   * @param  string  $name
   * @param  string  $description
   * @param  float  $price
   * @param  int  $categoryId
   * @param  int  $menuId
   * @return object
   */
  private function createProduct($id, $name, $description, $price, $categoryId, $menuId)
  {
    return (object) [
      'id' => $id,
      'name' => $name,
      'description' => $description,
      'price' => $price,
      'image' => null,
      'category_id' => $categoryId,
      'menu_id' => $menuId,
      'featured' => rand(0, 1) == 1,
      'is_active' => true
    ];
  }

  /**
   * Örnek bir tenant oluştur
   *
   * @param  Theme  $theme
   * @return object
   */
  private function createSampleTenant($theme)
  {
    return (object) [
      'id' => 1,
      'name' => 'Örnek Müşteri',
      'email' => 'ornek@musteri.com',
      'theme_id' => $theme->id,
      'theme' => $theme,
      'is_active' => true
    ];
  }
}