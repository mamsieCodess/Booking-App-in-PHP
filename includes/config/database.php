<?php
       //create a database connection

       $conn = new mysqli('localhost', 'root', 'root', 'booking_app');

       if($conn){
              echo 'Connected successfully';
       }else{
              die(mysqli_error($conn));
       }


      


?>