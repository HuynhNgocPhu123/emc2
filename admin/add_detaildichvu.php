<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo '<script>alert("Vui lòng đăng nhập"); window.location.href = "login.php";</script>';
    exit();
}

include_once(__DIR__ . '/../controller/getservice.php');
$p = new Gservice();

// Lấy danh sách dịch vụ để hiển thị trong dropdown
$list_dichvu = $p->getalldichvu(); // 👈 Bạn cần có hàm này để lấy danh sách dịch vụ

// Xử lý thêm khi nhấn submit
if (isset($_POST['btnAddDetailService'])) {
    $tengoidichvu = trim($_POST['tengoidichvu']);
    $theogoi = trim($_POST['theogoi']);
    $gia = intval($_POST['gia']);
    $sohuudanhcho = trim($_POST['sohuudanhcho']);
    $motagoi = trim($_POST['motagoi']);
    $id_dichvu = intval($_POST['id_dichvu']);
    
    // Validation
    if (empty($tengoidichvu) || empty($gia) || empty($sohuudanhcho) || empty($id_dichvu)) {
        $message = "Vui lòng điền đầy đủ thông tin bắt buộc!";
        $messageType = "error";
    } else {
        $result = $p->getinsertdetaildichvu($tengoidichvu, $theogoi, $gia, $sohuudanhcho, $motagoi, $id_dichvu);
        if ($result) {
            $message = "Thêm chi tiết gói dịch vụ thành công!";
            $messageType = "success";
            // Reset form data
            $_POST = array();
        } else {
            $message = "Thêm chi tiết gói dịch vụ thất bại. Vui lòng thử lại!";
            $messageType = "error";
        }
    }
}

