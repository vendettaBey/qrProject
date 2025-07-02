<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol - QR Menü</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="gradient-bg min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/10 backdrop-blur-md border-b border-white/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('landing') }}" class="text-white text-2xl font-bold">
                        <i class="fas fa-qrcode mr-2"></i>
                        QR Menü
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('landing') }}" class="text-white hover:text-yellow-300 transition-colors">
                        Ana Sayfa
                    </a>
                    <a href="{{ route('login') }}" class="text-white hover:text-yellow-300 transition-colors">
                        Giriş Yap
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-white mb-2">
                    <i class="fas fa-user-plus mr-2"></i>
                    Kayıt Ol
                </h2>
                <p class="text-gray-200">
                    Hesap oluşturun ve QR menünüzü yönetmeye başlayın
                </p>
            </div>

            <!-- Register Form -->
            <div class="glass-effect rounded-2xl p-8 shadow-2xl">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-white mb-2">
                            <i class="fas fa-user mr-2"></i>
                            Ad Soyad
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            autofocus autocomplete="name"
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all">
                        @error('name')
                            <p class="mt-2 text-red-300 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-2">
                            <i class="fas fa-envelope mr-2"></i>
                            E-posta Adresi
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autocomplete="username"
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all">
                        @error('email')
                            <p class="mt-2 text-red-300 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-white mb-2">
                            <i class="fas fa-lock mr-2"></i>
                            Şifre
                        </label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all">
                        @error('password')
                            <p class="mt-2 text-red-300 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-white mb-2">
                            <i class="fas fa-lock mr-2"></i>
                            Şifre Tekrar
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password"
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all">
                        @error('password_confirmation')
                            <p class="mt-2 text-red-300 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Register Button -->
                    <button type="submit"
                        class="w-full bg-yellow-400 text-gray-900 py-3 px-4 rounded-lg font-semibold hover:bg-yellow-300 transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-transparent">
                        <i class="fas fa-user-plus mr-2"></i>
                        Kayıt Ol
                    </button>
                </form>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-200">
                        Zaten hesabınız var mı?
                        <a href="{{ route('login') }}"
                            class="text-yellow-300 hover:text-yellow-200 font-semibold transition-colors">
                            Giriş Yapın
                        </a>
                    </p>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-8">
                <a href="{{ route('landing') }}" class="text-white hover:text-yellow-300 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Ana Sayfaya Dön
                </a>
            </div>
        </div>
    </div>
</body>

</html>
