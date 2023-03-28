<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

require("db.php");
// Get current user's details
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM students WHERE id='$user_id'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Group15 UNIVERSITY</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
                rel="stylesheet">
        <style>
        body {
  background-color: #e5d9f2;
  color: black;
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  padding: 20px;
}

h1 {
  font-size: 36px;
  margin-bottom: 10px;
}

p {
  font-size: 20px;
  margin-bottom: 10px;
}

a {
  color: #fff;
  text-decoration: none;
}

a:hover {
  color: #ccc;
}
        </style>
<head>
<body>
        <header style="background-color: black;">
                <nav style="">
                        <a href="index.html"><img src="logo-nobg.png" alt="My University Logo"></a>
                        <ul>
                                <li><a href="home.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="#">Admissions</a></li>
                                <li><a href="#">Academics</a></li>
                                <li><a href="#">Student Life</a></li>
                                <li><a href="#">Alumni</a></li>
                        </ul>
                        <ul>
                                <a href="logout.php">Log out</a>
                        </ul>
                </nav>                        
        </header>
        <h1>Welcome, <?php echo $user['firstname']; ?>!</h1>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>First Name: <?php echo $user['firstname']; ?><p>
        <p>Last Name: <?php echo $user['lastname']; ?><p>
        <p>Date of Birth: <?php echo $user['dob']; ?></p>
        <p>State of Origin: <?php echo $user['state_of_origin']; ?></p>
        <p>Gender: <?php echo $user['gender']; ?></p>
</body>
</html>