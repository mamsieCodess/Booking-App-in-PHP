<?php
session_start();

include "./../model/booking.php";

/*if there is no post varibale storing the id data, to to the database and get a row of data 
where it's id matches this id of the object from the previous page*/
if (isset($_GET['id'])) {

    include "../includes/config/database.php";
    $id = mysqli_escape_string($conn, $_GET['id']);
    $sql = "SELECT `hotel_id`, `name`, `location`, `amenities`, `daily_rate`, `thumbnail`, `images`, `hotel_description`, `refund_avaialbility` FROM `hotels` WHERE `hotel_id` = $id";
    $result = $conn->query($sql);
    $hotel = $result->fetch_assoc(); //this the associative array that we can use
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Lexend+Giga:wght@400;600&family=Montserrat+Alternates&display=swap"
      rel="stylesheet"
    />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #EAE1E1;
        }


        .container {
            width:50%;
            height: max-content;
            margin: 15px auto;
            background-color: white;
            padding: 15px;
            text-align: center;

        }

        .alert {
            color: green;
            font-weight: bolder;
            text-align: center;
            padding-top: 15px;
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

        a {
            text-decoration: none;
            color: black;
            background-color: #EAE1E1;
            padding:10px;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo"><img width='200px' id="logo" src="../includes/images/M (1).png" alt=""></div>
        <div class="menu">
            <div><a href="profile.php">Profile</a></div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>

    </header>

    <div class="alert">
        <?php
        //this for creating the booking
        //assigning session variables to variables then making a booking

        $checkIn = $_SESSION['startDate'];
        $checkOut = $_SESSION['endDate'];
        $customerId = 'cus00' . $_SESSION['firstname'];
        $hotelId = $_GET['id'];
        $totalCost = $_SESSION['amount-due'];

        $newBooking = new Booking($customerId, $hotelId, $checkIn, $checkOut);
        //then using then booking object to insert the data in the database

        $customerId = $newBooking->getCustomerId();
        $hotelId = $newBooking->getHotelId();
        $checkIn = $newBooking->getCheckinDate();
        $checkOut = $newBooking->getCheckoutDate();

        $sql = "INSERT INTO `bookings`(`customer_id`, `hotel_id`, `check_in`, `check_out`, `amount_due`) VALUES ('$customerId','$hotelId','$checkIn','$checkOut','$totalCost')";

        include "../includes/config/database.php";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'Your hotel has been booked.';
        } else {
            die('Sorry, you have already booked. Call management for any problems');
        }
        ?>

    </div>

    <h2 style="text-align: center;">This is your booking confirmation:</h2>

    <div class="container">
        <h3>Receipt:</h3>

        <p>This is to confirm that <strong><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></strong> <?php echo ' has a booking at the ' . $hotel['name'] . ' hotel.' ?> </p>

        <p>From the <?php echo $checkIn . ' to the ' . $checkOut ?></p>
        <p>Booking number: <strong> <?php echo $customerId ?></strong></p>
        <p>Use it as your reference for any inquries</p>

    </div>
    <footer>
        <div class="footer-text">Copyright 2022 Mamo Moloi</div>
    </footer>






</body>

</html>