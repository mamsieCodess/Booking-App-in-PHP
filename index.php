<?php

/*these variables are used as CONDITIONS to be passed or failed
 initially they are both 0*/
$success = 0;
$user = 0;

/* if a request method of post is found on the form then include
the database file */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include "./includes/config/database.php";

    //*the values from the form is to be stored in these variables below

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    /*firstly CREATE and MAKE a query to the table where the column email
     is equal to the email value inputed by a user*/
    $sql = "SELECT `*` FROM `customers` WHERE `email` = '$email' ";
    $result = mysqli_query($conn, $sql);

    /*if there is a row of data returned or FOUND on the table then the value of user
    increases to one and stops the data from being re-entered*/
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $user = 1;

            /*or else if there is no such row of data found, create a query
            to insert the values inputted by the user on the form fields*/
        } else {
            $sql = "INSERT INTO `customers`(firstname,lastname,email,password)
            VALUES ('$firstname','$lastname','$email','$password')";

            //then make the query to the table
            $result = mysqli_query($conn, $sql);

            /*if the query is successful and the data is successfully entered,
            increase the value of the success variable to one meaning true so
            the code that follows is executed unlike when it was 0*/
            if ($result) {
                $success = 1;

                /*then start a session and store the form values into session variables
            they are accessible regardless of scope*/
                session_start();
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                /*then redirect the user to the home page using the header function
                or else display out the error*/
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

        header {
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>
    <?php
    /*if the same email is used by the user to sign up, this message will be displayed
    the variable is used as a condition because it is equal to 1*/
    if ($user) {
        echo 'Sorry, this email is taken';
    }
    ?>

    <?php
    /*the success variable is used to indicate that the condition of not finding a similar email
    address in the database is met and that the inserting of the entered data was successful */
    if ($success) {
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
                <!--data of this form will be processed on this page and the request method is POST-->
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