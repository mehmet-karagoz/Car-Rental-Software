<?php
// Start the session
session_start();

if (!isset($_SESSION["customerId"])) {
  echo "<script> alert('You need to login first!');window.location.href='login.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Car Rental Software</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <link rel="stylesheet" href="css/style.css" />

  <script src="https://kit.fontawesome.com/8df3f43431.js" crossorigin="anonymous"></script>
</head>

<body>
  <!--Header-->
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <h2>Car Rental <em>Software</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="reservation.php">Reservation</a>
            </li>

            <li class="nav-item">
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
  <div class="page-heading about-heading header-text" style="background-image: url(../images/heading-6-1920x500.jpg)">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>Lorem ipsum dolor sit amet</h4>
            <h2>Reservation</h2>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div id="reservationModal" class="modal">
    <!-- Modal Content -->
    <div class="modal-content">

      <span class="close">&times;</span>
    </div>
  </div>

  <!-- Cars -->
  <div class="products">
    <div class="container">
      <div id="cars" class="row">

        <div class="col-md-12">
          <ul class="pages">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>
              <a href="#"><i class="fa fa-angle-double-right"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <?php
  require_once "../config.php";

  $pick_up_date = $_SESSION["pickup_date"];
  $return_date = $_SESSION["return_date"];


  $sql = "SELECT * FROM car WHERE car_id NOT IN (SELECT car_id FROM carbooking cb WHERE '$pick_up_date' BETWEEN cb.start_date AND cb.end_date)";
  //var_dump($sql);
  $result = $link->query($sql);
  if ($result->num_rows > 0) {

    $html = "";

    while ($row = mysqli_fetch_assoc($result)) {
      $modelSql = "SELECT * FROM carmodel WHERE model_id=" . $row["model"];
      $secondResult = $link->query($modelSql);
      $secondRow = mysqli_fetch_assoc($secondResult); //contains model table
      $detailSql = "SELECT * FROM cardetail WHERE id=" . $row["car_detail_id"];
      $thirdResult = $link->query($detailSql);
      $thirdRow = mysqli_fetch_assoc($thirdResult); //contains car detail table

      $html = $html . "<div class='col-md-4'>\
            <div class='product-item'>\
              <img src='" . $secondRow["img_link"] . "' alt='' />\
              <div class='down-content'>\
                <h4> " . $secondRow["model_name"] . " - " . $secondRow["brand_name"] . "</h4>\
                <h6 id='price'><small>from</small> $" . $thirdRow["daily_price"] . " <small>per day</small></h6>\
                <p>" . $row["description"] . "</p>\
                <small>\
                  <strong title='passegengers'\
                    ><i class='fa fa-user'></i> " . $thirdRow["number_of_seat"] . "</strong\
                  >\
                  &nbsp;&nbsp;&nbsp;&nbsp;\
                  <strong title='luggages'\
                    ><i class='fa fa-briefcase'></i> " . $thirdRow["capacity_of_luggage"] . "</strong\
                  >\
                  &nbsp;&nbsp;&nbsp;&nbsp;\
                  <strong title='doors'\
                    ><i class='fa fa-sign-out'></i> " . $thirdRow["number_of_door"] . "</strong\
                  >\
                  &nbsp;&nbsp;&nbsp;&nbsp;\
                  <strong title='transmission'\
                    ><i class='fa fa-cog'></i> " . $thirdRow["gear_type"] . "</strong\
                  >\
                </small>\
                <span>\
                  <button\
                    id='" . $row["car_id"] . "'\
                    value='" . $row["car_id"] . "'\
                    type='submit'\
                    name='rent'\
                    onclick='openPayment(this.id);'\
                    class='btn btn-primary d-block w-100 bookCar bg-dark border-dark'\
                  >\
                    Book now\
                  </button>\
                </span>\
              </div>\
            </div>\
          </div>";
    }
    echo "<script>document.getElementById(\"cars\").innerHTML=\"" . $html . "\"; </script>";
  } else {
    echo "There is no available car.";
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="js/custom.js"></script>
</body>

</html>