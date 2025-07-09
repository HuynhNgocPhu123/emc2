<link rel="stylesheet" href="assets/css/service.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
<!-- <div class="abstract-shape shape-2"></div> -->

<section class="experience-section">
  <div class="experience-text">
    <h1>EMC GROUP</h1>
    <h2>Trang dịch vụ - giải pháp toàn diện cho doanh nghiệp</h2>
    <p>
      Chúng tôi là EMCGroup, một công ty công nghệ chuyên cung cấp các giải pháp trí tuệ nhân tạo (AI) tiên tiến,
      giúp doanh nghiệp và tổ chức tối ưu hóa quy trình, nâng cao hiệu suất và tạo ra giá trị bền vững.
    </p>
  </div>
  <div class="hero-section">

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
</section>

    


    <?php
$categories = [
  // marketing
  'marketing-overall' => [
    ['title' => 'Aaaaaaab', 'desc' => 'Giải pháp tối ưu cho doanh nghiệp không có đội ngũ marketing riêng.', 'icon' => 'seo'],
    ['title' => 'Bbbbbbb', 'desc' => 'Xây dựng chiến lược marketing toàn diện từ A-Z.', 'icon' => 'seo'],
    ['title' => 'Cccccccc', 'desc' => 'Phân tích và cải thiện hiệu suất chiến dịch.', 'icon' => 'seo'],
  ],
  // congnghee
  'social-media' => [
    ['title' => 'Ddddddd', 'desc' => 'Tối ưu hóa ứng dụng trên các cửa hàng ứng dụng.', 'icon' => 'seo'],
    ['title' => 'Eeeeeee', 'desc' => 'Đảm bảo website hoạt động hiệu quả.', 'icon' => 'seo'],
    ['title' => 'Fffffff', 'desc' => 'Tạo ra các ứng dụng mạnh mẽ và thân thiện.', 'icon' => 'seo'],
    ['title' => 'Ggggggg', 'desc' => 'Tối ưu hóa ứng dụng trên các cửa hàng ứng dụng.', 'icon' => 'seo'],
    ['title' => 'Hhhhhhh', 'desc' => 'Đảm bảo website hoạt động hiệu quả.', 'icon' => 'seo'],
    ['title' => 'Iiiiiii', 'desc' => 'Tạo ra các ứng dụng mạnh mẽ và thân thiện.', 'icon' => 'seo'],

  ],
  // media
  'seo-ads' => [
    ['title' => 'Jjjjjjj', 'desc' => 'Tối ưu hóa chiến dịch quảng cáo.', 'icon' => 'seo'],
    ['title' => 'Kkkkkkk', 'desc' => 'Tối ưu quảng cáo trên Google.', 'icon' => 'seo'],
    ['title' => 'Lllllll', 'desc' => 'Tối ưu hóa chuyển đổi.', 'icon' => 'seo'],
    ['title' => 'Mmmmmmm', 'desc' => 'Sản xuất nội dung video chất lượng cao.', 'icon' => 'seo'], 
    ['title' => 'Nnnnnnn', 'desc' => 'Xây dựng cộng đồng và tối ưu hóa nội dung video.', 'icon' => 'seo'],
    ['title' => 'Ooooooo', 'desc' => 'Tối đa hóa ROI từ quảng cáo trả tiền.', 'icon' => 'seo'],
    ['title' => 'Ppppppp', 'desc' => 'Tối ưu hóa chiến dịch quảng cáo.', 'icon' => 'seo'], 
    ['title' => 'zqqqqqq', 'desc' => 'Tối ưu quảng cáo trên Google.', 'icon' => 'seo'],
    ['title' => 'Rrrrrrr', 'desc' => 'Tối ưu hóa chuyển đổi.', 'icon' => 'seo'],
    ['title' => 'Sssssss', 'desc' => 'Sản xuất nội dung video chất lượng cao.', 'icon' => 'seo'], 
    ['title' => 'Ttttttt', 'desc' => 'Xây dựng cộng đồng và tối ưu hóa nội dung video.', 'icon' => 'seo'],
    ['title' => 'Uuuuuuu', 'desc' => 'Tối đa hóa ROI từ quảng cáo trả tiền.', 'icon' => 'seo'],

  ],
];

