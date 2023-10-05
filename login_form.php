<?php
require('login_form_function.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="styles\login.css">
  <link rel="stylesheet" type="text/css" href="styles\general.css">
  <style>
   .login-container{
      width: 500px;
      margin: 0 auto;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 50px;
      background-color: gold;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); 
   }
   
  </style>
</head>
<body>
   
<div class="login-container">

   <form action="" method="post">
      <h2>Login Now</h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>