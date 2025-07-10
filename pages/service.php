<link rel="stylesheet" href="assets/css/service.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
<div class="abstract-shape shape-1"></div>
<section class="experience-section">
<div class="bg-effect"></div>
<div class="abstract-shape shape-2"></div>
<div class="experience-text">
    <h1>EMC GROUP</h1>
    <h2>Trang dịch vụ - giải pháp toàn diện cho doanh nghiệp</h2>
    <p>
      Chúng tôi là EMCGroup, một công ty công nghệ chuyên cung cấp các giải pháp trí tuệ nhân tạo (AI) tiên tiến,
      giúp doanh nghiệp và tổ chức tối ưu hóa quy trình, nâng cao hiệu suất và tạo ra giá trị bền vững.
    </p>
  </div>
</section>

    


<?php
include_once("controller/getservice.php");
$p = new Gservice();

$category = isset($_GET['category']) ? intval($_GET['category']) : 0;

if ($category > 0) {
  $services = $p->getdichvubydanhmuc($category);
} else {
  $services = $p->getalldichvu();
}

$all_services = [];

if ($services && $services != false) {
  while ($row = $services->fetch_assoc()) {
    $slug = strtolower(str_replace(' ', '-', $row['ten_danhmucdichvu'])); // tạo slug để gán data-category
    $all_services[] = [
      'title' => $row['tendichvu'],
      'desc' => $row['mota'],
      'icon' => $row['icon'] ?? 'seo',
      'id' => $row['id_dichvu'],
      'category' => $slug
    ];
  }
}
?>


<!-- <div class="abstract-shape shape-3"></div> -->
<section class="services-by-category-section">
  <div class="section-header">
    <h2>Các dịch vụ của chúng tôi</h2>
    <p>Khám phá các giải pháp chuyên biệt và phù hợp với doanh nghiệp của bạn</p>
  </div>

 <div class="filter-bar">
  <button class="category-button" data-category="0" onclick="filterByCategory(0)">Tất cả</button>
  <button class="category-button" data-category="3" onclick="filterByCategory(3)">Media</button>
  <button class="category-button" data-category="2" onclick="filterByCategory(2)">Marketing</button>
  <button class="category-button" data-category="1" onclick="filterByCategory(1)">Công nghệ</button>
</div>
 
  <div class="filter-az">
      <label for="jsSort">Sắp xếp:</label>
      <select id="jsSort">
        <option value="default">Chọn</option>
        <option value="asc">A → Z</option>
        <option value="desc">Z → A</option>
      </select>
    </div>

    <div class="service-list">
      <?php foreach ($all_services as $index => $service): ?>
        <div class="service-item <?= $index === 0 ? 'hot' : '' ?>">
          <img src="assets/images/icons/<?= $service['icon'] ?>.png" alt="<?= $service['icon'] ?>">
          <h3><?= htmlspecialchars($service['title']) ?></h3>
          <p><?=htmlspecialchars($service['desc'])?></p>
          <div class="plan-footer">
            <a href="index.php?detailservice" class="btn btn-primary">Đăng ký</a>
            <a href="index.php?service&detailservice=<?= urlencode($service['id']) ?>" class="link-detail">Xem chi tiết ›</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>



  <div class="pagination">
    <button class="pagination-arrow prev-page disabled"><i class="fa-solid fa-arrow-left"></i></button>
    <div class="pagination-dots">
        </div>
    <button class="pagination-arrow next-page"><i class="fa-solid fa-arrow-right"></i></button>
  </div>
</section>


