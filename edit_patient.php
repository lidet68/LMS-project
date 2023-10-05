<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/sidebar.css">
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
    <title>Edit Patient</title>
</head>
<body>
    <div class="content">
        <header class="header">
            <div class="header-content">
                <div class="header-content1">Edit Patient</div>
            </div>
        </header>
        <main class="main js-main">
            <?php
            require_once('payment_process.php');

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $patientId = $_POST['patient_id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $address = $_POST['address'];

            
                $query = "UPDATE patients SET name='$name', email='$email', age='$age', address='$address' WHERE id='$patientId'";
                $result = mysqli_query($con, $query);

                if ($result) {
                    echo "Patient information updated successfully.";
                    
                    header("Location: patient.php");
                    exit();
                } else {
                    echo "Failed to update patient information.";
                }
            } else {
               
                $patientId = $_GET['id'];

                
                $query = "SELECT * FROM patients WHERE id='$patientId'";
                $result = mysqli_query($con, $query);
                $patient = mysqli_fetch_assoc($result);
            ?>
                <form method="POST">
                    <input type="hidden" name="patient_id" value="<?php echo $patient['id']; ?>">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="<?php echo $patient['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo $patient['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" name="age" value="<?php echo $patient['age']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" required><?php echo $patient['address']; ?></textarea>
                    </div>
                    <button type="submit">Update</button>
                </form>
            <?php
            }
            ?>
        </main>
    </div>
</body>
</html>