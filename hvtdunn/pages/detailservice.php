<link rel="stylesheet" href="assets/css/detailservice.css">
<div class="background-waves">
    <div class="wave"></div>
    <div class="wave"></div>
</div>

<!-- SECTION 1: Tiêu đề -->
<section class="detailservice-section section-header">
    
    <div class="container">
        <h1>Chọn <span>Gói</span><br>
         Dịch Vụ Phù Hợp Với Bạn</h1>
    </div>
    <p>Hãy lựa chọn gói dịch vụ phù hợp với mục tiêu và ngân sách của bạn. Hiệu quả được đảm bảo, sự hài lòng được đảm bảo!</p>
</section>

<!-- SECTION 2: Tabs chuyển tháng/năm -->
<section class="detailservice-section section-tabs">
    <div class="container">
        <div class="detailservice-tabs">
            <button class="tab active" onclick="switchTab(event, 'monthly')">Theo tháng</button>
            <button class="tab" onclick="switchTab(event, 'yearly')">Theo năm</button>
        </div>
    </div>
</section>
<div class="abstract-shape shape-2"></div>

<!-- SECTION 3: Gói dịch vụ -->
<section class="detailservice-section section-packages">
    <div class="container">
        <div class="detailservice-cards">
            <!-- Card 1 -->
            <div class="card">
                <h3>Khởi Đầu</h3>
                <p>Phù hợp với cá nhân hoặc doanh nghiệp mới.</p>
                <div class="price">200.000</div>
                <div class="price-note">VND</div>
                <ul class="features">
                    <li>Lên kế hoạch nội dung cơ bản</li>
                    <li>Đăng bài & tương tác cơ bản</li>
                    <li>Quản lý tối đa 1 nền tảng</li>
                    <li>Thiết kế hình ảnh theo mẫu</li>
                    <li>Báo cáo hiệu quả mỗi tháng</li>
                </ul>
                <button class="btn btn-secondary" onclick="selectPackage(event, 'starter')">Đăng Ký</button>
            </div>

            <!-- Card 2 -->
            <div class="card"> 
                <h3>Tăng Tốc</h3>
                <p>Phù hợp với doanh nghiệp nhỏ & vừa</p>
                <div class="price">1.000.000</div>
                <div class="price-note">Tiết kiệm đến 30%</div>
                <ul class="features">
                    <li>Chiến lược theo tuần</li>
                    <li>Quản lý 2-3 nền tảng</li>
                    <li>Thiết kế chuyên nghiệp</li>
                    <li>Theo dõi, tối ưu nội dung</li>
                    <li>Báo cáo 2 tuần/lần</li>
                </ul>
                <button class="btn btn-secondary" onclick="selectPackage(event, 'growth')">Đăng Ký</button>
            </div>

            <!-- Card 3 -->
            <div class="card">
                <h3>Bứt Phá</h3>
                <p>Dành cho thương hiệu muốn bứt phá mạnh mẽ</p>
                <div class="price">2.000.000</div>
                <div class="price-note">VND</div>
                <ul class="features">
                    <li>Lên chiến lược và chiến dịch</li>
                    <li>Theo dõi xử lý khủng hoảng</li>
                    <li>Quản lý đa nền tảng</li>
                    <li>Thiết kế hình ảnh & video</li>
                    <li>Seeding, mini game, KOLs</li>
                </ul>
                <button class="btn btn-secondary" onclick="selectPackage(event, 'premium')">Đăng Ký</button>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/detailservice.js"></script>
