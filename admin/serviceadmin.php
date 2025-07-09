<?php
include_once(__DIR__ . '/../controller/getservice.php');
$p = new Gservice();

// Lấy dữ liệu
$danhmuc_dichvu = $p->getalldanhmucdichvu();
$dichvu = $p->getalldichvu();
$goidichvu = $p->getallchitietgoidichvu();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý dịch vụ</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/serviceadmin.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="action-buttons1">
                <a href="dashboard.php" class="btn-back">Quay lại </a>
            </div>
            <h2><i class="fas fa-cogs"></i> Quản lý dịch vụ</h2>
            <p>Hệ thống quản lý toàn diện các dịch vụ và gói dịch vụ</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <i class="fas fa-list"></i>
                <h4>Danh mục dịch vụ</h4>
                <div class="number" id="danhmuc-count">0</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-tools"></i>
                <h4>Dịch vụ</h4>
                <div class="number" id="dichvu-count">0</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-box"></i>
                <h4>Gói dịch vụ</h4>
                <div class="number" id="goidichvu-count">0</div>
            </div>
        </div>

        <div class="menu">
            <button onclick="showSection('danhmuc')" class="active">
                <i class="fas fa-list"></i> Danh mục dịch vụ
            </button>
            <button onclick="showSection('dichvu')">
                <i class="fas fa-tools"></i> Dịch vụ
            </button>
            <button onclick="showSection('goidichvu')">
                <i class="fas fa-box"></i> Chi tiết gói dịch vụ
            </button>
        </div>

        <!-- Danh mục dịch vụ -->
        <div id="danhmuc" class="table-section active">
            <h3><i class="fas fa-list"></i> Danh mục dịch vụ</h3>
            <div class="action-buttons">
                <button class="btn btn-primary" name="btnAddCategory">
                    <i class="fas fa-plus"></i> <a href="add_category_dichvu.php" style="color:white; text-decoration: none;">Thêm danh mục</a>
                </button>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-tag"></i> Tên danh mục</th>
                            <th><i class="fas fa-cog"></i> Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($danhmuc_dichvu): 
                            $danhmuc_count = 0;
                            while($row = $danhmuc_dichvu->fetch_assoc()): 
                                $danhmuc_count++;
                        ?>
                            <tr>
                                <td class="id-cell"><?= $row['id_danhmucdichvu'] ?></td>
                                <td><?= $row['ten_danhmucdichvu'] ?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" name="btnUpdateCategory" style="padding: 8px 16px; margin-right: 5px;">
                                        <i class="fas fa-edit"></i> <a href="update_category_dichvu.php?id=<?= $row['id_danhmucdichvu'] ?>" style="color:white; text-decoration: none;">Sửa</a>
                                    </button>
                                    <button class="btn btn-sm" name="btnDeleteCategory" style="padding: 8px 16px; background: #e74c3c; color: white;">
                                        <i class="fas fa-trash"></i> 
                                        <a href="delete_category_dichvu.php?delete&id=<?= $row['id_danhmucdichvu'] ?>" 
                                            style="color:white; text-decoration: none;" 
                                            onclick="return confirm('Bạn có chắc muốn xóa liên hệ này?')">
                                            Xóa
                                        </a>

                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; else: ?>
                            <tr>
                                <td colspan="3" class="empty-state">
                                    <i class="fas fa-inbox"></i>
                                    <h4>Chưa có danh mục nào</h4>
                                    <p>Hãy thêm danh mục dịch vụ đầu tiên</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Dịch vụ -->
        <div id="dichvu" class="table-section">
            <h3><i class="fas fa-tools"></i> Dịch vụ</h3>
            <div class="action-buttons">
                <button class="btn btn-primary" name="btnAddService">
                    <i class="fas fa-plus"></i>
                    <a href="add_dichvu.php" style="color:white; text-decoration: none;">
                        Thêm dịch vụ
                    </a>
                </button>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-box"></i> Gói</th>
                            <th><i class="fas fa-tools"></i> Tên dịch vụ</th>
                            <th><i class="fas fa-file-text"></i> Mô tả</th>
                            <th><i class="fas fa-list"></i> Danh mục</th>
                            <th><i class="fas fa-cog"></i> Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($dichvu): 
                            $dichvu_count = 0;
                            while($row = $dichvu->fetch_assoc()): 
                                $dichvu_count++;
                        ?>
                            <tr>
                                <td class="id-cell"><?= $row['id_dichvu'] ?></td>
                                <td><?= htmlspecialchars($row['goidichvu']) ?></td>
                                <td><?= htmlspecialchars($row['tendichvu']) ?></td>
                                <td class="description" title="<?= htmlspecialchars($row['mota']) ?>">
                                    <?= htmlspecialchars($row['mota']) ?>
                                </td>
                                <td class="id-cell"><?= $row['ten_danhmucdichvu'] ?></td>
                                <td>
                                     <button class="btn btn-sm btn-primary" name="btnUpdateDichvu" style="padding: 8px 16px; margin-right: 5px;">
                                        <i class="fas fa-edit"></i> <a href="update_dichvu.php?id=<?= $row['id_dichvu'] ?>" style="color:white; text-decoration: none;">Sửa</a>
                                    </button>
                                    <button class="btn btn-sm" name="btnDeleteDichvu" style="padding: 8px 16px; background: #e74c3c; color: white;">
                                        <i class="fas fa-trash"></i> 
                                        <a href="delete_dichvu.php?delete&id=<?= $row['id_dichvu'] ?>" 
                                            style="color:white; text-decoration: none;" 
                                            onclick="return confirm('Bạn có chắc muốn xóa dịch vụ này?')">
                                            Xóa
                                        </a>

                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; else: ?>
                            <tr>
                                <td colspan="6" class="empty-state">
                                    <i class="fas fa-tools"></i>
                                    <h4>Chưa có dịch vụ nào</h4>
                                    <p>Hãy thêm dịch vụ đầu tiên</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Chi tiết gói dịch vụ -->
        <div id="goidichvu" class="table-section">
            <h3><i class="fas fa-box"></i> Chi tiết gói dịch vụ</h3>
            <div class="action-buttons">
                <button class="btn btn-primary" name="">
                    <i class="fas fa-plus"></i> 
                    <a href="add_detaildichvu.php" style="color:white; text-decoration: none;">
                        Thêm dịch vụ
                    </a>
                </button>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID gói</th>
                            <th><i class="fas fa-box"></i> Tên gói</th>
                            <th><i class="fas fa-dollar-sign"></i> Giá</th>
                            <th><i class="fas fa-users"></i> Sở hữu dành cho</th>
                            <th><i class="fas fa-file-text"></i> Mô tả</th>
                            <th><i class="fas fa-tools"></i> Dịch vụ</th>
                            <th><i class="fas fa-cog"></i> Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($goidichvu): 
                            $goidichvu_count = 0;
                            while($row = $goidichvu->fetch_assoc()): 
                                $goidichvu_count++;
                        ?>
                            <tr>
                                <td class="id-cell"><?= $row['id_goidichvu'] ?></td>
                                <td><?= htmlspecialchars($row['tengoidichvu']) ?></td>
                                <td class="price"><?= number_format($row['gia'], 0, ',', '.') ?> đ</td>
                                <td><?= htmlspecialchars($row['sohuudanhcho']) ?></td>
                                <td class="description" title="<?= htmlspecialchars($row['motagoi']) ?>">
                                    <?= htmlspecialchars($row['motagoi']) ?>
                                </td>
                                <td><?= htmlspecialchars($row['tendichvu']) ?></td>
                               
                                <td>
                                    <button class="btn btn-sm btn-primary" name="btnUpdatedetailDichvu" style="padding: 8px 16px; margin-right: 5px;">
                                        <i class="fas fa-edit"></i> <a href="update_detail_dichvu.php?id=<?= $row['id_goidichvu'] ?>" style="color:white; text-decoration: none;">Sửa</a>
                                    </button>
                                    <button class="btn btn-sm" style="padding: 8px 16px; background: #e74c3c; color: white;">
                                        <i class="fas fa-trash"></i> 
                                         <a href="delete_detail_dichvu.php?delete&id=<?= $row['id_goidichvu'] ?>" 
                                            style="color:white; text-decoration: none;" 
                                            onclick="return confirm('Bạn có chắc muốn xóa gói dịch vụ này?')">
                                            Xóa
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; else: ?>
                            <tr>
                                <td colspan="7" class="empty-state">
                                    <i class="fas fa-box"></i>
                                    <h4>Chưa có gói dịch vụ nào</h4>
                                    <p>Hãy thêm gói dịch vụ đầu tiên</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function showSection(id) {
            // Ẩn tất cả sections
            const sections = document.querySelectorAll('.table-section');
            sections.forEach(sec => {
                sec.classList.remove('active');
            });
            
            // Bỏ active class khỏi tất cả buttons
            const buttons = document.querySelectorAll('.menu button');
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Hiển thị section được chọn
            document.getElementById(id).classList.add('active');
            
            // Thêm active class cho button được click
            event.target.classList.add('active');
        }

        // Cập nhật số liệu thống kê
        document.addEventListener('DOMContentLoaded', function() {
            // Đếm số lượng từ PHP và cập nhật
            const danhmucCount = <?= isset($danhmuc_count) ? $danhmuc_count : 0 ?>;
            const dichvuCount = <?= isset($dichvu_count) ? $dichvu_count : 0 ?>;
            const goidichvuCount = <?= isset($goidichvu_count) ? $goidichvu_count : 0 ?>;
            
            document.getElementById('danhmuc-count').textContent = danhmucCount;
            document.getElementById('dichvu-count').textContent = dichvuCount;
            document.getElementById('goidichvu-count').textContent = goidichvuCount;
        });

        // Hiệu ứng hover cho bảng
        document.querySelectorAll('table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
<?php
    if(isset($_REQUEST["delete"])){
        $ma = $_REQUEST["id"];
        $con = $p->getdeletecategorydichvu($ma);
        if($con){
            echo " <script> alert('Xóa thành công') </script>";
            echo " <script> window.location.href='serviceadmin.php' </script> ";
        }else{
            echo " <script> alert('Xóa thất bại') </script>  ";
        }
    }
?>