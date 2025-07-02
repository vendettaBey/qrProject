@extends('landing.layout')

@section('title', 'QR Menu - Dijital Menü Çözümü')
@section('description',
    'Restoranınız için modern QR menü çözümü. Kolay kullanım, hızlı güncelleme ve profesyonel
    görünüm.')

@section('content')
    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        Dijital Menü ile
                        <span class="text-yellow-300">Müşteri Deneyimini</span>
                        Artırın
                    </h1>
                    <p class="text-xl mb-8 text-gray-200">
                        QR kod ile anında erişilebilen dijital menüler. Kolay yönetim,
                        hızlı güncelleme ve profesyonel görünüm ile restoranınızı dijitalleştirin.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('login') }}"
                            class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition-colors text-center">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Giriş Yap
                        </a>
                        <a href="{{ route('features') }}"
                            class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors text-center">
                            <i class="fas fa-play mr-2"></i>
                            Demo İzle
                        </a>
                    </div>
                </div>
                <div class="text-center">
                    <div class="relative">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 shadow-2xl">
                            <i class="fas fa-qrcode text-8xl text-yellow-300 mb-4"></i>
                            <h3 class="text-2xl font-bold mb-2">QR Menü</h3>
                            <p class="text-gray-200">Anında erişim, kolay yönetim</p>
                        </div>
                        <div
                            class="absolute -top-4 -right-4 bg-yellow-400 text-gray-900 px-4 py-2 rounded-full text-sm font-bold">
                            YENİ
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Neden QR Menu?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Modern restoranlar için tasarlanmış dijital menü çözümü ile
                    müşteri deneyimini artırın ve operasyonel verimliliği sağlayın.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 rounded-xl bg-gray-50 hover:bg-purple-50 transition-colors hover-scale">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-mobile-alt text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Mobil Uyumlu</h3>
                    <p class="text-gray-600">
                        Tüm cihazlarda mükemmel görünüm. Telefon, tablet ve bilgisayarlarda
                        sorunsuz çalışır.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-6 rounded-xl bg-gray-50 hover:bg-purple-50 transition-colors hover-scale">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-sync-alt text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Anında Güncelleme</h3>
                    <p class="text-gray-600">
                        Fiyat ve menü değişikliklerini anında yapın.
                        Müşteriler her zaman güncel bilgileri görür.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-6 rounded-xl bg-gray-50 hover:bg-purple-50 transition-colors hover-scale">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Analitik</h3>
                    <p class="text-gray-600">
                        Menü performansını takip edin. Hangi ürünlerin daha çok
                        görüntülendiğini öğrenin.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="text-center p-6 rounded-xl bg-gray-50 hover:bg-purple-50 transition-colors hover-scale">
                    <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-palette text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Özelleştirilebilir</h3>
                    <p class="text-gray-600">
                        Markanıza uygun temalar seçin. Renk, font ve düzeni
                        istediğiniz gibi ayarlayın.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="text-center p-6 rounded-xl bg-gray-50 hover:bg-purple-50 transition-colors hover-scale">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Güvenli</h3>
                    <p class="text-gray-600">
                        SSL sertifikası ile güvenli bağlantı. Müşteri verileriniz
                        her zaman korunur.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="text-center p-6 rounded-xl bg-gray-50 hover:bg-purple-50 transition-colors hover-scale">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">7/24 Destek</h3>
                    <p class="text-gray-600">
                        Teknik destek ekibimiz her zaman yanınızda.
                        Sorularınızı hızlıca yanıtlarız.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Fiyatlandırma</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Her bütçeye uygun planlar. Aylık, yıllık veya süresiz plan seçin,
                    restoranınızı dijitalleştirin.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Aylık Plan -->
                <div class="bg-white rounded-xl p-8 border-2 border-gray-200 shadow-lg">
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
                    </ul>
                </div>

                <!-- Yıllık Plan -->
                <div class="bg-purple-50 rounded-xl p-8 border-2 border-purple-500 shadow-lg relative">
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
                </div>

                <!-- Süresiz Plan -->
                <div class="bg-yellow-50 rounded-xl p-8 border-2 border-yellow-500 shadow-lg relative">
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

    <!-- How It Works Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Nasıl Çalışır?</h2>
                <p class="text-xl text-gray-600">
                    Sadece 3 adımda dijital menünüzü oluşturun
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div
                        class="bg-purple-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        1
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Hesap Oluşturun</h3>
                    <p class="text-gray-600">
                        Hızlıca hesabınızı oluşturun ve restoran bilgilerinizi girin.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div
                        class="bg-purple-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        2
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Menünüzü Ekleyin</h3>
                    <p class="text-gray-600">
                        Kategoriler ve ürünlerinizi ekleyin, fotoğraflar yükleyin.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div
                        class="bg-purple-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                        3
                    </div>
                    <h3 class="text-xl font-semibold mb-3">QR Kodları Yazdırın</h3>
                    <p class="text-gray-600">
                        QR kodlarını yazdırın ve masalara yerleştirin. Artık hazırsınız!
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
                Restoranınızı dijitalleştirmek için sadece birkaç dakika yeterli.
                Hemen giriş yapın ve müşteri deneyimini artırın.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}"
                    class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition-colors">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Giriş Yap
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
