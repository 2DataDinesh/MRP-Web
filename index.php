<!DOCTYPE html>
<html lang="en">

<?php require 'head.php'; ?>

<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
  }

  .slideshow-container img {
      width: 100%;
      height: 580px;
    }

    
    .lms2{
      display: none;
    }
  @media (max-width: 768px) {
    #contact, footer, .lms {
      display: none;
    }
    .lms2{
      display: block;
    }

    .slideshow-container img {
      width: 100%;
      height: 180px;
    }

    .prev, .next {
      font-size: 14px;
      padding: 8px;
    }
  }

  .slideshow-container {
    max-width: 100%;
    position: relative;
    margin: auto;
    overflow: hidden;
  }

  .mySlides {
    display: none;
  }

  img {
    width: 100%;
    height: auto;
    vertical-align: middle;
  }

  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    color: black;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }

  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  .prev:hover, .next:hover {
   
    color: white;
  }

  @keyframes fade {
    from {
      opacity: .4;
    }
    to {
      opacity: 1;
    }
  }

  /* Ensure buttons and text size adjust for very small screens */
  @media only screen and (max-width: 300px) {
    .prev, .next, .text {
      font-size: 11px;
    }
  }




  
</style>

<body class="index-page">

  <?php include "navbar.php"; ?>

  <main class="main" id="home">

    <!-- Slideshow Section -->
    <div class="slideshow-container pt-2">

      <?php
      include "db_config.php";
      $fet_img = "SELECT * FROM banner";
      $res_img = mysqli_query($con, $fet_img);
      if ($res_img) {
        while ($row = mysqli_fetch_array($res_img)) {
      ?>
          <div class="mySlides pt-5">
            <img src="uploads/<?php echo $row['image']; ?>" alt="Banner Image">
          </div>
      <?php
        }
      } else {
        echo "Error fetching images: " . mysqli_error($con);
      }
      ?>

      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>


    
    <!-- Services Section -->
    <section id="services" class="services section lms2">


      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4 col-md-4 col-sm-3 col-6 m-auto pt-2" data-aos="fade-up" data-aos-delay="100">
            <a href="students/">
              <div class="service-item d-flex justify-content-center item-cyan">
                <i class="bi bi-book icon"></i>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-3 col-6 m-auto pt-2" data-aos="fade-up" data-aos-delay="500">
            <a href="121245/">
              <div class="service-item d-flex justify-content-center item-indigo">
                <i class="bi bi-people-fill icon"></i>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-3 col-6 m-auto pt-2" data-aos="fade-up" data-aos-delay="600">
            <a href="admin/">
              <div class="service-item d-flex justify-content-center item-pink">
                <i class="bi bi-person-badge-fill icon"></i>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-3 col-6 m-auto pt-2" data-aos="fade-up" data-aos-delay="200">
            <a href="">
              <div class="service-item d-flex justify-content-center item-orange">
                <i class="bi bi-calendar-check icon"></i>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-3 col-6 m-auto pt-2" data-aos="fade-up" data-aos-delay="300">
            <a href="">
              <div class="service-item d-flex justify-content-center item-teal">
                <i class="bi bi-calendar3 icon"></i>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-3 col-6 m-auto pt-2" data-aos="fade-up" data-aos-delay="400">
            <a href="">
              <div class="service-item d-flex justify-content-center item-red">
                <i class="bi bi-chat-left-quote icon"></i>
            </a>
          </div>
        </div>
      </div>
    </section>




    <!-- Services Section -->
    <section id="services" class="services section lms">
      <div class="container section-title" data-aos="fade-up">
        <h2>LMS Services</h2>
      </div>

      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <a href="students/">
              <div class="service-item item-cyan">
                <i class="bi bi-book icon"></i>
                <div class="lms">
                  <h3>Exam</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <a href="121245/">
              <div class="service-item item-indigo">
                <i class="bi bi-people-fill icon"></i>
                <div class="lms">
                  <h3>Teachers</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <a href="admin/">
              <div class="service-item item-pink">
                <i class="bi bi-person-badge-fill icon"></i>
                <div class="lms">
                  <h3>Admin</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <a href="">
              <div class="service-item item-orange">
                <i class="bi bi-calendar-check icon"></i>
                <div class="lms">
                  <h3>Attendance</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <a href="">
              <div class="service-item item-teal">
                <i class="bi bi-calendar3 icon"></i>
                <div class="lms">
                  <h3>Events</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <a href="">
              <div class="service-item item-red">
                <i class="bi bi-chat-left-quote icon"></i>
                <div class="lms">
                  <h3>Feedback</h3>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact Us</h2>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <form action="forms/contact1.php" method="post" class="frm" data-aos="fade-up" data-aos-delay="400">
              <h3>Enquiry Form</h3>
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name *" pattern="[A-Za-z\s]+" title="Please fill or enter only letters." required="">
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Your Email * " required="">
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" id="phoneNumber" name="phone" placeholder="Enter mobile number *" minlength="10" maxlength="10" oninput="phoneNumberValidation(event)" pattern="^[7896][0-9]{9}$" required="">
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message *" required=""></textarea>
                  <small class="text-end">2 - 300 words preferred </small>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" name="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
    </section>

  </main>

  <?php require 'footer.php'; ?>

</body>

<script>
  function phoneNumberValidation(event) {
    var phoneNumber = event.target.value;

    if (isNaN(event.key)) {
      event.preventDefault();
      return false;
    }

    if (phoneNumber.length === 0 && !['6', '7', '8', '9'].includes(event.key)) {
      event.preventDefault();
      return false;
    }

    if (phoneNumber.length >= 10) {
      event.preventDefault();
      return false;
    }

    return true;
  }

  let slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
  }
</script>

</html>
