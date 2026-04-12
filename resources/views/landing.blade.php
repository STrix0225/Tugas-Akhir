<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisfor Fitness - Tempat Nge-Gym Sensasi Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: rgba(18, 18, 18, 0.9) !important;
            backdrop-filter: blur(10px);
        }
        .btn-glow {
            background-color: #0d6efd;
            color: white;
            border: none;
            box-shadow: 0 0 15px rgba(13, 110, 253, 0.6);
            transition: all 0.3s ease;
            font-weight: bold;
            border-radius: 8px;
        }
        .btn-glow:hover {
            box-shadow: 0 0 25px rgba(13, 110, 253, 0.9);
            background-color: #0b5ed7;
            color: white;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)), url('{{ asset('images/gym1.jpg') }}') center/cover no-repeat;
            height: 80vh;
            display: flex;
            align-items: center;
        }

        .card-dark {
            background-color: #1e1e1e;
            border: 1px solid #333;
            color: white;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .card-dark:hover {
            transform: translateY(-5px);
            border-color: #0d6efd;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">🏋️ SISFOR FITNESS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#membership">Membership</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#why-us">Why Us</a></li>
                </ul>
                <a href="#" class="btn btn-glow px-4 py-2">Join Now</a>
            </div>
        </div>
    </nav>

    <section class="hero-section text-center text-md-start">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-3 fw-bold mb-3" style="letter-spacing: 2px;">DEKAT DENGANMU.<br>DI MANA SAJA.</h1>
                    <p class="lead mb-4 text-light">Akses tak terbatas ke alat kebugaran terbaik. 24/7 untuk mendukung gaya hidup sehatmu bersama mahasiswa ITENAS lainnya.</p>
                    <a href="#membership" class="btn btn-glow px-5 py-3 fs-5">Register Now</a>
                </div>
            </div>
        </div>
    </section>

    <section id="why-us" class="py-5" style="background-color: #121212;">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold fs-1">WHY SISFOR?</h2>
                <p class="text-secondary">Kami menawarkan fasilitas lengkap, pelatih profesional, dan paket yang fleksibel.</p>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-4 rounded" style="background-color: #1a1a1a; border-top: 3px solid #0d6efd;">
                        <h4 class="fw-bold mb-3">Unlimited 24/7 Access</h4>
                        <p class="text-secondary">Akses kapan saja tanpa batasan waktu untuk menyesuaikan jadwal sibukmu.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded" style="background-color: #1a1a1a; border-top: 3px solid #0d6efd;">
                        <h4 class="fw-bold mb-3">Premium Equipment</h4>
                        <p class="text-secondary">Alat angkat beban dan cardio berstandar internasional.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded" style="background-color: #1a1a1a; border-top: 3px solid #0d6efd;">
                        <h4 class="fw-bold mb-3">Expert Trainers</h4>
                        <p class="text-secondary">Didampingi pelatih profesional untuk mencapai *body goals* dengan aman.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="membership" class="py-5" style="background-color: #0a0a0a;">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold fs-1">MEMBERSHIP PLANS</h2>
                <p class="text-secondary">Pilih paket yang paling sesuai dengan target kebugaranmu.</p>
            </div>

            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-md-6 col-lg-3">
                    <div class="card card-dark h-100">
                        
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=400&auto=format&fit=crop" class="card-img-top" alt="Gym" style="height: 200px; object-fit: cover;">
                        @endif

                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold text-uppercase">{{ $product->name }}</h5>
                            <h3 class="text-primary fw-bold my-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                            <p class="card-text text-secondary mb-4" style="font-size: 0.95rem;">
                                {{ $product->description }}
                            </p>
                            
                            <p class="card-text mt-auto mb-3">
                                <small class="text-muted">Kuota: {{ $product->stock }}</small>
                            </p>

                            <button class="btn btn-outline-light w-100">Pilih Paket</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="py-4 text-center text-secondary" style="background-color: #121212; border-top: 1px solid #333;">
        <div class="container">
            <p class="mb-0">© 2026 Sisfor Fitness. Project Pra-UTS.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>