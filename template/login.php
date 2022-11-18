<?php

$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include "/MAMP/htdocs/OOP-Booking-App/includes/config/database.php";
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    //checking if this particular customer with this email and password exists
    $sql = "SELECT `*` FROM `customers` WHERE `email` = '$email' AND `password` ='$password' ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
       
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $login = 1;
            //once the login is successful, the seesion starts

            session_start();
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('location:homepage.php'); //header function redirects you to the next page if the login is sucessful

        } else {
            $invalid = 1;
        }
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
    <?php
if($login){
       echo "You are succesffuly logged it";
    }
    ?>

<?php
if($invalid){
      echo "Incorrect details";
    }
    ?>

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
                <p>Login:</p>
            
                <input type="email" name="email" placeholder="Email" required>
                <br><br>
                <input type="password" name="password" placeholder="Password:" required>
                <br><br>
                <input type="submit" name="register" value="Login" id="submit-button">
                <br><br>
                <p>Don't have an acount? <a href="">Sign-up</a></p>

                

            </form>
        </div>

    </div>

</body>

</html>