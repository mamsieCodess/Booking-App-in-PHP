<?php
session_start();

require_once __DIR__ .  "./../model/booking.php"; //will be using the class

//using a get request to link the data of the selected object

if (isset($_GET['id'])) {

    //create a database connection

    $conn = new mysqli('localhost', 'root', 'root', 'booking_app');

    $id = mysqli_escape_string($conn, $_GET['id']);

    //create a query to get the hotel data from table called hotels
    $sql = "SELECT `id`, `name`, `location`, `features`, `rate`,`image` FROM `hotels` WHERE `id` = $id";

    $result = mysqli_query($conn, $sql); //made the query to the database

    $hotel = $result->fetch_assoc();

    mysqli_free_result($result);
    mysqli_close($conn);

    //make a new Booking object with the database

    $newBooking = new Booking(
        $hotel['id'],
        $hotel['name'],
        $hotel['location'],
        $hotel['features'],
        $hotel['rate'],
        $hotel['image']
    );
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing Page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #EAE1E1;
        }

        .container {
            width: 400px;
            height: 500px;
            margin: 20px auto;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .container>img {
            height: 200px;
            width: 100%;
        }

        h3 {
            text-align: center;
        }

        li {
            list-style-type: square;
        }

        h4 {
            margin-left: 10px;
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

        .menu a {
            text-decoration: none;
            color: black;
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

        #calculate-button {
            height: 25px;
            left: 40%;
            font-weight: bolder;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            height: 30px;
        }

        #calculate-button:hover {
            cursor: pointer;
            background-color: white;
        }

        #make-booking-button {
            font-weight: bolder;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            height: 45px;
            width: 400px;
        }

        #make-booking-button>a {
            text-decoration: none;
            color: black;
        }

        #make-booking-button:hover {
            cursor: pointer;
            background-color: white;

        }

        .form2 {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo"><img src="../includes/images/M (1).png" width='200px' ; id="logo" src="" alt=""></div>
        <div class="menu">
            <div><a href="#">Profile</a></div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>

    </header>


    <h2 style="text-align: center;">Your hotel of choice:</h2>

    <div class="container">
        <img src="<?php echo $newBooking->getImage() ?>">
        <h3><?php echo $newBooking->getName(); ?></h3>
        <h4>Features of the hotel:</h4>
        <ul>
            <?php foreach (explode(',', $newBooking->getFeatures()) as $feature) : ?>
                <li><?php echo $feature ?></li>
            <?php endforeach ?>
        </ul>

        <?php
        ///NOTE --> MAKE THIS AS A HOTEL OBEJCT THEN MAKE THE NEXT PAGE THE NEW BOOKING ONE
        $_SESSION['startDate'] = $_POST['startDate'];
        $_SESSION['endDate'] = $_POST['endDate'];

        if (array_key_exists('submit', $_POST)) {
            $calculate =  $newBooking->calculateDays($_SESSION['startDate'], $_SESSION['endDate']);

            $amount = $newBooking->getRate() * $calculate;
            $_SESSION['amount-due'] = $amount;
        }
        ?>
        <form action="" method="POST" style="text-align:center">
            <label>Check-in:</label> <input type="date" name="startDate">
            <label>Check-out:</label>
            <input type="date" name="endDate">
            <h4>Total amount due is: R <?php echo $newBooking->getRate() * $calculate . ' for ' . $calculate . ' nights' ?> </h4>
            <input type="submit" id="calculate-button" value="Calculate" name="submit">
        </form>
    </div>
   
    <div class="form2">
        <form action="homepage" method="GET" id="form2">
        
            <button id="make-booking-button"><a href="booking-page.php?id=<?php echo htmlspecialchars($newBooking->getId())?>">Make a booking</a></button>

        </form>
    </div>



    <footer>

        <div class="footer-text">Copyright 2022 Mamo Moloi</div>

    </footer>

</body>

</html>