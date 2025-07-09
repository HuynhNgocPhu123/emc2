document.addEventListener('DOMContentLoaded', function() {
    const serviceList = document.getElementById('serviceList');
    const categoryTabs = document.getElementById('categoryTabs');
    const categorySelect = document.getElementById('categorySelect');
    const serviceItems = document.querySelectorAll('.services-by-category-section .service-item'); // Target specific service-items

    if (serviceList) {
        const prevButton = document.querySelector('.prev-main');
        const nextButton = document.querySelector('.next-main');

        function getScrollAmount() {
            const firstCard = serviceList.querySelector('.service-item');
            if (!firstCard) return 0;

            const cardWidth = firstCard.offsetWidth;
            const style = window.getComputedStyle(serviceList);
            const gap = parseFloat(style.getPropertyValue('gap')) || 0; 

            let cardsToScroll = 0;
            if (window.innerWidth >= 992) {
                cardsToScroll = 3; 
            } else if (window.innerWidth >= 768) {
                cardsToScroll = 2;
            } else {
                cardsToScroll = 1;
            }
            return (cardWidth + gap) * cardsToScroll;
        }

        nextButton.addEventListener('click', () => {
            serviceList.scrollBy({
                left: getScrollAmount(),
                behavior: 'smooth'
            });
        });

        prevButton.addEventListener('click', () => {
            serviceList.scrollBy({
                left: -getScrollAmount(),
                behavior: 'smooth'
            });
        });

        function checkScrollEnds() {
            if (prevButton) {
                prevButton.disabled = serviceList.scrollLeft <= 1; 
            }
            if (nextButton) {
                nextButton.disabled = (serviceList.scrollLeft + serviceList.clientWidth) >= (serviceList.scrollWidth - 1);
            }
        }

        serviceList.addEventListener('scroll', checkScrollEnds);
        window.addEventListener('resize', () => {
            checkScrollEnds();
        });
        checkScrollEnds(); 
    }

    function filterServices(category) {
        serviceItems.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });

        if (serviceList) {
            serviceList.scrollLeft = 0;
            if (serviceList.id === 'serviceList') { 
                const prevButton = document.querySelector('.prev-main');
                const nextButton = document.querySelector('.next-main');
                if (prevButton && nextButton) {
                    prevButton.disabled = serviceList.scrollLeft <= 1;
                    nextButton.disabled = (serviceList.scrollLeft + serviceList.clientWidth) >= (serviceList.scrollWidth - 1);
                }
            }
        }
    }

    if (categoryTabs) {
        categoryTabs.addEventListener('click', function(event) {
            if (event.target.classList.contains('tab-button')) {
                const currentActive = categoryTabs.querySelector('.tab-button.active');
                if (currentActive) {
                    currentActive.classList.remove('active');
                }
                event.target.classList.add('active');
                const category = event.target.dataset.category;
                filterServices(category);
            }
        });
    }

    if (categorySelect) {
        categorySelect.addEventListener('change', function(event) {
            const category = event.target.value;
            filterServices(category);

            if (categoryTabs) {
                const currentActive = categoryTabs.querySelector('.tab-button.active');
                if (currentActive) {
                    currentActive.classList.remove('active');
                }
                const correspondingTab = categoryTabs.querySelector(`.tab-button[data-category="${category}"]`);
                if (correspondingTab) {
                    correspondingTab.classList.add('active');
                }
            }
        });
    }

    filterServices('all');

    function getPlanCardScrollAmount(carouselTrack) {
        const firstPlanCard = carouselTrack.querySelector('.plan-card');
        if (!firstPlanCard) return 0;

        const cardWidth = firstPlanCard.offsetWidth;
        const style = window.getComputedStyle(carouselTrack);
        const gap = parseFloat(style.getPropertyValue('gap')) || 0;

        let cardsToScroll = 0;
        if (window.innerWidth >= 1025) {
            cardsToScroll = 3;
        } else if (window.innerWidth >= 768) {
            cardsToScroll = 2;
        } else {
            cardsToScroll = 1;
        }
        return (cardWidth + gap) * cardsToScroll;
    }
    

    document.querySelectorAll('.service-carousel').forEach(carouselSection => {
        const carouselTrack = carouselSection.querySelector('.carousel-track');
        const prevBtn = carouselSection.querySelector('.carousel-nav.prev');
        const nextBtn = carouselSection.querySelector('.carousel-nav.next');

        if (carouselTrack && prevBtn && nextBtn) {
            nextBtn.addEventListener('click', () => {
                carouselTrack.scrollBy({ left: getPlanCardScrollAmount(carouselTrack), behavior: 'smooth' });
            });

            prevBtn.addEventListener('click', () => {
                carouselTrack.scrollBy({ left: -getPlanCardScrollAmount(carouselTrack), behavior: 'smooth' });
            });

            function checkSecondaryCarouselEnds() {
                if (prevBtn) {
                    prevBtn.disabled = carouselTrack.scrollLeft <= 1;
                }
                if (nextBtn) {
                    nextBtn.disabled = (carouselTrack.scrollLeft + carouselTrack.clientWidth) >= (carouselTrack.scrollWidth - 1);
                }
            }
            carouselTrack.addEventListener('scroll', checkSecondaryCarouselEnds);
            window.addEventListener('resize', () => {
                checkSecondaryCarouselEnds();
            });
            checkSecondaryCarouselEnds();
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const icon = item.querySelector('.faq-icon');

        question.addEventListener('click', () => {
            const wasActive = item.classList.contains('active');

            faqItems.forEach(otherItem => {
                if (otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('.faq-answer').style.maxHeight = "0";
                    otherItem.querySelector('.faq-icon').textContent = '>'; 
                }
            });

            if (!wasActive) { 
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + "px"; 
                icon.textContent = '^'; 
            } else { 
                item.classList.remove('active');
                answer.style.maxHeight = "0"; 
                icon.textContent = '>';
            }
        });
    });

});
document.addEventListener("DOMContentLoaded", function () {
    const categoryButtons = Array.from(document.querySelectorAll(".filter-bar .category-button"));
    const sortSelect = document.getElementById("jsSort");
    const container = document.querySelector(".service-list");
    const prevPageBtn = document.querySelector(".pagination-arrow.prev-page");
    const nextPageBtn = document.querySelector(".pagination-arrow.next-page");
    const paginationDotsContainer = document.querySelector(".pagination-dots");

    const cardsPerPage = 6; 
    let currentPage = 1;
    let allServiceCards = [];
    let currentFilteredCards = [];

  allServiceCards = Array.from(document.querySelectorAll(".service-item"));

    function renderPaginationDots() {
        paginationDotsContainer.innerHTML = ''; 
        const totalPages = Math.ceil(currentFilteredCards.length / cardsPerPage);

        if (totalPages <= 1) {
            paginationDotsContainer.style.display = 'none';
            prevPageBtn.style.display = 'none';
            nextPageBtn.style.display = 'none';
            return;
        } else {
            paginationDotsContainer.style.display = 'flex';
            prevPageBtn.style.display = 'block';
            nextPageBtn.style.display = 'block';
        }

        for (let i = 1; i <= totalPages; i++) {
            const dot = document.createElement("span");
            dot.classList.add("dot");
            if (i === currentPage) {
                dot.classList.add("active");
            }
            dot.dataset.page = i;
            dot.addEventListener("click", function() {
                currentPage = parseInt(this.dataset.page);
                displayCardsForPage();
                updatePaginationControls();
            });
            paginationDotsContainer.appendChild(dot);
        }
    }

    function displayCardsForPage() {
        allServiceCards.forEach(card => card.style.display = 'none');

        const startIndex = (currentPage - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;
        const cardsToDisplay = currentFilteredCards.slice(startIndex, endIndex);

        requestAnimationFrame(() => {
            cardsToDisplay.forEach(card => card.style.display = 'block'); 
        });
    }

    function updatePaginationControls() {
        const totalPages = Math.ceil(currentFilteredCards.length / cardsPerPage);

        if (currentPage === 1 || totalPages === 0) {
            prevPageBtn.classList.add("disabled");
        } else {
            prevPageBtn.classList.remove("disabled");
        }

        if (currentPage === totalPages || totalPages === 0) {
            nextPageBtn.classList.add("disabled");
        } else {
            nextPageBtn.classList.remove("disabled");
        }

        renderPaginationDots();
    }

    function applyFilterAndSort() {
        const selectedCategoryButton = document.querySelector(".filter-bar .category-button.active");
        const selectedCategory = selectedCategoryButton ? selectedCategoryButton.dataset.category : "all";
        
        const sortOrder = sortSelect.value;

        let filtered = selectedCategory === "all"
            ? [...allServiceCards] 
            : allServiceCards.filter(card => card.dataset.category === selectedCategory);

        if (sortOrder === "asc") {
            filtered.sort((a, b) =>
                a.querySelector("h3").textContent.localeCompare(b.querySelector("h3").textContent)
            );
        } else if (sortOrder === "desc") {
            filtered.sort((a, b) =>
                b.querySelector("h3").textContent.localeCompare(a.querySelector("h3").textContent)
            );
        }

        currentFilteredCards = filtered; 
        currentPage = 1;
        displayCardsForPage();
        updatePaginationControls();
    }

    // Event listeners
    categoryButtons.forEach(button => {
        button.addEventListener("click", function() {
            categoryButtons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
            applyFilterAndSort();
        });
    });

    sortSelect.addEventListener("change", applyFilterAndSort);

    prevPageBtn.addEventListener("click", function() {
        if (!prevPageBtn.classList.contains("disabled")) {
            currentPage--;
            displayCardsForPage();
            updatePaginationControls();
        }
    });

    nextPageBtn.addEventListener("click", function() {
        if (!nextPageBtn.classList.contains("disabled")) {
            currentPage++;
            displayCardsForPage();
            updatePaginationControls();
        }
    });
    applyFilterAndSort();
});

document.addEventListener("DOMContentLoaded", () => {
    console.log("Webdev section layout with 3-top-1-center loaded.");
  });
  