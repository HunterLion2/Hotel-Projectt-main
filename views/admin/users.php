<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Oda Ekleme - Modern Dashboard</title>
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
        transition: all 0.3s ease;
    }

    .room-add-link:hover {
        background-color: #bdbdbdff;
        color: #ffffff;
    }

    .selected {
        background-color: #bdbdbdff !important;
        color: #ffffff !important;
    }

    .modern-form {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        margin: 2rem 0;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .modern-input, .modern-textarea, .modern-select {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: #f8f9fa;
        width: 100%;
    }

    .modern-input:focus, .modern-textarea:focus, .modern-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(47, 83, 54, 0.25);
        background: white;
        outline: none;
    }

    .modern-textarea {
        resize: vertical;
        min-height: 120px;
    }

    .image-upload-area {
        border: 2px dashed #e9ecef;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        background: #f8f9fa;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .image-upload-area:hover {
        border-color: var(--primary-color);
        background: rgba(47, 83, 54, 0.05);
    }

    .upload-icon {
        font-size: 3rem;
        color: #c9c9c9;
        margin-bottom: 1rem;
    }

    .upload-text {
        color: #6c757d;
        font-weight: 500;
    }

    .btn-modern {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        border: none;
        border-radius: 12px;
        padding: 12px 30px;
        color: white;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(47, 83, 54, 0.3);
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(47, 83, 54, 0.4);
        color: white;
    }

    .btn-secondary-modern {
        background: white;
        border: 2px solid var(--primary-color);
        border-radius: 12px;
        padding: 12px 30px;
        color: var(--primary-color);
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .btn-secondary-modern:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    .form-title {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1.8rem;
    }

    .row-gap {
        gap: 1rem;
    }

    .feature-card {
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        border-radius: 12px;
        padding: 1.5rem;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-color);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }
</style>

<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container">
            <h1><i class="fa-solid fa-user"></i> Kullanıcılar</h1>
        </div>
    </div>

    <!-- Navigation -->
    <div class="section-area">
        <a href="/adminhotel" class="room-add-link">İstatistikler</a>
        <a href="/adminhotel/adminhotelrooms" class="room-add-link">Odalar</a>
        <a href="/adminhotel/adminhotelroomadd" class="room-add-link">Oda Ekleme</a>
        <a href="/adminhotel/adminusers selected" class="room-add-link">Kullanıcılar</a>
    </div>




</body>
</html>