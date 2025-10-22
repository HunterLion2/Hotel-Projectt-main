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

    .modern-input,
    .modern-textarea,
    .modern-select {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: #f8f9fa;
        width: 100%;
    }

    .modern-input:focus,
    .modern-textarea:focus,
    .modern-select:focus {
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

    .nav-button {
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.8);
        transition: all 0.3s ease;
    }

    .nav-button:hover {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        transform: translateY(-2px);
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

    .modern-table {
        margin: 0;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
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

    .button-group {
        margin-top: 10px;
        margin-left: 450px;
    }

    .button-group button {
        border: none;
        border-radius: 20px 20px 0px 0px;
        padding: 10px;
    }

    .designed-button {
        border: none;
        border: #cdc600ff 1px solid;
        border-radius: 10px;
        width: 30px;
        color: #ffea00ff;
        background-color: #bfbd22ff;
    }

    .delete-button {
        border: none;
        border: #870202ff 2px solid;
        border-radius: 10px;
        width: 30px;
        color: #ab0000ff;
        background-color: #ff0000ff;
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
    <div class="nav-tabs-custom">
        <nav class="nav">
            <a href="/adminhotel" class="nav-link">
                <i class="bi bi-graph-up me-2"></i>İstatistikler
            </a>
            <a href="/adminhotel/adminhotelrooms" class="nav-link">
                <i class="bi bi-door-open me-2"></i>Odalar
            </a>
            <a href="/adminhotel/adminhotelroomadd" class="nav-link">
                <i class="bi bi-plus-circle me-2"></i>Oda Ekleme
            </a>
            <a href="/adminhotel/adminusers" class="nav-link active">
                <i class="bi bi-people me-2"></i>Kullanıcılar
            </a>
            <div class="button-group">
                <button class="nav-button designed-replaid">Düzenleme</button>
                <button class="nav-button delete">Silme</button>
                <button class="nav-button added">Ekleme</button>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="mt-5 mx-5">
            <div class="table-responsive">
                <table class="table modern-table">
                    <thead>
                        <tr>
                            <th id="designeds" class="text-center d-none"></th>
                            <th id="delete" class="text-center d-none"></th>
                            <th class="text-center">ID</th>
                            <th class="text-center"><i class="bi bi-person-circle"></i>Kullanıcı Adı</th>
                            <th class="text-center"><i class="fa-solid fa-key"></i>Password</th>
                            <th class="text-center"><i class="fa-solid fa-phone"></i>Telephone-Number</th>
                            <th class="text-center">Role</th>
                        </tr>
                    </thead>
                    <tbody id="reservationTableBody">
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <th id="designed" class="text-center d-none"><button class="designed-button"><i class="fa-solid fa-sliders"></i></button></th>
                                <th id="deletes" class="text-center d-none"><button class="delete-button"><i class="fa-solid fa-trash-can"></i></button></th>
                                <th class="text-center"> <?= number_format($user['id']) ?> </th>
                                <th class="text-center"> <?= htmlspecialchars($user['user']) ?> </th>
                                <th class="text-center"> <?= htmlentities($user['password']) ?> </th>
                                <th class="text-center"> <?= htmlentities($user['telephone-number']) ?> </th>
                                <th class="text-center"> <?= htmlspecialchars($user['Role']) ?> </th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let restartclickdesign = false;
            if (!restartclickdesign) {
                document.querySelector(".designed-replaid").addEventListener("click", function() {
                    const headerCheckboxes = document.querySelectorAll("#designeds");
                    headerCheckboxes.forEach(element => {
                        element.classList.remove("d-none");
                    });

                    document.querySelectorAll("#designed").forEach(design => {
                        design.classList.remove("d-none");
                    })
                    restartclickdesign = true;
                });
            } else {
                document.querySelector(".designed-replaid").addEventListener("click", function() {
                    const headerCheckboxes = document.querySelectorAll("#designeds");
                    headerCheckboxes.forEach(element => {
                        element.classList.add("d-none");
                    });

                    document.querySelectorAll("#designed").forEach(design => {
                        design.classList.add("d-none");
                    })
                });
            }
        })






        document.querySelector(".delete").addEventListener("click", function() {
            const headerCheckboxes = document.querySelectorAll("#delete");
            headerCheckboxes.forEach(element => {
                element.classList.remove("d-none");
            });

            document.querySelectorAll("#deletes").forEach(design => {
                design.classList.remove("d-none");
            })
        });
    </script>


</body>

</html>