<?php 
session_start();

include("connection.php");
include("functions.php");

$error_message = ""; // To store error messages

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstName = $_POST['firstname'] ?? '';
    $lastName = $_POST['lastname'] ?? '';
    $password = $_POST['password'] ?? '';
    $adress = $_POST['adress'] ?? ''; // Updated to 'adress'
    $phoneNumber = $_POST['number'] ?? '';

    if(empty($firstName)) {
        $error_message .= "First name is required.<br>";
    }
    if(empty($lastName)) {
        $error_message .= "Last name is required.<br>";
    }
    if(empty($password)) {
        $error_message .= "Password is required.<br>";
    }
    if(empty($adress)) { // Updated to 'adress'
        $error_message .= "Adress is required.<br>"; // Note the spelling in the message
    }
    if(empty($phoneNumber)) {
        $error_message .= "Phone number is required.<br>";
    }

    if(empty($error_message)) {
        // All inputs are filled, proceed with saving to database
        $query = "INSERT INTO users (firstname, lastname, password, adress, number) VALUES ('$firstName', '$lastName', '$password', '$adress', '$phoneNumber')"; // Updated to 'adress'
        $result = mysqli_query($con, $query);

        if($result) {
            header("Location: login.php");
            die;
        } else {
            $error_message = "Error in saving to database.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

    <div id="box">
        
        <form method="post">
            <div>Signup</div>
            <input type="text" name="firstname" placeholder="First Name" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>"><br><br>
            <input type="text" name="lastname" placeholder="Last Name" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="text" name="adress" placeholder="Adress" value="<?php echo isset($_POST['adress']) ? $_POST['adress'] : ''; ?>"><br><br> <!-- Note the 'adress' spelling here too -->
            <input type="text" name="number" placeholder="Phone Number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : ''; ?>"><br><br>
            <input type="submit" value="Signup"><br><br>
            
            <?php
            if(!empty($error_message)) {
                echo '<div style="color: red;">'.$error_message.'</div>';
            }
            ?>
            
            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</body>
</html>
