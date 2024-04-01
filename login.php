<?php 

session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $password = $_POST['password'];

    if(!empty($firstName) && !empty($lastName) && !empty($password)) {
        //read from database
        $query = "SELECT * FROM users WHERE firstname = '$firstName' AND lastname = '$lastName' AND password = '$password' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            $_SESSION['id'] = $user_data['id']; 
            header("Location: index.php");
            die;
        } else {
            echo "wrong combination of first name, last name, or password!";
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="box">
        
        <form method="post">
            <div>Login</div>
            <input id="text" type="text" name="firstname" placeholder="First Name"><br><br>
            <input id="text" type="text" name="lastname" placeholder="Last Name"><br><br>
            <input id="text" type="password" name="password" placeholder="Password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    </div>
</body>
</html>
