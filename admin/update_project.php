<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo '<script>alert("Vui lòng đăng nhập"); window.location.href = "login.php";</script>';
    exit();
}

include_once(__DIR__ . '/../controller/getproject.php');
$p = new Gproject();

$msg = "";

// Lấy dữ liệu dự án theo ID
if (!isset($_GET['id'])) {
    echo '<script>alert("Thiếu ID dự án"); window.location.href = "projectadmin.php";</script>';
    exit();
}

$id = intval($_GET['id']);
$project = $p->get1project($id);
if (!$project || $project == false) {
    echo '<script>alert("Dự án không tồn tại"); window.location.href = "projectadmin.php";</script>';
    exit();
}
$row = $project->fetch_assoc();

// Nếu submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenduan = $_POST["tenduan"];
    $mota = $_POST["mota"];
    $anhcu = $_POST["anhcu"];
    $anhmoi = "";

    // Nếu có ảnh mới
    if (!empty($_FILES["anhduan"]["name"])) {
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $hinhanh_name = $_FILES["anhduan"]["name"];
        $hinhanh_tmp = $_FILES["anhduan"]["tmp_name"];
        $hinhanh_ext = strtolower(pathinfo($hinhanh_name, PATHINFO_EXTENSION));

        if (in_array($hinhanh_ext, $allowed_exts)) {
            $anhmoi = time() . "_" . uniqid() . "." . $hinhanh_ext;
            $upload_folder = "../assets/images/";
            $upload_path = $upload_folder . $anhmoi;

            if (!move_uploaded_file($hinhanh_tmp, $upload_path)) {
                $msg = "<div class='alert alert-danger animated-alert'><i class='bi bi-exclamation-triangle-fill'></i> Không thể lưu ảnh mới. Giữ ảnh cũ.</div>";
                $anhmoi = "";
            }
        } else {
            $msg = "<div class='alert alert-warning animated-alert'><i class='bi bi-exclamation-triangle-fill'></i> Định dạng ảnh không hợp lệ. Giữ ảnh cũ.</div>";
        }
    }

    // Nếu không có ảnh mới, giữ ảnh cũ
    $final_anh = $anhmoi ?: $anhcu;

    // Cập nhật
    $result = $p->getUpdateProject($id, $tenduan, $anhmoi, $mota); // truyền ảnh mới hoặc rỗng
    if ($result) {
        echo '<script>alert("Cập nhật thành công!"); window.location.href = "projectadmin.php";</script>';
    } else {
        $msg = "<div class='alert alert-danger animated-alert'><i class='bi bi-exclamation-triangle-fill'></i> Cập nhật thất bại.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Dự Án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .main-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header-card h1 {
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .header-card .subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            font-weight: 400;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
            transform: translateY(-1px);
        }

        .form-control:hover {
            border-color: #667eea;
            transform: translateY(-1px);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .current-image-section {
            margin-top: 15px;
            padding: 20px;
            background: rgba(102, 126, 234, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .current-image-label {
            font-weight: 600;
            color: #667eea;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .img-preview {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .img-preview:hover {
            border-color: #667eea;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 20px;
            border: 2px dashed #667eea;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(102, 126, 234, 0.05);
            color: #667eea;
            font-weight: 500;
        }

        .file-input-label:hover {
            border-color: #5a6fd8;
            background: rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .file-input-label.has-file {
            border-color: #28a745;
            background: rgba(40, 167, 69, 0.05);
            color: #28a745;
        }

        .btn-container {
            display: flex;
            gap: 15px;
            justify-content: space-between;
            margin-top: 30px;
        }

        .btn-modern {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            min-width: 140px;
            justify-content: center;
        }

        .btn-back {
            background: linear-gradient(45deg, #6c757d, #5a6268);
            color: white;
        }

        .btn-back:hover {
            background: linear-gradient(45deg, #5a6268, #495057);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
            color: white;
        }

        .btn-update {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }

        .btn-update:hover {
            background: linear-gradient(45deg, #764ba2, #667eea);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .animated-alert {
            animation: slideInDown 0.5s ease;
            border-radius: 12px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .progress-bar {
            width: 100%;
            height: 4px;
            background: #e9ecef;
            border-radius: 2px;
            overflow: hidden;
            margin-top: 20px;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            width: 0%;
            transition: width 0.3s ease;
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-circle:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        .image-comparison {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 15px;
        }

        .image-card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .image-card h6 {
            color: #667eea;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .new-image-preview {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px dashed #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0 auto;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 0 15px;
            }
            
            .header-card, .form-card {
                padding: 20px;
            }
            
            .header-card h1 {
                font-size: 2rem;
            }
            
            .btn-container {
                flex-direction: column;
            }

            .image-comparison {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>

    <div class="main-container">
        <div class="header-card">
            <h1>
                <i class="bi bi-pencil-square"></i>
                Cập Nhật Dự Án
            </h1>
            <p class="subtitle">Chỉnh sửa và cập nhật thông tin dự án của bạn</p>
        </div>

        <?= $msg ?>

        <div class="form-card">
            <form method="post" enctype="multipart/form-data" id="updateForm">
                <input type="hidden" name="anhcu" value="<?= htmlspecialchars($row['anhduan']) ?>">

                <div class="form-group">
                    <label for="tenduan" class="form-label">
                        <i class="bi bi-folder-fill"></i>
                        Tên dự án
                    </label>
                    <input type="text" class="form-control" name="tenduan" id="tenduan" 
                           value="<?= htmlspecialchars($row['tenduan']) ?>" 
                           placeholder="Nhập tên dự án của bạn..." required>
                </div>

                <div class="form-group">
                    <label for="anhduan" class="form-label">
                        <i class="bi bi-image-fill"></i>
                        Ảnh dự án mới (tùy chọn)
                    </label>
                    <div class="file-input-wrapper">
                        <input type="file" name="anhduan" id="anhduan" accept="image/*">
                        <label for="anhduan" class="file-input-label" id="fileLabel">
                            <i class="bi bi-cloud-upload-fill"></i>
                            <span>Chọn ảnh mới (JPG, PNG, GIF, WebP)</span>
                        </label>
                    </div>

                    <div class="image-comparison" id="imageComparison">
                        <div class="image-card">
                            <h6><i class="bi bi-image"></i> Ảnh hiện tại</h6>
                            <img src="../assets/images/<?= htmlspecialchars($row['anhduan']) ?>" 
                                 alt="Ảnh hiện tại" class="img-preview" id="currentImage">
                        </div>
                        <div class="image-card">
                            <h6><i class="bi bi-image-alt"></i> Ảnh mới</h6>
                            <div class="new-image-preview" id="newImagePreview">
                                <span>Chưa chọn ảnh</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="mota" class="form-label">
                        <i class="bi bi-text-paragraph"></i>
                        Mô tả dự án
                    </label>
                    <textarea class="form-control" name="mota" id="mota" 
                              placeholder="Mô tả chi tiết về dự án của bạn..." required><?= htmlspecialchars($row['mota']) ?></textarea>
                </div>

                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill"></div>
                </div>

                <div class="btn-container">
                    <a href="projectadmin.php" class="btn-modern btn-back">
                        <i class="bi bi-arrow-left-circle-fill"></i>
                        Quay lại
                    </a>
                    <button type="submit" class="btn-modern btn-update">
                        <i class="bi bi-save-fill"></i>
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // File input handling with preview
        document.getElementById('anhduan').addEventListener('change', function() {
            const fileLabel = document.getElementById('fileLabel');
            const newImagePreview = document.getElementById('newImagePreview');
            
            if (this.files && this.files[0]) {
                const fileName = this.files[0].name;
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    newImagePreview.innerHTML = `<img src="${e.target.result}" alt="Ảnh mới" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">`;
                };
                
                reader.readAsDataURL(this.files[0]);
                
                fileLabel.classList.add('has-file');
                fileLabel.innerHTML = `<i class="bi bi-check-circle-fill"></i><span>${fileName}</span>`;
            } else {
                fileLabel.classList.remove('has-file');
                fileLabel.innerHTML = '<i class="bi bi-cloud-upload-fill"></i><span>Chọn ảnh mới (JPG, PNG, GIF, WebP)</span>';
                newImagePreview.innerHTML = '<span>Chưa chọn ảnh</span>';
            }
        });

        // Image preview modal
        document.getElementById('currentImage').addEventListener('click', function() {
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.8);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                cursor: pointer;
            `;
            
            const img = document.createElement('img');
            img.src = this.src;
            img.style.cssText = `
                max-width: 90%;
                max-height: 90%;
                border-radius: 12px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            `;
            
            modal.appendChild(img);
            document.body.appendChild(modal);
            
            modal.addEventListener('click', function() {
                document.body.removeChild(modal);
            });
        });

        // Form progress tracking
        const form = document.getElementById('updateForm');
        const progressFill = document.getElementById('progressFill');
        const inputs = form.querySelectorAll('input[required], textarea[required]');
        
        function updateProgress() {
            let filledInputs = 0;
            inputs.forEach(input => {
                if (input.value.trim() !== '') {
                    filledInputs++;
                }
            });
            
            const progress = (filledInputs / inputs.length) * 100;
            progressFill.style.width = progress + '%';
        }

        inputs.forEach(input => {
            input.addEventListener('input', updateProgress);
            input.addEventListener('change', updateProgress);
        });

        // Form submission with loading state
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('.btn-update');
            submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise"></i> Đang cập nhật...';
            submitBtn.disabled = true;
        });

        // Initialize progress
        updateProgress();
    </script>
</body>
</html>