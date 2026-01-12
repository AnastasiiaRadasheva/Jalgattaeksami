<?php
require("nav.php");
global $yhendus;
 require_once("konf.php");


if (isset($_REQUEST["sisestusnupp"])) {
    $eesnimi = $_REQUEST["eesnimi"];
    $perekonnanimi = $_REQUEST["perekonnanimi"];
    if (strlen($eesnimi) == 0 || strlen($perekonnanimi) == 0) {
        $teade = "Nimi ei tohi olla tühi!";
    } elseif (is_numeric($eesnimi) || is_numeric($perekonnanimi)) {
        $teade = "Nimi ei tohi olla numbriline!";
    } else {
        $kask = $yhendus->prepare(
            "INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)"
        );
        $kask->bind_param("ss", $eesnimi, $perekonnanimi);
        $kask->execute();
        header("Location: Teooriaeksam.php");
        exit();
    }
}
?>


<!doctype html>
<html>
 <head>

     <link rel="stylesheet" href="style.css">
 <title>Kasutaja registreerimine</title>
 </head>
 <body>
 <h1>Registreerimine</h1>
 <?php
 if(isSet($_REQUEST["lisatudeesnimi"])){
 echo "Lisati $_REQUEST[lisatudeesnimi]";
 }
 ?>
<form action="?">
 <dl>
 <dt>Eesnimi:</dt>
<dd><input type="text" name="eesnimi" /></dd>
 <dt>Perekonnanimi:</dt>
<dd><input type="text" name="perekonnanimi" /></dd>
 <dt><input type="submit" name="sisestusnupp" value="sisesta" /></dt>  </dl>
</form>
 </body>
</html>