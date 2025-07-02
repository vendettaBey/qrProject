@extends('themes.restoran.layout')

@section('content')
    <!-- QR Hero Başlangıç -->
    <section class="qr-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="hero-title">{{ $menu->name }} QR Menü</h1>
                    <p class="hero-subtitle">Menümüzü görüntülemek için QR kodu tarayın</p>
                </div>
            </div>
        </div>
    </section>
    <!-- QR Hero Bitiş -->

    <!-- QR Kod Başlangıç -->
    <section class="qr-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="qr-card">
                        <div class="qr-restaurant-info text-center mb-4">
                            @if ($restaurant->logo)
                                <img src="{{ asset('storage/' . $restaurant->logo) }}" alt="{{ $restaurant->name }}"
                                    class="restaurant-logo mb-3">
                            @endif
                            <h2>{{ $restaurant->name }}</h2>
                            <p>{{ $restaurant->description }}</p>
                        </div>

                        <div class="qr-code-container text-center mb-4">
                            <div class="qr-image">
                                <img src="{{ $qrCodeImage }}" alt="QR Kod" class="img-fluid">
                            </div>
                        </div>

                        <div class="qr-instructions text-center">
                            <h4>Nasıl Kullanılır?</h4>
                            <ol class="text-start">
                                <li>Telefonunuzun kamerasını açın</li>
                                <li>QR kodu kameranızla tarayın</li>
                                <li>Açılan linke tıklayın</li>
                                <li>Menümüzü keşfedin ve siparişinizi verin</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- QR Kod Bitiş -->
@endsection

@push('styles')
    <style>
        .qr-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('themes/restoran/images/qr-hero-bg.jpg') }}') no-repeat center center;
            background-size: cover;
            padding: 80px 0;
            color: #fff;
            text-align: center;
        }

        .qr-card {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .restaurant-logo {
            max-height: 80px;
        }

        .qr-image {
            padding: 20px;
            background: #fff;
            display: inline-block;
            border-radius: 10px;
            border: 1px dashed #ddd;
        }

        .qr-image img {
            max-width: 200px;
        }

        .qr-instructions {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }

        .qr-instructions h4 {
            margin-bottom: 15px;
            color: #e74c3c;
        }

        .qr-instructions ol {
            padding-left: 20px;
        }

        .qr-instructions ol li {
            margin-bottom: 10px;
        }
    </style>
@endpush
