<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Rezervasyon Detayları</title>
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
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
    }

    .dashboard-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #1a3d26 100%);
        color: white;
        padding: 1.5rem 0;
        /* box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); */
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
        /* box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); */
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .back-button:hover #back-button {
        /* background: linear-gradient(135deg, #555, #777); */
        transform: scale(1.1);
        /* box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3); */
        color: #fff;
    }

    /* Modern Table Styles */
    .table-container {
        background: white;
        border-radius: 20px;
        /* box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); */
        overflow: hidden;
        margin: 2rem auto;
        max-width: 95%;
    }

    .table-header {
        background: #F09000;
        color: white;
        padding: 1.5rem 2rem;
        border: none;
    }

    .table-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .modern-table {
        margin: 0;
        border: none;
    }

    .modern-table thead th {
        background: #f4f4f4ff;
        padding: 1rem;
        font-weight: 600;
        color: var(--dark-color);
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .modern-table tbody tr {
        border: none;
        transition: all 0.3s ease;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
    }

    .modern-table tbody tr:hover {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%);
        transform: translateY(-2px);
    }

    .modern-table tbody tr.selected {
        background: linear-gradient(135deg, #e8f5e8 0%, #d4edda 100%);
        border-left: 4px solid var(--success-color);
    }

    .modern-table tbody td {
        padding: 1.2rem 1rem;
        border: none;
        vertical-align: middle;
    }

    /* Badge Styles */
    .status-badge {
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-active {
        background: linear-gradient(135deg, #28a745, #34ce57);
        color: white;
    }

    .status-pending {
        background: linear-gradient(135deg, #ffc107, #ffcd39);
        color: #333;
    }

    .status-cancelled {
        background: linear-gradient(135deg, #dc3545, #e55667);
        color: white;
    }

    /* Feature Tags */
    .feature-tag {
        display: inline-block;
        background: #20dda8ff;
        color: white;
        padding: 0.2rem 0.6rem;
        border-radius: 12px;
        font-size: 0.7rem;
        margin: 0.1rem;
        font-weight: 500;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        border: none;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }

    .btn-invoice {
        background: linear-gradient(135deg, var(--primary-color), #4a7c59);
        color: white;
    }

    .btn-invoice:hover {
        background: linear-gradient(135deg, #1a3d26, var(--primary-color));
        transform: translateY(-2px);
        /* box-shadow: 0 5px 15px rgba(47, 83, 54, 0.4); */
        color: white;
    }

    /* Customer Details Panel */
    .customer-details {
        background: white;
        border-radius: 15px;
        /* box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); */
        margin-top: 2rem;
        overflow: hidden;
        display: none;
        animation: fadeInUp 0.5s ease;
    }

    .customer-details.show {
        display: block;
    }

    .details-header {
        background: linear-gradient(135deg, var(--accent-color), #66bb6a);
        color: white;
        padding: 1.5rem 2rem;
    }

    .details-content {
        padding: 2rem;
    }

    .customer-card {
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 4px solid var(--accent-color);
    }

    .customer-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-icon {
        width: 35px;
        height: 35px;
        background: linear-gradient(135deg, var(--accent-color), #66bb6a);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }

    /* Price Display */
    .price-display {
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--success-color);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .table-container {
            margin: 1rem;
            max-width: 98%;
        }

        .modern-table {
            font-size: 0.85rem;
        }

        .modern-table thead th,
        .modern-table tbody td {
            padding: 0.8rem 0.5rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .customer-info {
            grid-template-columns: 1fr;
        }
    }

    /* Loading Animation */
    .loading {
        text-align: center;
        padding: 2rem;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid var(--primary-color);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <a href="/adminhotel" class="back-button">
                <i id="back-button" class="fa-solid fa-arrow-left"></i>
            </a>
            <h1><i class="bi bi-calendar-check"></i> Oda Başına Getiri Detayı</h1>
        </div>
    </div>

    <div class="container">
        <div class="graphic">
            <canvas id="revenueChart" width="400" height="200"></canvas>
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
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>