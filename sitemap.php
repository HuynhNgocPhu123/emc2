<?php
header("Content-Type: text/html; charset=UTF-8");
$base_url = "https://yourdomain.com"; // ⚠️ Thay bằng domain thật

// Danh sách các URL cần đưa vào sitemap
$pages = [
    ['loc' => "$base_url/index.php", 'title' => 'Trang chủ'],
    ['loc' => "$base_url/project_list.php", 'title' => 'Danh sách dự án'],
    ['loc' => "$base_url/add_project.php", 'title' => 'Thêm dự án'],
    ['loc' => "$base_url/login.php", 'title' => 'Đăng nhập'],
    ['loc' => "$base_url/news_list.php", 'title' => 'Danh sách tin tức'], // nếu có
    // Thêm đường dẫn khác nếu cần
];

// Sitemap dạng XML cho bot
if (isset($_GET['type']) && $_GET['type'] === 'xml') {
    header("Content-Type: application/xml; charset=UTF-8");
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($pages as $page) {
        echo "  <url>\n";
        echo "    <loc>{$page['loc']}</loc>\n";
        echo "    <changefreq>weekly</changefreq>\n";
        echo "    <priority>0.8</priority>\n";
        echo "  </url>\n";
    }
    echo '</urlset>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sitemap Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            padding: 30px;
        }
        .sitemap-container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }
        h2 {
            color: #0d6efd;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>

<div class="sitemap-container">
    <h2><i class="bi bi-diagram-3-fill"></i> Sơ đồ trang</h2>
    <ul class="list-group">
        <?php foreach ($pages as $page): ?>
            <li class="list-group-item">
                <a href="<?= $page['loc'] ?>" target="_blank"><?= $page['title'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="mt-4 text-muted">
        <small>🔗 <a href="?type=xml" target="_blank">Xem phiên bản XML dành cho Google</a></small>
    </div>
</div>

</body>
</html>
