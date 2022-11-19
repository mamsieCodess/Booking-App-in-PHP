<?php
session_start();
//this page will be used to update and delete info from the database

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        *{
            box-sizing: border-box;
        }

        body{
            background-color: #eee7e7;
        }

        .menu {
            display: flex;
            height: 50px;
            justify-content: flex-end;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 2px;

        }

        .menu>div {
            font-weight: bolder;
            border: none;
            width: fit-content;
            padding: 15px;
            margin-left: 15px;
        }

        .menu>div:hover {
            background-color: #eee7e7;
            cursor: pointer;
        }

        .logo {
            display: flex;
            justify-content: center;
        }

        footer {
            height: 150px;
            display: flex;
            justify-content: center;
            padding-top: 120px;
            background-color: rgba(0, 0, 0, 0.15);
        }

        .menu a {
            text-decoration: none;
            color: black;
        }

        input {
            border: none;
            height: 25px;
            padding: 0 5px;
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <header>
        <div class="logo"><img width='200px' id="logo" src="../includes/images/M (1).png" alt=""></div>
        <div class="menu">
            <div><input type="search" name="search" placeholder="search a hotel ..."></div>
            <div><a href="homepage.php">Home</a></div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>

    </header>
<h2>This is your profile</h2>
<section>
    <div class="basic-details">
        <h4>Your details</h4>
    </div>
    <div class="bookings">
        <h4>Past and present bookings</h4>
    </div>
</section>

    <footer>

        <div class="footer-text">Copyright 2022 Mamo Moloi</div>

    </footer>


</body>

</html>