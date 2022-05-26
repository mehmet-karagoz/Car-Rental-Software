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
        <?php
        require_once "../config.php";
        if (isset($_GET["cancel"])) {

            $cancelSql = "UPDATE rent SET status=0 WHERE rent_id=" . $_GET["cancel"];
            if (mysqli_query($link, $cancelSql)) {
                
            } else {
                echo "Error updating record: " . mysqli_error($link);
            }
        }
        $customerId = $_SESSION["customerId"];
        $rentSql = "SELECT * FROM rent WHERE customer_id=" . $customerId . " ORDER BY status DESC";
        $result = $link->query($rentSql);
        $table = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $rentId = $row["rent_id"];

            $invoiceSql = "SELECT * FROM invoice WHERE invoice_id=" . $row["invoice_id"];
            $invoiceResult = $link->query($invoiceSql);
            $invoiceRow = mysqli_fetch_assoc($invoiceResult);

            $bookingSql = "SELECT * FROM carbooking WHERE rent_id=" . $rentId;
            $bookingResult = $link->query($bookingSql);
            $bookingRow = mysqli_fetch_assoc($bookingResult);

            $carSql = "SELECT * FROM car WHERE car_id=" . $bookingRow["car_id"];
            $carResult = $link->query($carSql);
            $carRow = mysqli_fetch_assoc($carResult);

            $modelSql = "SELECT * FROM carmodel WHERE model_id=" . $carRow["model"];
            $modelResult = $link->query($modelSql);
            $modelRow = mysqli_fetch_assoc($modelResult);

            $car = $modelRow["brand_name"] . " " . $modelRow["model_name"];
            $date = $bookingRow["start_date"] . " & " . $bookingRow["end_date"];
            $location = $row["pick_up_address"] . " & " . $row["return_address"];
            $amount = $invoiceRow["amount"];
            $status;
            if ($row["status"] == "1") {
                $status = "Active";
            } else {
                $status = "Cancelled";
            }

            $table = $table . "<tr><td>" . $car . "</td>\
        <td>" . $date . "</td>\
        <td>" . $location . "</td>\
        <td>$" . $amount . "</td>\
        <td>" . $status . "</td>\
        <td> <form>\
        <a\
          name='update'\
          type='submit'\
          href='update.php?rentid=" . $row["rent_id"] . "'\
          class='btn btn-outline-info'\
        >\
          Update\
        </a>\
        <button\
          value='" . $row["rent_id"] . "'\
          name='cancel'\
          type='submit'\
          class='btn btn-outline-danger'\
        >\
          Cancel\
        </button>\
        </form>\</td></tr>";
        }
        echo "<script>document.getElementById(\"myBooking\").innerHTML=\"" . $table . "\"; </script>";


        ?>

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

        <script>
            function openBill() {
                document.getElementById('id01').style.display='block';  
            }
            function updateRent() {
                window.location.href='update.php';
            }
        </script>
</body>

</html>