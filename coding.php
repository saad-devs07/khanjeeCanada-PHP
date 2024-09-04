<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Khanjee - cPanel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/law-logo-white" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<!-- Register Code -->
<?php
include "connection.php";
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $role = "customer";

  if ($password == $cpassword) {

    mysqli_query($connect, "INSERT INTO register (Name,Email,Password,Role) VALUES('$name','$email','$password','$role')"); 
    
     echo "<script>
            alert('Account Created Successfully');
            location.assign('cPanel/index.php');
          </script>";
  }else{
    echo "<script>
            alert('Password and Repeat Password Must Match');
            location.assign('cPanel/register.php')
          </script>";
 }
}
?>

<!-- Login Code -->
<?php
if (isset($_POST['login'])) {
  include "connection.php";
  $email = $_POST['email'];
  $password = $_POST['password'];

  $fetchdata = mysqli_query($connect, "SELECT * FROM register WHERE email = '$email' AND password = '$password' ");

  if ($isdataexist = mysqli_num_rows($fetchdata) > 0) {
    while ($data = mysqli_fetch_Assoc($fetchdata)) {
    if ($data['Role'] == "admin") {

      session_start();
      $_SESSION['id'] = $data['ID'];
      $_SESSION['name'] = $data['Name'];
      
      header('location:cPanel/validatepage.php?specialities');

    }else{
        echo "<script>
                alert('Customer logged in successfully, but website is under process!');
                location.assign('cPanel/index.php');
              </script>";
  } }
  }else{
    echo "<script>
            alert('Account Not Exist!');
            location.assign('cPanel/index.php');
          </script>";
  }
  }
?>

<!-- Speciality Modal Uploading Code -->
<?php
if (isset($_POST['add_speciality'])) {
  include "connection.php";
  $s_img = $_FILES['s_upload']['name'];
  $s_size = $_FILES['s_upload']['size'];
  $tmp_name = $_FILES['s_upload']['tmp_name'];

  $extention = pathinfo($s_img,PATHINFO_EXTENSION);
  $destination = "cPanel/s_images/".$s_img;

  if ($s_size <= 3000000) {
    if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
      if (move_uploaded_file($tmp_name,$destination)) {
        $s_name = $_POST['sname'];
        $s_price = $_POST['sprice'];
        $s_desc = $_POST['sdesc'];
        
        $insertspeciality = mysqli_query($connect, "INSERT INTO speciality (S_Name,S_Price,S_Desc, S_Image) 
        VALUES('$s_name','$s_price','$s_desc','$s_img') ");

        echo "<script>
                alert('Speciality Uploaded Successfully');
                location.assign('cPanel/validatepage.php?specialities');
            </script>";
      }else{
        echo "<script>
                alert('Speciality Not Uploaded');
                location.assign('cPanel/validatepage.php?specialities');
              </script>";
      }
    }else{
        echo "<script>
                alert('Picture Must Be in jpg, jpeg or png');
                location.assign('cPanel/validatepage.php?specialities');
              </script>";
      }
  }else{
        echo "<script>
                alert('Picture Size Must Be Lass Than 3MB');
                location.assign('cPanel/validatepage.php?specialities');
            </script>";
      }
}

// Speciality Deleting Code
if(isset($_GET['delete_speciality'])){
  include "connection.php";
  $deletespeciality = $_GET['delete_speciality'];
  mysqli_query($connect, "DELETE FROM speciality WHERE ID = '$deletespeciality'");

  echo "<script>
        alert ('Speciality Deleted Successfully');
        location.assign('cPanel/validatePage.php?specialities');
        </script>";

}

// Speciality Updating Code
if (isset($_GET['update_speciality'])) {
  include "connection.php";
  $update = $_GET['update_speciality'];
  $updatespeciality = mysqli_query($connect, "SELECT * FROM speciality WHERE ID = '$update' ");
  $data = mysqli_fetch_assoc($updatespeciality);
?>

  <div class="container mt-5 d-flex justify-content-center align-items-center" style="width: 35%; ">
      <form method="POST" enctype="multipart/form-data">
        <h2 class="text-center mt-5 mb-4 fs-3">Update Speciality</h2>

        <div class="form-outline mb-3">
          <input type="number" id="form4Example1" class="form-control form-control-sm" name="id" value="<?php echo $data['ID']; ?>" />
        </div>

        <div class="form-outline mb-3">
          <input type="text" id="form4Example1" class="form-control form-control-sm" name="s_name" value="<?php echo $data['S_Name']; ?>" />
        </div>

        <div class="form-outline mb-3">
          <input type="text" id="form4Example1" class="form-control form-control-sm" name="s_price" value="<?php echo $data['S_Price']; ?>" />
        </div>

        <div class="form-outline mb-3">
          <input type="text" id="form4Example1" class="form-control form-control-sm" name="s_desc" value="<?php echo $data['S_Desc']; ?>" />
        </div>

        <div>
          <input class="form-control form-control-sm mb-3" id="formFileSm" type="file" name="s_update" value="<?php echo $data['S_Image'] ?>">
        </div>

        <button type="submit" class="form-control btn btn-dark btn-block btn-sm" name="update_speciality">Save & Back</button>
      </form>
  </div>

<?php } 

