<?php
require("nav.php");
require("funk.php");
global $yhendus;
require_once("konf.php");

if (isset($_REQUEST['korras_id'])) {
    korras_id($_REQUEST['korras_id']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_REQUEST['vigane_id'])) {
    vigane_id($_REQUEST['korras_id']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi,teooriatulemus   FROM jalgrattaeksam WHERE teooriatulemus>=9 AND slaalom=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus);
$kask->execute();
?>
<!doctype html>
<html>
<head>

    <link rel="stylesheet" href="style.css">
    <title>Slaalom</title>
</head>
<body>
<h1>Slaalom</h1>
<table>
    <tr>
        <td>Eesnimi</td>
        <td>Perekonnanimi</td>
        <td>Teooriatulemus</td>
        <td>Status</td>
    </tr>
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td>$teooriatulemus</td>
 <td> 
 <a href='?korras_id=$id'>Korras</a>
 <a href='?vigane_id=$id'>Ebaõnnestunud</a> 
 </td> 
</tr> 
 ";
    }
    ?>
</table>
</body>
</html>