<?php
include_once("controller/getnews.php");
$p = new getnews();
$tieude = $noidung = $hinhanh = $ngaydang = $tacgia = $luotxem = $tendanhmuc = "";
$ma = "";

if (isset($_REQUEST["detailid"])) {
    $ma = $_REQUEST["detailid"];
     // Gọi hàm tăng lượt xem ngay tại đây
    $p->getincrease($ma);
    
    $con = $p->getnewsbyid($ma);
    if ($con) {
        $r = $con->fetch_assoc();
        $tieude = $r['tieude'];
        $noidung = html_entity_decode($r['noidung']);
        $hinhanh = $r['hinhanh'];
        $ngaydang = $r['ngaydang'];
        $tacgia = $r['tacgia'];
        $luotxem = $r['luotxem'];
        $tendanhmuc = $r['tendanhmuc'];
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title><?php echo $tieude ?: "Chi tiết bài viết"; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/newdetail.css">
</head>
<body>
  <div class="reading-progress">
    <div class="reading-progress-bar" id="progressBar"></div>
  </div>

  <?php if ($tieude): ?>
    <div class="header">
      <div class="container">
        <div class="main-flex" style="display: flex; align-items: flex-start; gap: 36px;">
          <div class="main-left" style="flex: 2; min-width: 0;">
            <div class="newsdetail-hero" style="display: flex; align-items: flex-start; gap: 36px;">
              <div class="newsdetail-hero-left" style="flex: 1.3; min-width: 0;">
                <div class="breadcrumb">
                  <a href="index.php"><i class="fas fa-home"></i> Trang chủ</a>
                  <span>•</span>
                  <a href="index.php?news=1">Tin tức</a>
                  <span>•</span>
                  <span><?php echo htmlspecialchars($tendanhmuc); ?></span>
                </div>
                <h1 class="article-title">
                  <span class="emc-color" style="font-family: 'Roboto', sans-serif; font-weight: 700; letter-spacing: 1px;">EMC News:</span><br>
                  <?php echo htmlspecialchars(
                    $tieude
                  ); ?>
                </h1>
                <div class="article-desc">
                  EMC không dừng lại ở việc đảm bảo trạng thái logistics với hệ thống vận tải toàn diện, hiện đại. Bài viết này sẽ khám phá chi tiết những lợi thế nổi bật của EMC, từ kho bãi hiện đại, giải pháp công nghệ tiên tiến cho đến quy trình cung ứng, đáp ứng mọi nhu cầu khách hàng.
                </div>
                <div class="meta-row">
                  <div class="meta-item">
                    <i class="fas fa-user"></i>
                    <span><?php echo htmlspecialchars($tacgia); ?></span>
                  </div>
                  <div class="meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span><?php echo date("d/m/Y", strtotime($ngaydang)); ?></span>
                  </div>
                  <div class="meta-item">
                    <i class="fas fa-eye"></i>
                    <span><?php echo number_format($luotxem); ?> lượt xem</span>
                  </div>
                </div>
                <div class="tag-filter">
                  <button class="tag-btn">SOCI</button>
                  <button class="tag-btn">TRENDING</button>
                  <button class="tag-btn">EMC</button>
                  <button class="tag-btn">THƯƠNG MẠI</button>
                </div>
              </div>
              <div class="newsdetail-hero-right" style="flex: 1; display: flex; align-items: center; justify-content: flex-end;">
                <?php if (!empty($hinhanh)): ?>
                  <img src="assets/images/<?php echo htmlspecialchars($hinhanh); ?>" alt="<?php echo htmlspecialchars($tieude); ?>" class="article-image-hero">
                <?php endif; ?>
              </div>
            </div>
            <div class="article-section" style="margin-top: 36px;">
              <div class="article-content" id="articleContent">
                <?php echo $noidung; ?>
              </div>
            </div>
          </div>
          <div class="main-right" style="flex: 0.9; min-width: 260px; max-width: 300px;">
            <div class="sidebar-widget">
              <div class="widget-title" style="display: flex; align-items: center; gap: 10px; margin-bottom: 28px; border: none; box-shadow: none;">
                <span style="display: inline-block; width: 6px; height: 28px; background: #fff; border-radius: 3px; margin-right: 10px;"></span>
                <span style="font-size: 1.35rem; color: #fff; font-weight: 600; letter-spacing: 0.5px; border: none; box-shadow: none;">Mục lục</span>
              </div>
              <ul class="toc-list" id="tocList"></ul>
            </div>
            <!-- Tin Đề Xuất -->
            <div class="suggested-title-main" style="display: flex; align-items: center; gap: 10px; margin-bottom: 28px;">
              <span style="display: inline-block; width: 6px; height: 28px; background: #fff; border-radius: 3px; margin-right: 10px;"></span>
              <span style="font-size: 1.35rem; color: #fff; font-weight: 600; letter-spacing: 0.5px;">Tin Đề Xuất</span>
            </div>
            <div class="suggested-news">
              <?php 
                $data = $p->getallnews1(); 
                $count = 0;
                if ($data && $data->num_rows > 0):
                  $data->data_seek(0);
                  while ($rel = $data->fetch_assoc()):
                    if ($rel['id_tintuc'] == $ma) continue;
                    if ($count >= 4) break;
                    $count++;
              ?>
                <a href="index.php?news&detailid=<?php echo $rel['id_tintuc']; ?>" class="suggested-item">
                  <img src="assets/images/<?php echo htmlspecialchars($rel['hinhanh']); ?>" alt="<?php echo htmlspecialchars($rel['tieude']); ?>">
                  <div class="suggested-info">
                    <div class="suggested-meta-top">
                      <span><?php echo htmlspecialchars($rel['tacgia']); ?></span>
                      <span>|</span>
                      <span><?php echo date('d/m/Y', strtotime($rel['ngaydang'])); ?></span>
                    </div>
                    <div class="suggested-title"><?php echo htmlspecialchars($rel['tieude']); ?></div>
                    <div class="suggested-meta">
                      <span>
                        <?php
                          $cat = $rel['tendanhmuc'];
                          if (mb_strtolower($cat) === 'tin tức công ty') echo 'TTCT';
                          else if (mb_strtolower($cat) === 'thông cáo báo chí') echo 'TCBC';
                          else echo htmlspecialchars($cat);
                        ?>
                      </span>
                      <span>|</span>
                      <span><?php echo number_format($rel['luotxem']); ?> lượt xem</span>
                    </div>
                  </div>
                </a>
              <?php endwhile; endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      $latest = $p->getallnews1();
      $count = 0;
      $featured = null;
      $list = [];
      if ($latest && $latest->num_rows > 0) {
        $latest->data_seek(0);
        while ($row = $latest->fetch_assoc()) {
          if ($row['id_tintuc'] == $ma) continue;
          if ($count == 0) {
            $featured = $row;
          } else if ($count <= 3) {
            $list[] = $row;
          }
          $count++;
          if ($count > 3) break;
        }
      }
    ?>
    <?php if ($featured): ?>
<div class="latest-news-section" style="margin-top: 56px;">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
    <h2 class="latest-title" style="margin: 0; font-size: 2rem; font-weight: 700; color: #fff;">Tin Mới Nhất</h2>
    <a href="index.php?news=1" class="latest-more" style="color: #bbb; font-size: 1rem; text-decoration: none;">Xem tất cả &gt;</a>
  </div>
  <div class="latest-news-grid" style="display: flex; gap: 40px;">
    <!-- Bên trái: Tin nổi bật lớn -->
    <div class="latest-news-left" style="flex: 1.2; display: flex; flex-direction: column; gap: 0;">
      <div style="background: none;">
        <img src="assets/images/<?php echo htmlspecialchars($featured['hinhanh']); ?>" alt="<?php echo htmlspecialchars($featured['tieude']); ?>" style="width: 100%; aspect-ratio: 16/9; object-fit: cover; display: block; border-radius: 0; box-shadow: none;">
      </div>
      <div style="display: flex; gap: 32px; margin-top: 18px;">
        <div style="flex: 1;">
          <div style="font-size: 1.35rem; color: #fff; font-weight: 700; line-height: 1.25; margin-bottom: 12px;">
            <?php echo htmlspecialchars($featured['tieude']); ?>
          </div>
        </div>
        <div style="flex: 1; display: flex; flex-direction: column; justify-content: flex-start;">
          <div style="font-size: 1.05rem; color: #bbb; line-height: 1.6; margin-bottom: 8px;">
            <?php echo mb_substr(strip_tags($featured['noidung']), 0, 90); ?>... 
            <a href="index.php?news&detailid=<?php echo $featured['id_tintuc']; ?>" style="color: #bbb; text-decoration: underline; font-size: 1.05rem;">Đọc Thêm</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bên phải: 3 tin nhỏ -->
    <div class="latest-news-right" style="flex: 1; display: flex; flex-direction: column; gap: 24px;">
      <?php foreach ($list as $item): ?>
      <div style="display: flex; gap: 18px; align-items: flex-start; background: none;">
        <img src="assets/images/<?php echo htmlspecialchars($item['hinhanh']); ?>" alt="<?php echo htmlspecialchars($item['tieude']); ?>" style="width: 160px; aspect-ratio: 16/9; object-fit: cover; border-radius: 0; box-shadow: none;">
        <div style="flex: 1; display: flex; flex-direction: column; justify-content: flex-start;">
          <div style="font-size: 1.08rem; color: #fff; font-weight: 700; line-height: 1.3; margin-bottom: 8px;">
            <?php echo htmlspecialchars($item['tieude']); ?>
          </div>
          <div style="font-size: 1rem; color: #bbb; line-height: 1.5;">
            <?php echo mb_substr(strip_tags($item['noidung']), 0, 60); ?>... 
            <a href="index.php?news&detailid=<?php echo $item['id_tintuc']; ?>" style="color: #bbb; text-decoration: underline; font-size: 1rem;">Đọc Thêm</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>

  <?php else: ?>
    <div class="container">
      <div class="no-content" style="margin-top: 100px;">
        <i class="fas fa-exclamation-triangle"></i>
        <h2>Không tìm thấy bài viết</h2>
        <p>Bài viết bạn đang tìm kiếm không tồn tại hoặc đã bị xóa.</p>
        <a href="index.php?news=1" class="back-btn">
          <i class="fas fa-arrow-left"></i>
          Quay lại danh sách
        </a>
      </div>
    </div>
  <?php endif; ?>

  <button class="scroll-top" id="scrollTopBtn" onclick="scrollToTop()">
    <i class="fas fa-arrow-up"></i>
  </button>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Generate Table of Contents
      generateTOC();
      
      // Reading progress
      updateReadingProgress();
      
      // Scroll to top button
      handleScrollTopButton();
      
      // Prevent content editable
      preventContentEditable();
    });

    function generateTOC() {
      const content = document.getElementById('articleContent');
      const tocList = document.getElementById('tocList');
      const headings = content.querySelectorAll('h1, h2, h3, h4, h5, h6');
      
      if (headings.length === 0) {
        tocList.innerHTML = '<li><span style="color: #999;">Không có mục lục</span></li>';
        return;
      }
      
      headings.forEach((heading, index) => {
        const id = 'heading-' + index;
        heading.id = id;
        
        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = '#' + id;
        a.textContent = heading.textContent;
        a.className = heading.tagName.toLowerCase() === 'h3' ? 'h3-link' : '';
        
        a.addEventListener('click', function(e) {
          e.preventDefault();
          document.getElementById(id).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        });
        
        li.appendChild(a);
        tocList.appendChild(li);
      });
    }

    function updateReadingProgress() {
      window.addEventListener('scroll', function() {
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight - windowHeight;
        const scrollTop = window.pageYOffset;
        const progress = (scrollTop / documentHeight) * 100;
        
        document.getElementById('progressBar').style.width = progress + '%';
      });
    }

    function handleScrollTopButton() {
      const scrollTopBtn = document.getElementById('scrollTopBtn');
      
      window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
          scrollTopBtn.classList.add('show');
        } else {
          scrollTopBtn.classList.remove('show');
        }
      });
    }

    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    function shareArticle(platform) {
      const url = encodeURIComponent(window.location.href);
      const title = encodeURIComponent(document.title);
      
      const shareUrls = {
        facebook: `https://www.facebook.com/sharer/sharer.php?u=${url}`,
        twitter: `https://twitter.com/intent/tweet?url=${url}&text=${title}`,
        linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${url}`,
        telegram: `https://t.me/share/url?url=${url}&text=${title}`
      };
      
      if (shareUrls[platform]) {
        window.open(shareUrls[platform], '_blank', 'width=600,height=400');
      }
    }

    function preventContentEditable() {
      // Remove any contenteditable attributes
      document.querySelectorAll('[contenteditable]').forEach(function(element) {
        element.removeAttribute('contenteditable');
      });
      
      // Prevent focus events that might enable editing
      document.querySelectorAll('h1, h2, h3, h4, h5, h6, p, div, span').forEach(function(element) {
        element.addEventListener('focus', function(e) {
          e.target.blur();
        });
        
        element.addEventListener('click', function(e) {
          if (e.target.isContentEditable) {
            e.preventDefault();
            e.target.blur();
          }
        });
      });
    }
  </script>
</body>
</html>