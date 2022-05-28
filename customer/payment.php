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

    <?php
    require_once "../config.php";
    $pick_up_date = $_SESSION["pickup_date"];
    $return_date = $_SESSION["return_date"];

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        parse_str($parts['query'], $query);
        $carid =  $query['carid'];
        $_SESSION["carId"] = $carid;
    }

    $car_id = $_SESSION["carId"];
    $currentDate = date("Y-m-d");
    $diff = date_diff(date_create($pick_up_date), date_create($return_date));
    $amount = (int) ($diff->format("%a") / 7 * 200);

    $carSql = "SELECT model FROM car WHERE car_id=" . $car_id;
    $carResult = $link->query($carSql);
    $carRow = mysqli_fetch_assoc($carResult); //contains car table
    $modelSql = "SELECT * FROM carmodel WHERE model_id=" . $carRow["model"];
    $carModelResult = $link->query($modelSql);
    $carModelRow = mysqli_fetch_assoc($carModelResult); //contains model table

    $currentDate = date("Y-m-d");
    $diff = date_diff(date_create($pick_up_date), date_create($return_date));
    $amount = (int) ($diff->format("%a") / 7 * 200);

    if (isset($_POST["paymentButton"])) {

        $locations = ["Antalya", "Ankara", "Isparta", "İstanbul"];
        $cardNumber = $_POST["cardNumber"];
        $expiry = $_POST["expiry"];
        $cvv = $_POST["cvv"];
        $customerId = $_SESSION["customerId"];
        $pick_up_location = $locations[$_SESSION["pickup_location"]];
        $return_location =$locations[$_SESSION["return_location"]];

        $invoiceSql = "INSERT INTO invoice (payment_id, amount, payment_date) VALUES (1, $amount, '$currentDate')";
        if (mysqli_query($link, $invoiceSql)) {
            $last_id = mysqli_insert_id($link);
            $rentSql = "INSERT INTO rent (customer_id, status, pick_up_address, return_address, invoice_id) VALUES ($customerId, 1, '$pick_up_location', '$return_location',$last_id)";
            if (mysqli_query($link, $rentSql)) {
                $rentId = mysqli_insert_id($link);
                $carBookingSql = "INSERT INTO carbooking (car_id, start_date, end_date, rent_id) VALUES ($car_id, '$pick_up_date', '$return_date', $rentId)";
                if (mysqli_query($link, $carBookingSql)) {

                    echo '<script>alert("Successfully booking ' . $personName . '");window.location.href="index.php";</script>';
                }
            }
        }
    }
    $firstName = $_SESSION["firstName"];
    $lastName = $_SESSION["lastName"];
    $personName = $firstName . " " . $lastName;

    echo "<script> document.getElementById('personName').value=\"$personName\" </script>";
    ?>
    <div class="container p-0">
        <div class="card">
            <h4 class="text-center fw-bold">Car Details</h4>
            <div id="carDetails" class="text-center p-3">
                <img src='<?php echo $carModelRow["img_link"] ?>' class='mb-3' alt=''>
                <h4><?php echo $carModelRow["brand_name"] . " - " . $carModelRow["model_name"] ?></h4>
                <h5><?php echo $pick_up_date . " & " . $return_date ?></h5>\
                <h4>$<?php echo $amount ?></h4>
            </div>
            <h4 class="text-center fw-bold">Payment Details</h4>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="paymentButton">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Person Name</p>
                            <input id="personName" name="personName" class="form-control mb-3" type="text" placeholder="Name" required />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Card Number</p>
                            <input name="cardNumber" class="form-control mb-3" type="text" placeholder="1234 5678 435678" required />
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Expiry</p>
                            <input name="expiry" class="form-control mb-3" type="text" placeholder="MM/YYYY" required />
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">CVV/CVC</p>
                            <input name="cvv" class="form-control mb-3 pt-2" type="password" placeholder="***" required />
                        </div>
                    </div>
                    <div class="col-12">
                        <button id="paymentButton" class="btn btn-primary mb-3" name="paymentButton">
                            <span class="ps-3">Pay</span>
                            <span class="fas fa-arrow-right"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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