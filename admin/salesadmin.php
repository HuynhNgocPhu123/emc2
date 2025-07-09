<?php
    include_once(__DIR__ . '/../controller/getsales.php');
    $p = new Gsales();

    // Số dòng mỗi trang
    $limit = 10;

    // Trang hiện tại
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;

    // Tính offset
    $offset = ($page - 1) * $limit;

    // Lấy toàn bộ dữ liệu
    $allData = $p->getallKM();

    // Tổng số dòng
    $totalRecords = ($allData && $allData !== 0) ? $allData->num_rows : 0;

    // Tính tổng số trang
    $totalPages = ceil($totalRecords / $limit);

    // Lấy dữ liệu phân trang (lấy lại từ đầu nhưng có LIMIT)
    $con = new clsketnoi();
    $connect = $con->moketnoi();
    $query = "SELECT * FROM khuyenmai ORDER BY id_khuyenmai DESC LIMIT $limit OFFSET $offset";
    $result = $connect->query($query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khuyến mãi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/salesadmin.css">
    <style>
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <div class="back-button">
                    <a href="dashboard.php" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
                <div class="header-title">
                    <h1><i class="fas fa-tags"></i> Quản lý khuyến mãi</h1>
                    <p>Hệ thống quản lý các chương trình khuyến mãi doanh nghiệp</p>
                </div>
            </div>
        </div>

        <div class="toolbar">
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                        <div style="font-size: 14px; color: #666;">Tổng khuyến mãi</div>
                        <div style="font-size: 18px; font-weight: bold; color: #333;"><?= $totalRecords ?></div>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div>
                        <div style="font-size: 14px; color: #666;">Trang hiện tại</div>
                        <div style="font-size: 18px; font-weight: bold; color: #333;"><?= $page ?>/<?= $totalPages ?></div>
                    </div>
                </div>
            </div>
            <div>
                <a href="add_sales.php" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Thêm khuyến mãi
                </a>
            </div>
        </div>

        <div class="content">
            <?php if ($result && $result->num_rows > 0): ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag"></i> ID</th>
                                <th><i class="fas fa-tag"></i> Tên khuyến mãi</th>
                                <th><i class="fas fa-percentage"></i> Giá VND</th>
                                <th><i class="fas fa-align-left"></i> Nội dung</th>
                                <th><i class="fas fa-building"></i> Loại DN</th>
                                <th><i class="fas fa-box"></i> Loại gói</th>
                                <th><i class="fas fa-calendar-alt"></i> Ngày bắt đầu</th>
                                <th><i class="fas fa-calendar-times"></i> Ngày kết thúc</th>
                                <th><i class="fas fa-cogs"></i> Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td>
                                        <div class="id-badge"><?= $row['id_khuyenmai'] ?></div>
                                    </td>
                                    <td>
                                        <div class="promotion-info">
                                            <div class="promotion-name"><?= htmlspecialchars($row['ten_khuyenmai']) ?></div>
                                            <div class="promotion-code">KM-<?= str_pad($row['id_khuyenmai'], 4, '0', STR_PAD_LEFT) ?></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-container">
                                            <span class="price-badge"><?= $row['gia'] ?></span>
                                            <div class="discount-text">Giảm giá</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="content-preview">
                                            <div class="content-text"><?= htmlspecialchars(substr($row['noidung'], 0, 50)) ?><?= strlen($row['noidung']) > 50 ? '...' : '' ?></div>
                                            <?php if(strlen($row['noidung']) > 50): ?>
                                                <button class="btn-expand" onclick="toggleContent(this)" data-full="<?= htmlspecialchars($row['noidung']) ?>">
                                                    <i class="fas fa-expand-alt"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="business-badge">
                                            <i class="fas fa-building"></i>
                                            <span><?= htmlspecialchars($row['loaidoanhnghiep']) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="package-badge">
                                            <i class="fas fa-box"></i>
                                            <span><?= htmlspecialchars($row['loaigoi']) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="date-info">
                                            <div class="date-main"><?= date('d/m/Y', strtotime($row['ngaybatdau'])) ?></div>
                                            <div class="date-time"><?= date('H:i', strtotime($row['ngaybatdau'])) ?></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="date-info">
                                            <div class="date-main"><?= date('d/m/Y', strtotime($row['ngayketthuc'])) ?></div>
                                            <div class="date-time"><?= date('H:i', strtotime($row['ngayketthuc'])) ?></div>
                                            <?php 
                                            $endDate = new DateTime($row['ngayketthuc']);
                                            $now = new DateTime();
                                            $status = $endDate > $now ? 'active' : 'expired';
                                            ?>
                                            <div class="status-<?= $status ?>">
                                                <?= $status === 'active' ? 'Còn hiệu lực' : 'Hết hạn' ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <div class="action-dropdown">
                                                <button class="btn-action" onclick="toggleDropdown(this)">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                  
                                                    <a href="update_sales.php?id=<?= $row['id_khuyenmai'] ?>" class="dropdown-item" name="">
                                                        <i class="fas fa-edit"></i> Chỉnh sửa
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="delete_sales.php?delete&id=<?= $row['id_khuyenmai'] ?>" class="dropdown-item danger" onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?')">
                                                        <i class="fas fa-trash"></i> Xóa
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($totalPages > 1): ?>
                    <div class="pagination">
                        <?php if ($page > 1): ?>
                            
                            <a href="?page=<?= $page - 1 ?>"><i class="fas fa-angle-left"></i> Trước</a>
                        <?php endif; ?>

                        <?php 
                        $start = max(1, $page - 2);
                        $end = min($totalPages, $page + 2);
                        for ($i = $start; $i <= $end; $i++): 
                        ?>
                            <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <a href="?page=<?= $page + 1 ?>">Sau <i class="fas fa-angle-right"></i></a>
                            
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <div class="no-data">
                    <i class="fas fa-inbox"></i>
                    <h3>Chưa có khuyến mãi nào</h3>
                    <p>Hệ thống chưa có dữ liệu khuyến mãi. Hãy thêm khuyến mãi mới để bắt đầu.</p>
                    <a href="#" class="btn btn-primary" style="margin-top: 20px;">
                        <i class="fas fa-plus"></i> Thêm khuyến mãi đầu tiên
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="../assets/js/salesadmin.js"></script>
</body>
</html>
<?php
    if(isset($_REQUEST["delete"])){
        $ma = $_REQUEST["id"];
        $con = $p->getdeletekhuyenmai($id_khuyenmai);
        if($con){
            echo " <script> alert('Xóa thành công') </script>";
            echo " <script> window.location.href='serviceadmin.php' </script> ";
        }else{
            echo " <script> alert('Xóa thất bại') </script>  ";
        }
    }
?>