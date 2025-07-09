<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo '<script>alert("Vui lòng đăng nhập"); window.location.href = "login.php";</script>';
    exit();
}

include_once(__DIR__ . '/../controller/getservice.php');
$p = new Gservice();

// Lấy ID từ URL
$ma = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($ma <= 0) {
    echo '<script>alert("ID không hợp lệ!"); window.location.href="serviceadmin.php";</script>';
    exit();
}

// Lấy thông tin hiện tại của danh mục
$con = $p->get1danhmucdichvu($ma);
if ($con && $con->num_rows > 0) {
    $row = $con->fetch_assoc();
    $tendichvu_old = $row['ten_danhmucdichvu'];
} else {
    echo '<script>alert("Không tìm thấy danh mục"); window.location.href="serviceadmin.php";</script>';
    exit();
}

// Xử lý khi bấm Cập nhật
if (isset($_POST['btnUpdateCategory'])) {
    $tenmoi = trim($_POST['tendichvu']);
    if ($tenmoi === '') {
        $message = "Tên danh mục không được để trống!";
        $type = "error";
    } else {
        $result = $p->getupdatecategorydichvu($ma, $tenmoi);
        if ($result === true) {
            $message = "Cập nhật danh mục thành công!";
            $type = "success";
            $tendichvu_old = $tenmoi; // cập nhật lại dữ liệu hiển thị
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
    <title>Sửa Danh Mục Dịch Vụ | Admin Panel</title>
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
        .current-value {
            background: linear-gradient(135deg, #e3f2fd 0%, #f1f8e9 100%);
            border: 2px dashed #2196f3;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4 py-8">

    <!-- Header -->
    <div class="w-full max-w-4xl mb-8">
        <div class="glass-effect rounded-2xl p-6 slide-in">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-edit text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Sửa Danh Mục Dịch Vụ</h1>
                        <p class="text-gray-600">Cập nhật thông tin danh mục dịch vụ - ID: #<?= $ma ?></p>
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
    <div class="w-full max-w-2xl">
        <div class="glass-effect rounded-2xl p-8 slide-in">
            
            <!-- Current Value Display -->
            <div class="current-value rounded-xl p-4 mb-6">
                <div class="flex items-center space-x-3 mb-2">
                    <i class="fas fa-info-circle text-blue-600"></i>
                    <span class="font-medium text-gray-700">Giá trị hiện tại:</span>
                </div>
                <div class="pl-6">
                    <span class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($tendichvu_old) ?></span>
                </div>
            </div>

            <!-- Notification -->
            <?php if (isset($message)): ?>
                <div class="notification mb-6 px-6 py-4 rounded-xl font-medium flex items-center space-x-3
                    <?= $type === 'success' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200' ?>">
                    <i class="fas <?= $type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> text-lg"></i>
                    <span><?= $message ?></span>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form method="POST" action="" class="space-y-6" id="updateForm">
                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                        <i class="fas fa-tag mr-2"></i>Tên danh mục dịch vụ mới
                    </label>
                    <input type="text" 
                           name="tendichvu" 
                           value="<?= htmlspecialchars($tendichvu_old) ?>"
                           placeholder="Nhập tên danh mục mới..."
                           class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-transparent input-focus transition-all duration-300"
                           required>
                    <p class="text-xs text-gray-500 mt-1">
                        <i class="fas fa-lightbulb mr-1"></i>
                        Tên danh mục phải rõ ràng, dễ hiểu và không trùng lặp với danh mục khác
                    </p>
                </div>

                <!-- Change History -->
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-medium text-gray-700 mb-3 flex items-center">
                        <i class="fas fa-history mr-2"></i>Thông tin thay đổi
                    </h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">ID danh mục:</span>
                            <span class="font-mono bg-gray-200 px-2 py-1 rounded">#<?= $ma ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Thời gian:</span>
                            <span class="font-mono text-gray-700"><?= date('d/m/Y') ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Người thực hiện:</span>
                            <span class="font-medium text-gray-700"><?= isset($_SESSION["dn"]) ? $_SESSION["dn"] : "Admin" ?></span>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" 
                            name="btnUpdateCategory"
                            class="flex-1 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-6 py-3 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2">
                        <i class="fas fa-save"></i>
                        <span>Cập nhật danh mục</span>
                    </button>
                    
                    <button type="button" 
                            onclick="resetForm()"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2">
                        <i class="fas fa-undo"></i>
                        <span>Khôi phục</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Navigation -->
    <div class="w-full max-w-2xl mt-8">
        <div class="glass-effect rounded-2xl p-6 slide-in">
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="serviceadmin.php" 
                   class="flex items-center space-x-2 text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                    <i class="fas fa-arrow-left"></i>
                    <span>Quay lại danh sách</span>
                </a>
                
                <div class="hidden sm:block w-px h-6 bg-gray-300"></div>
                
                <a href="add_category_dichvu.php" 
                   class="flex items-center space-x-2 text-green-600 hover:text-green-800 font-medium transition-colors duration-200">
                    <i class="fas fa-plus"></i>
                    <span>Thêm danh mục mới</span>
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
    <div class="w-full max-w-4xl mt-8 text-center text-white/70">
        <p class="text-sm">
            © 2024 Admin Panel. Quản lý danh mục dịch vụ - Phát triển với <i class="fas fa-heart text-red-400"></i>
        </p>
    </div>

    <script>
        // Store original value
        const originalValue = <?= json_encode($tendichvu_old) ?>;
        
        // Reset form function
        function resetForm() {
            document.querySelector('input[name="tendichvu"]').value = originalValue;
            // Remove any notification
            const notification = document.querySelector('.notification');
            if (notification) {
                notification.style.animation = 'fadeOut 0.3s ease-out';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }
        }

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

        // Form validation and change detection
        document.getElementById('updateForm').addEventListener('submit', function(e) {
            const input = document.querySelector('input[name="tendichvu"]');
            const value = input.value.trim();
            
            // Validation
            if (value === '') {
                e.preventDefault();
                alert('Vui lòng nhập tên danh mục dịch vụ!');
                input.focus();
                return;
            }
            
            if (value.length < 2) {
                e.preventDefault();
                alert('Tên danh mục phải có ít nhất 2 ký tự!');
                input.focus();
                return;
            }
            
            if (value.length > 100) {
                e.preventDefault();
                alert('Tên danh mục không được vượt quá 100 ký tự!');
                input.focus();
                return;
            }
            
            // Check if value has changed
            if (value === originalValue) {
                e.preventDefault();
                alert('Không có thay đổi nào được phát hiện!');
                input.focus();
                return;
            }
            
            // Confirm update
            if (!confirm('Bạn có chắc chắn muốn cập nhật danh mục này?')) {
                e.preventDefault();
                return;
            }
        });

        // Real-time change detection
        document.querySelector('input[name="tendichvu"]').addEventListener('input', function() {
            const value = this.value.trim();
            const submitBtn = document.querySelector('button[name="btnUpdateCategory"]');
            
            if (value === originalValue) {
                submitBtn.style.opacity = '0.5';
                submitBtn.disabled = true;
            } else {
                submitBtn.style.opacity = '1';
                submitBtn.disabled = false;
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

        // Warning before leaving page with unsaved changes
        let hasUnsavedChanges = false;
        
        document.querySelector('input[name="tendichvu"]').addEventListener('input', function() {
            hasUnsavedChanges = (this.value.trim() !== originalValue);
        });
        
        window.addEventListener('beforeunload', function(e) {
            if (hasUnsavedChanges) {
                e.preventDefault();
                e.returnValue = 'Bạn có thay đổi chưa được lưu. Bạn có chắc chắn muốn rời khỏi trang?';
            }
        });
        
        // Clear unsaved changes flag on form submit
        document.getElementById('updateForm').addEventListener('submit', function() {
            hasUnsavedChanges = false;
        });
    </script>

</body>
</html>