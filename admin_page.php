<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('admin_page.php');
}

?>

<!DOCTYPE html>
<html>
  <head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles\general.css">
    <link rel="stylesheet" href="styles\dashboard.css">

    
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
    <main>
      <div class="welcome-container">
        <h1>Welcome!</h1>
        <p>Welcome to our website. Enjoy your stay!</p>
        <button class="logout-button"><a class="logout-button-link" href="login_form.php">Logout</a></button>
      

</div>
</main>
    <script></script>
</body>
</html>