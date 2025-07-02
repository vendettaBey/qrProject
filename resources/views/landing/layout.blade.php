<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'QR Menu - Dijital Menü Çözümü')</title>
    <meta name="description" content="@yield('description', 'Restoranınız için modern QR menü çözümü. Kolay kullanım, hızlı güncelleme ve profesyonel görünüm.')">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#764ba2">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('landing') }}" class="flex items-center">
                        <i class="fas fa-qrcode text-2xl text-purple-600 mr-2"></i>
                        <span class="text-xl font-bold gradient-text">QR Menu</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('landing') }}" class="text-gray-700 hover:text-purple-600 transition-colors">Ana
                        Sayfa</a>
                    <a href="{{ route('features') }}"
                        class="text-gray-700 hover:text-purple-600 transition-colors">Özellikler</a>
                    <a href="{{ route('pricing') }}"
                        class="text-gray-700 hover:text-purple-600 transition-colors">Fiyatlandırma</a>
                    <a href="{{ route('contact') }}"
                        class="text-gray-700 hover:text-purple-600 transition-colors">İletişim</a>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ auth()->user()->role === 'super_admin' ? url('/super-admin') : url('/panel') }}"
                            class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                            Panel
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                            Giriş Yap
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-qrcode text-2xl text-purple-400 mr-2"></i>
                        <span class="text-xl font-bold">QR Menu</span>
                    </div>
                    <p class="text-gray-400">Restoranınız için modern dijital menü çözümü.</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Ürün</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('features') }}" class="hover:text-white transition-colors">Özellikler</a>
                        </li>
                        <li><a href="{{ route('pricing') }}"
                                class="hover:text-white transition-colors">Fiyatlandırma</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Temalar</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Destek</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">İletişim</a>
                        </li>
                        <li><a href="#" class="hover:text-white transition-colors">Yardım</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Dokümantasyon</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Sosyal Medya</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} QR Menu. Tüm hakları saklıdır.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js');
            });
        }
    </script>
</body>

</html>
