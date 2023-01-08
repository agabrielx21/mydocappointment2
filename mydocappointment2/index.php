<!DOCTYPE html>
<html>
    <style>
        .create{
            margin-top: 4%;
            width: 80%;
            margin-left: -15%;
            background-color: #2691d9;
            border: none;
            font-size: 1rem;
            border-radius: 20px;
            color: white;
            height: 8%;
            font-family: 'Bree Serif', serif;
            text-align: center;
            padding-top: 1%;
        }
    </style>
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
                <div class="create"><a href="register\create.php">Create Account</a></div>
            </div>
        </div>
    </form>

</body>
</html>


     
