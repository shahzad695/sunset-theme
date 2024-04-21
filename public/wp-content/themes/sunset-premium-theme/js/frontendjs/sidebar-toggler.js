const sidebar = document.querySelector(".sidebar");
const icon = document.querySelectorAll(".sidebar__toggler");
const body = document.querySelector("body");
const overlay = document.querySelector(".overlay");

icon.forEach((icon) => {
  icon.addEventListener("click", (e) => {
    console.log("icon clicked");
    sidebar.classList.toggle("sidebar--closed");
    body.classList.toggle("no-sroll");
    overlay.classList.toggle("overlay--active");
  });
});
