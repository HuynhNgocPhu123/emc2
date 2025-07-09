<?php
include_once("controller/getnews.php");

$newsController = new getnews();

// Giới hạn số bài viết mỗi trang
$limit = 6;

// Lấy trang hiện tại từ GET, mặc định là 1
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Lấy keyword và category nếu có
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$category = isset($_GET['category']) ? (int)$_GET['category'] : 0;

if ($keyword !== '') {
    // 🔍 Tìm kiếm theo tiêu đề
    $newsList = $newsController->getallnewsbyname($limit, $offset, $keyword);
    $totalNews = $newsController->countNewsByKeyword($keyword);
} elseif ($category > 0) {
    // 📂 Lọc theo danh mục
    $newsList = $newsController->getallnewsbyiddanhmuc($category, $limit, $offset);
    $totalNews = $newsController->countNewsByDanhmuc($category);
} else {
    // 📄 Hiển thị tất cả bài viết
    $newsList = $newsController->getallnews($limit, $offset);
    $totalNews = $newsController->totalNews();
}

// Tổng số trang
$totalPages = ceil($totalNews / $limit);

// tin xem nhiều 
$hotnew = $newsController->getviewnews();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>EMC GROUP</title>
  <link rel="stylesheet" href="assets/css/news.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <section class="hero">
    <!-- Phần trên: Logo và tiêu đề -->
    <div class="hero-header">
      <br>
      <h1 class="logo">EMC <span>GROUP</span></h1>
      <h2 class="headline">Trang tin công nghệ & kinh doanh đa chiều</h2>
      <p class="tagline">Cập nhật xu hướng - Giải pháp toàn diện - Dẫn đầu chuyển đổi số</p>
    </div>

    <!-- Phần dưới: Mascot + Cards -->
    <div class="hero-body">
      <!-- Hình mascot -->
      <div class="hero-left">
        <img src="assets/images/news.png" alt="Mascot" />
      </div>

      <!-- Card -->
     <div class="cards">
      <div class="card">
        <div class="icon"><i class="fas fa-lightbulb"></i></div>
        <div class="text">
          <div class="title">Vision AI Technology</div>
          <p class="desc">Our Technology AI Generator website empowers individuals</p>
        </div>
      </div>

      <div class="card">
        <div class="icon"><i class="fas fa-rocket"></i></div>
        <div class="text">
          <div class="title">Vision AI Technology</div>
          <p class="desc">Our Technology AI Generator website empowers individuals</p>
        </div>
      </div>
    </div>
  </section>
  <!--Phần bài viết nổi bật-->

<section class="featured-news">
  <!-- Header: Tiêu đề và bộ lọc -->
  <div class="news-header">
    <h2 class="section-title">Tin tức nổi bật</h2>
    <div class="filters">
      <button class="filter-btn1">Weekdays ▾</button>
      <button class="filter-btn1">Event Type ▾</button>
      <button class="filter-btn1">Any Category ▾</button>
    </div>
  </div>

  <!-- Nội dung chính -->
  <?php if ($hotnew && $hotnew->num_rows > 0): ?>
  <?php $hot = $hotnew->fetch_assoc(); ?>
  <div class="container1">
    <div class="left-box">
      <a href="index.php?news&detailid=<?php echo $hot['id_tintuc']; ?>">
        <img src="assets/images/<?php echo htmlspecialchars($hot['hinhanh']); ?>" alt="Thumbnail" class="img-hot">
      </a>

      
    </div>

    <div class="right-box">
      <span class="tag">
        <?php echo strtoupper($hot['tendanhmuc'] ?? 'TIN HOT'); ?> · 
        <?php echo date('F d, Y', strtotime($hot['ngaydang'])); ?>
      </span>

      <h3 class="news-title">
        
        <a style="color:white; text-decoration: none;" href="index.php?news&detailid=<?php echo $hot['id_tintuc']; ?>">
            <h3 class="post-title"><?php echo htmlspecialchars($hot['tieude']); ?></h3>
          </a>
      </h3>

      <p class="news-desc">
        <?php echo mb_substr(strip_tags($hot['noidung']), 0, 100); ?>...
      </p>

      <div class="author">
        <i class="fas fa-user-circle fa-lg" style="color: #fff;"></i>
        <div class="author-name">
          <?php echo htmlspecialchars($hot['tacgia'] ?? 'Admin'); ?><br>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
