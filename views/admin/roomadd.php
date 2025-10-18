<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Oda Ekleme - Hotel Management</title>
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
        --gradient-accent: linear-gradient(135deg, var(--accent-color) 0%, #66bb6a 100%);
        --shadow-soft: 0 10px 40px rgba(0, 0, 0, 0.1);
        --shadow-medium: 0 15px 50px rgba(0, 0, 0, 0.15);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        color: var(--dark-color);
    }

    /* Header Styles */
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

    /* Navigation Tabs */
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

    /* Main Form Container */
    .form-container {
        background: white;
        border-radius: 20px;
        box-shadow: var(--shadow-medium);
        margin: 3rem auto;
        max-width: 1200px;
        overflow: hidden;
        position: relative;
    }

    .form-header {
        background: var(--gradient-accent);
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
    }

    .form-header h2 {
        font-size: 1.8rem;
        font-weight: 600;
        margin: 0;
    }

    .form-body {
        padding: 3rem;
    }

    /* Form Grid */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: start;
    }

    /* Left Column - Form Inputs */
    .form-inputs {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    /* Right Column - Image Upload */
    .image-upload-section {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    /* Modern Input Groups */
    .input-group-modern {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .input-group-modern label {
        position: absolute;
        top: -10px;
        left: 20px;
        background: white;
        padding: 0 10px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--primary-color);
        z-index: 2;
    }

    .input-modern {
        width: 100%;
        height: 60px;
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 0 20px;
        font-size: 1rem;
        font-weight: 500;
        background: #fafafa;
        transition: all 0.3s ease;
        outline: none;
    }

    .input-modern:focus {
        border-color: var(--accent-color);
        background: white;
        box-shadow: 0 0 20px rgba(76, 175, 80, 0.2);
        transform: translateY(-2px);
    }

    .input-modern::placeholder {
        color: #adb5bd;
        font-weight: 400;
    }

    /* Select Dropdown */
    .select-modern {
        width: 100%;
        height: 60px;
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 0 20px;
        font-size: 1rem;
        font-weight: 500;
        background: #fafafa;
        transition: all 0.3s ease;
        outline: none;
        cursor: pointer;
    }

    .select-modern:focus {
        border-color: var(--accent-color);
        background: white;
        box-shadow: 0 0 20px rgba(76, 175, 80, 0.2);
    }

    /* Image Upload Area */
    .image-upload-area {
        border: 3px dashed #e9ecef;
        border-radius: 20px;
        height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #fafafa;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .image-upload-area:hover {
        border-color: var(--accent-color);
        background: rgba(76, 175, 80, 0.05);
        transform: translateY(-5px);
        box-shadow: var(--shadow-soft);
    }

    .image-upload-area.dragover {
        border-color: var(--accent-color);
        background: rgba(76, 175, 80, 0.1);
        transform: scale(1.02);
    }

    .upload-icon {
        font-size: 4rem;
        color: #ced4da;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .image-upload-area:hover .upload-icon {
        color: var(--accent-color);
        transform: scale(1.1);
    }

    .upload-text {
        font-size: 1.1rem;
        font-weight: 600;
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .upload-subtext {
        font-size: 0.9rem;
        color: #adb5bd;
    }

    /* File Input Hidden */
    .file-input {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    /* Image Preview */
    .image-preview {
        display: none;
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
    }

    .image-preview img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .image-preview .remove-image {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(220, 53, 69, 0.9);
        color: white;
        border: none;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .image-preview .remove-image:hover {
        background: var(--danger-color);
        transform: scale(1.1);
    }

    /* Features Section */
    .features-section {
        grid-column: 1 / -1;
        margin-top: 2rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 12px;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .feature-item:hover {
        background: rgba(76, 175, 80, 0.1);
        transform: translateY(-2px);
    }

    .feature-checkbox {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #ced4da;
        border-radius: 6px;
        position: relative;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .feature-checkbox:checked {
        background: var(--accent-color);
        border-color: var(--accent-color);
    }

    .feature-checkbox:checked::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-weight: bold;
        font-size: 12px;
    }

    .feature-label {
        font-weight: 500;
        color: var(--dark-color);
        cursor: pointer;
        flex: 1;
    }

    /* Action Buttons */
    .action-buttons {
        grid-column: 1 / -1;
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #e9ecef;
    }

    .btn-modern {
        padding: 15px 40px;
        border-radius: 12px;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        min-width: 160px;
    }

    .btn-primary-modern {
        background: var(--gradient-accent);
        color: white;
        box-shadow: 0 8px 25px rgba(76, 175, 80, 0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(76, 175, 80, 0.4);
    }

    .btn-secondary-modern {
        background: linear-gradient(135deg, #6c757d, #868e96);
        color: white;
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.3);
    }

    .btn-secondary-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(108, 117, 125, 0.4);
    }

    /* Loading Animation */
    .btn-modern.loading {
        pointer-events: none;
        color: transparent;
    }

    .btn-modern.loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        border: 2px solid transparent;
        border-top: 2px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }

    /* Success/Error Messages */
    .message-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        max-width: 400px;
    }

    .message {
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 10px;
        box-shadow: var(--shadow-soft);
        animation: slideInRight 0.5s ease;
        position: relative;
        overflow: hidden;
    }

    .message-success {
        background: linear-gradient(135deg, var(--success-color), #34ce57);
        color: white;
    }

    .message-error {
        background: linear-gradient(135deg, var(--danger-color), #e55667);
        color: white;
    }

    .message .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        background: none;
        border: none;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
        opacity: 0.8;
    }

    .message .close-btn:hover {
        opacity: 1;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .form-body {
            padding: 2rem 1.5rem;
        }

        .nav-tabs-custom {
            padding: 0 1rem;
        }

        .nav-tabs-custom .nav-link {
            padding: 12px 15px;
            font-size: 0.9rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-modern {
            width: 100%;
            max-width: 300px;
        }
    }

    /* Custom Animations */
    .animate-on-load {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.6s ease forwards;
    }

    .animate-on-load:nth-child(1) { animation-delay: 0.1s; }
    .animate-on-load:nth-child(2) { animation-delay: 0.2s; }
    .animate-on-load:nth-child(3) { animation-delay: 0.3s; }
    .animate-on-load:nth-child(4) { animation-delay: 0.4s; }

    @keyframes fadeInUp {
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
            <h1>
                <i class="bi bi-plus-circle me-3"></i>
                Yeni Oda Ekleme
            </h1>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="nav-tabs-custom">
        <nav class="nav">
            <a href="/adminhotel" class="nav-link">
                <i class="bi bi-graph-up me-2"></i>İstatistikler
            </a>
            <a href="/adminhotel/adminhotelrooms" class="nav-link">
                <i class="bi bi-door-open me-2"></i>Odalar
            </a>
            <a href="/adminhotel/adminhotelroomadd" class="nav-link active">
                <i class="bi bi-plus-circle me-2"></i>Oda Ekleme
            </a>
            <a href="/adminhotel/adminusers" class="nav-link">
                <i class="bi bi-people me-2"></i>Kullanıcılar
            </a>
        </nav>
    </div>

    <!-- Main Form -->
    <div class="container">
        <form class="form-container animate__animated animate__fadeIn" id="roomAddForm" action="/adminhotel/adminhotelroomadd" method="POST" enctype="multipart/form-data">
            <div class="form-header">
                <h2>
                    <i class="bi bi-house-add me-3"></i>
                    Oda Bilgileri ve Özellikler
                </h2>
            </div>

            <div class="form-body">
                <div class="form-grid">
                    <!-- Left Column - Form Inputs -->
                    <div class="form-inputs">
                        <!-- Room Name -->
                        <div class="input-group-modern animate-on-load">
                            <label for="roomName">
                                <i class="bi bi-house-door me-1"></i>Oda Adı
                            </label>
                            <input type="text" 
                                   id="roomName" 
                                   name="room_name" 
                                   class="input-modern" 
                                   placeholder="Örn: Deluxe Suite, Standard Room"
                                   required>
                        </div>

                        <!-- Price -->
                        <div class="input-group-modern animate-on-load">
                            <label for="roomPrice">
                                <i class="bi bi-currency-dollar me-1"></i>Günlük Fiyat (₺)
                            </label>
                            <input type="number" 
                                   id="roomPrice" 
                                   name="price" 
                                   class="input-modern" 
                                   placeholder="Örn: 2500"
                                   min="0"
                                   step="0.01"
                                   required>
                        </div>

                        <!-- Capacity -->
                        <div class="input-group-modern animate-on-load">
                            <label for="roomCapacity">
                                <i class="bi bi-people me-1"></i>Kapasite (Kişi)
                            </label>
                            <select id="roomCapacity" name="capacity" class="select-modern form-control" required>
                                <option value="">Kapasite Seçiniz</option>
                                <option value="1">1 Kişi</option>
                                <option value="2">2 Kişi</option>
                                <option value="3">3 Kişi</option>
                                <option value="4">4 Kişi</option>
                                <option value="5">5 Kişi</option>
                                <option value="6">6 Kişi</option>
                                <option value="8">8 Kişi (Aile Odası)</option>
                            </select>
                        </div>

                        <!-- Room Type -->
                        <div class="input-group-modern animate-on-load">
                            <label for="roomType">
                                <i class="bi bi-bookmark me-1"></i>Oda Tipi
                            </label>
                            <select id="roomType" name="room_type" class="select-modern form-control" required>
                                <option value="">Oda Tipi Seçiniz</option>
                                <option value="standard">Standard</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="suite">Suite</option>
                                <option value="family">Aile Odası</option>
                                <option value="presidential">Presidential Suite</option>
                            </select>
                        </div>
                    </div>

                    <!-- Right Column - Image Upload -->
                    <div class="image-upload-section">
                        <div class="animate-on-load">
                            <h4 class="mb-3">
                                <i class="bi bi-image me-2"></i>Oda Fotoğrafı
                            </h4>
                            
                            <!-- Image Upload Area -->
                            <div class="image-upload-area" id="imageUploadArea">
                                <input type="file" 
                                       name="room_image" 
                                       id="roomImage" 
                                       class="file-input" 
                                       accept="image/*">
                                <div class="upload-content">
                                    <i class="bi bi-cloud-upload upload-icon"></i>
                                    <div class="upload-text">Fotoğraf Yükleyin</div>
                                    <div class="upload-subtext">PNG, JPG, JPEG (Max: 5MB)</div>
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div class="image-preview" id="imagePreview">
                                <img id="previewImg" src="" alt="Room Preview">
                                <button type="button" class="remove-image" id="removeImage">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Features Section -->
                    <div class="features-section animate-on-load">
                        <h4 class="mb-3">
                            <i class="bi bi-star me-2"></i>Oda Özellikleri
                        </h4>
                        <div class="features-grid">
                            <div class="feature-item">
                                <input type="checkbox" id="wifi" name="features[]" value="wifi" class="feature-checkbox">
                                <label for="wifi" class="feature-label">
                                    <i class="bi bi-wifi me-2"></i>Ücretsiz WiFi
                                </label>
                            </div>
                            <div class="feature-item">
                                <input type="checkbox" id="ac" name="features[]" value="ac" class="feature-checkbox">
                                <label for="ac" class="feature-label">
                                    <i class="bi bi-snow me-2"></i>Klima
                                </label>
                            </div>
                            <div class="feature-item">
                                <input type="checkbox" id="tv" name="features[]" value="tv" class="feature-checkbox">
                                <label for="tv" class="feature-label">
                                    <i class="bi bi-tv me-2"></i>LED TV
                                </label>
                            </div>
                            <div class="feature-item">
                                <input type="checkbox" id="minibar" name="features[]" value="minibar" class="feature-checkbox">
                                <label for="minibar" class="feature-label">
                                    <i class="bi bi-cup-straw me-2"></i>Mini Bar
                                </label>
                            </div>
                            <div class="feature-item">
                                <input type="checkbox" id="balcony" name="features[]" value="balcony" class="feature-checkbox">
                                <label for="balcony" class="feature-label">
                                    <i class="bi bi-building me-2"></i>Balkon
                                </label>
                            </div>
                            <div class="feature-item">
                                <input type="checkbox" id="seaview" name="features[]" value="seaview" class="feature-checkbox">
                                <label for="seaview" class="feature-label">
                                    <i class="bi bi-water me-2"></i>Deniz Manzarası
                                </label>
                            </div>
                            <div class="feature-item">
                                <input type="checkbox" id="jacuzzi" name="features[]" value="jacuzzi" class="feature-checkbox">
                                <label for="jacuzzi" class="feature-label">
                                    <i class="bi bi-droplet me-2"></i>Jakuzi
                                </label>
                            </div>
                            <div class="feature-item">
                                <input type="checkbox" id="safe" name="features[]" value="safe" class="feature-checkbox">
                                <label for="safe" class="feature-label">
                                    <i class="bi bi-shield-check me-2"></i>Kasa
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons animate-on-load">
                        <button type="button" class="btn-modern btn-secondary-modern" onclick="resetForm()">
                            <i class="bi bi-arrow-clockwise me-2"></i>Temizle
                        </button>
                        <button type="submit" class="btn-modern btn-primary-modern" id="submitBtn">
                            <i class="bi bi-check-circle me-2"></i>Oda Ekle
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Message Container -->
    <div class="message-container" id="messageContainer"></div>

    <script>
        // Image Upload Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('roomImage');
            const uploadArea = document.getElementById('imageUploadArea');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            const removeBtn = document.getElementById('removeImage');
            const form = document.getElementById('roomAddForm');

            // File input change event
            fileInput.addEventListener('change', handleFileSelect);

            // Drag and drop events
            uploadArea.addEventListener('dragover', handleDragOver);
            uploadArea.addEventListener('drop', handleDrop);
            uploadArea.addEventListener('dragleave', handleDragLeave);

            // Remove image event
            removeBtn.addEventListener('click', removeImage);

            // Form submit event
            form.addEventListener('submit', handleFormSubmit);

            function handleFileSelect(e) {
                const file = e.target.files[0];
                if (file) {
                    displayImage(file);
                }
            }

            function handleDragOver(e) {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            }

            function handleDrop(e) {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    const file = files[0];
                    if (file.type.startsWith('image/')) {
                        fileInput.files = files;
                        displayImage(file);
                    } else {
                        showMessage('Lütfen sadece resim dosyası seçin!', 'error');
                    }
                }
            }

            function handleDragLeave(e) {
                uploadArea.classList.remove('dragover');
            }

            function displayImage(file) {
                // Check file size (5MB limit)
                if (file.size > 5 * 1024 * 1024) {
                    showMessage('Dosya boyutu 5MB\'dan küçük olmalıdır!', 'error');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    uploadArea.style.display = 'none';
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }

            function removeImage() {
                fileInput.value = '';
                previewImg.src = '';
                uploadArea.style.display = 'flex';
                imagePreview.style.display = 'none';
            }

            function handleFormSubmit(e) {
                e.preventDefault();
                
                const submitBtn = document.getElementById('submitBtn');
                const formData = new FormData(form);

                // Show loading state
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;

                // Simulate form submission (replace with actual AJAX call)
                setTimeout(() => {
                    // Reset loading state
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;

                    // Show success message
                    showMessage('Oda başarıyla eklendi!', 'success');

                    // Reset form after success
                    setTimeout(() => {
                        resetForm();
                    }, 2000);

                }, 2000);

                // For actual implementation, use this AJAX call:
                /*
                fetch('/adminhotel/adminhotelroomadd', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;

                    if (data.success) {
                        showMessage('Oda başarıyla eklendi!', 'success');
                        setTimeout(() => resetForm(), 2000);
                    } else {
                        showMessage(data.message || 'Bir hata oluştu!', 'error');
                    }
                })
                .catch(error => {
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                    showMessage('Bir hata oluştu!', 'error');
                });
                */
            }
        });

        // Reset form function
        function resetForm() {
            document.getElementById('roomAddForm').reset();
            document.getElementById('imageUploadArea').style.display = 'flex';
            document.getElementById('imagePreview').style.display = 'none';
            
            // Uncheck all checkboxes
            document.querySelectorAll('.feature-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
        }

        // Show message function
        function showMessage(text, type) {
            const container = document.getElementById('messageContainer');
            const message = document.createElement('div');
            message.className = `message message-${type}`;
            message.innerHTML = `
                ${text}
                <button class="close-btn" onclick="this.parentElement.remove()">×</button>
            `;
            
            container.appendChild(message);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (message.parentElement) {
                    message.remove();
                }
            }, 5000);
        }

        // Feature item click handling
        document.querySelectorAll('.feature-item').forEach(item => {
            item.addEventListener('click', function(e) {
                if (e.target.type !== 'checkbox') {
                    const checkbox = this.querySelector('.feature-checkbox');
                    checkbox.checked = !checkbox.checked;
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>