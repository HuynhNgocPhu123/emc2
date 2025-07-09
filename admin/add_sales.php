<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo '<script>alert("Vui lòng đăng nhập"); window.location.href = "login.php";</script>';
    exit();
}

include_once(__DIR__ . '/../controller/getsales.php');
$p = new Gsales();

if (isset($_POST['btnAddSales'])) {
    $ten_khuyenmai = trim($_POST['ten_khuyenmai']);
    $gia = floatval($_POST['gia']);
    $noidung = trim($_POST['noidung']);
    $loaidoanhnghiep = $_POST['loaidoanhnghiep'];
    $loaigoi = $_POST['loaigoi'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];

    // Validation đơn giản
    if (empty($ten_khuyenmai) || empty($gia) || empty($loaidoanhnghiep) || empty($loaigoi) || empty($ngaybatdau) || empty($ngayketthuc)) {
        $message = "Vui lòng nhập đầy đủ thông tin!";
        $type = "error";
    } else {
        $result = $p->getinsertkhuyenmai($ten_khuyenmai, $gia, $noidung, $loaidoanhnghiep, $loaigoi, $ngaybatdau, $ngayketthuc);
        if ($result) {
            $message = "Thêm khuyến mãi thành công!";
            $type = "success";
        } else {
            $message = "Thêm khuyến mãi thất bại!";
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
    <title>Thêm khuyến mãi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg,rgb(215, 222, 252) 0%,rgb(223, 203, 243) 100%);
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            padding: 40px 40px 50px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="25" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.5;
        }
        
        .header h1 {
            color: white;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }
        
        .header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }
        
        .header .icon {
            position: absolute;
            top: 20px;
            right: 20px;
            color: rgba(255, 255, 255, 0.3);
            font-size: 3rem;
            z-index: 1;
        }
        
        .form-container {
            padding: 50px;
        }
        
        .alert {
            padding: 20px;
            border-radius: 16px;
            margin-bottom: 30px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: fadeIn 0.6s ease-out;
        }
        
        .alert.success {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.3);
        }
        
        .alert.error {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .form-grid {
            display: grid;
            gap: 30px;
        }
        
        .form-group {
            position: relative;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        
        .required {
            color: #ef4444;
            margin-left: 4px;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            font-family: inherit;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            transform: translateY(-1px);
        }
        
        .form-control::placeholder {
            color: #9ca3af;
        }
        
        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.1rem;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .form-container {
                padding: 30px;
            }
            
            .header {
                padding: 30px 30px 40px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
        }
        
        .btn {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            padding: 18px 40px;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .btn-container {
            margin-top: 40px;
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
        }
        
        .btn-back {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
            padding: 18px 40px;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(107, 114, 128, 0.4);
            text-decoration: none;
        }
        
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(107, 114, 128, 0.4);
        }
        
        .btn-back:active {
            transform: translateY(0);
        }
        
        @media (max-width: 768px) {
            .btn-container {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn, .btn-back {
                width: 100%;
                justify-content: center;
            }
        }
        
        .form-control.textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .select-wrapper {
            position: relative;
        }
        
        .select-wrapper::after {
            content: '\f107';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
        }
        
        .form-control.select {
            appearance: none;
            cursor: pointer;
            padding-right: 50px;
        }
        
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite linear;
        }
        
        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 20%;
            right: 20%;
            animation-delay: 5s;
        }
        
        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 30%;
            left: 30%;
            animation-delay: 10s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <div class="container">
        <div class="header">
            <i class="fas fa-percentage icon"></i>
            <h1>Thêm khuyến mãi</h1>
            <p>Tạo chương trình khuyến mãi mới cho khách hàng</p>
        </div>
        
        <div class="form-container">
            <?php if (isset($message)): ?>
                <div class="alert <?= $type ?>">
                    <i class="fas <?= $type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?>"></i>
                    <?= $message ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="form-grid">
                <div class="form-group">
                    <label for="ten_khuyenmai">
                        Tên khuyến mãi <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <input type="text" 
                               id="ten_khuyenmai"
                               name="ten_khuyenmai" 
                               class="form-control" 
                               placeholder="Nhập tên khuyến mãi..." 
                               required>
                        <i class="fas fa-tag input-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="gia">
                        Giá giảm (VND) <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <input type="number" 
                               id="gia"
                               name="gia" 
                               class="form-control" 
                               step="1000" 
                               min="0" 
                               placeholder="Nhập giá khuyến mãi..." 
                               required>
                        <i class="fas fa-money-bill-wave input-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="noidung">Nội dung mô tả</label>
                    <textarea id="noidung"
                              name="noidung" 
                              class="form-control textarea" 
                              placeholder="Mô tả chi tiết về chương trình khuyến mãi..."></textarea>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="loaidoanhnghiep">
                            Loại doanh nghiệp <span class="required">*</span>
                        </label>
                        <div class="select-wrapper">
                            <select id="loaidoanhnghiep" 
                                    name="loaidoanhnghiep" 
                                    class="form-control select" 
                                    required>
                                <option value="">-- Chọn loại doanh nghiệp --</option>
                                <option value="1">Doanh Nghiệp Lớn</option>
                                <option value="2">Doanh Nghiệp Nhỏ</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="loaigoi">
                            Loại gói áp dụng <span class="required">*</span>
                        </label>
                        <div class="select-wrapper">
                            <select id="loaigoi" 
                                    name="loaigoi" 
                                    class="form-control select" 
                                    required>
                                <option value="">-- Chọn loại gói --</option>
                                <option value="1">Combo hot tháng này</option>
                                <option value="2">Ưu đãi ngắn hạn</option>
                                <option value="3">Ưu đãi dài hạn</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="ngaybatdau">
                            Ngày bắt đầu <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <input type="date" 
                                   id="ngaybatdau"
                                   name="ngaybatdau" 
                                   class="form-control" 
                                   required>
                            <i class="fas fa-calendar-alt input-icon"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="ngayketthuc">
                            Ngày kết thúc <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <input type="date" 
                                   id="ngayketthuc"
                                   name="ngayketthuc" 
                                   class="form-control" 
                                   required>
                            <i class="fas fa-calendar-times input-icon"></i>
                        </div>
                    </div>
                </div>
                
                <div class="btn-container">
                     <a href="salesadmin.php" class="btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Quay lại
                    </a>
                    <button type="submit" name="btnAddSales" class="btn">
                        <i class="fas fa-plus"></i>
                        Thêm khuyến mãi
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>