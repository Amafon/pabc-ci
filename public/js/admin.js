const body = document.querySelector("body");
const modeToggle = document.querySelector(".mode-toggle");
const sidebar = document.querySelector("nav");
const sidebarToggle = document.querySelector(".sidebar-toggle");
let getMode = localStorage.getItem("mode");
let getStatus = localStorage.getItem("status");

if (getMode && getMode == "dark") {
  body.classList.toggle("dark");
}

if (getStatus && getStatus == "close") {
  sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", function () {
  body.classList.toggle("dark");
  if (body.classList.contains("dark")) {
    localStorage.setItem("mode", "dark");
  } else {
    localStorage.setItem("mode", "light");
  }
});

sidebarToggle.addEventListener("click", function () {
  sidebar.classList.toggle("close");
  if (sidebar.classList.contains("close")) {
    localStorage.setItem("status", "close");
  } else {
    localStorage.setItem("status", "open");
  }
});
