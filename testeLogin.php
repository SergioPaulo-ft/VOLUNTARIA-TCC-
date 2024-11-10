<?php
session_start();
include_once('conexao.php');

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $remember = isset($_POST['remember']) ? $_POST['remember'] : '';

    // Verifica login para ONG
    $sqlOng = "SELECT * FROM ongcad WHERE emailOng='$email' AND senhaOng='$senha'";
    $resultOng = $conexao->query($sqlOng);

    if ($resultOng && mysqli_num_rows($resultOng) > 0) {
        $_SESSION['emailOng'] = $email;
        $_SESSION['senhaOng'] = $senha;

        if ($remember) {
            setcookie('email', $email, time() + (86400 * 30), "/"); // Cookie expira em 30 dias
            setcookie('senha', $senha, time() + (86400 * 30), "/"); // Cookie expira em 30 dias
        } else {
            setcookie('email', '', time() - 3600, "/"); // Apaga o cookie
            setcookie('senha', '', time() - 3600, "/"); // Apaga o cookie
        }

        header('Location: ong-admin.php');
        exit();
    }

    // Verifica login para Voluntário
    $sqlVol = "SELECT * FROM voluntariocad WHERE emailVol='$email' AND senhaVol='$senha'";
    $resultVol = $conexao->query($sqlVol);

    if ($resultVol && mysqli_num_rows($resultVol) > 0) {
        $_SESSION['emailVol'] = $email;
        $_SESSION['senhaVol'] = $senha;

        if ($remember) {
            setcookie('email', $email, time() + (86400 * 30), "/");
            setcookie('senha', $senha, time() + (86400 * 30), "/");
        } else {
            setcookie('email', '', time() - 3600, "/");
            setcookie('senha', '', time() - 3600, "/");
        }

        header('Location: minhas-ongs.php');
        exit();
    }

    // Verifica login para Administrador
    $sqlAdm = "SELECT * FROM Adm WHERE emailAdm='$email' AND senhaAdm='$senha'";
    $resultAdm = $conexao->query($sqlAdm);

    if ($resultAdm && mysqli_num_rows($resultAdm) > 0) {
        $_SESSION['emailAdm'] = $email;
        $_SESSION['senhaAdm'] = $senha;

        if ($remember) {
            setcookie('email', $email, time() + (86400 * 30), "/");
            setcookie('senha', $senha, time() + (86400 * 30), "/");
        } else {
            setcookie('email', '', time() - 3600, "/");
            setcookie('senha', '', time() - 3600, "/");
        }

        header('Location: admGeral.php');
        exit();
    }

    // Caso nenhum login seja bem-sucedido, redireciona de volta para index.php com uma mensagem de erro
    header('Location: index.php?login=failed');
    exit();
} else {
    // Caso o formulário não tenha sido submetido corretamente, redireciona de volta para index.php
    header('Location: index.php');
    exit();
}
?>
