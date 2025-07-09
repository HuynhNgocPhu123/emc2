<?php
include_once("controller/getnews.php");
$p = new getnews();
$tieude = $noidung = $hinhanh = $ngaydang = $tacgia = $luotxem = $tendanhmuc = "";
$ma = "";

if (isset($_REQUEST["detailid"])) {
    $ma = $_REQUEST["detailid"];
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
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      line-height: 1.6;
      color: #333;
      background-color: #f8f9fa;
    }

    .header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 60px 0;
      position: relative;
      overflow: hidden;
    }

    .header::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
      animation: float 20s infinite linear;
    }

    @keyframes float {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      position: relative;
    }

    .breadcrumb {
      margin-bottom: 30px;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .breadcrumb a {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      transition: color 0.3s;
    }

    .breadcrumb a:hover {
      color: white;
    }

    .breadcrumb span {
      color: rgba(255, 255, 255, 0.6);
    }

    .article-title {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 20px;
      line-height: 1.2;
      text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .article-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 30px;
    }

    .meta-item {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14px;
      color: rgba(255, 255, 255, 0.9);
      background: rgba(255, 255, 255, 0.1);
      padding: 8px 16px;
      border-radius: 20px;
      backdrop-filter: blur(10px);
    }

    .main-content {
      display: flex;
      gap: 40px;
      margin-top: -30px;
      position: relative;
      z-index: 10;
    }

    .article-section {
      flex: 1;
      background: white;
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.1);
      margin-bottom: 40px;
    }

    .article-image {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 30px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }

    .article-content {
      font-size: 16px;
      line-height: 1.8;
      color: #444;
    }

    .article-content h1,
    .article-content h2,
    .article-content h3,
    .article-content h4,
    .article-content h5,
    .article-content h6 {
      font-family: 'Playfair Display', serif;
      margin-top: 30px;
      margin-bottom: 15px;
      color: #2c3e50;
    }

    .article-content h2 {
      font-size: 1.8rem;
      padding-bottom: 10px;
      border-bottom: 2px solid #667eea;
    }

    .article-content h3 {
      font-size: 1.4rem;
      color: #667eea;
    }

    .article-content p {
      margin-bottom: 20px;
      text-align: justify;
    }

    .article-content img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
      margin: 20px 0;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }

    .article-content ul, .article-content ol {
      margin: 20px 0;
      padding-left: 30px;
    }

    .article-content li {
      margin-bottom: 8px;
    }

    .article-content blockquote {
      border-left: 4px solid #667eea;
      padding-left: 20px;
      margin: 20px 0;
      font-style: italic;
      color: #666;
      background: #f8f9fa;
      padding: 15px 20px;
      border-radius: 0 8px 8px 0;
    }

    .sidebar {
      width: 300px;
      flex-shrink: 0;
    }

    .sidebar-widget {
      background: white;
      border-radius: 12px;
      padding: 25px;
      margin-bottom: 20px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }

    .widget-title {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 20px;
      color: #2c3e50;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .widget-title::after {
      content: '';
      flex: 1;
      height: 2px;
      background: linear-gradient(to right, #667eea, transparent);
    }

    .toc-list {
      list-style: none;
      padding: 0;
    }

    .toc-list li {
      margin-bottom: 10px;
    }

    .toc-list a {
      color: #555;
      text-decoration: none;
      padding: 8px 12px;
      border-radius: 6px;
      display: block;
      transition: all 0.3s;
      font-size: 14px;
      border-left: 3px solid transparent;
    }

    .toc-list a:hover {
      background: #f0f4ff;
      color: #667eea;
      border-left-color: #667eea;
      transform: translateX(5px);
    }

    .toc-list .h3-link {
      margin-left: 15px;
      font-size: 13px;
      color: #777;
    }

    .social-share {
      display: flex;
      gap: 12px;
      justify-content: center;
    }

    .social-btn {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      color: white;
      font-size: 18px;
      transition: all 0.3s;
      cursor: pointer;
    }

    .social-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    }

    .facebook { background: #1877f2; }
    .twitter { background: #1da1f2; }
    .linkedin { background: #0077b5; }
    .telegram { background: #0088cc; }

    .back-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 24px;
      background: #667eea;
      color: white;
      text-decoration: none;
      border-radius: 25px;
      font-weight: 500;
      transition: all 0.3s;
      margin-top: 30px;
    }

    .back-btn:hover {
      background: #5a67d8;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .related-posts {
      background: white;
      border-radius: 16px;
      padding: 40px;
      margin-top: 40px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    }

    .related-posts h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      margin-bottom: 30px;
      color: #2c3e50;
      text-align: center;
      position: relative;
    }

    .related-posts h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background: #667eea;
      border-radius: 2px;
    }

    .related-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
      margin-top: 30px;
    }

    .related-card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      transition: all 0.3s;
      border: 1px solid #e9ecef;
    }

    .related-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 40px rgba(0,0,0,0.15);
    }

    .related-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .related-card-content {
      padding: 20px;
    }

    .related-card h4 {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 8px;
      color: #2c3e50;
      line-height: 1.4;
    }

    .related-card p {
      color: #666;
      font-size: 14px;
      line-height: 1.5;
    }

    .related-card a {
      text-decoration: none;
      color: inherit;
    }

    .no-content {
      text-align: center;
      padding: 60px 20px;
      color: #666;
    }

    .no-content i {
      font-size: 4rem;
      margin-bottom: 20px;
      color: #ddd;
    }

    .scroll-top {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 50px;
      height: 50px;
      background: #667eea;
      color: white;
      border: none;
      border-radius: 50%;
      cursor: pointer;
      font-size: 18px;
      transition: all 0.3s;
      opacity: 0;
      visibility: hidden;
      z-index: 1000;
    }

    .scroll-top.show {
      opacity: 1;
      visibility: visible;
    }

    .scroll-top:hover {
      background: #5a67d8;
      transform: scale(1.1);
    }

    .reading-progress {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: rgba(255,255,255,0.2);
      z-index: 1000;
    }

    .reading-progress-bar {
      height: 100%;
      background: #667eea;
      width: 0%;
      transition: width 0.1s ease;
    }

    @media (max-width: 768px) {
      .main-content {
        flex-direction: column;
        gap: 20px;
      }

      .sidebar {
        width: 100%;
        order: -1;
      }

      .article-section {
        padding: 25px;
      }

      .article-title {
        font-size: 2rem;
      }

      .article-meta {
        flex-direction: column;
        gap: 10px;
      }

      .related-grid {
        grid-template-columns: 1fr;
      }
    }

    /* Fix: Prevent content editable */
    .article-content *,
    .article-title,
    .widget-title,
    .toc-list * {
      -webkit-user-select: text;
      -moz-user-select: text;
      -ms-user-select: text;
      user-select: text;
      outline: none !important;
    }

    .article-content *:focus,
    .article-title:focus,
    .widget-title:focus {
      outline: none !important;
    }

    /* Remove any contenteditable attributes */
    [contenteditable] {
      -webkit-user-modify: read-only;
    }
  </style>
