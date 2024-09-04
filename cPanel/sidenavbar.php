    <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="images/user.jpeg" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  Welcome <?php echo $_SESSION['name']; ?>
                </p>
                <p class="designation">
                  Admin Panel
                </p>
              </div>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="validatepage.php?specialities">
              <i class="fas fa-window-restore menu-icon"></i>
              <span class="menu-title">Specialities</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="validatepage.php?favorites">
              <i class="fas fa-window-restore menu-icon"></i>
              <span class="menu-title">Favorites</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="validatepage.php?menu">
              <i class="fas fa-clipboard-list menu-icon"></i>
              <span class="menu-title">Menu</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="validatepage.php?orders">
              <i class="fas fa-clipboard-list menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          
        </ul>
      </nav>
    <!-- partial -->