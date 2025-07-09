<!-- PHẦN HEADER -->
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
    <div class="menu-toggle" id="menu-toggle">
      <i class="fas fa-bars"></i>
    </div>
    <nav class="nav-menu" id="nav-menu">
      <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li class="has-service-dropdown" id="emc-service-dropdown-parent">
          <a href="index.php?service">Dịch Vụ</a>
          <div class="emc-service-dropdown" id="emc-service-dropdown">
            <!-- SIDEBAR DỌC -->
            <div class="emc-sidebar-menu">
              <ul>
                <li class="emc-sidebar-item active" data-category="0">
                  
                  <span>Tất Cả</span>
                </li>
                <li class="emc-sidebar-item" data-category="1">
                  
                  <span>Công Nghệ</span>
                </li>
                <li class="emc-sidebar-item" data-category="2">
                
                  <span>Marketing</span>
                </li>
                <li class="emc-sidebar-item" data-category="3">
   
                  <span>Media</span>
                </li>
              </ul>
            </div>
            <!-- TABLE/GRID DỊCH VỤ -->
            <div class="emc-service-grid" id="emc-service-grid-container"></div>
          </div>
        </li>
        <li><a href="index.php?project">Dự án</a></li>
        <li><a href="index.php?promotion">Khuyến mãi</a></li>
        <li><a href="index.php?news">Tin tức</a></li>
        <li><a href="index.php?contact">Liên hệ</a></li>
      </ul>
    </nav>
    <div class="header-icons">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
      <a href="#"><i class="fab fa-tiktok"></i></a>
    </div>
  </div>
</header>

<!-- JS: MOBILE MENU -->
<script>
  const toggle = document.getElementById('menu-toggle');
  const menu = document.getElementById('nav-menu');
  toggle.addEventListener('click', () => {
    menu.classList.toggle('active');
    toggle.classList.toggle('active');
  });
</script>
<script src="assets/js/header.js"></script>

<!-- PHP: lấy dữ liệu dịch vụ từng nhóm -->
<?php
include_once("controller/getservice.php");
$p = new Gservice();
$allServices = [];
for($cat=1;$cat<=3;$cat++){
    $arr = [];
    $services = $p->getdichvubydanhmuc($cat);
    if ($services && $services != false) {
        while ($row = $services->fetch_assoc()) {
            $arr[] = [
                'id' => $row['id_dichvu'],
                'title' => $row['tendichvu'],
                'desc' => $row['mota'],
                'icon' => $row['icon'] ?? 'seo'
            ];
        }
    }
    $allServices[$cat] = $arr;
}
$allAll = [];
foreach($allServices as $arr) foreach($arr as $sv) $allAll[] = $sv;
$allServices[0] = $allAll;
?>
<script>
const allServices = <?php echo json_encode($allServices, JSON_UNESCAPED_UNICODE); ?>;
const groupNames = {0: 'Tất Cả', 1: 'Công Nghệ', 2: 'Marketing', 3: 'Media'};

function renderServiceGrid(categoryId) {
  const container = document.getElementById('emc-service-grid-container');
  let html = '';
  if(categoryId == 0){
    const arr = allServices[0] || [];
    if(arr.length==0){
      container.innerHTML = '<p style="color:#888;">Chưa có dịch vụ.</p>'; return;
    }
    html = '<div class="emc-service-all-grid">';
    arr.forEach(sv=>{
      html += `
        <div class="emc-service-cell">
          <a href="index.php?service&detailservice=${encodeURIComponent(sv.id)}">
            <img src="assets/images/icons/${sv.icon}.png" alt="${sv.title}">
            <b>${sv.title}</b>
            <div class="desc">${sv.desc}</div>
          </a>
        </div>
      `;
    });
    html += '</div>';
  } else {
    for(let cat=1;cat<=3;cat++){
      if(categoryId > 0 && cat != categoryId) continue;
      const arr = allServices[cat] || [];
      if(arr.length == 0) continue;
      html += `<div class="emc-service-group-row"><div class="emc-group-title">${groupNames[cat]}</div><div class="emc-group-list">`;
      arr.forEach(sv=>{
        html += `
          <div class="emc-service-cell">
            <a href="index.php?service&detailservice=${encodeURIComponent(sv.id)}">
              <img src="assets/images/icons/${sv.icon}.png" alt="${sv.title}">
              <b>${sv.title}</b>
              <div class="desc">${sv.desc}</div>
            </a>
          </div>
        `;
      });
      html += `</div></div>`;
    }
    if(html == '') html = '<p style="color:#888;">Chưa có dịch vụ.</p>';
  }
  container.innerHTML = html;
}

document.addEventListener('DOMContentLoaded', function(){
  renderServiceGrid(0);
  document.querySelectorAll('.emc-sidebar-item').forEach(function(btn){
    btn.addEventListener('click', function(){
      document.querySelectorAll('.emc-sidebar-item').forEach(b=>b.classList.remove('active'));
      btn.classList.add('active');
      renderServiceGrid(parseInt(btn.dataset.category));
    });
  });
  // Giữ drop-menu khi hover, chỉ mất khi mouseleave
  const parent = document.getElementById('emc-service-dropdown-parent');
  const dropdown = document.getElementById('emc-service-dropdown');
  let hoverTimeout = null;
  parent.addEventListener('mouseenter', function(){ clearTimeout(hoverTimeout); dropdown.style.display = 'flex'; });
  dropdown.addEventListener('mouseenter', function(){ clearTimeout(hoverTimeout); dropdown.style.display = 'flex'; });
  parent.addEventListener('mouseleave', function(){
    hoverTimeout = setTimeout(()=>dropdown.style.display='none', 120);
  });
  dropdown.addEventListener('mouseleave', function(){
    hoverTimeout = setTimeout(()=>dropdown.style.display='none', 120);
  });
});
</script>

