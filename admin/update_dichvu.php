<?php 
session_start(); 
if (!isset($_SESSION["dn"])) { 
    echo '<script>alert("Vui lòng đăng nhập"); window.location.href = "login.php";</script>'; 
    exit(); 
}

include_once(__DIR__ . '/../controller/getservice.php'); 
$p = new Gservice();

// Lấy ID dịch vụ từ URL
if (!isset($_GET['id'])) { 
    echo '<script>alert("Thiếu ID dịch vụ"); window.location.href="serviceadmin.php";</script>'; 
    exit(); 
} 
$id_dichvu = (int)$_GET['id'];

// Lấy thông tin dịch vụ cần sửa
$data = $p->get1dichvu($id_dichvu); 
if ($data == false) { 
    echo '<script>alert("Không tìm thấy dịch vụ"); window.location.href="serviceadmin.php";</script>'; 
    exit(); 
} 
$service = $data->fetch_assoc();

// Lấy danh sách danh mục
$list_danhmuc = $p->getalldanhmucdichvu();

// Xử lý cập nhật
if (isset($_POST['btnUpdateService'])) { 
    $goidichvu = trim($_POST['goidichvu']); 
    $tendichvu = trim($_POST['tendichvu']); 
    $mota = trim($_POST['mota']); 
    $id_danhmucdichvu = intval($_POST['id_danhmucdichvu']);
    
    // Validation
    if (empty($goidichvu) || empty($tendichvu) || empty($id_danhmucdichvu)) {
        $message = "Vui lòng điền đầy đủ thông tin bắt buộc!";
        $messageType = "error";
    } else {
        $result = $p->getupdateDichvu($id_dichvu, $goidichvu, $tendichvu, $mota, $id_danhmucdichvu); 
        if ($result) { 
            $message = "Cập nhật dịch vụ thành công!";
            $messageType = "success";
            // Refresh service data
            $data = $p->get1dichvu($id_dichvu);
            $service = $data->fetch_assoc();
        } else { 
            $message = "Cập nhật dịch vụ thất bại. Vui lòng thử lại!";
            $messageType = "error";
        } 
    }
}

