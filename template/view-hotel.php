<?php
session_start();

require_once __DIR__ .  "./../model/hotel.php";

/*if there is no post varibale storing the id data, to to the database and get a row of data 
where it's id matches this id of the object from the previous page*/
if (isset($_GET['id'])) {
    $_SESSION['bookedHotel'] = [];
    include "../includes/config/database.php";
    $id = mysqli_escape_string($conn, $_GET['id']);
    $sql = "SELECT `id`, `name`, `location`, `features`, `rate`,`image` FROM `hotels` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql); 
    $hotel = $result->fetch_assoc();//an associative array of a row returend from the database that can be used

    $newHotel = new Hotel(
        $hotel['id'],
        $hotel['name'],
        $hotel['location'],
        $hotel['features'],
        $hotel['rate'],
        $hotel['image']
    );
    array_push($_SESSION['bookedHotel'],$newHotel);

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
            background-color: rgb(173, 161, 161);
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        #make-booking-button > a {
            text-decoration: none;
            color: black;
            font-size: large;
            padding: 0 50px;
        }

        #make-booking-button:hover {
            cursor: pointer;
            background-color: #EAE1E1;

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
            <div><a href="profile.php">Profile</a></div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>

    </header>


    <h2 style="text-align: center;">Your hotel of choice:</h2>

    <div class="container">
        <img src="<?php echo $newHotel->getImage() ?>">
        <h3><?php echo $newHotel->getName(); ?></h3>
        <h4>Features of the hotel:</h4>
        <ul>
            <?php foreach (explode(',', $newHotel->getFeatures()) as $feature) : ?>
                <li><?php echo $feature ?></li>
            <?php endforeach ?>
        </ul>

        <?php
        //store data form this page in session variables so that it can be accessed on the next page
        $_SESSION['startDate'] = $_POST['startDate']; 
        $_SESSION['endDate'] = $_POST['endDate'];

        //if the submit button is clicked, then perform this code
        if (array_key_exists('submit', $_POST)) {
            $calculate =  $newHotel->calculateDays($_SESSION['startDate'], $_SESSION['endDate']);
            $amount = $newHotel->getRate() * $calculate;
            $_SESSION['amount-due'] = $amount;
        }
        ?>
        <form action="" method="POST" style="text-align:center">
            <label>Check-in:</label> <input type="date" name="startDate" required>
            <label>Check-out:</label>
            <input type="date" name="endDate" required>
            <h4>Total amount due is: R <?php echo $newHotel->getRate() * $calculate . ' for ' . $calculate . ' nights' ?> </h4>
            <input type="submit" id="calculate-button" value="Calculate" name="submit">
        </form>
    </div>
   
    <div class="form2">
        <form action="" method="GET" id="form2">
        
            <button id="make-booking-button"><a href="booking-page.php?id=<?php echo htmlspecialchars($newHotel->getId())?>">Book</a></button>
            
        </form>
    </div>



    <footer>

        <div class="footer-text">Copyright 2022 Mamo Moloi</div>

    </footer>

</body>

</html>