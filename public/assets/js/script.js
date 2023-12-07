// Fungsi Back-to-Top
document.addEventListener("DOMContentLoaded", function () {
  var backToTopBtn = document.getElementById("back-to-top-btn");

  backToTopBtn.addEventListener("click", function () {
      window.scrollTo({
          top: 0,
          behavior: "smooth"
      });
  });

  window.addEventListener("scroll", function () {
      if (window.scrollY > 300) {
          backToTopBtn.style.display = "block";
      } else {
          backToTopBtn.style.display = "none";
      }
  });
});