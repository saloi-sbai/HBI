const toggle = document.querySelector(".toggle");
const menu = document.querySelector(".menu");

toggle.addEventListener("click", function () {
  menu.classList.toggle("show-menu");
});

function toggleActive() {
  const item = document.querySelectorAll("li");

  item.forEach((Element) => {
    if (Element.classList.contains("item")) {
      if (Element.classList.contains("active")) {
        Element.classList.remove("active");
      } else {
        Element.classList.add("active");
      }
    }
  });
}
