<?php
session_start();
include "./model/hotel.php"; //will be using the class

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
    </style>
</head>

<body>

    <h1>Welcome, <?php echo $_POST['firstname']; ?></h1>
    <h2>Available hotels: </h2>
    <section class="container">

        <?php
        //create a database connection

        $conn = new mysqli('localhost', 'root', 'root', 'booking_app');

        //create a query to get the hotel data from table called hotels
        $sql = "SELECT `id`, `name`, `location`, `features`, `rate`,`image` FROM `hotels`";

        $result = mysqli_query($conn, $sql); //made the query to the database

        //get the accociatve array to use from the $result of every hotel entry

        $hotels = $result->fetch_all(MYSQLI_BOTH); //these are the rows as associative arrays, indicate as which type as a parameter

        foreach ($hotels as $hotel) {

            $_SESSION['hotels'] = []; //make an empty array that can be accessed anywhere regardless of scope

            foreach ($hotels as $hotel) { //make objects out of the data using the class
                    
                $newHotel = new Hotel( //the parameters is the value as per column in a row of entry

                    $hotel['id'],
                    $hotel['name'],
                    $hotel['location'],
                    $hotel['features'],
                    $hotel['rate'],
                    $hotel['image']
                );

                array_push($_SESSION['hotels'], $newHotel); //every hotel object newly created is pushed into the session array
            } //can now use this array of objects
        }

        foreach($_SESSION['hotels'] as $hotel){ //for every hotel object echo them out in this structure
    
            echo '<div class="hotel-wrapper">
            <img src="./includes/images/' . $hotel->getImage() . '">
            <h4>'.$hotel->getName().'</h4>
            <div class="features">';
                foreach($hotel->getFeatures() as $feature){
                    echo '<ul><li>'.$feature.'</li></ul>';
                };
               echo ' <p> R '.$hotel->getRate().'</p>
            </div>
            <input type="submit" name="select" value="select">
            
        </div>';
    }
     

        ?>






    </section>
</body>

</html>