<?php
    include_once("controller/getcontact.php");
    $p = new getviewcontact();
    if(isset($_REQUEST["btn_lienhe"])){
    $hoten = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $sdt = $_REQUEST["phone"];
    $noidung = $_REQUEST["message"];
    $ngaytao = date("Y-m-d");  // ✅ Lấy ngày hiện tại
    $con = $p -> getthemLH($hoten, $email, $sdt, $noidung, $ngaytao, 0);
    if($con == true){
        echo '<script>alert("Gửi liên hệ thành công! Chúng tôi sẽ liên hệ bạn sớm nhất.")</script>';
        echo '<script>window.location.href="index.php?contact"</script>';
    } else {
        echo '<script>alert("Gửi liên hệ thất bại!")</script>';
    }
}
?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', 'Arial', sans-serif;
        background:  rgb(0, 0, 0);
        color: #fff;
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* Background Effects */
    .bg-effect {
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(199, 125, 255, 0.3) 0%, transparent 70%);
        animation: float 6s ease-in-out infinite;
    }

    .bg-effect:nth-child(1) {
        width: 300px;
        height: 300px;
        top: -150px;
        right: -150px;
        animation-delay: 0s;
    }

    .bg-effect:nth-child(2) {
        width: 200px;
        height: 200px;
        bottom: -100px;
        left: -100px;
        animation-delay: 2s;
    }

    .bg-effect:nth-child(3) {
        width: 150px;
        height: 150px;
        top: 50%;
        right: 10%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-20px) rotate(120deg); }
        66% { transform: translateY(10px) rotate(240deg); }
    }

    /* Header */
    .header {
        position: relative;
        z-index: 100;
        padding: 20px 0;
        background: rgba(26, 11, 46, 0.3);
        backdrop-filter: blur(10px);
    }

    .nav {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
    }

    .nav-links {
        display: flex;
        gap: 30px;
        list-style: none;
    }

    .nav-links a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
    }

    .nav-links a:hover {
        color: #c77dff;
    }

    /* Main Content */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 15px 30px;
        position: relative;
        z-index: 10;
    }

    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-title h1 {
        font-size: 48px;
        color: #fff;
        margin-bottom: 20px;
    }

    .section-title .highlight {
        background: linear-gradient(45deg, #c77dff, #7b2cbf);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .section-title p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 18px;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Contact Section */
    .contact-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        margin-bottom: 80px;
    }

    /* Contact Form */
    .contact-form {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 40px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        color: #fff;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 15px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        color: #fff;
        font-size: 16px;
        transition: all 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #c77dff;
        box-shadow: 0 0 20px rgba(199, 125, 255, 0.3);
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .submit-btn {
        background: linear-gradient(45deg, #7b2cbf, #c77dff);
        color: #fff;
        border: none;
        padding: 15px 40px;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        width: 100%;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(199, 125, 255, 0.4);
    }

    /* Company Info */
    .company-info {
        display: flex;
        flex-direction: column;
        gap: 30px;
        margin-left: 32px;
    }
    @media (max-width: 900px) {
        .company-info {
            margin-left: 0;
        }
    }

    .info-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 30px;
    }

    .info-card h3 {
        color: #c77dff;
        font-size: 24px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-card p {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .info-icon {
        width: 20px;
        height: 20px;
        fill: #c77dff;
    }

    .info-text {
        color: rgba(255, 255, 255, 0.9);
    }

    /* Map Section */
    .map-section {
        margin-top: 80px;
        text-align: center;
    }

    .map-section h2 {
        color: #fff;
        font-size: 36px;
        margin-bottom: 30px;
    }

    .map-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 20px;
        height: 400px;
        overflow: hidden;
    }

    .map-placeholder {
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255, 255, 255, 0.7);
        font-size: 18px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .contact-section {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .section-title h1 {
            font-size: 36px;
        }

        .nav-links {
            display: none;
        }

        .contact-form,
        .info-card {
            padding: 25px;
        }
    }

    .landing-hero-bg, .landing-hero-container, .landing-hero-img {
        overflow: visible !important;
    }

    .landing-hero-bg {
        width: 100vw;
        min-height: 715px;
        background: #000000;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        border-bottom-left-radius: 32px;
        border-bottom-right-radius: 32px;
        overflow: hidden;
        margin-bottom: 40px;
        padding-top: 40px;
    }

    .landing-hero-container {
        max-width: 1548px;
        width: 100%;
        min-height: 595px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 60px;
        gap: 32px;
    }

    .landing-hero-img {
        position: relative;
        width: 340px;
        height: 340px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 64px;
    }

    .mascot-glow {
        position: absolute;
        left: 30%;
        top: 28%;
        transform: translate(-50%, -50%);
        width: 1000px;
        height: 1000px;
        border-radius: 50%;
        background: radial-gradient(
            circle,
            rgba(123,47,242,0.18) 0%,
            rgba(199,125,255,0.10) 40%,
            rgba(123,47,242,0.06) 70%,
            transparent 100%
        );
        z-index: 0;
        pointer-events: none;
        filter: blur(64px);
    }

    .mascot-card-bg {
        position: absolute;
        left: 0;
        top: 48px;
        width: 340px;
        height: 340px;
        background: rgba(255,255,255,0.08);
        border-radius: 36px;
        z-index: 0;
    }

    .mascot-img {
        position: relative;
        width: 470px;
        height: auto;
        border-radius: 32px;
        z-index: 1;
    }

    .landing-hero-content {
        max-width: 540px;
        text-align: center;
        margin-left: 120px;
    }

    .landing-hero-content h1, .landing-hero-content p {
        background: linear-gradient(90deg, #f357a8 10%, #7b2ff2 100%, #2e90fa 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
    }

    .landing-hero-content h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 18px;
        letter-spacing: -1px;
        color: #fff;
    }

    .landing-hero-content p {
        font-size: 2.2rem;
        margin-bottom: 32px;
        color: #e0d6f7;
        line-height: 1.6;
        font-weight: 600;
    }

    .landing-hero-cards {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: stretch;
        gap: 32px;
        margin-top: 32px;
    }

    .landing-hero-card {
        min-width: 340px;
        max-width: 340px;
        width: 340px;
        min-height: 180px;
        height: 180px;
        padding: 24px 20px;
        display: flex;
        align-items: center;
        gap: 18px;
        background: rgba(255,255,255,0.08);
        border-radius: 24px;
        box-shadow: 0 4px 32px 0 rgba(60,0,100,0.18);
        border: 2px solid transparent;
        transition: border 0.2s, box-shadow 0.2s;
    }

    .landing-hero-card.active {
        border: 2px solid transparent;
    }

    .landing-hero-card .icon {
        flex-shrink: 0;
    }

    .landing-hero-card > div {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .landing-hero-card h3 {
        color: #fff;
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .landing-hero-card p {
        color: #e0d6f7;
        font-size: 1rem;
        margin: 0;
    }

    @media (max-width: 1200px) {
        .landing-hero-container {
            flex-direction: column;
            text-align: center;
            gap: 32px;
            padding: 40px 10px;
        }
        .landing-hero-img {
            justify-content: center;
        }
        .landing-hero-cards {
            flex-direction: row;
            justify-content: center;
            min-width: unset;
        }
    }

    @media (max-width: 700px) {
        .landing-hero-content h1 {
            font-size: 2.1rem;
        }
        .landing-hero-content p {
            font-size: 1.1rem;
        }
        .landing-hero-img img {
            width: 180px;
        }
        .landing-hero-cards {
            flex-direction: column;
            gap: 16px;
        }
        .landing-hero-card {
            min-width: 90vw;
            max-width: 100vw;
            width: 100%;
            padding: 14px 8px;
        }
    }

    .contact-wrapper {
        max-width: 1100px;
        margin: 0 auto;
        padding: 48px 16px 0 16px;
    }

    .contact-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 8px;
        letter-spacing: -1px;
    }

    .contact-title .highlight {
        background: linear-gradient(90deg, #f357a8 0%, #7b2ff2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
    }

    .contact-desc {
        text-align: center;
        color: #f3eaff;
        font-size: 1.1rem;
        margin-bottom: 36px;
    }

    .contact-main {
        display: flex;
        gap: 32px;
        justify-content: center;
        align-items: flex-start;
        margin-bottom: 40px;
    }

    .contact-card {
        background: rgba(255,255,255,0.08);
        border-radius: 20px;
        box-shadow: 0 4px 32px 0 rgba(123,47,242,0.08);
        padding: 32px 28px;
        flex: 1;
        min-width: 320px;
        max-width: 480px;
        margin-left: 15px;
    }

    .contact-form label {
        display: block;
        margin-bottom: 8px;
        color: #fff;
        font-weight: 500;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #e0d6f7;
        background: rgba(255,255,255,0.12);
        color: #fff;
        margin-bottom: 18px;
        font-size: 1rem;
        transition: border 0.2s;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
        border: 1.5px solid #f357a8;
        outline: none;
    }

    .contact-form textarea {
        min-height: 90px;
        resize: vertical;
    }

    .contact-form button {
        width: 100%;
        padding: 14px 0;
        border: none;
        border-radius: 30px;
        background: linear-gradient(90deg, #f357a8 0%, #7b2ff2 100%);
        color: #fff;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        margin-top: 8px;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 16px 0 rgba(123,47,242,0.12);
    }

    .contact-form button:hover {
        background: linear-gradient(90deg, #7b2ff2 0%, #f357a8 100%);
    }

    .info-block {
        margin-bottom: 24px;
    }

    .info-block:last-child {
        margin-bottom: 0;
    }

    .info-title {
        color: #f357a8;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-title svg {
        width: 20px;
        height: 20px;
        fill: #f357a8;
    }

    .info-content {
        color: #fff;
        font-size: 1rem;
        margin-bottom: 6px;
    }

    .info-content strong {
        color: #f3eaff;
    }

    .map-section {
        margin: 48px auto 0 auto;
        max-width: 1100px;
        padding: 0 16px 48px 16px;
    }

    .map-title {
        text-align: center;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 24px;
        color: #fff;
    }

    .map-card {
        background: rgba(255,255,255,0.08);
        border-radius: 20px;
        box-shadow: 0 4px 32px 0 rgba(123,47,242,0.08);
        padding: 16px;
    }

    .map-iframe {
        width: 100%;
        height: 300px;
        border: none;
        border-radius: 14px;
    }

    @media (max-width: 900px) {
        .contact-main {
            flex-direction: column;
            gap: 24px;
        }
        .contact-card {
            max-width: 100%;
        }
    }

    /* Bổ sung style cho 2 card info tách biệt */
    .contact-main > div:last-child {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    @media (max-width: 900px) {
        .contact-main > div:last-child {
            flex-direction: column;
            gap: 24px;
        }
    }

    /* Bổ sung style cho 2 card info tách biệt và icon nét tím nhạt */
    .contact-main > div:last-child {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    .info-content {
        display: flex;
        align-items: center;
        color: #fff;
        font-size: 1rem;
        margin-bottom: 6px;
    }
    .info-icon {
        display: inline-flex;
        align-items: center;
        margin-right: 2px;
    }
    .info-title {
        display: flex;
        align-items: center;
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 10px;
    }
    @media (max-width: 900px) {
        .contact-main > div:last-child {
            flex-direction: column;
            gap: 24px;
        }
    }

    /* Căn chỉnh header giống hình mẫu */
    header.main-header {
        padding: 15px 0 !important;
        min-height: unset !important;
    }
    header.main-header .container {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        min-height: unset !important;
        align-items: center !important;
    }
    header.main-header .logo {
        margin-left: 24px !important;
    }
    header.main-header .logo a {
        font-size: 1.35rem !important;
    }
    header.main-header .nav-menu ul li a {
        font-size: 1.05rem !important;
        margin: 0 12px !important;
    }
    header.main-header .header-icons a {
        font-size: 1.2rem !important;
        margin: 0 8px !important;
    }

    .card-glow {
        position: absolute;
        left: 230%;
        margin-top: -50px;
        transform: translate(-50%, -50%);
        width: 1000px;
        height: 1000px;
        border-radius: 50%;
        background: radial-gradient(
            circle,
            rgba(123,47,242,0.18) 0%,
            rgba(199,125,255,0.10) 40%,
            rgba(123,47,242,0.06) 70%,
            transparent 100%
        );
        z-index: 0;
        pointer-events: none;
        filter: blur(64px);
    }
    .contact-svg-bg {
      position: relative;
      width: 100vw;
      max-width: 100vw;
      height: 0;
      min-height: 0;
      z-index: 0;
      pointer-events: none;
    }
    .contact-svg-bg svg {
      position: absolute;
      left: 50%;
      top: -1700px; /* Đã chỉnh từ -180px lên -80px để sóng lên cao hơn */
      transform: translateX(-50%);
      width: 100vw;
      max-width: 1018px;
      height: auto;
      min-width: 320px;
      opacity: 0.4;
      z-index: 0;
      pointer-events: none;
      user-select: none;
    }
    @media (max-width: 1100px) {
      .contact-svg-bg svg {
        max-width: 90vw;
      }
    }
    .info-content strong, .info-title {
      font-weight: 700;
      color: #fff;
    }
    .info-content {
      font-size: 1.1rem;
      line-height: 1.7;
    }
    .info-content strong {
      white-space: nowrap;
    }
    .info-content {
      display: flex;
      align-items: flex-start;
      gap: 8px;
      flex-wrap: wrap;
    }
    .info-content strong {
      white-space: nowrap;
      font-weight: 700;
      color: #fff;
      margin-right: 6px;
    }
    .info-content {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 8px;
      flex-wrap: wrap;
    }
    .info-label {
      min-width: 110px;
      font-weight: 700;
      color: #fff;
      flex-shrink: 0;
    }
    .info-value {
      color: #fff;
      word-break: break-word;
      flex: 1;
    }
    .text-justify {
      text-align: justify;
    }
    .contact-main > div:last-child {
      margin-left: 32px;
    }
    @media (max-width: 900px) {
      .contact-main > div:last-child {
        margin-left: 0;
      }
    }
</style>
<div class="landing-hero-bg">
    <div class="landing-hero-container">
        <div class="landing-hero-img" style="position: relative; overflow: visible;">
            <div class="mascot-glow"></div>
            <div class="mascot-card-bg"></div>
            <img src="assets/images/robotCamLap.png" alt="Mascot" class="mascot-img" />
        </div>
        <div style="display: flex; flex-direction: column; gap: 32px; flex: 1;">
            <div class="landing-hero-content">
                <h1>EMC GROUP</h1>
                <p>Trang tin công nghệ & kinh doanh đa chiều</p>
            </div>
            <div class="landing-hero-cards" style="display: flex; flex-direction: row; gap: 32px; margin-top: 32px;">
                <div class="landing-hero-card">
                    <svg class="icon" width="48" height="48" fill="none" stroke="#c77dff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 48 48" style="margin-right:20px;"><path d="M24 44c-8 0-16-9.5-16-18A16 16 0 1 1 40 26c0 8.5-8 18-16 18z"/><circle cx="24" cy="22" r="6"/></svg>
                    <div>
                        <h3>Vision AI Technology</h3>
                        <p>Our Technology AI Generator website empowers individuals</p>
                    </div>
                </div>
                <div class="landing-hero-card active">
                    <svg class="icon" width="48" height="48" fill="none" stroke="#c77dff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 48 48" style="margin-right:20px;"><path d="M12 36V24l24-8-8 24-8-8-8 8z"/><circle cx="36" cy="12" r="3"/></svg>
                    <div>
                        <h3>Vision AI Technology</h3>
                        <p>Our Technology AI Generator website empowers individuals</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-wrapper">
    <div class="contact-title">Liên Hệ <span class="highlight">EMCGroup</span></div>
    <div class="contact-desc">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn. Hãy liên hệ với chúng tôi để cùng thực hiện những ý tưởng tuyệt vời.</div>
    <div class="contact-main">
        <div class="contact-card" style="position: relative; overflow: visible;">
            <div class="card-glow"></div>
            <form class="contact-form" onsubmit="handleSubmit(event)" method="POST">
                <label for="name">Họ và tên *</label>
                <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email của bạn" required>
                <label for="phone">Số điện thoại</label>
                <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn">
                <label for="message">Tin nhắn *</label>
                <textarea id="message" name="message" placeholder="Mô tả chi tiết về dự án hoặc câu hỏi của bạn..." required></textarea>
                <button type="submit" name="btn_lienhe">Gửi tin nhắn</button>
            </form>
        </div>
        <div style="display: flex; flex-direction: column; gap: 24px; flex: 1;">
            <div class="contact-card">
                <div class="info-block">
                    <div class="info-title" style="color:#c77dff;">
                        <svg width="22" height="22" fill="none" stroke="#e0d6f7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" style="vertical-align:middle;margin-right:8px;"><path d="M12 21c-4.418 0-8-5.373-8-10a8 8 0 1 1 16 0c0 4.627-3.582 10-8 10z"/><circle cx="12" cy="11" r="3"/></svg>
                        Thông tin liên hệ
                    </div>
                    <div class="info-content">
                        <span class="info-icon">
                            <svg width="18" height="18" fill="none" stroke="#e0d6f7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" style="vertical-align:middle;margin-right:6px;"><path d="M12 21c-4.418 0-8-5.373-8-10a8 8 0 1 1 16 0c0 4.627-3.582 10-8 10z"/><circle cx="12" cy="11" r="3"/></svg>
                        </span>
                        <span class="info-label"><strong>Địa chỉ:</strong></span>
                        <span class="info-value">Tòa nhà EMC, Số 12 Duy Tân, Cầu Giấy, Hà Nội</span>
                    </div>
                    <div class="info-content">
                        <span class="info-icon">
                            <svg width="18" height="18" fill="none" stroke="#e0d6f7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" style="vertical-align:middle;margin-right:6px;"><path d="M22 16.92V19a2 2 0 0 1-2.18 2A19.72 19.72 0 0 1 3 5.18 2 2 0 0 1 5 3h2.09a2 2 0 0 1 2 1.72c.13 1.13.37 2.23.72 3.28a2 2 0 0 1-.45 2.11l-.27.27a16 16 0 0 0 6.29 6.29l.27-.27a2 2 0 0 1 2.11-.45c1.05.35 2.15.59 3.28.72A2 2 0 0 1 22 16.92z"/></svg>
                        </span>
                        <span class="info-label"><strong>Hotline:</strong></span>
                        <span class="info-value">1900 6789</span>
                    </div>
                    <div class="info-content">
                        <span class="info-icon">
                            <svg width="18" height="18" fill="none" stroke="#e0d6f7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" style="vertical-align:middle;margin-right:6px;"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6 12 13 2 6"/></svg>
                        </span>
                        <span class="info-label"><strong>Email:</strong></span>
                        <span class="info-value">info@emcgroup.com.vn</span>
                    </div>
                </div>
            </div>
            <div class="contact-card">
                <div class="info-block">
                    <div class="info-title" style="color:#c77dff;">
                        <svg width="22" height="22" fill="none" stroke="#e0d6f7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" style="vertical-align:middle;margin-right:8px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        Về EMCGroup
                    </div>
                    <div class="info-content text-justify">
                        <span>
                            Chúng tôi là EMCGroup - đối tác tin cậy trong lĩnh vực Công nghệ, Marketing & Media. Với nhiều năm kinh nghiệm, chúng tôi cam kết mang đến những giải pháp tối ưu và hiệu quả nhất cho khách hàng.
                        </span>
                    </div>
                    <div class="info-content" style="margin-top:12px;">
                        <span class="info-icon">
                            <svg width="18" height="18" fill="none" stroke="#e0d6f7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" style="vertical-align:middle;margin-right:6px;"><polyline points="20 6 9 17 4 12"/></svg>
                        </span>
                        <strong>Giờ làm việc:</strong><br>
                        Thứ 2 - Thứ 6: 8:00 - 17:30<br>
                        Thứ 7: 8:00 - 12:00<br>
                        Chủ nhật: Đóng cửa
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-section">
        <div class="map-title">Vị trí của chúng tôi</div>
        <div class="map-card">
            <iframe class="map-iframe" src="https://www.google.com/maps?q=8+T%C3%B4n+Th%E1%BA%A5t+Thuy%E1%BA%BFt,+M%E1%BB%B9+%C4%90%C3%ACnh,+Nam+T%E1%BB%AB+Li%C3%AAm,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<!-- Sóng line art trang trí làm background section liên hệ -->
<div class="contact-svg-bg">
  <svg width="1018" height="1284" viewBox="0 0 1018 1284" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g opacity="0.4">
      <path d="M360.282 763.543C357.09 743.959 347.063 727.515 321.394 715.534C234.703 675.192 131.804 676.816 58.4589 607.661C20.8339 572.12 2.73292 523.738 1.19592 472.503C-5.66308 230.447 169.372 135.003 243.942 122.109C320.347 108.878 378.047 187.965 408.878 246.782C446.895 319.24 478.378 398.871 542.91 452.485C611.053 509.087 756.38 649.356 803.12 729.17C836.11 785.481 863.49 885.482 829 940.913C794.5 996.342 701.523 1007.69 637.91 1022.23C574.296 1036.76 585.188 1299.67 522.178 1282.34C437.451 1259.04 403.259 1148.59 384.854 1073.85C366.208 998.072 358.084 920.109 358.425 842.093C358.635 813.24 364.026 786.28 360.282 763.543Z" stroke="url(#paint0_linear_977_286)" stroke-width="1.6412" stroke-miterlimit="10"/>
      <path d="M237.764 107.322C319.159 93.2026 380.649 177.606 413.55 240.225C454.118 317.376 487.581 402.38 556.471 459.446C629.12 519.739 775.72 647.496 825.53 732.614C860.75 792.687 883.59 894.293 846.77 953.452C813.87 1006.33 728.935 1019.72 669.171 1035.91C607.612 1052.61 610.461 1285.67 548.178 1272.64C462.009 1254.51 418.794 1157.37 390.991 1088.46C363.042 1019.31 346.795 945.617 340.247 870.117C337.837 842.147 340.42 815.658 335.345 792.684C331.141 773.062 321.1 756.166 297.717 742.65C262.45 722.33 225.756 707.629 190.285 691.914C160.008 678.544 130.609 664.242 103.779 644.145C90.7579 634.415 78.5849 622.847 66.8329 609.175C35.0059 571.92 19.0209 523.228 17.4279 470.183C15.2379 391.48 28.3919 325.431 51.3379 271.686C94.2349 170.91 180.104 117.282 237.764 107.322Z" stroke="url(#paint1_linear_977_286)" stroke-width="1.6412" stroke-miterlimit="10"/>
      <path d="M231.653 92.4276C318.037 77.4196 383.383 167.033 418.288 233.561C461.341 315.512 496.917 405.675 570.033 466.406C647.187 530.39 795.18 645.701 848.11 736.016C885.47 799.785 903.8 903.17 864.79 965.852C833.41 1016.27 756.41 1031.64 700.673 1049.45C641.1 1068.43 635.946 1271.8 574.483 1262.69C486.807 1249.83 434.807 1165.86 397.54 1102.89C360.527 1040.23 335.852 971.042 322.414 898.059C317.425 871.146 317.201 845.128 310.754 821.744C305.432 802.018 295.337 784.497 274.347 769.512C241.988 746.418 209.85 727.01 179.387 706.574C153.588 689.336 129.026 671.537 106.331 648.837C95.6092 638.025 85.5232 625.242 75.6202 610.502C49.5002 571.918 35.7892 522.423 34.0062 467.781C31.5672 391.142 40.2202 323.77 58.2082 266.349C89.2892 166.501 166.024 103.788 231.653 92.4276Z" stroke="url(#paint2_linear_977_286)" stroke-width="1.6412" stroke-miterlimit="10"/>
      <path d="M225.542 77.5336C317.021 61.7046 386.118 156.461 423.199 226.858C468.737 313.608 506.466 409.103 583.834 473.22C665.428 541.002 814.76 643.693 870.82 739.206C910.32 806.671 924.2 911.728 882.88 978.142C853.09 1026 784 1043.63 732.17 1062.99C674.696 1084.3 661.325 1257.87 600.722 1252.84C511.473 1245.36 450.861 1174.52 403.917 1117.36C357.774 1061.29 324.735 996.512 304.303 925.976C296.799 900.012 293.702 874.572 285.99 850.845C279.55 831.014 269.507 812.934 250.843 796.588C221.394 770.72 193.812 746.605 168.25 721.382C147.035 700.342 127.138 679.087 108.642 653.677C100.049 641.823 92.263 627.957 83.994 612.016C63.514 572.21 52.078 521.912 50.171 465.568C47.764 391.018 52.062 322.563 64.732 261.093C85.302 162.689 151.944 90.2936 225.542 77.5336Z" stroke="url(#paint3_linear_977_286)" stroke-width="1.6412" stroke-miterlimit="10"/>
      <path d="M219.432 62.6406C315.9 45.9233 388.853 145.889 427.938 220.195C476.133 311.704 515.803 412.399 597.396 480.181C683.495 551.654 834.22 641.899 893.22 742.65C934.97 813.876 944.24 920.646 900.76 990.752C872.57 1036.05 811.43 1056.12 763.44 1076.68C708.093 1100.5 686.613 1244.33 626.615 1243.08C535.661 1241.19 466.742 1183.22 410.055 1131.97C355.127 1082.41 313.553 1022.08 286.232 954.062C276.148 929.159 270.244 904.19 261.267 880.119C253.816 860.25 243.718 841.545 227.34 823.663C200.827 794.742 177.814 766.373 157.22 736.256C140.35 711.561 125.25 686.637 111.234 658.543C104.768 645.647 99.1762 630.632 92.8212 613.516C77.7432 572.635 68.8862 521.281 66.7902 463.34C64.3072 390.813 64.7842 321.607 71.8162 255.889C82.0222 159.169 137.692 76.8396 219.432 62.6406Z" stroke="url(#paint4_linear_977_286)" stroke-width="1.6412" stroke-miterlimit="10"/>
      <path d="M213.32 47.7456C314.778 30.1411 391.586 135.316 432.676 213.531C483.356 309.84 525.071 415.801 610.917 486.968C701.522 562.132 853.59 639.758 915.76 745.88C959.64 820.801 964.47 929.244 918.67 1003.07C892.07 1045.82 838.88 1068.32 794.83 1090.15C741.55 1116.59 711.859 1230.61 652.813 1233.06C560.193 1236.94 483.061 1191.45 416.497 1146.33C352.851 1103.18 302.676 1047.4 268.252 981.772C255.762 957.882 246.877 933.421 236.462 909.046C227.999 889.14 217.914 869.702 203.796 850.566C180.324 818.657 161.495 785.942 146.149 750.956C133.73 722.673 123.294 694.293 113.612 663.276C109.207 649.444 105.635 633.321 101.261 614.924C91.3443 573.114 85.3472 520.73 83.0882 460.912C80.5282 390.408 77.8102 320.397 78.5392 250.312C79.5802 155.726 123.611 63.3456 213.32 47.7456Z" stroke="url(#paint5_linear_977_286)" stroke-width="1.6412" stroke-miterlimit="10"/>
      <path d="M207.25 33.0255C313.696 14.5325 394.255 124.851 437.414 206.867C490.579 307.976 534.407 419.097 624.479 493.929C719.523 572.891 872.94 637.897 938.23 749.216C984.25 827.834 984.67 938.121 936.58 1015.4C911.51 1055.7 866.44 1080.59 826.23 1103.63C775.12 1132.75 737.15 1217.07 678.945 1223.15C584.7 1232.96 499.207 1199.73 422.767 1160.73C350.363 1123.81 291.519 1072.7 250.14 1009.68C235.137 986.742 223.445 962.762 211.699 938.148C202.118 918.137 192.15 898.034 180.293 877.641C159.929 842.639 145.258 805.856 135.012 765.764C126.938 733.826 121.127 701.817 115.924 668.116C113.646 653.242 112.095 636.01 109.808 616.398C104.774 573.634 101.875 520.072 99.3204 458.592C96.6854 390.111 91.2904 319.173 85.2374 245.016C77.7234 152.057 109.531 49.8516 207.25 33.0255Z" stroke="url(#paint6_linear_977_286)" stroke-width="1.6412" stroke-miterlimit="10"/>
      <path d="M201.138 18.1316C312.68 -1.18317 397.028 114.451 442.192 200.377C497.841 306.285 543.717 422.672 638.147 500.956C737.7 583.608 892.5 636.169 960.85 752.792C1009.18 835.065 1004.99 947.065 954.57 1028.08C931.09 1065.81 894.23 1093.45 857.63 1117.55C808.85 1149.6 762.55 1204.04 705.092 1213.69C609.434 1229.58 515.433 1208.34 429.223 1175.55C348.127 1144.75 280.723 1098.37 232.282 1037.91C214.765 1015.91 200.266 992.402 187.188 967.552C176.662 947.402 166.707 926.563 157.002 904.849C139.96 866.886 129.087 825.664 124.194 780.77C120.293 745.218 119.212 709.646 118.662 673.221C118.445 657.411 118.809 639.005 118.675 618.071C118.417 574.286 118.723 519.613 115.978 456.536C113.054 389.946 105.567 317.854 92.1465 239.852C76.2775 148.2 95.4505 36.357 201.138 18.1316Z" stroke="url(#paint7_linear_977_286)" stroke-width="1.6412" stroke-miterlimit="10"/>
      <path d="M120.867 677.995C129.684 592.537 151.996 438.579 98.9513 234.622C75.2713 143.877 81.3053 22.9697 195.028 3.23813C311.559 -16.9648 399.763 103.879 446.997 193.607C505.198 304.208 553.119 425.861 651.775 507.81C755.76 594.26 911.91 634.202 983.39 756.022C1033.85 841.991 1025.15 955.772 972.48 1040.41C919.81 1125.04 828.28 1181.36 731.18 1203.6C633.981 1225.77 531.566 1216.17 435.453 1189.78C240.378 1136.11 111.386 1003.34 112.911 795.339C113.181 756.171 116.831 717.037 120.867 677.995Z" stroke="url(#paint8_linear_977_286)" stroke-width="1.6412" stroke-miterlimit="10"/>
    </g>
    <defs>
      <linearGradient id="paint0_linear_977_286" x1="-46.6921" y1="422.568" x2="817.07" y2="960.082" gradientUnits="userSpaceOnUse">
        <stop stop-color="#EE6067"/>
        <stop offset="0.989583" stop-color="#1D24A2"/>
      </linearGradient>
      <linearGradient id="paint1_linear_977_286" x1="-38.9631" y1="409.91" x2="843.34" y2="958.972" gradientUnits="userSpaceOnUse">
        <stop stop-color="#EE6067"/>
        <stop offset="0.989583" stop-color="#1D24A2"/>
      </linearGradient>
      <linearGradient id="paint2_linear_977_286" x1="-33.8198" y1="396.319" x2="869.42" y2="958.402" gradientUnits="userSpaceOnUse">
        <stop stop-color="#EE6067"/>
        <stop offset="0.989583" stop-color="#1D24A2"/>
      </linearGradient>
      <linearGradient id="paint3_linear_977_286" x1="-31.489" y1="382.601" x2="894.78" y2="959.012" gradientUnits="userSpaceOnUse">
        <stop stop-color="#EE6067"/>
        <stop offset="0.989583" stop-color="#1D24A2"/>
      </linearGradient>
      <linearGradient id="paint4_linear_977_286" x1="-32.1928" y1="369.71" x2="918.91" y2="961.582" gradientUnits="userSpaceOnUse">
        <stop stop-color="#EE6067"/>
        <stop offset="0.989583" stop-color="#1D24A2"/>
      </linearGradient>
      <linearGradient id="paint5_linear_977_286" x1="-36.3708" y1="358.901" x2="941.03" y2="967.142" gradientUnits="userSpaceOnUse">
        <stop stop-color="#EE6067"/>
        <stop offset="0.989583" stop-color="#1D24A2"/>
      </linearGradient>
      <linearGradient id="paint6_linear_977_286" x1="-45.0726" y1="352.817" x2="959.78" y2="978.132" gradientUnits="userSpaceOnUse">
        <stop stop-color="#EE6067"/>
        <stop offset="0.989583" stop-color="#1D24A2"/>
      </linearGradient>
      <linearGradient id="paint7_linear_977_286" x1="-56.5855" y1="349.394" x2="976.75" y2="992.442" gradientUnits="userSpaceOnUse">
        <stop stop-color="#EE6067"/>
        <stop offset="0.989583" stop-color="#1D24A2"/>
      </linearGradient>
      <linearGradient id="paint8_linear_977_286" x1="-69.9717" y1="347.662" x2="992.23" y2="1008.67" gradientUnits="userSpaceOnUse">
        <stop stop-color="#EE6067"/>
        <stop offset="0.989583" stop-color="#1D24A2"/>
      </linearGradient>
    </defs>
  </svg>
</div>

<script>
       // Add some interactive effects
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.contact-form, .info-card');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 20px 40px rgba(199, 125, 255, 0.2)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });
    });
</script>