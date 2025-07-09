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

function switchTab(event, tabType) {
    document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
    event.target.classList.add('active');

    const prices = document.querySelectorAll('.price');
    if (tabType === 'yearly') {
        prices[0].textContent = '2.000.000';
        prices[1].textContent = '10.000.000';
        prices[2].textContent = '20.000.000';
    } else {
        prices[0].textContent = '200.000';
        prices[1].textContent = '1.000.000';
        prices[2].textContent = '2.000.000';
    }
}

function selectPackage(packageType) {
    const button = event.target;
    button.style.transform = 'scale(0.95)';
    setTimeout(() => {
        button.style.transform = 'scale(1)';
    }, 150);

    const card = button.closest('.card');
    activateCard(card);

    let packageName = '';
    switch (packageType) {
        case 'starter': packageName = 'Khởi Đầu'; break;
        case 'growth': packageName = 'Tăng Tốc'; break;
        case 'premium': packageName = 'Bứt Phá'; break;
    }

    alert(`Bạn đã chọn gói ${packageName}. Chúng tôi sẽ liên hệ với bạn sớm nhất!`);
}
