<?php
$user = 0; //initially the user doesn't exists

/* if a request method of post is found on the form then include
the database file */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include "./includes/config/database.php";

    //*the values from the form is to be stored in these variables below

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //firstly check if the person with such details exist

    $sql = "SELECT `*` FROM `users` WHERE `email` = '$email' ";
    $result = mysqli_query($conn, $sql);


    if ($result->num_rows > 0) {
        $user = 1; //they match, it means such a user already exists

    } else {
        $sql = "INSERT INTO `users`(first_name,last_name,email,password)
        VALUES (?,?,?,?) "; //placeholders
        $stmt = $conn->prepare($sql); //prepared statement
        $stmt->bind_param('ssss', $firstname, $lastname, $email, $password); //bind parameters
        //then start a session with the entered details in session variables
        session_start();

        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        /*then redirect the user to the home page using the header function
                or else display out the error*/

        $stmt->execute();
        header('location:template/homepage.php');
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Lexend+Giga:wght@400;600&family=Montserrat+Alternates&display=swap" rel="stylesheet" />
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

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: black;
            font-family: "Julius Sans One", sans-serif;
            overflow-x: hidden;
            font-size: 13px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            height: max-content;
            padding: 0px 30px;
            position: sticky;
            top: 0;
            z-index: 9999;
            background-color: white;
        }

        .nav-bar {
            display: flex;
            justify-content: space-around;
        }

        .logo {
            font-family: "Lexend Giga", sans-serif;
            color: #ff1e00;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 1mm;
        }

        .nav-bar ul {
            display: flex;
            justify-content: space-around;
        }

        .nav-bar li {
            margin: 0 15px;
            list-style-type: none;

        }

        .nav-bar a {
            text-decoration: none;
            color: black;
            font-size: 13px;
        }

        .nav-bar a:hover {
            color: #ff1e00;
        }

        #contact-btn,
        #about-btn,
        #book-btn {
            border: none;
            height: 35px;
            margin-top: 8px;
            border: 3px solid #ff1e00;
            background-color: transparent;
            font-weight: 700;
            color: #ff1e00;
        }

        #book-btn:hover,
        #about-btn:hover,
        #enquiries-btn:hover {
            background-color: #ff1e00;
            color: black;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <?php if ($user > 1) {
        echo 'This email already exists';
    } ?>


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