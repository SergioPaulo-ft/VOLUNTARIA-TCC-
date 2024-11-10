<?php
session_start();
include_once('conexao.php');

if (isset($_POST['update'])) {
    $idvolunt = $_POST['idvolunt'];
    $nomeVol = $_POST['nomeVol'];
    $emailVol = $_POST['emailVol'];
    

    $sqlUpdate = "UPDATE voluntariocad SET nomeVol='$nomeVol', emailVol='$emailVol' WHERE idvolunt=$idvolunt";

    if ($conexao->query($sqlUpdate) === TRUE) {
        header('Location: admVolunt.php');
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}