</head>
<body>
  <div class="reading-progress">
    <div class="reading-progress-bar" id="progressBar"></div>
  </div>

  <?php if ($tieude): ?>
    <div class="header">
      <div class="container">
        <div class="breadcrumb">
          <a href="index.php"><i class="fas fa-home"></i> Trang chủ</a>
          <span>•</span>
          <a href="index.php?news=1">Tin tức</a>
          <span>•</span>
          <span><?php echo htmlspecialchars($tendanhmuc); ?></span>
        </div>
        
        <h1 class="article-title"><?php echo htmlspecialchars($tieude); ?></h1>
        
        <div class="article-meta">
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
      </div>
    </div>

    <div class="container">
      <div class="main-content">
        <div class="article-section">
          <?php if (!empty($hinhanh)): ?>
            <img src="assets/images/<?php echo htmlspecialchars($hinhanh); ?>" alt="<?php echo htmlspecialchars($tieude); ?>" class="article-image">
          <?php endif; ?>
          
          <div class="article-content" id="articleContent">
            <?php echo $noidung; ?>
          </div>
          
          <a href="index.php?news=1" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Quay lại danh sách
          </a>
        </div>

        <div class="sidebar">
          <div class="sidebar-widget">
            <h3 class="widget-title">
              <i class="fas fa-list"></i>
              Mục lục
            </h3>
            <ul class="toc-list" id="tocList"></ul>
          </div>

          <div class="sidebar-widget">
            <h3 class="widget-title">
              <i class="fas fa-share-alt"></i>
              Chia sẻ
            </h3>
            <div class="social-share">
              <a href="#" class="social-btn facebook" onclick="shareArticle('facebook')">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-btn twitter" onclick="shareArticle('twitter')">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-btn linkedin" onclick="shareArticle('linkedin')">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a href="#" class="social-btn telegram" onclick="shareArticle('telegram')">
                <i class="fab fa-telegram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <?php $data = $p->getallnews1(); ?>
      <?php if ($data && $data->num_rows > 0): ?>
        <div class="related-posts">
          <h2>Bài viết liên quan</h2>
          <div class="related-grid">
            <?php
              $count = 0;
              $data->data_seek(0);
              while ($rel = $data->fetch_assoc()):
                if ($rel['id_tintuc'] == $ma) continue;
                if ($rel['tendanhmuc'] != $tendanhmuc) continue;
                if ($count >= 3) break;
                $count++;
            ?>
            <div class="related-card">
              <a href="index.php?news&detailid=<?php echo $rel['id_tintuc']; ?>">
                <img src="assets/images/<?php echo htmlspecialchars($rel['hinhanh']); ?>" alt="<?php echo htmlspecialchars($rel['tieude']); ?>">
                <div class="related-card-content">
                  <h4><?php echo htmlspecialchars($rel['tieude']); ?></h4>
                  <p>
                    <?php
                      $mota = isset($rel['mota']) ? $rel['mota'] : $rel['noidung'];
                      echo htmlspecialchars(mb_substr(strip_tags($mota), 0, 100)) . '...';
                    ?>
                  </p>
                </div>
              </a>
            </div>
            <?php endwhile; ?>
          </div>
          
          <?php if ($count === 0): ?>
            <div class="no-content">
              <i class="fas fa-info-circle"></i>
              <p>Không có bài viết liên quan trong danh mục này.</p>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>

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