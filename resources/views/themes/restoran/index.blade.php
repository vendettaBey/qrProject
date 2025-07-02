@extends('themes.restoran.layout')

@section('content')
    <!-- Hero Slider Başlangıç -->
    <section class="hero-slider">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="hero-slide"
                        style="background-image: url('{{ asset('themes/restoran/images/slider-1.jpg') }}');">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="hero-content">
                                        <h1>Her Lokmada Mükemmel Lezzet</h1>
                                        <p>Taze malzemeler ve özel tariflerimizle hazırlanan lezzetlerimizi keşfedin. Özenle
                                            seçilmiş malzemeler ve usta şeflerimizin ellerinde hayat bulan eşsiz tatlar sizi
                                            bekliyor.</p>
                                        <a href="{{ url('/menu') }}" class="btn btn-primary">Menüyü Keşfet</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero-slide"
                        style="background-image: url('{{ asset('themes/restoran/images/slider-2.jpg') }}');">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="hero-content">
                                        <h1>Özel Anlarınız İçin Eşsiz Lezzetler</h1>
                                        <p>Her özel anınızda yanınızdayız. Doğum günleri, yıldönümleri ve diğer özel
                                            günleriniz için özel menülerimizi keşfedin.</p>
                                        <a href="{{ url('/iletisim') }}" class="btn btn-primary">Rezervasyon Yap</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Önceki</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sonraki</span>
            </button>
        </div>
    </section>
    <!-- Hero Slider Bitiş -->

    <!-- Hakkımızda Başlangıç -->
    <section class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-image position-relative">
                        <img src="{{ asset('themes/restoran/images/about-1.jpg') }}" alt="Hakkımızda"
                            class="img-fluid rounded">
                        <img src="{{ asset('themes/restoran/images/about-2.jpg') }}" alt="Hakkımızda"
                            class="img-fluid rounded about-image-small">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title mb-4">
                            <span class="subtitle"><i class="fas fa-star"></i> Restoranımız <i
                                    class="fas fa-star"></i></span>
                            <h2>Her Özel An İçin Buradayız</h2>
                        </div>
                        <p>Restoranımız, 2010 yılından bu yana müşterilerine eşsiz lezzetler sunmaktadır. Taze malzemeler,
                            özel tarifler ve profesyonel ekibimizle her zaman en iyiyi sunmak için çalışıyoruz.</p>
                        <p>Şeflerimiz, geleneksel tarifleri modern dokunuşlarla birleştirerek size unutulmaz bir yemek
                            deneyimi yaşatmayı hedefliyor. Restoranımızda kullanılan tüm malzemeler özenle seçiliyor ve her
                            yemek büyük bir titizlikle hazırlanıyor.</p>
                        <ul class="about-features">
                            <li><i class="fas fa-check"></i> Taze ve kaliteli malzemeler</li>
                            <li><i class="fas fa-check"></i> Uzman şefler</li>
                            <li><i class="fas fa-check"></i> Hijyenik ortam</li>
                            <li><i class="fas fa-check"></i> Özel tarifler</li>
                        </ul>
                        <a href="{{ url('/hakkimizda') }}" class="btn btn-primary">Daha Fazla Bilgi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hakkımızda Bitiş -->

    <!-- Öne Çıkan Menüler Başlangıç -->
    <section class="featured-menu py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <span class="subtitle"><i class="fas fa-star"></i> Menümüz <i class="fas fa-star"></i></span>
                        <h2>Öne Çıkan Lezzetlerimiz</h2>
                        <p>Şefimizin özel olarak hazırladığı ve müşterilerimizin en çok tercih ettiği lezzetler</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($featuredProducts as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="featured-menu-item">
                            <div class="featured-menu-img">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('themes/restoran/images/placeholder.jpg') }}"
                                        alt="{{ $product->name }}">
                                @endif
                            </div>
                            <div class="featured-menu-content">
                                <h4>{{ $product->name }}</h4>
                                <p>{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">{{ number_format($product->price, 2) }} TL</span>
                                    <span class="category">{{ $product->category->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ url('/menu') }}" class="btn btn-primary">Tüm Menüyü Gör</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Öne Çıkan Menüler Bitiş -->

    <!-- İstatistikler Başlangıç -->
    <section class="stats-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="stat-item text-center">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="stat-number">5000+</h3>
                        <p class="stat-text">Mutlu Müşteri</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="stat-item text-center">
                        <div class="stat-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h3 class="stat-number">50+</h3>
                        <p class="stat-text">Özel Tarif</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="stat-item text-center">
                        <div class="stat-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="stat-number">15+</h3>
                        <p class="stat-text">Yıllık Deneyim</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item text-center">
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="stat-number">4.8</h3>
                        <p class="stat-text">Müşteri Puanı</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- İstatistikler Bitiş -->

    <!-- Testimonial Başlangıç -->
    <section class="testimonial-section py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <span class="subtitle"><i class="fas fa-star"></i> Müşteri Yorumları <i
                                class="fas fa-star"></i></span>
                        <h2>Müşterilerimiz Ne Diyor?</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-img">
                                        <img src="{{ asset('themes/restoran/images/testimonial-1.jpg') }}"
                                            alt="Testimonial">
                                    </div>
                                    <div class="testimonial-content">
                                        <p>"Bu restoran gerçekten harika bir deneyim sunuyor. Yemekler taze ve lezzetli,
                                            servis hızlı ve personel çok nazik. Kesinlikle tekrar geleceğim ve herkese
                                            tavsiye edeceğim."</p>
                                        <h4>Ahmet Yılmaz</h4>
                                        <span>İstanbul</span>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-img">
                                        <img src="{{ asset('themes/restoran/images/testimonial-2.jpg') }}"
                                            alt="Testimonial">
                                    </div>
                                    <div class="testimonial-content">
                                        <p>"Özel günümüzü kutlamak için gittiğimiz bu restoranda muhteşem bir akşam
                                            geçirdik. Yemekler enfes, ambiyans çok güzel ve personel çok ilgiliydi.
                                            Teşekkürler!"</p>
                                        <h4>Ayşe Demir</h4>
                                        <span>Ankara</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Önceki</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Sonraki</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Bitiş -->

    <!-- İletişim CTA Başlangıç -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h3>Bize Ulaşın</h3>
                    <p class="mb-4">Rezervasyon yapmak, özel etkinlikleriniz için bilgi almak veya sorularınız için bize
                        ulaşabilirsiniz</p>
                    <div class="cta-phone mb-3">
                        <i class="fas fa-phone"></i>
                        <span>+90 (212) 123 45 67</span>
                    </div>
                    <a href="{{ url('/iletisim') }}" class="btn btn-primary">İletişime Geç</a>
                </div>
            </div>
        </div>
    </section>
    <!-- İletişim CTA Bitiş -->
@endsection

@push('styles')
    <style>
        /* Ana Sayfa Özel Stilleri */
        .hero-slider {
            position: relative;
        }

        .hero-slide {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 600px;
            position: relative;
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            padding: 100px 0;
            color: #fff;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .about-image {
            position: relative;
        }

        .about-image-small {
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 50%;
            border: 10px solid #fff;
        }

        .section-title {
            margin-bottom: 40px;
        }

        .section-title .subtitle {
            color: #e74c3c;
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
        }

        .section-title h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 15px;
            font-family: 'Playfair Display', serif;
        }

        .about-features {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .about-features li {
            padding: 10px 0;
        }

        .about-features li i {
            color: #e74c3c;
            margin-right: 10px;
        }

        .featured-menu-item {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .featured-menu-img {
            height: 200px;
            overflow: hidden;
        }

        .featured-menu-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .featured-menu-item:hover .featured-menu-img img {
            transform: scale(1.1);
        }

        .featured-menu-content {
            padding: 20px;
        }

        .featured-menu-content h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            font-family: 'Playfair Display', serif;
        }

        .featured-menu-content p {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .featured-menu-content .price {
            color: #e74c3c;
            font-weight: 600;
            font-size: 18px;
        }

        .featured-menu-content .category {
            background-color: #f8f9fa;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: #666;
        }

        .stats-section {
            background-color: #f8f9fa;
        }

        .stat-item {
            padding: 20px;
        }

        .stat-icon {
            font-size: 36px;
            color: #e74c3c;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
            font-family: 'Playfair Display', serif;
        }

        .stat-text {
            font-size: 16px;
            color: #666;
            margin-bottom: 0;
        }

        .testimonial-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ asset('themes/restoran/images/testimonial-bg.jpg') }}') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 80px 0;
        }

        .testimonial-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            border: 5px solid #e74c3c;
        }

        .testimonial-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-content p {
            font-size: 18px;
            font-style: italic;
            margin-bottom: 20px;
        }

        .testimonial-content h4 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .testimonial-content span {
            font-size: 14px;
            color: #e74c3c;
        }

        .cta-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('{{ asset('themes/restoran/images/cta-bg.jpg') }}') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 80px 0;
        }

        .cta-section h3 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            font-family: 'Playfair Display', serif;
        }

        .cta-phone {
            font-size: 24px;
            font-weight: 600;
        }

        .cta-phone i {
            color: #e74c3c;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #e74c3c;
            border-color: #e74c3c;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
    </style>
@endpush
