<?php
session_start();
//this page will be used to update and delete info from the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include "../includes/config/database.php";
    $storedEmail =  $_SESSION['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];



    $sql = "UPDATE `customers` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email' WHERE `email` =  '$storedEmail' ";
    $result = $conn->query($sql);

    if ($result) {

        echo 'Records updated';

        $sql = "SELECT `*` FROM `user_details` WHERE `firstname` = '$firstname'";
        $result = $conn->query($sql);
        $updated = $result->fetch_assoc();
        $_SESSION['firstname'] = $updated['firstname'];
        $_SESSION['lastname'] = $updated['lastname'];
        $_SESSION['email'] = $updated['email'];
    } else {
        echo 'Error ' . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
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
            height: 30px;
            width: 250px;
            padding: 0 5px;
            background-color: rgba(0, 0, 0, 0.1);
        }

        section {
            justify-content: space-around;
            font-size: larger;
        }

        .basic-details {
            padding-right: 15px;
            background-color: white;
            width: 300px;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .bookings {
            width: fit-content;
            padding-left: 20px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: white;
        }

        table {
            font-size: smaller;
        }

        th {
            background-color: #eee7e7;
        }

        td {
            text-align: center;
            padding-left: 5px;
        }

        div>h4 {
            text-align: center;
        }

        #update-button {
            font-weight: bolder;
            border: none;
            background-color: grey;
        }

        #update-button>a {
            font-size: larger;
            padding: 5px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        #update-button:hover {
            background-color: #eee7e7;
        }

        #completed-button {
            background-color: green;
            padding: 5px;

        }

        #completed-button:hover {
            background-color: #eee7e7;
        }

        #cancelled-button {
            background-color: blue;
            padding: 5px;
        }

        #cancelled-button:hover {
            background-color: #eee7e7;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo"><img width='200px' id="logo" src="../includes/images/M (1).png" alt=""></div>
        <div class="menu">
            <div><a href="homepage.php">Home</a></div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>

    </header>
    <h1 style="padding-left:10px">This is your profile</h1>
    <section>
        <div class="basic-details">
            <h4>Your details:</h4>
            <form action="profile.php" method="POST">
                <label for="firstname">Firstname:</label><br>
                <input type="text" name="firstname" value="<?php echo $_SESSION['firstname'];?>">
                <br><br>
                <label for="lastname">Lastname:</label><br>
                <input type="text" name="lastname" value="<?php echo $_SESSION['lastname'];?>">
                <br><br>
                <label for="email">Email:</label><br>
                <input type="email" name="email" value="<?php echo $_SESSION['email'];?>">
                <br><br>
               <input type="submit" name="update" value="Update" id="update-button">
                
                <br><br>

            </form>
        </div>
 
    </section>

    <footer>
        <div class="footer-text">Copyright 2022 Mamo Moloi</div>
    </footer>


</body>

</html>