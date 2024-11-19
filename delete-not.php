

<?php
include_once('conexao.php');

if (!empty($_GET['nome'])) {
    $nome = $_GET['nome'];
    
    // Prepara a consulta usando prepared statement
    $sqlDelete = "DELETE FROM mensagens WHERE nome = ?";
    $stmt = $conexao->prepare($sqlDelete);
    $stmt->bind_param("s", $nome); // "s" indica que $nome é uma string
    $stmt->execute();

    // Verifica se a exclusão foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        echo "Mensagem excluída com sucesso.";
    } else {
        echo "Erro ao excluir a mensagem.";
    }

    $stmt->close();
}

header('Location: not.php');
?>