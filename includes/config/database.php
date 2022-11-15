<?php
       //create a database connection

       $conn = new mysqli('localhost', 'root', 'root', 'booking_app');

       //create a query to get the hotel data from table called hotels
       $sql = "SELECT `id`, `name`, `location`, `features`, `rate`,`image` FROM `hotels`";

       $result = mysqli_query($conn, $sql); //made the query to the database

?>