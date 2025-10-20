<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        --dark-color: #343a40;
        --light-color: #f8f9fa;
        --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, #1a3d26 100%);
        --gradient-accent: #66bb6a;
        --shadow-soft: 0 10px 40px rgba(0, 0, 0, 0.1);
        --shadow-medium: 0 15px 50px rgba(0, 0, 0, 0.15);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
    }

    .dashboard-header {
        background: var(--gradient-primary);
        color: white;
        padding: 1.5rem 0;
        box-shadow: var(--shadow-soft);
        position: relative;
        overflow: hidden;
    }

    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .dashboard-header h1 {
        font-weight: 600;
        font-size: 2rem;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .nav-tabs-custom {
        background: var(--gradient-primary);
        padding: 0 2rem;
        border: none;
        position: relative;
    }

    .nav-tabs-custom .nav-link {
        border-radius: 15px 15px 0 0;
        padding: 15px 25px;
        margin-right: 10px;
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.8);
        border: none;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .nav-tabs-custom .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .nav-tabs-custom .nav-link:hover::before {
        left: 100%;
    }

    .nav-tabs-custom .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        transform: translateY(-2px);
    }

    .nav-tabs-custom .nav-link.active {
        background: var(--light-color);
        color: var(--dark-color);
        box-shadow: var(--shadow-soft);
    }

    .section-area {
        background: linear-gradient(135deg, var(--primary-color) 0%, #1a3d26 100%);
        padding: 0 5rem;
        display: flex;
        flex-direction: row;
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

    .room-add-table {
        box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
        background-color: #e7e7e7ff;
    }

    table {
        margin-top: 25px;
        border-radius: 15px;
    }

    .info {
        color: #1a7930ff;
        padding: 0px;
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

    .chart-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: #343a40;
        display: flex;
        align-items: center;
        gap: 10px;
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

</style>

<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <h1><i class="bi bi-plus-circle"></i> Oda Ayrıntıları</h1>
        </div>
    </div>
    <div class="nav-tabs-custom">
        <nav class="nav">
            <a href="/adminhotel" class="nav-link">
                <i class="bi bi-graph-up me-2"></i>İstatistikler
            </a>
            <a href="/adminhotel/adminhotelrooms" class="nav-link active">
                <i class="bi bi-door-open me-2"></i>Odalar
            </a>
            <a href="/adminhotel/adminhotelroomadd" class="nav-link">
                <i class="bi bi-plus-circle me-2"></i>Oda Ekleme
            </a>
            <a href="/adminhotel/adminusers" class="nav-link">
                <i class="bi bi-people me-2"></i>Kullanıcılar
            </a>
        </nav>
    </div>


    <div class="container animate__animated animate__fadeIn">
        <div class="row mt-3">
            <div class="col-12">
                <div class="chart-container animate-on-load">
                    <h3 class="chart-title">
                        <i class="bi bi-bar-chart"></i> Oda Rezerve Ayrıntıları
                    </h3>
                    <div>
                        <canvas id="revenueChart" width="400" height="200"></canvas>
                    </div>
                    <div>
                        <canvas id="revenueChart2" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const salesData = {
            monthly: {
                labels: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ara'],
                data: [12, 19, 15, 25, 22, 30, 35, 32, 28, 24, 18, 16],
                revenue: [180000, 285000, 225000, 375000, 330000, 450000, 525000, 480000, 420000, 360000, 270000, 240000]
            }
        };

        new Chart(document.getElementById('revenueChart'), {
            type: 'bar',
            data: {
                labels: salesData.monthly.labels,
                datasets: [{
                    label: 'Standart',
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
                        beginAtZero: false,
                        ticks: {
                            callback: function(value) {
                                return '₺' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        new Chart(document.getElementById('revenueChart2'), {
            type: 'bar',
            data: {
                labels: salesData.monthly.labels,
                datasets: [{
                    label: 'Deluxe',
                    data: salesData.monthly.revenue,
                    backgroundColor: '#a6b04880',
                    borderColor: '#99af4cff',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            callback: function(value) {
                                return '₺' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    </script>


</body>

</html>