// Danh sách loại sở hữu
$sohuu_options = [
    'Cá nhân' => 'Cá nhân',
    'Doanh nghiệp' => 'Doanh nghiệp',
    'Tổ chức' => 'Tổ chức',
    'Sinh viên' => 'Sinh viên',
    'Khởi nghiệp' => 'Khởi nghiệp'
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Chi Tiết Gói Dịch Vụ | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-hover {
            transition: all 0.3s ease;
        }
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .slide-in {
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .notification {
            animation: fadeInScale 0.3s ease-out;
        }
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .form-section {
            border-left: 4px solid #3b82f6;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
        .select-custom {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1rem;
        }
        .price-input {
            position: relative;
        }
        .price-input::before {
            content: 'VND';
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 0.875rem;
            font-weight: 500;
            pointer-events: none;
        }
        .price-input input {
            padding-right: 60px;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4 py-8">

    <!-- Header -->
    <div class="w-full max-w-5xl mb-8">
        <div class="glass-effect rounded-2xl p-6 slide-in">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-layer-group text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Thêm Chi Tiết Gói Dịch Vụ</h1>
                        <p class="text-gray-600">Tạo gói dịch vụ chi tiết với thông tin giá cả và mô tả</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-2 text-sm text-gray-500">
                    <i class="fas fa-user"></i>
                    <span>Xin chào, <?= isset($_SESSION["dn"]) ? $_SESSION["dn"] : "Admin" ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-full max-w-4xl">
        <div class="glass-effect rounded-2xl p-8 slide-in">
            
            <!-- Notification -->
            <?php if (isset($message)): ?>
                <div class="notification mb-6 px-6 py-4 rounded-xl font-medium flex items-center space-x-3
                    <?= $messageType === 'success' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200' ?>">
                    <i class="fas <?= $messageType === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> text-lg"></i>
                    <span><?= $message ?></span>
                </div>
            <?php endif; ?>

            <!-- Service Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm">Tổng dịch vụ</p>
                            <p class="text-2xl font-bold"><?= $list_dichvu ? $list_dichvu->num_rows : 0 ?></p>
                        </div>
                        <i class="fas fa-cogs text-3xl text-purple-200"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-pink-100 text-sm">Loại sở hữu</p>
                            <p class="text-2xl font-bold"><?= count($sohuu_options) ?></p>
                        </div>
                        <i class="fas fa-users text-3xl text-pink-200"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm">Thời gian</p>
                            <p class="text-lg font-bold"><?= date('Y:m:d') ?></p>
                        </div>
                        <i class="fas fa-clock text-3xl text-blue-200"></i>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="" class="space-y-8" id="detailServiceForm">
                
                <!-- Service Selection Section -->
                <div class="form-section rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-cogs mr-3 text-blue-600"></i>
                        Chọn dịch vụ
                    </h3>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                            Thuộc dịch vụ <span class="text-red-500">*</span>
                        </label>
                        <select name="id_dichvu" 
                                class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus select-custom bg-white"
                                required>
                            <option value="">-- Chọn dịch vụ --</option>
                            <?php
                            if ($list_dichvu && $list_dichvu->num_rows > 0) {
                                while ($row = $list_dichvu->fetch_assoc()) {
                                    $selected = (isset($_POST['id_dichvu']) && $_POST['id_dichvu'] == $row['id_dichvu']) ? 'selected' : '';
                                    echo '<option value="' . $row['id_dichvu'] . '" ' . $selected . '>' . htmlspecialchars($row['tendichvu']) . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            Chọn dịch vụ mà gói chi tiết này thuộc về
                        </p>
                    </div>
                </div>

                <!-- Package Details Section -->
                <div class="form-section rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-layer-group mr-3 text-purple-600"></i>
                        Thông tin gói chi tiết
                    </h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                                Tên gói dịch vụ chi tiết <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="tengoidichvu" 
                                   placeholder="Nhập tên gói chi tiết..."
                                   value="<?= isset($_POST['tengoidichvu']) ? htmlspecialchars($_POST['tengoidichvu']) : '' ?>"
                                   class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent input-focus"
                                   required>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-tag mr-1"></i>
                                Tên gói chi tiết ngắn gọn và dễ hiểu
                            </p>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                                Giá <span class="text-red-500">*</span>
                            </label>
                            <div class="price-input">
                                <input type="number" 
                                       name="gia" 
                                       min="0"
                                       step="1000"
                                       placeholder="0"
                                       value="<?= isset($_POST['gia']) ? $_POST['gia'] : '' ?>"
                                       class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent input-focus"
                                       required>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-dollar-sign mr-1"></i>
                                Giá của gói dịch vụ (VND)
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Target Audience Section -->
                <div class="form-section rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-users mr-3 text-green-600"></i>
                        Đối tượng sử dụng
                    </h3>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                            Sở hữu dành cho <span class="text-red-500">*</span>
                        </label>
                        <select name="sohuudanhcho" 
                                class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent input-focus select-custom bg-white"
                                required>
                            <option value="">-- Chọn đối tượng --</option>
                            <?php foreach ($sohuu_options as $value => $label): ?>
                                <option value="<?= $value ?>" <?= (isset($_POST['sohuudanhcho']) && $_POST['sohuudanhcho'] == $value) ? 'selected' : '' ?>>
                                    <?= $label ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-target mr-1"></i>
                            Chọn đối tượng phù hợp cho gói dịch vụ này
                        </p>
                    </div>
                </div>
                <!-- Gói theo tháng hoặc theo năm -->
                <div class="space-y-2 mt-6">
                    <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                        Gói theo <span class="text-red-500">*</span>
                    </label>
                    <select name="theogoi" 
                            class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus select-custom bg-white"
                            required>
                        <option value="">-- Chọn loại gói --</option>
                        <option value="Theo Tháng" <?= (isset($_POST['theogoi']) && $_POST['theogoi'] == 'Theo Tháng') ? 'selected' : '' ?>>Theo Tháng</option>
                        <option value="Theo Năm" <?= (isset($_POST['theogoi']) && $_POST['theogoi'] == 'Theo Năm') ? 'selected' : '' ?>>Theo Năm</option>
                    </select>
                    <p class="text-xs text-gray-500 mt-1">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        Gói sử dụng theo chu kỳ tháng hoặc năm
                    </p>
                </div>

                <!-- Package Description Section -->
                <div class="form-section rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-file-alt mr-3 text-orange-600"></i>
                        Mô tả gói dịch vụ
                    </h3>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                            Mô tả chi tiết gói
                        </label>
                        <textarea name="motagoi" 
                                  rows="6" 
                                  placeholder="Nhập mô tả chi tiết về gói dịch vụ, các tính năng, lợi ích..."
                                  class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent input-focus resize-none"><?= isset($_POST['motagoi']) ? htmlspecialchars($_POST['motagoi']) : '' ?></textarea>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-pen mr-1"></i>
                            Mô tả chi tiết về gói dịch vụ, các tính năng và lợi ích
                        </p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" 
                            name="btnAddDetailService"
                            class="flex-1 bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white px-6 py-4 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2 text-lg">
                        <i class="fas fa-plus-circle"></i>
                        <span>Thêm gói chi tiết</span>
                    </button>
                    
                    <button type="button" 
                            onclick="resetForm()"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-4 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2 text-lg">
                        <i class="fas fa-refresh"></i>
                        <span>Làm mới</span>
                    </button>
                    
                    <button type="button" 
                            onclick="previewDetailService()"
                            class="flex-1 bg-blue-100 hover:bg-blue-200 text-blue-700 px-6 py-4 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2 text-lg">
                        <i class="fas fa-eye"></i>
                        <span>Xem trước</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Navigation -->
    <div class="w-full max-w-4xl mt-8">
        <div class="glass-effect rounded-2xl p-6 slide-in">
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="serviceadmin.php" 
                   class="flex items-center space-x-2 text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                    <i class="fas fa-arrow-left"></i>
                    <span>Quay lại danh sách</span>
                </a>
                
                <div class="hidden sm:block w-px h-6 bg-gray-300"></div>
                
                <a href="add_service.php" 
                   class="flex items-center space-x-2 text-green-600 hover:text-green-800 font-medium transition-colors duration-200">
                    <i class="fas fa-plus"></i>
                    <span>Thêm dịch vụ</span>
                </a>
                
                <div class="hidden sm:block w-px h-6 bg-gray-300"></div>
                
                <a href="dashboard.php" 
                   class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 font-medium transition-colors duration-200">
                    <i class="fas fa-home"></i>
                    <span>Trang chủ</span>
                </a>
                
                <div class="hidden sm:block w-px h-6 bg-gray-300"></div>
                
                <a href="logout.php" 
                   class="flex items-center space-x-2 text-red-600 hover:text-red-800 font-medium transition-colors duration-200">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Đăng xuất</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="w-full max-w-5xl mt-8 text-center text-white/70">
        <p class="text-sm">
            © 2024 Admin Panel. Quản lý chi tiết gói dịch vụ - Phát triển với <i class="fas fa-heart text-red-400"></i>
        </p>
    </div>

    <script>
        // Reset form function
        function resetForm() {
            document.getElementById('detailServiceForm').reset();
            // Remove any notification
            const notification = document.querySelector('.notification');
            if (notification) {
                notification.style.animation = 'fadeOut 0.3s ease-out';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }
        }

        // Preview detail service function
        function previewDetailService() {
            const tengoidichvu = document.querySelector('input[name="tengoidichvu"]').value;
            const gia = document.querySelector('input[name="gia"]').value;
            const sohuudanhcho = document.querySelector('select[name="sohuudanhcho"]').value;
            const motagoi = document.querySelector('textarea[name="motagoi"]').value;
            const dichvu = document.querySelector('select[name="id_dichvu"]');
            const dichvuText = dichvu.options[dichvu.selectedIndex].text;
            
            if (!tengoidichvu || !gia || !sohuudanhcho || !dichvu.value) {
                alert('Vui lòng điền đầy đủ thông tin bắt buộc trước khi xem trước!');
                return;
            }
            
            // Format price
            const formattedPrice = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(gia);
            
            let preview = `
🔍 XEM TRƯỚC CHI TIẾT GÓI DỊCH VỤ:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🏷️ Tên gói: ${tengoidichvu}
💰 Giá: ${formattedPrice}
👥 Dành cho: ${sohuudanhcho}
🔧 Thuộc dịch vụ: ${dichvuText}
📝 Mô tả: ${motagoi || 'Không có mô tả'}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
            `;
            
            alert(preview);
        }

        // Format price input
        const priceInput = document.querySelector('input[name="gia"]');
        priceInput.addEventListener('input', function(e) {
            let value = e.target.value;
            // Remove any non-numeric characters
            value = value.replace(/\D/g, '');
            
            if (value) {
                // Add thousand separators
                const formatted = new Intl.NumberFormat('vi-VN').format(value);
                // Update placeholder with formatted value
                this.title = formatted + ' VND';
            }
        });

        // Form validation
        document.getElementById('detailServiceForm').addEventListener('submit', function(e) {
            const tengoidichvu = document.querySelector('input[name="tengoidichvu"]').value.trim();
            const gia = document.querySelector('input[name="gia"]').value;
            const sohuudanhcho = document.querySelector('select[name="sohuudanhcho"]').value;
            const dichvu = document.querySelector('select[name="id_dichvu"]').value;
            
            if (!tengoidichvu || !gia || !sohuudanhcho || !dichvu) {
                e.preventDefault();
                alert('Vui lòng điền đầy đủ thông tin bắt buộc!');
                return;
            }
            
            if (tengoidichvu.length < 5) {
                e.preventDefault();
                alert('Tên gói dịch vụ phải có ít nhất 5 ký tự!');
                return;
            }
            
            if (tengoidichvu.length > 100) {
                e.preventDefault();
                alert('Tên gói dịch vụ không được vượt quá 100 ký tự!');
                return;
            }
            
            if (parseInt(gia) < 0) {
                e.preventDefault();
                alert('Giá không thể âm!');
                return;
            }
            
            if (parseInt(gia) > 999999999) {
                e.preventDefault();
                alert('Giá quá lớn!');
                return;
            }
            
            // Confirm before submit
            if (!confirm('Bạn có chắc chắn muốn thêm gói chi tiết này?')) {
                e.preventDefault();
                return;
            }
        });

        // Auto-hide notifications after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.querySelector('.notification');
            if (notification) {
                setTimeout(() => {
                    notification.style.animation = 'fadeOut 0.3s ease-out';
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 5000);
            }
        });

        // Character counter for textarea
        const textarea = document.querySelector('textarea[name="motagoi"]');
        const maxLength = 1000;
        
        // Create character counter
        const counter = document.createElement('p');
        counter.className = 'text-xs text-gray-500 mt-1';
        counter.innerHTML = `<i class="fas fa-keyboard mr-1"></i>0/${maxLength} ký tự`;
        textarea.parentNode.appendChild(counter);
        
        textarea.addEventListener('input', function() {
            const length = this.value.length;
            counter.innerHTML = `<i class="fas fa-keyboard mr-1"></i>${length}/${maxLength} ký tự`;
            
            if (length > maxLength) {
                counter.className = 'text-xs text-red-500 mt-1';
                this.value = this.value.substring(0, maxLength);
            } else if (length > maxLength * 0.8) {
                counter.className = 'text-xs text-yellow-500 mt-1';
            } else {
                counter.className = 'text-xs text-gray-500 mt-1';
            }
        });

        // Add CSS for fadeOut animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                from {
                    opacity: 1;
                    transform: scale(1);
                }
                to {
                    opacity: 0;
                    transform: scale(0.9);
                }
            }
        `;
        document.head.appendChild(style);
    </script>

</body>
</html>