<?php
require("nav.php");
require("funk.php");
global $yhendus;
 require_once("konf.php");



if (!empty($_REQUEST["teooriatulemus"])) {

    $teooriatulemus = $_REQUEST['teooriatulemus'];
    $id = $_REQUEST['id'];
    teooriatulemus($id, $teooriatulemus);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


 $kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi 
FROM jalgrattaeksam WHERE teooriatulemus=-1");
 $kask->bind_result($id, $eesnimi, $perekonnanimi);
 $kask->execute();
?>
<!doctype html>
<html>
 <head>

     <link rel="stylesheet" href="style.css">
 <title>Teooriaeksam</title>
 </head>
 <body>
 <h1>Teooriaeksam</h1>
 <table>
     <tr>
         <td>Eesnimi</td>
         <td>Perekonnanimi</td>
         <td>Teooriatulemus</td>
     </tr>
 <?php
 while($kask->fetch()){
 echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td><form action=''> 
 <input type='hidden' name='id' value='$id' /> 
 <input type='text' name='teooriatulemus' />
 <input type='submit' value='Sisesta tulemus' /> 
 </form> 
 </td> 
</tr> 
 ";
}
 ?>
</table>
 </body>
</html>