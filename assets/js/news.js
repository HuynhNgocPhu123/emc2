
  // Lấy tất cả các nút lọc
  const filterButtons = document.querySelectorAll('.filter-btn');

  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Xóa 'active' ở tất cả các nút
      filterButtons.forEach(btn => btn.classList.remove('active'));

      // Thêm 'active' cho nút vừa click
      button.classList.add('active');
    });
  });


// xử lý load bài viết theo danh mục
function filterByCategory(id) {
  const url = new URL(window.location.href);
  if (id === 0) {
    url.searchParams.delete('category');
  } else {
    url.searchParams.set('category', id);
  }
  url.searchParams.set('page', 1); // reset về trang 1
  window.location.href = url.toString();
}

// Xử lý active khi load lại
document.addEventListener("DOMContentLoaded", function () {
  const currentCategory = parseInt(new URLSearchParams(window.location.search).get("category") || 0);
  const buttons = document.querySelectorAll(".filter-btn");

  buttons.forEach(btn => {
    const btnCategory = parseInt(btn.getAttribute("data-category"));
    if (btnCategory === currentCategory) {
      btn.classList.add("active");
    } else {
      btn.classList.remove("active");
    }
  });
});


