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

// Scroll Halaman
$(document).ready(function() {
    // Menanggapi klik pada link navbar
    $('a[href^="#"]').on('click', function(event) {
       // Mengambil ID elemen tujuan dari atribut href
       var target = $($(this).attr('href'));

       // Memeriksa apakah elemen dengan ID tersebut ada
       if (target.length) {
          // Menghentikan perilaku default dari link
          event.preventDefault();

          // Menghitung posisi scroll ke elemen tujuan
          $('html, body').animate({
             scrollTop: target.offset().top
          }, 100); // Durasi animasi
       }
    });
 });