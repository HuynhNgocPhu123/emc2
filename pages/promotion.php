<?php include __DIR__ . '/../includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/vars.css">
<link rel="stylesheet" href="assets/css/style.css">
<!-- Banner từ index2.html -->
<div class="banner-index2">
  <!-- Các thành phần còn lại giữ nguyên -->
  <div class="rectangle-347615690"></div>
  <img class="rectangle-347615694" src="assets/images/rectangle-3476156940.svg" alt="">
  <div class="theo-y-u-c-u">Theo yêu cầu</div>
  <div class="thi-t-k-ux-ui">Thiết Kế UX – UI</div>
  <div class="tro-domain-v-o-hosting">Trỏ Domain vào hosting</div>
  <div class="t-y-ch-n-ba-o-ha-nh-ba-o-tri">Tùy chọn / Bảo hành / Bảo trì</div>
  <div class="i-u-ch-nh-giao-di-n-ch-c-n-ng-theo-y-u-c-u">
    Điều chỉnh Giao diện/ Chức năng theo yêu cầu
  </div>
  <div class="thi-t-k-website-c-b-n">Thiết kế Website Cơ Bản</div>
  <div class="group-47217">
    <div class="rectangle-347615698"></div>
    <img class="outline-time-history" src="../assets/images/outline-time-history0.svg" alt="">
  </div>
  <div class="ch-t-3-000-000">Chỉ từ 3.000.000đ</div>
  <div class="group-47218">
    <div class="rectangle-3476156982"></div>
    <img class="outline-messages-conversation-unread" src="assets/images/outline-messages-conversation-unread0.svg" alt="" />
  </div>
  <div class="group-47219">
    <div class="rectangle-3476156983"></div>
    <img class="outline-messages-conversation-unread2" src="assets/images/outline-messages-conversation-unread1.svg" alt="" />
  </div>
  <div class="group-47220">
    <div class="rectangle-3476156984"></div>
    <img class="outline-messages-conversation-unread3" src="assets/images/outline-messages-conversation-unread2.svg" alt="" />
  </div>
  <div class="group-47221">
    <div class="rectangle-3476156985"></div>
    <img class="outline-messages-conversation-unread4" src="assets/images/outline-messages-conversation-unread3.svg" alt="" />
  </div>
  <div class="group-47227">
    <div class="btn-gradient-border">
      <button class="gradient-btn-index">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Tư vấn ngay
      </button>
    </div>
  </div>
  <img class="flash" src="assets/images/flash0.svg" alt="">
  <img class="e-2-c-0-d-487-a-30-f-4-b-40-93-ce-74-cce-2-e-8-a-815-removebg-preview-1" src="assets/images/e-2-c-0-d-487-a-30-f-4-b-40-93-ce-74-cce-2-e-8-a-815-removebg-preview-10.png" alt="" />
