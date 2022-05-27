<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Car Rental Software</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css" />

    <script src="https://kit.fontawesome.com/8df3f43431.js" crossorigin="anonymous"></script>
</head>

<body class="w3-content" style="max-width:1300px">

    <?php
    $firstName = $_SESSION["firstName"];
    $lastName = $_SESSION["lastName"];
    $personName = $firstName . " " . $lastName;
    ?>
    <!-- First Grid: Logo & About -->
    <div class="w3-row">
        <div class="w3-half w3-black w3-container w3-center" style="height:700px">
            <div class="w3-padding-64">
                <h1>Welcome !!!</h1>
                <h2><?php echo strtoupper($personName) ?></h2>
            </div>
            <div class="w3-padding-64">
                <a href="index.php" class="w3-button w3-black w3-block w3-hover-blue-grey w3-padding-16">Home</a>
                <a href="#work" class="w3-button w3-black w3-block w3-hover-teal w3-padding-16">My Reservations</a>
                <a href="#contact" class="w3-button w3-black w3-block w3-hover-brown w3-padding-16">Contact</a>
            </div>
        </div>
        <div class="w3-half w3-blue-grey w3-container" style="height:700px">
            <div class="w3-padding-64 w3-center">
                <h1>About Me</h1>
                <img src="../images/team_01.jpg" class="w3-margin w3-circle" alt="Person" style="width:50%">
                <div class="w3-left-align w3-padding-large">
                    <p>Lorem ipusm sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                    <p>Lorem ipusm sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                </div>
            </div>
        </div>
    </div>

    <?php

    require_once "../config.php";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        parse_str($parts['query'], $query);
        $rentid =  $query['rentid'];
        $_SESSION["rentid"] = $rentid;
    }

    $rentBookSql = "SELECT * FROM rent WHERE rent_id=" . $_SESSION["rentid"];
    $resultBook = $link->query($rentBookSql);
    $rowBook = mysqli_fetch_assoc($resultBook);
    $_SESSION["pickup_location"] = $rowBook["pick_up_address"];
    $_SESSION["return_location"] = $rowBook["return_address"];

    $rentSql = "SELECT * FROM carbooking WHERE rent_id=" . $_SESSION["rentid"];
    $result = $link->query($rentSql);
    $row = mysqli_fetch_assoc($result);
    $pickUpDate = $row["start_date"];
    $returnDate = $row["end_date"];

    ?>

    <div class="card text-center" id="formCard">
        <h2>UPDATE THE REZERVATION</h2>
        <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h5>PICK UP</h5>
                <div class="pick-up-date">
                    <input type="date" name="pick-up-date" id="pick-up" value="<?php echo $pickUpDate ?>" required />
                </div>
                <h5>RETURN</h5>
                <div class="return-date">
                    <input type="date" name="return-date" id="return" value="<?php echo $returnDate ?>" required />
                </div>
                <button class="btn btn-primary d-block w-100" type="submit" id="find-vehicle">
                    Update<i class="fa fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    <?php
    require_once "../config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pickUpDate = $_POST["pick-up-date"];
        $returnDate = $_POST["return-date"];

        $sql = "SELECT * FROM car WHERE car_id NOT IN (SELECT car_id FROM carbooking cb WHERE '$pickUpDate' BETWEEN cb.start_date AND cb.end_date) AND car_id=" . $row["car_id"];
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            
            $updateSql = "UPDATE carbooking SET start_date='$pickUpDate', end_date='$returnDate' WHERE rent_id=" . $_SESSION["rentid"];
            if (mysqli_query($link, $updateSql) && $pickUpDate > $date_now && $returnDate > $date_now && $returnDate > $pickUpDate) {
                echo "<script> alert('Successfully updated!!'); window.location.href='index.php'; </script>";
            }else {
                echo "<script> alert('Please pick a valid date!');</script>";
            }

        } else {
            
            $_SESSION["pickup_date"] = $pickUpDate;
            $_SESSION["return_date"] = $returnDate;
            $date_now = date("Y-m-d"); // this format is string comparable
            if ($pickUpDate > $date_now && $returnDate > $date_now && $returnDate > $pickUpDate) {
                // $deleteSql = "DELETE FROM carbooking WHERE rent_id=" . $_SESSION["rentid"];
                // if (mysqli_query($link, $deleteSql)) {
                    $cancelSql = "UPDATE rent SET status=0 WHERE rent_id=" .$_SESSION["rentid"];
            if (mysqli_query($link, $cancelSql)) {
                
                echo "<script>window.location.href = 'reservation.php' </script>";
            } else {
                echo "Error updating record: " . mysqli_error($link);
            }

                //}
            } else {
                echo "<script> alert('Please pick a valid date!');</script>";
            }
        }
    }
    ?>

    <!-- Second Grid: Work & Resume -->
    <div class="w3-row">
        <div class="w3-light-grey w3-center text-center" style="min-height:800px" id="work">
            <div class="w3-padding-64">
                <h2>My Reservations</h2>
            </div>
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>Car</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myBooking">

                </tbody>
            </table>
        </div>
        <!-- Third Grid: Swing By & Contact -->
        <div class="w3-row" id="contact">
            <div class="w3-half w3-dark-grey w3-container w3-center" style="height:700px">
                <div class="w3-padding-64">
                    <h1>Swing By</h1>
                </div>
                <div class="w3-padding-64">
                    <p>..for a cup of coffee, or whatever.</p>
                    <p>Chicago, US</p>
                    <p>+00 1515151515</p>
                    <p>test@test.com</p>
                </div>
            </div>
            <div class="w3-half w3-teal w3-container" style="height:700px">
                <div class="w3-padding-64 w3-padding-large">
                    <h1>Contact</h1>
                    <p class="w3-opacity">GET IN TOUCH</p>
                    <form class="w3-container w3-card w3-padding-32 w3-white" action="/action_page.php" target="_blank">
                        <div class="w3-section">
                            <label>Name</label>
                            <input class="w3-input" style="width:100%;" type="text" required name="Name">
                        </div>
                        <div class="w3-section">
                            <label>Email</label>
                            <input class="w3-input" style="width:100%;" type="text" required name="Email">
                        </div>
                        <div class="w3-section">
                            <label>Message</label>
                            <input class="w3-input" style="width:100%;" type="text" required name="Message">
                        </div>
                        <button type="submit" class="w3-button w3-teal w3-right">Send</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="w3-container w3-black w3-padding-16">
            <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="js/home.js"></script>
</body>

</html>