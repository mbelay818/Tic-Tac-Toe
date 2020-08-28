<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title> Sign Up! </title>
    <link rel="stylesheet" type="text/css" href="phpstyle.css">
</head>
<body>
     <div class="container-su" >
         <div>
             <h2> Sign Up Here:</h2>

             </div>

                <form action="signup.php" method= "post">
                
                <?php include('errors.php') ?>

           Username:<input type="text" name= "username" placeholder="Username"required><br>
           Email:   <input type="email" name= "email" placeholder="Email"required><br>
           Password:<input type="password" name= "password_1" placeholder="Password"required><br>
   Confirm Password:<input type="password" name= "password_2" placeholder="Confirm Password"required><br>

                    <button type="submit" name="signup-user">Sign up</button>

                    <p>Already a user?<a href="login.php"><b>Login<b></a></p>
                </form>
                
            
        </div>

</body>
</html>