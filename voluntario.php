<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['emailVol']) || !isset($_SESSION['senhaVol'])) {
    header('Location: index.php');
    exit();
} else {
    $logado = $_SESSION['emailVol'];
}

$sql = "SELECT * FROM voluntariocad WHERE emailVol='$logado'";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    $user_data = mysqli_fetch_assoc($result);
    $userImage = !empty($user_data['userImage']) ? $user_data['userImage'] : 'default.png';
    $mensagem = '<div class="msg sucess">Dados do usuário atualizados com sucesso!</div>';

} else {
    $mensagem = '<div class="msg error">Erro ao recuperar os dados do usuário.</div>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ong-admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <title>Voluntário | Perfil</title>
    <style>
             .msg {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;
        }
        .msg.success { background-color: #d4edda; color: #155724; }
        .msg.error { background-color: #f8d7da; color: #721c24; }
        .msg.warning { background-color: #fff3cd; color: #856404; }
    </style>
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
                <a href="minhas-ongs.php">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Vagas</h3>
                </a>
                <a href="cadastrado-ongs.php">
                <span class="material-symbols-outlined">diversity_1</span>
                    <h3>Minhas Ongs</h3>
                </a>
                <a href="voluntario.php" class="active">
                    <span class="material-symbols-outlined">account_box</span>
                    <h3>Meu perfil</h3>
                </a>
                <a href="senha.php">
                    <span class="material-symbols-outlined">settings</span>
                    <h3>Alterar Senha</h3>
                </a>
                <a href="logout.php">
                    <span class="material-symbols-outlined">move_item</span>
                    <h3>Sair</h3>
                </a>
            </div>
        </aside>
        <main>
            <div class="recent_order">
            
                <h1>Perfil Voluntário</h1>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Imagem</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Cep</th>
                                <th scope="col">Número</th>
                                <th scope="col">Nasc.</th>
                                <th scope="col">Sobre mim</th>
                                <th scope="col">...</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <style>
                                tbody td img {
                                    width: 100px;
                                }
                            </style>
                            <?php
                                if ($user_data) {
                                    $dataNasc = new DateTime($user_data['dataNasc']);
                                    $dataNascFormatada = $dataNasc->format('d/m/Y');

                                    echo "<tr>";
                                    echo "<td><img src='uploads-vol/{$userImage}' alt='Imagem do voluntário'></td>";
                                    echo "<td>{$user_data['nomeVol']}</td>";
                                    echo "<td>{$logado}</td>";
                                    echo "<td>{$user_data['celular']}</td>";
                                    echo "<td>{$user_data['cep']}</td>";
                                    echo "<td>{$user_data['numero']}</td>";
                                    echo "<td>{$dataNascFormatada}</td>";
                                    echo "<td>{$user_data['descricao']}</td>";
                                    echo "<td>
                                        <a href='editar-volunt.php?idvolunt={$user_data['idvolunt']}'>
                                        <span class='material-symbols-outlined'>edit</span>
                                        </a>
                                    </td>";
                                    echo "</tr>";
                                } else {
                                    echo "<tr><td colspan='9'>Nenhum dado encontrado</td></tr>";
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
                        <p><b><?php echo $logado; ?></b></p>
                        <p>Admin</p>
                        <div class="profile-photo">
                            <a href="voluntario.php">
                                <img height="100%" width="100%" src="uploads-vol/<?php echo $userImage; ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/ong-admin.js"></script>
        </div>
