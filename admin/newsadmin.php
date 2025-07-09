<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}

include_once(__DIR__ . '/../controller/getnews.php');
$p = new getnews();

$limit = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$data = $p->getallnews($limit, $offset);
$total = $p->totalNews();
$totalPages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Quản lý tin tức</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/newadmin.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-newspaper"></i> Quản lý tin tức</h1>
            <p>Hệ thống quản lý nội dung tin tức chuyên nghiệp</p>
        </div>

        <div class="toolbar">
            <a href="dashboard.php" class="btn btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại 
            </a>
            <a href="addnews.php" class="btn btn-add" name="btnAddNews">
                <i class="fas fa-plus"></i> Thêm bài viết mới
            </a>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <i class="fas fa-newspaper"></i>
                <h3 id="totalNews"><?= $total ?></h3>
                <p>Tổng bài viết</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-eye"></i>
                <h3 id="totalViews">0</h3>
                <p>Lượt xem</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-calendar-day"></i>
                <h3 id="todayNews">0</h3>
                <p>Bài viết hôm nay</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-users"></i>
                <h3 id="totalPages"><?= $totalPages ?></h3>
                <p>Tổng trang</p>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i> ID</th>
                        <th><i class="fas fa-heading"></i> Tiêu đề</th>
                        <th><i class="fas fa-image"></i> Hình ảnh</th>
                        <th><i class="fas fa-calendar"></i> Ngày đăng</th>
                        <th><i class="fas fa-user"></i> Tác giả</th>
                        <th><i class="fas fa-eye"></i> Lượt xem</th>
                        <th><i class="fas fa-tag"></i> Danh mục</th>
                        <th><i class="fas fa-cog"></i> Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data && $data == true): ?>
                        <?php while ($row = $data->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id_tintuc'] ?></td>
                                <td><div class="news-title"><?= htmlspecialchars($row['tieude']) ?></div></td>
                                <td><img src="../assets/images/<?= htmlspecialchars($row['hinhanh']) ?>" alt="News Image" class="news-image"></td>
                                <td><div class="news-date"><?= $row['ngaydang'] ?></div></td>
                                <td><?= htmlspecialchars($row['tacgia']) ?></td>
                                <td><span class="news-views"><?= $row['luotxem'] ?></span></td>
                                <td><span class="category-tag"><?= htmlspecialchars($row['tendanhmuc']) ?></span></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="updatenews.php?id=<?= $row['id_tintuc'] ?>" class="btn-edit">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                        <a href="newsadmin.php?delete&id=<?= $row['id_tintuc'] ?>" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xoá bài viết này?');">
                                            <i class="fas fa-trash"></i> Xoá
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="empty-state">
                                <i class="fas fa-inbox"></i>
                                <h3>Không có dữ liệu</h3>
                                <p>Chưa có bài viết nào được đăng</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Animate counters
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start).toLocaleString();
                }
            }, 16);
        }

        // Initialize counters
        document.addEventListener('DOMContentLoaded', function() {
            const totalNews = <?= $total ?>;
            const totalPages = <?= $totalPages ?>;
            
            animateCounter(document.getElementById('totalNews'), totalNews);
            animateCounter(document.getElementById('totalPages'), totalPages);
            
            // Tính tổng lượt xem từ dữ liệu hiện tại
            let totalViews = 0;
            <?php 
            if ($data && $data == true) {
                $data->data_seek(0); // Reset pointer
                while ($row = $data->fetch_assoc()) {
                    echo "totalViews += " . $row['luotxem'] . ";";
                }
            }
            ?>
            animateCounter(document.getElementById('totalViews'), totalViews);
        });

        // Add hover effects for table rows
        document.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    </script>
</body>
</html>

<?php
// Xử lý xóa bài viết - GIỮ NGUYÊN LOGIC CỦA BẠN
if(isset($_REQUEST["delete"])){
    $ma = $_REQUEST["id"];
    $con = $p->deletenewsform($ma);
    if($con){
        echo " <script> alert('Xóa thành công') </script>";
        echo " <script> window.location.href='newsadmin.php' </script> ";
    }else{
        echo " <script> alert('Xóa thất bại') </script>  ";
    }
}
?>