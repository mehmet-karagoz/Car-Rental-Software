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
              <li class="nav-item">
                <a class="nav-link" href="about-us.php">About Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="login.php">Login/Register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div
      class="page-heading about-heading header-text"
      style="background-image: url(../images/blog-image-fullscren-1-1920x700.jpg)"
    >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <h2>Login/Register</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="card mt-5 p-3 w-auto" id="login-card">
        <h4 class="text-center fw-bold">Login</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="row">
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Email</p>
                <input
                  class="form-control mb-3"
                  name = "email"
                  type="text"
                  placeholder="Email"
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
                  name="password"
                  placeholder="Password"
                  required
                />
              </div>
            </div>
            <div class="col-12">
              <button
                class="btn btn-primary bg-danger border-dark d-block w-100 h-50 mb-3"
                type="submit"
                id="register"
              >
                Login
              </button>
              
            </div>
          </div>
        </form>
        <h5>
                Don't you have an account? Please register.
                <span
                  ><button
                    onclick="window.location.href= 'register.php';"
                    class="btn btn-primary bg-danger border-dark h-50 mb-3"
                    type="submit"
                    id="login"
                  >
                    Register
                  </button></span
                >
              </h5>
      </div>
    </div>

    <?php 
      require_once "../config.php";
      $email = $password = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $encPassword = md5($password);

        $sql = "SELECT * FROM customer WHERE email = '$email' AND password = '$encPassword' AND account_status=1";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION["customerId"] = $row["customer_id"];
          $_SESSION["firstName"] = $row["first_name"];
          $_SESSION["lastName"] = $row["last_name"];

            echo "<script>window.location.href = 'index.php'</script>";

        //   while($row = mysqli_fetch_assoc($result)) {
        //     echo "id: " . $row["customer_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
        //   }
        } else {
            echo "Password or email incorrect";
        }
      }
      function test_input($data)
      {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
    

      mysqli_close($link);
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

    <script src="js/custom.js"></script>
  </body>
</html>
