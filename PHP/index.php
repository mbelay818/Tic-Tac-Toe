<?php 
  session_start(); 

  if ((!isset($_SESSION['username'])) || isset($_GET['logout'] )) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="phpstyle.css">
    <title>Home</title>
</head>
<body>
    <h1> HomePage</h1>
    <?php
    if(isset($_SESSION['success'])) :  ?>
    <div>
        <h3>
            <?php
            echo $_SESSION['success'];
            unset ($_SESSION['success']);
            ?>
        </h3>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['username'])) : ?>
    <h3> Welcome <strong> <?php echo $_SESSION['username']; ?> </strong></h3>
    <a href="index.php?logout='1'"> Logout </a>

<?php endif ?>

</body>
</body>
</html>