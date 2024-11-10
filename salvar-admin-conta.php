<?php
session_start();
include_once('conexao.php');

if(isset($_POST['update']))
{
    $idong = $_POST['idong'];
    $nomeOng = $_POST['nomeOng'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $descricao = $_POST['descricao'];

    function uploadImage($caminho, $idong) {
        if (!empty($_FILES['imagem']['name'])) {
            $nomeArquivo = $_FILES['imagem']['name'];
            $tipo = $_FILES['imagem']['type'];
            $nomeTemporario = $_FILES['imagem']['tmp_name'];
            $tamanho = $_FILES['imagem']['size'];
            $erros = array();

            $tamanhoMaximo = 1024 * 1024 * 5; // 5MB
            if ($tamanho > $tamanhoMaximo) {
                $erros[] = "Seu arquivo excede o tamanho máximo.<br>";
            }

            $arquivosPermitidos = ["png", "jpg", "jpeg"];
            $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

            if (!in_array($extensao, $arquivosPermitidos)) {
                $erros[] = "Arquivo não permitido.<br>";
            }

            $typesPermitidos = ["image/png", "image/jpg", "image/jpeg"];
            if (!in_array($tipo, $typesPermitidos)) {
                $erros[] = "Tipo de arquivo não permitido.<br>";
            }

            if (!empty($erros)) {
                foreach ($erros as $erro) {
                    echo $erro;
                }
                return FALSE;
            } else {
                // Gera um nome único para a imagem
                $novoNome = $idong . '.' . $extensao;
                if (move_uploaded_file($nomeTemporario, $caminho . $novoNome)) {
                    return $novoNome;
                } else {
                    return FALSE;
                }
            }
        }
        return FALSE;
    }

    $imagem = uploadImage("ong/", $idong);

    if ($imagem) {
        $sqlUpdate = "UPDATE ongcad SET nomeOng='$nomeOng', telefone='$telefone', cep='$cep', numero='$numero', descricao='$descricao', userImage='$imagem' WHERE idong=$idong";
    } else {
        // Mantém o valor atual do campo userImage
        $sqlUpdate = "UPDATE ongcad SET nomeOng='$nomeOng', telefone='$telefone', cep='$cep', numero='$numero', descricao='$descricao' WHERE idong=$idong";
    }

    if ($conexao->query($sqlUpdate) === TRUE) {
        header('Location: ong-admin-conta.php');
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}

?>
