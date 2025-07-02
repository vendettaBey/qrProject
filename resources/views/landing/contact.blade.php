@extends('landing.layout')

@section('title', 'İletişim - QR Menu')
@section('description', 'QR Menu ile iletişime geçin. Sorularınız için bize ulaşın, destek alın.')

@section('content')
    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">İletişim</h1>
            <p class="text-xl text-gray-200 max-w-3xl mx-auto">
                Sorularınız mı var? Bize ulaşın. Ekibimiz size yardımcı olmaktan mutluluk duyacak.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div>
                    <h2 class="text-3xl font-bold mb-8">Bize Yazın</h2>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ad Soyad</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Konu</label>
                            <select
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option>Genel Bilgi</option>
                                <option>Teknik Destek</option>
                                <option>Satış</option>
                                <option>İş Ortaklığı</option>
                                <option>Diğer</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mesaj</label>
                            <textarea rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-purple-600 text-white py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Mesaj Gönder
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div>
                    <h2 class="text-3xl font-bold mb-8">İletişim Bilgileri</h2>

                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-purple-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Adres</h3>
                                <p class="text-gray-600">
                                    İstanbul, Türkiye<br>
                                    Merkez Ofis
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-phone text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Telefon</h3>
                                <p class="text-gray-600">
                                    +90 (212) 555 0123<br>
                                    Pazartesi - Cuma: 09:00 - 18:00
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Email</h3>
                                <p class="text-gray-600">
                                    info@qrmenu.com<br>
                                    destek@qrmenu.com
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-clock text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Çalışma Saatleri</h3>
                                <p class="text-gray-600">
                                    Pazartesi - Cuma: 09:00 - 18:00<br>
                                    Cumartesi: 10:00 - 16:00<br>
                                    Pazar: Kapalı
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mt-12">
                        <h3 class="text-xl font-semibold mb-4">Sosyal Medya</h3>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="bg-blue-400 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="bg-pink-600 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-pink-700 transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#"
                                class="bg-blue-700 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-blue-800 transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Sık Sorulan Sorular</h2>
                <p class="text-xl text-gray-600">
                    En çok sorulan sorular ve cevapları
                </p>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-3">QR Menu nasıl çalışır?</h3>
                    <p class="text-gray-600">
                        QR Menu, restoranların dijital menülerini QR kodlar aracılığıyla
                        müşterilerine sunmasını sağlar. Müşteriler QR kodu tarayarak
                        menüye anında erişebilir.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-3">Teknik destek alabilir miyim?</h3>
                    <p class="text-gray-600">
                        Evet, tüm müşterilerimiz teknik destek alabilir. Email, telefon
                        ve canlı destek seçeneklerimiz mevcuttur.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-3">Menü güncellemeleri ne kadar sürede yayınlanır?</h3>
                    <p class="text-gray-600">
                        Menü güncellemeleri anında yayınlanır. Değişiklik yaptığınız anda
                        müşteriler güncel menüyü görebilir.
                    </p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mb-3">Mobil uyumluluk nasıl?</h3>
                    <p class="text-gray-600">
                        QR Menu tamamen mobil uyumludur. Tüm cihazlarda (telefon, tablet,
                        bilgisayar) mükemmel görünüm sağlar.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-6">Bizimle İletişime Geçin</h2>
            <p class="text-xl mb-8 text-gray-200">
                Sorularınız mı var? Size yardımcı olmaktan mutluluk duyarız.
                Hemen iletişime geçin.
            </p>
            <a href="{{ route('login') }}"
                class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition-colors inline-block">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Giriş Yap
            </a>
        </div>
    </section>
@endsection
