<?php
session_start();
include_once('conexao.php');

if (isset($_POST['update'])) {
    $idvolunt = $_POST['idvolunt'];
    $nomeVol = $_POST['nomeVol'];
    $celular = $_POST['celular'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $dataNasc = $_POST['dataNasc'];
    $descricao = $_POST['descricao'];

    // Função para upload da imagem
    function uploadImage($caminho, $idvolunt) {
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
                $novoNome = $idvolunt . '.' . $extensao;
                if (move_uploaded_file($nomeTemporario, $caminho . $novoNome)) {
                    return $novoNome;
                } else {
                    return FALSE;
                }
            }
        }
        return FALSE;
    }

    $imagem = uploadImage("uploads-vol/", $idvolunt);

    if ($imagem) {
        $sqlUpdate = "UPDATE voluntariocad SET nomeVol='$nomeVol', celular='$celular', cep='$cep', numero='$numero', dataNasc='$dataNasc', descricao='$descricao', userImage='$imagem' WHERE idvolunt=$idvolunt";
    } else {
        $sqlUpdate = "UPDATE voluntariocad SET nomeVol='$nomeVol', celular='$celular', cep='$cep', numero='$numero', dataNasc='$dataNasc', descricao='$descricao' WHERE idvolunt=$idvolunt";
    }

    if ($conexao->query($sqlUpdate) === TRUE) {
        header('Location: voluntario.php');
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}
?>
