let carusoleRightThumb = document.querySelector(".carusole__btn-thumb--right");
let carusoleLeftThumb = document.querySelector(".carusole__btn-thumb--left");
let carusoleNextButton = document.querySelector(".carusole__btn--right");
let carusolePrevButton = document.querySelector(".carusole__btn--left");
let carusoleTrack = document.querySelector(".carusole__track");
let slides = Array.from(carusoleTrack.children);
let carusoleNav = document.querySelector(".carusole__nav");
let dots = Array.from(carusoleNav.children);

function moveSlide(currentSlide, targetSlide) {
  currentSlide.classList.remove("carusole__item--current");
  targetSlide.classList.add("carusole__item--current");
}
function moveDot(currentDot, targetDot) {
  currentDot.classList.remove("carusole__dot--current");
  targetDot.classList.add("carusole__dot--current");
}
function elementDeclaration() {
  let currentSlide = carusoleTrack.querySelector(".carusole__item--current");
  let currentDot = carusoleNav.querySelector(".carusole__dot--current");
  let nextSlide, prevSlide;
  let currentSlideIndex = slides.findIndex((slide) => slide === currentSlide);
  let nextSlideIndex = currentSlideIndex + 1;
  let prevSlideIndex = currentSlideIndex - 1;

  if (currentSlideIndex == slides.length - 1) {
    nextSlideIndex = 0;
    nextSlide = slides[nextSlideIndex];
    prevSlide = currentSlide.previousElementSibling;
  } else if (currentSlideIndex == 0) {
    prevSlideIndex = slides.length - 1;
    prevSlide = slides[prevSlideIndex];
    nextSlide = currentSlide.nextElementSibling;
  } else {
    prevSlide = currentSlide.previousElementSibling;
    nextSlide = currentSlide.nextElementSibling;
  }
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
  console.log("Loading");
  let {
    currentSlide,
    nextSlide,
    prevSlide,
    currentSlideIndex,
    nextSlideIndex,
    prevSlideIndex,
    currentDot,
  } = elementDeclaration();
  let prevThumb = currentSlide.dataset.previmage;
  carusoleLeftThumb.style.backgroundImage = `url(${prevThumb})`;
  let nextThumb = currentSlide.dataset.nextimage;
  carusoleRightThumb.style.backgroundImage = `url(${nextThumb})`;
  console.log(
    prevSlide,
    nextSlide,
    carusoleRightThumb.style.backgroundImage,
    carusoleLeftThumb.style.backgroundImage
  );
});
carusoleNextButton.addEventListener("click", function (e) {
  let {
    currentSlide,
    nextSlide,
    prevSlide,
    currentSlideIndex,
    nextSlideIndex,
    prevSlideIndex,
    currentDot,
  } = elementDeclaration();

  let nextDot = dots[nextSlideIndex];
  let nextThumb = nextSlide.dataset.nextimage;
  carusoleRightThumb.style.backgroundImage = `url(${nextThumb})`;
  let prevThumb = nextSlide.dataset.previmage;
  carusoleLeftThumb.style.backgroundImage = `url(${prevThumb})`;
  moveSlide(currentSlide, nextSlide);
  moveDot(currentDot, nextDot);
});
carusolePrevButton.addEventListener("click", function (e) {
  let {
    currentSlide,
    nextSlide,
    prevSlide,
    currentSlideIndex,
    nextSlideIndex,
    prevSlideIndex,
    currentDot,
  } = elementDeclaration();

  let prevDot = dots[prevSlideIndex];
  let prevThumb = prevSlide.dataset.previmage;
  carusoleLeftThumb.style.backgroundImage = `url(${prevThumb})`;
  let nextThumb = prevSlide.dataset.nextimage;
  carusoleRightThumb.style.backgroundImage = `url(${nextThumb})`;
  moveSlide(currentSlide, prevSlide);
  moveDot(currentDot, prevDot);
});

carusoleNav.addEventListener("click", function (e) {
  targetDot = e.target.closest("button");
  if (!targetDot) return;
  let currentSlide = document.querySelector(".carusole__item--current");
  let currentDot = document.querySelector(".carusole__dot--current");
  dotIndex = dots.findIndex((dot) => dot === targetDot);
  targetSlide = slides[dotIndex];
  moveSlide(currentSlide, targetSlide);
  moveDot(currentDot, targetDot);
});
