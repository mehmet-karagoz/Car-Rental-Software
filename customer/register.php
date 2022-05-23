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
      <div class="card mt-5 p-3 w-auto" id="register-card">
        <h4 class="text-center fw-bold">Register</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="row">
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">First Name</p>
                <input
                  class="form-control mb-3"
                  type="text"
                  name="firstname"
                  placeholder="First Name"
                  required
                />
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Last Name</p>
                <input
                  class="form-control mb-3"
                  type="text"
                  name="lastname"
                  placeholder="Last Name"
                  required
                />
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Email</p>
                <input
                  class="form-control mb-3"
                  type="text"
                  name="email"
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
              <div class="d-flex flex-column">
                <p class="text mb-1">Date of birth</p>
                <input
                  class="form-control mb-3"
                  type="date"
                  name="dob"
                  placeholder="DOB"
                  id="dob"
                  required
                />
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Address</p>
                <input
                  class="form-control mb-3"
                  type="text"
                  name="address"
                  placeholder="Antalya/Konyaaltı"
                  
                />
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column mb-3">
                <span class="text mb-1">Gender : </span>
                <span><input type="radio" name="gender" value="female"> Female</span>
                <span><input type="radio" name="gender" value="male"> Male</span>
              </div>
            </div>
            <div class="col-12">
              <button
                class="btn btn-primary bg-danger border-dark d-block w-100 h-50 mb-3"
                type="submit"
                id="register"
              >
                Register
              </button>
              
            </div>
          </div>
        </form>
        <h5>
                Already have an account? Please sign in.
                <span
                  ><button
                    onclick="window.location.href = 'login.php';"
                    class="btn btn-primary bg-danger border-dark h-50 mb-3"
                    type="submit"
                    id="login"
                  >
                    Login
                  </button></span
                >
              </h5>
      </div>

      
    </div>

    <?php 
      require_once "../config.php";
      $first_name = $last_name = $email = $password = $dob = $address = $gender = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = test_input($_POST["firstname"]);
        $last_name = test_input($_POST["lastname"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $dob = date('Y-m-d', strtotime($_POST['dob']));
        $address = test_input($_POST["address"]);
        $gender = test_input($_POST["gender"]);

        $sql = "SELECT customer_id, first_name, last_name FROM customer WHERE email = '$email'";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {

          echo "already registered";

          // output data of each row

          // while($row = mysqli_fetch_assoc($result)) {
          //   echo "id: " . $row["customer_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
          // }
        } else {
          $encPassword = md5($password);
          $sql = "INSERT INTO customer (first_name, last_name, dob, gender, email, address, password, account_status)
VALUES ('$first_name', '$last_name', '$dob', '$gender','$email', '$address','$encPassword', 1);";

          if (mysqli_query($link, $sql)) {
              //echo "New record created successfully";
              echo "<script>window.location.href = 'login.php'</script>";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($link);
          }
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
