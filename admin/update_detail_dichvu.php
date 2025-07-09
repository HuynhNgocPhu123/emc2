<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo '<script>alert("Vui lòng đăng nhập"); window.location.href = "login.php";</script>';
    exit();
}

include_once(__DIR__ . '/../controller/getservice.php');
$p = new Gservice();

// Lấy ID gói chi tiết từ URL
if (!isset($_GET['id'])) {
    echo '<script>alert("Thiếu ID gói"); window.location.href="serviceadmin.php";</script>';
    exit();
}
$id_goidichvu = (int)$_GET['id'];

// Lấy chi tiết gói dịch vụ
$data = $p->getselect1chitietgoidichvu($id_goidichvu);
if ($data == false) {
    echo '<script>alert("Không tìm thấy gói"); window.location.href="serviceadmin.php";</script>';
    exit();
}
$row = $data->fetch_assoc();

// Lấy danh sách dịch vụ để chọn lại
$list_dichvu = $p->getalldichvu();

// Xử lý cập nhật
if (isset($_POST['btnUpdateDetailService'])) {
    $tengoidichvu = trim($_POST['tengoidichvu']);
    $gia = intval($_POST['gia']);
    $sohuudanhcho = trim($_POST['sohuudanhcho']);
    $motagoi = trim($_POST['motagoi']);
    $id_dichvu = intval($_POST['id_dichvu']);
    $theogoi = trim($_POST['theogoi']); // ✅ Thêm dòng này

    // Validation
    if (empty($tengoidichvu) || empty($gia) || empty($sohuudanhcho) || empty($id_dichvu) || empty($theogoi)) {
        $message = "Vui lòng điền đầy đủ thông tin bắt buộc!";
        $messageType = "error";
    } else {
        $result = $p->getupdatechitietgoidichvu($id_goidichvu, $tengoidichvu, $theogoi, $gia, $sohuudanhcho, $motagoi, $id_dichvu); // ✅ truyền thêm $theogoi
        if ($result) {
            $message = "Cập nhật chi tiết gói dịch vụ thành công!";
            $messageType = "success";
            // Refresh data after update
            $data = $p->getselect1chitietgoidichvu($id_goidichvu);
            $row = $data->fetch_assoc();
        } else {
            $message = "Cập nhật chi tiết gói dịch vụ thất bại. Vui lòng thử lại!";
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
    <title>Cập Nhật Chi Tiết Gói Dịch Vụ | Admin Panel</title>
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
            border-left: 4px solid #f59e0b;
            background: linear-gradient(135deg,rgb(255, 255, 255) 0%,rgb(255, 255, 255) 100%);
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
        .update-badge {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .info-card {
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            border: 1px solid #a5b4fc;
            border-radius: 0.75rem;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        .original-data {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.75rem;
            font-size: 0.875rem;
            color: #64748b;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4 py-8">

    <!-- Header -->
    <div class="w-full max-w-5xl mb-8">
        <div class="glass-effect rounded-2xl p-6 slide-in">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-edit text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Cập Nhật Chi Tiết Gói Dịch Vụ</h1>
                        <p class="text-gray-600">Chỉnh sửa thông tin gói dịch vụ chi tiết</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="update-badge">
                        <i class="fas fa-clock"></i>
                        <span>ID: <?= $id_goidichvu ?></span>
                    </div>
                    <div class="hidden md:flex items-center space-x-2 text-sm text-gray-500">
                        <i class="fas fa-user"></i>
                        <span>Xin chào, <?= isset($_SESSION["dn"]) ? $_SESSION["dn"] : "Admin" ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-full max-w-4xl">
        <div class="glass-effect rounded-2xl p-8 slide-in">
            
            <!-- Current Package Info -->
            <div class="info-card">
                <h3 class="text-lg font-semibold text-indigo-800 mb-3 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Thông tin hiện tại
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Tên gói:</p>
                        <p class="font-medium text-gray-800"><?= htmlspecialchars($row['tengoidichvu']) ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Giá:</p>
                        <p class="font-medium text-gray-800"><?= number_format($row['gia'], 0, ',', '.') ?> VND</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Dành cho:</p>
                        <p class="font-medium text-gray-800"><?= htmlspecialchars($row['sohuudanhcho']) ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Lần cập nhật cuối:</p>
                        <p class="font-medium text-gray-800"><?= date('d/m/Y H:i') ?></p>
                    </div>
                </div>
            </div>

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
                <div class="bg-gradient-to-r from-amber-500 to-orange-600 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-amber-100 text-sm">Tổng dịch vụ</p>
                            <p class="text-2xl font-bold"><?= $list_dichvu ? $list_dichvu->num_rows : 0 ?></p>
                        </div>
                        <i class="fas fa-cogs text-3xl text-amber-200"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-sm">Đang chỉnh sửa</p>
                            <p class="text-2xl font-bold">ID <?= $id_goidichvu ?></p>
                        </div>
                        <i class="fas fa-edit text-3xl text-purple-200"></i>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm">Thời gian</p>
                            <p class="text-lg font-bold"><?= date('d/m/Y') ?></p>
                        </div>
                        <i class="fas fa-clock text-3xl text-blue-200"></i>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="" class="space-y-8" id="updateDetailServiceForm">
                
                <!-- Service Selection Section -->
                <div class="form-section rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-cogs mr-3 text-amber-600"></i>
                        Chọn dịch vụ
                    </h3>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                            Thuộc dịch vụ <span class="text-red-500">*</span>
                        </label>
                        <div class="original-data mb-3">
                            <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                            Dịch vụ hiện tại: <strong><?= htmlspecialchars($row['tendichvu'] ?? 'N/A') ?></strong>
                        </div>
                        <select name="id_dichvu" 
                                class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-amber-500 focus:border-transparent input-focus select-custom bg-white"
                                required>
                            <option value="">-- Chọn dịch vụ --</option>
                            <?php
                            if ($list_dichvu && $list_dichvu->num_rows > 0) {
                                // Reset pointer to beginning
                                $list_dichvu->data_seek(0);
                                while ($dv = $list_dichvu->fetch_assoc()) {
                                    $selected = ($dv['id_dichvu'] == $row['id_dichvu']) ? 'selected' : '';
                                    echo '<option value="' . $dv['id_dichvu'] . '" ' . $selected . '>' . htmlspecialchars($dv['tendichvu']) . '</option>';
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
                        <i class="fas fa-layer-group mr-3 text-amber-600"></i>
                        Thông tin gói chi tiết
                    </h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                                Tên gói dịch vụ chi tiết <span class="text-red-500">*</span>
                            </label>
                            <div class="original-data mb-3">
                                <i class="fas fa-tag mr-2 text-blue-500"></i>
                                Tên hiện tại: <strong><?= htmlspecialchars($row['tengoidichvu']) ?></strong>
                            </div>
                            <input type="text" 
                                   name="tengoidichvu" 
                                   placeholder="Nhập tên gói chi tiết..."
                                   value="<?= htmlspecialchars($row['tengoidichvu']) ?>"
                                   class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-amber-500 focus:border-transparent input-focus"
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
                            <div class="original-data mb-3">
                                <i class="fas fa-dollar-sign mr-2 text-blue-500"></i>
                                Giá hiện tại: <strong><?= number_format($row['gia'], 0, ',', '.') ?> VND</strong>
                            </div>
                            <div class="price-input">
                                <input type="number" 
                                       name="gia" 
                                       min="0"
                                       step="1000"
                                       placeholder="0"
                                       value="<?= $row['gia'] ?>"
                                       class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-amber-500 focus:border-transparent input-focus"
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
                        <i class="fas fa-users mr-3 text-amber-600"></i>
                        Đối tượng sử dụng
                    </h3>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                            Sở hữu dành cho <span class="text-red-500">*</span>
                        </label>
                        <div class="original-data mb-3">
                            <i class="fas fa-target mr-2 text-blue-500"></i>
                            Đối tượng hiện tại: <strong><?= htmlspecialchars($row['sohuudanhcho']) ?></strong>
                        </div>
                        <select name="sohuudanhcho" 
                                class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-amber-500 focus:border-transparent input-focus select-custom bg-white"
                                required>
                            <option value="">-- Chọn đối tượng --</option>
                            <?php foreach ($sohuu_options as $value => $label): ?>
                                <option value="<?= $value ?>" <?= ($row['sohuudanhcho'] == $value) ? 'selected' : '' ?>>
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
                <!-- Loại gói: Theo tháng hoặc Theo năm -->
                <div class="space-y-2 mt-6">
                    <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                        Gói theo <span class="text-red-500">*</span>
                    </label>
                    <div class="original-data mb-3">
                        <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                        Loại hiện tại: <strong><?= htmlspecialchars($row['theogoi']) ?></strong>
                    </div>
                    <select name="theogoi" 
                            class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-amber-500 focus:border-transparent input-focus select-custom bg-white"
                            required>
                        <option value="">-- Chọn loại gói --</option>
                        <option value="Theo Tháng" <?= ($row['theogoi'] == 'Theo Tháng') ? 'selected' : '' ?>>Theo Tháng</option>
                        <option value="Theo Năm" <?= ($row['theogoi'] == 'Theo Năm') ? 'selected' : '' ?>>Theo Năm</option>
                    </select>
                    <p class="text-xs text-gray-500 mt-1">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        Chọn loại gói dịch vụ theo thời gian sử dụng
                    </p>
                </div>

                <!-- Package Description Section -->
                <div class="form-section rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-file-alt mr-3 text-amber-600"></i>
                        Mô tả gói dịch vụ
                    </h3>
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                            Mô tả chi tiết gói
                        </label>
                        <div class="original-data mb-3">
                            <i class="fas fa-file-alt mr-2 text-blue-500"></i>
                            Mô tả hiện tại: <strong><?= !empty($row['motagoi']) ? htmlspecialchars(substr($row['motagoi'], 0, 100)) . '...' : 'Chưa có mô tả' ?></strong>
                        </div>
                        <textarea name="motagoi" 
                                  rows="6" 
                                  placeholder="Nhập mô tả chi tiết về gói dịch vụ, các tính năng, lợi ích..."
                                  class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-amber-500 focus:border-transparent input-focus resize-none"><?= htmlspecialchars($row['motagoi']) ?></textarea>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-pen mr-1"></i>
                            Mô tả chi tiết về gói dịch vụ, các tính năng và lợi ích
                        </p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" 
                            name="btnUpdateDetailService"
                            class="flex-1 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white px-6 py-4 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2 text-lg">
                        <i class="fas fa-save"></i>
                        <span>Cập nhật gói chi tiết</span>
                    </button>
                    
                    <button type="button" 
                            onclick="resetForm()"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-4 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2 text-lg">
                        <i class="fas fa-undo"></i>
                        <span>Hoàn tác</span>
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
                
                <a href="add_detail_service.php" 
                   class="flex items-center space-x-2 text-green-600 hover:text-green-800 font-medium transition-colors duration-200">
                    <i class="fas fa-plus"></i>
                    <span>Thêm gói mới</span>
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
            © 2024 Admin Panel. Cập nhật chi tiết gói dịch vụ - Phát triển với <i class="fas fa-heart text-red-400"></i>
        </p>
    </div>

    <script>
        // Store original values for reset
        const originalValues = {
            tengoidichvu: "<?= htmlspecialchars($row['tengoidichvu']) ?>",
            gia: "<?= $row['gia'] ?>",
            sohuudanhcho: "<?= htmlspecialchars($row['sohuudanhcho']) ?>",
            motagoi: "<?= htmlspecialchars($row['motagoi']) ?>",
            id_dichvu: "<?= $row['id_dichvu'] ?>"
        };

        // Reset form function
        function resetForm() {
            if (confirm('Bạn có chắc chắn muốn hoàn tác tất cả thay đổi?')) {
                document.querySelector('input[name="tengoidichvu"]').value = originalValues.tengoidichvu;
                document.querySelector('input[name="gia"]').value = originalValues.gia;
                document.querySelector('select[name="sohuudanhcho"]').value = originalValues.sohuudanhcho;
                document.querySelector('textarea[name="motagoi"]').value = originalValues.motagoi;
                document.querySelector('select[name="id_dichvu"]').value = originalValues.id_dichvu;
                document.querySelector('select[name="theogoi"]').value = originalValues.theogoi;
                
                // Remove any notification
                const notification = document.querySelector('.notification');
                if (notification) {
                    notification.style.animation = 'fadeOut 0.3s ease-out';
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }
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
            
            // Show comparison
            let preview = `
🔍 XEM TRƯỚC CẬP NHẬT CHI TIẾT GÓI DỊCH VỤ (ID: <?= $id_goidichvu ?>):
━━━━━━━━━━━━━━━━━━━━━━━━━━━
📦 Tên gói: ${tengoidichvu}
💰 Giá: ${formattedPrice}
🎯 Dành cho: ${sohuudanhcho}
🛠 Thuộc dịch vụ: ${dichvuText}
📝 Mô tả:
${motagoi ? motagoi : '(Không có mô tả)'}

✅ Bạn có thể tiếp tục lưu nếu thấy phù hợp.
━━━━━━━━━━━━━━━━━━━━━━━━━━━
            `;

            // Hiển thị xem trước trong alert hoặc sau này bạn có thể mở modal
            alert(preview);
        }
    </script>
</body>
</html>
