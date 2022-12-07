<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>HOME</title>
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
    <div class="main-component">
            <div class="second-component">
                <h1 class="hello-header">Hello, <?php echo $_SESSION['username']; ?></h1>
                <a class="redirect" href="logout.php">Logout</a>   
            </div>
        </div>
    </body>
</html>
<?php
}
else {
    header("Location: index.php");
    exit();
}
?>