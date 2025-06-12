<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Pemesanan - SuruhLEO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #FFC107;
            --secondary-color: #343A40;
            --accent-color: #FD7E14;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F8F9FA;
            color: #212529;
        }
        
        .tutorial-header {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
        }
        
        .tutorial-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" opacity="0.1"><path d="M0,0 L100,0 L100,100 Q50,80 0,100 Z" fill="white"/></svg>');
            background-size: 100% 100%;
        }
        
        .step-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            margin-bottom: 25px;
            background-color: white;
        }
        
        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.1);
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.5rem;
            margin: -25px auto 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .step-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .feature-badge {
            background-color: var(--primary-color);
            color: white;
            padding: 8px 15px;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
            margin: 5px;
        }
        
        .cta-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 15px;
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            width: 150px;
            height: 150px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" opacity="0.1"><path d="M0,100 L100,100 L100,0 Q50,20 0,0 Z" fill="%23FFC107"/></svg>');
            background-size: cover;
        }
        
        .btn-primary-custom {
            background-color: var(--primary-color);
            border: none;
            color: var(--secondary-color);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
        }
        
        .btn-primary-custom:hover {
            background-color: var(--accent-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(253, 126, 20, 0.4);
        }
        
        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            font-weight: 600;
        }
        
        .nav-pills .nav-link {
            color: var(--secondary-color);
            font-weight: 500;
        }
        
        .tab-content {
            padding: 20px;
            background-color: white;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.05);
        }
        
        .device-mockup {
            position: relative;
            max-width: 300px;
            margin: 0 auto;
        }
        
        .device-mockup img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .highlight-text {
            position: relative;
            display: inline-block;
        }
        
        .highlight-text::after {
            content: "";
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 10px;
            background-color: rgba(255, 193, 7, 0.3);
            z-index: -1;
            transform: skewX(-15deg);
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="tutorial-header py-5 mb-5">
        <div class="container text-center position-relative">
            <h1 class="display-4 fw-bold mb-3"><span class="highlight-text">Tutorial Pemesanan</span> SuruhLEO</h1>
            <p class="lead mb-4">Pelajari cara mudah memesan layanan dari Leo dalam beberapa langkah sederhana</p>
            <div class="device-mockup">
                <img src="https://via.placeholder.com/300x600/F8F9FA/343A40?text=SuruhLEO+App" alt="Mockup Aplikasi SuruhLEO">
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Steps Navigation -->
                <ul class="nav nav-pills mb-4 justify-content-center" id="tutorialTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="step1-tab" data-bs-toggle="pill" data-bs-target="#step1" type="button" role="tab">Langkah 1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="step2-tab" data-bs-toggle="pill" data-bs-target="#step2" type="button" role="tab">Langkah 2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="step3-tab" data-bs-toggle="pill" data-bs-target="#step3" type="button" role="tab">Langkah 3</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="step4-tab" data-bs-toggle="pill" data-bs-target="#step4" type="button" role="tab">Langkah 4</button>
                    </li>
                </ul>
                
                <!-- Steps Content -->
                <div class="tab-content" id="tutorialTabsContent">
                    <!-- Step 1 -->
                    <div class="tab-pane fade show active" id="step1" role="tabpanel">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h3 class="fw-bold mb-3">Login ke Akun Anda</h3>
                                <p>Gunakan akun yang sudah terdaftar untuk mengakses layanan SuruhLEO:</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Masukkan email dan password</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Atau login dengan Google/Facebook</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pastikan akun Anda sudah terverifikasi</li>
                                </ul>
                                <div class="mt-4">
                                    <span class="feature-badge"><i class="bi bi-shield-lock me-2"></i>Keamanan Terjamin</span>
                                    <span class="feature-badge"><i class="bi bi-lightning me-2"></i>Proses Cepat</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="https://via.placeholder.com/400x700/F8F9FA/343A40?text=Login+Screen" alt="Langkah Login" class="img-fluid rounded-3 shadow">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="tab-pane fade" id="step2" role="tabpanel">
                        <div class="row align-items-center">
                            <div class="col-md-6 order-md-2">
                                <h3 class="fw-bold mb-3">Isi Form Pemesanan</h3>
                                <p>Lengkapi formulir pemesanan dengan detail tugas untuk Leo:</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-card-checklist text-primary me-2"></i> Pilih jenis pekerjaan</li>
                                    <li class="mb-2"><i class="bi bi-calendar-event text-primary me-2"></i> Tentukan deadline</li>
                                    <li class="mb-2"><i class="bi bi-chat-square-text text-primary me-2"></i> Jelaskan tugas secara detail</li>
                                    <li class="mb-2"><i class="bi bi-paperclip text-primary me-2"></i> Lampirkan file pendukung (jika ada)</li>
                                </ul>
                            </div>
                            <div class="col-md-6 order-md-1">
                                <img src="https://via.placeholder.com/400x700/F8F9FA/343A40?text=Order+Form" alt="Form Pemesanan" class="img-fluid rounded-3 shadow">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="tab-pane fade" id="step3" role="tabpanel">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h3 class="fw-bold mb-3">Konfirmasi & Pembayaran</h3>
                                <p>Tinjau pesanan Anda dan selesaikan pembayaran:</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-credit-card text-warning me-2"></i> Pilih metode pembayaran</li>
                                    <li class="mb-2"><i class="bi bi-cash-coin text-warning me-2"></i> Transfer bank, e-wallet, atau kartu kredit</li>
                                    <li class="mb-2"><i class="bi bi-receipt text-warning me-2"></i> Dapatkan invoice resmi</li>
                                    <li class="mb-2"><i class="bi bi-shield-check text-warning me-2"></i> Pembayaran aman dengan sistem escrow</li>
                                </ul>
                                <div class="alert alert-warning mt-3">
                                    <i class="bi bi-info-circle me-2"></i> Pembayaran akan disimpan dan hanya diteruskan ke Leo setelah pekerjaan selesai
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="https://via.placeholder.com/400x700/F8F9FA/343A40?text=Payment+Screen" alt="Konfirmasi Pembayaran" class="img-fluid rounded-3 shadow">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="tab-pane fade" id="step4" role="tabpanel">
                        <div class="row align-items-center">
                            <div class="col-md-6 order-md-2">
                                <h3 class="fw-bold mb-3">Lacak Progres & Selesai</h3>
                                <p>Pantau perkembangan pekerjaan dan terima hasilnya:</p>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-graph-up text-success me-2"></i> Notifikasi real-time progres</li>
                                    <li class="mb-2"><i class="bi bi-chat-dots text-success me-2"></i> Komunikasi langsung dengan Leo</li>
                                    <li class="mb-2"><i class="bi bi-file-earmark-check text-success me-2"></i> Tinjau hasil pekerjaan</li>
                                    <li class="mb-2"><i class="bi bi-star-fill text-success me-2"></i> Berikan rating & ulasan</li>
                                </ul>
                                <div class="alert alert-success mt-3">
                                    <i class="bi bi-check-circle me-2"></i> Jika tidak puas, Anda bisa meminta revisi atau refund
                                </div>
                            </div>
                            <div class="col-md-6 order-md-1">
                                <img src="https://via.placeholder.com/400x700/F8F9FA/343A40?text=Tracking+Screen" alt="Lacak Progres" class="img-fluid rounded-3 shadow">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step Cards -->
                <div class="row mt-5">
                    <div class="col-md-3">
                        <div class="step-card text-center p-4">
                            <div class="step-number">1</div>
                            <i class="bi bi-person-circle step-icon"></i>
                            <h5>Login</h5>
                            <p>Masuk ke akun SuruhLEO Anda</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step-card text-center p-4">
                            <div class="step-number">2</div>
                            <i class="bi bi-pencil-square step-icon"></i>
                            <h5>Isi Form</h5>
                            <p>Lengkapi detail permintaan</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step-card text-center p-4">
                            <div class="step-number">3</div>
                            <i class="bi bi-credit-card step-icon"></i>
                            <h5>Bayar</h5>
                            <p>Selesaikan pembayaran</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step-card text-center p-4">
                            <div class="step-number">4</div>
                            <i class="bi bi-check-circle step-icon"></i>
                            <h5>Selesai</h5>
                            <p>Terima hasil pekerjaan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-header bg-white">
                        <h3 class="text-center fw-bold mb-0"><i class="bi bi-question-circle text-primary me-2"></i> Pertanyaan Umum</h3>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        Berapa lama waktu respon Leo?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Leo biasanya merespon dalam waktu 1-2 jam pada jam kerja (09.00-17.00 WIB). Di luar jam tersebut, respon mungkin membutuhkan waktu lebih lama.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        Apa saja jenis pekerjaan yang bisa dilakukan Leo?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Leo bisa membantu dengan berbagai tugas administratif, penelitian, penulisan konten, input data, dan pekerjaan kantor lainnya. Detail lengkap bisa dilihat di halaman layanan kami.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        Bagaimana jika saya tidak puas dengan hasil pekerjaan?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Anda bisa meminta revisi gratis hingga 2 kali. Jika masih tidak puas, Anda bisa mengajukan refund melalui sistem kami dalam waktu 7 hari setelah pekerjaan diselesaikan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="container mb-5">
        <div class="cta-section py-5 px-4 text-center">
            <h2 class="fw-bold mb-3">Siap Memesan Leo?</h2>
            <p class="lead mb-4">Mulai permintaan pertama Anda sekarang dan rasakan kemudahannya</p>
            <a href="{{ route('input_form.create') }}" class="btn btn-primary-custom btn-lg me-3">
                <i class="bi bi-plus-circle me-2"></i>Buat Pesanan Baru
            </a>
            <a href="#" class="btn btn-outline-secondary btn-lg">
                <i class="bi bi-question-circle me-2"></i>Butuh Bantuan?
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animasi untuk tab perubahan
        document.querySelectorAll('#tutorialTabs .nav-link').forEach(tab => {
            tab.addEventListener('click', function() {
                // Reset semua tab
                document.querySelectorAll('#tutorialTabs .nav-link').forEach(t => {
                    t.classList.remove('active');
                });
                
                // Aktifkan tab yang diklik
                this.classList.add('active');
                
                // Animasi untuk konten tab
                const target = document.querySelector(this.getAttribute('data-bs-target'));
                target.classList.remove('show', 'active');
                setTimeout(() => {
                    target.classList.add('show', 'active');
                }, 50);
            });
        });
        
        // Animasi hover untuk step cards
        document.querySelectorAll('.step-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
                this.style.boxShadow = '0 15px 30px rgba(0,0,0,0.1)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 12px 20px rgba(0,0,0,0.1)';
            });
        });
    </script>
</body>
</html>