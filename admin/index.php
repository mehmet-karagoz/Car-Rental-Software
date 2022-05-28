<?php
// Start the session
session_start();

if (!isset($_SESSION["adminId"])){
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
              <li class="nav-item active">
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
              <li class="nav-item">
                <a class="nav-link" href="customers.php">Users</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <br /><br /><br /><br /><br />

    <?php
      require_once "../config.php";

      $carSql = "SELECT COUNT(*) as car_num FROM car";
      $reservationSql = "SELECT COUNT(*) as rent_num FROM rent";
      $userSql = "SELECT COUNT(*) as user_num FROM customer";
      $incomeSql = "SELECT SUM(amount) as income_num FROM invoice";

      $result = $link->query($carSql);
      $row = mysqli_fetch_assoc($result);
      $carNumber = $row["car_num"];

      $result = $link->query($reservationSql);
      $row = mysqli_fetch_assoc($result);
      $reservationNumber = $row["rent_num"];

      $result = $link->query($userSql);
      $row = mysqli_fetch_assoc($result);
      $userNumber = $row["user_num"];

      $result = $link->query($incomeSql);
      $row = mysqli_fetch_assoc($result);
      $incomeNumber = $row["income_num"];
    ?>

    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card-counter primary">
            <i class="fa fa-code-fork"></i>
            <span class="count-numbers"><?php echo $carNumber ?></span>
            <span class="count-name">Cars</span>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter danger">
            <i class="fa fa-ticket"></i>
            <span class="count-numbers"><?php echo $reservationNumber ?></span>
            <span class="count-name">Reservations</span>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter success">
            <i class="fa fa-database"></i>
            <span class="count-numbers">$<?php echo $incomeNumber ?></span>
            <span class="count-name">Income</span>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter info">
            <i class="fa fa-users"></i>
            <span class="count-numbers"><?php echo $userNumber ?></span>
            <span class="count-name">Users</span>
          </div>
        </div>
      </div>
    </div>

    <div class="container recent-bookings">
      <h3>Recent Car Bookings</h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Booking</th>
            <th>Car</th>
            <th>Status</th>
            <th>Date</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody id="recentBooking">
          
        </tbody>
      </table>
    </div>

    <?php 
      $tableHtml = "";
      $carBookingSql = "SELECT car_id, rent_id FROM carbooking ORDER BY rent_id DESC";
      $result = $link->query($carBookingSql);
      while($row = mysqli_fetch_assoc($result)) {
        $carSql = "SELECT model FROM car WHERE car_id=" . $row["car_id"];
        $carResult = $link->query($carSql);
        $carRow = mysqli_fetch_assoc($carResult);
        $modelSql = "SELECT model_name FROM carmodel WHERE model_id=" . $carRow["model"];
        $modelResult = $link->query($modelSql);
        $modelRow = mysqli_fetch_assoc($modelResult);

        $modelName = $modelRow["model_name"];

        $rentSql = "SELECT * FROM rent WHERE rent_id=" . $row["rent_id"];
        $rentResult = $link->query($rentSql);
        $rentRow = mysqli_fetch_assoc($rentResult);
        $customerSql = "SELECT * FROM customer WHERE customer_id=" . $rentRow["customer_id"];
        $customerResult = $link->query($customerSql);
        $customerRow = mysqli_fetch_assoc($customerResult);

        $booking = $customerRow["first_name"] . " " . $customerRow["last_name"];

        $invoiceSql = "SELECT * FROM invoice WHERE invoice_id=" . $rentRow["invoice_id"];
        $invoiceResult = $link->query($invoiceSql);
        $invoiceRow = mysqli_fetch_assoc($invoiceResult);
        if ( $rentRow["status"] == "1") {
          $status = "<p id='done'>Active</p>";
        }else {
          $status = "<p id='progress'>Cancelled</p>";
        }
        $date = $invoiceRow["payment_date"];
        $amount = $invoiceRow["amount"];

        $tableHtml = $tableHtml . "<tr>\
        <td>\
          <div class='d-flex flex-row flex-nowrap'>\
            <!--div as flexbox with content in a row without wrap-->\
            <div class='img img-responsive me-4'>\
              <!--responsive img inside div-->\
              <img\
                class='img img-fluid'\
                src='../images/team_04.jpg'\
                width='50'\
                height='50'\
                alt=''\
              />\
            </div>\
            <p>" . $booking . "</p>\
          </div>\
        </td>\
        <td>" . $modelName . "</td>\
        <td>\
          <div class='status'>\
            " . $status ."\
          </div>\
        </td>\
        <td>" . $date . "</td>\
        <td>$" . $amount . "</td>\
      </tr>";

      }
      echo "<script>document.getElementById(\"recentBooking\").innerHTML=\"" . $tableHtml . "\"; </script>";

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
