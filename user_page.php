<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
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
    <title>user Page</title>
    
  </head>
  <body>
  <nav class="sidebar">

     
<a href="user_page.php">
  <div class="sidebar-link">
    Dashboard
   </div>
</a>
<a href="personalInfo.php">
  <div class="sidebar-link">
    Personal Info
   </div>
</a>
<a href="orderedTest.php">
  <div class="sidebar-link">
    Ordered Test 
   </div>
</a>
<a href="userpayment.php">
  <div class="sidebar-link">
    payment
   </div>
</a>
<a href="report.php">
  <div class="sidebar-link">
    Results
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