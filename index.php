<?php
// Chống DDOS
require_once __DIR__ . '/middleware/anti_ddos.php';

// Header
include_once("includes/header.php");

// Đánh số các trường hợp:
$page = 0;

if (isset($_REQUEST["service"])) {
    $page = 1;
    if (isset($_REQUEST["detailservice"])) $page = 11;
} elseif (isset($_REQUEST["project"])) {
    $page = 2;
} elseif (isset($_REQUEST["promotion"])) {
    $page = 3;
} elseif (isset($_REQUEST["news"])) {
    $page = 4;
    if (isset($_REQUEST["detailid"])) $page = 41;
} elseif (isset($_REQUEST["contact"])) {
    $page = 5;
} else {
    $page = 0; // Trang mặc định
}

// Điều hướng sử dụng switch-case với số rõ ràng
switch ($page) {
    case 1:
        include_once("pages/service.php");
        break;

    case 11:
        include_once("pages/detailservice.php");
        break;

    case 2:
        include_once("pages/project.php");
        break;

    case 3:
        include_once("pages/promotion.php");
        break;

    case 4:
        include_once("pages/news.php");
        break;

    case 41:
        include_once("pages/newsdetail.php");
        break;

    case 5:
        include_once("pages/contact.php");
        break;

    default:
        include_once("pages/home.php");
        break;
}

// Footer
include_once("includes/footer.php");
?>
</body>
</html>
