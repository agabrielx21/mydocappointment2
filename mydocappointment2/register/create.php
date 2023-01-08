<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
    <link rel="stylesheet" href="../style.css">
	</head>
  <body>
	<?php ?>

  <form action="register.php" method="POST">
        <div class="main-component">
        <?php if(isset($_GET['error'])) {
            ?>
            <p class="error">
                <?php echo $_GET['error'];?>
            </p>
        <?php } ?>
            <div class="second-component">
                <h2 class="header-register">Create your account</h2>
                <input class="input-register" type="text" name="uname" placeholder="Enter Username"><br>
                <input class="input-register" type="password" name="pass" placeholder="Enter Password"><br>
                <button class="submit-register" type="submit">Register</button>
            </div>
        </div>
    </form>
	<?php ?>

	</body>
</html>