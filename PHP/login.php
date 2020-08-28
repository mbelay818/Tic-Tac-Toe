<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title> Log In! </title>
    <link rel="stylesheet" type="text/css" href="phpstyle.css">
</head>
<body>
     <div class="container-l">
         <div>
             <h2> Log In Here:</h2>

             </div>

                <form action="login.php" method= "post">

           Username:<input type="text" name= "username" placeholder="Username" required><br>
           Password:<input type="password" name= "password" placeholder="Password"required><br>

                    <button type="submit" name="login-user">Log In</button>

                    <p>Not a user?<a href="signup.php"><b>Sign up<b></a></p>

                </form>
                
        </div>

</body>
</html>