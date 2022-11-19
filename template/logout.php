<?php
/*this pages redirected to when the user pressed the logout button
and the session is destroyed and all the session data is freed from the session variables*/
session_start();
session_destroy();
header('location:login.php'); //then the user is redirected to the login page

?>