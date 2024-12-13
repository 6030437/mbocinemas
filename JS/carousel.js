let currentIndex = 0;

function updateCarousel() {
  const carouselImages = document.querySelector('.carousel-images');
  const imageWidth = document.querySelector('.carousel-images img').clientWidth;
  carouselImages.style.transform = `translateX(${-currentIndex * imageWidth}px)`;
}

function nextImage() {
  const images = document.querySelectorAll('.carousel-images img');
  if (currentIndex < images.length - 4) {
    currentIndex++;
  } else {
    currentIndex = 0;
  }
  updateCarousel();
}

function prevImage() {
  const images = document.querySelectorAll('.carousel-images img');
  if (currentIndex > 0) {
    currentIndex--;
  } else {
    currentIndex = images.length - 4; 
  }
  updateCarousel();
}
