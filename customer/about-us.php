<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Rental Software</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/style.css" />

    <script
      src="https://kit.fontawesome.com/8df3f43431.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <!--Header-->
    <header>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <h2>Car Rental <em>Software</em></h2>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php"
                  >Home</a
                >
              </li>
              
              <li class="nav-item active">
                <a class="nav-link" href="about-us.php">About Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <?php
              if (!isset($_SESSION["customerId"])) {
                echo '<li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>';
              }else {
                echo '<li class="nav-item">
                <a class="nav-link" href="profile.php">My Profile</a>
              </li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div
      class="page-heading about-heading header-text"
      style="background-image: url(../images/heading-1-1920x500.jpg)"
    >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>about us</h4>
              <h2>our company</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Lorem ipsum dolor sit amet consectetur adipisicing</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="../images/about-1-570x350.jpg" alt="" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Lorem ipsum dolor sit amet.</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed
                voluptate nihil eum consectetur similique? Consectetur, quod,
                incidunt, harum nisi dolores delectus reprehenderit voluptatem
                perferendis dicta dolorem non blanditiis ex fugiat. Lorem ipsum
                dolor sit amet, consectetur adipisicing elit.<br /><br />Lorem
                ipsum dolor sit amet, consectetur adipisicing elit. Et,
                consequuntur, modi mollitia corporis ipsa voluptate corrupti eum
                ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti
                necessitatibus perspiciatis quis.
              </p>
              <ul class="social-icons">
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Lorem ipsum dolor sit amet.</h2>
            </div>

            <h5>Lorem ipsum dolor sit amet.</h5>

            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed
              voluptate nihil eum consectetur similique? Consectetur, quod,
              incidunt, harum nisi dolores delectus reprehenderit voluptatem
              perferendis dicta dolorem non blanditiis ex fugiat. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.<br /><br />Lorem
              ipsum dolor sit amet, consectetur adipisicing elit. Et,
              consequuntur, modi mollitia corporis ipsa voluptate corrupti eum
              ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti
              necessitatibus perspiciatis quis.
            </p>

            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo
              quae eveniet tempora reprehenderit quo, necessitatibus vel sit
              laboriosam, sunt obcaecati quisquam explicabo voluptatibus earum
              facilis quidem fuga maiores. Quasi, obcaecati? <br /><br />
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi,
              est officiis. Ipsam quas consequuntur adipisci quis, fuga pariatur
              eius eveniet qui similique nulla inventore accusantium, suscipit
              asperiores quibusdam culpa iure!
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2022 Mehmet Karagoz</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
