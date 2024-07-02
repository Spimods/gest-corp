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

    // Fonctionnalité d'auto-scroll
    let intervalId = startAutoScroll();

    function startAutoScroll() {
        return setInterval(function() {
            nextButton.click();
        }, 5000);
    }

    // Arrêter l'autoscroll lorsque l'utilisateur interagit avec les boutons de navigation
    function stopAutoScroll() {
        clearInterval(intervalId);
    }

    prevButton.addEventListener('click', stopAutoScroll);
    nextButton.addEventListener('click', stopAutoScroll);

    // Initialisation de l'autoscroll
    startAutoScroll();

    // Ajout de la fonctionnalité de swipe
    let startX = 0;
    let endX = 0;

    carouselTrack.addEventListener('touchstart', function(event) {
        startX = event.touches[0].clientX;
    });

    carouselTrack.addEventListener('touchmove', function(event) {
        endX = event.touches[0].clientX;
    });

    carouselTrack.addEventListener('touchend', function() {
        const threshold = 50; // Seuil en pixels pour considérer comme un swipe
        if (startX - endX > threshold) {
            nextButton.click();
        } else if (endX - startX > threshold) {
            prevButton.click();
        }
    });
});
