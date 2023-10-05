<?php
   require_once('payment_process.php');
   $query = "select * from users_form where user_type='user'";
   $result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Order
        </title>
        <link type="text/css" rel="stylesheet" href="style.css">
    </head>
    <body>
        
        <form action="add_order_function.php" method="post">
       
            <div class="inputContainer">
                <label>Test name:</label><input type="text" name="test_name"><br>
            </div class="inputContainer">
            <div class="inputContainer">
                <label>Unit:</label><input type="number" name="unit"><br>
            </div>
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
          <br>
            </div>
            <div class="inputContainer">
                <label>Cost:</label><input type="number" name="cost"><br>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </body>
</html>