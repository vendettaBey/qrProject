@extends('themes.theme2.layout')

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

    <!-- Menu Section -->
    <section class="menu-section">
        <div class="container">
            @if ($categories->count() > 0)
                @foreach ($categories as $index => $category)
                    <div class="menu-category-section">
                        <div class="row">
                            <div class="col-lg-6 {{ $index % 2 == 1 ? 'order-lg-2' : '' }}">
                                <div class="menu-category-content">
                                    <div class="section-subtitle">
                                        <span class="star-icon">★</span>
                                        {{ strtoupper($category->name) }}
                                        <span class="star-icon">★</span>
                                    </div>
                                    <h2 class="section-title">{{ $category->name }}</h2>

                                    @foreach ($category->products as $product)
                                        <div class="menu-item">
                                            <div class="menu-item-header">
                                                <h4 class="menu-item-title">{{ $product->name }}</h4>
                                                <span
                                                    class="menu-item-price">${{ number_format($product->price, 2) }}</span>
                                            </div>
                                            <p class="menu-item-description">{{ $product->description }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-6 {{ $index % 2 == 1 ? 'order-lg-1' : '' }}">
                                <div class="menu-category-info">
                                    <div class="category-description">
                                        <h3>{{ $category->name }}</h3>
                                        <p>{{ $category->description ?? 'Discover our delicious ' . strtolower($category->name) . ' selection.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- All Menu Items (if no categories) -->
                <div class="menu-category-section">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header text-center">
                                <div class="section-subtitle">
                                    <span class="star-icon">★</span>
                                    {{ $restaurant->name }}
                                    <span class="star-icon">★</span>
                                </div>
                                <h2 class="section-title">Our Menu</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-6 mb-4">
                                <div class="menu-item">
                                    <div class="menu-item-header">
                                        <h4 class="menu-item-title">{{ $product->name }}</h4>
                                        <span class="menu-item-price">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                    <p class="menu-item-description">{{ $product->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Theme2 - Pure Menu Style */

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

        /* Menu Section */
        .menu-section {
            padding: 40px 0;
            background: #fff;
        }

        .menu-category-section {
            margin-bottom: 80px;
        }

        .menu-category-section:last-child {
            margin-bottom: 0;
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
            margin-bottom: 40px;
            font-family: 'Playfair Display', serif;
            color: #2c3e50;
        }

        /* Menu Items */
        .menu-item {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #ecf0f1;
        }

        .menu-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .menu-item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
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

        /* Category Info */
        .menu-category-info {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .category-description {
            text-align: center;
        }

        .category-description h3 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
            color: #2c3e50;
        }

        .category-description p {
            font-size: 16px;
            color: #7f8c8d;
            line-height: 1.8;
            margin-bottom: 0;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .section-title {
                font-size: 32px;
            }

            .category-description h3 {
                font-size: 28px;
            }

            .menu-category-info {
                margin-bottom: 40px;
            }
        }

        @media (max-width: 767px) {
            .section-title {
                font-size: 24px;
            }

            .category-description h3 {
                font-size: 24px;
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
