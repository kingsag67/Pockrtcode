<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'connect.php';

if (!isset($_SESSION['email'])) {
    header("Location: join.php");
    exit();
}

// Total tutorial views
$tutorialCount = $conn->query("SELECT COUNT(*) AS count FROM learning_activity WHERE content_type = 'tutorial'")->fetch_assoc()['count'];

// Total course views
$courseCount = $conn->query("SELECT COUNT(*) AS count FROM learning_activity WHERE content_type = 'course'")->fetch_assoc()['count'];

// Total students who viewed at least one thing
$studentCount = $conn->query("SELECT COUNT(DISTINCT user_email) AS count FROM learning_activity")->fetch_assoc()['count'];

// Static instructor count
$instructorCount = 5;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bhutan Code Solution - Home</title>
  <link rel="stylesheet" href="css/index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <header class="bg-dark text-white">
    <div class="container py-2">
      <div class="row align-items-center">
        <div class="col-md-8 d-flex flex-column flex-md-row align-items-center gap-2">
          <div><i class="fa fa-phone me-2"></i>+975 17 542 181</div>
          <div><i class="fa fa-envelope me-2"></i>kingsagatkd17@gmail.com</div>
        </div>
        <div class="col-md-4 d-flex justify-content-md-end justify-content-start gap-3 mt-2 mt-md-0">
          <a href="#" class="text-white fs-5"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-white fs-5"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-white fs-5"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </header>

  <nav>
    <div class="nav-container">
      <a href="index.php" class="logo"><img src="img/logocode.png" alt="Bhutan Code Solution Logo"></a>
      <div class="nav-links">
      <a href="index.php">Home</a>
        <a href="tutorial.html">Tutorial</a>
        <a href="courses.html">Courses</a>
        <a href="contact.html">Contact</a>
        <a href="join.php" class="btn">Join Us</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>
    </div>
  </nav>

  <section class="hero">
    <h1>Bhutan Code Solution</h1>
    <p>Learn From Home</p>
    <div class="search-box">
      <input type="text" id="searchInput" placeholder="Search">
      <button onclick="searchContent()">Search</button>
    </div>
  </section>

  <section class="about">
    <div class="about-image">
      <img src="img/reimg.png" alt="designs">
    </div>
    <div class="about-content">
      <h4>We are the first choice for online education anywhere. Our platform offers high-quality courses taught by
        expert instructors.</h4>
      <div class="stats">
        <div class="stat-box">
          <h3>
            <?php echo $instructorCount; ?>
          </h3>
          <p>Instructors</p>
        </div>
        <div class="stat-box">
          <h3>
            <?php echo $tutorialCount; ?>
          </h3>
          <p>Tutorial</p>
        </div>
        <div class="stat-box">
          <h3>
            <?php echo $courseCount; ?>
          </h3>
          <p>Courses</p>
        </div>
        
        <div class="stat-box">
          <h3>
            <?php echo $studentCount; ?>
          </h3>
          <p>Students</p>
        </div>
      </div>

    </div>
  </section>

  <section class="courses">
    <h2>Our Courses</h2>
    <p>Check out our newest course offerings</p>
    <div class="course-grid">
      <div class="course-card">
        <div class="course-img">
          <img src="img/web-developer-3.webp" alt="web-developer-3">
        </div>
        <div class="course-info">
          <h3>Web Development</h3>
          <p>Learn to build modern websites from scratch</p>
          <a href="student_viewlink.php?type=course&name=Web%20Development&url=https://www.geeksforgeeks.org/web-development/"
            class="btn">View Course</a>
        </div>
      </div>
      <div class="course-card">
        <div class="course-img">
          <img src="img/graphic_designbanner.jpg" alt="graphic-design">
        </div>
        <div class="course-info">
          <h3>Graphic Design</h3>
          <p>Create stunning visual designs</p>
          <a href="student_viewlink.php?type=course&name=Graphic%20Design&url=https://www.skillshare.com/en/browse/graphic-design"
            class="btn">View Course</a>
        </div>
      </div>
      <div class="course-card">
        <div class="course-img">
          <img src="img/Mobile-App.png" alt="mobile">
        </div>
        <div class="course-info">
          <h3>Mobile App Developer</h3>
          <p>Create apps for smartphones and more</p>
          <a href="student_viewlink.php?type=course&name=Mobile%20App%20Developer&url=https://www.mygreatlearning.com/mobile-app-development/free-courses"
            class="btn">View Course</a>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials">
    <h2>What Our Students Say</h2>
    <div class="testimonial">
      <p>"This platform changed my life! The courses are excellent and the instructors are very knowledgeable."</p>
      <p>sagar</p>
    </div>
  </section>

  <footer>
    <div class="footer-columns">
      <div class="footer-column">
        <strong>Main</strong>
        <a href="index.php">Home</a>
        <a href="contact.html">Contact</a>
        <a href="#">Work With Us</a>
        <a href="#">My Gear</a>
      </div>
      <div class="footer-column">
        <strong>Learn</strong>
        <a href="courses.html">Courses</a>
        <a href="tutorial.html">Tutorials</a>
        <a href="#">Notes</a>
      </div>
      <div class="footer-column">
        <strong>Legal</strong>
        <a href="#">Terms</a>
        <a href="#">Privacy</a>
        <a href="#">Refund</a>
      </div>
      <div class="footer-column">
        <strong>Social</strong>
        <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
        <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
        <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
        <a href="#"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
        <a href="#"><i class="fab fa-github"></i> GitHub</a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>Made in Bhutan</p>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Bhutan Developer. All rights reserved.</p>
    </div>
  </footer>
</body>
  <script src="js/sndex.js"></script>


</html>