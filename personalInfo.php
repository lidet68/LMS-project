<?php
   require_once('personalinfo_process.php');
   require('login_form_function.php');
   $email=$_SESSION['user_email'];
   $testquery="select*from users_form where email='{$email}'";
   $testrun=mysqli_query($con,$testquery);
   $fetchtest=mysqli_fetch_array($testrun);
   $id=$fetchtest['id'];
   $name=$fetchtest['name'];

   $query = "select * from patients where id='{$id}'";
   
   $result = mysqli_query($con,$query);
   

?>

<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">

  <head>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles\general.css">
    <link rel="stylesheet" href="styles\personalInfo.css">
    <link rel="stylesheet" href="styles\header.css">
    <link rel="stylesheet" href="styles\sidebar.css">
    <title>Personal Info</title>
    
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
  <header class="header">
    <div class="header-content">
      <div class="header-content1">Personal Information</div>
    </div>
    
  </header>
  <main class="main js-main">
  
    <table class="table">
    
        <tr>
          <th class="table-patient-name">ID</th>
          <th class="table-gender">Patient name</th>
          <th class="table-email">Email</th>
          
        </tr>
        <tr>
       
          <td><?php echo $id;?></td>
          <td><?php echo $name;?></td>
          <td><?php echo $email;?></td>
          
        
          </tr>
         
     

    </table>
  </main>
  </body>
</html>