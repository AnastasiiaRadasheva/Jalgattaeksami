<?php
global $yhendus;
require_once("konf.php");
function registr($id)
{
        $kask=$yhendus->prepare(
            "INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
        $kask->bind_param("ss", $_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"]); $kask->execute();
        $yhendus->close();
        exit();
}

function kusututaPresident($id)
{
    global $connect;
    $paring = $connect->prepare(
        "Delete from valimused where id=?"
    );
    $paring->bind_param("i", $id);
    $paring->execute();
}
