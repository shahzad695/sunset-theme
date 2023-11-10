let carusoleNextButton = document.querySelector(".carusole__btn--right");
let carusolePrevButton = document.querySelector(".carusole__btn--left");
let carusoleTrack = document.querySelector(".carusole__track");
let slides = Array.from (carusoleTrack.children);
let carusoleNav = document.querySelector(".carusole__nav");
let dots = Array.from (carusoleNav.children);
let currentSlide = carusoleTrack.querySelector(".carusole__item--current");
let slideIndex = slides.findIndex(slide => currentSlide)


function showHideButton(slideIndex){
  if(slideIndex=== 0)
  {
    carusolePrevButton.style.display = "none";
   }else if(slideIndex >= slides.length-1)
   {
    carusoleNextButton.style.display = "none";
  }
  else
  {
  carusolePrevButton.style.display = "block";
  carusoleNextButton.style.display = "block";

  }


}

function moveSlide(currentSlide, targetSlide) {
  currentSlide.classList.remove("carusole__item--current");
  targetSlide.classList.add("carusole__item--current");
}
function moveDot(currentDot, targetDot) {
  currentDot.classList.remove("carusole__dot--current");
  targetDot.classList.add("carusole__dot--current");
}

showHideButton(slideIndex)
carusoleNextButton.addEventListener("click", function (e) {
  let currentSlide = carusoleTrack.querySelector(".carusole__item--current");
  let currentDot = carusoleNav.querySelector(".carusole__dot--current");
  let nextSlide = currentSlide.nextElementSibling;
  let slideIndex = slides.findIndex(slide => slide ===nextSlide)
  let nextDot = dots[slideIndex]
  moveSlide(currentSlide, nextSlide);
  moveDot(currentDot, nextDot);
  showHideButton(slideIndex)
});
carusolePrevButton.addEventListener("click", function (e) {
  let currentSlide = carusoleTrack.querySelector(".carusole__item--current");
  let currentDot = carusoleNav.querySelector(".carusole__dot--current");
  let prevSlide = currentSlide.previousElementSibling;
  let slideIndex = slides.findIndex(slide => slide ===prevSlide)
  let prevDot = dots[slideIndex]
  moveSlide(currentSlide, prevSlide);
  moveDot(currentDot, prevDot);
  showHideButton(slideIndex)
});

carusoleNav.addEventListener("click", function(e) {
  targetDot= e.target.closest("button");
  if(!targetDot) return;
  let currentSlide = document.querySelector(".carusole__item--current");
  let currentDot = document.querySelector(".carusole__dot--current");
  dotIndex = dots.findIndex( dot => dot === targetDot)
  targetSlide = slides[dotIndex];
  moveSlide(currentSlide, targetSlide)
  moveDot(currentDot, targetDot);
  showHideButton(dotIndex)
  
})