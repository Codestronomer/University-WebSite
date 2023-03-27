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
                .form {
                        margin: 50px auto;
                        width: 300px;
                        padding: 30px 25px;
                        background: rgb(10, 10, 10);
                        border-radius: 5px;
                        z-index: 5;
                        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
                        transition: 0.3s;
                        color: white;
                }
                h1.login-title {
                        color: white;
                        margin: 0px auto 25px;
                        font-size: 25px;
                        font-weight: 600;
                        text-align: center;
                }
                .login-input {
                        font-size: 15px;
                        border: 1px solid #ccc;
                        padding: 10px;
                        margin-bottom: 25px;
                        height: 25px;
                        /* width: calc(100% - 23px); */
                        width: 100%;
                }
                .login-button {
                        color: #fff;
                        background: #55a1ff;
                        border: 0;
                        outline: 0;
                        width: 100%;
                        height: 50px;
                        font-size: 16px;
                        text-align: center;
                }
                .link {
                        color: #666;
                        font-size: 15px;
                        text-align: center;
                        margin-bottom: 0px;
                }
                .link a {
                        color: white;
                }
                h3 {
                        font-weight: normal;
                        text-align: center;
                }

                label {
                        font-weight: 600;
                        margin-bottom: 10px;
                }

                input {
                        height: 30px;
                        background-color: transparent;
                        box-sizing: border-box;
                        border: none;
                        border-bottom: 2px solid white;
                        color: white;
                        width: 100%;
                        margin-top: 8px;
                        cursor: pointer;
                        outline: none;
                }

                input[type=email] {
                width: 100%;
                }

                input:focus {
                background-color: transparent;
                box-sizing: border-box;
                border: none;
                outline: none;
                }

                button {
                        background-color: white;
                        border: none;
                        border-radius: 5px;
                        color: black;
                        padding: 10px 27px;
                        text-decoration: none;
                        margin: 10% 0% 0 35%;
                        cursor: pointer;
                        font-size: 13px;
                        align-text: center;
                }
                button:hover {
                        opacity: 0.2;
                }
        </style>
<head>
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
        <?php
                require('db.php');
                session_start();
                // When a form is submitted, check and create user session
                if (isset($_POST['EMAIL'])) {
                        $email = stripslashes($_REQUEST['email']);
                        $email = mysqli_real_escape_string($connection, $email);
                        $password = stripslashes($_REQUEST['password']);
                        $password = mysqli_real_escape_string($connection, $password);

                        // check if the user exists in the database
                        $query = "SELECT * from `students` WHERE email='$email'
                        AND password='". md5($password) . "'";
                        
                        // run query
                        $result = mysqli_query($connection, $query) or die(mysql_error());
                        $rows = mysqli_num_rows($result);
                        if ($rows == 1) {
                                $_SESSION['email'] = $username;
                                // redirect to user profile page
                                header("Location: user.php");
                        } else {
                                echo "<div class='form'>
                                <h3> Incorrect Email or Password. </h3></br>
                                <p class='link'>Click here to <a href='login.php'>Retry</a>.</p>
                                </div>";
                        }
                } else {
        ?>
                        <form class="form" method="post" name="login">
                                <h1 class="login-title">Login</h1>
                                <div>
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" required>
                                </div>
                                <div class="column">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" required>
                                </div>
                                <button type="submit">Login</button>
                                <p class="link"><a href="apply.php">Not a Student? Apply Here</a></p>
                        </form>
        <?php
                }
        ?>
        </div>
</body>
</html>