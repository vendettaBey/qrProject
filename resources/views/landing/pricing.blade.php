@extends('landing.layout')

@section('title', 'Fiyatlandırma - QR Menu')
@section('description',
    'QR Menu fiyatlandırma planları. Aylık, yıllık ve süresiz planlar ile restoranınızı
    dijitalleştirin.')

@section('content')
    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">Fiyatlandırma</h1>
            <p class="text-xl text-gray-200 max-w-3xl mx-auto">
                Her bütçeye uygun planlar. Aylık, yıllık veya süresiz plan seçin,
                restoranınızı dijitalleştirin.
            </p>
        </div>
    </section>

    <!-- Pricing Plans -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Aylık Plan -->
                <div class="bg-gray-50 rounded-xl p-8 border-2 border-gray-200">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold mb-2">Aylık</h3>
                        <div class="text-4xl font-bold text-gray-900 mb-2">₺199</div>
                        <p class="text-gray-600">Aylık</p>
                        <p class="text-sm text-gray-500 mt-2">Her ay yenilenir</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            5 Menü
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Sınırsız QR Kod
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Sınırsız Ürün
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Premium Temalar
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Öncelikli Destek
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Temel Analitik
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Özel Domain
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-times text-red-500 mr-3"></i>
                            API Erişimi
                        </li>
                    </ul>

                    <a href="{{ route('login') }}"
                        class="w-full bg-gray-600 text-white py-3 rounded-lg text-center font-semibold hover:bg-gray-700 transition-colors block">
                        Aylık Başla
                    </a>
                </div>

                <!-- Yıllık Plan -->
                <div class="bg-purple-50 rounded-xl p-8 border-2 border-purple-500 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-purple-600 text-white px-4 py-2 rounded-full text-sm font-bold">
                            %20 İNDİRİM
                        </span>
                    </div>

                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold mb-2">Yıllık</h3>
                        <div class="text-4xl font-bold text-gray-900 mb-2">₺1,908</div>
                        <p class="text-gray-600">Yıllık</p>
                        <p class="text-sm text-green-600 mt-2">₺159/ay (2 ay bedava)</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            10 Menü
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Sınırsız QR Kod
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Sınırsız Ürün
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Premium Temalar
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Öncelikli Destek
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Gelişmiş Analitik
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Özel Domain
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            API Erişimi
                        </li>
                    </ul>

                    <a href="{{ route('login') }}"
                        class="w-full bg-purple-600 text-white py-3 rounded-lg text-center font-semibold hover:bg-purple-700 transition-colors block">
                        Yıllık Başla
                    </a>
                </div>

                <!-- Süresiz Plan -->
                <div class="bg-yellow-50 rounded-xl p-8 border-2 border-yellow-500 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-yellow-600 text-white px-4 py-2 rounded-full text-sm font-bold">
                            EN İYİ DEĞER
                        </span>
                    </div>

                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold mb-2">Süresiz</h3>
                        <div class="text-4xl font-bold text-gray-900 mb-2">₺4,999</div>
                        <p class="text-gray-600">Tek Seferlik</p>
                        <p class="text-sm text-green-600 mt-2">Ömür boyu kullanım</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Sınırsız Menü
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Sınırsız QR Kod
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Sınırsız Ürün
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Özel Tema Geliştirme
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            7/24 Destek
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Gelişmiş Analitik
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            API Erişimi
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Beyaz Etiket
                        </li>
                    </ul>

                    <a href="{{ route('contact') }}"
                        class="w-full bg-yellow-600 text-white py-3 rounded-lg text-center font-semibold hover:bg-yellow-700 transition-colors block">
                        Süresiz Al
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison Table -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Plan Karşılaştırması</h2>
                <p class="text-xl text-gray-600">
                    Hangi planın size uygun olduğunu karşılaştırın
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Özellik</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-900">Aylık</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-900">Yıllık</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-900">Süresiz</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">Menü Sayısı</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">5</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">10</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Sınırsız</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">QR Kod</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Sınırsız</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Sınırsız</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Sınırsız</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">Ürün Sayısı</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Sınırsız</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Sınırsız</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Sınırsız</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">Tema Seçenekleri</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Premium</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Premium</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Özel</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">Analitik</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Temel</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Gelişmiş</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Gelişmiş</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">API Erişimi</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">-</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">✓</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">✓</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">Beyaz Etiket</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">-</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">-</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">✓</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">Destek</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Öncelikli</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">Öncelikli</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600">7/24</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Sık Sorulan Sorular</h2>
                <p class="text-xl text-gray-600">
                    Fiyatlandırma hakkında merak ettikleriniz
                </p>
            </div>

            <div class="space-y-8">
                <div class="bg-gray-50 rounded-xl p-8">
                    <h3 class="text-xl font-semibold mb-4">Süresiz plan nedir?</h3>
                    <p class="text-gray-600">
                        Süresiz plan tek seferlik ödeme ile ömür boyu kullanım sağlar.
                        Aylık veya yıllık ödeme yapmazsınız, tüm özelliklere süresiz erişiminiz olur.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-8">
                    <h3 class="text-xl font-semibold mb-4">Yıllık planda indirim var mı?</h3>
                    <p class="text-gray-600">
                        Evet, yıllık planda %20 indirim bulunmaktadır. Aylık ₺199 yerine
                        yıllık ₺1,908 ödeyerek 2 ay bedava kullanırsınız.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-8">
                    <h3 class="text-xl font-semibold mb-4">Plan değişikliği yapabilir miyim?</h3>
                    <p class="text-gray-600">
                        Evet, istediğiniz zaman planınızı yükseltebilir veya düşürebilirsiniz.
                        Değişiklikler anında uygulanır.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-8">
                    <h3 class="text-xl font-semibold mb-4">Süresiz plandan geri dönüş var mı?</h3>
                    <p class="text-gray-600">
                        Süresiz plan tek seferlik ödeme olduğu için geri dönüş bulunmamaktadır.
                        Ancak 30 gün içinde memnun kalmazsanız iade edebiliriz.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-8">
                    <h3 class="text-xl font-semibold mb-4">Ödeme yöntemleri nelerdir?</h3>
                    <p class="text-gray-600">
                        Kredi kartı, banka kartı ve havale ile ödeme yapabilirsiniz.
                        Tüm ödemeler güvenli SSL sertifikası ile korunur.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-6">Hemen Başlayın</h2>
            <p class="text-xl mb-8 text-gray-200">
                14 gün ücretsiz deneme ile başlayın, tüm özellikleri test edin.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}"
                    class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition-colors">
                    <i class="fas fa-rocket mr-2"></i>
                    Ücretsiz Deneme
                </a>
                <a href="{{ route('contact') }}"
                    class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors">
                    <i class="fas fa-phone mr-2"></i>
                    Bize Ulaşın
                </a>
            </div>
        </div>
    </section>
@endsection
