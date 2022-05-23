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

    <link rel="stylesheet" href="../customer/css/style.css" />
    <link rel="stylesheet" href="css/style.css" />

    <script
      src="https://kit.fontawesome.com/8df3f43431.js"
      crossorigin="anonymous"
    ></script>

    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

  <body>
    <!--Header-->
    <header>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <h2>ADMIN <em>PANEL</em></h2>
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
                  >Dashboard</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reservation.php">Reservation</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="car.php">Cars</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <br /><br /><br /><br /><br />

    <div class="card mt-5 p-3 w-auto" id="login-card">
        <h4 class="text-center fw-bold">Login</h4>
        <form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="row">
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Email</p>
                <input
                  class="form-control mb-3"
                  type="text"
                  placeholder="Email"
                  name="email"
                  required
                />
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Password</p>
                <input
                  class="form-control mb-3"
                  type="password"
                  placeholder="Password"
                  name="password"
                  required
                />
              </div>
            </div>
            <div class="col-12">
              <button
                class="btn btn-primary bg-danger border-dark d-block w-100 h-75 mb-3"
                type="submit"
                id="login"
                name="login"
              >
                Login
              </button>
              
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php 
      require_once "../config.php";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
      $password = $_POST["password"];
      $encPassword = md5($password);

      $loginSql = "SELECT * FROM admin WHERE email='" . $email . "' AND password='" . $encPassword . "'";
      $result = $link->query($loginSql);

        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION["adminId"] = $row["admin_id"];
          echo "<script>window.location.href='index.php'; </script>";
        }else {
          echo "<script>alert('Wrong password or email'); </script>";
        }
      }
    ?>

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
