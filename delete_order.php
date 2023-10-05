<?php
// delete_order.php

// Check if the order ID is provided
if (isset($_GET['id'])) {
    $orderID = $_GET['id'];

    // Perform the deletion operation, e.g., using SQL DELETE statement
    // Make sure to establish a database connection before executing the query

    // Example using mysqli:
    $con = mysqli_connect("localhost", "root", "", "laboratory");

    // Check if the connection is successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct the delete query
    $query = "DELETE FROM orders WHERE id = '$orderID'";

    // Execute the delete query
    $result = mysqli_query($con, $query);

    // Check if the deletion was successful
    if ($result) {
        // Deletion successful, redirect back to the order.php page
        header("Location: order.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting order: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // Order ID not provided
    echo "Order ID not specified.";
}
?>