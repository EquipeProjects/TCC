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

window.onscroll = function() {scrolleffect()};
function scrolleffect(){
  if (document.documentElement.scrollTop > 100) {
    document.getElementById("bottom-a").style.display = "";
  } else {
    document.getElementById("bottom-a").style.display = "none";
  }
}


function changeImage(imageUrl) {
  const featuredImage = document.getElementById('featured-image');
  featuredImage.src = imageUrl;
}



document.addEventListener("DOMContentLoaded", function () {
  const radio1 = document.getElementById("radio1");
  const radio2 = document.getElementById("radio2");
  const box1 = document.getElementById("box1");
  const box2 = document.getElementById("box2");

  radio1.addEventListener("click", function () {
    if (box1.style.display === "block") {
      box1.style.display = "none";
      radio1.style.chec
    } else {
      box1.style.display = "block";
      box2.style.display = "none";
    }
  });

  radio2.addEventListener("click", function () {
    if (box2.style.display === "block") {
      box2.style.display = "none";
    } else {
      box2.style.display = "block";
      box1.style.display = "none";
    }
  });
});