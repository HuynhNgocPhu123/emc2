        // Thêm một số animation đơn giản
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.hero-title, .hero-subtitle, .hero-description, .btn, .stats-card, .growth-section-banner');
            
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Filter functionality
        const filterButtons = document.querySelectorAll('.filter-buttons .btn');
        const serviceCards = document.querySelectorAll('.service-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                const filter = button.getAttribute('data-filter');

                serviceCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    
                    if (filter === 'all' || category === filter || category === 'all') {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });

        // Add click effects to service cards
        serviceCards.forEach(card => {
            card.addEventListener('click', () => {
                card.style.transform = 'translateY(-5px) scale(0.98)';
                setTimeout(() => {
                    card.style.transform = '';
                }, 150);
            });
        });

