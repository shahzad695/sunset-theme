let carusoleRightThumb = document.querySelector(".carusole__btn-thumb--right");
let carusoleLeftThumb = document.querySelector(".carusole__btn-thumb--left");
let carusoleNextButton = document.querySelector(".carusole__btn--right");
let carusolePrevButton = document.querySelector(".carusole__btn--left");
let carusoleTrack = document.querySelector(".carusole__track");
let carusoleNav = document.querySelector(".carusole__nav");
let carusoleItems = document.querySelectorAll(".carusole__item");
let slides = Array.from(carusoleItems);
let dots = Array.from(carusoleNav.children);
console.log(slides);
console.log(dots);

function moveSlide(currentSlide, targetSlide) {
  currentSlide.classList.remove("carusole__item--current");
  targetSlide.classList.add("carusole__item--current");
  let nextThumb = targetSlide.dataset.nextimage;
  carusoleRightThumb.style.backgroundImage = `url(${nextThumb})`;
  let prevThumb = targetSlide.dataset.previmage;
  carusoleLeftThumb.style.backgroundImage = `url(${prevThumb})`;
}
function moveDot(currentDot, targetDot) {
  currentDot.classList.remove("carusole__dot--current");
  targetDot.classList.add("carusole__dot--current");
}
function elementDeclaration() {
  let currentSlide = carusoleTrack.querySelector(".carusole__item--current");
  let currentDot = carusoleNav.querySelector(".carusole__dot--current");
  let nextSlide, prevSlide, nextSlideIndex, prevSlideIndex;
  let currentSlideIndex = slides.findIndex((slide) => slide === currentSlide);
  nextSlideIndex = currentSlideIndex + 1;
  prevSlideIndex = currentSlideIndex - 1;

  if (currentSlideIndex == slides.length - 1) {
    nextSlideIndex = 0;
  } else if (currentSlideIndex == 0) {
    prevSlideIndex = slides.length - 1;
  }

  prevSlide = slides[prevSlideIndex];
  nextSlide = slides[nextSlideIndex];
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
document.addEventListener("DOMContentLoaded", () => {
  let { currentSlide } = elementDeclaration();
  let prevThumb = currentSlide.dataset.previmage;
  carusoleLeftThumb.style.backgroundImage = `url(${prevThumb})`;
  let nextThumb = currentSlide.dataset.nextimage;
  carusoleRightThumb.style.backgroundImage = `url(${nextThumb})`;
});
carusoleNextButton.addEventListener("click", function (e) {
  let { currentSlide, nextSlide, nextSlideIndex, currentDot } =
    elementDeclaration();

  let nextDot = dots[nextSlideIndex];

  moveSlide(currentSlide, nextSlide);
  moveDot(currentDot, nextDot);
});
carusolePrevButton.addEventListener("click", function (e) {
  let { currentSlide, prevSlide, prevSlideIndex, currentDot } =
    elementDeclaration();

  let prevDot = dots[prevSlideIndex];
  moveSlide(currentSlide, prevSlide);
  moveDot(currentDot, prevDot);
});

carusoleNav.addEventListener("click", function (e) {
  targetDot = e.target.closest("button");
  console.log(targetDot);
  if (!targetDot) return;
  let currentSlide = document.querySelector(".carusole__item--current");
  let currentDot = document.querySelector(".carusole__dot--current");
  dotIndex = dots.findIndex((dot) => dot === targetDot);
  targetSlide = slides[dotIndex];
  moveSlide(currentSlide, targetSlide);
  moveDot(currentDot, targetDot);
});
