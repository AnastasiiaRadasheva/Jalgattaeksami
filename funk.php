<?php
require_once("konf.php");
function teooriatulemus()
{
    global $yhendus;
        $kask=$yhendus->prepare(
            "INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
        $kask->bind_param("ss", $_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"]); $kask->execute();
        $yhendus->close();
        exit();
}

function kusututaPresident($id)
{
    global $yhendus;
    $paring = $yhendus->prepare(
        "Delete from jalgrattaeksam where id=?"
    );
    $paring->bind_param("i", $id);
    $paring->execute();
}
