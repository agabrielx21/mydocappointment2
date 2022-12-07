<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <form action="login.php" method="post">
        <?php if(isset($_GET['error'])) {
            ?>
            <p class="error">
                <?php echo $_GET['error'];?>
            </p>
        <?php } ?>
        <div class="main-component">
            <div class="second-component">
                <h2 class="header">LOGIN</h2>
                <input class="inp1" type="text" name="uname" placeholder="Enter Username"><br>
                <input class="inp2" type="password" name="pass" placeholder="Enter Password"><br>
                <button class="submit" type="submit">Login</button>
            </div>
        </div>
    </form>
</body>
</html>


     
