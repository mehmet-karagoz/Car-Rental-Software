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
                <a class="nav-link" href="login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <br /><br /><br /><br /><br />

    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card-counter primary">
            <i class="fa fa-code-fork"></i>
            <span class="count-numbers">12</span>
            <span class="count-name">Locations</span>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter danger">
            <i class="fa fa-ticket"></i>
            <span class="count-numbers">599</span>
            <span class="count-name">Reservations</span>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter success">
            <i class="fa fa-database"></i>
            <span class="count-numbers">$6875</span>
            <span class="count-name">Income</span>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card-counter info">
            <i class="fa fa-users"></i>
            <span class="count-numbers">35</span>
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
        <tbody>
          <tr>
            <td>
              <div class="d-flex flex-row flex-nowrap">
                <!--div as flexbox with content in a row without wrap-->
                <div class="img img-responsive me-4">
                  <!--responsive img inside div-->
                  <img
                    class="img img-fluid"
                    src="../images/team_04.jpg"
                    width="50"
                    height="50"
                    alt=""
                  />
                </div>
                <p>Anna</p>
              </div>
            </td>
            <td>BMW</td>
            <td>
              <div class="status">
                <p id="done">Done</p>
              </div>
            </td>
            <td>20 Sep 2020</td>
            <td>$2000</td>
          </tr>
          <tr>
            <td>
              <div class="d-flex flex-row flex-nowrap">
                <!--div as flexbox with content in a row without wrap-->
                <div class="img img-responsive me-4">
                  <!--responsive img inside div-->
                  <img
                    class="img img-fluid"
                    src="../images/team_04.jpg"
                    width="50"
                    height="50"
                    alt=""
                  />
                </div>
                <p>Anna</p>
              </div>
            </td>
            <td>BMW</td>
            <td>
              <div class="status">
                <p id="progress">Progress</p>
              </div>
            </td>
            <td>20 Sep 2020</td>
            <td>$2000</td>
          </tr>
          <tr>
            <td>
              <div class="d-flex flex-row flex-nowrap">
                <!--div as flexbox with content in a row without wrap-->
                <div class="img img-responsive me-4">
                  <!--responsive img inside div-->
                  <img
                    class="img img-fluid"
                    src="../images/team_04.jpg"
                    width="50"
                    height="50"
                    alt=""
                  />
                </div>
                <p>Anna</p>
              </div>
            </td>
            <td>BMW</td>
            <td>
              <div class="status">
                <p id="done">Done</p>
              </div>
            </td>
            <td>20 Sep 2020</td>
            <td>$2000</td>
          </tr>
        </tbody>
      </table>
    </div>

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