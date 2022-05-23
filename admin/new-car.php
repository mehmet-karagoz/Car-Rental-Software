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
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php"
                  >Dashboard</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reservation.php">Reservation</a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="car.php">Cars</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <br /><br /><br /><br /><br />
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
        />
      </symbol>
      <
    </svg>
    <div
      id="success"
      class="alert alert-success d-flex align-items-center alert-dismissible fade show"
      style="display: none !important"
      role="alert"
    >
      <svg
        class="bi flex-shrink-0 me-2"
        width="24"
        height="24"
        role="img"
        aria-label="Success:"
      >
        <use xlink:href="#check-circle-fill" />
      </svg>
      <div>Successfully Added</div>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
        onclick="location.href = '/admin/car.php';"
      ></button>
    </div>

    <!-- Modal -->
    <div id="reservationModal" class="container">
      <!-- Modal Content -->
      <div class="modal-content">
        <div class="container p-0" id="modal-text">
          <div class="row">
            <div class="col-md-4">
              <img
                src="../images/product-1-370x270.jpg"
                class="img-fluid"
                alt=""
              />
                          
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col">
                  <h4 style="text-align: center">Add New Car</h4>
                </div>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="row">
              <div class="col-12">
                  <div class="d-flex flex-column">
                    <p class="text mb-1">Image Link</p>
                    <input
                      name="img_link"
                      class="form-control mb-3"
                      type="text"
                      required
                    />
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-flex flex-column">
                    <p class="text mb-1">Brand Name</p>
                    <input
                      name="brandName"
                      class="form-control mb-3"
                      type="text"
                      placeholder="Company Name"
                      value="Volkswagen"
                      required
                    />
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-flex flex-column">
                    <p class="text mb-1">Model Name</p>
                    <input
                      name="modelName"
                      class="form-control mb-3"
                      type="text"
                      placeholder="Passat"
                      value="Passat"
                      required
                    />
                  </div>
                </div>
                <div class="col-8">
                  <div class="d-flex flex-column">
                    <p class="text mb-1">Description</p>
                    <input
                      name="description"
                      class="form-control mb-3"
                      type="text"
                      placeholder="Vali Efml"
                      value="Lorem ipsum dolar"
                      required
                      
                    />
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-flex flex-column">
                    <p class="text mb-1">Price</p>
                    <input
                      name="price"
                      class="form-control mb-3 pt-2"
                      type="text"
                      placeholder="$232"
                      value="3400"
                      required
                    />
                  </div>
                </div>
                <div class="col-3">
                  <div class="d-flex flex-column">
                    <p class="text mb-1">Number Of Seat</p>
                    <input
                      name="numOfSeat"
                      class="form-control mb-3 pt-2"
                      type="text"
                      placeholder="4"
                      value="4"
                      required
                    />
                  </div>
                </div>
                <div class="col-3">
                  <div class="d-flex flex-column">
                    <p class="text mb-1">Number Of Doors</p>
                    <input
                    name="numOfDoor"
                      class="form-control mb-3 pt-2"
                      type="text"
                      placeholder="2"
                      value="2"
                      required
                    />
                  </div>
                </div>
                <div class="col-3">
                  <div class="d-flex flex-column">
                    <p class="text mb-1">Capacity Of Luggage</p>
                    <input
                      name="capOfLuggage"
                      class="form-control mb-3 pt-2"
                      type="text"
                      placeholder="100"
                      value="100"
                      required
                    />
                  </div>
                </div>
                <div class="col-3">
                  <div class="d-flex flex-column">
                    <p class="text mb-1">Gear Type</p>
                    <input
                      name="gearType"
                      class="form-control mb-3 pt-2"
                      type="text"
                      placeholder="Manual"
                      value="Manual"
                      required
                    />
                  </div>
                </div>
                <div class="col-12">
                  <button
                    name="addCar"
                    class="btn btn-primary bg-success text-center d-block w-100 m-auto"
                  >
                    Add New Car
                  </button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    require_once "../config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $imageLink = $_POST["img_link"];
      $brandName = $_POST["brandName"];
      $modelName = $_POST["modelName"];
      $description = $_POST["description"];
      $price = $_POST["price"];
      $numOfSeat = $_POST["numOfSeat"];
      $numOfDoors = $_POST["numOfDoor"];
      $capOfLuggage = $_POST["capOfLuggage"];
      $gearType = $_POST["gearType"];

      $detailSql = "INSERT INTO cardetail (number_of_seat, number_of_door, capacity_of_luggage, gear_type, daily_price) VALUES ($numOfSeat, $numOfDoors, $capOfLuggage, '$gearType', $price)";
      if (mysqli_query($link, $detailSql)) {
        $detail_id = mysqli_insert_id($link);

        $modelSql = "INSERT INTO carmodel (model_name, brand_name, img_link) VALUES ('$modelName','$brandName','$imageLink')";
        if (mysqli_query($link, $modelSql)) {
          $model_id = mysqli_insert_id($link);

          $carSql = "INSERT INTO car (model,car_detail_id, description) VALUES ($model_id,$detail_id,'$description')";
          if (mysqli_query($link, $carSql)) {
            echo "<script> window.location.href='car.php'; </script>";
          }
        }

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
    <script src="js/custom.js"></script>
  </body>
</html>
