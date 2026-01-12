<?php
require("nav.php");
global $yhendus;
 require_once("konf.php");

require("funk.php");

 if(!empty($_REQUEST["korr"])){
     korr($_REQUEST['korr']);
     header("Location: " . $_SERVER['PHP_SELF']);
     exit;
 }
 if(!empty($_REQUEST["viga"])){
     viga($_REQUEST['viga']);
     header("Location: " . $_SERVER['PHP_SELF']);
     exit;
 }

 $kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE slaalom=1 AND ringtee=1 AND t2nav=-1");  $kask->bind_result($id, $eesnimi, $perekonnanimi);
 $kask->execute();

 ?>

<!doctype html>
<html>
 <head>

     <link rel="stylesheet" href="style.css">
 <title>Tänavasõit</title>
 </head>
 <body>
 <h1>Tänavasõit</h1>
 <table>
     <tr>
         <td>Eesnimi</td>
         <td>Perekonnanimi</td>
         <td>Status</td>
     </tr>
 <?php
 while($kask->fetch()){
 echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td> 
 <a href='?korr=$id'>Korras</a> 
 <a href='?viga=$id'>Ebaõnnestunud</a> 
 </td> 
</tr>
 ";
}
 ?>
</table>
 </body>
</html>