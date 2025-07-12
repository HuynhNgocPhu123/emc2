<?php
session_start();

// Giới hạn request: 100 request mỗi 5 phút
$max_requests = 100;
$time_window = 300; // 5 phút (300 giây)

// Lấy IP người dùng
$client_ip = $_SERVER['REMOTE_ADDR'];

// Lưu vào session theo IP
if (!isset($_SESSION['ddos'])) {
    $_SESSION['ddos'] = [];
}

// Dọn dẹp dữ liệu cũ
foreach ($_SESSION['ddos'] as $ip => $data) {
    if (time() - $data['start_time'] > $time_window) {
        unset($_SESSION['ddos'][$ip]);
    }
}

// Kiểm tra và đếm request hiện tại
if (!isset($_SESSION['ddos'][$client_ip])) {
    $_SESSION['ddos'][$client_ip] = ['count' => 1, 'start_time' => time()];
} else {
    $_SESSION['ddos'][$client_ip]['count']++;
}

// Chặn nếu vượt quá giới hạn
if ($_SESSION['ddos'][$client_ip]['count'] > $max_requests) {
    header("HTTP/1.1 429 Too Many Requests");
    die("Bạn gửi quá nhiều yêu cầu, vui lòng chờ vài phút rồi thử lại!");
}
?>
