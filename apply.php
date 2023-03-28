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

        .apply-form {
          margin: 70px;
          margin-left: 250px;
          margin-right: 250px;
          padding: 30px;
          text-align: center;
          color: black;
          font-weight: 500;
          background-color: #e5d9f2;
          border-radius: 10px;
        }

        .apply {
          font-size: 20px;
          /* display: flex; */
          line-height: 50px;
        }

        .row {
          display: flex;
          flex-direction: row;
          justify-content: space-between;
        }

        input {
          height: 30px;
          box-sizing: border-box;
          border: none;
          border: 2px solid black;
          border-radius: 4px;
        }

        input[type=email] {
          /* width: 100%; */
        }

        input:focus {
          background-color: transparent;
          box-sizing: border-box;
          border: none;
        }

        button {
          background-color: black;
          border: none;
          color: white;
          padding: 10px 30px;
          text-decoration: none;
          margin: 4px 2px;
          margin-top: 20px;
          cursor: pointer;
          font-size: 20px;
          border-radius: 4px;
        }
        button:hover {
          opacity: 0.2;
        }

        .select1 {
          height: 30px;
        }
        </style>
  </head>
  <body>
    <div class="top-page">
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
                  <li><a href="login.php">Login</a></li>
                  <li><a href="apply.php">SignUp</a></li>
          </ul>
      </nav>

      <div class="apply-form">
        <h1>Application Form</h1>
        <?php
          require('db.php');
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstname = stripslashes($_POST["firstname"]);
            $firstname = mysqli_real_escape_string($connection, $firstname);
            $lastname = stripslashes($_POST["lastname"]);
            $lastname = mysqli_real_escape_string($connection, $lastname);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($connection, $email);
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($connection, $password);
            $confirm_password = stripslashes($_POST["confirm_password"]);
            $confirm_password = mysqli_real_escape_string($connection, $confirm_password);
            $state_of_origin = stripslashes($_POST["state_of_origin"]);
            $gender = stripslashes($_POST["gender"]);
            $gender = mysqli_real_escape_string($connection, $gender);
            $state_of_origin = mysqli_real_escape_string($connection, $state_of_origin);
            $dob = $_POST["dob"];
            // $dob = date($dob);

            // hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO `students` (firstname, lastname, email, password, state_of_origin, dob, gender)
                    VALUES ('$firstname', '$lastname', '$email', '$hashed_password',
                    '$state_of_origin', '$dob', '$gender')";
            
            // Do something with form data (e.g. add to database, send message, etc.)
            $result = mysqli_query($connection, $query);
            if ($result) {
              echo "<div class='form'>
                    <h3>Thank you for applying, $firstname $lastname.</h3>
                    <p>Your application has been recieved
                    and will be reviewed shortly! We'll be in touch soon.
                    Click here to <a href='login.php'>Login</a></p>
                    </div>";
            } else {
              echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='apply.php'>register</a> again.</p>
                  </div>";
            }
          } else {
        ?>
        <form method="post" class="apply" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="row">
            <div class="column1">
              <label for="firstname">First Name</label>
              <input type="text" name="firstname" id="firstname" required>
            </div>
            <div class="column1">
              <label for="lastname">Last Name</label>
              <input type="text" name="lastname" id="lastname" required>
            </div>
          </div>
          <div class="row">
            <div class="column1">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" required>
            </div>
            <div class="select1">
              <label for="gender">Gender</label>
              <select name="gender" id="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="RatherNotSay">Rather not say</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="column1">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" required>
            </div>
            <div class="column1">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" name="confirm_password" id="confirm_password" required>
            </div>
          </div>
          <div class="row">
            <div class="column1">
              <label for="state_of_origin">State Of Origin</label>
              <input type="text" name="state_of_origin" id="state_of_origin" required>
            </div>
            <div class="column1">
              <label for="dob">Date of Birth</label>
              <input type="date" name="dob" id="dob" required>
            </div>
          </div>
            <button type="submit">Submit</button>
          </div>
          </div>  
        </form>
        <?php
          }
        ?>
      </div>
    </div>
    <footer>
                <div style="display: flex; flex-direction: row; justify-content: center;">
                <img src="logo-nobg.png" style="width: 70px; height: 70px;" alt="uni-logo"/>
                <p>
                XYZ University
                </p>
                </div> 
                <p>&copy; 2023</p>
                All rights reserved.
        </footer>
  </body>
</html>