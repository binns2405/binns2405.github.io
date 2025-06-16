let currentSlide = 1;
showSlide(currentSlide);

function changeSlide(n) {
  showSlide(currentSlide += n);
}

function setSlide(n) {
  showSlide(currentSlide = n);
}

function showSlide(n) {
  let i;
  const slides = document.getElementsByClassName("slide");
  const dots = document.getElementsByClassName("dot");
  if (n > slides.length) currentSlide = 1;
  if (n < 1) currentSlide = slides.length;
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[currentSlide - 1].style.display = "block";
  dots[currentSlide - 1].className += " active";
}

// Auto-play
setInterval(() => {
  changeSlide(1);
}, 5000);
