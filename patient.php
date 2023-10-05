<?php
   require_once('payment_process.php');
   $query = "select * from patients";
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
    <style>
   .btn {
  background-color: black;
  color: yellow;
  border: none;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  position: absolute;
  top: 20px;
  right: 25px; 
  border-radius: 100px;
}

    .btn-action {
        background-color: black;
        color: yellow;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin-right: 5px;
        border-radius: 100px;
    }



</style>
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
      <div class="header-content1">Patients</div>
  
      </div>
    </div>

  </header>
  <main class="main js-main">
<div class="btn"><a href= "add_patients.html">Add Patient </a></div>
      
<table class="table">
        <thead>
        <tr>
            <th class="table-id">ID</th>
            <th class="table-test-name">Patient Name</th>
            <th class="table-units">Email</th>
            <th class="table-cost">Age</th>
            <th class="table-payment">Address</th>
            <th class="table-actions">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td>
                <a href="edit_patient.php?id=<?php echo $row['id']; ?>" class="btn-action">Edit</a>
                    <a href="delete_patient.php?id=<?php echo $row['id']; ?>" class="btn-action">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
  </main>


   
  </body>
</html>