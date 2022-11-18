<?php

//initally these are 0
$success = 0;
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include "./includes/config/database.php";

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //checking if the customer already exists on our database
    $sql = "SELECT `*` FROM `customers` WHERE `email` = '$email' ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $user = 1; //if the email is repeating, it beacomes 1 and down in the body an alert will happen
            
        } else {

            //create a new data entry into the database
            $sql = "INSERT INTO `customers`(firstname,lastname,email,password)
    VALUES ('$firstname','$lastname','$email','$password')"; //successful
            //creating a query to the database and testing it
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $success = 1; //if the email is not repeating, it will become 1 and a good alert will be alerted
                session_start();
                
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location:template/homepage.php');
            } else {
                die(mysqli_error($conn));
            }
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
    <title>Sign-up Page</title>
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
            margin-right: 10px;
        }

        h2 {
            font-size: 40px;
            margin: 200px 5px 0px;
            background-color:#EAE1E1;
           
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
            background-color: rgb(234, 225, 225);
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
            justify-content:center;
        }
    </style>

</head>

<body>
    <?php
    //This will display when the user tried to sign up again with the same email address
    if($user){
        echo 'Sorry, this email is taken';
    }
    ?>

<?php
    //This will display when the user tried to sign up again with the same email address
    if($success){
        echo 'You are sucessfully signed up';
    }
    ?>

<header>
<div class="logo"><img width='250px' id="logo" src="./includes/images/M (1).png" alt=""></div>
</header>

    <div class="container">

        <div class="welcome-page">
            <h2>Welcome</h2>
            <p id="welcome-text">Sign up to book your favourite hotel in your favorite city within minutes
            </p>
        </div>
        <div class="form-wrapper">

            <form action="index.php" method="POST">
                <p>Sign-up:</p>
                <input type="text" name="firstname" placeholder="Name:" required>
                <br><br>
                <input type="text" name="lastname" placeholder="Surname:" required>
                <br><br>
                <input type="email" name="email" placeholder="Email" required>
                <br><br>
                <input type="password" name="password" placeholder="Password:" required>
                <br><br>
                <input type="submit" name="register" value="Sign Up" id="submit-button">
                <br><br>
                <p>Have an account? <a href="template/login.php">Login</a></p>

            </form>
        </div>

    </div>

</body>

</html>