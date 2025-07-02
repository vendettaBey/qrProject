<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap - QR Menü</title>
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
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Giriş Yap
                </h2>
                <p class="text-gray-200">
                    Hesabınıza giriş yapın ve QR menünüzü yönetin
                </p>
            </div>

            <!-- Login Form -->
            <div class="glass-effect rounded-2xl p-8 shadow-2xl">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-2">
                            <i class="fas fa-envelope mr-2"></i>
                            E-posta Adresi
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autofocus autocomplete="username"
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
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all">
                        @error('password')
                            <p class="mt-2 text-red-300 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="h-4 w-4 text-yellow-400 focus:ring-yellow-400 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-200">
                            Beni Hatırla
                        </label>
                    </div>

                    <!-- Forgot Password -->
                    <div class="text-right">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm text-yellow-300 hover:text-yellow-200 transition-colors">
                                Şifremi Unuttum?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full bg-yellow-400 text-gray-900 py-3 px-4 rounded-lg font-semibold hover:bg-yellow-300 transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-transparent">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Giriş Yap
                    </button>
                </form>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-200">
                        Hesap oluşturmak için lütfen sistem yöneticisi ile iletişime geçin.
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
