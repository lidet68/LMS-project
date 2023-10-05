<?php
require_once('payment_process.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $orderId = $_POST['order_id'];
    $testName = $_POST['test_name'];
    $unit = $_POST['unit'];
    $cost = $_POST['cost'];

    $query = "UPDATE orders SET test_name='$testName', unit='$unit', cost='$cost' WHERE id='$orderId'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Order information updated successfully.";
       
        header("Location: order.php");
        exit(); 
    } else {
        echo "Failed to update order information.";
    }
} else {
    
    $orderId = $_GET['id'];

    $query = "SELECT * FROM orders WHERE id='$orderId'";
    $result = mysqli_query($con, $query);
    $order = mysqli_fetch_assoc($result);
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
    <title>Edit Order</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .content {
            max-width: 400px;
            padding: 20px;
            background-color: gold;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: left;
            margin-bottom: 20px;
            padding-right: 170px; 
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button{
            color: black;
            background-color: gold;
            font-weight: 600;
            width: 200px;
            height: 50px;
            border-radius: 20px;
            border-width: 8px;
            margin-left: 20px;
            margin-top: 20px;
        }

        .header-content1{
            text-align: left; 
        }
    </style>
</head>
<body>
<div class="content">
        <header class="header">
            <div class="header-content">
                <div class="header-content1">Edit Order</div>
            </div>
        </header>
    
    <form method="POST">
        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
        <div class="form-group">
            <label for="test_name">Test Name:</label>
            <input type="text" name="test_name" value="<?php echo $order['test_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="unit">Unit:</label>
            <input type="text" name="unit" value="<?php echo $order['unit']; ?>" required>
        </div>
        <div class="form-group">
            <label for="cost">Cost:</label>
            <input type="text" name="cost" value="<?php echo $order['cost']; ?>" required>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php
}
?>