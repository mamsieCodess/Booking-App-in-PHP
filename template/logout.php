<?php
session_start();
session_destroy();
header('location:login.php'); //once the session is desrtoyed, you'll be redirectd back to the login page

?>