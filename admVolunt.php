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

// Consulta para obter todos os voluntários cadastrados
$sqlVoluntarios = "SELECT * FROM voluntariocad";
$resultVoluntarios = $conexao->query($sqlVoluntarios);

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
    
</head>
<body>
    <!-- Estrutura HTML do conteúdo -->
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
                <a href="admGeral.php">
                    <span class="material-symbols-outlined">workspaces</span>
                    <h3>ONGs</h3>
                </a>
                <a href="admVolunt.php" class="active">
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
                <!-- Parte do código omitida para simplificação -->
                <div class="recent_order">
                    <h1>Voluntários</h1>
                    
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
                                while ($voluntario = mysqli_fetch_assoc($resultVoluntarios)) {
                                    echo "<tr>";
                                    echo "<td>".$voluntario['idvolunt']."</td>";
                                    echo "<td>".$voluntario['nomeVol']."</td>";
                                    echo "<td>".$voluntario['emailVol']."</td>";
                                    echo "<td>".$voluntario['senhaVol']."</td>";
                                    echo "<td>
                                        <a href='editar-vol-adm.php?id=".$voluntario['idvolunt']."'>
                                            <span class='material-symbols-outlined'>edit</span>
                                        </a>
                                        <a href='delete-adm.php?id=".$voluntario['idvolunt']."'>
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
