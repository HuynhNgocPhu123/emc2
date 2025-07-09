// Thêm hiệu ứng loading khi chuyển trang
        document.addEventListener('DOMContentLoaded', function() {
            const paginationLinks = document.querySelectorAll('.pagination a');
            paginationLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Thêm loading spinner nếu cần
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang tải...';
                });
            });
        });

        // Thêm hiệu ứng hover cho các nút
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Toggle dropdown menu
        function toggleDropdown(btn) {
            const dropdown = btn.nextElementSibling;
            const allDropdowns = document.querySelectorAll('.dropdown-menu');
            
            // Đóng tất cả dropdown khác
            allDropdowns.forEach(menu => {
                if (menu !== dropdown) {
                    menu.classList.remove('show');
                }
            });
            
            // Toggle dropdown hiện tại
            dropdown.classList.toggle('show');
            
            // Kiểm tra vị trí và điều chỉnh dropdown nếu cần
            if (dropdown.classList.contains('show')) {
                const rect = dropdown.getBoundingClientRect();
                const tableContainer = dropdown.closest('.table-container');
                const containerRect = tableContainer.getBoundingClientRect();
                
                // Nếu dropdown vượt quá bottom của container, hiển thị lên trên
                if (rect.bottom > containerRect.bottom) {
                    dropdown.style.top = 'auto';
                    dropdown.style.bottom = '100%';
                    dropdown.style.marginTop = '0';
                    dropdown.style.marginBottom = '5px';
                } else {
                    dropdown.style.top = '100%';
                    dropdown.style.bottom = 'auto';
                    dropdown.style.marginTop = '5px';
                    dropdown.style.marginBottom = '0';
                }
            }
        }

        // Đóng dropdown khi click bên ngoài
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.action-dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
            }
        });

        // Toggle content preview
        function toggleContent(btn) {
            const contentDiv = btn.previousElementSibling;
            const fullContent = btn.getAttribute('data-full');
            const shortContent = fullContent.substring(0, 50) + (fullContent.length > 50 ? '...' : '');
            
            if (contentDiv.textContent.includes('...')) {
                contentDiv.textContent = fullContent;
                btn.innerHTML = '<i class="fas fa-compress-alt"></i>';
                btn.title = 'Thu gọn';
            } else {
                contentDiv.textContent = shortContent;
                btn.innerHTML = '<i class="fas fa-expand-alt"></i>';
                btn.title = 'Mở rộng';
            }
        }

        // Thêm animation cho rows
        document.querySelectorAll('tbody tr').forEach((row, index) => {
            row.style.animation = `fadeInUp 0.6s ease-out ${index * 0.1}s both`;
        });