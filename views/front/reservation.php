<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Project - Rezervasyon</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalnia:wght@100..700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/reservation.css">


    <style>
        :root {
            --primary-color: #2F5336;
            --secondary-color: #FFEED2;
            --accent-color: #4CAF50;
            --text-dark: #333;
            --text-light: #666;
            --border-radius: 20px;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--secondary-color) 0%, #fff 100%);
            min-height: 100vh;
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a3d26 100%);
            color: white;
            padding: 60px 0 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/img/hotel-pattern.png') repeat;
            opacity: 0.1;
        }

        .page-header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .page-header p {
            font-size: 1.2rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .container-modern {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .reservation-container {
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }

        .filter-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 30px;
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .filter-card h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .filter-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .filter-section h3 {
            color: var(--text-dark);
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }

        .form-check {
            margin-bottom: 12px;
            padding-left: 0;
        }

        .form-check-input {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .form-check-label {
            color: var(--text-light);
            font-weight: 400;
            cursor: pointer;
        }

        .btn-filter {
            background: linear-gradient(135deg, var(--accent-color) 0%, #45a049 100%);
            border: none;
            border-radius: 12px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-filter:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.3);
        }

        .rooms-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 40px;
            min-height: 600px;
        }

        .rooms-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f8f9fa;
        }

        .rooms-header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .rooms-header h2 {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
        }

        .rooms-count {
            background: var(--accent-color);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .room-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .room-image {
            height: 220px;
            background: linear-gradient(45deg, #f8f9fa, #e9ecef);
            position: relative;
            overflow: hidden;
        }

        .room-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .room-price-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent-color);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .room-content {
            padding: 10px;
        }

        .room-title {
            color: var(--primary-color);
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .room-features {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 8px 0;
        }

        .feature-tag {
            background: #f8f9fa;
            color: var(--text-light);
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .btn-reserve {
            background: var(--primary-color);
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            color: white;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-reserve:hover {
            background: #1a3d26;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-light);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        #room-img {
            width: 100px;
            height: 100px;
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 40px 0 30px;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .filter-card {
                margin-bottom: 30px;
                position: static;
            }

            .rooms-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .room-card {
                margin-bottom: 20px;
            }
        }

        .filter-close-in {
            background-color: #df0700ff;
            height: 30px;
            width: 30px;
            border: none;
            border-radius: 30px;
            position: relative;
            float: right;
            margin-bottom: 10px;
            transition: all 3s ease;
        }

        .filtreleme {
            border: none;
            background-color: transparent;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .filter-open {
            color: #468640ff;
            font-size: 35px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .filtreleme:hover .filter-open {
            color: var(--primary-color);
            transform: scale(1.1);
        }

        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        #back-button {
            padding: 12px;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(135deg, #333, #555);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .back-button:hover #back-button {
            background: linear-gradient(135deg, #555, #777);
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            color: #fff;
        }

        .back-button:hover {
            text-decoration: none;
        }

        /* Responsive için */
        @media (max-width: 768px) {
            .back-button {
                top: 15px;
                left: 15px;
            }

            #back-button {
                width: 40px;
                height: 40px;
                padding: 10px;
                font-size: 14px;
            }
        }

        .reservation-link {
            color: white;
            text-decoration: none;
        }

        /* Rezervasyon Takvimi Stilleri */
        .big-reservation {
            margin: 15px 0;
            padding: 0;
        }

        .reservation-schedule {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            margin: 10px 0;
        }

        .schedule-title {
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .schedule-table-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .schedule-table {
            margin: 0;
            font-size: 0.85rem;
        }

        .schedule-table th {
            background: var(--primary-color);
            color: white;
            font-weight: 500;
            border: none;
            padding: 10px 8px;
            font-size: 0.8rem;
        }

        .schedule-table td {
            padding: 8px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        .schedule-table tbody tr:last-child td {
            border-bottom: none;
        }

        .date-badge {
            background: #e3f2fd;
            color: #1976d2;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            white-space: nowrap;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            text-align: center;
            display: inline-block;
            min-width: 60px;
        }

        .status-badge.occupied {
            background: #ffebee;
            color: #c62828;
        }

        .status-badge.available {
            background: #e8f5e8;
            color: #2e7d32;
        }

        .days-badge {
            background: #fff3e0;
            color: #f57c00;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .schedule-legend {
            margin-top: 10px;
            text-align: center;
        }

        .legend-item {
            margin: 0 10px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        @media (max-width: 768px) {
            .schedule-table {
                font-size: 0.75rem;
            }

            .schedule-table th,
            .schedule-table td {
                padding: 6px 4px;
            }

            .date-badge,
            .status-badge,
            .days-badge {
                font-size: 0.7rem;
                padding: 3px 6px;
            }
        }
    </style>
</head>

<body>
    <!-- Page Header -->

    <div class="page-header">
        <a href="/" class="back-button"><i id="back-button" class="fa-solid fa-arrow-left"></i></a>
        <div class="container-modern">
            <h1><i class="bi bi-calendar-check"></i> Rezervasyon</h1>
            <p>Hayalinizdeki tatil için mükemmel odayı bulun</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-modern">
        <div class="reservation-container">
            <div class="row">
                <!-- Filter Sidebar -->
                <div class="filter-card-wh col-lg-4 col-xl-3 mb-5">
                    <div class="filter-card">
                        <span class="filter-close">
                            <button class="filter-close-in"><i class="fa-solid fa-xmark text-white"></i></button>
                        </span>
                        <h2><i class="bi bi-funnel"></i> Filtreler</h2>

                        <form method="GET" action="/reservation">
                            <!-- Guest Count -->
                            <div class="filter-section">
                                <h3><i class="bi bi-people"></i> Kaç Kişilik</h3>
                                <select class="form-control" name="kişisay" required>
                                    <option value="">Seçiniz</option>
                                    <option value="2" <?= ($_GET['kişisay'] ?? '') == '2' ? 'selected' : '' ?>>2 Kişi</option>
                                    <option value="3" <?= ($_GET['kişisay'] ?? '') == '3' ? 'selected' : '' ?>>3 Kişi</option>
                                    <option value="4" <?= ($_GET['kişisay'] ?? '') == '4' ? 'selected' : '' ?>>4 Kişi</option>
                                    <option value="5+" <?= ($_GET['kişisay'] ?? '') == '5+' ? 'selected' : '' ?>>5+ Kişi</option>
                                </select>
                            </div>

                            <!-- Dates -->
                            <div class="filter-section">
                                <h3><i class="bi bi-calendar-range"></i> Tarihler</h3>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label">Giriş</label>
                                        <input type="date"
                                            name="date-start"
                                            class="form-control"
                                            value="<?= $_GET['date-start'] ?? '' ?>"
                                            min="<?= date('Y-m-d') ?>"
                                            required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Çıkış</label>
                                        <input type="date"
                                            name="date-end"
                                            class="form-control"
                                            value="<?= $_GET['date-end'] ?? '' ?>"
                                            min="<?= date('Y-m-d', strtotime('+1 day')) ?>"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <!-- Price Range -->
                            <div class="filter-section">
                                <h3><i class="bi bi-currency-dollar"></i> Maksimum Fiyat</h3>
                                <div class="input-group">
                                    <input type="number"
                                        name="price-filter"
                                        class="form-control"
                                        placeholder="Maksimum fiyat"
                                        value="<?= $_GET['price-filter'] ?? '' ?>"
                                        min="0">
                                    <span class="input-group-text">₺</span>
                                </div>
                            </div>

                            <!-- Extra Packages -->
                            <div class="filter-section">
                                <h3><i class="bi bi-star"></i> Özel Özellikler</h3>
                                <div class="px-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="none-smoke" id="none-smoke"
                                            <?= isset($_GET['none-smoke']) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="none-smoke">
                                            <i class="bi bi-shield-check"></i> Sigara İçilmeyen Odalar
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="engelli-erişimi" id="engelli-erişimi"
                                            <?= isset($_GET['engelli-erişimi']) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="engelli-erişimi">
                                            <i class="bi bi-universal-access"></i> Engelli Erişimine Uygun
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="romantic-packet" id="romantic-packet"
                                            <?= isset($_GET['romantic-packet']) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="romantic-packet">
                                            <i class="bi bi-heart"></i> Romantik Paket
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <input type="hidden" class="click-filter" name="filter_submitted" value="1">

                            <button type="submit" class="btn-filter">
                                <i class="bi bi-search"></i> Odaları Filtrele
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Rooms Results -->

                <div class="col-lg-8 col-xl-9">
                    <div class="rooms-container mb-3">
                        <div class="rooms-header">
                            <div class="rooms-header-left">
                                <button class="filtreleme d-none" onclick="toggleFilter()">
                                    <i class="bi bi-funnel filter-open"></i>
                                </button>
                                <h2>Müsait Odalar</h2>
                            </div>

                            <span class="rooms-count">
                                <i class="bi bi-house"></i> <?= count($rooms ?? []) ?> Oda Bulundu
                            </span>
                        </div>

                        <!-- Room Cards -->
                        <div class="row">
                            <div class="col-12">
                                <?php foreach ($rooms as $room): ?>
                                    <div class="room-card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <div class="room-image">
                                                    <img class="room-img" src="/img/room/<?= htmlspecialchars($room['img']) ?>">
                                                    <div class="room-price-badge">
                                                        <?= number_format($room['price']) ?>₺ / Gece
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="room-content">
                                                    <h3 class="room-title">
                                                        <?= htmlspecialchars($room['room-name']) ?>
                                                    </h3>
                                                    <p class="text-muted mb-3">
                                                        <?= htmlspecialchars($room['capacity'])   ?> Kişiye Kadar Konaklama İmkanı
                                                    </p>

                                                    <div class="big-reservation d-none">
                                                        <div class="reservation-schedule">
                                                            <h5 class="schedule-title">
                                                                <i class="bi bi-calendar2-week"></i> Rezervasyon Takvimi
                                                            </h5>
                                                            <div class="schedule-table-container">
                                                                <table class="table table-sm schedule-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Giriş Tarihi</th>
                                                                            <th>Çıkış Tarihi</th>
                                                                            <th>Durum</th>
                                                                            <th>Gün Sayısı</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Örnek rezervasyon verileri - Gerçek veriler için PHP'den gelmeli -->
                                                                        <tr>
                                                                            <td><span class="date-badge">22 Eyl 2025</span></td>
                                                                            <td><span class="date-badge">25 Eyl 2025</span></td>
                                                                            <td><span class="status-badge occupied">Dolu</span></td>
                                                                            <td><span class="days-badge">3 Gün</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="date-badge">28 Eyl 2025</span></td>
                                                                            <td><span class="date-badge">02 Eki 2025</span></td>
                                                                            <td><span class="status-badge occupied">Dolu</span></td>
                                                                            <td><span class="days-badge">4 Gün</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="date-badge">05 Eki 2025</span></td>
                                                                            <td><span class="date-badge">08 Eki 2025</span></td>
                                                                            <td><span class="status-badge occupied">Dolu</span></td>
                                                                            <td><span class="days-badge">3 Gün</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="date-badge">12 Eki 2025</span></td>
                                                                            <td><span class="date-badge">15 Eki 2025</span></td>
                                                                            <td><span class="status-badge occupied">Dolu</span></td>
                                                                            <td><span class="days-badge">3 Gün</span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="schedule-legend">
                                                                <small class="text-muted">
                                                                    <span class="legend-item">
                                                                        <span class="status-badge occupied"></span> Rezerve Edilmiş
                                                                    </span>
                                                                    <span class="legend-item">
                                                                        <span class="status-badge available"></span> Müsait
                                                                    </span>
                                                                </small>
                                                            </div>

                                                            <form action="POST">
                                                                <h5 class="schedule-title">
                                                                    <i class="fa-solid fa-calendar-plus"></i> Tarih Aralığı Seçiniz
                                                                </h5>
                                                                <div class="row">
                                                                    <div class="col-5 co-lg-5">
                                                                        <h6 class="mx-1">Giriş Tarihi</h6>
                                                                        <input class="form-control" type="date" name="first-sign" id="">
                                                                    </div>
                                                                    <div class="col-6 col-lg-5">
                                                                        <h6 class="mx-1">Çıkış Tarihi</h6>
                                                                        <input class="form-control" type="date" name="last-sign" id="">
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>

                                                    <div class="room-features">
                                                        <span class="feature-tag"><i class="bi bi-wifi"></i><?= htmlspecialchars($room['wifi']) ?></span>
                                                        <span class="feature-tag"><i class="bi bi-tv"></i> <?= htmlspecialchars($room['Tv']) ?></span>
                                                        <span class="feature-tag"><i class="bi bi-snow"></i> <?= htmlspecialchars($room['climate']) ?></span>
                                                        <span class="feature-tag"><i class="bi bi-cup-hot"></i> <?= htmlspecialchars($room['minibar']) ?></span>
                                                        <?php if (!empty($room['none-smoke']) && $room['none-smoke'] == '1'): ?>
                                                            <span class="feature-tag" style="background: #e8f5e8; color: #2e7d32;">
                                                                <i class="bi bi-shield-check"></i> Sigara İçilmeyen
                                                            </span>
                                                        <?php endif; ?>

                                                        <?php if (!empty($room['engelli-erişimi']) && $room['engelli-erişimi'] == '1'): ?>
                                                            <span class="feature-tag" style="background: #e3f2fd; color: #1976d2;">
                                                                <i class="bi bi-universal-access"></i> Engelli Erişimi
                                                            </span>
                                                        <?php endif; ?>

                                                        <?php if (!empty($room['romantic-packet']) && $room['romantic-packet'] == '1'): ?>
                                                            <span class="feature-tag" style="background: #fce4ec; color: #c2185b;">
                                                                <i class="bi bi-heart"></i> Romantik Paket
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="text-muted">
                                                            <small><i class="bi bi-check-circle"></i> Ücretsiz iptal</small>
                                                        </div>
                                                        <button class="btn btn-reserve reservation-button">
                                                            <a href="#" class="reservation-link"><i class="bi bi-calendar-check"></i> Rezervasyon Yap</a>
                                                        </button>
                                                        <div class="row second-button-group d-none">
                                                            <div class="col-5 col-lg-5">
                                                                <button class="btn btn-secondary" id="come-back-button" type="button">Geri Gel</button>
                                                            </div>
                                                            <div class="col-5 col-lg-5">
                                                                <button class="btn btn-success" type="button">Rezerve Et</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php endforeach; ?>

                                <?php if (count($rooms) == 0): ?>
                                    <div class="empty-state">
                                        <i class="bi bi-house-x"></i>
                                        <h3>Üzgünüz, Oda Bulunamadı</h3>
                                        <p>Arama kriterlerinizi değiştirmeyi deneyin veya farklı tarihler seçin.</p>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Rezervasyon Bölümü Script


        // Geri-Gel Butonu İle Bütün Sayfaların Gelmesi

        document.querySelectorAll('#come-back-button').forEach(function(comeBackButton) {
            comeBackButton.addEventListener('click', function() {
                fetch('/reservation/combackAllRoom', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }).then(response => response.json())
            });
        });


        // Tek Sayfa Gelme Script'i

        document.querySelectorAll('.reservation-button').forEach(function(reservationButton) {

            // Buradaki closest değeri

            reservationButton.addEventListener('click', function() {
                const currentRoomCard = reservationButton.closest('.room-card');
                const roomTitle = currentRoomCard.querySelector('.room-title').textContent.trim();

                hideOtherRooms(currentRoomCard);

                fetchRoomDetails(roomTitle, currentRoomCard);

            });

        });

        function hideOtherRooms(selectedRooms) {
            const allRoomCards = document.querySelectorAll('.room-card');

            allRoomCards.forEach(function(roomCard) {
                if (roomCard !== selectedRooms) {
                    roomCard.style.display = 'none';
                }
            });
        }

        function fetchRoomDetails(roomName, roomCard) {
            const roomContent = roomCard.querySelector('.room-content');

            fetch('/reservation/getRoomDetails', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        room_name: roomTitle
                    })
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Sunucu Hatası: ' + response.status);
                    }
                    return response.json();
                }).then(data => {
                    if (data.success) {
                        console.log('Oda detayları başarıyla yüklendi:', data.room);
                    } else {
                        alert('Oda bilgileri bulunamadı: ' + data.message);
                    }
                })
                .catch(error => {
                    // Loading'i kaldır
                    const loadingSpinner = roomCard.querySelector('.loading-spinner');
                    if (loadingSpinner) {
                        loadingSpinner.remove();
                    }

                    console.error('AJAX Hatası:', error);
                    alert('Bir hata oluştu: ' + error.message);
                });

        }

        document.querySelectorAll('.reservation-button').forEach(function(button) {
            button.addEventListener("click", function(e) {
                e.preventDefault(); // Link tıklamasını engelle

                const filterallcard = document.querySelector('.filter-card');
                const filterallcardwh = document.querySelector('.filter-card-wh');
                const roomContainer = document.querySelector('.col-lg-8.col-xl-9');
                const filter = document.querySelector('.filtreleme');

                // Tıklanan butonun bulunduğu room-card'ı bul
                const currentRoomCard = button.closest('.room-card');
                const currentReservationButton = currentRoomCard.querySelector('.reservation-button');
                const currentSecondButtonGroup = currentRoomCard.querySelector('.second-button-group');
                const currentBigReservation = currentRoomCard.querySelector('.big-reservation');

                filterallcard.classList.add('animate__animated', 'animate__bounceOut');

                setTimeout(() => {
                    filterallcardwh.classList.remove('col-lg-4', 'col-xl-3');
                    filterallcardwh.classList.add('d-none');

                    // Sadece tıklanan odanın butonlarını değiştir
                    currentReservationButton.classList.add('d-none');
                    currentSecondButtonGroup.classList.remove('d-none');

                    if (roomContainer) {
                        roomContainer.classList.remove('col-lg-8', 'col-xl-9');
                        roomContainer.classList.add('col-lg-12', 'col-xl-12', 'animate__animated', 'animate__pulse');
                    }

                    if (currentBigReservation) {
                        currentBigReservation.classList.remove("d-none");
                    }
                }, 500);

            });
        })

        document.querySelectorAll('.btn-secondary').forEach(function(backButton) {
            backButton.addEventListener('click', function() {
                const currentRoomCard = backButton.closest('.room-card');
                const currentReservationButton = currentRoomCard.querySelector('.reservation-button');
                const currentSecondButtonGroup = currentRoomCard.querySelector('.second-button-group');
                const currentBigReservation = currentRoomCard.querySelector('.big-reservation');

                const filterallcard = document.querySelector('.filter-card');
                const filterallcardwh = document.querySelector('.filter-card-wh');
                const roomContainer = document.querySelector('.col-lg-12.col-xl-12');
                const filter = document.querySelector('.filtreleme');

                // Butonları geri değiştir
                currentSecondButtonGroup.classList.add('d-none');
                currentReservationButton.classList.remove('d-none');

                if (currentBigReservation) {
                    currentBigReservation.classList.add("d-none");
                }

                // Filter alanını geri getir
                setTimeout(() => {
                    filterallcardwh.classList.remove('d-none');
                    filterallcardwh.classList.add('col-lg-4', 'col-xl-3');
                    filter.classList.add('d-none');

                    if (roomContainer) {
                        roomContainer.classList.remove('col-lg-12', 'col-xl-12');
                        roomContainer.classList.add('col-lg-8', 'col-xl-9');
                    }

                    filterallcard.classList.remove('animate__animated', 'animate__bounceOut');
                }, 200);
            });
        })

        document.addEventListener('DOMContentLoaded', function() {
            const dateStart = document.querySelector('input[name="date-start"]');
            const dateEnd = document.querySelector('input[name="date-end"]');

            dateStart.addEventListener('change', function() {
                const startDate = new Date(this.value);
                const nextDay = new Date(startDate);
                nextDay.setDate(startDate.getDate() + 1);

                dateEnd.min = nextDay.toISOString().split('T')[0];

                if (dateEnd.value && new Date(dateEnd.value) <= startDate) {
                    dateEnd.value = '';
                }
            });
        });

        document.querySelector(".filter-close-in").addEventListener("click", function() {
            const filterallcard = document.querySelector('.filter-card');
            const filterallcardwh = document.querySelector('.filter-card-wh');
            const roomContainer = document.querySelector('.col-lg-8.col-xl-9');
            const filter = document.querySelector('.filtreleme');

            filter.classList.remove('d-none');
            filterallcard.classList.add('animate__animated', 'animate__bounceOut');

            setTimeout(() => {
                filterallcardwh.classList.remove('col-lg-4', 'col-xl-3');
                filterallcardwh.classList.add('d-none');


                if (roomContainer) {
                    roomContainer.classList.remove('col-lg-8', 'col-xl-9');
                    roomContainer.classList.add('col-lg-12', 'col-xl-12', 'animate__animated', 'animate__swing');
                }
            }, 500);
        });

        document.querySelector('.filtreleme').addEventListener("click", function() {
            const filterallcard = document.querySelector('.filter-card');
            const filterallcardwh = document.querySelector('.filter-card-wh');
            const roomContainer = document.querySelector('.col-lg-8.col-xl-9, .col-lg-12.col-xl-12');
            const filter = document.querySelector('.filtreleme');


            filterallcard.classList.remove('animate__animated', 'animate__bounceOut');

            setTimeout(() => {
                filterallcardwh.classList.remove('d-none');
                filter.classList.add('d-none');
                filterallcardwh.classList.add('col-lg-4', 'col-xl-3');

                roomContainer.classList.remove('col-lg-12', 'col-xl-12');
                roomContainer.classList.add('col-lg-8', 'col-xl-9');
            }, 500);

        });
    </script>
</body>

</html>