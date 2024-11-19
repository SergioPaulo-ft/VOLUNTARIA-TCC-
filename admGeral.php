<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['emailAdm']) || !isset($_SESSION['senhaAdm'])) {
    unset($_SESSION['emailAdm']);
    unset($_SESSION['senhaAdm']);
    header('Location: index.php');
    exit();
} else {
    $logado = $_SESSION['emailAdm'];
}

if (isset($_POST['submit'])) {
    $nomeOng = isset($_POST['nomeOng']) ? $_POST['nomeOng'] : '';
    $emailOng = isset($_POST['emailOng']) ? $_POST['emailOng'] : '';
    $senhaOng = isset($_POST['senhaOng']) ? $_POST['senhaOng'] : '';

    if (!empty($nomeOng) && !empty($emailOng) && !empty($senhaOng)) {
        $sql = "INSERT INTO ongcad (nomeOng, emailOng, senhaOng) VALUES ('$nomeOng', '$emailOng', '$senhaOng')";
        $result = mysqli_query($conexao, $sql);

        if ($result) {
            $mensagem = '<div class="msg success">ONG adicionada com sucesso!</div>';
        } else {
            $mensagem = '<div class="msg error">Erro ao adicionar ONG.</div>';
        }
    } else {
        $mensagem = '<div class="msg success">Por favor, preencha todos os campos.</div>';
    }
}

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM ongcad WHERE idong LIKE '%$data%' OR nomeOng LIKE '%$data%' ORDER BY idong DESC";
} else {
    $sql = "SELECT * FROM ongcad ORDER BY idong DESC";
}

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
    <title>ONG | Admin</title>
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
                <a href="admGeral.php" class="active">
                    <span class="material-symbols-outlined">workspaces</span>
                    <h3>ONGs</h3>
                </a>
                <a href="admVolunt.php">
                    <span class="material-symbols-outlined">workspaces</span>
                    <h3>Voluntários</h3>
                </a>
                <a href="senhaAdm.php">
                    <span class="material-symbols-outlined">lock_open</span>
                    <h3>Alterar Senha</h3>
                </a>
                <a href="not.php">
                    <span class="material-symbols-outlined">mark_email_unread</span>
                    <h3>Notificações</h3>
                </a>
                <a href="logout.php">
                    <span class="material-symbols-outlined">move_item</span>
                    <h3>Sair</h3>
                </a>
            </div>
        </aside>

        <div >
            <main>
                <div class="box-search">
                    <input type="search" class="form-control w-25" placeholder="Pesquisar ONGs" id="pesquisar">
                    <button onclick="searchData()">
                        <span class="material-symbols-outlined">search</span>
                    </button>
                </div>
                <div class="recent_order">
                    <h1>ONGs</h1>
                    <form action="admGeral.php" class="addVaga" method="post">
                        <label for="nomeOng">Nome</label>
                        <input type="text" name="nomeOng" id="nomeOng" class="box" placeholder="Nome" required>

                        <label for="emailOng">Email</label>
                        <input type="email" name="emailOng" id="emailOng" class="box" placeholder="Email" required>

                        <label for="senhaOng">Senha</label>
                        <input type="password" name="senhaOng" id="senhaOng" class="box" placeholder="Senha" required>

                        <input type="submit" class="btn" id="submit" name="submit" value="Adicionar ONG">
                        <?php if (isset($mensagem)) : ?>
                        <p><?php echo $mensagem; ?></p>
                    <?php endif; ?>
                    </form>

                    <div>
                        <table class="table" id="tabela-ongadmin">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Senha</th>
                                    <th scope="col">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($user_data = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$user_data['idong']."</td>";
                                    echo "<td>".$user_data['nomeOng']."</td>";
                                    echo "<td>".$user_data['emailOng']."</td>";
                                    echo "<td>".$user_data['senhaOng']."</td>";
                                    echo "<td>
                                        <a href='editar-ong.php?idong=".$user_data['idong']."'>
                                            <span class='material-symbols-outlined'>edit</span>
                                        </a>
                                        <a href='delete-ong.php?idong=".$user_data['idong']."'>
                                            <span class='material-symbols-outlined'>delete</span>
                                        </a>
                                    </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

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
                        <p><b>Admin<b></p>
                        <p>Geral</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <script>
        var search = document.getElementById('pesquisar');
        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        function searchData() {
            window.location = 'admGeral.php?search=' + search.value;
        }
    </script>
    <script src="js/ong-admin.js"></script>
</body>
</html>