<style>
  /* Service Dropdown Styles - DARK THEME */
.has-service-dropdown { 
  position: relative; 
}

.emc-service-dropdown {
  display: none;
  position: fixed;
  top: 60px; 
  left: 50%;
  transform: translateX(-50%);
  min-width: 750px;
  background: #1a1a1a;
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.4), 0 1.5px 8px rgba(0,0,0,0.3);
  border: 1px solid #333;
  z-index: 2000;
  padding: 0;
  flex-direction: row;
}

/* SIDEBAR MENU - DARK THEME */
.emc-sidebar-menu {
  min-width: 170px;
  max-width: 190px;
  border-right: 1px solid #333;
  background: #0f0f0f;
  padding: 24px 0 24px 14px;
  border-radius: 16px 0 0 16px;
  /* QUAN TRỌNG: Đảm bảo hiển thị dọc */
  display: flex;
  flex-direction: column;
}

.emc-sidebar-menu ul { 
  list-style: none; 
  padding: 0; 
  margin: 0; 
  width: 100%;
  /* QUAN TRỌNG: Đảm bảo ul cũng hiển thị dọc */
  display: flex;
  flex-direction: column;
}

.emc-sidebar-item {
  /* QUAN TRỌNG: Đảm bảo mỗi item hiển thị dọc */
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  padding: 12px 12px 12px 0;
  border-radius: 8px;
  font-weight: 500;
  color: #e0e0e0;
  transition: background 0.2s, color 0.2s;
  font-size: 15px;
  margin-bottom: 8px;
  min-width: 120px;
  background: none;
  border: none;
  width: 100%;
  justify-content: flex-start;
}

.emc-sidebar-item img { 
  width: 28px; 
  height: 28px; 
  margin-right: 7px;
  flex-shrink: 0;
}

.emc-sidebar-item span {
  white-space: nowrap;
}

.emc-sidebar-item.active,
.emc-sidebar-item:hover {
  background: #1DA1F2;
  color: #fff;
}

/* SERVICE GRID - DARK THEME */
.emc-service-grid {
  flex: 1;
  padding: 24px 20px;
  min-width: 500px;
  max-height: 400px;
  overflow-y: auto;
  background: #1a1a1a;
}

.emc-service-group-row { 
  margin-bottom: 20px;
  display: block;
}

.emc-group-title {
  font-weight: bold; 
  font-size: 16px; 
  color: #1DA1F2; 
  margin-bottom: 12px;
  padding-left: 4px;
}

.emc-group-list {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 cột */
  gap: 16px;
  align-items: start;
}

.emc-service-cell {
  background: #2a2a2a;
  border-radius: 12px;
  padding: 16px;
  min-height: 110px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.3);
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  transition: all 0.2s ease;
  border: 1px solid #333;
}

.emc-service-cell:hover {
  box-shadow: 0 4px 16px rgba(29, 161, 242, 0.3);
  transform: translateY(-2px);
  border-color: #1DA1F2;
  background: #333;
}

.emc-service-cell a {
  text-decoration: none;
  color: inherit;
  display: block;
  width: 100%;
}

.emc-service-cell img { 
  width: 32px; 
  height: 32px; 
  margin-bottom: 8px;
  border-radius: 4px;
}

.emc-service-cell b { 
  font-size: 15px; 
  color: #1DA1F2;
  margin-bottom: 4px;
  display: block;
}

.emc-service-cell .desc { 
  color: #bbb; 
  font-size: 13px; 
  line-height: 1.4;
  margin-top: 4px;
}

/* All grid for category 0 */
.emc-service-all-grid { 
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 cột */
  gap: 16px;
}

/* Responsive */
@media (max-width: 1100px) {
  .emc-service-dropdown { 
    min-width: 90vw; 
    left: 50%;
    transform: translateX(-50%);
    top: 90px;
  }
  .emc-group-list,
  .emc-service-all-grid { 
    grid-template-columns: repeat(2, 1fr); /* 2 cột trên tablet */
  }
}

@media (max-width: 800px) {
  .emc-service-dropdown { 
    flex-direction: column;
    min-width: 95vw;
    left: 50%;
    transform: translateX(-50%);
    top: 80px;
  }
  
  .emc-sidebar-menu { 
    border: none; 
    border-bottom: 1px solid #eee; 
    min-width: unset;
    max-width: unset;
    /* QUAN TRỌNG: Trên mobile chuyển thành ngang để tiết kiệm không gian */
    flex-direction: row;
    padding: 16px;
    overflow-x: auto;
  }
  
  .emc-sidebar-menu ul {
    /* QUAN TRỌNG: Trên mobile chuyển thành ngang */
    flex-direction: row;
    gap: 8px;
    white-space: nowrap;
  }
  
  .emc-sidebar-item { 
    border-radius: 8px; 
    font-size: 14px; 
    margin-bottom: 0;
    margin-right: 8px;
    min-width: 100px;
    flex-shrink: 0;
  }
  
  .emc-group-list,
  .emc-service-all-grid { 
    grid-template-columns: 1fr; /* 1 cột trên mobile */
  }
}

@media (max-width: 600px) {
  .emc-service-dropdown {
    left: 50%;
    transform: translateX(-50%);
    top: 70px;
  }
}
</style>