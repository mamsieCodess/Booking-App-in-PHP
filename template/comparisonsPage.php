<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparisons Page</title>
    <style>
        select{
            border: none;
            width:30%;
            height: 23px;
            text-align: center;
            border-radius: 3px;


        }
        .wrapper {
            text-align: center;
            width: 400px;
            height: 500px;
            margin: 0 auto;
            background-color: black;
            background-image: url('./includes/images/effel-tower.jpg');
            background-size: cover;
            
        }
        #hotelsForm{
            opacity: 0.9;
        }
        input {
            width: 50%;
            height: 25px;
            padding: 5px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
        }
      label{
        color:white;
      }
      #compareBtn{
        margin-top: 20px;
        background-color: rgb(210,0,0);
        color:white;
        font-weight: 600;
        height:35px;
       
      }
      #compareBtn:hover{
        background-color: rgb(180,0,0);
       
      }
    </style>
</head>

<body>
    <div class="wrapper">
    <h5 class="logo">escape</h5>
    <h2>Lets compare Hotels</h2>
    <form id="hotelsForm" action="" method="POST">
        <input type="text" name="firstname" placeholder="First name" required>
        <br>
        <input type="text" name="lastname" placeholder="Last name" required>
        <br>
        <input type="text" name="username" placeholder="Email Address" value="<?php echo $_POST['username']?>">
        <br>
        <input type="number" name="numberOfDays" placeholder="Number of days">
        <br>
        <label for="hotelChoice1">Hotel Choices</label>
        <br>
        <select name="hotelChoice1" id="hotelChoice1">
            <option value=""></option>
            <option value="hotel1">Hotel1</option>
            <option value="hotel1">Hotel2</option>
            <option value="hotel1">Hotel3</option>
            <option value="hotel1">Hotel4</option>
        </select>
        <select name="hotelChoice2" id="hotelChoice2">
            <option value=""></option>
            <option value="hotel1">Hotel1</option>
            <option value="hotel1">Hotel2</option>
            <option value="hotel1">Hotel3</option>
            <option value="hotel1">Hotel4</option>
        </select>
        <br>
        <input type="submit" id="compareBtn" name="compareBtn" value="Compare">

    </form>
    </div>

</body>

</html>