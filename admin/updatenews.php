<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
include_once(__DIR__ . '/../controller/getnews.php');
$p = new getnews();

// Lấy bài viết theo ID
$ma = $_REQUEST["id"];
$con = $p->getnewsbyid($ma);

if ($con && $con->num_rows > 0) {
    $r = $con->fetch_assoc();
    $tieudeold = $r["tieude"];
    $noidungold = $r["noidung"];
    $hinhanhold = $r["hinhanh"];
    $tacgiaold = $r['tacgia'];
    $danhmuc = $r['id_danhmuc'];
} else {
    echo "<script>alert('Không tìm thấy bài viết'); window.location.href='newsadmin.php';</script>";
    exit;
}

// Xử lý cập nhật
if (isset($_REQUEST["btnUpdateNews"])) {
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $tacgia = $_POST['tacgia'];
    $id_danhmuc = $_POST['id_danhmuc'];
    $hinhanh = $hinhanhold;

    if (!empty($_FILES["hinhanh"]["name"])) {
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $hinhanh_name = $_FILES["hinhanh"]["name"];
        $hinhanh_tmp = $_FILES["hinhanh"]["tmp_name"];
        $hinhanh_ext = strtolower(pathinfo($hinhanh_name, PATHINFO_EXTENSION));

        if (in_array($hinhanh_ext, $allowed_exts)) {
            $hinhanh_final = time() . "_" . uniqid() . "." . $hinhanh_ext;
            $upload_path = "../assets/images/" . $hinhanh_final;

            if (move_uploaded_file($hinhanh_tmp, $upload_path)) {
                $hinhanh = $hinhanh_final;
                $old_path = "../assets/images/" . $hinhanhold;
                if (file_exists($old_path)) unlink($old_path);
            } else {
                echo "<script>alert('Không thể lưu ảnh mới');</script>";
                exit;
            }
        } else {
            echo "<script>alert('Định dạng ảnh không hợp lệ');</script>";
            exit;
        }
    }

    $result = $p->updateNewsFromForm($ma, $tieude, $noidung, $hinhanh, $tacgia, $id_danhmuc);
    if ($result === true) {
        echo "<script>alert('Cập nhật bài viết thành công'); window.location.href='newsadmin.php';</script>";
    } else {
        echo "<script>alert('Cập nhật thất bại');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sửa Bài Viết</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/addnews.css">
  <style>
    
  </style>
</head>
<body class="bg-gray-50 min-h-screen">

  <!-- Header -->
  <header class="gradient-bg shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
            <i class="fas fa-edit text-blue-600"></i>
          </div>
          <h1 class="text-xl font-bold text-white">Sửa Bài Viết</h1>
        </div>
        <a href="newsadmin.php" class="text-white hover:text-blue-200 font-medium transition flex items-center space-x-2">
          <i class="fas fa-arrow-left"></i>
          <span>Quay lại danh sách</span>
        </a>
      </div>
    </div>
  </header>

  <main class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <!-- Main Content -->
        <div class="lg:col-span-3">
          <div class="glass-morphism rounded-3xl p-8 animate-fadeIn">
            <form action="#" method="POST" enctype="multipart/form-data" id="articleForm">
              
              <!-- Basic Info -->
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="form-group">
                  <input type="text" name="tieude" class="form-input" value="<?= $tieudeold ?>">
                  <label class="floating-label">
                    <i class="fas fa-heading mr-2"></i>Tiêu đề bài viết
                  </label>
                </div>
                
                <div class="form-group">
                  <input type="text" name="tacgia" class="form-input" value="<?= $tacgiaold ?>">
                  <label class="floating-label">
                    <i class="fas fa-user-edit mr-2"></i>Tác giả
                  </label>
                </div>
                
                <div class="form-group">
                  <select name="id_danhmuc" class="form-input" required>
                    <option value="">-- Chọn danh mục --</option>
                    <option value="1" <?= ($danhmuc == 1) ? "selected" : "" ?>>THÔNG CÁO BÁO CHÍ</option>
                    <option value="2" <?= ($danhmuc == 2) ? "selected" : "" ?>>TIN TỨC CÔNG TY</option>
                  </select>
                  <label class="floating-label">
                    <i class="fas fa-folder mr-2"></i>Danh mục
                  </label>
                </div>
                
                <div class="form-group">
                  <img src="../assets/images/<?= $hinhanhold ?>" alt="Hình ảnh" class="w-48 h-auto rounded-xl shadow">
                  <input type="file" name="hinhanh" accept="image/*" class="block w-full p-3 rounded-2xl border border-gray-300 bg-white focus:ring-2 focus:ring-sky-500">
                  <small class="text-gray-500 italic">Không chọn ảnh mới nếu muốn giữ ảnh cũ.</small>
                  <img id="imagePreview" class="image-preview" alt="Preview">
                </div>
              </div>

              <!-- Content Editor -->
              <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                  <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-file-alt mr-2 text-blue-600"></i>
                    Nội dung bài viết
                  </h3>
                  <div class="flex space-x-2">
                    <button type="button" onclick="insertHeading()" class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition text-sm">
                      <i class="fas fa-heading mr-1"></i>Tiêu đề
                    </button>
                    <button type="button" onclick="insertSubheading()" class="px-3 py-1 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition text-sm">
                      <i class="fas fa-h-square mr-1"></i>Phụ đề
                    </button>
                
                  </div>
                </div>
                
                <!-- Editor Toolbar -->
                <div class="editor-toolbar p-3 rounded-t-xl border-b">
                  <div class="flex flex-wrap gap-2">
                    <button type="button" onclick="formatText('bold')" class="p-2 rounded hover:bg-white transition">
                      <i class="fas fa-bold"></i>
                    </button>
                    <button type="button" onclick="formatText('italic')" class="p-2 rounded hover:bg-white transition">
                      <i class="fas fa-italic"></i>
                    </button>
                    <button type="button" onclick="formatText('underline')" class="p-2 rounded hover:bg-white transition">
                      <i class="fas fa-underline"></i>
                    </button>
                    <div class="w-px bg-gray-300 mx-2"></div>
                    <button type="button" onclick="formatText('justifyLeft')" class="p-2 rounded hover:bg-white transition">
                      <i class="fas fa-align-left"></i>
                    </button>
                    <button type="button" onclick="formatText('justifyCenter')" class="p-2 rounded hover:bg-white transition">
                      <i class="fas fa-align-center"></i>
                    </button>
                    <button type="button" onclick="formatText('justifyRight')" class="p-2 rounded hover:bg-white transition">
                      <i class="fas fa-align-right"></i>
                    </button>
                    <div class="w-px bg-gray-300 mx-2"></div>
                    <button type="button" onclick="formatText('insertUnorderedList')" class="p-2 rounded hover:bg-white transition">
                      <i class="fas fa-list-ul"></i>
                    </button>
                    <button type="button" onclick="formatText('insertOrderedList')" class="p-2 rounded hover:bg-white transition">
                      <i class="fas fa-list-ol"></i>
                    </button>
                  </div>
                </div>
                
                <!-- Editor Content -->
                <div id="contentEditor" class="editor-content" contenteditable="true" data-placeholder="Nhập nội dung bài viết của bạn..." style="color: #1f2937;">
                </div>
                
                <!-- Hidden textarea for form submission -->
                <textarea name="noidung" id="hiddenContent" style="display: none;"></textarea>
              </div>

              <!-- Action Buttons -->
              <div class="flex justify-end space-x-4">
                <button type="button" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-medium hover:bg-gray-300 transition">
                  <i class="fas fa-save mr-2"></i><a href="newsadmin.php">Quay lại</a>
                </button>
                <button type="submit" name="btnUpdateNews" class="btn-primary px-8 py-3 text-white rounded-xl font-medium">
                  <i class="fas fa-paper-plane mr-2"></i>Cập nhật bài
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
          <!-- Table of Contents -->
          <div class="glass-morphism rounded-3xl p-6 mb-6 animate-fadeIn">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
              <i class="fas fa-list mr-2 text-blue-600"></i>
              Mục lục
            </h3>
            <div id="tableOfContents" class="space-y-2 text-sm">
              <p class="text-gray-500 italic">Mục lục sẽ được tạo tự động khi bạn thêm tiêu đề vào nội dung.</p>
            </div>
          </div>

          <!-- Writing Tips -->
          <div class="glass-morphism rounded-3xl p-6 animate-fadeIn">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
              <i class="fas fa-lightbulb mr-2 text-yellow-600"></i>
              Mẹo viết bài
            </h3>
            <div class="space-y-3 text-sm text-gray-600">
              <div class="flex items-start space-x-2">
                <i class="fas fa-check text-green-500 mt-1"></i>
                <p>Sử dụng tiêu đề để cấu trúc bài viết</p>
              </div>
              <div class="flex items-start space-x-2">
                <i class="fas fa-check text-green-500 mt-1"></i>
                <p>Thêm hình ảnh chất lượng cao</p>
              </div>
              <div class="flex items-start space-x-2">
                <i class="fas fa-check text-green-500 mt-1"></i>
                <p>Viết đoạn mở đầu thu hút</p>
              </div>
              <div class="flex items-start space-x-2">
                <i class="fas fa-check text-green-500 mt-1"></i>
                <p>Sử dụng danh sách để dễ đọc</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    // Biến toàn cục
    const editor = document.getElementById('contentEditor');
    let isPlaceholderActive = true;

    // Image preview function
    function previewImage(input) {
      const preview = document.getElementById('imagePreview');
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    // Text formatting functions
    function formatText(command) {
      // Xóa placeholder nếu có
      if (isPlaceholderActive) {
        hidePlaceholder();
      }
      
      // Xử lý đặc biệt cho lists
      if (command === 'insertUnorderedList') {
        insertBulletList();
        return;
      }
      
      if (command === 'insertOrderedList') {
        insertNumberedList();
        return;
      }
      
      // Các format khác
      document.execCommand(command, false, null);
      editor.focus();
      updateHiddenContent();
    }

    // Insert bullet list
    function insertBulletList() {
      const ul = document.createElement('ul');
      ul.style.cssText = 'margin: 10px 0; padding-left: 20px; list-style-type: disc;';
      
      const li = document.createElement('li');
      li.style.cssText = 'margin: 5px 0; list-style-type: disc;';
      li.textContent = 'Mục danh sách';
      
      ul.appendChild(li);
      editor.appendChild(ul);
      
      // Focus vào li và select text
      li.focus();
      const range = document.createRange();
      range.selectNodeContents(li);
      const selection = window.getSelection();
      selection.removeAllRanges();
      selection.addRange(range);
      
      // Event để thêm item mới khi nhấn Enter
      li.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          const newLi = document.createElement('li');
          newLi.style.cssText = 'margin: 5px 0; list-style-type: disc;';
          newLi.textContent = 'Mục danh sách mới';
          ul.appendChild(newLi);
          
          // Focus vào li mới
          newLi.focus();
          const range = document.createRange();
          range.selectNodeContents(newLi);
          const selection = window.getSelection();
          selection.removeAllRanges();
          selection.addRange(range);
          
          // Thêm event cho li mới
          addListItemEvents(newLi, ul);
        }
      });
      
      addListItemEvents(li, ul);
      updateHiddenContent();
    }

    // Insert numbered list
    function insertNumberedList() {
      const ol = document.createElement('ol');
      ol.style.cssText = 'margin: 10px 0; padding-left: 20px; list-style-type: decimal;';
      
      const li = document.createElement('li');
      li.style.cssText = 'margin: 5px 0; list-style-type: decimal;';
      li.textContent = 'Mục danh sách';
      
      ol.appendChild(li);
      editor.appendChild(ol);
      
      // Focus vào li và select text
      li.focus();
      const range = document.createRange();
      range.selectNodeContents(li);
      const selection = window.getSelection();
      selection.removeAllRanges();
      selection.addRange(range);
      
      // Event để thêm item mới khi nhấn Enter
      li.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          const newLi = document.createElement('li');
          newLi.style.cssText = 'margin: 5px 0; list-style-type: decimal;';
          newLi.textContent = 'Mục danh sách mới';
          ol.appendChild(newLi);
          
          // Focus vào li mới
          newLi.focus();
          const range = document.createRange();
          range.selectNodeContents(newLi);
          const selection = window.getSelection();
          selection.removeAllRanges();
          selection.addRange(range);
          
          // Thêm event cho li mới
          addListItemEvents(newLi, ol);
        }
      });
      
      addListItemEvents(li, ol);
      updateHiddenContent();
    }

    // Add events to list items
    function addListItemEvents(li, parentList) {
      li.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          const newLi = document.createElement('li');
          newLi.style.cssText = li.style.cssText;
          newLi.textContent = 'Mục danh sách mới';
          parentList.appendChild(newLi);
          
          // Focus vào li mới
          newLi.focus();
          const range = document.createRange();
          range.selectNodeContents(newLi);
          const selection = window.getSelection();
          selection.removeAllRanges();
          selection.addRange(range);
          
          // Thêm event cho li mới
          addListItemEvents(newLi, parentList);
        }
      });
      
      li.addEventListener('input', function() {
        updateHiddenContent();
      });
    }

    // Insert heading
    function insertHeading() {
      // Xóa placeholder nếu có
      if (isPlaceholderActive) {
        hidePlaceholder();
      }
      
      // Tạo heading mới
      const heading = document.createElement('h2');
      heading.style.cssText = 'font-size: 1.5em; font-weight: bold; margin: 20px 0 10px 0; color: #1f2937;';
      heading.textContent = '[Nhập tiêu đề ở đây]';
      heading.contentEditable = true;
      
      // Thêm vào editor
      editor.appendChild(heading);
      
      // Focus và select text
      heading.focus();
      const range = document.createRange();
      range.selectNodeContents(heading);
      const selection = window.getSelection();
      selection.removeAllRanges();
      selection.addRange(range);
      
      // Xóa text khi bắt đầu gõ
      heading.addEventListener('focus', function() {
        if (this.textContent === '[Nhập tiêu đề ở đây]') {
          this.textContent = '';
        }
      });
      
      // Khôi phục text nếu để trống
      heading.addEventListener('blur', function() {
        if (this.textContent.trim() === '') {
          this.textContent = '[Nhập tiêu đề ở đây]';
        }
        generateTOC();
      });
      
      updateHiddenContent();
      generateTOC();
    }

    // Insert subheading
    function insertSubheading() {
      // Xóa placeholder nếu có
      if (isPlaceholderActive) {
        hidePlaceholder();
      }
      
      // Tạo subheading mới
      const subheading = document.createElement('h3');
      subheading.style.cssText = 'font-size: 1.25em; font-weight: 600; margin: 15px 0 8px 0; color: #374151;';
      subheading.textContent = '[Nhập phụ đề ở đây]';
      subheading.contentEditable = true;
      
      // Thêm vào editor
      editor.appendChild(subheading);
      
      // Focus và select text
      subheading.focus();
      const range = document.createRange();
      range.selectNodeContents(subheading);
      const selection = window.getSelection();
      selection.removeAllRanges();
      selection.addRange(range);
      
      // Xóa text khi bắt đầu gõ
      subheading.addEventListener('focus', function() {
        if (this.textContent === '[Nhập phụ đề ở đây]') {
          this.textContent = '';
        }
      });
      
      // Khôi phục text nếu để trống
      subheading.addEventListener('blur', function() {
        if (this.textContent.trim() === '') {
          this.textContent = '[Nhập phụ đề ở đây]';
        }
        generateTOC();
      });
      
      updateHiddenContent();
      generateTOC();
    }

    // Generate table of contents
    function generateTOC() {
      const headings = editor.querySelectorAll('h1, h2, h3, h4, h5, h6');
      const toc = document.getElementById('tableOfContents');
      
      if (headings.length === 0) {
        toc.innerHTML = '<p class="text-gray-500 italic">Mục lục sẽ được tạo tự động khi bạn thêm tiêu đề vào nội dung.</p>';
        return;
      }
      
      toc.innerHTML = '';
      headings.forEach((heading, index) => {
        // Bỏ qua heading có nội dung placeholder
        if (heading.textContent === '[Nhập tiêu đề ở đây]' || heading.textContent === '[Nhập phụ đề ở đây]') {
          return;
        }
        
        const id = `heading-${index}`;
        heading.id = id;
        
        const tocItem = document.createElement('div');
        tocItem.className = 'toc-item';
        tocItem.innerHTML = `
          <a href="#${id}" class="block text-gray-700 hover:text-blue-600 transition">
            ${heading.tagName === 'H2' ? '• ' : '  ◦ '}${heading.textContent}
          </a>
        `;
        
        tocItem.addEventListener('click', (e) => {
          e.preventDefault();
          heading.scrollIntoView({ behavior: 'smooth' });
        });
        
        toc.appendChild(tocItem);
      });
      
      // Nếu không có heading nào có nội dung thật, hiển thị thông báo
      if (toc.innerHTML === '') {
        toc.innerHTML = '<p class="text-gray-500 italic">Mục lục sẽ được tạo tự động khi bạn thêm tiêu đề vào nội dung.</p>';
      }
    }

    // Function to load existing content
    function loadExistingContent() {
      const existingContent = <?= json_encode($noidungold) ?>;
      
      if (existingContent && existingContent.trim() !== '') {
        // Xóa placeholder
        isPlaceholderActive = false;
        
        // Set nội dung vào editor
        editor.innerHTML = existingContent;
        
        // Xử lý các heading có sẵn để tạo mục lục
        processExistingHeadings();
        
        // Xử lý các list có sẵn
        processExistingLists();
        
        // Cập nhật hidden content
        updateHiddenContent();
        
        // Tạo mục lục từ nội dung có sẵn
        generateTOC();
      } else {
        // Nếu không có nội dung, hiển thị placeholder
        showPlaceholder();
      }
    }

    // Function to process existing headings
    function processExistingHeadings() {
      const headings = editor.querySelectorAll('h1, h2, h3, h4, h5, h6');
      
      headings.forEach((heading, index) => {
        // Đảm bảo heading có thể edit được
        heading.contentEditable = true;
        
        // Thêm style cho heading nếu chưa có
        if (!heading.style.cssText) {
          if (heading.tagName === 'H2') {
            heading.style.cssText = 'font-size: 1.5em; font-weight: bold; margin: 20px 0 10px 0; color: #1f2937;';
          } else if (heading.tagName === 'H3') {
            heading.style.cssText = 'font-size: 1.25em; font-weight: 600; margin: 15px 0 8px 0; color: #374151;';
          } else if (heading.tagName === 'H1') {
            heading.style.cssText = 'font-size: 2em; font-weight: bold; margin: 25px 0 15px 0; color: #111827;';
          } else if (heading.tagName === 'H4') {
            heading.style.cssText = 'font-size: 1.125em; font-weight: 600; margin: 12px 0 6px 0; color: #4b5563;';
          } else if (heading.tagName === 'H5') {
            heading.style.cssText = 'font-size: 1em; font-weight: 600; margin: 10px 0 5px 0; color: #6b7280;';
          } else if (heading.tagName === 'H6') {
            heading.style.cssText = 'font-size: 0.875em; font-weight: 600; margin: 8px 0 4px 0; color: #9ca3af;';
          }
        }
        
        // Thêm event listeners cho heading
        heading.addEventListener('blur', function() {
          generateTOC();
        });
        
        heading.addEventListener('input', function() {
          updateHiddenContent();
          setTimeout(generateTOC, 100);
        });
      });
    }

    // Function to process existing lists
    function processExistingLists() {
      const lists = editor.querySelectorAll('ul, ol');
      
      lists.forEach(list => {
        // Thêm style cho list nếu chưa có
        if (!list.style.cssText) {
          list.style.cssText = 'margin: 10px 0; padding-left: 20px;';
          if (list.tagName === 'UL') {
            list.style.listStyleType = 'disc';
          } else if (list.tagName === 'OL') {
            list.style.listStyleType = 'decimal';
          }
        }
        
        // Xử lý các li trong list
        const listItems = list.querySelectorAll('li');
        listItems.forEach(li => {
          // Thêm style cho li nếu chưa có
          if (!li.style.cssText) {
            li.style.cssText = 'margin: 5px 0;';
            if (list.tagName === 'UL') {
              li.style.listStyleType = 'disc';
            } else if (list.tagName === 'OL') {
              li.style.listStyleType = 'decimal';
            }
          }
          
          // Thêm event listeners cho li
          addListItemEvents(li, list);
        });
      });
    }

    // Add placeholder functionality
    function showPlaceholder() {
      const existingContent = <?= json_encode($noidungold) ?>;
      
      if (!existingContent || existingContent.trim() === '') {
        if (editor.textContent.trim() === '' || isPlaceholderActive) {
          editor.innerHTML = '<span style="color: #9ca3af; font-style: italic;">Nhập nội dung bài viết của bạn...</span>';
          isPlaceholderActive = true;
        }
      }
    }

    function hidePlaceholder() {
      if (isPlaceholderActive) {
        editor.innerHTML = '';
        isPlaceholderActive = false;
      }
    }

    // Update hidden textarea before form submission
    function updateHiddenContent() {
      const editorContent = editor.innerHTML;
      document.getElementById('hiddenContent').value = editorContent;
    }

    // Khi người dùng nhấn submit thì cập nhật hidden content
    document.getElementById('articleForm').addEventListener('submit', function () {
      updateHiddenContent();
    });

    // Load nội dung ban đầu từ PHP
    window.addEventListener('DOMContentLoaded', function () {
      loadExistingContent();
    });

    // Nếu người dùng focus vào content editor và nó chứa placeholder thì xóa
    editor.addEventListener('focus', function () {
      hidePlaceholder();
    });

    // Nếu blur và không có nội dung thì hiển thị lại placeholder
    editor.addEventListener('blur', function () {
      if (editor.innerText.trim() === '') {
        showPlaceholder();
      }
    });
  </script>

</body>
</html>
