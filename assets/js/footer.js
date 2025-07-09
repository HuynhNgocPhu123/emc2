function toggleSection(button) {
    const footerLinks = button.nextElementSibling.nextElementSibling;
    const isActive = footerLinks.classList.contains('active');
    
    // Close all sections
    document.querySelectorAll('.footer-links').forEach(links => {
        links.classList.remove('active');
    });
    
    document.querySelectorAll('.mobile-toggle').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Toggle current section
    if (!isActive) {
        footerLinks.classList.add('active');
        button.classList.add('active');
    }
}

// Initialize mobile view
function initializeMobileView() {
    if (window.innerWidth <= 768) {
        document.querySelectorAll('.footer-links').forEach((links, index) => {
            if (index > 0) { // Skip first section (company info)
                links.classList.remove('active');
            }
        });
    }
}

// Run on load and resize
window.addEventListener('load', initializeMobileView);
window.addEventListener('resize', initializeMobileView);