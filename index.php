<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khanjee - Canada</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">

    <style>
    .probootstrap-navbar.scrolled {
      background: #ffffff;
      -webkit-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.09);
      box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.09);
    }

    .probootstrap-navbar.scrolled .navbar-nav li a {
      margin-top: 15px;
      margin-bottom: 30px;
      text-align: center;
      align-items: center;
      justify-content: center;
      display: flex;
    }

    .probootstrap-navbar.scrolled .parent-nav-link-padding, .probootstrap-navbar.scrolled, .probootstrap-navbar.scrolled .navbar-nav > li > a {
      text-align: center;
      align-items: center;
      justify-content: center;
      display: flex;
    }
    }

    .probootstrap-navbar.scrolled .navbar-brand {
      background-position: left 100%;
    }

    .probootstrap-navbar.scrolled .dropdown > a:before {
      color: rgba(0, 0, 0, 0.4);
    }

    .probootstrap-navbar.scrolled .navbar-nav > li > a {
      color: rgba(0, 0, 0, 0.7);
      text-align: center;
      align-items: center;
      justify-content: center;
      display: flex;
    }

    .probootstrap-navbar.scrolled .navbar-nav > li > a:hover {
      color: rgba(0, 0, 0, 0.7) !important;
    }

    .probootstrap-navbar.scrolled .navbar-nav > li.active > a {
      color: #FFA33E !important;
    }

    @media screen and (max-width: 768px) {
      .probootstrap-navbar.scrolled .navbar-nav > li.active > a {
        color: #FFA33E !important;
      }
    }
    </style>
  </head>

