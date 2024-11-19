<?php
session_start();
include_once('conexao.php');

if (isset($_POST['update'])) {
    $idong = $_POST['idong'];
    $nomeOng = $_POST['nomeOng'];
    $emailOng = $_POST['emailOng'];
    $senhaOng = $_POST['senhaOng'];

    $sqlUpdate = "UPDATE ongcad SET nomeOng='$nomeOng', emailOng='$emailOng', senhaOng='$senhaOng' WHERE idong=$idong";

    if ($conexao->query($sqlUpdate) === TRUE) {
        header('Location: admGeral.php');
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}
?>
