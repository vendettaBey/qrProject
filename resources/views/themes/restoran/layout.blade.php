<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Bermiz Restaurant' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('themes/restoran/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tema CSS -->
    <link rel="stylesheet" href="{{ asset('themes/restoran/css/style.css') }}">

    @stack('styles')
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('themes/restoran/images/logo.png') }}" alt="Bermiz Restaurant">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-6">
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <nav class="main-menu d-none d-lg-block">
                            <ul class="d-flex">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/menu') }}">Menu</a></li>
                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                            </ul>
                        </nav>
                        <div class="header-actions d-flex align-items-center">
                            <div class="cart-icon me-3">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="cart-count">0</span>
                            </div>
                            <div class="mobile-menu-toggle d-lg-none">
                                <button class="toggle-btn">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <div class="close-menu">
            <i class="fas fa-times"></i>
        </div>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/menu') }}">Menu</a></li>
            <li><a href="{{ url('/about') }}">About Us</a></li>
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="footer-logo">
                        <img src="{{ asset('themes/restoran/images/logo.png') }}" alt="Bermiz Restaurant"
                            height="40">
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <p class="copyright mb-0">
                        © {{ date('Y') }} Bermiz Restaurant. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('themes/restoran/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
