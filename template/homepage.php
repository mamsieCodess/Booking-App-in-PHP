<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php'); //if this page is accessed before loggin in, redirect back to the login page
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
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

        h2 {
            margin-left: 20px;
        }

        .container {
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
        }

        .hotel-wrapper {
            width: 250px;
            height: auto;
            margin: 10px;
            text-align: center;
            position: relative;
            padding: 10px;
            border-radius: 5px;
            background-color: #eee7e7;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 0px 0px;
        }

        .hotel-wrapper:hover {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .hotel-wrapper img {
            height: 150px;
            width: 100%;

        }

        li {
            list-style: none;
            list-style-position: outside;
            text-align: justify;
        }

        #select-button {
            height: 25px;
            left: 40%;
            font-weight: bolder;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            height: 30px;

        }

        #select-button:hover {
            background-color: #EAE1E1;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: black;
        }
         .logout-button{ 
            left: 40%;
            font-weight: bolder;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            height: 30px;
            margin: 0 auto;
            width: fit-content;
            padding:5px;

         }
    </style>
</head>

<body>

    <h1>Welcome <?php echo $_SESSION['firstname']; ?></h1>

    <div class="logout-button">
        <a href="logout.php">Log Out</a>
    </div>
    

</body>

</html>