$all_services = [];
foreach ($categories as $cat => $services) {
  foreach ($services as $s) {
    $s['category'] = $cat;
    $all_services[] = $s;
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
    <button class="category-button active" data-category="all">Tất cả</button>
    <button class="category-button" data-category="social-media">Công nghệ</button>
    <button class="category-button" data-category="marketing-overall">Marketing</button>
    <button class="category-button" data-category="seo-ads">Media</button>
    
    
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
      <?php
        $is_hot = ($index === 0); 
      ?>

      <div class="service-item <?= $is_hot ? 'hot' : '' ?>" data-category="<?= $service['category'] ?>">

        <img src="assets/images/icons/<?= $service['icon'] ?>.png" alt="<?= $service['icon'] ?>">
        <h3><?= $service['title'] ?></h3>
        <!-- <p><?= $service['desc'] ?></p> -->
        <div class="plan-footer">
          <a href="index.php?detailservice" class="btn btn-primary">Đăng ký</a>
          <a href="index.php?detailservice" class="link-detail">Xem chi tiết ›</a>
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
        <p class="webdev-card-desc">Kinh nghiệm là điều quan trọng, và việc thuê chúng tôi có nghĩa là bạn đang thuê những chuyên gia có nhiều năm kinh nghiệm để thực hiện các dự án của bạn một cách chính xác. Chúng tôi cũng có một hệ thống quản lý dự án hiệu quả để đáp ứng các yêu cầu của bạn. Kết nối với chúng tôi cho phép bạn tiếp cận một nguồn nhân lực lớn có thể hoàn thành nhiệm vụ của bạn trong thời gian đã định.</p>
      </div>

      <div class="webdev-card">
        <div class="webdev-icon">
        <img src="assets/images/dn.png" alt="Icon" />
        </div>
        <h3 class="webdev-card-title">Đội Ngũ Tận Tâm</h3>
        <p class="webdev-card-desc">Mỗi người đều có sở thích riêng của mình, vì vậy chúng tôi không trộn lẫn các lĩnh vực chức năng khác nhau. Chúng tôi có các đội ngũ chuyên trách cho thiết kế và đồ họa. Trong khi các nhà phát triển web của chúng tôi hoàn thành phần thiết kế, chúng tôi có đội ngũ thiết kế đồ họa riêng đảm nhận tất cả các hình ảnh chất lượng cho một trang web thành công.</p>
      </div>

      <div class="webdev-card">
        <div class="webdev-icon">
        <img src="assets/images/tg.png" alt="Icon" />
        </div>
        <h3 class="webdev-card-title">Thời Gian Nhanh Chóng</h3>
        <p class="webdev-card-desc">Chúng tôi hướng tới việc cung cấp công việc chất lượng trong thời gian cố định và do đó cam kết mang đến giải pháp khi khách hàng cần mà không để họ phải chờ đợi và vượt quá thời gian đã định. Chúng tôi lập kế hoạch phù hợp và cũng thường xuyên cập nhật cho khách hàng về tiến độ để đạt được những gì bạn mong muốn. Chúng tôi lắng nghe tầm nhìn của bạn.</p>
      </div>
    </div>

    <div class="webdev-grid webdev-grid-bottom">
      <div class="webdev-card webdev-card-center">
        <div class="webdev-icon">
        <img src="assets/images/gc.png" alt="Icon" />
        </div>
        <h3 class="webdev-card-title">Giá Cả Cạnh Tranh</h3>
        <p class="webdev-card-desc">Giá cả là một yếu tố quan trọng mà mọi chủ doanh nghiệp đều xem xét khi thuê một công ty phát triển web. Chúng tôi là công ty tốt nhất trên thị trường và cung cấp mức giá cạnh tranh cho khách hàng, đáp ứng tất cả các yêu cầu của khách hàng với hiệu suất cao hơn.</p>
      </div>
    </div>
  </div>
</section>


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


    <script src="assets/js/service.js"></script>
</body>
</html>