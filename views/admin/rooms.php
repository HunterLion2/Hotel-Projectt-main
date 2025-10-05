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
    <div class="section-area">
        <a href="/adminhotel" class="room-add-link">İstatistikler</a>
        <a href="/adminhotelrooms" class="room-add-link selected">Odalar</a>
        <a href="/adminhotel/adminhotelroomadd" class="room-add-link ">Oda Ekleme</a>
        <a href="/adminhotel/adminusers" class="room-add-link">Kullanıcılar</a>
    </div>


    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="chart-container">
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