</section>
<!--Tất cả bài viết-->
<section class="all-posts">
  <center><h2 class="all-posts-title">Tất cả bài viết</h2></center>
  
<!--Bộ lọc-->
<div class="filter-search-bar">
 <div class="post-filters">
  <button class="filter-btn" data-category="0" onclick="filterByCategory(0)">Tất cả</button>
  <button class="filter-btn" data-category="2" onclick="filterByCategory(2)">Tin Tức Công Ty</button>
  <button class="filter-btn" data-category="1" onclick="filterByCategory(1)">Thông Cáo Báo Chí</button>
</div>



  <form class="search-form" method="GET" action="index.php">
    <input type="hidden" name="news" value=""> <!-- giữ ?news -->
    <input type="text" name="keyword" placeholder="Tìm kiếm bài viết..." value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" />
    <button type="submit">Tìm</button>
  </form>
</div>


<!--Bài viết-->
  <div class="posts-grid">
     <?php if ($newsList && $newsList != false): ?>
    <?php while ($row = $newsList->fetch_assoc()): ?>
      <div class="post-card">
        <a href="index.php?news&detailid=<?php echo $row['id_tintuc']; ?>"><img src="assets/images/<?php echo htmlspecialchars($row['hinhanh']); ?>" alt="Thumbnail" class="post-thumb"></a>
        <div class="post-content">
          <span class="post-meta"><?php echo strtoupper($row['tendanhmuc'] ?? 'TIN TỨC'); ?> · <?php echo date('F d, Y', strtotime($row['ngaydang'])); ?></span>
          <a style="color:white; text-decoration: none;" href="index.php?news&detailid=<?php echo $row['id_tintuc']; ?>">
            <h3 class="post-title"><?php echo htmlspecialchars($row['tieude']); ?></h3>
          </a>
          <p class="post-desc">
            <?php
              $noidung = strip_tags($row['noidung']); // Xóa thẻ HTML nếu có
              $words = explode(' ', $noidung);        // Cắt thành mảng từ
              $limited = array_slice($words, 0, 70);  // Lấy 70 từ đầu
              echo htmlspecialchars(implode(' ', $limited)) . '...';
            ?>
          </p>
          <div class="post-author">
            <i class="fas fa-user-circle fa-lg" style="color: #fff;"></i>
            <div class="author-info">
              <?php echo htmlspecialchars($row['tacgia']); ?><br>
              <small>Tác giả</small>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p style="color: white;">Không có bài viết nào.
      <a href="index.php?news">Quay lại</a>
    </p>
    
  <?php endif; ?>
  </div>
  <br>
  <div class="pagination">
  <?php if ($page > 1): ?>
    <a href="index.php?news&page=<?php echo $page - 1; ?>&keyword=<?php echo urlencode($keyword); ?>">&laquo;</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href="index.php?news&page=<?php echo $i; ?>&keyword=<?php echo urlencode($keyword); ?>"
       class="<?php echo ($i == $page) ? 'active' : ''; ?>">
      <?php echo $i; ?>
    </a>
  <?php endfor; ?>

  <?php if ($page < $totalPages): ?>
    <a href="index.php?news&page=<?php echo $page + 1; ?>&keyword=<?php echo urlencode($keyword); ?>">&raquo;</a>
  <?php endif; ?>
</div>
</section>
</body>
</html>
<script src="assets/js/news.js"></script>

