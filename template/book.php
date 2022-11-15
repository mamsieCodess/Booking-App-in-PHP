<?php

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
    <title>Booking Page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            width: 400px;
            height: 500px;
            background-color: antiquewhite;
            margin: 0 auto;
        }

        img {
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
    </style>
</head>

<body>
    

        <h2>Your booking:</h2>
        <div class="container">
            <img src="<?php echo $newBooking->getImage() ?>">
            <h3><?php echo $newBooking->getName(); ?></h3>
            <h4>Features of the hotel:</h4>
            <ul>
                <?php foreach (explode(',', $newBooking->getFeatures()) as $feature) : ?>
                    <li><?php echo $feature ?></li>
                <?php endforeach ?>
            </ul>
            <h4>Booked for these days:</h4>
            <!--make an input in the login and display it here-->

            <h4>Total amount due is: R <?php echo $newBooking->getRate() ?></h4>
            <button id="select-button" type="submit" name="book" style="margin-left: 45%"><a href="#" style="text-decoration: none; color:black;" >Book</a></button>
        </div>

</body>

</html>