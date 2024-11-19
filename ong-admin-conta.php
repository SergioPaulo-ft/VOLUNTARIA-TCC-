<?php
session_start();
include_once('conexao.php');

// Verificar se a ONG está logada
if (!isset($_SESSION['emailOng']) || !isset($_SESSION['senhaOng'])) {
    unset($_SESSION['emailOng']);
    unset($_SESSION['senhaOng']);
    header('Location: index.php');
    exit();
} else {
    $logado = $_SESSION['emailOng'];
    
    // Obter o ID do usuário logado
    $sqlUser = "SELECT idong, userImage FROM ongcad WHERE emailOng='$logado'";
    $resultUser = $conexao->query($sqlUser);
    if ($resultUser->num_rows > 0) {
        $userData = $resultUser->fetch_assoc();
        $userImage = $userData['userImage'];
        $userId = $userData['idong'];
        $mensagem = '<div class="msg sucess">Dados do usuário atualizados com sucesso!</div>';
    } else {
        // Caso o usuário não seja encontrado, redireciona para o login
        header('Location: index.php');
        exit();
    }
}

// Obter as informações da ONG logada
$sql = "SELECT * FROM ongcad WHERE idong='$userId'";
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ong-admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
    <title>ONG | Perfil</title>
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="imagens/logo.png" alt="" width="58px">
                </div>
                <div class="close" id="close_btn">
                    <span class="material-symbols-outlined">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="ong-admin.php">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Vagas</h3>
                </a>
                <a href="ong-admin-conta.php" class="active">
                    <span class="material-symbols-outlined">account_box</span>
                    <h3>Meu Perfil</h3>
                </a>
                <a href="config-senha.php">
                    <span class="material-symbols-outlined">settings</span>
                    <h3>Configurações</h3>
                </a>
                <a href="logout.php">
                    <span class="material-symbols-outlined">move_item</span>
                    <h3>Sair</h3>
                </a>
            </div>
        </aside>
        <main>
            <div class="recent_order">
                <h1>Perfil ONG</h1>
                <div>
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Foto de Perfil</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Cep</th>
                            <th scope="col">Número</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <style>
                            tbody td img {
                                width: 100px;
                            }
                            .msg.success { background-color: #d4edda; color: #155724; }
                            .msg.error { background-color: #f8d7da; color: #721c24; }
                            .msg.warning { background-color: #fff3cd; color: #856404; }
                        </style>
                        <?php
                        if ($user_data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><img src='ong/{$user_data['userImage']}' alt='Imagem do voluntário'></td>";
                            echo "<td>".$user_data['nomeOng']."</td>";
                            echo "<td>".$user_data['emailOng']."</td>";
                            echo "<td>".$user_data['telefone']."</td>";
                            echo "<td>".$user_data['cep']."</td>";
                            echo "<td>".$user_data['numero']."</td>";
                            echo "<td>".$user_data['descricao']."</td>";
                            echo "<td>
                            <a href='editar-conta.php?idong=$user_data[idong]'>
                                <span class='material-symbols-outlined'>edit</span>
                            </a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?php if (isset($mensagem)) : ?>
                    <p><?php echo $mensagem; ?></p>
                <?php endif; ?>
                </div>
            </div>
        </main>
        <div class="right">
            <div class="top">
                <button id="menu-bar">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <?php
                        echo "<p><b>$logado</b></p>";
                        ?>
                        <p>Admin</p>
                        <div class="profile-photo">
                            <a href="ong-admin-conta.php">
                                <?php
                                if ($userImage && file_exists("ong/$userImage")) {
                                    echo '<img src="ong/' . $userImage . '" alt="Imagem do Usuário" height="100%" width="100%">';
                                } else {
                                    echo '<img src="ong/default.png" alt="Imagem Padrão" height="100%" width="100%">';
                                }
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/ong-admin.js"></script>
</body>
</html>
