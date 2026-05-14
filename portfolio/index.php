<?php

$conn = mysqli_connect('localhost','root','','contact_db') or die('connection failed');

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
   
   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complete Responsive Personal Portfolio Website Design</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

   <!-- aos css link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" data-aos="zoom-out">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<!-- header section starts  -->

<header class="header">

   <div id="menu-btn" class="fas fa-bars"></div>

   <a href="#home" class="logo">Portfolio</a>

   <nav class="navbar">
      <a href="#home" class="active">home</a>
      <a href="#about">about</a>
      <a href="#services">services</a>
      <a href="#portfolio">portfolio</a>
      <a href="#contact">contact</a>
   </nav>

   <div class="follow">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
      <a href="#" class="fab fa-linkedin"></a>
      <a href="#" class="fab fa-github"></a>
   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="image" data-aos="fade-right">
      <img src="images/user-img.jpg" alt="">
   </div>

   <div class="content">
      <h3 data-aos="fade-up">Hi, I’m M Tonny Heru Susanto</h3>
      <span data-aos="fade-up">Full Stack Developer</span>
      <p data-aos="fade-up">Mengembangkan aplikasi web end-to-end menggunakan <b>PHP (Laravel)</b>, <b>JavaScript</b>, <b>MySQL</b>, dan <b>RESTful API</b>. Berpengalaman membangun <b>Layung Peradilan</b> untuk Pengadilan Negeri Bale Bandung yang terintegrasi dengan <b>Disdukcapil</b> demi verifikasi data warga secara otomatis.</p>
      <a data-aos="fade-up" href="#about" class="btn">About me</a>
   </div>


</section>

<!-- home section ends -->


<!-- about section starts  -->

<section class="about" id="about">

   <h1 class="heading" data-aos="fade-up"> <span>biography</span> </h1>

   <div class="biography">

      <p data-aos="fade-up">Saya lulusan S1 Teknik Informatika dari Universitas Informatika dan Bisnis Indonesia (UNIBI) dengan IPK 3.65. Saya memiliki pengalaman membangun aplikasi web full stack menggunakan PHP (Laravel), JavaScript, HTML/CSS, MySQL, dan integrasi RESTful API.
      <br><br>
      Selama magang sebagai Web Programmer di Pengadilan Negeri Bale Bandung, saya mengembangkan <b>Layung Peradilan</b> — sistem administrasi peradilan terintegrasi dengan layanan <b>Disdukcapil</b> (Cimahi, Kabupaten Bandung, dan Bandung Barat) untuk verifikasi data warga secara otomatis. Proyek ini mencakup requirement gathering, perancangan database, pengembangan front-end & back-end, integrasi API, deployment, hingga maintenance.</p>


      <div class="bio">
         <h3 data-aos="zoom-in"> <span>name : </span> M Tonny Heru Susanto </h3>
         <h3 data-aos="zoom-in"> <span>email : </span> tonnyheru29@gmail.com </h3>
         <h3 data-aos="zoom-in"> <span>address : </span> Bandung </h3>
         <h3 data-aos="zoom-in"> <span>phone : </span> - </h3>
         <h3 data-aos="zoom-in"> <span>age : </span> - </h3>
         <h3 data-aos="zoom-in"> <span>experience : </span> Magang Full Stack (2025) </h3>
      </div>



      <a href="../CV/Curriculum Vitae_tonnyheru.pdf" class="btn" data-aos="fade-up" download>Download CV</a>
      <a href="../CV/sertifikat.pdf" class="btn" data-aos="fade-up" download style="margin-left: 1rem;">Download Sertifikat</a>

   </div>

   
   <div class="skills" data-aos="fade-up">

      <h1 class="heading"> <span>skills</span> </h1>

   <div class="progress">
         <div class="bar" data-aos="fade-left"> <h3><span>PHP & Laravel</span> <span>85%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3><span>JavaScript</span> <span>80%</span></h3> </div>
         <div class="bar" data-aos="fade-left"> <h3><span>MySQL</span> <span>80%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3><span>RESTful API</span> <span>82%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3><span>Deployment & Maintenance</span> <span>78%</span></h3> </div>
      </div>



   </div>

   <div class="edu-exp">

      <h1 class="heading" data-aos="fade-up"> <span>education & experience</span> </h1>

      <div class="row">

         <div class="box-container">

            <h3 class="title" data-aos="fade-right">education</h3>

            <div class="box" data-aos="fade-right">
               <span>( 2019 - 2023 )</span>
               <h3>S1 Teknik Informatika (UNIBI)</h3>
               <p>Lulusan dengan IPK 3.65. Fokus pada Software Engineering dan Web Development.</p>
            </div>

         </div>

         <div class="box-container">

            <h3 class="title" data-aos="fade-left">experience</h3>

            <div class="box" data-aos="fade-left">
               <span>( Feb 2025 - Aug 2025 )</span>
               <h3>Web Programmer Intern • Pengadilan Negeri Bale Bandung</h3>
               <p>
                  Mengembangkan <b>Layung Peradilan</b> (web-based judicial administration) terintegrasi dengan <b>Disdukcapil</b> untuk verifikasi data warga.
                  Tercakup: requirement gathering, desain database & alur sistem, pengembangan FE/BE, integrasi RESTful API, deployment, serta maintenance.
               </p>
            </div>

            <div class="box" data-aos="fade-left">
               <span>Key Achievements</span>
               <h3>Penilaian Kompetensi 90/100</h3>
               <p>Programming, Database Management, Web Development, Security Best Practices, dan Version Control.</p>
            </div>

         </div>

      </div>


   </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading" data-aos="fade-up"> <span>services</span> </h1>

   <div class="box-container">

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-code"></i>
         <h3>web development</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-paint-brush"></i>
         <h3>graphic design</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fab fa-bootstrap"></i>
         <h3>bootstrap</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-chart-line"></i>
         <h3>seo marketing</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-bullhorn"></i>
         <h3>digital marketing</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fab fa-wordpress"></i>
         <h3>wordpress</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- portfolio section starts  -->

<section class="portfolio" id="portfolio">

   <h1 class="heading" data-aos="fade-up"> <span>portfolio</span> </h1>

   <div class="box-container">

      <div class="box" data-aos="zoom-in">
         <img src="images/img-1.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-2.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-3.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-4.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-5.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-6.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

   </div>

</section>

<!-- portfolio section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <h1 class="heading" data-aos="fade-up"> <span>contact me</span> </h1>

   <form action="" method="post">
      <div class="flex">
         <input data-aos="fade-right" type="text" name="name" placeholder="enter your name" class="box" required>
         <input data-aos="fade-left" type="email" name="email" placeholder="enter your email" class="box" required>
      </div>
      <input data-aos="fade-up" type="number" min="0" name="number" placeholder="enter your number" class="box" required>
      <textarea data-aos="fade-up" name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
      <input type="submit" data-aos="zoom-in" value="send message" name="send" class="btn">
   </form>

   <div class="box-container">

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-phone"></i>
         <h3>phone</h3>
         <p>+123-456-7890</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-envelope"></i>
         <h3>email</h3>
         <p>sanashaikh@gmail.com</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-map-marker-alt"></i>
         <h3>address</h3>
         <p>mumbai, india - 400104</p>
      </div>

   </div>

</section>

<!-- contact section ends -->

<div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span>mr. web designer</span> </div>












<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- aos js link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

   AOS.init({
      duration:800,
      delay:300
   });

</script>
   
</body>
</html>