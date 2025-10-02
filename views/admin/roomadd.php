<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    .img-added-button {
        background-color: #fff;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border-radius: 15px;
        height: 200px;
        color: #c9c9c9ff;
        font-size: 45px;
    }

</style>

<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <h1><i class="bi bi-plus-circle"></i> Oda Ekleme</h1>
        </div>
    </div>
    <div class="section-area">
        <a href="/adminhotel" class="room-add-link">İstatistikler</a>
        <a href="/adminhotelrooms" class="room-add-link">Odalar</a>
        <a href="/adminhotelroomadd" class="room-add-link selected">Oda Ekleme</a>
        <a href="/adminhotel/adminusers" class="room-add-link">Kullanıcılar</a>
        <a href="" class="room-add-link">Rezerve Odalar</a>
    </div>


    <div class="container">
        <div class="input-area">
            <form action="" method="post">
                <input type="text" name="room-name" id="" class="form-control w-50 m-2" placeholder="Oda İsmi Giriniz">
                <input type="number" name="price" id="" class="form-control w-50 m-2" placeholder="Fiyat Bilgisi Giriniz">
                <input type="text" name="explanation" id="" class="form-control w-50 m-2" placeholder="Oda Açıklaması Giriniz">
                <input type="text" name="room-name" id="" class="form-control w-50 m-2" placeholder="Oda İsmi Giriniz">
            </form>
        </div>
    </div>

</body>

</html>