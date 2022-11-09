<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <!--switching between the login page and the homepage-->
    <?Php
    if(!$_POST){
        include "./template/login.php";
    }
    else{
        include "./template/home.php";
    }
    ?>
   
</body>
</html>