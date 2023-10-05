<?php
@include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM users_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exists!';
   }else{
      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO users_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="styles/login.css">
  <link rel="stylesheet" type="text/css" href="styles/general.css">
  <style>
   .form-container{
      width: 500px;
      margin: 0 auto;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 50px;
      background-color:gold;
   }
   .form-container select {
      width: 90%;
      padding: 12px;
      border: 5px solid black;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
      margin-left: 20px;
   }
  </style>
</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h2>Register Now</h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type" class="form-select"> <!-- Add the class "form-select" to the select element -->
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">login now</a></p>
   </form>
</div>

</body>
</html>