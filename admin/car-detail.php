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
      <symbol
        id="exclamation-triangle-fill"
        fill="currentColor"
        viewBox="0 0 16 16"
      >
        <path
          d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
        />
      </symbol>
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
      <div>Successfully Changed</div>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
      ></button>
    </div>
    <div
      id="danger"
      class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
      role="alert"
      style="display: none !important"
    >
      <svg
        class="bi flex-shrink-0 me-2"
        width="24"
        height="24"
        role="img"
        aria-label="Danger:"
      >
        <use xlink:href="#exclamation-triangle-fill" />
      </svg>
      <div>An example danger alert with an icon</div>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
      ></button>

      <?php
    require_once "../config.php";
    $carid = $modelId = $detailId = "";
      $modelName = $brandName = $price = "";

    if($_SERVER["REQUEST_METHOD"] == "GET") {
      
      $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      $parts = parse_url($url);
      parse_str($parts['query'], $query);
      $carid =  $query['carid'];
      $_SESSION["carId"] = $carid;
      $sql = "SELECT * from car where car_id=". $carid;
      $result = $link->query($sql);
      $row = mysqli_fetch_assoc($result);

      $detailId = $row["car_detail_id"];
      $_SESSION["detailId"] = $detailId;

      $detailSql =  "SELECT * FROM cardetail WHERE id=" . $detailId;
      $detailResult = $link->query($detailSql);
      $detailRow = mysqli_fetch_assoc($detailResult);
      
      $modelId = $row["model"];
      $_SESSION["modelId"] = $modelId;
      
      $modelSql =  "SELECT * FROM carmodel WHERE model_id=" . $modelId;
      $modelResult = $link->query($modelSql);
      $modelRow = mysqli_fetch_assoc($modelResult);
      $img = $modelRow["img_link"];

      $modelName = $modelRow["model_name"];
      $brandName = $modelRow["brand_name"];
      $price = $detailRow["daily_price"];


    }
    ?>
      
    </div>
    <div class="container-md overflow-hidden">
      <form name="saveChanges" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="row">
        <div class="col-md-4">
          <img src="<?php echo $img ?>" class="img-fluid" alt="" />
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-8">
              <h4 style="text-align: center">Car Details</h4>
            </div>
            <div class="col-4">
            <button
                class="btn btn-primary bg-danger text-center d-block w-100 m-auto"
                type="submit"
                name="delete"
              >
                Delete
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Brand Name</p>
                <input
                  class="form-control mb-3"
                  type="text"
                  name="brandName"
                  value="<?php echo $brandName ?>"
                />
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <p class="text mb-1">Model Name</p>
                <input
                  class="form-control mb-3"
                  type="text"
                  name="modelName"
                  value="<?php echo $modelName ?>"
                />
              </div>
            </div>
            
            <div class="col-4">
              <div class="d-flex flex-column">
                <p class="text mb-1">Price</p>
                <input
                  class="form-control mb-3 pt-2"
                  type="text"
                  name="price"
                  value="<?php echo $price ?>"
                />
              </div>
            </div>
            <div class="col-12">
              <button
                class="btn btn-primary bg-success text-center d-block w-100 m-auto"
                type="submit"
                name="saveChanges"
              >
                Save Changes
              </button>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>

   
     
    <?php
    require_once "../config.php";
      if (isset($_POST["saveChanges"])) {

        $newModel = $_POST["modelName"];
        $newBrand = $_POST["brandName"];
        $newPrice = $_POST["price"];

        $updateModelSql = "UPDATE carmodel SET model_name='" . $newModel . "', brand_name='". $newBrand . "' WHERE model_id=" . $_SESSION["modelId"];
        $updateDetailSql = "UPDATE cardetail SET daily_price=". $newPrice. " WHERE id=" . $_SESSION["detailId"];
        
        if (mysqli_query($link, $updateModelSql)) {
          if (mysqli_query($link, $updateDetailSql)) {

            echo "<script> window.location.href='car.php'</script>";

          }
        }
      } 
      if (isset($_POST["delete"])) {
        $carid = $_SESSION["carId"];
        $deleteSql = "DELETE FROM car WHERE car_id=".$carid;
        var_dump($deleteSql);
        if (mysqli_query($link, $deleteSql)) {
          echo "<script> window.location.href='car.php';</script>";
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
