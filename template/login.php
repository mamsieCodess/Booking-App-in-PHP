<?php
$failure = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    include "/MAMP/htdocs/OOP-Booking-App/includes/config/database.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT `*` FROM `customers` WHERE `email` = '$email' AND `password` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $details = $result->fetch_assoc();
        session_start();
        $_SESSION['firstname'] = $details['firstname'];
        $_SESSION['lastname'] = $details['lastname'];
        $_SESSION['email'] = $details['email'];
        $_SESSION['password'] = $details['password'];
        header('location:homepage.php');

    } else {
        $failure = 1;

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #EAE1E1;
                }

        h1 {
            text-align: center;
        }

        p {
            font-weight: bolder;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .welcome-page {
            height: 500px;
            max-width: 400px;
            text-align: center;
            padding: 5px;
            margin-right:20px;
        }

        h2 {
            font-size: 40px;
            margin: 200px 5px 0px;
            background-color: #EAE1E1;
        }

        #welcome-text {
            font-size: 20px;
            background-color: #EAE1E1;
        }

        form {
            width: 400px;
            height: 500px;
            margin: 0 auto;
            text-align: center;
            padding: 50px;
            background-color: #EAE1E1;
            box-shadow: rgba(0, 0, 0, 0.9) 0px 3px 8px;
        }

        input {
            height: 35px;
            width: 90%;
            padding: 5px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: rgba(0, 0, 0, 0.1);

        }

        input:hover {
            background-color: rgba(255, 255, 255);
        }

        #submit-button {
            font-weight: bolder;

        }

        #submit-button:hover {
            background-color: blue;
            font-weight: bolder;
        }

        a {
            text-decoration: none;
        }
        header{
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>

<header>
<div class="logo"><img width='250px' id="logo" src="../includes/images/M (1).png" alt=""></div>
</header>

    <div class="container">

        <div class="welcome-page">
            <h2>Welcome back</h2>
            <p id="welcome-text">Login to book your favourite hotel in your favorite city within minutes
            </p>
        </div>
        <div class="form-wrapper">

            <form action="login.php" method="POST"> <!--action is simply where the data is going to be processed at-->
            <?php if ($failure > 0){echo 'This account does not exist.';} ?>

                <p>Login:</p>
            
                <input type="email" name="email" placeholder="Email" required>
                <br><br>
                <input type="password" name="password" placeholder="Password:" required>
                <br><br>
                <input type="submit" name="register" value="Login" id="submit-button">
                <br><br>
                <p>Don't have an acount? <a href="../index.php">Sign-up</a></p>

                

            </form>
        </div>

    </div>

</body>

</html>