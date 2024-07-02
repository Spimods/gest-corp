document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const carouselTrack = document.querySelector('.carousel-track');
    const carouselItems = document.querySelectorAll('.carousel-item');
    const itemWidth = carouselItems[0].offsetWidth;
    const itemCount = carouselItems.length;
    const trackWidth = itemCount * itemWidth;
    let currentIndex = 0;
    let isTransitioning = false;
    let intervalId = null;
    let autoScrollTimeout = null;

    carouselTrack.innerHTML += carouselTrack.innerHTML;

    function updateCarousel() {
        const offset = -currentIndex * itemWidth;
        carouselTrack.style.transition = 'transform 0.4s ease-in-out';
        carouselTrack.style.transform = `translateX(${offset}px)`;
    }

    prevButton.addEventListener('click', function() {
        if (!isTransitioning) {
            clearInterval(intervalId);
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = itemCount;
                carouselTrack.style.transition = 'none';
                carouselTrack.style.transform = `translateX(-${trackWidth}px)`;
                setTimeout(() => {
                    carouselTrack.style.transition = 'transform 0.4s ease-in-out';
                    currentIndex--;
                    updateCarousel();
                }, 50);
            } else {
                updateCarousel();
            }
            startAutoScrollAfterDelay();
        }
        isTransitioning = true;
        setTimeout(() => {
            isTransitioning = false;
        }, 400);
    });

    nextButton.addEventListener('click', function() {
        if (!isTransitioning) {
            clearInterval(intervalId);
            currentIndex++;
            updateCarousel();
            if (currentIndex > itemCount) {
                currentIndex = 0;
                carouselTrack.style.transition = 'none';
                carouselTrack.style.transform = `translateX(0)`;
                setTimeout(() => {
                    carouselTrack.style.transition = 'transform 0.4s ease-in-out';
                    currentIndex = 1;
                    updateCarousel();
                }, 50);
            }
            startAutoScrollAfterDelay();
        }
        isTransitioning = true;
        setTimeout(() => {
            isTransitioning = false;
        }, 400);
    });

    function startAutoScrollAfterDelay() {
        clearTimeout(autoScrollTimeout);
        autoScrollTimeout = setTimeout(() => {
            startAutoScroll();
        }, 5000);
    }
    function startAutoScroll() {
        intervalId = setInterval(function() {
            nextButton.click();
        }, 5000);
    }
    startAutoScroll();
});
