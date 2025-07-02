@extends('landing.layout')

@section('title', 'Özellikler - QR Menu')
@section('description',
    'QR Menu\'nun tüm özelliklerini keşfedin. Mobil uyumlu, anında güncelleme, analitik ve daha
    fazlası.')

@section('content')
    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">Özellikler</h1>
            <p class="text-xl text-gray-200 max-w-3xl mx-auto">
                Restoranınızı dijitalleştirmek için ihtiyacınız olan her şey.
                Modern, kullanıcı dostu ve güçlü özellikler.
            </p>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- QR Kod Yönetimi -->
                <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-qrcode text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">QR Kod Yönetimi</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Sınırsız QR kod oluşturma
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Masa bazlı QR kodlar
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Otomatik QR kod güncelleme
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            QR kod tarama istatistikleri
                        </li>
                    </ul>
                </div>

                <!-- Menü Yönetimi -->
                <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-utensils text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Menü Yönetimi</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Kategori bazlı düzenleme
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Ürün fotoğrafları
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Fiyat güncelleme
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Stok durumu takibi
                        </li>
                    </ul>
                </div>

                <!-- Tema Özelleştirme -->
                <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-palette text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Tema Özelleştirme</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Hazır temalar
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Renk özelleştirme
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Font seçenekleri
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Logo ve marka entegrasyonu
                        </li>
                    </ul>
                </div>

                <!-- Analitik ve Raporlar -->
                <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chart-bar text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Analitik ve Raporlar</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Menü görüntüleme istatistikleri
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Popüler ürünler
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Müşteri davranış analizi
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Detaylı raporlar
                        </li>
                    </ul>
                </div>

                <!-- Mobil Uyumluluk -->
                <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Mobil Uyumluluk</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Responsive tasarım
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Hızlı yükleme
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Touch-friendly arayüz
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Offline çalışma
                        </li>
                    </ul>
                </div>

                <!-- Güvenlik -->
                <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Güvenlik</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            SSL sertifikası
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Veri şifreleme
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Güvenli yedekleme
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            GDPR uyumluluğu
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-6">Bu Özellikleri Deneyin</h2>
            <p class="text-xl mb-8 text-gray-200">
                Tüm özellikleri hemen deneyin.
                Restoranınızı dijitalleştirmek için giriş yapın.
            </p>
            <a href="{{ route('login') }}"
                class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition-colors inline-block">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Giriş Yap
            </a>
        </div>
    </section>
@endsection