if (isset($_POST['update_speciality'])) {
  include "connection.php";
  $s_img = $_FILES['s_update']['name'];
  $s_size = $_FILES['s_update']['size'];
  $tmp_name = $_FILES['s_update']['tmp_name'];
  $extention = pathinfo($s_img,PATHINFO_EXTENSION);
  $destination = "cPanel/s_images/".$s_img;

  $id = $_POST['id'];
  $s_name = $_POST['s_name'];
  $s_price = $_POST['s_price'];
  $s_desc = $_POST['s_desc'];

  if ($s_size <= 3000000) {

  if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {

  if (move_uploaded_file($tmp_name,$destination)) {

  mysqli_query($connect, " UPDATE speciality SET S_Name='$s_name', S_Price='$s_price', S_Desc='$s_desc', S_Image='$s_img' WHERE ID='$id' ");

  echo "<script>
          alert('Speciality Updated Successfully');
          location.assign('cPanel/validatepage.php?specialities');
        </script>";

  }else{
  echo "<script>
          alert('Picture Not Uploaded');
  </script>";
  }
  }else{
  echo "<script>
          alert('Picture Must Be in jpg, jpeg or png');
  </script>";
  }
  }else{
  echo "<script>
          alert('Picture Size Must Be Lass Than 3MB');
  </script>";
  }
}
?>

<!-- Menu Modal Uploading Code -->
<?php
if (isset($_POST['add_menu'])) {
  include "connection.php";
  $m_img = $_FILES['m_upload']['name'];
  $m_size = $_FILES['m_upload']['size'];
  $tmp_name = $_FILES['m_upload']['tmp_name'];

  $extention = pathinfo($m_img,PATHINFO_EXTENSION);
  $destination = "cPanel/m_images/".$m_img;

  if ($m_size <= 3000000) {
    if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
      if (move_uploaded_file($tmp_name,$destination)) {
        $m_name = $_POST['mname'];
        $m_price = $_POST['mprice'];
        $m_desc = $_POST['mdesc'];
        
        $insertmenu = mysqli_query($connect, "INSERT INTO menu (M_Name,M_Price,M_Desc,M_Image) 
        VALUES('$m_name','$m_price','$m_desc','$m_img') ");

        echo "<script>
                alert('HomePage Menu Uploaded Successfully');
                location.assign('cPanel/validatepage.php?menu');
            </script>";
      }else{
        echo "<script>
                alert('HomePage Menu Not Uploaded');
                location.assign('cPanel/validatepage.php?menu');
              </script>";
      }
    }else{
        echo "<script>
                alert('Picture Must Be in jpg, jpeg or png');
                location.assign('cPanel/validatepage.php?menu');
              </script>";
      }
  }else{
        echo "<script>
                alert('Picture Size Must Be Lass Than 3MB');
                location.assign('cPanel/validatepage.php?menu');
            </script>";
      }
}

// Menu Deleting Code
if(isset($_GET['delete_menu'])){
  include "connection.php";
  $deletemenu = $_GET['delete_menu'];
  mysqli_query($connect, "DELETE FROM menu WHERE ID = '$deletemenu'");

  echo "<script>
        alert ('HomePage Menu Deleted Successfully');
        location.assign('cPanel/validatePage.php?menu');
        </script>";

}

// Menu Updating Code
if (isset($_GET['update_menu'])) {
  include "connection.php";
  $update = $_GET['update_menu'];
  $updatemenu = mysqli_query($connect, "SELECT * FROM menu WHERE ID = '$update' ");
  $data = mysqli_fetch_assoc($updatemenu);
?>

  <div class="container mt-5 d-flex justify-content-center align-items-center" style="width: 35%; ">
      <form method="POST" enctype="multipart/form-data">
        <h2 class="text-center mt-5 mb-4 fs-3">Update Menu</h2>

        <div class="form-outline mb-3">
          <input type="number" id="form4Example1" class="form-control form-control-sm" name="id" value="<?php echo $data['ID']; ?>" />
        </div>

        <div class="form-outline mb-3">
          <input type="text" id="form4Example1" class="form-control form-control-sm" name="m_name" value="<?php echo $data['M_Name']; ?>" />
        </div>

        <div class="form-outline mb-3">
          <input type="text" id="form4Example1" class="form-control form-control-sm" name="m_price" value="<?php echo $data['M_Price']; ?>" />
        </div>

        <div class="form-outline mb-3">
          <input type="text" id="form4Example1" class="form-control form-control-sm" name="m_desc" value="<?php echo $data['M_Desc']; ?>" />
        </div>

        <div>
          <input class="form-control form-control-sm mb-3" id="formFileSm" type="file" name="m_update" value="<?php echo $data['M_Image'] ?>">
        </div>

        <button type="submit" class="form-control btn btn-dark btn-block btn-sm" name="update_menu">Save & Back</button>
      </form>
  </div>

<?php } 

