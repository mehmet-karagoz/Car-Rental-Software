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
    <a
      class="btn btn-primary d-block w-50 m-auto bookCar text-white bg-dark border-dark"
      href="new-car.php"
    >
      Add New Car
    </a>
    <!-- Cars -->
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="product-item">
              <img src="../images/product-1-370x270.jpg" alt="" />

              <div class="down-content">
                <h4>Large: Premium</h4>

                <h6><small>from</small> $99 <small>per weekend</small></h6>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Laborum, aliquam!
                </p>

                <small>
                  <strong title="passegengers"
                    ><i class="fa fa-user"></i> 5</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="luggages"
                    ><i class="fa fa-briefcase"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="doors"
                    ><i class="fa fa-sign-out"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="transmission"
                    ><i class="fa fa-cog"></i> A</strong
                  >
                </small>

                <span>
                  <a
                    class="btn btn-primary d-block w-100 bookCar text-white bg-dark border-dark"
                    href="car-detail.php"
                  >
                    Edit
                  </a>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <img src="../images/product-2-370x270.jpg" alt="" />

              <div class="down-content">
                <h4>Large: Premium</h4>

                <h6><small>from</small> $99 <small>per weekend</small></h6>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Laborum, aliquam!
                </p>

                <small>
                  <strong title="passegengers"
                    ><i class="fa fa-user"></i> 5</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="luggages"
                    ><i class="fa fa-briefcase"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="doors"
                    ><i class="fa fa-sign-out"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="transmission"
                    ><i class="fa fa-cog"></i> A</strong
                  >
                </small>

                <span>
                  <a
                    class="btn btn-primary d-block w-100 bookCar text-white bg-dark border-dark"
                    href="car-detail.php"
                  >
                    Edit
                  </a>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <img src="../images/product-3-370x270.jpg" alt="" />

              <div class="down-content">
                <h4>Large: Premium</h4>

                <h6><small>from</small> $99 <small>per weekend</small></h6>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Laborum, aliquam!
                </p>

                <small>
                  <strong title="passegengers"
                    ><i class="fa fa-user"></i> 5</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="luggages"
                    ><i class="fa fa-briefcase"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="doors"
                    ><i class="fa fa-sign-out"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="transmission"
                    ><i class="fa fa-cog"></i> A</strong
                  >
                </small>

                <span>
                  <a
                    class="btn btn-primary d-block w-100 bookCar text-white bg-dark border-dark"
                    href="car-detail.php"
                  >
                    Edit
                  </a>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <img src="../images/product-4-370x270.jpg" alt="" />

              <div class="down-content">
                <h4>Large: Premium</h4>

                <h6><small>from</small> $99 <small>per weekend</small></h6>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Laborum, aliquam!
                </p>

                <small>
                  <strong title="passegengers"
                    ><i class="fa fa-user"></i> 5</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="luggages"
                    ><i class="fa fa-briefcase"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="doors"
                    ><i class="fa fa-sign-out"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="transmission"
                    ><i class="fa fa-cog"></i> A</strong
                  >
                </small>

                <span>
                  <a
                    class="btn btn-primary d-block w-100 bookCar text-white bg-dark border-dark"
                    href="car-detail.php"
                  >
                    Edit
                  </a>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <img src="../images/product-5-370x270.jpg" alt="" />

              <div class="down-content">
                <h4>Large: Premium</h4>

                <h6><small>from</small> $99 <small>per weekend</small></h6>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Laborum, aliquam!
                </p>

                <small>
                  <strong title="passegengers"
                    ><i class="fa fa-user"></i> 5</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="luggages"
                    ><i class="fa fa-briefcase"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="doors"
                    ><i class="fa fa-sign-out"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="transmission"
                    ><i class="fa fa-cog"></i> A</strong
                  >
                </small>

                <span>
                  <a
                    class="btn btn-primary d-block w-100 bookCar text-white bg-dark border-dark"
                    href="car-detail.php"
                  >
                    Edit
                  </a>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <img src="../images/product-6-370x270.jpg" alt="" />

              <div class="down-content">
                <h4>Large: Premium</h4>

                <h6><small>from</small> $99 <small>per weekend</small></h6>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Laborum, aliquam!
                </p>

                <small>
                  <strong title="passegengers"
                    ><i class="fa fa-user"></i> 5</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="luggages"
                    ><i class="fa fa-briefcase"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="doors"
                    ><i class="fa fa-sign-out"></i> 4</strong
                  >
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="transmission"
                    ><i class="fa fa-cog"></i> A</strong
                  >
                </small>

                <span>
                  <a
                    class="btn btn-primary d-block w-100 bookCar text-white bg-dark border-dark"
                    href="car-detail.php"
                  >
                    Edit
                  </a>
                </span>
              </div>
            </div>
          </div>

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