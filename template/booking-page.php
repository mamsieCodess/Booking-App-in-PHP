<?php
session_start();

require_once __DIR__ .  "./../model/hotel.php";
include "./../model/booking.php";

if (isset($_GET['id'])) {

    //REPLACE ALL OF THIS WITH SESSION DATA !!!!!!!

    include "../includes/config/database.php";

    $id = mysqli_escape_string($conn, $_GET['id']);

    //create a query to get the hotel data from table called hotels
    $sql = "SELECT `id`, `name`, `location`, `features`, `rate`,`image` FROM `hotels` WHERE `id` = $id";

    $result = $conn->query($sql);

    $hotel = $result->fetch_assoc(); //this the associative array that we can now use


    $newHotel = new Hotel(
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
    <title>Booking Page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #EAE1E1;
        }

        .image-container {
            max-width: max-content;
            margin: 0 auto;
        }

        .container {
            width: 50%;
            height: max-content;
            margin: 15px auto;
            background-color: white;
            padding: 10px;
            text-align: center;

        }

        .image-container>img {
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

        input {
            border: none;
            height: 25px;
            padding: 0 5px;
            background-color: #EAE1E1;
        }

        #book-button {
            width: 50%;
            padding: 5px;
            font-weight: bolder;
            background-color: rgb(173, 161, 161);
        }

        #book-button:hover {
            background-color: #EAE1E1;
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

        .menu a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo"><img width='200px' id="logo" src="../includes/images/M (1).png" alt=""></div>
        <div class="menu">
            <div><input type="search" name="search" placeholder="search a hotel ..."></div>
            <div><a href="profile.php">Profile</a></div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>

    </header>

    <div class="alert">
        <?php
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

        $sql = "INSERT INTO `bookings` (customerId,hotel_Id,checkIn,checkout,total_cost)
        
    VALUES ('$customerId','$hotelId','$checkIn','$checkOut','$totalCost')";

        include "../includes/config/database.php";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'Your hotel has been booked.';
        } else {
            die('Sorry, you have already booked. Call management for any problems');
        }
        ?>

    </div>

    <h2 style="text-align: center;">This is your booking confirmation for:</h2>

    <div class="image-container">
        <img src="<?php echo $newHotel->getImage() ?>">
        <h3>Hotel: <?php echo $newHotel->getName(); ?></h3>
    </div>


    <div class="container">
        <h4>Details:</h4>
        <form action="booking-page.php" method="POST">
            <label for="firstname">Firstname:</label>
            <input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>"><br><br>

            <label for="firstname">Lastname:</label>
            <input type="text" name="lastname" B value="<?php echo $_SESSION['lastname']; ?>"><br><br>

            <label for="email"> Email Address:</label>
            <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>"><br><br>

            <label for="checkinDate">Checkin Date:</label>
            <input type="date" name="checkinDate" value="<?php echo $_SESSION['startDate']; ?>"><br><br>

            <label for="checkoutDate">Checkout Date:</label>
            <input type="date" name="checkoutDate" value="<?php echo $_SESSION['endDate']; ?>"><br><br>

            <p>Your booking confirmation can be downloaded here</p>

            <input type="submit" value="Checkout" name="checkout" id="book-button">

        </form>



    </div>
    <footer>

        <div class="footer-text">Copyright 2022 Mamo Moloi</div>

    </footer>






</body>

</html>