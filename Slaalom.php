<?php
require("nav.php");
global $yhendus;
require_once("konf.php");
if(!empty($_REQUEST["korras_id"])){
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET slaalom=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["korras_id"]);
    $kask->execute();
}
if(!empty($_REQUEST["vigane_id"])){
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET slaalom=2 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vigane_id"]);
    $kask->execute();
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