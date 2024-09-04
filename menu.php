<?php
session_start();
?>
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
    <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="logo" href="index.php">
            <img src="img/logo.png" style="background-position: left 100%;" height="100" width="170" />
          </a>
          <!-- <a href="index.html" title="uiCookies:FineOak">FineOak</a> -->
        </div>

        <div id="navbar-collapse" class="">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php" onclick="location.assign('index.php')"><i class="icon-reply2"></i>&nbsp;Back to Home</a></li>
            <?php
            $count = 0;
            if (isset($_SESSION['cart'])) {
              $count = count($_SESSION['cart']);
            }
            ?>
            <li><a href="cart.php" onclick="location.assign('cart.php')"><i class="icon-shopping-bag"></i> (<?php echo $count; ?>)</a></li>
          </ul>
        </div>

      </div>
    </nav>

    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_4.jpg);" data-stellar-background-ratio="0.5" data-section="menu">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Discover</h2>
              <h3 class="secondary-heading">Our Menu</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
            <?php
              include "connection.php";
              $fetchmenu = mysqli_query($connect, "SELECT * FROM menu");
              while($data = mysqli_fetch_assoc($fetchmenu)){
              ?>
              <input type="hidden" name="m_id" value="<?php echo $data['ID'] ?>">
              <input type="hidden" name="m_name" value="<?php echo $data['M_Name'] ?>">
              <input type="hidden" name="m_price" value="<?php echo $data['M_Price'] ?>">
              <input type="hidden" name="m_desc" value="<?php echo $data['M_Desc'] ?>">
              <input type="hidden" name="m_image" value="<?php echo $data['M_Image'] ?>">
              <input type="hidden" name="m_qty" value="1">

            <div class="col-md-6">
            <ul class="menus">          
              <li>
                <figure class="image"><img src="cPanel/m_images/<?php echo $data['M_Image'] ?>" height="80px" width="160px"></figure>
                <div class="text">
                  <span class="price">Rs. <?php echo $data['M_Price'] ?>.00</span>
                  <h3><?php echo $data['M_Name'] ?></h3>
                  <p><?php echo $data['M_Desc'] ?><br>
                  <a class="btn btn-sm btn-primary" href="cart.php?add_cart='data'&m_id=<?php echo $data['ID'] ?>&m_name=<?php echo $data['M_Name']?>&m_price=<?php echo $data['M_Price'] ?>&m_desc=<?php echo $data['M_Desc'] ?>&m_image=<?php echo $data['M_Image'] ?>&m_qty=1"> 
                    Add to Cart
                  </a>
                  </p>
                </div>
              </li>              
            </ul>
            </div>
            <?php } ?>
        </div>

      </div>
    </section>

    <section class="probootstrap-footer">
      <div class="container">
        <div class="row">

          <div class="col-md-3 probootstrap-animate">
            <div class="probootstrap-footer-widget">
            <img src="img/logo.png" height="100px" width="170px" />
            <br><br>
              <!-- <h3>Khanjee <br> Canada</h3> -->
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
            </div>
            </div>

          <div class="col-md-3 probootstrap-animate">
            <div class="probootstrap-footer-widget"><br>
                <h3>Our Location</h3>
                <p>198 West 21th Street, Suite 721 New York NY 10016</p>
            </div>
          </div>

          <div class="col-md-3 probootstrap-animate">
          <div class="probootstrap-footer-widget"><br>
            <h3>Open Hours</h3>
              <div>
                <p>Monday - Thursday <br> 10:00 am - 8:00 pm</p>
              </div>
              <div>
                <p>Friday - Sunday <br> 3:00 pm - 10:00 pm</p>
              </div>
          </div>
          </div>

          <div class="col-md-3 probootstrap-animate">
            <div class="probootstrap-footer-widget"><br>
              <h3>Updates</h3>
              <p>Available for Catering Email or Call Us</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="probootstrap-copyright">
      <div class="container">
        <div class="row">

          <div class="col-md-8">
            <p class="copyright-text">&copy; 2023. All Rights Reserved. <a href="https://khanjeecanada.com/">Khanjee Canada</a></p>
          </div>

          <div class="col-md-4">
            <ul class="probootstrap-footer-social right">
              <li><a href="https://wa.me/+923012345678?text=urlencodedtext"><i class="icon-whatsapp"></i></a></li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>
              <li><a href="#"><i class="icon-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

<script src="js/scripts.min.js"></script>
<script src="js/custom.min.js"></script>

</body>
</html>