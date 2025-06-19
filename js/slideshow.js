let currentSlide = 1;
let autoPlayInterval;
let isPaused = false;

showSlide(currentSlide);
startAutoPlay();

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

function startAutoPlay() {
  autoPlayInterval = setInterval(() => {
    changeSlide(1);
  }, 5000);
}

function pauseSlideshow() {
  clearInterval(autoPlayInterval);
  isPaused = true;
  document.getElementById("pause-btn").innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path d="M6 4l15 8-15 8z"/>
    </svg>`; // ▶ icon
}

function resumeSlideshow() {
  startAutoPlay();
  isPaused = false;
  document.getElementById("pause-btn").innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <rect x="6" y="4" width="4" height="16" />
      <rect x="14" y="4" width="4" height="16" />
    </svg>`; // ⏸ icon
}

function toggleSlideshow() {
  if (isPaused) {
    resumeSlideshow();
  } else {
    pauseSlideshow();
  }
}

// Add pause/resume button to the page
window.addEventListener("DOMContentLoaded", () => {
  const pauseButton = document.createElement("button");
  pauseButton.id = "pause-btn";
  pauseButton.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <rect x="6" y="4" width="4" height="16" />
      <rect x="14" y="4" width="4" height="16" />
    </svg>`;
  pauseButton.onclick = toggleSlideshow;

  const dotsContainer = document.querySelector(".dots");
  if (dotsContainer) {
    dotsContainer.appendChild(pauseButton);
  }
});
