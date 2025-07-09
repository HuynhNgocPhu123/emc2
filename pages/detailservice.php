<?php
include_once('controller/getservice.php');
$p = new Gservice();

// Lấy ID dịch vụ từ URL
$id = isset($_GET["detailservice"]) ? intval($_GET["detailservice"]) : 0;

// Lấy danh sách gói dịch vụ theo tháng và năm
$monthly_plans = $p->getselectchitietgoidichvubydichvuandtheogoi($id, 'Theo Tháng');
$yearly_plans  = $p->getselectchitietgoidichvubydichvuandtheogoi($id, 'Theo Năm');
?>
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
<!-- SECTION 2: Tabs chuyển tháng/năm -->
<section class="detailservice-section section-tabs">
  <div class="container">
    <div class="detailservice-tabs">
      <button class="tab active" onclick="switchPlan('monthly')">Theo tháng</button>
      <button class="tab" onclick="switchPlan('yearly')">Theo năm</button>
    </div>
  </div>
</section>

<div class="abstract-shape shape-2"></div>

<!-- SECTION 3: Gói dịch vụ -->
<section class="detailservice-section section-packages">
    <div class="container">
        <!-- GÓI THEO THÁNG -->
    <div class="detailservice-cards plan-monthly">
      <?php if ($monthly_plans && $monthly_plans->num_rows > 0): ?>
        <?php while ($row = $monthly_plans->fetch_assoc()): ?>
          <div class="card">
            <h3><?= htmlspecialchars($row['tengoidichvu']) ?></h3>
            <p>Dành cho sự phát triển <?= htmlspecialchars($row['sohuudanhcho']) ?></p>
            <div class="price"><?= number_format($row['gia']) ?> VND</div>
            <ul class="features">
              <li><?= htmlspecialchars($row['motagoi']) ?></li>
            </ul>
            <button class="btn btn-secondary">Đăng Ký</button>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Chưa có gói dịch vụ theo tháng nào.</p>
      <?php endif; ?>
    </div>

    <!-- GÓI THEO NĂM -->
    <div class="detailservice-cards plan-yearly" style="display: none;">
      <?php if ($yearly_plans && $yearly_plans->num_rows > 0): ?>
        <?php while ($row = $yearly_plans->fetch_assoc()): ?>
          <div class="card">
            <h3><?= htmlspecialchars($row['tengoidichvu']) ?></h3>
            <p><?= htmlspecialchars($row['sohuudanhcho']) ?></p>
            <div class="price"><?= number_format($row['gia']) ?> VND</div>
            <ul class="features">
              <li><?= htmlspecialchars($row['motagoi']) ?></li>
            </ul>
            <button class="btn btn-secondary">Đăng Ký</button>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Chưa có gói dịch vụ theo năm nào.</p>
      <?php endif; ?>
    </div>
    </div>
</section>

<script src="assets/js/detailservice.js"></script>
<script>
  function switchPlan(type) {
    const tabButtons = document.querySelectorAll('.tab');
    tabButtons.forEach(btn => btn.classList.remove('active'));
    document.querySelector(`.tab[onclick*="${type}"]`).classList.add('active');

    const monthly = document.querySelector('.plan-monthly');
    const yearly = document.querySelector('.plan-yearly');

    if (type === 'monthly') {
      monthly.style.display = 'flex';
      yearly.style.display = 'none';
    } else {
      monthly.style.display = 'none';
      yearly.style.display = 'flex';
    }
  }
</script>