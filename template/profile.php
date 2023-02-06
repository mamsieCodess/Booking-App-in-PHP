<?php
session_start();
//this page will be used to update and delete info from the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include "../includes/config/database.php";
    $storedEmail =  $_SESSION['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $sql = "UPDATE `customers` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email' WHERE `email` =  '$storedEmail' ";
    $result = $conn->query($sql);

    if ($result) {

        echo 'Records updated';

        $sql = "SELECT `*` FROM `customers` WHERE `firstname` = '$firstname'";
        $result = $conn->query($sql);
        $updated = $result->fetch_assoc();
        $_SESSION['firstname'] = $updated['firstname'];
        $_SESSION['lastname'] = $updated['lastname'];
        $_SESSION['email'] = $updated['email'];

    } else {
        echo 'Error ' . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
            background-color: #eee7e7;
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
            height: 30px;
            width: 250px;
            padding: 0 5px;
            background-color: rgba(0, 0, 0, 0.1);
        }

        section {
            justify-content: space-around;
            font-size: larger;
        }

        .basic-details {
            padding-right: 15px;
            background-color: white;
            width: 300px;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .bookings {
            width: fit-content;
            padding-left: 20px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: white;
        }

        table {
            font-size: smaller;
        }

        th {
            background-color: #eee7e7;
        }

        td {
            text-align: center;
            padding-left: 5px;
        }

        div>h4 {
            text-align: center;
        }

        #update-button {
            font-weight: bolder;
            border: none;
            background-color: grey;
        }

        #update-button>a {
            font-size: larger;
            padding: 5px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        #update-button:hover {
            background-color: #eee7e7;
        }

        #completed-button {
            background-color: green;
            padding: 5px;

        }

        #completed-button:hover {
            background-color: #eee7e7;
        }

        #cancelled-button {
            background-color: blue;
            padding: 5px;
        }

        #cancelled-button:hover {
            background-color: #eee7e7;
        }
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
        <div class="logo"><img width='200px' id="logo" src="../includes/images/M (1).png" alt=""></div>
        <div class="menu">
            <div><a href="homepage.php">Home</a></div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>

    </header>
    <h1 style="padding-left:10px">This is your profile</h1>
    <section>
        <div class="basic-details">
            <h4>Your details:</h4>
            <form action="profile.php" method="POST">
                <label for="firstname">Firstname:</label><br>
                <input type="text" name="firstname" value="<?php echo $_SESSION['firstname'];?>">
                <br><br>
                <label for="lastname">Lastname:</label><br>
                <input type="text" name="lastname" value="<?php echo $_SESSION['lastname'];?>">
                <br><br>
                <label for="email">Email:</label><br>
                <input type="email" name="email" value="<?php echo $_SESSION['email'];?>">
                <br><br>
               <input type="submit" name="update" value="Update" id="update-button">
                
                <br><br>

            </form>
        </div>
 
    </section>

    <footer>
        <div class="footer-text">Copyright 2022 Mamo Moloi</div>
    </footer>


</body>

</html>