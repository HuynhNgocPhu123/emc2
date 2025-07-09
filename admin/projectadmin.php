<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo '<script>alert("Vui lòng đăng nhập"); window.location.href = "login.php";</script>';
    exit();
}

include_once(__DIR__ . '/../controller/getproject.php');
$p = new Gproject();
$projects = $p->getallproject();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Dự Án - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #3b82f6;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-600: #475569;
            --gray-800: #1e293b;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: var(--gray-800);
        }

        .main-container {
            background: var(--light-color);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .main-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 300px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            z-index: 1;
        }

        .content-wrapper {
            position: relative;
            z-index: 2;
            padding: 2rem 0;
        }

        .header-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: var(--shadow-md);
        }

        .header-text h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.25rem;
        }

        .header-text p {
            color: var(--gray-600);
            margin: 0;
            font-size: 0.95rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
        }

        .stat-icon.projects {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        }

        .stat-icon.active {
            background: linear-gradient(135deg, var(--success-color), #059669);
        }

        .stat-icon.completed {
            background: linear-gradient(135deg, var(--info-color), #2563eb);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-800);
        }

        .stat-label {
            color: var(--gray-600);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .btn-modern {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
        }

        .btn-modern:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), #3730a3);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #059669, #047857);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            color: white;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
        }

        .btn-gray {
            background: linear-gradient(135deg, var(--gray-600), var(--gray-800));
            color: white;
        }

        .btn-gray:hover {
            background: linear-gradient(135deg, var(--gray-800), #0f172a);
            color: white;
        }

        .projects-table-container {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            border: 1px solid var(--gray-200);
        }

        .table-header {
            background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .table-header h3 {
            color: var(--gray-800);
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .table-responsive {
            border-radius: 0;
        }

        .table-modern {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-modern thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            font-weight: 600;
            padding: 1rem;
            border: none;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-modern tbody tr {
            transition: all 0.3s ease;
        }

        .table-modern tbody tr:hover {
            background: var(--gray-100);
            transform: scale(1.01);
        }

        .table-modern tbody td {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-200);
            vertical-align: middle;
        }

        .table-modern tbody tr:last-child td {
            border-bottom: none;
        }

        .project-id {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }

        .project-name {
            font-weight: 600;
            color: var(--gray-800);
            font-size: 1rem;
        }

        .project-description {
            color: var(--gray-600);
            font-size: 0.9rem;
            max-width: 300px;
            word-wrap: break-word;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--info-color), #2563eb);
            color: white;
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            transform: translateY(-1px);
        }

        .btn-delete {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            color: white;
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            transform: translateY(-1px);
        }

        .no-projects {
            text-align: center;
            padding: 3rem;
            color: var(--gray-600);
        }

        .no-projects i {
            font-size: 4rem;
            color: var(--gray-300);
            margin-bottom: 1rem;
        }

        .no-projects h4 {
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .no-projects p {
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                padding: 1rem;
            }

            .header-card {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .header-title {
                flex-direction: column;
                text-align: center;
            }

            .header-text h1 {
                font-size: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .action-bar > * {
                width: 100%;
                justify-content: center;
            }

            .table-responsive {
                font-size: 0.9rem;
            }

            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.75rem 0.5rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                justify-content: center;
            }

            .project-description {
                max-width: none;
            }
        }
        .project-image {
    width: 100px;
    height: 70px;
    object-fit: cover;
    border: 1px solid #dee2e6;
    transition: transform 0.3s ease;
}

.project-image:hover {
    transform: scale(1.1);
    cursor: pointer;
}


        @media (max-width: 576px) {
            .header-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }

            .header-text h1 {
                font-size: 1.25rem;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .btn-modern {
                padding: 0.6rem 1rem;
                font-size: 0.85rem;
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-in {
            animation: slideIn 0.8s ease-in-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="content-wrapper">
            <div class="container">
                <!-- Header Card -->
                <div class="header-card fade-in">
                    <div class="header-content">
                        <div class="header-title">
                            <div class="header-icon">
                                <i class="bi bi-kanban-fill"></i>
                            </div>
                            <div class="header-text">
                                <h1>Quản Lý Dự Án</h1>
                                <p>Theo dõi và quản lý tất cả dự án của bạn</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid fade-in">
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon projects">
                                <i class="bi bi-folder-fill"></i>
                            </div>
                        </div>
                        <div class="stat-number">
                            <?php 
                            $totalProjects = 0;
                            if ($projects && $projects != false) {
                                $totalProjects = $projects->num_rows;
                                $projects->data_seek(0); // Reset pointer
                            }
                            echo $totalProjects;
                            ?>
                        </div>
                        <div class="stat-label">Tổng Dự Án</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon active">
                                <i class="bi bi-play-circle-fill"></i>
                            </div>
                        </div>
                        <div class="stat-number"><?php echo $totalProjects; ?></div>
                        <div class="stat-label">Đang Hoạt Động</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon completed">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                        </div>
                        <div class="stat-number">0</div>
                        <div class="stat-label">Hoàn Thành</div>
                    </div>
                </div>

                <!-- Action Bar -->
                <div class="action-bar slide-in">
                    <a href="dashboard.php" class="btn-modern btn-gray">
                        <i class="bi bi-arrow-left-circle-fill"></i>
                        Quay lại Dashboard
                    </a>
                    <a href="add_project.php" class="btn-modern btn-success">
                        <i class="bi bi-plus-circle-fill"></i>
                        Thêm Dự Án Mới
                    </a>
                </div>

                <!-- Projects Table -->
                <div class="projects-table-container slide-in">
                    <div class="table-header">
                        <h3>
                            <i class="bi bi-list-ul"></i>
                            Danh Sách Dự Án
                        </h3>
                    </div>
                    
                    <?php if ($projects && $projects != false && $projects->num_rows > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-modern">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Dự Án</th>
                                        <th>Hình Ảnh</th>
                                        <th>Mô Tả</th>
                                        <th style="width: 180px;">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $projects->fetch_assoc()): ?>
                                        <tr>
                                            <td>
                                                <span class="project-id">#<?= $row['id_duan'] ?></span>
                                            </td>
                                            <td>
                                                <div class="project-name"><?= htmlspecialchars($row['tenduan']) ?></div>
                                            </td>
                                            <td>
                                                <img src="../assets/images/<?= htmlspecialchars($row['anhduan']) ?>" alt="Project Image" class="project-image rounded shadow-sm">
                                            </td>

            
                                            <td>
                                                <div class="project-description"><?= htmlspecialchars($row['mota']) ?></div>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="update_project.php?id=<?= $row['id_duan'] ?>" class="btn-action btn-edit">
                                                        <i class="bi bi-pencil-fill"></i>
                                                        Sửa
                                                    </a>
                                                    <a href="delete_project.php?delete&id=<?= $row['id_duan'] ?>" class="btn-action btn-delete"
                                                       onclick="return confirm('Bạn có chắc chắn muốn xóa dự án này không?')">
                                                        <i class="bi bi-trash-fill"></i>
                                                        Xóa
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="no-projects">
                            <i class="bi bi-folder-x"></i>
                            <h4>Chưa có dự án nào</h4>
                            <p>Hãy bắt đầu bằng cách tạo dự án đầu tiên của bạn</p>
                            <a href="add_project.php" class="btn-modern btn-primary">
                                <i class="bi bi-plus-circle-fill"></i>
                                Tạo Dự Án Đầu Tiên
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth scrolling and enhanced interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation for table rows
            const tableRows = document.querySelectorAll('.table-modern tbody tr');
            tableRows.forEach((row, index) => {
                row.style.animationDelay = `${index * 0.1}s`;
                row.classList.add('fade-in');
            });

            // Enhanced hover effects for cards
            const cards = document.querySelectorAll('.stat-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.btn-modern, .btn-action');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.style.position = 'absolute';
                    ripple.style.background = 'rgba(255, 255, 255, 0.5)';
                    ripple.style.borderRadius = '50%';
                    ripple.style.transform = 'scale(0)';
                    ripple.style.animation = 'ripple 0.6s linear';
                    ripple.style.pointerEvents = 'none';
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });

        // Add ripple animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
<?php
// Xử lý xóa dự án
if(isset($_REQUEST["delete"])){
    $ma = $_REQUEST["id"];
    $con = $p->getDeleteProject($ma);
    if($con){
        echo " <script> alert('Xóa thành công') </script>";
        echo " <script> window.location.href='newsadmin.php' </script> ";
    }else{
        echo " <script> alert('Xóa thất bại') </script>  ";
    }
}
?>