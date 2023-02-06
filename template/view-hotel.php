<?php
session_start();

require_once __DIR__ .  "./../model/hotel.php";

/*if there is no post varibale storing the id data, to to the database and get a row of data 
where it's id matches this id of the object from the previous page*/
if (isset($_GET['id'])) {
  $_SESSION['bookedHotel'] = [];
  include "../includes/config/database.php";
  $id = mysqli_escape_string($conn, $_GET['id']);
  $sql = "SELECT `hotel_id`, `name`, `location`, `amenities`, `daily_rate`, `thumbnail`, `images`, `hotel_description`, `refund_avaialbility` FROM `hotels` WHERE `hotel_id` = $id";

  $result = mysqli_query($conn, $sql);
  $hotel = $result->fetch_assoc(); //an associative array of a row returend from the database that can be used


  $newHotel = new Hotel(
    $hotel['hotel_id'],
    $hotel['name'],
    $hotel['location'],
    $hotel['amenities'],
    $hotel['daily_rate'],
    $hotel['thumbnail'],
    $hotel['images'],
    $hotel['hotel_description'],
    $hotel['refund_avaialbility']
  );
  array_push($_SESSION['bookedHotel'], $newHotel);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Viewing Page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Lexend+Giga:wght@400;600&family=Montserrat+Alternates&display=swap" rel="stylesheet" />
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
      box-shadow: #ff1e00 0px 2px;

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
      background-color: #ff1e00;
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

    #make-booking-button>a {
      text-decoration: none;
      color: black;
      font-size: large;
      padding: 0 50px;
    }

    #make-booking-button:hover {
      cursor: pointer;
      background-color: #EAE1E1;

    }



    /**/
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      color: black;
      font-family: "Julius Sans One", sans-serif;
      overflow-x: hidden;
      font-size: 13px;
      background-color: white;
    }

    .header {
      display: flex;
      justify-content: space-between;
      height: max-content;
      padding: 0px 30px;
      position: sticky;
      top: 0;
      z-index: 9999;
      background-color: white;
    }

    .nav-bar {
      display: flex;
      justify-content: space-around;
    }

    .logo {
      font-family: "Lexend Giga", sans-serif;
      color: #ff1e00;
      font-weight: 700;
      text-decoration: none;
      letter-spacing: 1mm;
    }

    .nav-bar ul {
      display: flex;
      justify-content: space-around;
    }

    .nav-bar li {
      margin: 0 15px;
      list-style-type: none;

    }

    .nav-bar a {
      text-decoration: none;
      color: black;
      font-size: 13px;
    }

    .nav-bar a:hover {
      color: #ff1e00;
    }

    #contact-btn,
    #about-btn,
    #book-btn {
      border: none;
      height: 35px;
      margin-top: 8px;
      border: 3px solid #ff1e00;
      background-color: transparent;
      font-weight: 700;
      color: #ff1e00;
    }

    #book-btn:hover,
    #about-btn:hover,
    #enquiries-btn:hover {
      background-color: #ff1e00;
      color: black;
      cursor: pointer;
    }

    #contact-btn {
      background-color: #ff1e00;
      color: black;
      height: 40px;
    }

    #contact-btn:hover {
      background-color: transparent;
      color: #ff1e00;
      cursor: pointer;
    }

    #about-btn {
      height: 40px;
      margin-right: 10px;
    }

    #enquiries-btn {
      width: 150px;
      text-transform: uppercase;
      background-color: transparent;
      height: 40px;
      font-weight: 700;
      border: 3px solid #ff1e00;
      color: #ff1e00;

    }

    .home-hero {
      height: 450px;
      margin-top: 20px;
    }

    .hero-btns {
      position: relative;
      bottom: 300px;
      padding-left: 50px;
      height: max-content;
    }

    .hero-btns input {
      width: 150px;
      text-transform: uppercase;
      height: 200px;
    }

    .home-hero {
      height: 450px;
      margin-top: 20px;
    }

    .hero-background {
      position: relative;
    }

    .hero-background img {
      height: 450px;
      width: 100%;
      opacity: 0.75;
    }

    .hero-heading {
      position: relative;
      bottom: 50px;
      font-weight: bolder;
      font-size: 30px;
      bottom: 300px;
      font-family: "Lexend Giga", sans-serif;
      padding-left: 50px;
      width: 500px;
    }

    .services,
    .hotel-section,
    .contact-section,
    .about-section {
      margin: 50px 0;
      padding: 0 50px;
    }

    .section-heading {
      color: rgb(0, 0, 0);
      font-family: "Lexend Giga", sans-serif;
      text-align: left;
      font-size: 25px;
      font-weight: bolder;
      text-transform: uppercase;
    }

    .services-wrapper {
      width: 800px;
      margin: 0 auto;
    }

    .services-list {
      display: grid;
      grid-template-columns: auto auto auto;
      list-style-type: none;
    }

    .services-list li {
      font-size: 100px;
      color: #ff1e00;
      text-align: center;
    }

    .services-list span {
      font-size: 14px;
      font-weight: 900;
      color: black;
      font-family: "Lexend Giga", sans-serif;
      letter-spacing: 1mm;
    }

    .hotel-section {
      padding: 0 50px;
      height: fit-content;
    }

    .section-subheading {
      color: #ff1e00;
      font-family: "Lexend Giga", sans-serif;
      text-align: left;
      font-size: 20px;
      font-weight: bold;
      text-transform: uppercase;
    }

    .hotel-products {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      font-family: "Lexend Giga", sans-serif;
    }

    .hotel-product {
      width: 300px;
      text-align: center;
      box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5);
      margin: 20px;
      position: relative;
    }

    .hotel-product p {
      padding: 5px;
    }

    .hotel-product img {
      height: 250px;
      width: 300px;
    }

    .product-name {
      font-weight: 900;
      text-align: center;
      font-size: larger;
      text-transform: uppercase;
    }

    /*hover effect*/
    .overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: white;
      overflow: hidden;
      width: 100%;
      height: 100%;
      -webkit-transform: scale(0);
      -ms-transform: scale(0);
      transform: scale(0);
      -webkit-transition: .3s ease;
      transition: .3s ease;
    }

    .hotel-product:hover .overlay {
      -webkit-transform: scale(1);
      -ms-transform: scale(1);
      transform: scale(1);
      cursor: pointer;
    }

    .text {
      color: black;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      width: 100%;
    }

    .amenties-heading {
      font-weight: 900;
    }

    .amenities {
      display: flex;
      justify-content: space-around;
      padding: 0 30px;
      margin: 0;
    }

    .amenities li {
      list-style-type: none;
      margin: 5px;
      font-size: 15px;
    }

    .overlay-price {
      font-weight: 900;
      font-size: 25px;
    }

    .overlay-price span {
      font-size: 16px;
    }

    .overlay-view-btn {
      border: none;
      background-color: #ff1e00;
      color: white;
      height: 40px;
      width: 100px;
      font-weight: 700;
    }

    .overlay-view-btn:hover {
      border: 3px solid white;
    }

    .contact-container {
      width: 500px;
      margin: 0 auto;
    }

    .capetown-section {
      height: fit-content;
    }

    .contact-form input {
      width: 100%;
      height: 35px;
      margin: 15px 0;
    }

    .contact-form textarea {
      width: 100%;
    }

    .about-page {
      height: fit-content;
    }

    .about-section img {
      width: 200px;
      height: 200px;
      margin: 15px;
    }

    #team {
      display: flex;
      justify-content: center;
      text-align: center;
    }

    .viewing-section {
      width: 1000px;
      margin: 40px auto 100px;
      display: grid;
      gap: 10px;

    }

    .vewing-pictures {
      background-color: white;
      height: fit-content;
    }

    .viewing-refund {
      color: green;
      font-weight: 700;
    }

    #reservation-btn {
      background-color: #ff1e00;
      height: 45px;
      border: none;
      text-align: center;
      font-weight: 900;
      color: white;
      float: left;
    }

    #reservation-btn:hover {
      border: 3px solid white;
      cursor: pointer;
    }

    #calculator-form {
      border: 3px solid #ff1e00;
      padding: 10px;
      margin: 15px;
    }

    #calculate-button {
      background-color: transparent;
      height: 45px;
      width: 95px;
      border: 3px solid #ff1e00;
      text-align: center;
      font-weight: 900;
      color: #ff1e00;
    }

    #calculate-button:hover {
      background-color: #ff1e00;
      color: white;
      cursor: pointer;
    }

    .footer {
      height: 350px;
      width: 100%;
      background-color: #ff1e00;
    }
  </style>
