<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Admin</title>
</head>

<style>

</style>

<body>

    <div class="container">
        <div class="admin-panel">
            <div class="admin-panel-header">
                <div class="row">
                    <div class="">

                    </div>
                </div>
            </div>
            <div class="admin-panel-body">
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
        </div>
    </div>

</body>

</html>