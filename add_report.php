<?php
    
   require_once('payment_process.php');
   $query = "select * from users_form where user_type='user'";
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
        <title>
            Report
        </title>
        <link type="text/css" rel="stylesheet" href="style.css">
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

    <div class="header-content">
      <div class="header-content1">Report</div>
    </div>

  </header>
        
        <form action="add_report_function.php" method="post">
        <div class="inputContainer">
        <label>Test name:</label><input type="text" name="test_name"><br>
        </div class="inputContainer">
        <div class="inputContainer">
        <label>Test Result:</label><input type="text" name="Test_Results"><br>
        </div class="inputContainer">
        <div class="inputContainer">
        <label>Test Conductor:</label><input type="text" name="Test_Conductor"><br>
        </div class="inputContainer">
        <div class="inputContainer">
        <label>Diagnosis Summary:</label><input type="text" name="Diagnosis_summary"><br>
        </div class="inputContainer">
        <div class="inputContainer">
        <label>User Id:</label><input type="text" name="users_id"><br>
        </div class="inputContainer">
            <div class="inputContainer">
                <label>Patient Name:</label>
                <select name="users_id"> <?php
          
          while($row = mysqli_fetch_assoc($result))
          {
          ?>
           <option value="<?php echo $row['id'];?>" >
           <?php echo $row['name'];?>


          </option>
          <?php
          }
          ?>
          </select>
    

            <button type="submit" name="submit">Submit</button>
        </form>
    </body>
</html>