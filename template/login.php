<?php
$failure = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    include "/MAMP/htdocs/OOP-Booking-App/includes/config/database.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT `*` FROM `customers` WHERE `email` = '$email' AND `password` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $details = $result->fetch_assoc();
        session_start();
        $_SESSION['firstname'] = $details['firstname'];
        $_SESSION['lastname'] = $details['lastname'];
        $_SESSION['email'] = $details['email'];
        $_SESSION['password'] = $details['password'];
        header('location:homepage.php');

    } else {
        $failure = 1;

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        h1 {
            text-align: center;
        }

        p {
            font-weight: bolder;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        .welcome-page {
            height: 500px;
            max-width: 400px;
            text-align: center;
            padding: 5px;
            margin-right:20px;
        }

        h2 {
            font-size: 40px;
            margin: 200px 5px 0px;
            background-color: #EAE1E1;
        }

        #welcome-text {
            font-size: 20px;
            background-color: #EAE1E1;
        }

        form {
            width: 400px;
            height: 500px;
            margin: 0 auto;
            text-align: center;
            padding: 50px;
            background-color: #EAE1E1;
            box-shadow: rgba(0, 0, 0, 0.9) 0px 3px 8px;
        }

        input {
            height: 35px;
            width: 90%;
            padding: 5px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: rgba(0, 0, 0, 0.1);

        }

        input:hover {
            background-color: rgba(255, 255, 255);
        }

        #submit-button {
            font-weight: bolder;

        }

        #submit-button:hover {
            background-color: blue;
            font-weight: bolder;
        }

        a {
            text-decoration: none;
        }
        header{
            display: flex;
            justify-content: center;
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
}

.header {
  display: flex;
  justify-content: space-between;
  height: max-content;
  padding: 0px 30px;
  position:sticky;
  top: 0;
  z-index: 9999;
  background-color: white;
}
.nav-bar {
  display: flex;
  justify-content: space-around;
}
.logo{
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
#about-btn:hover, #enquiries-btn:hover {
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
#enquiries-btn{
  width: 150px;
  text-transform: uppercase;
  background-color:transparent;
  height: 40px;
  font-weight: 700;
  border:3px solid #ff1e00;
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
.hotel-section, .contact-section, .about-section{
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
  margin:20px;
  position: relative;
}
.hotel-product p{
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
background-color:white;
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
left:50%;
-webkit-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
width:100%;
}
.amenties-heading{
  font-weight: 900;
}
.amenities{
  display: flex;
  justify-content: space-around;
  padding:0 30px;
  margin: 0;
}
.amenities li{
  list-style-type: none;
  margin: 5px;
  font-size: 15px;
}
.overlay-price{
font-weight:900;
font-size: 25px;
}
.overlay-price span{
  font-size: 16px;
}
.overlay-view-btn{
  border:none;
  background-color:#ff1e00;
  color: white;
  height: 40px;
  width:100px;
  font-weight: 700;
}
.overlay-view-btn:hover{
border: 3px solid white;
}

.contact-container{
  width:500px;
  margin: 0 auto;
}
.capetown-section{
height:fit-content;
}

.contact-form input {
  width: 100%;
  height: 35px;
  margin: 15px 0;
}
.contact-form textarea {
  width: 100%;
}
.about-page{
  height: fit-content;
}

.about-section img{
  width: 200px;
  height: 200px;
  margin: 15px;
}
#team{
  display: flex;
  justify-content:center;
  text-align: center;
}
.viewing-section{
  width: 1000px;
  margin: 40px auto 100px;
  display: grid;
  gap:10px;
  
}

.vewing-pictures{
background-color: white;
height: fit-content;
}

.viewing-refund{
color: green;
font-weight: 700;
}

#reservation-btn{
  background-color: #ff1e00;
  height: 45px;
  border: none;
  text-align: center;
  font-weight: 900;
  color: white;
  float:left;
}

#reservation-btn:hover{
  border: 3px solid white;
  cursor: pointer;
}
#calculator-form{
border: 3px solid #ff1e00;
padding:10px;
margin: 15px;
}
#calculate-button{
  background-color: transparent;
  height: 45px;
  width: 95px;
  border:3px solid #ff1e00;
  text-align: center;
  font-weight: 900;
  color:#ff1e00;
}

#calculate-button:hover{
background-color: #ff1e00;
color: white;
  cursor: pointer;
}
.footer{
  height: 350px;
  width: 100%;
  background-color: #ff1e00;
}
    </style>

</head>

<body>

<header>
<div class="logo"><img width='250px' id="logo" src="../includes/images/M (1).png" alt=""></div>
</header>

    <div class="container">

        <div class="welcome-page">
            <h2>Welcome back</h2>
            <p id="welcome-text">Login to book your favourite hotel in your favorite city within minutes
            </p>
        </div>
        <div class="form-wrapper">

            <form action="login.php" method="POST"> <!--action is simply where the data is going to be processed at-->
            <?php if ($failure > 0){echo 'This account does not exist.';} ?>

                <p>Login:</p>
            
                <input type="email" name="email" placeholder="Email" required>
                <br><br>
                <input type="password" name="password" placeholder="Password:" required>
                <br><br>
                <input type="submit" name="register" value="Login" id="submit-button">
                <br><br>
                <p>Don't have an acount? <a href="../index.php">Sign-up</a></p>

                

            </form>
        </div>

    </div>

</body>

</html>