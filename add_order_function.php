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
        $users_id = $_POST['users_id'] ;
        $cost = $_POST['cost'] ;


        $query = "insert into orders(test_name,unit,users_id,cost,paid) values('$test_name' , '$unit' , $users_id , '$cost', false) ";
        $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

        if($run){
            echo "<script>
            location.href='order.php'
            </script>";
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