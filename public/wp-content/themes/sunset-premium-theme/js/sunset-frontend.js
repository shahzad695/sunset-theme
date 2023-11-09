let carusoleNextButton = document.querySelector(".carusole__btn--right");
let carusolePrevButton = document.querySelector(".carusole__btn--left");

function moveSlide(currentSlide, targetSlide) {
  currentSlide.classList.remove("carusole__current-slide");
  targetSlide.classList.add("carusole__current-slide");
}

carusoleNextButton.addEventListener("click", function (e) {
  let currentSlide = document.querySelector(".carusole__current-slide");
  let nextSlide = currentSlide.nextElementSibling;
  moveSlide(currentSlide, nextSlide);
  console.log(nextSlide);
  if (!nextSlide) {
    carusoleNextButton.classList.add("carusole__btn--hide");
  }
});
carusolePrevButton.addEventListener("click", function (e) {
  let currentSlide = document.querySelector(".carusole__current-slide");
  let prevSlide = currentSlide.previousElementSibling;
  moveSlide(currentSlide, prevSlide);
  if (!prevSlide) {
    carusolePrevButton.classList.add("carusole__btn--hide");
  }
});
