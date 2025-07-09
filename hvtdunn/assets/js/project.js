document.addEventListener('DOMContentLoaded', function() {
    const robot = document.querySelector('.robot');
    if (robot) {
        document.addEventListener('mousemove', function(e) {
            const rect = robot.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;

            const angle = Math.atan2(e.clientY - centerY, e.clientX - centerX);
            const dist = Math.min(5, Math.hypot(e.clientX - centerX, e.clientY - centerY) / 50);

            const moveX = Math.cos(angle) * dist;
            const moveY = Math.sin(angle) * dist;

            document.querySelectorAll('.eye').forEach(eye => {
                eye.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });
    }

    const filterBtns = document.querySelectorAll('.filter-btn');
    const items = document.querySelectorAll('.portfolio-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            items.forEach(item => {
                const category = item.dataset.category;
                item.classList.toggle('hidden', filter !== 'all' && category !== filter);
            });
        });
    });

    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    statsSection.querySelectorAll('.stat-number').forEach(el => {
                        const target = parseInt(el.dataset.target);
                        animateCounter(el, target);
                    });

                    statsSection.querySelectorAll('.progress-fill').forEach(el => {
                        const width = parseInt(el.dataset.width);
                        setTimeout(() => el.style.width = width + '%', 500);
                    });
                }
            });
        }, { threshold: 0.5 });

        observer.observe(statsSection);
    }

    function animateCounter(el, target, duration = 2000) {
        let count = 0;
        const step = target / (duration / 16);
        const interval = setInterval(() => {
            count += step;
            if (count >= target) {
                el.textContent = target + (target === 98 ? '%' : '+');
                clearInterval(interval);
            } else {
                el.textContent = Math.floor(count) + (target === 98 ? '%' : '+');
            }
        }, 16);
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll('.review-item');
    const nextButtons = document.querySelectorAll('.arrow-btn.next');
    const prevButtons = document.querySelectorAll('.arrow-btn.prev');
  
    let currentIndex = 0;
  
    function showReview(index) {
      items.forEach((item, i) => {
        item.classList.toggle('active', i === index);
      });
    }
  
    nextButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % items.length;
        showReview(currentIndex);
      });
    });
  
    prevButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showReview(currentIndex);
      });
    });
  
    showReview(currentIndex);
  });
  