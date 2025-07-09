<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
include_once(__DIR__ . '/../controller/getcontact.php');
$p = new getviewcontact();
$con = $p->getallcontact();

$tong = $daduyet = $chuaduyet = 0;
$data = $data_done = $data_pending = [];

if ($con && $con->num_rows > 0) {
    while ($row = $con->fetch_assoc()) {
        $data[] = $row;
        $tong++;
        if ($row['trangthaixuly'] == 1) {
            $daduyet++;
            $data_done[] = $row;
        } else {
            $chuaduyet++;
            $data_pending[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Liên Hệ</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="../assets/css/contactadmin.css">
    <style>
    </style>
</head>
<body>
    <div class="background-pattern"></div>
    
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-envelope"></i> Quản Lý Liên Hệ</h1>
            <p>Nền tảng quản lý liên hệ hiện đại với thiết kế xu hướng 2025</p>
        </div>

        <div class="stats-section">
            <div class="stat-card">
                <div class="stat-number" id="totalContacts"><?= $tong ?></div>
                <div class="stat-label"><i class="fas fa-envelope"></i> Tổng Liên Hệ</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="recentContacts"><?= $daduyet ?></div>
                <div class="stat-label"><i class="fas fa-check-circle"></i> Đã xử lý</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="favoriteContacts"><?= $chuaduyet ?></div>
                <div class="stat-label"><i class="fas fa-clock"></i> Chưa xử lý</div>
            </div>
        </div>

        <div class="action-buttons1">
            <a href="dashboard.php" class="btn-back">Quay lại </a>
        </div>

        <div class="glass-card">
            <h2><i class="fas fa-list"></i> Danh Sách Liên Hệ</h2>
                  <table class="contact-table">
                <thead>
                    <tr>
                        <th><i class="fas fa-user"></i> Tên</th>
                        <th><i class="fas fa-envelope"></i> Email</th>
                        <th><i class="fas fa-phone"></i> Số điện thoại</th>
                        <th><i class="fas fa-comment"></i> Tin nhắn</th>
                        <th><i class="fas fa-info-circle"></i> Trạng thái</th>
                        <th><i class="fas fa-cog"></i> Hành động</th>
                    </tr>
                </thead>
                <tbody id="contactTableBody">
                    <?php if (!empty($data)): ?>
                        <?php foreach ($data as $contact): ?>
                            <tr>
                                <td><?= htmlspecialchars($contact['tenKH']) ?></td>
                                <td><?= htmlspecialchars($contact['emailKH']) ?></td>
                                <td><?= htmlspecialchars($contact['sdt']) ?></td>
                                <td title="<?= htmlspecialchars($contact['noidung']) ?>"><?= htmlspecialchars($contact['noidung']) ?></td>
                                <td>
                                    <?php
                                        if ($contact['trangthaixuly'] == 1) {
                                            echo "<span class='status-done'>Đã duyệt</span>";
                                        } else {
                                            echo "<span class='status-pending'>Chưa duyệt</span>";
                                        }
                                    ?>
                                </td>
                                <td class="action-cell">
                                    <div class="action-buttons">
                                        <a href="updatecontact.php?id=<?= $contact['id_lienhe'] ?>" class="btn-approve" onclick="return confirm('Bạn có chắc muốn duyệt liên hệ này?')">Duyệt</a>
                                        <a href="delete_lienhe.php?id=<?= $contact['id_lienhe'] ?>" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa liên hệ này?')">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px; color: #666;">
                                <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 15px; color: #ddd;"></i>
                                <h3>Chưa có liên hệ nào</h3>
                                <p>Hệ thống chưa nhận được liên hệ nào từ khách hàng</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

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
            const totalContacts = <?= $tong ?>;
            const recentContacts = <?= $daduyet ?>;
            const favoriteContacts = <?= $chuaduyet ?>;
            
            animateCounter(document.getElementById('totalContacts'), totalContacts);
            animateCounter(document.getElementById('recentContacts'), recentContacts);
            animateCounter(document.getElementById('favoriteContacts'), favoriteContacts);
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tableBody = document.getElementById('contactTableBody');
            const rows = tableBody.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length - 1; j++) { // -1 để bỏ qua cột hành động
                    const cellText = cells[j].textContent.toLowerCase();
                    if (cellText.includes(searchTerm)) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });

        // Add loading state for action buttons
        document.querySelectorAll('.btn-approve, .btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                const confirmMessage = this.classList.contains('btn-approve') ? 
                    'Bạn có chắc muốn duyệt liên hệ này?' : 
                    'Bạn có chắc muốn xóa liên hệ này?';
                
                if (confirm(confirmMessage)) {
                    const originalContent = this.innerHTML;
                    this.innerHTML = '<span class="loading-animation"></span> Đang xử lý...';
                    this.style.pointerEvents = 'none';
                    
                    // The actual navigation will happen, so we don't need to restore
                } else {
                    e.preventDefault();
                }
            });
        });

        // Add hover effect for table rows
        document.querySelectorAll('.contact-table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    </script>
</body>
</html>