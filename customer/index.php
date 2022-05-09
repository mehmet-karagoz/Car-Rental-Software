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

    <link rel="stylesheet" href="css/style.css" />

    <script
      src="https://kit.fontawesome.com/8df3f43431.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <!--Header-->
    <header>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <h2>Car Rental <em>Software</em></h2>
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
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reservation.php">Reservation</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="about-us.php">About Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login/Register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Banner -->
    <div class="banner header-text">
      <div class="banner-item-01">
        <div class="text-content">
          <h4>Find your car today!</h4>
          <h2>Lorem ipsum dolor sit amet</h2>
        </div>
        <div class="card" id="formCard">
          <div class="card-body">
            <form action="reservation.php" method="get">
              <h5>PICK UP</h5>
              <div class="dropdown">
                <i class="fa-solid fa-location-dot"></i>
                <select name="pick-up-location" id="location">
                  <option value="d" selected>Antalya</option>
                  <option value="1">Ankara</option>
                  <option value="2">Isparta</option>
                  <option value="3">İstanbul</option>
                </select>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckChecked"
                  checked
                />
                <label class="form-check-label" for="flexCheckChecked">
                  Return to the same location
                </label>
              </div>
              <div class="pick-up-date">
                <input type="date" name="pick-up" id="pick-up" required />
              </div>
              <h5 style="color: aliceblue">RETURN</h5>
              <div
                class="dropdown returnDropdown"
                id="returnDropdown"
                style="display: none"
              >
                <i class="fa-solid fa-location-dot"></i>
                <select name="return-location" id="location">
                  <option value="d" selected>Antalya</option>
                  <option value="1">Ankara</option>
                  <option value="2">Isparta</option>
                  <option value="3">İstanbul</option>
                </select>
              </div>
              <div class="return-date">
                <input type="date" name="return" id="return" required />
              </div>
              <button
                class="btn btn-primary d-block w-100"
                type="submit"
                id="find-vehicle"
              >
                Find a vehicle<i class="fa fa-arrow-right"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Why choose us -->
    <div class="why-choose-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading text-center">
              <h2>WHY CHOOSE US</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="advantages">
              <div class="item-box">
                <div class="icon"><i class="fa-solid fa-thumbs-up"></i></div>
              </div>
              <div class="icon-text">
                <h4>Transparency</h4>
                <div class="content">
                  <p>No hidden charges. Full reliability!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="advantages">
              <div class="item-box">
                <div class="icon"><i class="fa-solid fa-check"></i></div>
              </div>
              <div class="icon-text">
                <h4>Immediate service</h4>
                <div class="content">
                  <p>Book your car with a few clicks!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="advantages">
              <div class="item-box">
                <div class="icon"><i class="fa-solid fa-key"></i></div>
              </div>
              <div class="icon-text">
                <h4>State-of-the-art fleet</h4>
                <div class="content">
                  <p>Our fleet consists of modern car models.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="advantages">
              <div class="item-box">
                <div class="icon"><i class="fa-solid fa-plus"></i></div>
              </div>
              <div class="icon-text">
                <h4>Extras</h4>
                <div class="content">
                  <p>GPS, children seats and many more extras.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="advantages">
              <div class="item-box">
                <div class="icon">
                  <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
              </div>
              <div class="icon-text">
                <h4>Price quality ratio</h4>
                <div class="content">
                  <p>High quality cars at the best price.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="advantages">
              <div class="item-box">
                <div class="icon"><i class="fa-solid fa-user-group"></i></div>
              </div>
              <div class="icon-text">
                <h4>Friendly staff</h4>
                <div class="content">
                  <p>Friendly and multilingual staff</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- About us -->
    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading text-center">
              <h2>About Us</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p>
                Lorem ipsum dolor sit amet,
                <a href="#">consectetur</a> adipisicing elit. Explicabo, esse
                consequatur alias repellat in excepturi inventore ad
                <a href="#">asperiores</a> tempora ipsa. Accusantium tenetur
                voluptate labore aperiam molestiae rerum excepturi minus in
                pariatur praesentium, corporis, aliquid dicta.
              </p>
              <ul class="featured-list">
                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#">Consectetur an adipisicing elit</a></li>
                <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                <li><a href="#">Corporis, omnis doloremque</a></li>
              </ul>
              <button class="btn btn-primary d-block w-25" id="readMore">
                <a href="about-us.php">Read More</a>
              </button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image mt-5">
              <img src="../images/about-1-570x350.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Vehicles -->
    <div
      class="services"
      style="background-image: url(../images/other-image-fullscren-1-1920x900.jpg)"
    >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Cars</h2>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"
                ><img
                  src="../images/product-1-370x270.jpg"
                  class="img-fluid"
                  alt=""
              /></a>

              <div class="down-content">
                <h4>
                  <a href="#"
                    >Lorem ipsum dolor sit amet, consectetur adipisicing elit
                    hic</a
                  >
                </h4>

                <p style="margin: 0">
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
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"
                ><img
                  src="../images/product-2-370x270.jpg"
                  class="img-fluid"
                  alt=""
              /></a>

              <div class="down-content">
                <h4>
                  <a href="#"
                    >Lorem ipsum dolor sit amet consectetur adipisicing elit</a
                  >
                </h4>

                <p style="margin: 0">
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
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"
                ><img
                  src="../images/product-3-370x270.jpg"
                  class="img-fluid"
                  alt=""
              /></a>

              <div class="down-content">
                <h4>
                  <a href="#">Aperiam modi voluptatum fuga officiis cumque</a>
                </h4>

                <p style="margin: 0">
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
                </p>
              </div>
            </div>
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
    <script src="js/home.js"></script>
  </body>
</html>
