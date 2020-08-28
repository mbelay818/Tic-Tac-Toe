
<?php
include 'database.php';

session_start();

$username = "";
$email = "";
$errors = array();

$db = mysqli_connect('localhost','mmerid2','mmerid2','mmerid2') or die("could not connect to the database");

if(isset($_POST['signup-user'])){
$username = mysqli_real_escape_string($db,$_POST['username']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

if(empty($username)){
    array_push($errors, "Username is required");
}
if(empty($email)){
    array_push($errors, "Email is required");
}
if(empty($password_1)){
    array_push($errors, "Password is required");
}
if($password_1 != $password_2){
    array_push($errors, "Password does not match");
}

$user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
 
$result = mysqli_query($db,$user_check_query);
$user = mysqli_fetch_assoc($result);

if($user){

    if($user['username'] === $username){
        array_push($errors,"Username already exists");
    }
    if($user['email'] === $email){
        array_push($errors,"Email already exists with an associated user");
    }

}

if(count($errors) == 0){
    $password = md5($password_1);
    print $password;
    $query = "INSERT INTO user (username,email,password) VALUES('$username','$email','$password')";

    mysqli_query($db,$query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.html');
    }
}

if(isset($_POST['login-user'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if(empty($username)){
        array_push($errors,"Username is required");
    }
    if(empty($password)){
        array_push($errors,"Password is required");
    }
    if(count($errors) == 0){
        $password = md5($password);

        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
        $results = mysqli_query($db,$query);

        if(mysqli_num_rows($results)){
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header("location: index.html");

        }else{
            array_push($errors,"wrong username and password");
        }

    }
}


?>