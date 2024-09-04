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
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>

<body>

<!-- Add To Cart -->

<?php

  if(isset($_GET['add_cart'])){
      if(isset($_SESSION['cart'])){
        $mycartItem = array_column($_SESSION['cart'],'m_id');

          if(in_array($_GET['m_id'],$mycartItem)){
              echo "<script>
                      alert('Product Already Inserted');
                      location.assign('menu.php');
                    </script>";
              
          }else{
              $count =  count($_SESSION['cart']);
              $_SESSION['cart'][$count] = array('m_id' => $_GET['m_id'], 'm_name' => $_GET['m_name'], 'm_price' => $_GET['m_price'], 'm_desc' => $_GET['m_desc'], 'm_image' => $_GET['m_image'], 'm_qty' => $_GET['m_qty']);

              echo "<script>
                      alert('Product Added Into Cart');
                      location.assign('menu.php');
                    </script>";
          }

      }else{
          $_SESSION['cart'][0] = array('m_id' => $_GET['m_id'],'m_name' => $_GET['m_name'],'m_price' => $_GET['m_price'], 'm_desc' => $_GET['m_desc'], 'm_image' => $_GET['m_image'],'m_qty' => $_GET['m_qty']);

          echo "<script>
                      alert('Product Added Into Cart');
                      location.assign('Menu.php');
                    </script>";

print_r($_SESSION['cart']);
      }
  }

//Remove Cart 
  if(isset($_GET['remove'])){
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['m_id'] == $_GET['remove']) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        // echo "<script>
        //         alert('Item Deleted Successfully!');
        //       </script>";
      }
    }
  }

  // Update Quantity
  if(isset($_POST['quantity'])){
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['m_id'] == $_POST['id']) {
        $_SESSION['cart'][$key]['m_qty'] = $_POST['quantity'];

      }
    }
  }
?>

<!-- Add To Cart -->
<!-- style="background-color: #d2c9ff;" -->
<div class="container">
<section class="h-100 h-custom" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">My Orders</h1>
                    <!-- <h6 class="mb-0 text-muted">3 items</h6> -->
                  </div>
                  <hr class="my-4">

                  <?php
                  $total_price = 0;
                  $total_items = 0;
                  if(isset($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $key => $value) {
                    $total_price =  $total_price + $value['m_price'];
                    $total_items =  count($_SESSION['cart']);
                  ?>

                  <div class="row mb-4 d-flex justify-content-between align-items-center">

                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img src="cPanel/m_images/<?php echo $value['m_image']; ?>"
                        class="img-fluid rounded-3" height="10px" width="40px">
                    </div>

                    <div class="col-md-2 col-lg-3 col-xl-3">
                      <h6 class="text-muted"><?php echo $value['m_name']; ?></h6>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <h6 class="mb-0"><input type="hidden" class="Mprice" value="<?php echo $value['m_price']; ?>" ><?php echo $value['m_price']; ?></h6>
                    </div>
                    

                    <div class="col-md-2 col-lg-3 col-xl-2 d-flex">
                      <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $value['m_id']; ?>">
                        <input id="form1" min="1" max="10" onchange="this.form.submit();" name="quantity" value="<?php echo $value['m_qty']; ?>" type="number" class="form-control form-control-sm Mqty" />
                      </form>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 text-center">
                      <h6 class="mb-0 Mtotal" name="total_price"></h6>
                    </div>

                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="?remove=<?php echo $value['m_id']; ?>" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>

                  </div>

                  <?php } } ?>

                  <hr class="my-4">

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="menu.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>

                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h6 class="text-uppercase">Total Items</h6>
                    <h6><b><?php echo $total_items; ?></b></h6>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h6 class="text-uppercase">Total Amount</h6>
                    <h6><b id="gtotal"></b></h6>
                  </div>

                  <a href="order_form.php" class="btn btn-dark"
                    data-mdb-ripple-color="dark">Proceed to Checkout</a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<script>
  var gt = 0;
  var Mprice = document.getElementsByClassName('Mprice');
  var Mqty = document.getElementsByClassName('Mqty');
  var Mtotal = document.getElementsByClassName('Mtotal');
  var gtotal = document.getElementById('gtotal');


  function subtotal()
  {
    gt = 0
    for(i=0; i<Mprice.length; i++){
      
      Mtotal[i].innerHTML = (Mprice[i].value)*(Mqty[i].value);

      gt = gt+(Mprice[i].value)*(Mqty[i].value);

    }
    gtotal.innerText = gt;
  }

  subtotal();
   
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>