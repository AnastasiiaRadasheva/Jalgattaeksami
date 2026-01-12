<?php
require("nav.php");
global $yhendus;
require("funk.php");
require_once("konf.php");

if (isset($_REQUEST['tanavkorras'])) {
    tanavkorras($_REQUEST['tanavkorras']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_REQUEST['tanavviga'])) {
    tanavviga($_REQUEST['tanavviga']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi, teooriatulemus   FROM jalgrattaeksam WHERE teooriatulemus>=9 AND ringtee=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus);
$kask->execute();
?>
<!doctype html>
<html>
<head>

    <link rel="stylesheet" href="style.css">
    <title>Ringtee</title>
</head>
<body>
<h1>Ringtee</h1>
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
 <a href='?tanavkorras=$id'>Korras</a> 
 <a href='?tanavviga=$id'>Ebaõnnestunud</a> 
 </td> 
</tr> 
 ";
    }
    ?>
</table>
</body>
</html>