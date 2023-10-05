<?php
// delete_order.php

// Check if the order ID is provided
if (isset($_GET['id'])) {
    $patientID = $_GET['id'];

    // Perform the deletion operation, e.g., using SQL DELETE statement
    // Make sure to establish a database connection before executing the query

    // Example using mysqli:
    $con = mysqli_connect("localhost", "root", "", "laboratory");

    // Check if the connection is successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct the delete query
    $query = "DELETE FROM patients WHERE id = '$patientID'";

    // Execute the delete query
    $result = mysqli_query($con, $query);

    // Check if the deletion was successful
    if ($result) {
        // Deletion successful, redirect back to the patient.php page
        header("Location: patient.php");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting order: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // Patient ID not provided
    echo "Patient ID not specified.";
}
?>