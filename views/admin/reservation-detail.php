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
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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
            <h1><i class="bi bi-calendar-check"></i> Rezervasyon Yönetim Paneli</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <!-- Reservations Table -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">
                    <i class="bi bi-table"></i>
                    Aktif Rezervasyonlar
                </h2>
            </div>

            <div class="table-responsive">
                <table class="table modern-table">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="bi bi-hash"></i> ID</th>
                            <th class="text-center"><i class="bi bi-door-open"></i> Oda Adı</th>
                            <th class="text-center"><i class="bi bi-people"></i> Kapasite</th>
                            <th class="text-center"><i class="bi bi-currency-dollar"></i> Ücret</th>
                            <th class="text-center"><i class="bi bi-calendar-range"></i> Tarih Aralığı</th>
                            <th class="text-center"><i class="bi bi-star"></i> Özellikler</th>
                            <th class="text-center"><i class="bi bi-circle-fill"></i> Durum</th>
                            <th class="text-center"><i class="bi bi-gear"></i> İşlemler</th>
                        </tr>
                    </thead>
                    <tbody id="reservationTableBody">
                        <!-- Sample Data - PHP ile doldurulacak -->
                        <tr onclick="loadCustomerDetails(1)" data-reservation-id="1">
                            <td class="text-center"><strong>#2024001</strong></td>
                            <td class="text-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-house-door text-primary me-2"></i>
                                    <strong>Deluxe Suite</strong>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-info">4 Kişi</span>
                            </td>
                            <td class="text-center">
                                <span class="price-display">₺2,500</span>
                                <small class="text-muted d-block">/ gece</small>
                            </td>
                            <td class="text-center">
                                <div>
                                    <i class="bi bi-calendar-event text-success me-1"></i>
                                    <small>15.01.2024 - 18.01.2024</small>
                                    <br>
                                    <span class="badge bg-light text-dark">3 Gece</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="feature-tag">WiFi</span>
                                <span class="feature-tag">Balkon</span>
                                <span class="feature-tag">Mini Bar</span>
                            </td>
                            <td class="text-center">
                                <span class="status-badge status-active">Aktif</span>
                            </td>
                            <td class="text-center">
                                <div class="action-buttons">
                                    <a href="/invoice/1" class="btn-action btn-invoice">
                                        <i class="bi bi-receipt"></i>
                                        Fatura
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- PHP foreach döngüsü ile doldurulacak -->
                        <?php if(isset($reservations) && is_array($reservations)): ?>
                            <?php foreach($reservations as $reservation): ?>
                                <tr onclick="loadCustomerDetails(<?= $reservation['id'] ?>)" data-reservation-id="<?= $reservation['id'] ?>">
                                    <td><strong>#<?= str_pad($reservation['id'], 7, '0', STR_PAD_LEFT) ?></strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-house-door text-primary me-2"></i>
                                            <strong><?= htmlspecialchars($reservation['room_name']) ?></strong>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info"><?= $reservation['capacity'] ?> Kişi</span>
                                    </td>
                                    <td>
                                        <span class="price-display">₺<?= number_format($reservation['price']) ?></span>
                                        <small class="text-muted d-block">/ gece</small>
                                    </td>
                                    <td>
                                        <div>
                                            <i class="bi bi-calendar-event text-success me-1"></i>
                                            <small><?= date('d.m.Y', strtotime($reservation['check_in'])) ?> - <?= date('d.m.Y', strtotime($reservation['check_out'])) ?></small>
                                            <br>
                                            <span class="badge bg-light text-dark"><?= $reservation['nights'] ?> Gece</span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php 
                                        $features = explode(',', $reservation['features'] ?? 'WiFi,AC');
                                        foreach($features as $feature): 
                                        ?>
                                            <span class="feature-tag"><?= htmlspecialchars(trim($feature)) ?></span>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <span class="status-badge status-<?= strtolower($reservation['status']) ?>">
                                            <?= ucfirst($reservation['status']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="/invoice/<?= $reservation['id'] ?>" class="btn-action btn-invoice">
                                                <i class="bi bi-receipt"></i>
                                                Fatura
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Customer Details Panel -->
        <div id="customerDetails" class="customer-details">
            <div class="details-header">
                <h3><i class="bi bi-person-circle"></i> Müşteri Detayları</h3>
            </div>
            <div class="details-content">
                <div id="customerContent">
                    <!-- Loading spinner -->
                    <div class="loading">
                        <div class="spinner"></div>
                        <p>Müşteri bilgileri yükleniyor...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Customer details loading function
        function loadCustomerDetails(reservationId) {
            console.log('Loading customer details for reservation:', reservationId);
            
            // Remove previous selections
            document.querySelectorAll('.modern-table tbody tr').forEach(row => {
                row.classList.remove('selected');
            });
            
            // Add selection to current row
            document.querySelector(`tr[data-reservation-id="${reservationId}"]`).classList.add('selected');
            
            // Show customer details panel
            const detailsPanel = document.getElementById('customerDetails');
            const contentDiv = document.getElementById('customerContent');
            
            detailsPanel.classList.add('show');
            
            // Show loading
            contentDiv.innerHTML = `
                <div class="loading">
                    <div class="spinner"></div>
                    <p>Müşteri bilgileri yükleniyor...</p>
                </div>
            `;
            
            // AJAX call to get customer details
            fetch(`/admin/reservation-details/${reservationId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayCustomerDetails(data.customers);
                } else {
                    contentDiv.innerHTML = `
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle"></i>
                            ${data.message || 'Müşteri bilgileri bulunamadı.'}
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                contentDiv.innerHTML = `
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle"></i>
                        Bir hata oluştu. Lütfen tekrar deneyin.
                    </div>
                `;
            });
        }

        // Display customer details
        function displayCustomerDetails(customers) {
            const contentDiv = document.getElementById('customerContent');
            
            if (!customers || customers.length === 0) {
                contentDiv.innerHTML = `
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i>
                        Bu rezervasyon için müşteri bilgisi bulunamadı.
                    </div>
                `;
                return;
            }
            
            let html = '';
            
            customers.forEach((customer, index) => {
                html += `
                    <div class="customer-card animate__animated animate__fadeInUp" style="animation-delay: ${index * 0.1}s">
                        <h5><i class="bi bi-person-badge"></i> Müşteri ${index + 1}</h5>
                        <div class="customer-info">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Ad Soyad</small>
                                    <br>
                                    <strong>${customer.name} ${customer.surname}</strong>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Telefon</small>
                                    <br>
                                    <strong>${customer.phone}</strong>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-calendar-date"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Doğum Tarihi</small>
                                    <br>
                                    <strong>${customer.birthday}</strong>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-gender-ambiguous"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Cinsiyet</small>
                                    <br>
                                    <strong>${customer.gender === 'M' ? 'Erkek' : 'Kadın'}</strong>
                                </div>
                            </div>
                            
                            ${customer.email ? `
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div>
                                    <small class="text-muted">E-posta</small>
                                    <br>
                                    <strong>${customer.email}</strong>
                                </div>
                            </div>
                            ` : ''}
                            
                            ${customer.id_number ? `
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-card-text"></i>
                                </div>
                                <div>
                                    <small class="text-muted">TC/ID No</small>
                                    <br>
                                    <strong>${customer.id_number}</strong>
                                </div>
                            </div>
                            ` : ''}
                        </div>
                    </div>
                `;
            });
            
            contentDiv.innerHTML = html;
        }

        // Close customer details when clicking outside
        document.addEventListener('click', function(e) {
            const detailsPanel = document.getElementById('customerDetails');
            const table = document.querySelector('.table-container');
            
            if (!detailsPanel.contains(e.target) && !table.contains(e.target)) {
                detailsPanel.classList.remove('show');
                
                // Remove selections
                document.querySelectorAll('.modern-table tbody tr').forEach(row => {
                    row.classList.remove('selected');
                });
            }
        });

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Rezervasyon detayları sayfası yüklendi');
            
            // Add hover effects
            document.querySelectorAll('.modern-table tbody tr').forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                
                row.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('selected')) {
                        this.style.transform = 'translateY(0)';
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>