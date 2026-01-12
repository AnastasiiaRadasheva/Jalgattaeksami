<?php
require_once("konf.php");
function teooriatulemus($id, $teooriatulemus)
{
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
    $kask->bind_param("ii", $teooriatulemus, $id);
    $kask->execute();

}
function sisestusnupp($eesnimi, $perekonnanimi)
{
    global $yhendus;

    if (strlen($eesnimi) == 0 || strlen($perekonnanimi) == 0)
    {
    } elseif (is_numeric($eesnimi) || is_numeric($perekonnanimi))
    {
    }
        $kask = $yhendus->prepare(
            "INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)"
        );
        $kask->bind_param("ss", $eesnimi, $perekonnanimi);
        $kask->execute();
        header("Location: Teooriaeksam.php");
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
function korras_id($id){
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET slaalom=1 WHERE id=?");
    $kask->bind_param("i", $id);
    $kask->execute();
}
function vigane_id($id){
    global $yhendus;
    if(!empty($_REQUEST["vigane_id"])){
        $kask=$yhendus->prepare(
            "UPDATE jalgrattaeksam SET slaalom=2 WHERE id=?");
        $kask->bind_param("i", $id);
        $kask->execute();
    }
}