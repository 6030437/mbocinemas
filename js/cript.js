document.addEventListener("DOMContentLoaded", () => {
    let slideIndex = 0;

    function showSlides() {
        const slides = document.querySelectorAll(".slides");
        slides.forEach(slide => (slide.style.display = "none")); // Verberg alle slides

        slideIndex++;
        if (slideIndex > slides.length) slideIndex = 1; // Ga terug naar de eerste slide

        slides[slideIndex - 1].style.display = "block"; // Toon de huidige slide
        setTimeout(showSlides, 3000); // Wissel elke 3 seconden
    }

    showSlides();
});
