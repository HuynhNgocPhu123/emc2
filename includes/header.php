<link rel="stylesheet" href="assets/css/header.css">
<link href="https://fonts.googleapis.com/css2?family=Afacad&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=MuseoModerno&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">

<header class="main-header">
  <div class="container5">
    <!-- Logo -->
    <div class="logo">
      <a href="index.php">EMC<span>Group</span></a>
    </div>

    <!-- Menu Toggle (Mobile) -->
    <div class="menu-toggle" id="menu-toggle">
      <i class="fas fa-bars"></i>
    </div>

    <!-- Navigation -->
    <nav class="nav-menu" id="nav-menu">
      <ul>
      <li><a href="index.php">Trang chủ</a></li>
        <li><a href="index.php?service">Dịch Vụ</a></li>
        <li><a href="index.php?project">Dự án</a></li>
        <li><a href="index.php?promotion">Khuyến mãi</a></li>
        <li><a href="index.php?news">Tin tức</a></li>
        <li><a href="index.php?contact">Liên hệ</a></li>
      </ul>
    </nav>

    <!-- Social Icons -->
    <div class="header-icons">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
      <a href="#"><i class="fab fa-tiktok"></i></a>
    </div>
  </div>
</header>

<!-- JavaScript Toggle Menu -->
<script>
  const toggle = document.getElementById('menu-toggle');
  const menu = document.getElementById('nav-menu');

  toggle.addEventListener('click', () => {
    menu.classList.toggle('active');
    toggle.classList.toggle('active');
  });
</script>
<script src="assets/js/header.js"></script>