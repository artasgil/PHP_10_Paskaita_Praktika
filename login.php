
<?php
if (isset($_GET["prisijungti"])) {

//1 vartotojas turi varda, slaptazodi, teisiu duomenis
$registruotiVartotojai = array(
    array(
        "vardas" => "admin",
        "slaptazodis" => "admin",
        "teises" => 1
    ),

    array(
        "vardas" => "admmmmin",
        "slaptazodis" => "admiin",
        "teises" => 1
    ),

    array(
        "vardas" => "admiiiiiiiiiiiin",
        "slaptazodis" => "admiiiin",
        "teises" => 3
    ),

    array(
        "vardas" => "aaaaaaaaadmin",
        "slaptazodis" => "addddddddddddmin",
        "teises" => 1
    ),

    array(
        "vardas" => "adminnnnnnnnnnn",
        "slaptazodis" => "admmmmmmmminnnnnnnnnnnnnnn",
        "teises" => 3
    ),

    array(
        "vardas" => "admimmmmmmmmnnnnnnnnnnn",
        "slaptazodis" => "admmmmmmmmmminnnnnnnnnnnnnnn",
        "teises" => 1
    ),

    array(
        "vardas" => "adminnnnnnnnnnn12345",
        "slaptazodis" => "adminnnnnnnnnnnnnnn",
        "teises" => 4
    ),

    array(
        "vardas" => "adminnnnnnnnnnn",
        "slaptazodis" => "adminnnnnnnnnnnnnnn1112",
        "teises" => 4
    ),

    array(
        "vardas" => "adminnnnnnnnnnn",
        "slaptazodis" => "adminnnnnnnnnnnnnnn",
        "teises" => 2
    ),

    array(
        "vardas" => "adddddddminnnnnnnnnnn",
        "slaptazodis" => "addddddddminnnnnnnnnnnnnnn",
        "teises" => 5
    ),

);
}

if (isset($_GET["vardas"]) && !empty($_GET["vardas"]) && isset($_GET["slaptazodis"]) && !empty($_GET["slaptazodis"])) {

$vardas = $_GET["vardas"];
$slaptazodis = $_GET["slaptazodis"];




foreach ($registruotiVartotojai as $elementas) {
    $teisingasDuomuo = false;
    $laikinasis_vardas = "";
    $laikinasis_teises = "";

    if ($vardas == $elementas["vardas"] && $slaptazodis == $elementas["slaptazodis"]) {
        $teisingasDuomuo = true;
        $laikinasis_vardas = $elementas["vardas"];
        $laikinasis_teises = $elementas["teises"];
        break;
    }
}

if ($teisingasDuomuo) {
    echo "Sveikas atvykes, " . $laikinasis_vardas . " " . $laikinasis_teises;
    setcookie("prisijungti", $laikinasis_vardas, time() + 3600 * 24, "/");
    setcookie("teises", $laikinasis_teises, time() + 3600 * 24, "/");
    header("Location: login.php");
} else {
    echo "Bandykite jungtis is naujo";
}
} 

?>
<?php 

