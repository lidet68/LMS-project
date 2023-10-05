<?php
   require_once('payment_process.php');
   $query = "select * from orders";
   $result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
  <head>

  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles\general.css">
    <link rel="stylesheet" href="styles\payment.css">
    <link rel="stylesheet" href="styles\header.css">
    <link rel="stylesheet" href="styles\sidebar.css">
    <title>Dashboard Page</title>

</head>
<body>
<nav class="sidebar">

<a href="admin_page.php">
  <div class="sidebar-link">
    Dashboard
   </div>
</a>
<a href="patient.php">
  <div class="sidebar-link">
    Patients
   </div>
</a>
<a href="order.php">
  <div class="sidebar-link">
    Orders
   </div>
</a>
<a href="paymentRecords.php">
  <div class="sidebar-link">
    payments
   </div>
</a>
<a href="add_report.php">
  <div class="sidebar-link">
    Reports
   </div>
</a>



   

  </nav>
  <header class="header">
    <div class="header-content">
      <div class="header-content1">Payment</div>
  
      </div>
    </div>

  </header>
  <main class="main js-main">

      
    <table class="table">
      <thead>
        <tr>
          <th class="table-id">ID</th>
          <th class="table-test-name">Full Test Name</th>
          <th class="table-units">Units</th>
          <th class="table-cost">cost</th>
          <th class="table-payment">Payment</th>
        </tr>
       
      </thead>
      <tr>
        <?php
          
          while($row = mysqli_fetch_assoc($result))
          {
          ?> 
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['test_name'];?></td>
          <td><?php echo $row['unit'];?></td>
          <td><?php echo $row['cost'];?></td>
          <?php
           
           if($row['paid']==true) {
            ?>
            <td><?php echo 'Paid';?></td>         
<?php
}

else {$order_id=$row['id'];
  ?>
  <td>
    <form method='POST' action=''>
 <input type='hidden' name='order_id' value='<?php echo $order_id ?>' >
 <input type='submit' name='payment' value='Pay?'>
   </form>
 

 <?php echo "Not paid"?>
  </td>
<?php
}
?>


          </tr>
          <?php 
          }
             
      ?>
     

    </table>
  </main>
  <?php
  
if(isset($_POST['payment'])){
  $order_id = $_POST['order_id'] ;

        $query = "update orders set paid=true where id='{$order_id}'";
        $run = mysqli_query($con,$query) or die(mysqli_error($con));

        if($run){
            echo "<script>
            location.href='PaymentRecords.php'
            </script>";
        }
        else{
            echo "Form not submitted" ;
        }

 }


?>


   
  </body>
</html>