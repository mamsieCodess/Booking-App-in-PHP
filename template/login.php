<?php
session_start();

$firstname = $POST['firstname'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-image: url('includes/images/desktop2.jpg');
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
            box-shadow: rgba(0, 0, 0, 0.9) 0px 3px 8px;
            background-color: rgba(255, 255, 255);
            background-size:contain;
            opacity: 0.8;
            text-align: center;
            padding:5px;
        }
        h2{
            font-size: 40px;
            margin: 200px 5px 0px;
        }

        #welcome-text{
           font-size: 20px;
        }
        form {
            width: 400px;
            height: 500px;
            margin: 0 auto;
            text-align: center;
            padding: 50px;
            background-color: rgba(255, 255, 255);
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
    
    </style>

</head>

<body>

    <h1>Hotel Book Away</h1>

    <div class="container">

        <div class="welcome-page">
            <h2>Welcome</h2>
            <p id="welcome-text">Book your favourite hotel in your favorite city within minutes
            </p>
        </div>
        <div class="form-wrapper">

            <form action="" method="POST">
                <p>Sign-up:</p>
                <input type="text" name="firstname" placeholder="Name:" required>
                <br><br>
                <input type="text" name="surname" placeholder="Surname:" required>
                <br><br>
                <input type="email" name="email" placeholder="Email" required>
                <br><br>
                <input type="password" name="password" placeholder="Password:" required>
                <br><br>
                <input type="submit" name="register" value="Register" id="submit-button">
                <br><br>
                <p>Have an account? <a href="#">Login</a></p>

            </form>
        </div>

    </div>


    <?php


    ?>
</body>

</html>