<section class="webdev-benefit-section"> 
  <div class="webdev-floating-shapes">
    <div class="webdev-shape"></div>
    <div class="webdev-shape"></div>
    <div class="webdev-shape"></div>
  </div>

  <div class="webdev-container">
    <div class="webdev-header">
      <h2 class="webdev-title">Tại Sao Chọn Chúng Tôi<br>Cho Nhu Cầu Phát Triển Web Của Bạn?</h2>
      <p class="webdev-subtitle">
      Chúng tôi có đam mê và tình yêu với những gì chúng tôi làm và không tin vào việc làm qua loa hay đặt ra những kỳ vọng sai lầm. Chúng tôi hướng tới việc cải thiện từng ngày và thể hiện đúng bản chất của mình trong thực tế, và chúng tôi không giả vờ trong bất kỳ hoàn cảnh nào. Có nhiều lý do khiến bạn yêu thích chúng tôi khi sử dụng dịch vụ phát triển web hàng đầu. Dưới đây là một vài lý do trong số đó.
      </p>
    </div>

    <div class="webdev-grid webdev-grid-top">
      <div class="webdev-card">
        <div class="webdev-icon">
        <img src="assets/images/kn.png" alt="Icon" />
        </div>
        <h3 class="webdev-card-title">Kinh Nghiệm</h3>
        <p class="webdev-card-desc">Kinh nghiệm tạo nên sự khác biệt, và chúng tôi là đội ngũ chuyên gia đáng tin cậy cho dự án của bạn.</p>
      </div>

      <div class="webdev-card">
        <div class="webdev-icon">
        <img src="assets/images/dn.png" alt="Icon" />
        </div>
        <h3 class="webdev-card-title">Đội Ngũ Tận Tâm</h3>
        <p class="webdev-card-desc">Chúng tôi tách biệt chuyên môn, với đội ngũ phát triển và thiết kế đồ họa riêng biệt để đảm bảo chất lượng tối ưu cho mỗi dự án.</p>
      </div>

      <div class="webdev-card">
        <div class="webdev-icon">
        <img src="assets/images/tg.png" alt="Icon" />
        </div>
        <h3 class="webdev-card-title">Thời Gian Nhanh Chóng</h3>
        <p class="webdev-card-desc">Chúng tôi cam kết hoàn thành đúng hạn, luôn lắng nghe và cập nhật tiến độ để hiện thực hóa tầm nhìn của bạn.</p>
      </div>
      <div class="webdev-card ">
        <div class="webdev-icon">
        <img src="assets/images/gc.png" alt="Icon" />
        </div>
        <h3 class="webdev-card-title">Giá Cả Cạnh Tranh</h3>
        <p class="webdev-card-desc">Chúng tôi cam kết mang đến mức giá cạnh tranh nhất trên thị trường, đảm bảo chất lượng cao nhất cho khách hàng.</p>
      </div>
    </div>

  </div>
</section>
<div class="hero-section">
<div class="bg-effect1"></div>
<div class="hero-content">
    <div class="hero-text new-hero-layout"> <h2>Chúng tôi cam kết</h2>
    
        <ul>
            <li><i class="fas fa-check"></i> Kết quả đo lường được - Báo cáo minh bạch theo KPI cụ thể</li>
            <li><i class="fas fa-check"></i> Chuyên gia đầu ngành - Giải pháp tối ưu cho từng doanh nghiệp</li>
            <li><i class="fas fa-check"></i> Hỗ trợ tận tâm - Đồng hành 24/7 đến khi thành công</li>
            <li><i class="fas fa-check"></i> Hoàn tiền 150% nếu không đạt thỏa thuận</li>
        </ul>
        <button class="btn btn-primary new-hero-btn">Nhận tư vấn ngay</button>
    </div>
    <div class="hero-image new-hero-image">  <img src="assets/images/robot.png" alt="AI Robot" class="main-commitment-img" id="robotImage"> 
    </div>
</div>
</div>