if (isset($_POST['update_menu'])) {
  include "connection.php";
  $m_img = $_FILES['m_update']['name'];
  $m_size = $_FILES['m_update']['size'];
  $tmp_name = $_FILES['m_update']['tmp_name'];
  $extention = pathinfo($m_img,PATHINFO_EXTENSION);
  $destination = "cPanel/m_images/".$m_img;

  $id = $_POST['id'];
  $m_name = $_POST['m_name'];
  $m_price = $_POST['m_price'];
  $m_desc = $_POST['m_desc'];

  if ($m_size <= 3000000) {

  if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {

  if (move_uploaded_file($tmp_name,$destination)) {

  mysqli_query($connect, " UPDATE menu SET M_Name='$m_name', M_Price='$m_price', M_Desc='$m_desc', M_Image='$m_img' WHERE ID='$id' ");

  echo "<script>
          alert('Homepage Menu Updated Successfully');
          location.assign('cPanel/validatepage.php?menu');
        </script>";

  }else{
  echo "<script>
          alert('Picture Not Uploaded');
        </script>";
  }
  }else{
  echo "<script>
          alert('Picture Must Be in jpg, jpeg or png');
        </script>";
  }
  }else{
  echo "<script>
          alert('Picture Size Must Be Lass Than 3MB');
        </script>";
  }
}
?>

<!-- Favorites Code -->

<?php

// Favorite Inserting From Menu Tables
if(isset($_GET['insert_to_favorite'])){
  include "connection.php";
  $id = $_GET['insert_to_favorite'];
  $f_name = $_GET['name'];
  $f_price = $_GET['price'];
  $f_desc = $_GET['desc'];
  $f_image = $_GET['image'];

  mysqli_query($connect, "INSERT INTO favorites (f_id,fmenu_name, fmenu_price, fmenu_desc, fmenu_image) VALUES ('$id','$f_name', '$f_price', '$f_desc', '$f_image')");

  echo "<script>
        alert ('Moved to Favorites Successfully');
        location.assign('cPanel/validatePage.php?menu');
        </script>";
}

// Favorite Deleting Code
if(isset($_GET['delete_favorite'])){
  include "connection.php";
  $deletefavorite = $_GET['delete_favorite'];
  mysqli_query($connect, "DELETE FROM favorites WHERE ID = '$deletefavorite'");

  echo "<script>
        alert ('Favorite Deleted Deleted Successfully');
        location.assign('cPanel/validatePage.php?favorites');
        </script>";
}

?>

<!-- Order Form Code -->
<?php

if(isset($_POST['order_form'])){

  include "connection.php";
  $c_name1 = $_POST['name1'];
  $c_name2 = $_POST['name2'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];


  if(isset($_SESSION['cart'])){

    foreach ($_SESSION['cart'] as $key => $value) {
      $m_id = $value['m_id'];
      $m_name = $value['m_name'];
      $m_price = $value['m_price'];
      $m_qty = $value['m_qty'];
    

      mysqli_query($connect, "INSERT INTO orders (order_id, order_name, order_price, order_qty, c_name1, c_name2, c_email, c_phone, c_address) VALUES ('$m_id','$m_name','$m_price','$m_qty','$c_name1','$c_name2','$email','$phone','$address') ");

      echo "<script>
         alert('Thankyou Your Order');
         location.assign('menu.php');
      </script>";
    }
    // SESSION UNSET
    unset($_SESSION['cart']);
  }

}
?>


<?php
if(isset($_GET['delete_order'])){
  include "connection.php";
  $delete_order = $_GET['delete_order'];
  mysqli_query($connect, "DELETE FROM orders WHERE id = '$delete_order' ");

  // header("cPanel/validatepage.php?orders");
  echo "<script>
          alert('Order Deleted Successfully!');
          location.assign('cPanel/validatepage.php?orders');
        </script>";
}
?>

<!-- JavaScript Links -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/js/vendor.bundle.addons.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/misc.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<script src="js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>