<body>
    
    <!-- Fixed navbar -->
    <?php include "navbar.php" ?>

    <section class="flexslider" data-section="welcome">
      <ul class="slides">
        <li style="background-image: url(img/bg_4.jpg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Welcome</h1>
                  <h3 class="secondary-heading">The Khanjee is</h3>
                  <p class="sub-heading">An Extraordinary Experience!</p>
                  <a href="tel:+123456789" type="submit" name="submit" id="submit" class="btn btn-md btn-primary">Reservation</a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(img/bg_1.jpg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Dine</h1>
                  <h3 class="secondary-heading">With Us</h3>
                  <p class="sub-heading">The Khanjee is an Extraordinary Experience!</p>
                  <a href="tel:+123456789" type="submit" name="submit" id="submit" class="btn btn-md btn-primary">Reservation</a>
                </div>
              </div>
            </div>
          </div>
          
        </li>
        <li style="background-image: url(img/bg_2.jpg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Enjoy</h1>
                  <h3 class="secondary-heading">With Us</h3>
                  <p class="sub-heading">The Khanjee is an Extraordinary Experience!</p>
                  <a href="tel:+123456789" type="submit" name="submit" id="submit" class="btn btn-md btn-primary">Reservation</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>

    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Discover</h1>
              <h3 class="secondary-heading">Our Restaurant</h3>
              <span class="seperator">* * *</span>
            </div>
            <p>Voluptatibus quaerat laboriosam fugit non Ut consequatur animi est molestiae enim a voluptate totam natus modi debitis dicta impedit voluptatum quod sapiente illo saepe explicabo quisquam perferendis labore et illum suscipit</p>
            <p><a href="#" class="probootstrap-custom-link">About Us</a></p>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <p><img src="img/img_3.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
          </div>
        </div>
        <!-- END row -->
      </div>
    </section>

    <section class="probootstrap-section-bg overlay" style="background-image: url(img/bg_3.jpg);" data-stellar-background-ratio="0.5" data-section="specialties">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Discover</h2>
              <h3 class="secondary-heading">Our Specialties</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Speciality Start -->
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">

          <div class="probootstrap-cell-retro">
            <?php
              include "connection.php";
              $fetchdata = mysqli_query($connect, "SELECT * FROM speciality");
              while($data = mysqli_fetch_assoc($fetchdata)){
              ?>
            <div class="half">
              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image">
                  <img src="cPanel/s_images/<?php echo $data['S_Image'] ?>" height="220px" width="280px">
                </div>
                <div class="text text-center">
                  <h3><?php echo $data['S_Name'] ?></h3>
                  <p><?php echo $data['S_Desc'] ?></p>
                  <p class="price">Rs. <?php echo $data['S_Price'] ?></p>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>

        </div>
      </div>
    </section>

    <!-- style="background-image: url(cPanel/s_images/<?php //echo $data['S_Image'] ?>); -->
    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_4.jpg);" data-stellar-background-ratio="0.5" data-section="menu">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Discover</h2>
              <h3 class="secondary-heading">Our Favorites</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <form action="cart.php" method="POST"> -->
    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
            <?php
              include "connection.php";
              $fetch_favorites = mysqli_query($connect, "SELECT * FROM favorites");
              while($favorite_menu = mysqli_fetch_assoc($fetch_favorites)){
              ?>
              <input type="hidden" name="m_id" value="<?php echo $favorite_menu['f_id'] ?>">
              <input type="hidden" name="m_name" value="<?php echo $favorite_menu['fmenu_name'] ?>">
              <input type="hidden" name="m_price" value="<?php echo $favorite_menu['fmenu_price'] ?>">
              <input type="hidden" name="m_desc" value="<?php echo $favorite_menu['fmenu_desc'] ?>">
              <input type="hidden" name="m_image" value="<?php echo $favorite_menu['fmenu_image'] ?>">
              <input type="hidden" name="m_qty" value="1">

            <div class="col-md-6">
            <ul class="menus">          
              <li>
                <figure class="image"><img src="cPanel/m_images/<?php echo $favorite_menu['fmenu_image'] ?>" height="80px" width="160px"></figure>
                <div class="text">
                  <span class="price">Rs. <?php echo $favorite_menu['fmenu_price'] ?>.00</span>
                  <h3><?php echo $favorite_menu['fmenu_name'] ?></h3>
                  <p><?php echo $favorite_menu['fmenu_desc'] ?><br>
                  <a class="btn btn-sm btn-primary " href="cart.php?add_cart='favorite_menu'&m_id=<?php echo $favorite_menu['f_id'] ?>&m_name=<?php echo $favorite_menu['fmenu_name']?>&m_price=<?php echo $favorite_menu['fmenu_price'] ?>&m_desc=<?php echo $favorite_menu['fmenu_desc'] ?>&m_image=<?php echo $favorite_menu['fmenu_image'] ?>&m_qty=1"> 
                   Add to Cart

                  </a>
                  </p>
                </div>
              </li>              
            </ul>
            </div>
            <?php } ?>
        </div>

        <div class="text-center mt-5">
           <a href="menu.php" type="submit" name="submit" id="submit" class="btn btn-md btn-primary">See all menu</a>  
        </div>

      </div>
    </section>
    <!-- </form> -->

    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_5.jpg);"  data-stellar-background-ratio="0.5" data-section="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Khanjee</h2>
              <h3 class="secondary-heading">Contact Restaurant</h3>
            </div>
          </div>
        </div>
      </div></section>


    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Contact</h1>
              <h3 class="secondary-heading">Let's Chat</h3>
            </div>
            <p>Voluptatibus quaerat laboriosam fugit non Ut consequatur animi est molestiae enim a voluptate totam natus modi debitis dicta impedit voluptatum quod sapiente illo saepe explicabo quisquam perferendis labore et illum suscipit</p>
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <form method="post" class="probootstrap-form">
              <div class="form-group">
                <label for="c_name">Your Name</label>
                <div class="form-field">
                  <input type="text" id="c_name" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label for="c_email">Your Email</label>
                <div class="form-field">
                  <input type="email" id="c_email" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label for="c_message">Your Message</label>
                <div class="form-field">
                  <textarea name="c_message" id="c_message" cols="30" rows="10" class="form-control" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" name="c_submit" id="c_submit" value="Send Message" class="btn btn-primary btn-lg">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php include "footer.php" ?> 

<script src="js/scripts.min.js"></script>
<script src="js/custom.min.js"></script>

</body>
</html>