// Danh sách gói dịch vụ
$goi_dichvu_options = [
    'theo tháng' => 'Theo tháng',
    'theo năm' => 'Theo năm'
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Dịch Vụ | Admin Panel</title>
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
        .current-info {
            background:rgb(1, 58, 151);
          
        }
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
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4 py-8">

    <!-- Header -->
    <div class="w-full max-w-5xl mb-8">
        <div class="glass-effect rounded-2xl p-6 slide-in">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-edit text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Cập Nhật Dịch Vụ</h1>
                        <p class="text-gray-600">Chỉnh sửa thông tin dịch vụ trong hệ thống</p>
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

            <!-- Current Service Info -->
            <div class="current-info rounded-xl p-6 mb-8 text-white">
                <h3 class="text-lg font-semibold mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-3"></i>
                    Thông tin dịch vụ hiện tại
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm">
                        <p class="text-sm opacity-90">ID Dịch vụ</p>
                        <p class="text-xl font-bold">#<?= $service['id_dichvu'] ?? 'N/A' ?></p>
                    </div>
                    <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm">
                        <p class="text-sm opacity-90">Tên hiện tại</p>
                        <p class="text-lg font-semibold"><?= htmlspecialchars($service['tendichvu']) ?></p>
                    </div>
                    <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm">
                        <p class="text-sm opacity-90">Gói hiện tại</p>
                        <p class="text-lg font-semibold"><?= htmlspecialchars($service['goidichvu']) ?></p>
                    </div>
                </div>
            </div>

            <!-- Service Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm">Tổng danh mục</p>
                            <p class="text-2xl font-bold"><?= $list_danhmuc ? $list_danhmuc->num_rows : 0 ?></p>
                        </div>
                        <i class="fas fa-tags text-3xl text-blue-200"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm">Gói dịch vụ</p>
                            <p class="text-2xl font-bold"><?= count($goi_dichvu_options) ?></p>
                        </div>
                        <i class="fas fa-box text-3xl text-green-200"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm">Cập nhật lần cuối</p>
                            <p class="text-lg font-bold"><?= date('d/m/Y') ?></p>
                        </div>
                        <i class="fas fa-clock text-3xl text-purple-200"></i>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="" class="space-y-8" id="serviceForm">
                
                <!-- Service Package Section -->
                <div class="form-section rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-box-open mr-3 text-blue-600"></i>
                        Thông tin gói dịch vụ
                    </h3>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                            Gói dịch vụ <span class="text-red-500">*</span>
                        </label>
                        <select name="goidichvu" 
                                class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus select-custom bg-white"
                                required>
                            <option value="">-- Chọn gói dịch vụ --</option>
                            <?php foreach ($goi_dichvu_options as $value => $label): ?>
                                <option value="<?= $value ?>" <?= ($service['goidichvu'] == $value) ? 'selected' : '' ?>>
                                    <?= $label ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            Chọn loại gói dịch vụ phù hợp với nhu cầu khách hàng
                        </p>
                    </div>
                </div>

                <!-- Service Details Section -->
                <div class="form-section rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-cogs mr-3 text-green-600"></i>
                        Chi tiết dịch vụ
                    </h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                                Tên dịch vụ <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="tendichvu" 
                                   placeholder="Nhập tên dịch vụ..."
                                   value="<?= htmlspecialchars($service['tendichvu']) ?>"
                                   class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent input-focus"
                                   required>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-lightbulb mr-1"></i>
                                Tên dịch vụ ngắn gọn, súc tích và dễ hiểu
                            </p>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                                Danh mục dịch vụ <span class="text-red-500">*</span>
                            </label>
                            <select name="id_danhmucdichvu" 
                                    class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent input-focus select-custom bg-white"
                                    required>
                                <option value="">-- Chọn danh mục --</option>
                                <?php
                                if ($list_danhmuc) {
                                    $list_danhmuc->data_seek(0);
                                    while ($row = $list_danhmuc->fetch_assoc()) {
                                        $selected = ($row['id_danhmucdichvu'] == $service['id_danhmucdichvu']) ? 'selected' : '';
                                        echo '<option value="' . $row['id_danhmucdichvu'] . '" ' . $selected . '>' . htmlspecialchars($row['ten_danhmucdichvu']) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-tags mr-1"></i>
                                Chọn danh mục phù hợp để phân loại dịch vụ
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Service Description Section -->
                <div class="form-section rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-file-alt mr-3 text-purple-600"></i>
                        Mô tả chi tiết
                    </h3>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                            Mô tả dịch vụ
                        </label>
                        <textarea name="mota" 
                                  rows="5" 
                                  placeholder="Nhập mô tả chi tiết về dịch vụ..."
                                  class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent input-focus resize-none"><?= htmlspecialchars($service['mota']) ?></textarea>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-pen mr-1"></i>
                            Mô tả chi tiết về dịch vụ, lợi ích và đặc điểm nổi bật
                        </p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" 
                            name="btnUpdateService"
                            class="flex-1 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-6 py-4 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2 text-lg">
                        <i class="fas fa-save"></i>
                        <span>Cập nhật dịch vụ</span>
                    </button>
                    
                    <button type="button" 
                            onclick="resetForm()"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-4 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2 text-lg">
                        <i class="fas fa-refresh"></i>
                        <span>Khôi phục</span>
                    </button>
                    
                    <button type="button" 
                            onclick="previewService()"
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
                    <span>Thêm dịch vụ mới</span>
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
            © 2024 Admin Panel. Cập nhật dịch vụ - Phát triển với <i class="fas fa-heart text-red-400"></i>
        </p>
    </div>

    <script>
        // Reset form function - khôi phục về dữ liệu gốc
        function resetForm() {
            // Khôi phục giá trị ban đầu
            document.querySelector('select[name="goidichvu"]').value = '<?= $service['goidichvu'] ?>';
            document.querySelector('input[name="tendichvu"]').value = '<?= htmlspecialchars($service['tendichvu']) ?>';
            document.querySelector('textarea[name="mota"]').value = '<?= htmlspecialchars($service['mota']) ?>';
            document.querySelector('select[name="id_danhmucdichvu"]').value = '<?= $service['id_danhmucdichvu'] ?>';
            
            // Remove any notification
            const notification = document.querySelector('.notification');
            if (notification) {
                notification.style.animation = 'fadeOut 0.3s ease-out';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }
            
            // Update character counter
            updateCharacterCounter();
        }

        // Preview service function
        function previewService() {
            const goidichvu = document.querySelector('select[name="goidichvu"]').value;
            const tendichvu = document.querySelector('input[name="tendichvu"]').value;
            const mota = document.querySelector('textarea[name="mota"]').value;
            const danhmuc = document.querySelector('select[name="id_danhmucdichvu"]');
            const danhmucText = danhmuc.options[danhmuc.selectedIndex].text;
            
            if (!goidichvu || !tendichvu || !danhmuc.value) {
                alert('Vui lòng điền đầy đủ thông tin bắt buộc trước khi xem trước!');
                return;
            }
            
            let preview = `
🔍 XEM TRƯỚC CẬP NHẬT:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🆔 ID dịch vụ: #<?= $service['id_dichvu'] ?>
📦 Gói dịch vụ: ${goidichvu}
🏷️ Tên dịch vụ: ${tendichvu}
📁 Danh mục: ${danhmucText}
📝 Mô tả: ${mota || 'Không có mô tả'}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
            `;
            
            alert(preview);
        }

        // Form validation
        document.getElementById('serviceForm').addEventListener('submit', function(e) {
            const goidichvu = document.querySelector('select[name="goidichvu"]').value;
            const tendichvu = document.querySelector('input[name="tendichvu"]').value.trim();
            const danhmuc = document.querySelector('select[name="id_danhmucdichvu"]').value;
            
            if (!goidichvu || !tendichvu || !danhmuc) {
                e.preventDefault();
                alert('Vui lòng điền đầy đủ thông tin bắt buộc!');
                return;
            }
            
            if (tendichvu.length < 3) {
                e.preventDefault();
                alert('Tên dịch vụ phải có ít nhất 3 ký tự!');
                return;
            }
            
            if (tendichvu.length > 100) {
                e.preventDefault();
                alert('Tên dịch vụ không được vượt quá 100 ký tự!');
                return;
            }
            
            // Confirm before submit
            if (!confirm('Bạn có chắc chắn muốn cập nhật dịch vụ này?')) {
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
            
            // Initialize character counter
            updateCharacterCounter();
        });

        // Character counter for textarea
        function updateCharacterCounter() {
            const textarea = document.querySelector('textarea[name="mota"]');
            const maxLength = 500;
            
            // Find existing counter or create new one
            let counter = textarea.parentNode.querySelector('.char-counter');
            if (!counter) {
                counter = document.createElement('p');
                counter.className = 'char-counter text-xs text-gray-500 mt-1';
                textarea.parentNode.appendChild(counter);
            }
            
            const updateCounter = () => {
                const length = textarea.value.length;
                counter.innerHTML = `<i class="fas fa-keyboard mr-1"></i>${length}/${maxLength} ký tự`;
                
                if (length > maxLength) {
                    counter.className = 'char-counter text-xs text-red-500 mt-1';
                    textarea.value = textarea.value.substring(0, maxLength);
                } else if (length > maxLength * 0.8) {
                    counter.className = 'char-counter text-xs text-yellow-500 mt-1';
                } else {
                    counter.className = 'char-counter text-xs text-gray-500 mt-1';
                }
            };
            
            // Initial update
            updateCounter();
            
            // Add event listener
            textarea.addEventListener('input', updateCounter);
        }
    </script>

</body>
</html>