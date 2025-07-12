<section class="donut-section">
  <div class="background-particles" id="particles"></div>

  <div class="title">Với tỷ lệ khách hàng hài lòng và quay lại lên tới</div>

  <div class="chart-container">
  <div class="donut-wrapper">
  <!-- Biểu đồ donut -->
  <div class="donut-chart">
    <svg class="donut-svg" viewBox="0 0 200 200">
      <defs>
        <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
          <stop offset="0%" stop-color="#333333" />
          <stop offset="50%" stop-color="#EE6067" />
          <stop offset="100%" stop-color="#1D24A2" />
        </linearGradient>
      </defs>

      <circle cx="100" cy="100" r="85" class="donut-background" />
      <circle cx="100" cy="100" r="85" class="donut-segment"
        stroke="url(#gradient1)"
        stroke-dasharray="507.4 26.7"
        stroke-dashoffset="0"
        data-value="95"
        data-label="Độ hài lòng"
        data-color="#ff6b9d"
        data-amount="490 tỷ VND"
        data-position="top" />
    </svg>

    <!-- Nội dung giữa biểu đồ -->
    <div class="center-content">
      <div class="center-value" id="centerValue">95%</div>
      <div class="center-label">Độ hài lòng</div>
    </div>

    <!-- Robot chèn lên -->
    <img class="robot-onchart" src="assets/images/robotchart.png" alt="Robot" />
  </div>
</div>


    <!-- Info Boxes -->
    <div class="info-box top" id="info-top">
      <div class="info-title">Dộ hài lòng</div>
      <div class="info-value">95%</div>
    </div>
    <div class="info-box right" id="info-right">
      <div class="info-title">Lợi nhuận</div>
      <div class="info-value">30%</div>
    </div>
    <div class="info-box bottom" id="info-bottom">
      <div class="info-title">Chi phí</div>
      <div class="info-value">20%</div>
    </div>
    <div class="info-box left" id="info-left">
      <div class="info-title">Đầu tư</div>
      <div class="info-value">15%</div>
    </div>

    <!-- Connecting Lines -->
    <div class="connecting-line" id="line-top"></div>
    <div class="connecting-line" id="line-right"></div>
    <div class="connecting-line" id="line-bottom"></div>
    <div class="connecting-line" id="line-left"></div>

    <!-- Legend -->
    <div class="legend-popup" id="legendPopup">
      <div class="legend-item" data-index="0">
        <div class="legend-color" style="background: linear-gradient(135deg, #ff6b9d, #c44569);"></div>
        <span class="legend-text">Độ hài lòng</span>
        <span class="legend-value">95%</span>
      </div>
    </div>
  </div>
</section>

<!-- Link CSS & JS -->
<link rel="stylesheet" href="assets/css/piechart.css">
<script src="assets/js/piechart.js" defer></script>
