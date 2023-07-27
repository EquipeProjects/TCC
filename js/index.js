document.addEventListener("DOMContentLoaded", function(event) {
  var carouselImages = document.querySelectorAll(".carousel-images img");
  var carouselDots = document.querySelectorAll(".carousel-dots .dot");
  var currentIndex = 0;

  function showImage(index) {
    carouselImages.forEach(function(image) {
      image.classList.remove("active");
    });
    carouselDots.forEach(function(dot) {
      dot.classList.remove("active");
    });

    carouselImages[index].classList.add("active");
    carouselDots[index].classList.add("active");
  }

  function nextImage() {
    currentIndex++;
    if (currentIndex >= carouselImages.length) {
      currentIndex = 0;
    }
    showImage(currentIndex);
  }

  function prevImage() {
    currentIndex--;
    if (currentIndex < 0) {
      currentIndex = carouselImages.length - 1;
    }
    showImage(currentIndex);
  }

  function jumpToImage(index) {
    currentIndex = index;
    showImage(currentIndex);
  }

  document.querySelector(".carousel-next").addEventListener("click", nextImage);
  document.querySelector(".carousel-prev").addEventListener("click", prevImage);

  carouselDots.forEach(function(dot, index) {
    dot.addEventListener("click", function() {
      jumpToImage(index);
    });
  });

  showImage(currentIndex);
});