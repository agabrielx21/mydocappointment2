<?php
session_start();
include "../db_conn.php";
$user = $_SESSION['username'];
$qry = "SELECT * FROM users WHERE username = '$user'";
$result = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($result);

$query = "SELECT * FROM servicii";
$rezultat = mysqli_query($conn, $query);
$roww = mysqli_fetch_assoc($rezultat);

if (isset($_SESSION['username'])) {
    ?>
<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

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
        margin-top: -5.15%;
    }

    .second-component {
        padding-bottom: 1%;
    }

    .hello-header {
        padding-top: 4%;
        margin-left: -21%;
    }

    h2,
    h3,
    h4,
    h5 {
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


    .personal-information {
        width: 60%;
        height: 25%;
        margin-left: -21%;
        display: flex;
        gap: 5%;
    }

    .buttons {
        width: 45%;
        text-align: center;
        border-radius: 6px;
        background-color: #8a93ff;
        font-size: 1.3rem;
    }

    .row {
        text-align: left;
        display: block;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #04AA6D;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }

    #doctor option {
        overflow: scroll;
    }
    </style>
    <title>HOME</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <div class="topnav">
        <a href="">Informatii personale</a>
        <a href="">Creeaza programare</a>
        <a href="">Modifica programare</a>
        <a href="">Anuleaza programare</a>
    </div>
    <div class="main-component-2">
        <form id="regForm" action="/action_page.php">
            <h1>Creeaza o programare aici:</h1>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">Alege un serviciu:
                <p><input class="box" list="servicii" name="doctors" id="serviciu">
                    <datalist id="servicii">
                        <?php
                            $query = "SELECT * FROM servicii";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['specialitate'] . '">';
                            }
                            ?>
                    </datalist>
            </div>
            <div class="tab">Alege un doctor:
                <p><input class="box" list="doctori" name="doctors" id="doctor">
                    <datalist id="doctori">
                        <?php 
                    include "getDoctors.php";
                            ?>
                    </datalist>
            </div>
            <div class="tab">Data:
                <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
            </div>
            <div class="tab">Login Info:
                <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
            </div>
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>
    </div>

</body>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    console.log(currentTab);
    if (currentTab == 0) {
        var serviciu = document.getElementById("serviciu").value;
        console.log(serviciu);
        var xhr = new XMLHttpRequest();
        var url = "getDoctors.php";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        var data = "serviciu=" + serviciu;
        xhr.send(data);
    };

// This function will figure out which tab to display
var x = document.getElementsByClassName("tab");
// Exit the function if any field in the current tab is invalid:
if (n == 1 && !validateForm()) return false;
// Hide the current tab:
x[currentTab].style.display = "none";
// Increase or decrease the current tab by 1:
currentTab = currentTab + n;
// if you have reached the end of the form...
if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
}
// Otherwise, display the correct tab:
showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}
</script>

</html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>