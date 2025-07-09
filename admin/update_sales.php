<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo '<script>alert("Vui lòng đăng nhập"); window.location.href = "login.php";</script>';
    exit();
}

include_once(__DIR__ . '/../controller/getsales.php');
$p = new Gsales();

// Lấy ID
if (!isset($_GET['id'])) {
    echo '<script>alert("Thiếu ID khuyến mãi"); window.location.href="salesadmin.php";</script>';
    exit();
}
$id_khuyenmai = (int)$_GET['id'];

// Lấy dữ liệu khuyến mãi theo ID
$data = $p->get1KM($id_khuyenmai);
if (!$data || $data->num_rows == 0) {
    echo '<script>alert("Không tìm thấy khuyến mãi"); window.location.href="salesadmin.php";</script>';
    exit();
}
$row = $data->fetch_assoc();

// Xử lý cập nhật
if (isset($_POST['btnUpdateSales'])) {
    $ten_khuyenmai = trim($_POST['ten_khuyenmai']);
    $gia = floatval($_POST['gia']);
    $noidung = trim($_POST['noidung']);
    $loaidoanhnghiep = $_POST['loaidoanhnghiep'];
    $loaigoi = $_POST['loaigoi'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];

    if (empty($ten_khuyenmai) || $gia <= 0 || empty($loaidoanhnghiep) || empty($loaigoi) || empty($ngaybatdau) || empty($ngayketthuc)) {
        $message = "Vui lòng nhập đầy đủ thông tin!";
        $type = "error";
    } else {
        $result = $p->getupdatekhuyenmai($id_khuyenmai, $ten_khuyenmai, $gia, $noidung, $loaidoanhnghiep, $loaigoi, $ngaybatdau, $ngayketthuc);
        if ($result) {
            $message = "Cập nhật khuyến mãi thành công!";
            $type = "success";
            $data = $p->get1KM($id_khuyenmai);
            $row = $data->fetch_assoc();
        } else {
            $message = "Cập nhật thất bại!";
            $type = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật khuyến mãi - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .input-focus:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .alert-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-left: 5px solid #059669;
        }
        .alert-error {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border-left: 5px solid #dc2626;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="gradient-bg text-white py-6 mb-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <i class="fas fa-edit text-3xl"></i>
                    <div>
                        <h1 class="text-3xl font-bold">Cập nhật khuyến mãi</h1>
                        <p class="text-blue-100">Quản lý thông tin khuyến mãi ID: <?= $id_khuyenmai ?></p>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-center space-x-2 bg-white bg-opacity-20 px-4 py-2 rounded-lg">
                        <i class="fas fa-user-circle text-xl"></i>
                        <span class="font-medium"><?= $_SESSION["dn"] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-4 pb-12">
        <!-- Breadcrumb -->
        <nav class="mb-8 animate-fade-in">
            <ol class="flex items-center space-x-2 text-sm text-gray-600">
                <li>
                    <a href="dashboard.php" class="hover:text-blue-600 transition-colors">
                        <i class="fas fa-home mr-1"></i>Dashboard
                    </a>
                </li>
                <li><i class="fas fa-angle-right"></i></li>
                <li>
                    <a href="salesadmin.php" class="hover:text-blue-600 transition-colors">
                        <i class="fas fa-tags mr-1"></i>Quản lý khuyến mãi
                    </a>
                </li>
                <li><i class="fas fa-angle-right"></i></li>
                <li class="text-blue-600 font-medium">Cập nhật khuyến mãi</li>
            </ol>
        </nav>

        <!-- Alert Messages -->
        <?php if (isset($message)): ?>
            <div class="mb-8 animate-fade-in">
                <div class="<?= $type === 'success' ? 'alert-success' : 'alert-error' ?> text-white px-6 py-4 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <i class="fas <?= $type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> text-2xl mr-3"></i>
                        <div>
                            <h4 class="font-bold text-lg"><?= $type === 'success' ? 'Thành công!' : 'Có lỗi xảy ra!' ?></h4>
                            <p><?= $message ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Main Form -->
        <div class="bg-white rounded-2xl card-shadow animate-fade-in">
            <div class="p-8">
                <form method="POST" class="space-y-8">
                    <!-- Basic Information -->
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-3"></i>
                            Thông tin cơ bản
                        </h3>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="lg:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-tag mr-2"></i>Tên khuyến mãi 
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="ten_khuyenmai" 
                                       value="<?= htmlspecialchars($row['ten_khuyenmai']) ?>" 
                                       required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300"
                                       placeholder="Nhập tên khuyến mãi...">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-dollar-sign mr-2"></i>Giá giảm (VND) 
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="gia" step="1000" min="0" 
                                       value="<?= $row['gia'] ?>" 
                                       required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300"
                                       placeholder="0">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-calendar-alt mr-2"></i>Thời gian hiệu lực
                                </label>
                                <div class="text-sm text-gray-600 bg-gray-50 px-3 py-2 rounded-lg">
                                    <i class="fas fa-clock mr-1"></i>
                                    <?= date('d/m/Y', strtotime($row['ngaybatdau'])) ?> - 
                                    <?= date('d/m/Y', strtotime($row['ngayketthuc'])) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-file-alt text-blue-600 mr-3"></i>
                            Nội dung khuyến mãi
                        </h3>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-align-left mr-2"></i>Mô tả chi tiết
                            </label>
                            <textarea name="noidung" rows="5" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300"
                                      placeholder="Nhập nội dung mô tả khuyến mãi..."><?= htmlspecialchars($row['noidung']) ?></textarea>
                        </div>
                    </div>

                    <!-- Target & Package -->
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-target text-blue-600 mr-3"></i>
                            Đối tượng áp dụng
                        </h3>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-building mr-2"></i>Đối tượng áp dụng 
                                    <span class="text-red-500">*</span>
                                </label>
                                <select name="loaidoanhnghiep" required 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300">
                                    <option value="">-- Chọn đối tượng --</option>
                                    <option value="Doanh Nghiệp Lớn" <?= $row['loaidoanhnghiep'] == 'Doanh Nghiệp Lớn' ? 'selected' : '' ?>>
                                        <i class="fas fa-industry"></i> Doanh Nghiệp Lớn
                                    </option>
                                    <option value="Doanh Nghiệp Nhỏ" <?= $row['loaidoanhnghiep'] == 'Doanh Nghiệp Nhỏ' ? 'selected' : '' ?>>
                                        <i class="fas fa-store"></i> Doanh Nghiệp Nhỏ
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-box mr-2"></i>Loại gói áp dụng 
                                    <span class="text-red-500">*</span>
                                </label>
                                <select name="loaigoi" required 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300">
                                    <option value="">-- Chọn loại gói --</option>
                                    <option value="Combo Hot Tháng Này" <?= $row['loaigoi'] == 'Combo hot tháng này' ? 'selected' : '' ?>>
                                        🔥 Combo Hot Tháng Này
                                    </option>
                                    <option value="Ưu Đãi Dài Hạn" <?= $row['loaigoi'] == 'Ưu đãi dài hạn' ? 'selected' : '' ?>>
                                        ⏰ Ưu Đãi Dài Hạn
                                    </option>
                                    <option value="Ưu Đãi Ngắn Hạn" <?= $row['loaigoi'] == 'Ưu đãi ngắn hạn' ? 'selected' : '' ?>>
                                        ⚡ Ưu Đãi Ngắn Hạn
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Date Range -->
                    <div class="pb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-calendar-check text-blue-600 mr-3"></i>
                            Thời gian áp dụng
                        </h3>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-play mr-2"></i>Ngày bắt đầu 
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="ngaybatdau" 
                                       value="<?= $row['ngaybatdau'] ?>" 
                                       required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-stop mr-2"></i>Ngày kết thúc 
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="ngayketthuc" 
                                       value="<?= $row['ngayketthuc'] ?>" 
                                       required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-between pt-6 border-t border-gray-200">
                        <div class="flex space-x-4 mb-4 sm:mb-0">
                            <button type="submit" name="btnUpdateSales" 
                                    class="btn-gradient text-white px-8 py-3 rounded-lg font-semibold flex items-center">
                                <i class="fas fa-save mr-2"></i>
                                Cập nhật khuyến mãi
                            </button>
                            <button type="button" onclick="resetForm()" 
                                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold flex items-center transition-colors">
                                <i class="fas fa-undo mr-2"></i>
                                Đặt lại
                            </button>
                        </div>
                        <div class="flex space-x-3">
                            <a href="salesadmin.php" 
                               class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold flex items-center transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Quay lại danh sách
                            </a>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
    // Kiểm tra định dạng yyyy-mm-dd
    function isValidDateFormat(str) {
        return /^\d{4}-\d{2}-\d{2}$/.test(str);
    }

    // Kiểm tra ngày có thật sự hợp lệ không
    function isValidRealDate(str) {
        if (!isValidDateFormat(str)) return false;
        const date = new Date(str);
        const [year, month, day] = str.split('-').map(Number);
        return (
            date.getFullYear() === year &&
            date.getMonth() + 1 === month &&
            date.getDate() === day
        );
    }

    // Hiển thị lỗi dưới input
    function showError(inputEl, message) {
        clearError(inputEl);
        inputEl.classList.add('border-red-500');

        const errorSpan = document.createElement('span');
        errorSpan.className = 'text-red-600 text-sm mt-1 block error-msg';
        errorSpan.innerText = message;

        inputEl.parentElement.appendChild(errorSpan);
        inputEl.focus();
    }

    // Xóa lỗi
    function clearError(inputEl) {
        inputEl.classList.remove('border-red-500');
        const old = inputEl.parentElement.querySelector('.error-msg');
        if (old) old.remove();
    }

    // Kiểm tra ngày bắt đầu và kết thúc
    function validateDateRange() {
        const startInput = document.querySelector('input[name="ngaybatdau"]');
        const endInput = document.querySelector('input[name="ngayketthuc"]');

        const startVal = startInput.value;
        const endVal = endInput.value;

        clearError(startInput);
        clearError(endInput);

        if (!isValidRealDate(startVal)) {
            showError(startInput, 'Ngày bắt đầu không hợp lệ!');
            return;
        }
        if (!isValidRealDate(endVal)) {
            showError(endInput, 'Ngày kết thúc không hợp lệ!');
            return;
        }

        const startDate = new Date(startVal);
        const endDate = new Date(endVal);

        if (startDate >= endDate) {
            showError(endInput, 'Ngày kết thúc phải sau ngày bắt đầu!');
        }
    }

    // Gắn sự kiện cho input ngày
    const startInput = document.querySelector('input[name="ngaybatdau"]');
    const endInput = document.querySelector('input[name="ngayketthuc"]');

    startInput.addEventListener('blur', validateDateRange);
    endInput.addEventListener('blur', validateDateRange);

    startInput.addEventListener('input', () => clearError(startInput));
    endInput.addEventListener('input', () => clearError(endInput));

    // Reset form
    function resetForm() {
        if (confirm('Bạn có chắc muốn đặt lại biểu mẫu?')) {
            document.querySelector('form').reset();
            document.querySelectorAll('.error-msg').forEach(e => e.remove());
            document.querySelectorAll('.border-red-500').forEach(e => e.classList.remove('border-red-500'));
        }
    }

    // Tự động ẩn thông báo
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert-success, .alert-error');
        alerts.forEach(alert => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
</script>


</body>
</html>