</head>

<body>
  <div class="header">
    <div class="logo-wrapper">
      <p><a href="index.php" class="logo">HOTEL LOBBY</a></p>
    </div>
    <div class="nav-bar">
      <div>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#about-section">About</a></li>
          <li><a href="#hotel-section">Hotels</a></li>
          <li><a href="#news">News</a></li>
          <li><a href="#contact-section">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>


  <h2 style="text-align: center;">Your hotel of choice:</h2>

  <div class="container">
    <img src="<?php echo $newHotel->getThumbnail() ?>">
    <h3><?php echo $newHotel->getName(); ?></h3>
    <h4>Features of the hotel:</h4>
    <ul>
      <?php foreach (explode(',', $newHotel->getamenities()) as $feature) : ?>
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
      $amount = $newHotel->getdaily_rate() * $calculate;
      $_SESSION['amount-due'] = $amount;
    }
    ?>
    <div class="resevation-btn-row">
      <form action="" method="POST" style="text-align: center" id="calculator-form">
        <label>Check-in:</label>
        <input type="date" name="startDate" required />
        <label>Check-out:</label>
        <input type="date" name="endDate" required />
        <h4>Total amount due is: R <?php echo $newHotel->getdaily_rate() * $calculate . ' for ' . $calculate . ' nights' ?> </h4>
        <input type="submit" id="calculate-button" value="Calculate" name="submit" />
      </form>

      <form action="GET">
        <input type="submit
      " value="BOOK" id="reservation-btn" />
        <button id="make-booking-button"><a href="booking-page.php?id=<?php echo htmlspecialchars($newHotel->getId()) ?>">Book</a></button>
      </form>
    </div>
  </div>



  <footer>

    <div class="footer-text">Copyright 2022 Mamo Moloi</div>

  </footer>

</body>

</html>