if(isset($_COOKIE['prisijungti']) && isset($_COOKIE['teises'])){
    echo "Sveikas atvykes, ". $_COOKIE['prisijungti'];
    echo '<form action="login.php" method="get">';
    echo '<button type="submit" name="atsijungti">Atsijungti</button>
</form>';


if(isset($_GET["atsijungti"])) {

    //Cookies istrynimas ir tada sugrizimas atgal i index.php

    setcookie("prisijungti", "", time() - 3600 * 24, "/");
    setcookie("teises", "", time() - 3600 * 24, "/");
    header('Location: login.php');

}

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <style>
        html {
            font-size: 18px;
            height: 100%;
        }

        body {
            margin: 0 auto;
            min-height: 100%;
            max-width: 1920px;
            background-color: #657AD3;
            font: normal normal normal 1rem/1.1667rem Gill Sans MT;
        }

        .container {
            width: 42.05%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .left-column, .right-column {
            float:left;
            height: 20.125rem;
        }

        .left-column {
            background-color: transparent;
            width: 40%;

        }

        .right-column {
            width: 60%;
            background-color: #fff;
        }

        .left-column-container {
            margin-top: 1.6667rem;
            height: 16.375rem;
            background-color: #fff;
            background: transparent url('img/mountain.png') 0% 0% no-repeat padding-box;
            background-size: cover;
            padding-left: 2.2222rem;
            position: relative;
            
        }

        h1 {
            font: normal normal normal 1.7778rem/2.0556rem Gill Sans MT;
            color: #FFFFFF;
            margin: 0;
            padding-top: 32px;
        }  


        .links {
            position: absolute;
            bottom: 1.3889rem;
        }

        .links a, .links p {
            display: inline-block;
            color: #FFFFFF;
            font: normal normal normal 0.8889rem/1.0556rem Gill Sans MT;
        }

        .links a:hover {
            color:#808080;
        }

        .links p {
            margin: 0;
        }

        .right-column-container {
            padding-left: 3.3333rem;
            padding-top: 3.75rem;
            padding-right: 3.3333rem;
        }

        input {
            display: block;
            width: 100%;
            border: 0;
            border-bottom: 1px solid #808080;
            padding-bottom: 0.3333rem;
            padding-left: 0;
        }

        input:focus {
            border: 0;
            outline: none;
            border-bottom: 1px solid #808080;
        }
        /* klase input */

        .input {
            margin-bottom: 1.8889rem;
        }

        label {
            display: block;
            font: normal normal normal 0.7222rem/0.8333rem Gill Sans MT;
            text-transform: uppercase;
            color: #000000;
            padding-bottom: 0.6667rem;
        }

        ::-webkit-input-placeholder {
            font: normal normal normal 1rem/1.1667rem Gill Sans MT;
            color: #A9A9A9;

        }

        .close {
            font: normal normal normal 1.6667rem/1.9444rem Gill Sans MT;
            color:#000000;
            position: absolute;
            top: 0.7778rem;
            right: 1.2778rem;
        }

        .close:hover {
            cursor: pointer;
            color:#808080;
        }

        .right-column-bottom-action button, .right-column-bottom-action p, .right-column-bottom-action a {
            display:inline-block;
        }

        .right-column-bottom-action p {
            padding-left: 0.7778rem;
            margin: 0;
            font: normal normal normal 1rem/1.1667rem Gill Sans MT;
        }

        .right-column-bottom-action a {
            padding-left: 1.3333rem;
            font: normal normal normal 1rem/1.1667rem Gill Sans MT;
            color:#00008B;
        }

        .right-column-bottom-action a:hover {
            color:#808080;
        }

        .btn {
            font: normal normal normal 1rem/1.1667rem Gill Sans MT;
            color: #FFFFFF;
            background-color: #FFC0CB;
            border: none;
            padding-left: 2.2222rem;
            padding-top: 0.5556rem;
            padding-right: 2.2222rem;
            padding-bottom: 0.5556rem;
            border-radius: 20px;
            box-shadow: 0 4px 8px darkgrey; 

        }

        .btn:hover {
            cursor: pointer;
            box-shadow: 0 4px 8px grey;
        }

        @media screen and (max-width:1590px) {
            .container {
                width: 57.05%;
            }
        } 

        @media screen and (max-width:1160px) {
            .right-column-bottom-action button, 
            .right-column-bottom-action p, 
            .right-column-bottom-action a {
                display:block;
                padding-top: 0.6111rem;
            }

            .right-column-bottom-action a, .right-column-bottom-action p {
                padding-left: 0;
                text-align: center;
            }

            .right-column-bottom-action button {
                width: 100%;
            }
        } 

        @media screen and (max-width:833px) {
            .right-column, .left-column {
                width: 100%;
                height: auto;
            }

            .left-column-container {
                height: auto;
            }

            .links {
                position:static;
                bottom: 0;
                padding-bottom: 1rem;
            }

            .right-column-container {
                position: relative;
            }
        }

        @media screen and (max-width:500px) {
        

        html {
            font-size: 16px;
        }

        .container {
            width: 100%;
        }
        
        }

        

    </style>

</head>
<body>

    <div class="container">
    
        <div class="left-column">
            <div class="left-column-container">
                <h1>Login</h1>

                <div class="links">
                    <a href="#">Privacy policy</a>
                    <p>&</p>
                    <a href="#">terms of service</a>
                </div>
            </div>
        </div>
        <div class="right-column">
            <div class="right-column-container">
                <span class="close">x</span>
                <?php if (!isset($_COOKIE["prisijungti"])) { ?>
                <form action="login.php" method="get">
                    <div class="input">
                    <label for="username">Username</label>
                    <input placeholder="Enter your user name" type="text" id="username" name="vardas" />
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input placeholder="Enter your password" type="password" id="password" name="slaptazodis" />
                </div>

                <div class="right-column-bottom-action">
                    <button class="btn" type="submit" name="prisijungti">Log in</button>
                    </form>
                    <p>or</p>
                    <a href="#">Forgot password</a>
                </div>
                
                <?php } else ?>
            </div>
        </div>
    </div>
   

</body>
</html>