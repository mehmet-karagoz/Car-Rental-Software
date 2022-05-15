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
              <li class="nav-item active">
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

    <div class="container recent-bookings">
      <h3>Last 10 Day Car Bookings</h3>
      <table class="table table-hover" id="myTable">
        <thead>
          <tr>
            <th>Booking</th>
            <th>Car</th>
            <th>Status</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Action</th>
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
            <td>
              <button
                type="button"
                class="btn btn-outline-danger"
                onclick="deleteRow(this);"
              >
                Delete
              </button>
              <button
                type="button"
                class="btn btn-outline-info"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
              >
                Info
              </button>
            </td>
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
            <td>
              <button
                type="button"
                class="btn btn-outline-danger"
                onclick="deleteRow(this);"
              >
                Delete
              </button>
              <button
                type="button"
                class="btn btn-outline-info"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
              >
                Info
              </button>
            </td>
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
            <td>
              <button
                type="button"
                class="btn btn-outline-danger"
                onclick="deleteRow(this);"
              >
                Delete
              </button>
              <button
                type="button"
                class="btn btn-outline-info"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
              >
                Info
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Customer Profile</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="card">
              <img src="../images/team_04.jpg" alt="John" style="width: 100%" />
              <h3>Anna Doe</h3>
              <p class="title">CEO & Founder, Example</p>
              <p>Harvard University</p>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil,
                temporibus.
              </p>
              <h5>Number Of Booking: <span>25</span></h5>
              <h5>Status: <span>Progress</span></h5>
              <h5>Car: <span>BMW</span></h5>
              <div style="margin: 24px 0">
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
              </div>
              <p><button>Contact</button></p>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
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
    <script src="js/custom.js"></script>
  </body>
</html>