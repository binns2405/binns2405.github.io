// slideshow-multi.js - manual only, no auto scroll, no dots, no pause button

class MultiSlideshow {
  constructor(container) {
    this.container = container;
    this.slides = container.querySelectorAll(".slide");
    this.currentSlide = 0;

    this.showSlide(this.currentSlide);
  }

  showSlide(n) {
    if (n >= this.slides.length) this.currentSlide = 0;
    else if (n < 0) this.currentSlide = this.slides.length - 1;
    else this.currentSlide = n;

    this.slides.forEach(slide => slide.style.display = "none");
    this.slides[this.currentSlide].style.display = "block";
  }

  changeSlide(n) {
    this.showSlide(this.currentSlide + n);
  }

  setSlide(n) {
    this.showSlide(n);
  }
}

window.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".slideshow-container").forEach(container => {
    const slideshow = new MultiSlideshow(container);

    container.querySelector(".prev")?.addEventListener("click", () => slideshow.changeSlide(-1));
    container.querySelector(".next")?.addEventListener("click", () => slideshow.changeSlide(1));
  });
});