</div>
<!-- Hết banner -->
<style>
.banner-index2 {
  position: relative;
  z-index: 1;
  width: 100%;
  min-height: 400px;
  background: transparent;
  overflow: visible;
}
</style>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #000;
            margin: 0;
            padding: 0;
        }

        /* Header Section */
        .baner {
            background: #000;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .baner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg width="846" height="981" viewBox="0 0 846 981" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.56" filter="url(%23filter0_f_1002_442)"><ellipse cx="748.41" cy="233.5" rx="362.682" ry="379.073" transform="rotate(135 748.41 233.5)" fill="url(%23paint0_linear_1002_442)"/></g><defs><filter id="filter0_f_1002_442" x="0.940918" y="-513.969" width="1494.94" height="1494.94" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="188.25" result="effect1_foregroundBlur_1002_442"/></filter><linearGradient id="paint0_linear_1002_442" x1="748.41" y1="-145.573" x2="748.41" y2="612.573" gradientUnits="userSpaceOnUse"><stop stop-color="%231E92FF" stop-opacity="0.8"/><stop offset="0.495213" stop-color="%236F51FF" stop-opacity="0.899043"/><stop offset="1" stop-color="%23C30EFF"/></linearGradient></defs></svg>');
            background-size: 50%;
            background-repeat: no-repeat;
            background-position: right center;
        }

        .banner-container {
            max-width: 1200px;
            width: 100%;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .banner-content {
            flex: 1;
            color: white;
            z-index: 2;
        }

        .banner-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .banner-content p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.9;
            max-width: 500px;
        }

        .banner-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .mascot-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0;
            margin-left: -48px;
        }

        .mascot-img {
            width: 400px;
            height: auto;
            max-width: 100%;
            position: relative;
            z-index: 2;
            filter: drop-shadow(0 20px 40px rgba(0,0,0,0.3));
        }

        .mascot-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 1;
            animation: pulse 3s ease-in-out infinite;
        }

        .mascot-shadow {
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 30px;
            background: radial-gradient(ellipse at center, rgba(0,0,0,0.4) 60%, rgba(0,0,0,0) 100%);
            filter: blur(3px);
            z-index: 1;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: translate(-50%, -50%) scale(1); }
            50% { opacity: 0.6; transform: translate(-50%, -50%) scale(1.05); }
        }

        /* Main Content Section */
        .emc-section {
            background: #000;
            padding: 0 0 0 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            margin-top: -160px;
            margin-bottom: -200px;
        }

        .emc-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .emc-image {
            flex: 1;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            position: relative;
        }

        .emc-image .mascot-img {
            width: 450px;
            max-width: 100%;
            height: auto;
        }
        @media (max-width: 768px) {
            .emc-image .mascot-img {
                width: 180px;
            }
        }

        .emc-content {
            flex: 1;
            color: #fff;
            max-width: none;
            width: 100%;
            margin-left: 0;
        }

        .emc-content h2 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 20px;
            margin-top: 40px;
            background: linear-gradient(135deg, #475569, rgb(255, 255, 255), #475569);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .emc-desc {
            font-size: 2.8rem;
            font-weight: 400;
            margin-bottom: 30px;
            opacity: 0.9;
            max-width: 1400px;
            background: linear-gradient(90deg, #3b82f6, #a259ff, #ff2bc2, #ff6a3d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            display: block;
            text-align: center;
            line-height: 1.1;
            margin-left: auto;
            margin-right: auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .feature-card {
            background: #18181b;
            color: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #fff;
        }

        .feature-card p {
            font-size: 1rem;
            opacity: 0.7;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .banner-container,
            .emc-container {
                flex-direction: column;
                text-align: center;
                gap: 40px;
            }

            .banner-content h1 {
                font-size: 2.5rem;
            }

            .banner-content p {
                font-size: 1.1rem;
            }

            .emc-content h2 {
                font-size: 2.2rem;
            }

            .mascot-img {
                width: 300px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .emc-section {
                padding: 8px 0 24px 0;
                margin-top: -48px;
            }
        }

        @media (max-width: 480px) {
            .banner-container,
            .emc-container {
                padding: 0 15px;
            }

            .banner-content h1 {
                font-size: 2rem;
            }

            .emc-content h2 {
                font-size: 1.8rem;
            }

            .mascot-img {
                width: 250px;
            }
        }

        .landing-hero-img {
            position: relative;
            overflow: visible;
            /* Viền ngoài cùng nếu cần */
        }
        .landing-hero-square-bg {
            position: absolute;
            left: 55%;
            top: 65%;
            width: 400px;
            height: 300px;
            background: transparent;
            border: 2.5px solid rgba(255,255,255,0.25);
            border-radius: 58px;
            transform: translate(-50%, -50%);
            z-index: 0;
            pointer-events: none;
        }

        .btn {
            font-family: inherit;
            font-size: 1.1rem;
            font-weight: 600;
            color: #fff;
            background: transparent;
            border: 2.5px solid;
            border-radius: 32px;
            padding: 10px 28px;
            margin: 0 16px 0 0;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, border 0.2s, box-shadow 0.2s;
            outline: none;
            position: relative;
            z-index: 1;
            box-shadow: none;
            letter-spacing: 0.01em;
            border-image-slice: 1;
        }
        .btn-large {
            border-image: linear-gradient(90deg, #ff6a3d, #ff2bc2) 1;
        }
        .btn-small {
            border-image: linear-gradient(90deg, #a259ff, #ff6a3d) 1;
        }
        .btn:hover, .btn:focus {
            background: linear-gradient(90deg, #ff6a3d 0%, #a259ff 100%);
            color: #fff;
            border-image: none;
            border-color: #fff;
            box-shadow: 0 0 16px 0 #ff6a3d;
        }
        .container {
            display: flex;
            gap: 32px;
            justify-content: center;
            align-items: center;
            margin-top: 24px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            border-radius: 24px;
        }

        .promo-badge {
            background: linear-gradient(90deg, #FF6A3D 0%, #FF2019 100%);
            color: #fff;
            font-weight: 700;
            border-radius: 999px;
            padding: 10px 28px;
            font-size: 1.25rem;
            box-shadow: 0 4px 16px 0 #ff201955, 0 1.5px 0 #fff2 inset;
            display: inline-block;
            letter-spacing: 0.01em;
            border: none;
            text-shadow: 0 1.5px 4px #ff201955;
        }

        /* Thêm CSS cho SVG badge hoa mai */
        .promo-badge-svg {
            display: inline-block;
            vertical-align: middle;
            width: 110px;
            height: 110px;
            margin-left: 8px;
            margin-top: -35px;
            margin-bottom: 0;
        }
        .promo-badge-svg img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }
        .promo-badge-svg text {
            font-family: inherit;
            font-weight: bold;
            letter-spacing: 0.5px;
            alignment-baseline: middle;
        }
        .promo-badge { display: none !important; }

        /* --- DỊCH VỤ DOANH NGHIỆP --- */
        .business-packages {
            margin-top: 0 !important;
            margin-bottom: 0;
        }
        .tab-buttons { display: flex; justify-content: center; gap: 20px; margin-bottom: 40px; }
        .tab-btn { padding: 16px 48px; border: 2px solid #57298B; background: transparent; color: white; border-radius: 32px; cursor: pointer; font-size: 1.5rem; font-weight: 600; transition: all 0.3s ease; position: relative; overflow: hidden; }
        .tab-btn.active { background: linear-gradient(90deg, #57298B, #E54A2A); color: #fff; border: none; transform: scale(1.05); }
        .tab-btn:hover { background: rgba(255, 107, 107, 0.2); }
        .section-title {
            font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 700;
            font-style: italic;
            letter-spacing: 0.05em;
            font-size: 2.6rem;
            margin: 32px 0 16px 0;
            color: #fff;
            letter-spacing: 0.01em;
            background: none;
            text-shadow: 0 2px 8px #000a;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
            padding-left: 32px;
        }
        .search-box {
            position: relative;
            border-radius: 32px;
            padding: 2px;
            background: linear-gradient(90deg, #3b82f6, #a259ff, #ff2bc2, #ff6a3d);
            width: 100%;
            max-width: 360px;
            margin-left: auto;
            margin-right: 120px;
        }
        .search-inner {
            background: rgba(20, 20, 30, 0.7);
            border-radius: 30px;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            position: relative;
        }
        .search-input {
            border: none !important;
            background: transparent !important;
            border-radius: 30px;
            color: #fff;
            padding: 12px 48px 12px 20px;
            font-size: 1rem;
            width: 100%;
            outline: none;
            position: relative;
            z-index: 2;
        }
        .search-input::placeholder { color: rgba(255, 255, 255, 0.7); }
        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 32px;
            margin-bottom: 0;
            align-items: end;
        }
        .package-card {
            background: rgba(20, 20, 30, 0.7);
            border-radius: 56px !important;
            border: 3px solid #a259ff;
            box-shadow: 0 4px 32px 0 #57298b55;
            padding: 32px 28px 24px 28px;
            color: #fff;
            position: relative;
            overflow: hidden;
            min-width: 320px;
            max-width: 420px;
            margin: 16px auto;
            backdrop-filter: blur(12px);
            transition: box-shadow 0.3s, border-color 0.3s;
            position: relative;
            padding-bottom: 36px;
        }
        .package-card:hover {
            border: 3px solid transparent;
            border-radius: 56px !important;
            box-shadow: 0 0 0 3px #ff2bc2, 0 8px 48px 0 #e54a2a55;
        }
        .package-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px; }
        .package-title {
            font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            font-style: italic;
            color: #fff;
            line-height: 1.1;
            margin-bottom: 8px;
            margin-top: 0;
            text-align: left;
            display: block;
            text-shadow: 0 2px 8px #000a;
        }
        .promo-badge { display: none !important; }
        .package-price {
            font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2rem;
            font-weight: 700;
            font-style: italic;
            margin-bottom: 20px;
            margin-top: -4px;
            line-height: 1.1;
            background: linear-gradient(90deg, #57298B 0%, #E54A2A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            text-align: left;
            display: block;
        }
        .feature-list { list-style: none; margin-bottom: 20px; padding-left: 0; }
        .feature-item {
            font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 500;
            font-size: 1.25rem;
            color: #fff;
            line-height: 1.3;
            letter-spacing: 0;
            text-align: left;
            padding: 0;
            margin: 0 0 12px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .feature-icon {
            width: 44px;
            height: 44px;
            background: transparent; /* Đổi từ #fff sang transparent để không che SVG */
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #34C759;
            font-size: 2rem;
            box-shadow: 0 2px 8px #0001;
            border: none;
            padding: 0;
        }
        .order-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(90deg, #3b82f6, #a259ff, #ff2bc2, #ff6a3d);
            color: #fff;
            border: none;
            border-radius: 24px;
            padding: 8px 28px;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 18px auto 0 auto;
            box-shadow: 0 2px 8px #1de9b633;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
            width: fit-content;
            min-width: 140px;
        }
        .order-btn:before {
            content: "\f1d8";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            margin-right: 8px;
            font-size: 1.2rem;
            display: inline-block;
        }
        .order-btn:hover {
            background: linear-gradient(90deg, #3b82f6, #a259ff, #ff2bc2, #ff6a3d);
            transform: translateY(-2px) scale(1.04);
        }
        .tab-content { display: none; }
        .tab-content.active { display: block; animation: fadeIn 0.5s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .more-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 24px;
            border-radius: 32px;
            border: 3px solid #7B2FF2;
            background: transparent;
            font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            transition: box-shadow 0.2s, border-color 0.2s, background 0.2s, transform 0.2s;
            box-shadow: none;
            margin: 32px 0 0 0;
            position: relative;
            left: 0;
            transform: translateX(-120px);
            overflow: hidden;
        }
        .more-btn:hover {
            background: linear-gradient(90deg, #3b82f6, #a259ff, #ff2bc2, #ff6a3d);
            color: #fff;
            border-color: #fff;
        }
        .more-btn-text {
            font-family: inherit;
            font-size: inherit;
            font-weight: inherit;
            color: inherit;
        }
        .more-btn-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: rgba(80, 40, 180, 0.18);
            position: relative;
        }
        .more-btn-icon svg {
            width: 12px;
            height: 12px;
            display: block;
        }
        @media (max-width: 768px) {
            .tab-buttons { flex-direction: column; align-items: center; }
            .packages-grid { grid-template-columns: 1fr; }
            .search-input { max-width: 100%; }
            .package-card { min-width: unset; max-width: unset; margin: 16px 0; }
            .section-title { flex-direction: column; align-items: flex-start; gap: 16px; }
            .search-box { width: 100%; min-width: unset; }
        }
        .mascot-bg-svg {
            position: absolute;
            left: 0;
            bottom: 0;
            transform: translateX(-35%);
            width: 900px;
            height: 950px;
            z-index: 0;
            pointer-events: none;
            background: url('data:image/svg+xml;utf8,<svg width="1181" height="1249" viewBox="0 0 1181 1249" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_1011_520" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="1180" height="1249"><rect x="-0.389567" y="0.761572" width="908.873" height="1016.09" transform="matrix(-0.9517 0.30703 0.307978 0.951393 865.628 1.02101)" fill="url(%23paint0_linear_1011_520)" stroke="url(%23paint1_linear_1011_520)" stroke-width="1.21036"/></mask><g mask="url(%23mask0_1011_520)"><path d="M206.846 950.537C255.821 1232.15 492.789 1372.13 736.082 1263.16C761.599 1251.74 786.262 1237.98 809.798 1222.26C595.068 1274.06 400.669 1135.5 356.821 883.368C312.973 631.238 434.584 351.261 634.976 217.021C609.769 223.131 584.232 231.862 558.716 243.29C315.422 352.254 174.534 661.462 223.51 943.074Z" fill="url(%23paint2_linear_1011_520)" stroke="url(%23paint3_linear_1011_520)" stroke-width="1.89058" stroke-miterlimit="10"/><g filter="url(%23filter0_f_1011_520)"><path d="M223.51 943.074C272.485 1224.69 492.789 1372.13 736.082 1263.16C761.599 1251.74 786.262 1237.98 809.798 1222.26C595.068 1274.06 384.005 1142.96 340.157 890.831C296.309 638.701 434.584 351.261 634.976 217.021C609.769 223.131 584.232 231.862 558.716 243.29C315.422 352.254 174.534 661.462 223.51 943.074Z" fill="url(%23paint4_linear_1011_520)"/><path d="M223.51 943.074C272.485 1224.69 492.789 1372.13 736.082 1263.16C761.599 1251.74 786.262 1237.98 809.798 1222.26C595.068 1274.06 384.005 1142.96 340.157 890.831C296.309 638.701 434.584 351.261 634.976 217.021C609.769 223.131 584.232 231.862 558.716 243.29C315.422 352.254 174.534 661.462 223.51 943.074Z" stroke="url(%23paint5_linear_1011_520)" stroke-width="1.89058" stroke-miterlimit="10"/></g></g><defs><linearGradient id="paint0_linear_1011_520" x1="455.042" y1="0" x2="455.042" y2="1017.3" gradientUnits="userSpaceOnUse"><stop stop-color="%23C4C4C4" stop-opacity="0"/><stop offset="0.380208" stop-color="%23C4C4C4"/><stop offset="0.578125" stop-color="%23C4C4C4"/><stop offset="1" stop-color="%23C4C4C4" stop-opacity="0"/></linearGradient><linearGradient id="paint1_linear_1011_520" x1="455.042" y1="0" x2="455.042" y2="1017.3" gradientUnits="userSpaceOnUse"><stop stop-color="%23EE6067"/><stop offset="0.989583" stop-color="%231D24A2"/></linearGradient><linearGradient id="paint2_linear_1011_520" x1="375.933" y1="325.153" x2="786.022" y2="1240.8" gradientUnits="userSpaceOnUse"><stop stop-color="%237765FF"/><stop offset="1" stop-color="%23FF229F"/></linearGradient><linearGradient id="paint3_linear_1011_520" x1="375.933" y1="325.153" x2="786.022" y2="1240.8" gradientUnits="userSpaceOnUse"><stop stop-color="%23EE6067"/><stop offset="0.989583" stop-color="%231D24A2"/></linearGradient><linearGradient id="paint4_linear_1011_520" x1="384.265" y1="321.421" x2="794.354" y2="1237.07" gradientUnits="userSpaceOnUse"><stop stop-color="%237765FF"/><stop offset="1" stop-color="%23FF229F"/></linearGradient><linearGradient id="paint5_linear_1011_520" x1="384.265" y1="321.421" x2="794.354" y2="1237.07" gradientUnits="userSpaceOnUse"><stop stop-color="%23EE6067"/><stop offset="0.989583" stop-color="%231D24A2"/></linearGradient><filter id="filter0_f_1011_520" x="198.438" y="200.351" width="630.673" height="1114.35" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="7.26216" result="effect1_foregroundBlur_1011_520"/></filter></defs></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: left bottom;
        }
        .wave-center-bg {
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          z-index: 0;
          width: 600px;
          height: auto;
          pointer-events: none;
          opacity: 1;
        }
        .wave-gradient-overlay {
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          z-index: 1;
          width: 600px;
          height: 600px;
          pointer-events: none;
          background: linear-gradient(120deg, #EC010D 0%, #1D24A2 100%);
          opacity: 0.05;
          mix-blend-mode: multiply;
          border-radius: 50%;
        }
        .contact-svg-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0; /* Nằm dưới nội dung */
            pointer-events: none;
            overflow: hidden;
        }
        .banner-container, .banner-content, .landing-hero-img {
            position: relative;
            z-index: 1;
        }
        .contact-svg-bg svg {
            width: 95vw;
            height: auto;
            max-width: 100%;
            max-height: 80vh;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) rotate(-50deg);
        }
    </style>

<section class="emc-section" style="margin-top: 270px;">
    <div class="emc-container">
        <div class="emc-image">
            <div class="mascot-container">
                <div class="mascot-glow"></div>
                <img src="assets/images/robotCamLap.png" alt="Mascot Robot 2" class="mascot-img" />
                <div class="mascot-shadow"></div>
                <div class="mascot-bg-svg"></div>
            </div>
        </div>
        <div class="emc-content">
            <h2>Cùng EMC Group</h2>
            <p class="emc-desc">Trải nghiệm các giải pháp trí tuệ nhân tạo với vô vàn ưu đãi hấp dẫn phù hợp với.</p>
            <div class="features-grid">
                <div class="container">
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION DỊCH VỤ DOANH NGHIỆP BẮT ĐẦU -->
<section class="business-packages">
    <div class="header">
        <div class="tab-buttons">
            <button class="tab-btn active" onclick="switchTab('large', event)">Doanh nghiệp lớn</button>
            <button class="tab-btn" onclick="switchTab('small', event)">Doanh nghiệp nhỏ</button>
        </div>
    </div>
    <!-- Large Business Tab -->
    <div id="large-business" class="tab-content active">
        <div class="section-title">
            Combo hot tháng này
            <div class="search-box">
                <div class="search-inner">
                    <input type="text" class="search-input" placeholder="Tìm combo bạn cần...">
                    <span style="position: absolute; right: 32px; top: 50%; transform: translateY(-50%); pointer-events: none; z-index: 10;">
                      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="15" cy="15" r="12" stroke="url(#search-gradient)" stroke-width="2.5" fill="none"/>
                        <line x1="23.5" y1="23.5" x2="30" y2="30" stroke="url(#search-gradient)" stroke-width="2.5" stroke-linecap="round"/>
                        <defs>
                          <linearGradient id="search-gradient" x1="0" y1="0" x2="32" y2="32" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#ffb6b9"/>
                            <stop offset="0.5" stop-color="#a259ff"/>
                            <stop offset="1" stop-color="#3b82f6"/>
                          </linearGradient>
                        </defs>
                      </svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="packages-grid">
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">Thiết kế Website<br>Cơ Bản</div>
                    <span class="promo-badge-svg">
                        <img src="assets/images/khuyenmai.png" alt="Khuyến Mãi" />
                    </span>
                </div>
                <div class="package-price">Chỉ từ 3.000.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.997559" y="0.5" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9955 12.7026C17.1071 8.43892 23.7909 8.48426 27.9276 12.7801C32.0661 17.0778 32.1081 24.0228 27.9969 28.2921C23.8857 32.5614 17.198 32.5179 13.0594 28.2201C10.6069 25.6733 9.59418 22.1988 10.0291 18.904C10.09 18.4423 10.4998 18.1194 10.9444 18.1826C11.389 18.2459 11.7 18.6715 11.639 19.1332C11.2707 21.9235 12.1279 24.8662 14.2085 27.0269C17.7233 30.6769 23.3821 30.6978 26.8478 27.0989C30.3135 23.4999 30.2934 17.6234 26.7786 13.9734C23.2655 10.3252 17.6107 10.3024 14.1445 13.8959L14.9545 13.9001C15.4033 13.9025 15.7652 14.2821 15.7629 14.7481C15.7607 15.2141 15.3951 15.5899 14.9464 15.5876L12.1887 15.5732C11.7431 15.5709 11.3825 15.1964 11.3803 14.7337L11.3664 11.87C11.3642 11.404 11.7261 11.0243 12.1748 11.022C12.6235 11.0196 12.9891 11.3955 12.9914 11.8615L12.9955 12.7026ZM20.4934 15.1563C20.9422 15.1563 21.3059 15.534 21.3059 16V20.1505L23.7763 22.7159C24.0936 23.0454 24.0936 23.5796 23.7763 23.9092C23.459 24.2387 22.9445 24.2387 22.6272 23.9092L19.6809 20.8495V16C19.6809 15.534 20.0447 15.1563 20.4934 15.1563Z" fill="url(#paint0_linear_953_9460)"/>
                            <defs>
                                <linearGradient id="paint0_linear_953_9460" x1="20.4935" y1="9.53137" x2="20.4935" y2="31.4689" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#573592"/>
                                    <stop offset="1" stop-color="#EE6067"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </span><span>Theo yêu cầu</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Thiết kế UX - UI</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Tặng Domain và hosting</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Điều chỉnh Giao diện/Chức năng theo yêu cầu</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Tùy chọn chụp hình/Thiết kế/Edit video/Bài đăng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Phân tích hiệu quả triển khai</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">Social Marketing<br>Cơ Bản</div>
                    <span class="promo-badge-svg">
                        <img src="assets/images/khuyenmai.png" alt="Khuyến Mãi" />
                    </span>
                </div>
                <div class="package-price">Chỉ từ 678.000đ/tháng</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.997559" y="0.5" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9955 12.7026C17.1071 8.43892 23.7909 8.48426 27.9276 12.7801C32.0661 17.0778 32.1081 24.0228 27.9969 28.2921C23.8857 32.5614 17.198 32.5179 13.0594 28.2201C10.6069 25.6733 9.59418 22.1988 10.0291 18.904C10.09 18.4423 10.4998 18.1194 10.9444 18.1826C11.389 18.2459 11.7 18.6715 11.639 19.1332C11.2707 21.9235 12.1279 24.8662 14.2085 27.0269C17.7233 30.6769 23.3821 30.6978 26.8478 27.0989C30.3135 23.4999 30.2934 17.6234 26.7786 13.9734C23.2655 10.3252 17.6107 10.3024 14.1445 13.8959L14.9545 13.9001C15.4033 13.9025 15.7652 14.2821 15.7629 14.7481C15.7607 15.2141 15.3951 15.5899 14.9464 15.5876L12.1887 15.5732C11.7431 15.5709 11.3825 15.1964 11.3803 14.7337L11.3664 11.87C11.3642 11.404 11.7261 11.0243 12.1748 11.022C12.6235 11.0196 12.9891 11.3955 12.9914 11.8615L12.9955 12.7026ZM20.4934 15.1563C20.9422 15.1563 21.3059 15.534 21.3059 16V20.1505L23.7763 22.7159C24.0936 23.0454 24.0936 23.5796 23.7763 23.9092C23.459 24.2387 22.9445 24.2387 22.6272 23.9092L19.6809 20.8495V16C19.6809 15.534 20.0447 15.1563 20.4934 15.1563Z" fill="url(#paint0_linear_953_9460)"/>
                            <defs>
                                <linearGradient id="paint0_linear_953_9460" x1="20.4935" y1="9.53137" x2="20.4935" y2="31.4689" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#573592"/>
                                    <stop offset="1" stop-color="#EE6067"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </span><span>Theo chiến lược</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Hỗ trợ lên kế hoạch nội dung</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Quản lý chiến dịch quảng cáo</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Tùy chọn chụp hình/Thiết kế/Edit video/Bài đăng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Phân tích hiệu quả triển khai</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
        </div>
        <div class="section-title">
            Ưu đãi dài hạn
            <a class="more-btn" href="#">
              <span class="more-btn-text">Xem thêm</span>
              <span class="more-btn-icon">
                <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 9H12" stroke="#7B2FF2" stroke-width="2" stroke-linecap="round"/>
                  <path d="M10 7L12 9L10 11" stroke="#7B2FF2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
            </a>
        </div>
        <div class="packages-grid">
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">GÓI SEEDING PRO</div>
                </div>
                <div class="package-price">Chỉ từ 10.000.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding liên tục 3 tháng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>1000+ comment tích cực</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Báo cáo chi tiết hàng tháng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Hỗ trợ xử lý khủng hoảng truyền thông</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">Video Content Premium</div>
                </div>
                <div class="package-price">Chỉ từ 5.000.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>10 video chuyên nghiệp/tháng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Quay dựng tại studio</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Biên tập nội dung sáng tạo</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Hỗ trợ quảng bá đa nền tảng</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
        </div>
        <div class="section-title">
            Ưu đãi ngắn hạn
            <a class="more-btn" href="#">
              <span class="more-btn-text">Xem thêm</span>
              <span class="more-btn-icon">
                <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 9H12" stroke="#7B2FF2" stroke-width="2" stroke-linecap="round"/>
                  <path d="M10 7L12 9L10 11" stroke="#7B2FF2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
            </a>
        </div>
        <div class="packages-grid">
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">GÓI SEEDING MINI</div>
                </div>
                <div class="package-price">Chỉ từ 4.000.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding dạng Post - Group</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding dạng CMT - Group</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding dạng Post - Diễn đàn</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding dạng CMT - Youtube/Tiktok</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">SX Video cho Doanh nghiệp</div>
                </div>
                <div class="package-price">Chỉ từ 2.000.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Kịch bản, Diễn viên, Studio</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Edit video, Resize</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Đăng đồng bộ đa kênh</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Cam kết view 5k - 10k view</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Small Business Tab -->
    <div id="small-business" class="tab-content">
        <div class="section-title">
            Combo hot tháng này
            <div class="search-box">
                <div class="search-inner">
                    <input type="text" class="search-input" placeholder="Tìm combo bạn cần...">
                    <span style="position: absolute; right: 18px; top: 50%; transform: translateY(-50%); pointer-events: none;">
                      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="15" cy="15" r="12" stroke="url(#search-gradient)" stroke-width="2.5" fill="none"/>
                        <line x1="23.5" y1="23.5" x2="30" y2="30" stroke="url(#search-gradient)" stroke-width="2.5" stroke-linecap="round"/>
                        <defs>
                          <linearGradient id="search-gradient" x1="0" y1="0" x2="32" y2="32" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#ffb6b9"/>
                            <stop offset="0.5" stop-color="#a259ff"/>
                            <stop offset="1" stop-color="#3b82f6"/>
                          </linearGradient>
                        </defs>
                      </svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="packages-grid">
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">Website Cơ Bản<br>Doanh nghiệp nhỏ</div>
                    <span class="promo-badge-svg">
                        <img src="assets/images/khuyenmai.png" alt="Khuyến Mãi" />
                    </span>
                </div>
                <div class="package-price">Chỉ từ 1.500.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.997559" y="0.5" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9955 12.7026C17.1071 8.43892 23.7909 8.48426 27.9276 12.7801C32.0661 17.0778 32.1081 24.0228 27.9969 28.2921C23.8857 32.5614 17.198 32.5179 13.0594 28.2201C10.6069 25.6733 9.59418 22.1988 10.0291 18.904C10.09 18.4423 10.4998 18.1194 10.9444 18.1826C11.389 18.2459 11.7 18.6715 11.639 19.1332C11.2707 21.9235 12.1279 24.8662 14.2085 27.0269C17.7233 30.6769 23.3821 30.6978 26.8478 27.0989C30.3135 23.4999 30.2934 17.6234 26.7786 13.9734C23.2655 10.3252 17.6107 10.3024 14.1445 13.8959L14.9545 13.9001C15.4033 13.9025 15.7652 14.2821 15.7629 14.7481C15.7607 15.2141 15.3951 15.5899 14.9464 15.5876L12.1887 15.5732C11.7431 15.5709 11.3825 15.1964 11.3803 14.7337L11.3664 11.87C11.3642 11.404 11.7261 11.0243 12.1748 11.022C12.6235 11.0196 12.9891 11.3955 12.9914 11.8615L12.9955 12.7026ZM20.4934 15.1563C20.9422 15.1563 21.3059 15.534 21.3059 16V20.1505L23.7763 22.7159C24.0936 23.0454 24.0936 23.5796 23.7763 23.9092C23.459 24.2387 22.9445 24.2387 22.6272 23.9092L19.6809 20.8495V16C19.6809 15.534 20.0447 15.1563 20.4934 15.1563Z" fill="url(#paint0_linear_953_9460)"/>
                            <defs>
                                <linearGradient id="paint0_linear_953_9460" x1="20.4935" y1="9.53137" x2="20.4935" y2="31.4689" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#573592"/>
                                    <stop offset="1" stop-color="#EE6067"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </span><span>Template có sẵn</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Responsive mobile</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Tặng Domain 1 năm</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Hosting 6 tháng miễn phí</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Hỗ trợ kỹ thuật 3 tháng</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">Social Marketing<br>Startup</div>
                    <span class="promo-badge-svg">
                        <img src="assets/images/khuyenmai.png" alt="Khuyến Mãi" />
                    </span>
                </div>
                <div class="package-price">Chỉ từ 299.000đ/tháng</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.997559" y="0.5" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9955 12.7026C17.1071 8.43892 23.7909 8.48426 27.9276 12.7801C32.0661 17.0778 32.1081 24.0228 27.9969 28.2921C23.8857 32.5614 17.198 32.5179 13.0594 28.2201C10.6069 25.6733 9.59418 22.1988 10.0291 18.904C10.09 18.4423 10.4998 18.1194 10.9444 18.1826C11.389 18.2459 11.7 18.6715 11.639 19.1332C11.2707 21.9235 12.1279 24.8662 14.2085 27.0269C17.7233 30.6769 23.3821 30.6978 26.8478 27.0989C30.3135 23.4999 30.2934 17.6234 26.7786 13.9734C23.2655 10.3252 17.6107 10.3024 14.1445 13.8959L14.9545 13.9001C15.4033 13.9025 15.7652 14.2821 15.7629 14.7481C15.7607 15.2141 15.3951 15.5899 14.9464 15.5876L12.1887 15.5732C11.7431 15.5709 11.3825 15.1964 11.3803 14.7337L11.3664 11.87C11.3642 11.404 11.7261 11.0243 12.1748 11.022C12.6235 11.0196 12.9891 11.3955 12.9914 11.8615L12.9955 12.7026ZM20.4934 15.1563C20.9422 15.1563 21.3059 15.534 21.3059 16V20.1505L23.7763 22.7159C24.0936 23.0454 24.0936 23.5796 23.7763 23.9092C23.459 24.2387 22.9445 24.2387 22.6272 23.9092L19.6809 20.8495V16C19.6809 15.534 20.0447 15.1563 20.4934 15.1563Z" fill="url(#paint0_linear_953_9460)"/>
                            <defs>
                                <linearGradient id="paint0_linear_953_9460" x1="20.4935" y1="9.53137" x2="20.4935" y2="31.4689" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#573592"/>
                                    <stop offset="1" stop-color="#EE6067"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </span><span>15 bài đăng/tháng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Thiết kế poster cơ bản</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Quản lý 2 kênh social</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Tương tác khách hàng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Báo cáo kết quả hàng tháng</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
        </div>
        <div class="section-title">
            Ưu đãi dài hạn
            <a class="more-btn" href="#">
              <span class="more-btn-text">Xem thêm</span>
              <span class="more-btn-icon">
                <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 9H12" stroke="#7B2FF2" stroke-width="2" stroke-linecap="round"/>
                  <path d="M10 7L12 9L10 11" stroke="#7B2FF2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
            </a>
        </div>
        <div class="packages-grid">
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">GÓI SEEDING PRO</div>
                </div>
                <div class="package-price">Chỉ từ 10.000.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding liên tục 3 tháng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>1000+ comment tích cực</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Báo cáo chi tiết hàng tháng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Hỗ trợ xử lý khủng hoảng truyền thông</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">Video Content Premium</div>
                </div>
                <div class="package-price">Chỉ từ 5.000.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>10 video chuyên nghiệp/tháng</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Quay dựng tại studio</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Biên tập nội dung sáng tạo</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Hỗ trợ quảng bá đa nền tảng</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
        </div>
        <div class="section-title">
            Ưu đãi ngắn hạn
            <a class="more-btn" href="#">
              <span class="more-btn-text">Xem thêm</span>
              <span class="more-btn-icon">
                <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 9H12" stroke="#7B2FF2" stroke-width="2" stroke-linecap="round"/>
                  <path d="M10 7L12 9L10 11" stroke="#7B2FF2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
            </a>
        </div>
        <div class="packages-grid">
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">GÓI SEEDING MINI</div>
                </div>
                <div class="package-price">Chỉ từ 4.000.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding dạng Post - Group</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding dạng CMT - Group</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding dạng Post - Diễn đàn</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Seeding dạng CMT - Youtube/Tiktok</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
            </div>
            <div class="package-card">
                <div class="package-header">
                    <div class="package-title">SX Video cho Doanh nghiệp</div>
                </div>
                <div class="package-price">Chỉ từ 2.000.000đ</div>
                <ul class="feature-list">
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Kịch bản, Diễn viên, Studio</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Edit video, Resize</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Đăng đồng bộ đa kênh</span></li>
                    <li class="feature-item"><span class="feature-icon">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.998047" y="1" width="39" height="39" rx="9.5" fill="white" fill-opacity="0.9" stroke="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1559 14.5909C29.5719 14.9087 29.6148 15.4614 29.2515 15.8255L18.7754 26.3255C18.5854 26.5158 18.3108 26.625 18.022 26.625C17.7333 26.625 17.4586 26.5158 17.2687 26.3255L13.0782 22.1255C12.715 21.7614 12.7579 21.2087 13.1739 20.8909C13.5899 20.573 14.2217 20.6105 14.5849 20.9746L18.022 24.4195L27.7449 14.6746C28.1081 14.3105 28.7398 14.273 29.1559 14.5909Z" fill="#3EA256" stroke="#3EA256" stroke-linecap="round"/>
                        </svg>
                    </span><span>Cam kết view 5k - 10k view</span></li>
                </ul>
                <div style="width:100%; display:flex; justify-content:center; margin-top:32px;">
                  <div class="btn-gradient-border">
                    <button class="gradient-btn-index">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 12L21 3L12 21L11 13L3 12Z" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Tư vấn ngay
                    </button>
                  </div>
                </div>
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
</section>
<style>
/* --- DỊCH VỤ DOANH NGHIỆP --- */
.business-packages {
    margin-top: 0 !important;
    margin-bottom: 0;
}
.tab-buttons { display: flex; justify-content: center; gap: 20px; margin-bottom: 40px; }
.tab-btn { padding: 16px 48px; border: 2px solid #57298B; background: transparent; color: white; border-radius: 32px; cursor: pointer; font-size: 1.5rem; font-weight: 600; transition: all 0.3s ease; position: relative; overflow: hidden; }
.tab-btn.active { background: linear-gradient(90deg, #57298B, #E54A2A); color: #fff; border: none; transform: scale(1.05); }
.tab-btn:hover { background: rgba(255, 107, 107, 0.2); }
.section-title {
    font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 700;
    font-style: italic;
    letter-spacing: 0.05em;
    font-size: 2.6rem;
    margin: 32px 0 16px 0;
    color: #fff;
    letter-spacing: 0.01em;
    background: none;
    text-shadow: 0 2px 8px #000a;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    flex-wrap: wrap;
    padding-left: 120px;
}
.search-box { position: relative; margin-bottom: 0; min-width: 320px; margin-left: 24px; }
.search-input { width: 100%; max-width: 400px; padding: 12px 20px; border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 25px; background: rgba(255, 255, 255, 0.1); color: white; font-size: 1rem; backdrop-filter: blur(10px); }
.search-input::placeholder { color: rgba(255, 255, 255, 0.7); }
.packages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    gap: 32px;
    margin-bottom: 0;
    align-items: end;
}
.package-card {
    background: rgba(20, 20, 30, 0.7);
    border-radius: 56px !important;
    border: 3px solid #a259ff;
    box-shadow: 0 4px 32px 0 #57298b55;
    padding: 32px 28px 24px 28px;
    color: #fff;
    position: relative;
    overflow: hidden;
    min-width: 320px;
    max-width: 420px;
    margin: 16px auto;
    backdrop-filter: blur(12px);
    transition: box-shadow 0.3s, border-color 0.3s;
    position: relative;
    padding-bottom: 36px;
}
.package-card:hover {
    border: 3px solid transparent;
    border-radius: 56px !important;
    box-shadow: 0 0 0 3px linear-gradient(120deg, #E54A2A, #57298B), 0 8px 48px 0 #e54a2a55;
}
.package-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px; }
.package-title {
    font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 2.2rem;
    font-weight: 700;
    font-style: italic;
    color: #fff;
    line-height: 1.1;
    margin-bottom: 8px;
    margin-top: 0;
    text-align: left;
    display: block;
    text-shadow: 0 2px 8px #000a;
}
.promo-badge { display: none !important; }
.package-price {
    font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 2rem;
    font-weight: 700;
    font-style: italic;
    margin-bottom: 20px;
    margin-top: -4px;
    line-height: 1.1;
    background: linear-gradient(90deg, #57298B 0%, #E54A2A 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
    text-align: left;
    display: block;
}
.feature-list { list-style: none; margin-bottom: 20px; padding-left: 0; }
.feature-item {
    font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 500;
    font-size: 1.25rem;
    color: #fff;
    line-height: 1.3;
    letter-spacing: 0;
    text-align: left;
    padding: 0;
    margin: 0 0 12px 0;
    display: flex;
    align-items: center;
    gap: 12px;
}
.feature-icon {
    width: 44px;
    height: 44px;
    background: #fff;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #34C759;
    font-size: 2rem;
    box-shadow: 0 2px 8px #0001;
    border: none;
    padding: 0;
}
.order-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(90deg, #3b82f6, #a259ff, #ff2bc2, #ff6a3d);
    color: #fff;
    border: none;
    border-radius: 24px;
    padding: 8px 28px;
    font-size: 1.1rem;
    font-weight: 600;
    margin: 18px auto 0 auto;
    box-shadow: 0 2px 8px #1de9b633;
    cursor: pointer;
    transition: background 0.2s, transform 0.2s;
    width: fit-content;
    min-width: 140px;
}
.order-btn:before {
    content: "\f1d8";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 8px;
    font-size: 1.2rem;
    display: inline-block;
}
.order-btn:hover {
    background: linear-gradient(90deg, #1dc8e9, #1de9b6);
    transform: translateY(-2px) scale(1.04);
}
.tab-content { display: none; }
.tab-content.active { display: block; animation: fadeIn 0.5s ease-in-out; }
@keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
.more-btn { display: inline-flex; align-items: center; gap: 8px; padding: 8px 24px; border-radius: 32px; border: 3px solid #7B2FF2; background: transparent; font-family: 'Afacad', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 1.2rem; font-weight: 700; color: #fff; text-decoration: none; transition: box-shadow 0.2s, border-color 0.2s, background 0.2s, transform 0.2s; box-shadow: none; margin: 32px 0 0 0; position: relative; left: 0; transform: translateX(-120px); overflow: hidden; }
.more-btn:hover { background: #7B2FF2; color: #fff; border-color: #fff; }
.more-btn-text { font-family: inherit; font-size: inherit; font-weight: inherit; color: inherit; }
.more-btn-icon { display: flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 50%; background: rgba(80, 40, 180, 0.18); position: relative; }
.more-btn-icon svg { width: 12px; height: 12px; display: block; }
@media (max-width: 768px) {
    .tab-buttons { flex-direction: column; align-items: center; }
    .packages-grid { grid-template-columns: 1fr; }
    .search-input { max-width: 100%; }
    .package-card { min-width: unset; max-width: unset; margin: 16px 0; }
    .section-title { flex-direction: column; align-items: flex-start; gap: 16px; }
    .search-box { width: 100%; min-width: unset; }
}
.wave-center-bg {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 0;
  width: 600px;
  height: auto;
  pointer-events: none;
  opacity: 0.4;
}
.wave-gradient-overlay {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: 1;
  width: 600px;
  height: 600px;
  pointer-events: none;
  background: linear-gradient(120deg, #ffb6b9 0%, #a259ff 100%);
  opacity: 0.25;
  mix-blend-mode: multiply;
  border-radius: 50%;
}
.gradient-btn-index {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 28px;
  font-size: 1.1rem;
  font-weight: 600;
  color: #fff;
  background: #111;
  border: 2.5px solid;
  border-radius: 32px;
  border-image: linear-gradient(90deg, #7B2FF2, #F357A8, #FF6A3D) 1;
  box-shadow: 0 0 16px 0 #a259ff33;
  cursor: pointer;
  margin: 24px auto 0 auto;
  transition: background 0.2s, color 0.2s, border 0.2s, box-shadow 0.2s;
  outline: none;
}
.gradient-btn-index svg {
  display: inline-block;
  vertical-align: middle;
}
.gradient-btn-index:hover, .gradient-btn-index:focus {
  background: linear-gradient(90deg, #7B2FF2 0%, #F357A8 50%, #FF6A3D 100%);
  color: #fff;
  border-image: none;
  border-color: #fff;
  box-shadow: 0 0 16px 0 #ff6a3d;
}
.group-47227 {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 24px;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  margin: -330px;
  width: 100%;
  padding-left: 780px;
}
.gradient-btn-index {
  margin: 0;
}
</style>
<script>
function switchTab(tabType, event) {
    document.querySelectorAll('.tab-btn').forEach(btn => { btn.classList.remove('active'); });
    document.querySelectorAll('.tab-content').forEach(content => { content.classList.remove('active'); });
    event.target.classList.add('active');
    if (tabType === 'large') {
        document.getElementById('large-business').classList.add('active');
    } else {
        document.getElementById('small-business').classList.add('active');
    }
}
document.querySelectorAll('.order-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        this.style.transform = 'scale(0.95)';
        setTimeout(() => { this.style.transform = 'scale(1)'; }, 150);
    });
});
document.querySelectorAll('.search-input').forEach(input => {
    input.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const cards = this.closest('.tab-content').querySelectorAll('.package-card');
        cards.forEach(card => {
            const title = card.querySelector('.package-title').textContent.toLowerCase();
            const features = Array.from(card.querySelectorAll('.feature-item')).map(item => item.textContent.toLowerCase()).join(' ');
            if (title.includes(searchTerm) || features.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>
<!-- SECTION DỊCH VỤ DOANH NGHIỆP KẾT THÚC -->
<style>
.gradient-btn-index2 { display: none !important; }
</style>
<style>
.gradient-btn-index,
.gradient-btn-index:hover,
.gradient-btn-index:focus {
  border-radius: 40px !important;
  overflow: hidden;
  box-sizing: border-box;
}
</style>
<style>
.btn-gradient-border {
  display: inline-block;
  padding: 2.5px;
  border-radius: 40px;
  background: linear-gradient(90deg, #7B2FF2, #F357A8, #FF6A3D);
}
.gradient-btn-index,
.gradient-btn-index:hover,
.gradient-btn-index:focus {
  border: none;
  background: #111;
  color: #fff;
  border-radius: 40px !important;
  box-sizing: border-box;
  overflow: hidden;
  padding: 10px 28px;
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
}
</style>