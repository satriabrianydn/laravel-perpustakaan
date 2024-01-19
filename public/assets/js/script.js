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

// Hilangkan tombol carousel ketika cursor tidak diarahkan
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('carouselExampleInterval');

    carousel.addEventListener('mouseover', function () {
      showControls();
    });

    carousel.addEventListener('mouseout', function () {
      hideControls();
    });

    function showControls() {
      const controls = document.querySelectorAll('.carousel-control-next, .carousel-control-prev');
      controls.forEach(control => {
        control.style.opacity = '1';
      });
    }

    function hideControls() {
      const controls = document.querySelectorAll('.carousel-control-next, .carousel-control-prev');
      controls.forEach(control => {
        control.style.opacity = '0';
      });
    }
  });

  // Clock Javascript
function updateClock() {
  var now = new Date();
  var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
  var dayOfWeek = days[now.getDay()];
  var dayOfMonth = now.getDate();
  var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  var month = months[now.getMonth()];
  var year = now.getFullYear();
  var hours = now.getHours();
  var minutes = now.getMinutes();
  var seconds = now.getSeconds();

  // Tambahkan nol di depan jika jam, menit, atau detik kurang dari 10
  hours = hours < 10 ? '0' + hours : hours;
  minutes = minutes < 10 ? '0' + minutes : minutes;
  seconds = seconds < 10 ? '0' + seconds : seconds;

  // Format waktu
  var timeString = dayOfWeek + ', ' + dayOfMonth + ' ' + month + ' ' + year + '   ' + hours + ':' + minutes + ':' + seconds;

  // Set teks jam pada elemen dengan id 'jam'
  document.getElementById('jam').innerText = timeString;
}

// Panggil updateClock setiap detik
setInterval(updateClock, 1000);

// Panggil updateClock saat halaman dimuat
window.onload = updateClock;

// Greeting Script
document.addEventListener('DOMContentLoaded', function () {
  var greetingMessage = getGreetingMessage();
  document.getElementById('greeting').innerText = greetingMessage;
});

function getGreetingMessage() {
  var currentTime = new Date();
  var hours = currentTime.getHours();
  var greeting;

  if (hours < 12) {
      greeting = 'Hai, Selamat Pagi';
  } else if (hours < 17) {
      greeting = 'Hai, Selamat Siang';
  } else if (hours < 20) {
      greeting = 'Hai, Selamat Sore';
  } else {
      greeting = 'Hai, Selamat Malam';
  }

  return greeting;
}
