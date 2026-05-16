// ── FIREBASE CONFIG ──────────────────────────────────────
const firebaseConfig = {
   apiKey: "AIzaSyBJxt6aeA1PREZxWSIxL0-rhEU_rolEf24",
   authDomain: "portofolio-eeba2.firebaseapp.com",
   databaseURL: "https://portofolio-eeba2-default-rtdb.asia-southeast1.firebasedatabase.app",
   projectId: "portofolio-eeba2",
   storageBucket: "portofolio-eeba2.firebasestorage.app",
   messagingSenderId: "1030017351132",
   appId: "1:1030017351132:web:5e59964f345c7d9f662319",
   measurementId: "G-ZVBHNFQ2C3"
};

firebase.initializeApp(firebaseConfig);
const db = firebase.database();
const messagesRef = db.ref('messages');

// ── WARNA AVATAR ─────────────────────────────────────────
var chatColors = ['#7c3aed', '#0891b2', '#059669', '#d97706', '#be185d', '#2563eb'];

function getTime() {
   var d = new Date();
   return d.getHours().toString().padStart(2, '0') + ':' + d.getMinutes().toString().padStart(2, '0');
}

function getRandomColor(name) {
   var hash = 0;
   for (var i = 0; i < name.length; i++) {
      hash = name.charCodeAt(i) + ((hash << 5) - hash);
   }
   return chatColors[Math.abs(hash) % chatColors.length];
}

// ── KIRIM PESAN KE FIREBASE ──────────────────────────────
function sendChatMessage() {
   var input = document.getElementById('chatInput');
   var nameInp = document.getElementById('chatName');
   var msg = input.value.trim();
   var name = (nameInp && nameInp.value.trim()) ? nameInp.value.trim() : 'Anonim';

   if (!msg) return;

   messagesRef.push({
      name: name,
      text: msg,
      time: getTime(),
      ts: Date.now()
   });

   input.value = '';
}

// ── TAMPILKAN PESAN DARI FIREBASE (REALTIME) ─────────────
messagesRef.orderByChild('ts').limitToLast(50).on('child_added', function (snapshot) {
   var data = snapshot.val();
   addMessageToChat(data.name, data.text, data.time);
});

function addMessageToChat(name, text, time) {
   var box = document.getElementById('chatMessages');
   if (!box) return;

   var initial = name.charAt(0).toUpperCase();
   var color = getRandomColor(name);

   var div = document.createElement('div');
   div.className = 'chat-msg';
   div.innerHTML =
      '<div class="chat-avatar" style="background:' + color + '">' + initial + '</div>' +
      '<div class="chat-bubble">' +
      '<div class="chat-sender">' + escapeHtml(name) + '</div>' +
      '<div class="chat-text">' + escapeHtml(text) + '</div>' +
      '<div class="chat-time">' + time + '</div>' +
      '</div>';

   box.appendChild(div);
   box.scrollTop = box.scrollHeight;
}

function escapeHtml(str) {
   return str
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
}

// ── KIRIM EMAIL DENGAN EMAILJS ────────────────────────────
function sendMail() {
   var name = document.getElementById("name").value;
   var email = document.getElementById("email").value;
   var number = document.getElementById("number").value;
   var message = document.getElementById("message").value;

   if (!name || !email || !message) {
      alert("Mohon isi nama, email, dan pesan terlebih dahulu.");
      return;
   }

   var now = new Date();
   var time = now.toLocaleString('id-ID');

   var params = { name, email, number, message, time };

   emailjs.send("service_b7jg21v", "template_4zmqsbi", params)
      .then(function () {
         document.getElementById("name").value = "";
         document.getElementById("email").value = "";
         document.getElementById("number").value = "";
         document.getElementById("message").value = "";
         alert("Pesan berhasil terkirim!");
      })
      .catch(function (err) {
         console.error("EmailJS Error:", err);
         alert("Gagal mengirim pesan. Cek console untuk detail.");
      });
}

