<?php
session_start(); 
include "./model/hotel.php"; //will be using the class

    //fetching the JSON file
    $hotelData = json_decode(file_get_contents("includes/hotels.json"));//returns an array

    //making objects out of the data and the class
    $_SESSION['hotels'] = [];
    foreach($hotelData as $data){
        $newHotel = new Hotel( 
            $data->name,
            $data->location,
            $data->features,
            $data->rate,
            $data->image
        );
        array_push($_SESSION['hotels'],$newHotel) ;//every hotel object newly created is pushed into the session array
    } //can now use this array of objects

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            background-color: #EAE1E1;
        }
       
       h1{
        text-align: center;
       }
         .container{
            justify-content:center;
            display:flex;
            flex-wrap: wrap;
        }
        .hotel-wrapper{
            width: 250px;
            height: auto;
            margin:10px;
            text-align: center;
            position: relative;
            padding:10px;
            border-radius: 5px;
            background-color: #eee7e7;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 0px 0px;
        }
        .hotel-wrapper:hover{
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        img{
            height:150px;
            width:100%;

        }
        li{
            list-style:none;
            list-style-position: outside;
            text-align: justify;
        }
        #select-button{
            height:25px;
            left:40%;
            font-weight: bolder;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            height:30px;

        }
        #select-button:hover{
            background-color: #EAE1E1;
            cursor: pointer;
        }

        
       
        
    </style>
</head>
<body>


    
<h1>Hotel Book Away</h1>
<h3>Available hotels:</h3>

<section class="container">
<?php
foreach($_SESSION['hotels'] as $hotel){ //for every hotel object echo these

    echo '<div class="hotel-wrapper">
    <img src="./includes/images/' . $hotel->getImage() . '">
    <h4>'.$hotel->getName().'</h4>
    <div class="features">';
        foreach($hotel->getFeatures() as $feature){
            echo '<ul><li>'.$feature.'</li></ul>';
        };
       echo ' <p> R '.$hotel->getRate().'</p>
    </div>
    <input type="submit" name="select" value="select" id="select-button">
    
</div>';

}
?>






</section>
</body>
</html>