<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} - Store Detail</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: #f9f9f9;
        }

        .store-card {
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
            max-width: 900px;
            margin: 50px auto 30px;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .store-logo {
            width: 100px;
            height: 100px;
            border-radius: 15px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .store-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .store-info {
            flex-grow: 1;
        }

        .store-name {
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .store-name .verified-icon {
            color: #6a49ff;
            font-size: 1.2rem;
        }

        .store-location {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 20px;
        }

        .store-desc {
            font-size: 1rem;
            line-height: 1.4;
            color: #444;
            margin-bottom: 15px;
        }

        .store-stats {
            font-size: 0.9rem;
            color: #333;
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 20px;
        }

        .store-stats .star {
            color: #ffc107;
            margin-right: 5px;
        }

        .store-actions button {
            border-radius: 25px;
            padding: 10px 22px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-right: 15px;
            border-width: 2px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-follow {
            background-color: #008744;
            color: #fff;
            border-color: #008744;
        }

        .btn-follow:hover {
            background-color: #006933;
            border-color: #006933;
        }

        .btn-chat {
            background-color: #fff;
            color: #008744;
            border-color: #008744;
        }

        .btn-chat:hover {
            background-color: #008744;
            color: #fff;
        }

        .btn-other {
            background-color: #fff;
            color: #444;
            border: 2px solid #ccc;
            font-size: 1.1rem;
            padding: 10px 15px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.25s ease;
        }

        .btn-other:hover {
            background-color: #f1f1f1;
        }

        /* Product List */
        .product-list {
            max-width: 900px;
            margin: 0 auto 50px;
            padding: 0 15px;
        }

        .product-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
            cursor: pointer;
            transition: box-shadow 0.25s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            box-shadow: 0 5px 15px rgb(0 0 0 / 0.15);
        }

        .product-image {
            width: 100%;
            aspect-ratio: 4 / 3;
            object-fit: cover;
        }

        .product-info {
            padding: 10px 12px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-name {
            font-weight: 600;
            font-size: 1rem;
            color: #333;
            margin-bottom: 6px;
            flex-grow: 1;
        }

        .product-price {
            font-weight: 700;
            color: #008744;
            font-size: 1.1rem;
        }

        @media (max-width: 600px) {
            .store-card {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }
            .store-info {
                text-align: center;
            }
            .store-actions button {
                margin: 10px 10px 0 10px;
                width: 140px;
            }
        }
    </style>
</head>

<body>
    
    @include('includes.header')
    <div class="container-fluid py-5 my-5"></div>
    <div class="store-card my-5">
        <div class="store-logo">
            <img src="{{ env('API_IMAGE_URL') }}{{ $dataStore['store']['logo'] ?? 'default-logo.png' }}" alt="Logo Store" />
        </div>
        <div class="store-info">
            <div class="store-name">
                {{ $dataStore['store']['name'] ?? 'Nama Store' }}
                <i class="fas fa-check-circle verified-icon" title="Verified"></i>
            </div>
            <div class="store-location">
                {{ $dataStore['store']['location'] ?? 'Kota Administrasi Jakarta Barat' }}
            </div>
            <div class="store-desc">
                {{ $dataStore['store']['description'] ?? 'Deskripsi singkat tentang store ini.' }}
            </div>
            <div class="store-stats">
                <div><i class="fas fa-star star"></i> {{ $dataStore['store']['rating'] ?? '4.9' }} ({{ $dataStore['store']['review_count'] ?? '1.319' }})</div>
                <div>• {{ $dataStore['store']['sold'] ?? '5060' }} terjual</div>
                <div>• ± {{ $dataStore['store']['processing_time'] ?? '5 jam' }} diproses</div>
            </div>
            <div class="store-actions">
                <button class="btn btn-follow">Follow</button>
                <button class="btn btn-chat">Chat Penjual</button>
                <button class="btn btn-other" title="Share"><i class="fas fa-share-alt"></i></button>
            </div>
        </div>
    </div>

    <!-- Product List -->
    <div class="product-list container">
        <h3 class="mb-4">Produk dari {{ $dataStore['store']['name'] ?? 'Store ini' }}</h3>
        <div class="row g-4">
            @foreach ($dataStore['store']['products'] as $p)                
                @php
                    $firstAttr = $p['attributes'][0] ?? null;
                    $imgUrl = $firstAttr && !empty($firstAttr['image']) 
                        ? env('API_IMAGE_URL') . '/' . $firstAttr['image'] 
                        : '/img/featur-1.jpg';
                    // Variasi (contoh: nama variasi atau deskripsi)
                    $attrText = $p['attributes'] ? implode(', ', array_column($p['attributes'], 'name')) : 'Tidak ada variasi';
                @endphp

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/shop?id={{ $p['id'] }}" class="text-decoration-none text-dark">
                        <div class="product-card position-relative d-flex flex-column">

                            <div class="position-relative">
                                <img src="{{ $imgUrl}}" alt="{{ $p['name'] }}" class="img-fluid" style="width: 100%;height:100%;object-fit: cover;max-height:200px" />

                                <!-- <div class="category-badge position-absolute top-0 start-0 bg-primary text-white px-2 py-1" style="font-size: 0.75rem; border-bottom-right-radius: 5px;">
                                    {{ $p['category']['name'] ?? 'Unknown' }}
                                </div> -->
                            </div>

                            <div class="p-3 d-flex flex-column flex-grow-1">

                                <div class="product-name" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;font-size:12px">
                                    {{ $p['name'] }}
                                </div>

                                <div class="product-price mt-1">
                                    {{ $p['basic_price'] ? 'Rp ' . number_format($p['basic_price'], 0, ',', '.') : '' }}
                                </div>

                                <div class="var-text mt-1" style="font-size: 0.85rem; color: #666;">
                                    Variasi: {{ $attrText }}
                                </div>

                                <div class="mt-auto pt-2">
                                    <a href="/shop?id={{ $p['id'] }}" class="btn view-btn w-100 text-primary">
                                        <i class="fa fa-eye me-1"></i> View Detail
                                    </a>
                                </div>

                            </div>

                        </div>
                    </a>
                </div>
            @endforeach

            @if(count($dataStore['store']['products']) === 0)
                <p class="text-center text-muted">Belum ada produk tersedia.</p>
            @endif
        </div>
    </div>

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