// ── SEMUA KODE YANG BUTUH DOM SIAP ───────────────────────
document.addEventListener('DOMContentLoaded', function () {

   // Enter untuk kirim chat
   var chatInput = document.getElementById('chatInput');
   if (chatInput) {
      chatInput.addEventListener('keydown', function (e) {
         if (e.key === 'Enter') sendChatMessage();
      });
   }

   // Navbar scroll sticky & scroll-up button
   window.addEventListener('scroll', function () {
      var navbar = document.querySelector('.navbar');
      var scrollBtn = document.querySelector('.scroll-up-btn');

      if (window.scrollY > 20) {
         if (navbar) navbar.classList.add('sticky');
      } else {
         if (navbar) navbar.classList.remove('sticky');
      }

      if (window.scrollY > 500) {
         if (scrollBtn) scrollBtn.classList.add('show');
      } else {
         if (scrollBtn) scrollBtn.classList.remove('show');
      }

      // Tutup menu mobile saat scroll
      if (window.innerWidth < 991) {
         var menu = document.querySelector('.navbar .menu');
         var icon = document.querySelector('.menu-btn i');
         if (menu) menu.classList.remove('active');
         if (icon) { icon.classList.remove('fa-times'); icon.classList.remove('active'); }
         document.body.classList.remove('active');
      }

      // Active nav link berdasarkan scroll
      document.querySelectorAll('section').forEach(function (sec) {
         var top = window.scrollY;
         var offset = sec.offsetTop - 150;
         var height = sec.offsetHeight;
         var id = sec.getAttribute('id');

         if (top >= offset && top < offset + height) {
            document.querySelectorAll('.navbar .menu li a').forEach(function (link) {
               link.classList.remove('active');
            });
            var activeLink = document.querySelector('.navbar .menu li a[href="#' + id + '"]');
            if (activeLink) activeLink.classList.add('active');
         }
      });
   });

   // Scroll-up button klik
   var scrollBtn = document.querySelector('.scroll-up-btn');
   if (scrollBtn) {
      scrollBtn.addEventListener('click', function () {
         window.scrollTo({ top: 0, behavior: 'smooth' });
      });
   }

   // Toggle menu mobile
   var menuToggle = document.querySelector('.menu-btn');
   if (menuToggle) {
      menuToggle.addEventListener('click', function () {
         var menu = document.querySelector('.navbar .menu');
         var icon = menuToggle.querySelector('i');
         if (menu) menu.classList.toggle('active');
         if (icon) icon.classList.toggle('fa-times');
         if (icon) icon.classList.toggle('active');
         document.body.classList.toggle('active');
      });
   }

   // Smooth scroll navbar links
   document.querySelectorAll('.navbar .menu li a').forEach(function (link) {
      link.addEventListener('click', function (e) {
         e.preventDefault();
         var targetId = this.getAttribute('href');
         var target = document.querySelector(targetId);
         var navbar = document.querySelector('.navbar');
         if (!target) return;
         var offset = target.offsetTop - (navbar ? navbar.offsetHeight : 0);
         window.scrollTo({ top: offset, behavior: 'smooth' });

         // Tutup menu mobile setelah klik
         var menu = document.querySelector('.navbar .menu');
         var icon = document.querySelector('.menu-btn i');
         if (menu) menu.classList.remove('active');
         if (icon) { icon.classList.remove('fa-times'); icon.classList.remove('active'); }
         document.body.classList.remove('active');
      });
   });

   // Typed.js
   if (document.querySelector('.typing')) {
      new Typed('.typing', {
         strings: [
            "Full Stack Developer",
            "Web Developer",
            "Pengembang Aplikasi",
         ],
         typeSpeed: 100,
         backSpeed: 70,
         backDelay: 1500,
         showCursor: true,
         cursorChar: "_",
         loop: true
      });
   }

   if (document.querySelector('.typing-2')) {
      new Typed('.typing-2', {
         strings: [
            "Saya, M Tonny Heru Susanto S.Kom",
         ],
         typeSpeed: 100,
         backSpeed: 70,
         backDelay: 1500,
         showCursor: true,
         cursorChar: "|",
         loop: true
      });
   }

});