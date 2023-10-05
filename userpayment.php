<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login_form.php");
    exit;
}

// Retrieve user information from the database
require_once 'config.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM orders WHERE users_id = $user_id";
$result = $conn->query($query);

$data = array(); // Initialize an empty array to store the retrieved data

if ($result && $result->num_rows > 0) {
    // Fetch all rows and store them in the $data array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/payment.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <title>Dashboard Page</title>
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
        <div class="header-content1">Payment</div>
    </div>
</header>
<main class="main js-main">
    <table class="table">
        <thead>
        <tr>
            <th class="table-id">ID</th>
            <th class="table-test-name">Full Test Name</th>
            <th class="table-units">Units</th>
            <th class="table-cost">Cost</th>
            <th class="table-payment">Payment</th>
        </tr>
        </thead>
        <?php
// Check if data is not empty before looping
if (!empty($data)) {
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['test_name'] . "</td>";
        echo "<td>" . $row['unit'] . "</td>";
        echo "<td>" . $row['cost'] . "</td>";
        echo "<td>";

        if($row ['paid']==true){
            echo "Paid";
        } else{
            echo "Not Paid";
        }

        echo "</td>";
        echo "</tr>";
    }
} 
?>

       
    </table>
</main>
</body>
</html>




