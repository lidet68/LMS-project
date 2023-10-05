<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "laboratory";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    if (!empty($_POST['test_name']) && !empty($_POST['Test_Results']) && !empty($_POST['Diagnosis_summary'])) {
        $test_name = $_POST['test_name'];
        $Test_Results = $_POST['Test_Results'];
        $Test_Conductor = $_POST['Test_Conductor'];
        $Diagnosis_summary = $_POST['Diagnosis_summary'];
        $users_id = $_POST['users_id'];

        $query = "INSERT INTO result (test_name, Test_Results, Test_Conductor, Diagnosis_summary,users_id) VALUES ('$test_name', '$Test_Results', '$Test_Conductor', '$Diagnosis_summary','$users_id')";
        $run = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if ($run) {
            echo "Report submitted";
        } else {
            echo "Report not submitted";
        }
    } else {
        echo "All fields required";
    }
}
?>