<?php
require("nav.php");
require("funk.php");
global $yhendus;
 require_once("konf.php");
if (isset($_REQUEST['sisestusnupp'])) {
    sisestusnupp($_REQUEST['eesnimi'], $_REQUEST['perekonnanimi']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
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