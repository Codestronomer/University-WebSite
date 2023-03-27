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
          margin: 200px;
          text-align: center;
          color: white;
          font-weight: 500;
        }

        .apply {
          color: white;
          font-size: 20px;
          /* display: flex; */
          line-height: 50px;
        }

        .row {
          display: flex;
          flex-direction: row;
          justify-content: space-around;
        }

        input {
          height: 30px;
          background-color: transparent;
          box-sizing: border-box;
          border: none;
          border-bottom: 2px solid white;
          color: white;
        }

        input[type=email] {
          width: 75%;
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
          padding: 16px 32px;
          text-decoration: none;
          margin: 4px 2px;
          cursor: pointer;
          font-size: 20px;
        }
        button:hover {
          opacity: 0.2;
        }
        </style>
  </head>
  <body>
    <div class="top-page">
      <nav style="">
          <a href="index.html"><img src="logo-nobg.png" alt="My University Logo"></a>
          <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="#">Admissions</a></li>
                  <li><a href="#">Academics</a></li>
                  <li><a href="#">Student Life</a></li>
                  <li><a href="#">Alumni</a></li>
          </ul>
          <ul>
                  <li><a href="login">Login</a></li>
                  <li><a href="apply.html">SignUp</a></li>
          </ul>
      </nav>

      <div class="apply-form">
        <h1>Application Form</h1>
        <?php
          require('db.php');
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstname = test_input($_POST["firstname"]);
            $lastname = test_input($_POST["lastname"]);
            $email = test_input($_POST["email"]);
            $password = test_input($_POST["password"]);
            $confirm_password = test_input($_POST["confirm_password"]);
            $state_of_origin = test_input($_POST["state_of_origin"]);
            $dob = $_POST["dob"];

            $query = "INSERT INTO 'students' (firstname, lastname, email, password, state_of_origin, dob)
                    VALUES ('$firstname', '$lastname', '$email', '" . md5($password) ."',
                    '$state_of_origin', '$dob')";
            
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
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
            }
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          } else {
        ?>
        <form method="post" class="apply" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="row">
            <div class="column">
              <label for="firstname">First Name</label>
              <input type="text" name="firstname" id="firstname" required>
            </div>
            <div class="column">
              <label for="lastname">Last Name</label>
              <input type="text" name="lastname" id="lastname" required>
            </div>
          </div>
          <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
          </div>
          <div class="row">
            <div class="column">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" required>
            </div>
            <div class="column">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" name="confirm_password" id="confirm_password" required>
            </div>
            <div class="column">
              <label for="state_of_origin">State Of Origin</label>
              <input type="text" name="state_of_origin" id="state_of_origin" required>
            </div>
            <div class="column">
              <label for="dob">Date of Birth</label>
              <input type="date" name="dob" id="dob" required>
            </div>
          </div>
          <button type="submit">Submit</button>
          </div>
        </form>
        <?php
          }
        ?>
      </div>
    </div>
    <footer>
      <p>&copy; 2023 Our University. All rights reserved.</p>
    </footer>
  </body>
</html>