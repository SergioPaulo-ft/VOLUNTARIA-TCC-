<?php
include_once('conexao.php');

if (!empty($_GET['idong'])) {
    $idong = $_GET['idong']; // Obtém o ID da ONG

    // Consulta para verificar se a ONG existe antes de excluí-la
    $sqlSelect = "SELECT * FROM ongcad WHERE idong=$idong";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        // Exclui a ONG se ela existir
        $sqlDelete = "DELETE FROM ongcad WHERE idong=$idong";
        $resultDelete = $conexao->query($sqlDelete);
    }
}

// Redireciona de volta para a página anterior após a exclusão
header('Location: admGeral.php');
?>
