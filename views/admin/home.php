<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Satış Dashboard</title>
</head>

<style>
    :root {
        --primary-color: #2F5336;
        --accent-color: #4CAF50;
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --info-color: #17a2b8;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
    }

    .dashboard-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #1a3d26 100%);
        color: white;
        padding: 1rem 0;
    }

    .section-area {
        background: linear-gradient(135deg, var(--primary-color) 0%, #1a3d26 100%);
        padding: 0 5rem;
        display: flex;
        flex-direction: row;
    }

    .stats-card {
        min-height: 200px;
        text-align: center;
        max-height: 250px;
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
        margin: 0 auto 1rem auto;
    }

    .stats-number {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #343a40;
    }

    .small-chart-container {
        position: relative;
        height: 300px;
        width: 100%;
    }

    .small-chart-container canvas {
        max-height: 250px !important;
        height: 250px !important;
    }

    .chart-container canvas {
        max-height: 400px !important;
        height: 400px !important;
    }

    .chart-container {
        min-height: 400px;
        max-height: 450px;
        overflow: hidden;
    }

    .chart-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: #343a40;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .revenue-card {

        background: linear-gradient(135deg, var(--success-color) 0%, #20c997 100%);
    }

    .booking-card {
        background: linear-gradient(135deg, var(--info-color) 0%, #6f42c1 100%);
    }

    .occupancy-card {
        background: linear-gradient(135deg, var(--warning-color) 0%, #fd7e14 100%);
    }

    .rooms-card {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
    }

    .progress-ring {
        width: 120px;
        height: 120px;
        position: relative;
    }

    .progress-ring-circle {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: conic-gradient(var(--accent-color) 0deg, var(--accent-color) calc(var(--progress) * 3.6deg), #e9ecef calc(var(--progress) * 3.6deg), #e9ecef 360deg);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .progress-ring-circle::before {
        content: '';
        width: 80%;
        height: 80%;
        background: white;
        border-radius: 50%;
        position: absolute;
    }

    .progress-text {
        position: absolute;
        font-size: 1.2rem;
        font-weight: 700;
        color: #343a40;
        z-index: 1;
    }

    .room-add-link {
        border-radius: 15px 15px 0px 0px;
        padding: 10px 15px;
        margin: 0px 10px 0px 0px;
        background-color: #f8f9fa;
        color: #343a40;
        text-decoration: none;
    }

    .room-add-link:hover {
        border-radius: 15px 15px 0px 0px;
        padding: 10px 15px;
        margin: 0px 10px 0px 0px;
        background-color: #bdbdbdff;
        text-decoration: none;
        color: #ffffffff;
    }

    .selected {
        border-radius: 15px 15px 0px 0px;
        padding: 10px 15px;
        margin: 0px 10px 0px 0px;
        background-color: #bdbdbdff;
        text-decoration: none;
        color: #ffffffff;
    }

    .render {
        text-decoration: none;
        color: black;
    }

</style>


<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <h1><i class="bi bi-speedometer2"></i> Satış Dashboard</h1>
        </div>
    </div>
    <div class="section-area">
        <a href="/adminhotel" class="room-add-link selected">İstatistikler</a>
        <a href="/adminhotel/adminhotelrooms" class="room-add-link ">Odalar</a>
        <a href="/adminhotel/adminhotelroomadd" class="room-add-link">Oda Ekleme</a>
        <a href="/adminhotel/adminusers" class="room-add-link">Kullanıcılar</a>
    </div>
    </div>

    <div class="container">
        <!-- İstatistik Kartları -->
        <div class="row">
            <?php foreach ($data as $datas): ?>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="stats-card">
                        <div class="stats-icon revenue-card">
                            <i class="bi bi-currency-dollar "></i>
                        </div>
                        <div class="stats-number">₺<?= number_format($datas['sumtotal']) ?></div>
                        <div class="stats-label">Toplam Gelir</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="stats-card reservation-details">
                        <div class="stats-icon booking-card">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div class="stats-number"><?= number_format($datas['reservation']) ?></div>
                        <div class="stats-label-reservation animate__animated animate__pulse">Rezervasyon</div>
                        <div class="stats-label-reservation-details animate__animated animate__bounceIn d-none"><a href="" class="render">Rezervasyon-Detayları</a></div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="stats-card text-center">
                        <div class="progress-ring mx-auto" style="--progress: <?= number_format($datas['percenttotal']) ?>">
                            <div class="progress-ring-circle">
                                <div class="progress-text"><?= number_format($datas['percenttotal']) ?>%</div>
                            </div>
                        </div>
                        <div class="stats-label mt-2">Doluluk Oranı</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="stats-card total-room">
                        <div class="stats-icon rooms-card">
                            <i class="bi bi-house"></i>
                        </div>
                        <div class="stats-number"><?= number_format($datas['totalroom']) ?></div>
                        <div class="stats-label-nothover animate__animated animate__pulse">Toplam Oda</div>
                        <div class="stats-label-hover animate__animated animate__bounceIn d-none"><a href="" class="render">Oda Detayları</a></div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <!-- Grafikler -->
        <div class="row">
            <!-- Aylık Satış -->
            <div class="col-12 col-lg-8">
                <div class="chart-container">
                    <h3 class="chart-title">
                        <i class="bi bi-graph-up"></i> Aylık Satış Performansı
                    </h3>
                    <canvas id="salesChart" width="400" height="200"></canvas>
                </div>
            </div>

            <!-- Oda Türleri -->
            <div class="col-12 col-lg-4">
                <div class="chart-container">
                    <h3 class="chart-title">
                        <i class="bi bi-pie-chart"></i> Oda Türleri
                    </h3>
                    <canvas id="roomTypesChart" width="300" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Gelir Analizi -->
        <div class="row">
            <div class="col-12">
                <div class="chart-container">
                    <h3 class="chart-title">
                        <i class="bi bi-bar-chart"></i> Aylık Gelir Analizi
                    </h3>
                    <canvas id="revenueChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>

        document.querySelector(".reservation-details").addEventListener("mouseenter", function() {
            const reservation = document.querySelector(".stats-label-reservation");
            const reservation_hover = document.querySelector(".stats-label-reservation-details");

            reservation.classList.add("d-none");
            reservation_hover.classList.remove("d-none")
        });

        document.querySelector(".reservation-details").addEventListener("mouseleave", function() {
            const reservation = document.querySelector(".stats-label-reservation");
            const reservation_hover = document.querySelector(".stats-label-reservation-details");

            reservation.classList.remove("d-none");
            reservation_hover.classList.add("d-none")
        });

        document.querySelector(".total-room").addEventListener("mouseenter", function() {
            const label_none = document.querySelector(".stats-label-nothover");
            const label_none_hover = document.querySelector(".stats-label-hover");

            label_none_hover.classList.remove("d-none"); // Hover label'ı göster
            label_none.classList.add("d-none"); // Normal label'ı gizle
        });

        document.querySelector(".total-room").addEventListener("mouseleave", function() {
            const label_none_hover = document.querySelector(".stats-label-hover");
            const label_none = document.querySelector(".stats-label-nothover");

            label_none_hover.classList.add("d-none"); // Hover label'ı gizle
            label_none.classList.remove("d-none"); // Normal label'ı göster
        });

        // Satış verileri
        const salesData = {
            monthly: {
                labels: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ara'],
                data: [12, 19, 15, 25, 22, 30, 35, 32, 28, 24, 18, 16],
                revenue: [180000, 285000, 225000, 375000, 330000, 450000, 525000, 480000, 420000, 360000, 270000, 240000]
            },
            roomTypes: {
                labels: ['Standart', 'Deluxe', 'Suite', 'Presidential'],
                data: [45, 30, 20, 5],
                colors: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
            }
        };

        // Line Chart - Satış
        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: salesData.monthly.labels,
                datasets: [{
                    label: 'Rezervasyon',
                    data: salesData.monthly.data,
                    borderColor: '#2F5336',
                    backgroundColor: '#2F533620',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                aspectRatio: 2, // Genişlik/Yükseklik oranı
                layout: {
                    padding: {
                        top: 10,
                        bottom: 10
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Doughnut Chart - Oda Türleri
        new Chart(document.getElementById('roomTypesChart'), {
            type: 'doughnut',
            data: {
                labels: salesData.roomTypes.labels,
                datasets: [{
                    data: salesData.roomTypes.data,
                    backgroundColor: salesData.roomTypes.colors,
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '60%'
            }
        });

        // Bar Chart - Gelir
        new Chart(document.getElementById('revenueChart'), {
            type: 'bar',
            data: {
                labels: salesData.monthly.labels,
                datasets: [{
                    label: 'Gelir (₺)',
                    data: salesData.monthly.revenue,
                    backgroundColor: '#4CAF5080',
                    borderColor: '#4CAF50',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '₺' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // Dinamik güncelleme - Her 5 saniyede değişim
        // setInterval(() => {
        //     // Rastgele değişim simülasyonu
        //     salesData.monthly.data = salesData.monthly.data.map(val =>
        //         Math.max(5, val + Math.floor(Math.random() * 10) - 5)
        //     );

        //     // Grafikleri güncelle
        //     Chart.getChart('salesChart').data.datasets[0].data = salesData.monthly.data;
        //     Chart.getChart('salesChart').update('active');
        // }, 5000);
    </script>
</body>

</html>