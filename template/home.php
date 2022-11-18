@@ -1,161 +0,0 @@
<?php
session_start();
include "./model/hotel.php"; //will be using the class
include "./includes/config/database.php";

if($conn){
    echo 'Connected successfully';
}else{
    echo 'Error';
}





//get the accociatve array to use from the $result of every hotel entry

$hotels = $result->fetch_all(MYSQLI_BOTH); //these are the rows as associative arrays, indicate as which type as a parameter

mysqli_free_result($result);
mysqli_close($conn);

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
    </style>
</head>

<body>

    <h1>Welcome, <?php echo $_POST['firstname']; ?></h1>
    <h2>Available hotels: </h2>
    <section class="container">

        <?php



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
         ?>


        <?php foreach ($_SESSION['hotels'] as $hotel) : ?>

            <div class="hotel-wrapper">
                <img src="<?php echo $hotel->getImage()?>">
            

                <h4> <?php echo $hotel->getName() ?></h4>

                <div class="features">
                    <ul>
                        <?php foreach (explode(',', $hotel->getFeatures()) as $feature) : ?>
                            <li> <?php echo $feature; ?> </li>
                        <?php endforeach; ?>
                    </ul>

                    <p>R <?php echo $hotel->getRate() ?></p>

                </div>
                <button id="select-button"><a href="template/book.php?id=<?php echo $hotel->getId() ?>">Select</a></button>
            </div>

        <?php endforeach; ?>






    </section>
</body>

</html>