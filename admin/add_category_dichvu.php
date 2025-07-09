<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo '<script>alert("Vui lòng đăng nhập"); window.location.href = "login.php";</script>';
    exit();
}

include_once(__DIR__ . '/../controller/getservice.php');
$p = new Gservice();

// Xử lý thêm danh mục dịch vụ
if (isset($_POST['btnAddCategory'])) {
    $tendichvu = trim($_POST['tendichvu']);

    if ($tendichvu === '') {
        $message = "Tên danh mục không được để trống!";
        $messageType = "error";
    } else {
        $result = $p->getinsertcategorydichvu($tendichvu);
        if ($result) {
            $message = "Thêm danh mục thành công!";
            $messageType = "success";
            // Reset form sau khi thêm thành công
            $_POST = array();
        } else {
            $message = "Thêm danh mục thất bại!";
            $messageType = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Danh Mục Dịch Vụ | Admin Panel</title>
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
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4 py-8">

    <!-- Header -->
    <div class="w-full max-w-4xl mb-8">
        <div class="glass-effect rounded-2xl p-6 slide-in">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-plus text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Thêm Danh Mục Dịch Vụ</h1>
                        <p class="text-gray-600">Quản lý danh mục dịch vụ của hệ thống</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-2 text-sm text-gray-500">
                    <i class="fas fa-user"></i>
                    <span>Xin chào, Admin</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-full max-w-2xl">
        <div class="glass-effect rounded-2xl p-8 slide-in">
            
            <!-- Notification -->
            <?php if (isset($message)): ?>
                <div class="notification mb-6 px-6 py-4 rounded-xl font-medium flex items-center space-x-3
                    <?= $messageType === 'success' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200' ?>">
                    <i class="fas <?= $messageType === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> text-lg"></i>
                    <span><?= $message ?></span>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form action="" method="POST" class="space-y-6" id="categoryForm">
                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium text-sm uppercase tracking-wide">
                        <i class="fas fa-tag mr-2"></i>Tên danh mục dịch vụ
                    </label>
                    <input type="text" 
                           name="tendichvu" 
                           placeholder="Nhập tên danh mục dịch vụ..." 
                           value="<?= isset($_POST['tendichvu']) ? htmlspecialchars($_POST['tendichvu']) : '' ?>"
                           class="w-full p-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus transition-all duration-300"
                           required>
                    <p class="text-xs text-gray-500 mt-1">
                        <i class="fas fa-info-circle mr-1"></i>
                        Tên danh mục phải rõ ràng, dễ hiểu và không trùng lặp
                    </p>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" 
                            name="btnAddCategory"
                            class="flex-1 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-6 py-3 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Thêm danh mục</span>
                    </button>
                    
                    <button type="button" 
                            onclick="resetForm()"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl shadow-lg btn-hover font-medium flex items-center justify-center space-x-2">
                        <i class="fas fa-refresh"></i>
                        <span>Làm mới</span>
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
            © 2024 Admin Panel. Được phát triển với <i class="fas fa-heart text-red-400"></i>
        </p>
    </div>

    <script>
        // Reset form function
        function resetForm() {
            document.getElementById('categoryForm').reset();
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

        // Form validation
        document.getElementById('categoryForm').addEventListener('submit', function(e) {
            const input = document.querySelector('input[name="tendichvu"]');
            const value = input.value.trim();
            
            if (value === '') {
                e.preventDefault();
                alert('Vui lòng nhập tên danh mục dịch vụ!');
                input.focus();
            } else if (value.length < 2) {
                e.preventDefault();
                alert('Tên danh mục phải có ít nhất 2 ký tự!');
                input.focus();
            } else if (value.length > 100) {
                e.preventDefault();
                alert('Tên danh mục không được vượt quá 100 ký tự!');
                input.focus();
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