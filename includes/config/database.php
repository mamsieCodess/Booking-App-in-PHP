<?php
       //create a database connection

       $conn = new mysqli('localhost', 'root', 'root', 'booking-app');

       if(!$conn){
              die(mysqli_error($conn));
       };


      


?>