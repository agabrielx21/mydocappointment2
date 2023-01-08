<?php
session_start();
include "../db_conn.php";
$user = $_SESSION['username'];
$qry = "SELECT * FROM users WHERE username = '$user'";
$result = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($result);

if (isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            .topnav {
                background-color: white;
                overflow: hidden;
                color: black;
                border-radius: 9px;
                width: 60%;
                margin-left: 22.5%;

            }

            .topnav a {
                width: 20%;
                float: left;
                color: black;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }

            .topnav a:hover {
                background-color: #ddd;
                color: black;
            }

            .topnav a.active {
                background-color: #04AA6D;
                color: white;
            }

            .main-component-2 {
                height: auto;
                background-color: white;
                border-radius: 12px;
                width: 60%;
                margin-left: 22.5%;
            }

            .second-component {
                padding-bottom: 1%;
            }

            .hello-header {
                padding-top: 4%;
                margin-left: -21%;
            }

            h2,h3,h4,h5 {
                margin-left: -21%;
            }

            .logout-container {
                width: 20%;
                height: 10%;
                background-color: red;
                margin-left: 13%;
                text-align: center;
                border-radius: 6px;
                color: white;
                margin-bottom: 2%;
                margin-top: 5%;
            
            }

            a:link {
                text-decoration: none;
            }


            a:visited {
                text-decoration: none;
                color: black;
            }


            a:hover {
                text-decoration: none;
            }


            a:active {
                text-decoration: none;
            }

            .redirect {
                padding-bottom: 15px;
            }
            .personal-information{
                width: 60%;
                height: 25%;
                margin-left: -21%;
                display: flex;
                gap: 5%;
            }
            .buttons{
                width: 45%;
                text-align: center;
                border-radius: 6px;
                background-color: #8a93ff;
                font-size: 1.3rem;
            }
            .row{
                text-align: left;
                display: block;
            }
            input{
                height: 30%;
                margin-top: 4%;
            }
            .container{
                display: flex;
                gap: 10px;
            }
        </style>
        <title>HOME</title>
        <link rel="stylesheet" href="../CSS/style.css">
    </head>

    <body>
        <div class="topnav">
            <a href="editPersonalData.php">Informatii personale</a>
            <a href="">Creeaza programare</a>
            <a href="">Modifica programare</a>
            <a href="">Anuleaza programare</a>
        </div>
        <div class="main-component-2">
            <div class="second-component">
                <h1 class="hello-header">Completati campurile pe care doriti sa le modificati</h1>
                <div class="personal-information">
                <form method="post" action="submitEdit.php">
                <div class="row">
                        <div class="container">
                        <p>Nume : </p>
                        <input type="text" name="nume" placeholder="<?php  echo $row['nume']?>">
                        </div>
                        <div class="container">
                        <p>Prenume : </p>
                        <input type="text" name="prenume" placeholder="<?php  echo $row['prenume']?>">
                        </div>
                        <div class="container">
                        <p>CNP : </p>
                        <input type="text" name="cnp" placeholder="<?php  echo $row['cnp']?>">
                        </div>
                        <div class="container">
                        <p>Sex : </p>
                        <input type="text" name="sex" placeholder="<?php  echo $row['sex']?>">
                        </div>
                        <div class="container">
                        <p>Varsta : </p>
                        <input type="text" name="varsta" placeholder="<?php  echo $row['varsta']?>">
                        </div>
                        <div class="container">
                        <p>Greutate : </p>
                        <input type="text" name="greutate" placeholder="<?php  echo $row['greutate']?>">
                        </div>
                        <div class="container">
                        <p>Numar telefon : </p>
                        <input type="text" name="numar_telefon" placeholder="<?php  echo $row['numar_telefon']?>">
                        </div>
                        <div class="container">
                        <p>Persoana de contact :</p>
                        <input type="text" name="persoana_ct" placeholder="<?php  echo $row['persoana_ct']?>">
                        </div>
                        <div class="container">
                        <p>Numar telefon persoana de contact : </p>
                        <input type="text" name="nr_ct" placeholder="<?php  echo $row['nr_ct']?>">
                        </div>
                    </div>
                    <div class="container"><input type="submit" value="Submit"></div>
                </form>  
                
            </div>
            <div class="logout-container"><a class="redirect" href="editPersonalData.php">Back</a> </div>
        </div>

    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>