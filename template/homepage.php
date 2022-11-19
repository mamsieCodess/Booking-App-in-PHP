<?php
session_start();

/*if there is no session variable storing the email data, then redirect the user to
the login page*/
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
//if the email is set and found, then include these the database and the hotel class file
include "../model/hotel.php";
include "../includes/config/database.php";

/*then create and make a query hotels table in the database and after the results are found
 make an associative array of all the rows of data found on the table using the function of the
 results object called fecth_all() */
$sql = "SELECT `id`, `name`, `location`, `features`, `rate`,`image` FROM `hotels`";
$result = mysqli_query($conn, $sql);
$hotels = $result->fetch_all(MYSQLI_BOTH);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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

        #view-button {
            height: 25px;
            left: 40%;
            font-weight: bolder;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            height: 30px;
        }

        #view-button:hover {
            background-color: #EAE1E1;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: black;
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
            <div><a href="profile.php">Profile</a></div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </header>

    <h1>Welcome <?php echo $_SESSION['firstname']; ?></h1>

    <section class="container">
        <?php
        $_SESSION['hotels'] = []; //make an empty array that can be accessed anywhere regardless of scope

        /*for each row of data from the database as $hotel, use the Hotel class to make objects that are 
        instances of it and let the objects take in the data from the database using their keys as specified
        as the parameters */
        foreach ($hotels as $hotel) { 
            $newHotel = new Hotel( 

                $hotel['id'],
                $hotel['name'],
                $hotel['location'],
                $hotel['features'],
                $hotel['rate'],
                $hotel['image']
            );

            /*after each object is created, push it into the session array created above then display the
            objects' data using its getter methods*/
            array_push($_SESSION['hotels'], $newHotel);
        } 
         
        foreach ($_SESSION['hotels'] as $hotel) : ?>

            <div class="hotel-wrapper">
                <img src="<?php echo $hotel->getImage() ?>">
                <h4> <?php echo $hotel->getName() ?></h4>

                <div class="features">
                    <ul>
                        <?php foreach (explode(',', $hotel->getFeatures()) as $feature) : ?>
                            <li> <?php echo $feature; ?> </li>
                        <?php endforeach; ?>
                    </ul>

                    <p>R <?php echo $hotel->getRate() ?> per night pp</p>

                </div>
                <!--when the button is pressed, echo on the url the id of that object which will now make this a get method onto the next page-->
                <button id="view-button"><a href="view-hotel.php?id=<?php echo htmlspecialchars($hotel->getId()) ?>">View</a></button>
            </div>


        <?php endforeach; ?>


    </section>

    <footer>

        <div class="footer-text">Copyright 2022 Mamo Moloi</div>

    </footer>
</body>

</html>