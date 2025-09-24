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
            <h1><i class="bi bi-plus-circle"></i> Oda Ekleme Paneli</h1>
        </div>
    </div>

    <!-- Navigation -->
    <div class="section-area">
        <a href="/adminhotel" class="room-add-link">İstatistikler</a>
        <a href="/adminhotelrooms" class="room-add-link">Odalar</a>
        <a href="/adminhotelroomadd" class="room-add-link selected">Oda Ekleme</a>
        <a href="/adminhotel/adminusers" class="room-add-link">Kullanıcılar</a>
        <a href="" class="room-add-link">Rezerve Odalar</a>
    </div>

    <div class="container">
        <!-- Modern Form -->
        <div class="modern-form">
            <h2 class="form-title">
                <i class="fas fa-bed"></i>
                Yeni Oda Ekle
            </h2>
            
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <!-- Oda İsmi -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-tag"></i>
                                Oda İsmi
                            </label>
                            <input type="text" name="room-name" class="modern-input" placeholder="Örn: Deluxe Suite" required>
                        </div>
                    </div>

                    <!-- Fiyat -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-lira-sign"></i>
                                Günlük Fiyat (₺)
                            </label>
                            <input type="number" name="price" class="modern-input" placeholder="500" min="0" required>
                        </div>
                    </div>

                    <!-- Kapasite -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-users"></i>
                                Kişi Kapasitesi
                            </label>
                            <select name="capacity" class="modern-input form-control" required>
                                <option value="">Kapasite Seçin</option>
                                <option value="1">1 Kişi</option>
                                <option value="2">2 Kişi</option>
                                <option value="3">3 Kişi</option>
                                <option value="4">4 Kişi</option>
                                <option value="5">5+ Kişi</option>
                            </select>
                        </div>
                    </div>

                    <!-- Oda Tipi -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-home"></i>
                                Oda Tipi
                            </label>
                            <select name="room-type" class="modern-input form-control" required>
                                <option value="">Oda Tipi Seçin</option>
                                <option value="Standart Room">Standart</option>
                                <option value="Deluxe Room">Deluxe</option>
                                <option value="Suite Room">Suite</option>
                                <option value="Presidential Room">Presidential</option>
                            </select>
                        </div>
                    </div>

                    <!-- Oda Açıklaması -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-align-left"></i>
                                Oda Açıklaması
                            </label>
                            <textarea name="explanation" class="modern-textarea" placeholder="Odanın özelliklerini, imkanlarını ve detaylarını yazın..." required></textarea>
                        </div>
                    </div>

                    <!-- Oda Fotoğrafı -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-camera"></i>
                                Oda Fotoğrafı
                            </label>
                            <div class="image-upload-area" onclick="document.getElementById('room-image').click()">
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="upload-text">
                                    <strong>Fotoğraf yüklemek için tıklayın</strong><br>
                                    veya dosyayı buraya sürükleyin
                                </div>
                                <input type="file" id="room-image" name="room-image" accept="image/*" style="display: none;" onchange="showFileName(this)">
                            </div>
                            <small class="text-muted mt-2 d-block">Desteklenen formatlar: JPG, PNG, JPEG (Max: 5MB)</small>
                        </div>
                    </div>
                </div>

                <!-- Oda Özellikleri -->
                <div class="row mt-4">
                    <div class="col-12">
                        <h4 class="mb-3" style="color: var(--primary-color);">
                            <i class="fas fa-star"></i> Oda Özellikleri
                        </h4>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fa-solid fa-ban-smoking"></i>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="wifi" id="wifi">
                                <label class="form-check-label" for="wifi">
                                    <strong>Sigara İçilmeyen Oda</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-tv"></i>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="tv" id="tv">
                                <label class="form-check-label" for="tv">
                                    <strong>Engelli Erişimli Oda</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-snowflake"></i>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="features[]" value="ac" id="ac">
                                <label class="form-check-label" for="ac">
                                    <strong>Romantik Paket</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Butonlar -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="button" class="btn btn-secondary-modern">
                                <i class="fas fa-times"></i>
                                İptal
                            </button>
                            <button type="submit" class="btn btn-modern">
                                <i class="fas fa-plus"></i>
                                Oda Ekle
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showFileName(input) {
            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                const uploadArea = input.closest('.image-upload-area');
                uploadArea.innerHTML = `
                    <div class="upload-icon" style="color: var(--success-color);">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="upload-text" style="color: var(--success-color);">
                        <strong>${fileName}</strong><br>
                        Fotoğraf başarıyla seçildi
                    </div>
                `;
            }
        }

        // Drag & Drop functionality
        document.addEventListener('DOMContentLoaded', function() {
            const uploadArea = document.querySelector('.image-upload-area');
            const fileInput = document.getElementById('room-image');

            if (uploadArea && fileInput) {
                uploadArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    uploadArea.style.borderColor = 'var(--primary-color)';
                    uploadArea.style.background = 'rgba(47, 83, 54, 0.1)';
                });

                uploadArea.addEventListener('dragleave', (e) => {
                    e.preventDefault();
                    uploadArea.style.borderColor = '#e9ecef';
                    uploadArea.style.background = '#f8f9fa';
                });

                uploadArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    uploadArea.style.borderColor = '#e9ecef';
                    uploadArea.style.background = '#f8f9fa';
                    
                    const files = e.dataTransfer.files;
                    if (files.length > 0 && files[0].type.startsWith('image/')) {
                        fileInput.files = files;
                        showFileName(fileInput);
                    }
                });
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let hasErrors = false;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = 'var(--danger-color)';
                    hasErrors = true;
                } else {
                    field.style.borderColor = '#e9ecef';
                }
            });

            if (hasErrors) {
                e.preventDefault();
                alert('Lütfen tüm zorunlu alanları doldurun!');
            }
        });
    </script>
</body>
</html>