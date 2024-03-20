const sidebar = document.querySelector(".sidebar");
const icon = document.querySelectorAll(".sidebar__toggler");

icon.forEach((icon) => {
  icon.addEventListener("click", (e) => {
    console.log("icon clicked");
    sidebar.classList.toggle("sidebar--closed");
  });
});
