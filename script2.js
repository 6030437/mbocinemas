let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.querySelectorAll('.slide');
    let dots = document.querySelectorAll('.dot');
    
    // Verberg alle slides
    slides.forEach(slide => slide.style.display = 'none');
    
    // Reset actieve dots
    dots.forEach(dot => dot.classList.remove('active'));
    
    // Toon de huidige slide en activeer bijbehorende dot
    slideIndex++;
    if (slideIndex > slides.length) slideIndex = 1;
    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].classList.add('active');
    
    // Automatisch doorgaan naar de volgende slide
    setTimeout(showSlides, 4000); // Verander slides elke 4 seconden
}

function changeSlide(n) {
    slideIndex += n - 1;
    showSlides();
}

function currentSlide(n) {
    slideIndex = n - 1;
    showSlides();
}