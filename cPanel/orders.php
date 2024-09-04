
<div class="container-scroller">

<?php include "navbar.php"; ?>

<div class="container-fluid page-body-wrapper">

<?php include "sidenavbar.php"; ?>

<div class="main-panel">
<div class="content-wrapper">
  <h3 class="text-center fs-4 text-uppercase mb-3">Welcome to Khanjee_canada cPanel!</h3>  
<div class="page-header">
  
<h3 class="page-title">
  Orders
</h3>

</div>
<div class="card">
<div class="card-body">


<div class="row">
<div class="col-12">
<div class="table-responsive">
<table id="order-listing" class="table">
<thead class="text-center">
  <tr>
      <th>Sno #</th>
      <th>Order ID</th>
      <th>Order Name</th>
      <th>Order Price</th>
      <th>Order Qty</th>
      <th>Client Name</th>
      <th>Client Email</th>
      <th>Client Phone</th>
      <th>Client Address</th>
      <th>Date & Time</th>
      <th>Total Bill</th>
      <th>Actions</th>
  </tr>
</thead>

<?php
include "../connection.php";
$fetchorder = mysqli_query($connect, 'SELECT * FROM orders');

while ($data = mysqli_fetch_Assoc($fetchorder)) {
  $total_bill = $data['order_price']*$data['order_qty'];
?>
<tbody class="text-center">
<tr>
  <td><?php echo $data['id']; ?></td>
  <td><?php echo $data['order_id']; ?></td>
  <td><?php echo $data['order_name']; ?></td>
  <td><?php echo $data['order_price']; ?></td>
  <td><?php echo $data['order_qty']; ?></td>
  <td><?php echo $data['c_name1']; ?> <?php echo $data['c_name2']; ?></td>
  <td><?php echo $data['c_email']; ?></td>
  <td><?php echo $data['c_phone']; ?></td>
  <td><?php echo $data['c_address']; ?></td>
  <td><?php echo $data['date']; ?></td>
  <td><?php echo $total_bill ?></td>
  <td><a class="btn btn-outline-danger btn-sm" href="../coding.php?delete_order=<?php echo $data['id']; ?>">Delete Order</a></td>
</tr>
</tbody>

<?php } ?>

</table>
</div>
</div>
</div>

</div>
</div>
</div>
<!-- content-wrapper ends -->

<?php include "footer.php"; ?>
      
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->