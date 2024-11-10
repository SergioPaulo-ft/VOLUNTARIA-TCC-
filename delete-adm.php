<?php
include_once('conexao.php');
if (!empty($_GET['id'])) {
    $idvolunt = $_GET['id']; // Corrigido para usar 'id' em vez de 'idvolunt'

    // Consulta para verificar se o voluntário existe antes de excluí-lo
    $sqlSelect = "SELECT * FROM voluntariocad WHERE idvolunt=$idvolunt";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        // Exclui o voluntário se ele existir
        $sqlDelete = "DELETE FROM voluntariocad WHERE idvolunt=$idvolunt";
        $resultDelete = $conexao->query($sqlDelete);
    }
}

// Redireciona de volta para a página anterior após a exclusão
header('Location: admVolunt.php');
?>
