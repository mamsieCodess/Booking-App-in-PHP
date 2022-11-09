<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Lato', sans-serif;
        }
        #signUpForm {
            background-color: white;
            background-image: url('./includes/images/background1.jpg');
            opacity: 0.9;
            background-size: cover;
            text-align: center;
            width: 400px;
            height: 500px;
            margin: 0 auto;
        }
        .logo{
            color:white;
        }

        input {
            width: 50%;
            height: 25px;
            padding: 5px;
            border-radius: 5px;
            border: none;
            margin-bottom: 25px;
            opacity: 0.9;
        }
        #signUpBtn{
            background-color: rgb(0,0,250);
            color:white;
            font-weight: 600;
        }
        #signUpBtn:hover{
        background-color: rgb(0,0,180);
       
      }

        
    </style>
</head>

<body>
    <?php if(!$_POST){ ?> 

    <form id="signUpForm" action="" method="post">
        <h5 class="logo">escape</h5>
        <h2>Lets book your next vacation</h2>
        <input type="email" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" id="signUpBtn" name="signUpBtn" value="Sign Up">
    </form>
    
    <?php }

    else{

         require_once __DIR__ . "/template/homePage.php";
    }
    ?>




</body>

</html>
</body>
</html>