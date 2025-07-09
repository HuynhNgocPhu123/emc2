function activateCard(card) {
    document.querySelectorAll('.card').forEach(c => {
        c.classList.remove('active');
    });

    card.classList.add('active');

    card.scrollIntoView({
        behavior: 'smooth',
        block: 'center',
        inline: 'center'
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('click', function () {
            activateCard(card);
        });

        card.addEventListener('mouseenter', function () {
            this.style.transform = this.classList.contains('featured') || this.classList.contains('active')
                ? 'translateY(-10px)'
                : 'translateY(-10px)';
        });

        card.addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(0)';
        });
    });
});

