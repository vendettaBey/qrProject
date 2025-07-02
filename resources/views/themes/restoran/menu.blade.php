@extends('themes.restoran.layout')

@section('content')
    @if (isset($isPreview) && $isPreview)
        <div class="preview-banner">
            <div class="container">
                <div class="preview-banner-content">
                    <i class="fas fa-eye"></i>
                    <span>Tema Önizleme Modu</span>
                    <button class="btn btn-sm btn-light ms-3" onclick="window.close()">Kapat</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content text-center">
                        <h1 class="page-title">{{ $menu->name }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <div class="section-subtitle">
                            <span class="star-icon">★</span>
                            {{ $restaurant->name }}
                            <span class="star-icon">★</span>
                        </div>
                        <h2 class="section-title">Tasty With Good Price</h2>
                        <p class="section-description">
                            Diam leo massa pellentesque a neque turpis cum mi gravida. Amet massa adipiscing mi dictum urna
                            commodo. Fringilla ipsum etiam habitasse dolor lacus viverra.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Menu Categories -->
            <div class="menu-categories">
                <div class="row">
                    <div class="col-12">
                        <div class="category-tabs">
                            <ul class="nav nav-pills justify-content-center" id="menuTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-tab" data-bs-toggle="pill"
                                        data-bs-target="#all" type="button" role="tab" aria-controls="all"
                                        aria-selected="true">Tümü</button>
                                </li>
                                @foreach ($categories as $category)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="{{ Str::slug($category->name) }}-tab"
                                            data-bs-toggle="pill" data-bs-target="#{{ Str::slug($category->name) }}"
                                            type="button" role="tab" aria-controls="{{ Str::slug($category->name) }}"
                                            aria-selected="false">{{ $category->name }}</button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Content -->
            <div class="menu-content">
                <div class="tab-content" id="menuTabContent">
                    <!-- All Menu -->
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="menu-item">
                                        <div class="menu-item-image">
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}">
                                            @else
                                                <img src="{{ asset('themes/restoran/images/placeholder.jpg') }}"
                                                    alt="{{ $product->name }}">
                                            @endif
                                        </div>
                                        <div class="menu-item-content">
                                            <div class="menu-item-header">
                                                <h4 class="menu-item-title">{{ $product->name }}</h4>
                                                <span
                                                    class="menu-item-price">${{ number_format($product->price, 2) }}</span>
                                            </div>
                                            <p class="menu-item-description">{{ $product->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Category Menus -->
                    @foreach ($categories as $category)
                        <div class="tab-pane fade" id="{{ Str::slug($category->name) }}" role="tabpanel"
                            aria-labelledby="{{ Str::slug($category->name) }}-tab">
                            <div class="row">
                                @foreach ($category->products as $product)
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="menu-item">
                                            <div class="menu-item-image">
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}"
                                                        alt="{{ $product->name }}">
                                                @else
                                                    <img src="{{ asset('themes/restoran/images/placeholder.jpg') }}"
                                                        alt="{{ $product->name }}">
                                                @endif
                                            </div>
                                            <div class="menu-item-content">
                                                <div class="menu-item-header">
                                                    <h4 class="menu-item-title">{{ $product->name }}</h4>
                                                    <span
                                                        class="menu-item-price">${{ number_format($product->price, 2) }}</span>
                                                </div>
                                                <p class="menu-item-description">{{ $product->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Bermiz Restaurant Theme Styles */

        /* Preview Banner */
        .preview-banner {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 1100;
        }

        .preview-banner-content {
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
        }

        .preview-banner-content i {
            margin-right: 10px;
            font-size: 18px;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../images/menu-hero-bg.jpg') no-repeat center center;
            background-size: cover;
            padding: 100px 0;
            color: #fff;
        }

        .page-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
        }

        .breadcrumb {
            background: transparent;
            margin-bottom: 0;
        }

        .breadcrumb-item a {
            color: #fff;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #f39c12;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: #fff;
        }

        /* Menu Section */
        .menu-section {
            padding: 80px 0;
            background: #fff;
        }

        .section-header {
            margin-bottom: 60px;
        }

        .section-subtitle {
            color: #f39c12;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .star-icon {
            color: #f39c12;
            margin: 0 10px;
        }

        .section-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
            color: #2c3e50;
        }

        .section-description {
            font-size: 16px;
            color: #7f8c8d;
            line-height: 1.8;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Menu Categories */
        .category-tabs {
            margin-bottom: 50px;
        }

        .category-tabs .nav-pills {
            border: none;
            justify-content: center;
        }

        .category-tabs .nav-pills .nav-link {
            color: #2c3e50;
            background-color: transparent;
            border: 2px solid #ecf0f1;
            border-radius: 30px;
            padding: 12px 25px;
            margin: 0 5px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .category-tabs .nav-pills .nav-link:hover,
        .category-tabs .nav-pills .nav-link.active {
            color: #fff;
            background-color: #f39c12;
            border-color: #f39c12;
        }

        /* Menu Items */
        .menu-item {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
        }

        .menu-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .menu-item-image {
            height: 200px;
            overflow: hidden;
        }

        .menu-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .menu-item:hover .menu-item-image img {
            transform: scale(1.1);
        }

        .menu-item-content {
            padding: 25px;
        }

        .menu-item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .menu-item-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 0;
            font-family: 'Playfair Display', serif;
            color: #2c3e50;
        }

        .menu-item-price {
            color: #f39c12;
            font-weight: 700;
            font-size: 20px;
        }

        .menu-item-description {
            font-size: 14px;
            color: #7f8c8d;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .page-title {
                font-size: 36px;
            }

            .section-title {
                font-size: 32px;
            }
        }

        @media (max-width: 767px) {
            .page-title {
                font-size: 28px;
            }

            .section-title {
                font-size: 24px;
            }

            .category-tabs .nav-pills .nav-link {
                margin-bottom: 10px;
            }

            .menu-item-header {
                flex-direction: column;
                text-align: center;
            }

            .menu-item-price {
                margin-top: 10px;
            }
        }
    </style>
@endpush
