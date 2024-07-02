
document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth > 768) {

        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        const carouselTrack = document.querySelector('.carousel-track');
        const carouselItems = document.querySelectorAll('.carousel-item');
        const itemWidth = carouselItems[0].offsetWidth;
        const itemCount = carouselItems.length;
        const trackWidth = itemCount * itemWidth;
        let currentIndex = 0;
        let isTransitioning = false;

        carouselTrack.innerHTML += carouselTrack.innerHTML;

        function updateCarousel() {
            const offset = -currentIndex * itemWidth;
            carouselTrack.style.transform = `translateX(${offset}px)`;
        }

        prevButton.addEventListener('click', function() {
            if (!isTransitioning) {
                isTransitioning = true;
                currentIndex--;
                if (currentIndex < 0) {
                    currentIndex = itemCount;
                    carouselTrack.style.transition = 'none';
                    carouselTrack.style.transform = `translateX(-${trackWidth}px)`;
                    setTimeout(() => {
                        carouselTrack.style.transition = 'transform 0.4s ease-in-out';
                        currentIndex--;
                        updateCarousel();
                    }, 10);
                } else {
                    updateCarousel();
                }
                setTimeout(() => {
                    isTransitioning = false;
                }, 400);
            }
        });

        nextButton.addEventListener('click', function() {
            if (!isTransitioning) {
                isTransitioning = true;
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
                setTimeout(() => {
                    isTransitioning = false;
                }, 400);
            }
        });

        let intervalId = startAutoScroll();

        function startAutoScroll() {
            return setInterval(function() {
                nextButton.click();
            }, 5000);
        }

        function stopAutoScroll() {
            clearInterval(intervalId);
        }

        prevButton.addEventListener('click', stopAutoScroll);
        nextButton.addEventListener('click', stopAutoScroll);

        startAutoScroll();
    }
});
