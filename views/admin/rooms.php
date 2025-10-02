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
</style>

<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <h1><i class="bi bi-plus-circle"></i> Odalar</h1>
        </div>
    </div>
    <div class="section-area">
        <a href="/adminhotel" class="room-add-link">İstatistikler</a>
        <a href="/adminhotelrooms" class="room-add-link selected">Odalar</a>
        <a href="/adminhotelroomadd" class="room-add-link ">Oda Ekleme</a>
        <a href="/adminhotel/adminusers" class="room-add-link">Kullanıcılar</a>
        <a href="" class="room-add-link">Rezerve Odalar</a>
    </div>


    <div class="container">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="text-center">İd</th>
                    <th scope="col" class="text-center">Oda İsimleri</th>
                    <th scope="col" class="text-center">Kapasite</th>
                    <th scope="col" class="text-center">Rezervasyon Ücreti</th>
                    <th scope="col" class="text-center">Durum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td class="text-center"><?= htmlspecialchars($room["id"]) ?></td>
                        <td class="text-center"><?= htmlspecialchars($room["room-name"]) ?></td>
                        <td class="text-center"><?= number_format($room["capacity"]) ?></td>
                        <td class="text-center"><?= number_format($room["price"]) ?></td>
                        <?php if ($room["Durum"] == "Dolu"): ?>
                            <td class="text-center">
                                <p class="alert alert-danger info"><?= htmlspecialchars($room["Durum"]) ?></p>
                            </td>
                        <?php endif; ?>
                        <td class="text-center">
                            <p class="alert alert-success info"><?= htmlspecialchars($room["Durum"]) ?></p>
                        </td>
                    </tr>

                    <?php if (isset($rooms) == null): ?>
                        <div class="empty-state">
                            <i class="bi bi-house-x"></i>
                            <h3>Üzgünüz, Oda Bilgilerine Ulaşılamıyor</h3>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>