<?php 

// header("Location: index.php");

//Susikuti forma, kurioje yra tik mygtukas
//Paspaudus ta mygtuka, yra istrinami sausianiukai prisijungti ir teises
//Nukreipimas i pradini langa

if(isset($_COOKIE['prisijungti']) && isset($_COOKIE['teises'])){
    echo "Sveikas atvykes, ". $_COOKIE['prisijungti'];
    echo '<form action="manopaskyra.php" method="get">';
    echo '<button type="submit" name="atsijungti">Atsijungti</button>
</form>';


if(isset($_GET["atsijungti"])) {

    //Cookies istrynimas ir tada sugrizimas atgal i index.php

    setcookie("prisijungti", "", time() - 3600 * 24, "/");
    setcookie("teises", "", time() - 3600 * 24, "/");
    header('Location: login.php');

}


} else {
    header('Location: login.php');
}







?>