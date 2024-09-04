    <?php 
    session_start();
    ?>
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
            <img src="img/logo.png" style="background-position: left 100%;" height="100" width="180" />
          </a>
          <!-- <a href="index.html" title="uiCookies:FineOak">FineOak</a> -->
        </div>

        <div id="navbar-collapse" class="">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-nav-section="welcome">Welcome</a></li>
            <li><a href="#" data-nav-section="specialties">Specialties</a></li>
            <li><a href="#" data-nav-section="menu">Favorites</a></li>
            <li><a href="#" data-nav-section="contact">Contact</a></li>
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