<section id="faq-section" class="faq-py">
    <div class="faq-header">
        <h2>Câu Hỏi Thường Gặp (FAQ)</h2>
    </div>

    <div class="faq-container">
        <div class="faq-item"> 
            <div class="faq-question">
                <h3>Chi Phí Dịch Vụ Nhu Thế Nào?</h3>
                <span class="faq-icon">></span>
            </div>
            <div class="faq-answer">
                <p>Thông tin chi phí dịch vụ sẽ được cung cấp chi tiết sau khi chúng tôi hiểu rõ nhu cầu và phạm vi dự án của bạn. Vui lòng liên hệ với chúng tôi để được tư vấn.</p>
            </div>
        </div>

        <div class="faq-item"> <div class="faq-question">
                <h3>Có Trường Hợp Loại Trừ Bảo Hành Không?</h3>
                <span class="faq-icon">></span> </div>
            <div class="faq-answer">
                <p>Vì phạm điều khoản hợp đồng (ngừng thanh toán, cung cấp thông tin gian lận)</p>
            </div>
        </div>

        <div class="faq-item"> <div class="faq-question">
                <h3>Thời Gian Triển Khai Bao Lâu Để Thấy Kết Quả?</h3>
                <span class="faq-icon">></span>
            </div>
            <div class="faq-answer">
                <p>Thời gian triển khai và thấy kết quả phụ thuộc vào tính chất và độ phức tạp của dự án. Chúng tôi sẽ cung cấp lộ trình cụ thể sau khi thảo luận chi tiết với bạn.</p>
            </div>
        </div>

        <div class="faq-item"> <div class="faq-question">
                <h3>Tôi Muốn Dùng Thử Trước, Được Không?</h3>
                <span class="faq-icon">></span>
            </div>
            <div class="faq-answer">
                <p>Chúng tôi có các gói dùng thử hoặc bản demo tùy theo dịch vụ. Vui lòng liên hệ để biết thêm chi tiết về các lựa chọn dùng thử phù hợp với nhu cầu của bạn.</p>
            </div>
        </div>

        <div class="faq-item"> <div class="faq-question">
                <h3>Thanh Toán Như Thế Nào?</h3>
                <span class="faq-icon">></span>
            </div>
            <div class="faq-answer">
                <p>Chúng tôi chấp nhận nhiều hình thức thanh toán linh hoạt như chuyển khoản ngân hàng, thẻ tín dụng, v.v. Chi tiết sẽ được nêu rõ trong hợp đồng dịch vụ.</p>
            </div>
        </div>
    </div>
</section>


<section id="partners-section" class="py-5">
    <div class="section-header">
        <h2>Chúng tôi vinh dự được hợp tác cùng</h2>
    </div>

    <div class="container">
        <div class="partners-grid">
            <div class="partner-logo">
                <img src="assets/images/partners/riyadh_metro.png" alt="Riyadh Metro logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/ibm.png" alt="IBM logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/tamm.png" alt="Tamm logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/sapaad.png" alt="Sapaad logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/hobbyking.png" alt="HobbyKing logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/omantel.png" alt="Omantel logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/mobily.png" alt="Mobily logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/causal_capital.png" alt="Causal Capital logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/advendio.png" alt="AdVendio logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/arabic_logo_1.png" alt="Arabic Logo 1">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/opensooq.png" alt="OpenSooq logo">
            </div>
            <div class="partner-logo">
                <img src="assets/images/partners/mawdoo3.png" alt="Mawdoo3 logo">
            </div>
            </div>
    </div>
</section>


    
</body>
</html>
<script>
  function filterByCategory(id) {
    const url = new URL(window.location.href);
    if (id === 0) {
      url.searchParams.delete('category');
    } else {
      url.searchParams.set('category', id);
    }
    window.location.href = url.toString();
  }

  // Đánh dấu nút active khi load lại
  document.addEventListener("DOMContentLoaded", function () {
    const currentCategory = parseInt(new URLSearchParams(window.location.search).get("category") || 0);
    document.querySelectorAll(".category-button").forEach(btn => {
      const btnCat = parseInt(btn.getAttribute("data-category"));
      btn.classList.toggle("active", btnCat === currentCategory);
    });
  });
</script>
