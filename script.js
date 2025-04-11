$(document).ready(function () {
    // Buat navbar tetap di atas saat discroll
    $(window).scroll(function () {
        if ($(this).scrollTop() > 20) {
            $('.navbar').addClass("sticky");
        } else {
            $('.navbar').removeClass("sticky");
        }

        // Tampilkan tombol scroll-up jika sudah discroll jauh
        if ($(this).scrollTop() > 500) {
            $('.scroll-up-btn').addClass("show");
        } else {
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // Aksi klik tombol scroll-up: kembali ke atas dengan animasi halus
    $('.scroll-up-btn').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 'slow');
        $('html').css("scrollBehavior", "auto");
    });

    // Smooth scroll untuk navigasi menu saat diklik (tanpa reload halaman)
    $('.navbar .menu li a').click(function (e) {
        e.preventDefault();
        var target = $(this).attr('href');
        var offset = $(target).offset().top - $('.navbar').outerHeight();
        $('html, body').animate({
            scrollTop: offset
        }, 800);
        $('html').css("scrollBehavior", "smooth");
    });

    // Toggle menu navbar (berguna untuk tampilan mobile)
    $('.menu-btn').click(function () {
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    // Animasi teks di bagian Home menggunakan Typed.js
    var typed1 = new Typed(".typing", {
        strings: [
            "Mahasiswa UNIBI",
            "Pengembang Web",
            "Pemrogram Kreatif"
        ],
        typeSpeed: 100,      // Kecepatan mengetik
        backSpeed: 70,       // Kecepatan menghapus
        startDelay: 300,     // Penundaan awal
        backDelay: 1500,     // Penundaan sebelum menghapus
        showCursor: true,    // Tampilkan kursor
        cursorChar: "_",     // Bentuk kursor
        loop: true           // Ulang animasi
    });

    // Animasi teks di bagian About menggunakan Typed.js
    var typed2 = new Typed(".typing-2", {
        strings: [
            "Saya, M Tonny Heru Susanto Mahasiswa Informatika",
            "Bersemangat dalam Pemrograman",
            "Siap Membangun Teknologi Masa Depan"
        ],
        typeSpeed: 90,
        backSpeed: 60,
        startDelay: 500,
        backDelay: 2000,
        showCursor: true,
        cursorChar: "|",
        loop: true
    });

    // Konfigurasi Owl Carousel untuk tampilan carousel
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,       // Durasi autoplay (3 detik)
        autoplayHoverPause: true,    // Hentikan autoplay saat mouse hover
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            }
        }
    });
});

// Fungsi untuk mengirim email menggunakan EmailJS
function sendMail() {
    var params = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        message: document.getElementById("message").value,
    };

    const serviceID = "service_f09qivb";
    const templateID = "template_d7pw5ao";

    // Pastikan ganti "YOUR_USER_ID" dengan User ID EmailJS kamu
    emailjs.init("YOUR_USER_ID");

    emailjs.send(serviceID, templateID, params)
        .then((res) => {
            // Kosongkan field input setelah berhasil mengirim email
            document.getElementById("name").value = "";
            document.getElementById("email").value = "";
            document.getElementById("message").value = "";
            console.log("Pesan berhasil terkirim:", res);
            alert("Pesan telah terkirim!");
        })
        .catch((err) => {
            console.error("Terjadi kesalahan saat mengirim pesan:", err);
            alert("Ups, terjadi kesalahan! Coba lagi nanti.");
        });
}
