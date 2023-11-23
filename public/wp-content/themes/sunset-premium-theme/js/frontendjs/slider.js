export default class Slider {
  // select DOM elements

  constructor() {
    console.log("slider ran");
    this.carusoleRightThumb = document.querySelector(
      ".carusole__btn-thumb--right"
    );
    this.carusoleLeftThumb = document.querySelector(
      ".carusole__btn-thumb--left"
    );
    this.carusoleNextButton = document.querySelector(".carusole__btn--right");
    this.carusolePrevButton = document.querySelector(".carusole__btn--left");
    this.carusoleTrack = document.querySelector(".carusole__track");
    this.carusoleNav = document.querySelector(".carusole__nav");
    this.carusoleItems = document.querySelectorAll(".carusole__item");
    this.slides = Array.from(this.carusoleItems);
    this.dots = Array.from(this.carusoleNav.children);
    this.events();
  }
  // Event handlers
  events() {
    this.carusoleNav.addEventListener("click", (e) => {
      let targetDot = e.target.closest("button");
      if (!targetDot) return;
      let currentSlide = document.querySelector(".carusole__item--current");
      let currentDot = document.querySelector(".carusole__dot--current");
      let dotIndex = this.dots.findIndex((dot) => dot === targetDot);
      let targetSlide = this.slides[dotIndex];
      this.moveSlide(currentSlide, targetSlide);
      this.moveDot(currentDot, targetDot);
    });

    this.carusolePrevButton.addEventListener("click", (e) => {
      let { currentSlide, prevSlide, prevSlideIndex, currentDot } =
        this.elementDeclaration();
      let prevDot = this.dots[prevSlideIndex];
      this.moveSlide(currentSlide, prevSlide);
      this.moveDot(currentDot, prevDot);
    });

    this.carusoleNextButton.addEventListener("click", (e) => {
      let { currentSlide, nextSlide, nextSlideIndex, currentDot } =
        this.elementDeclaration();
      let nextDot = this.dots[nextSlideIndex];
      this.moveSlide(currentSlide, nextSlide);
      this.moveDot(currentDot, nextDot);
    });

    document.addEventListener("DOMContentLoaded", () => {
      let { currentSlide } = this.elementDeclaration();
      let prevThumb = currentSlide.dataset.previmage;
      this.carusoleLeftThumb.style.backgroundImage = `url(${prevThumb})`;
      let nextThumb = currentSlide.dataset.nextimage;
      this.carusoleRightThumb.style.backgroundImage = `url(${nextThumb})`;
    });
  }
  // Methods

  elementDeclaration() {
    let currentSlide = document.querySelector(".carusole__item--current");
    let currentDot = this.carusoleNav.querySelector(".carusole__dot--current");
    let nextSlide, prevSlide, nextSlideIndex, prevSlideIndex;
    let currentSlideIndex = this.slides.findIndex(
      (slide) => slide === currentSlide
    );
    nextSlideIndex = currentSlideIndex + 1;
    prevSlideIndex = currentSlideIndex - 1;

    if (currentSlideIndex == this.slides.length - 1) {
      nextSlideIndex = 0;
    } else if (currentSlideIndex == 0) {
      prevSlideIndex = this.slides.length - 1;
    }
    prevSlide = this.slides[prevSlideIndex];
    nextSlide = this.slides[nextSlideIndex];

    return {
      currentSlide,
      nextSlide,
      prevSlide,
      currentSlideIndex,
      nextSlideIndex,
      prevSlideIndex,
      currentDot,
    };
  }
  moveSlide(currentSlide, targetSlide) {
    currentSlide.classList.remove("carusole__item--current");
    targetSlide.classList.add("carusole__item--current");
    let nextThumb = targetSlide.dataset.nextimage;
    this.carusoleRightThumb.style.backgroundImage = `url(${nextThumb})`;
    let prevThumb = targetSlide.dataset.previmage;
    this.carusoleLeftThumb.style.backgroundImage = `url(${prevThumb})`;
  }
  moveDot(currentDot, targetDot) {
    currentDot.classList.remove("carusole__dot--current");
    targetDot.classList.add("carusole__dot--current");
  }
}
