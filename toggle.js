function toggleActive() {
  const item = document.querySelectorAll("li");

  item.forEach((element) => {
    if (element.classList.contains("item")) {
      if (element.classList.contains("active")) {
        element.classList.remove("active");
      } else {
        element.classList.add("active");
      }
    }
  });
}
