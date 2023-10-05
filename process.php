<?php
$server = "localhost" ;
$username = "root" ;
$password = "" ;
$dbname = "laboratory" ;

$conn = mysqli_connect($server , $username , $password , $dbname) ;

if(isset($_POST['submit'])){
    if(!empty($_POST['test_name'])&& !empty($_POST['unit']) && !empty($_POST['cost'])){
        $test_name = $_POST['test_name'] ;
        $unit = $_POST['unit'] ;
        $patient_name = $_POST['patient_name'] ;
        $cost = $_POST['cost'] ;


        $query = "insert into orders(test_name,unit,patient_name,cost) values('$test_name' , '$unit' , '$patient_name' , '$cost') ";
        $run = mysqli_query($conn,$query) or die(mysqli_error());

        if($run){
            echo "Form submitted successfully" ;
        }
        else{
            echo "Form not submitted" ;
        }

 }
 else{
    echo "all fields required" ;
    
 }
}
?>