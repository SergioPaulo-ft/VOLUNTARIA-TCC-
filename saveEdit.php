<?php
    include_once('conexao.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nomeVaga = $_POST['nomeVaga'];
        $descricao = $_POST['descricao'];
        $horario = $_POST['horario'];
        $localizacao = $_POST['localizacao'];
        
        $sqlUpdate = "UPDATE vagas SET nomeVaga='$nomeVaga',descricao='$descricao',horario='$horario',localizacao='$localizacao' 
        WHERE id='$id'";
        $result = $conexao->query($sqlUpdate);

    }
    header('Location: ong-admin.php');

?>