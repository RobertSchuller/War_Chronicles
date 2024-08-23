let slideIndex = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');

function showSlides(n) {
    if (n >= slides.length) {
        slideIndex = 0;
    } else if (n < 0) {
        slideIndex = slides.length - 1;
    } else {
        slideIndex = n;
    }

    slides.forEach((slide, index) => {
        slide.style.display = (index === slideIndex) ? 'block' : 'none';
    });

    dots.forEach((dot, index) => {
        dot.classList.remove('active');
        if (index === slideIndex) {
            dot.classList.add('active');
        }
    });
}

function changeSlide(n) {
    showSlides(slideIndex + n);
}

function autoSlides() {
    showSlides(slideIndex + 1);
    setTimeout(autoSlides, 3000); // Change slide every 3 seconds
}

document.addEventListener('DOMContentLoaded', () => {
    showSlides(slideIndex); // Initialize the first slide
    autoSlides(); // Start the automatic slideshow

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlides(index);
        });
    });
});
