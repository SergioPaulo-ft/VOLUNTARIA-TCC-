<?php
session_start();
include_once('conexao.php');

$sql = "SELECT * FROM mensagens";

if(!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql .= " WHERE nome LIKE '%$data%' OR email LIKE '%$data%' OR mensagem LIKE '%$data%' OR data_ LIKE '%$data%'";
}

$sql .= " ORDER BY id DESC";

$result = $conexao->query($sql);

if (!isset($_SESSION['emailAdm']) || !isset($_SESSION['senhaAdm'])) {
    unset($_SESSION['emailAdm']);
    unset($_SESSION['senhaAdm']);
    header('Location: index.php');
    exit();
} else {
    $logado = $_SESSION['emailAdm'];
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
    <title>Admin | Notificações</title>
    <style>
h1 {
    margin-bottom: 50px;
}

.message-card {
    background-color: var(--clr-white);
    border-left: 2px solid var(--clr-verde-agua);
    border-radius: 5px;
    margin-bottom: 20px;
    box-shadow: var(--box-shadow);
    padding: 15px;
    display: flex;
    flex-direction: column;
    width: 100%;
    box-sizing: border-box;
}

.message-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.message-header a {
    color: var(--clr-verde-agua);
}

.message-header a:hover {
    color: #348c92;
}

.message-sender {
    font-weight: bold;
    text-transform: capitalize;
    color: var(--clr-dark);
}

.message-meta {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.message-email {
    font-size: 12px;
    color: var(--clr-dark);
}

.message-body {
    padding: 8px 0;
}

.message-body p {
    margin: 0;
    text-transform: capitalize;
    color: var(--clr-dark-variant);
    word-break: break-word; /* Adiciona esta linha para quebra de palavras longas */
}

.message-date {
    font-size: 12px;
    color: var(--clr-dark-variant);
}

.message-time {
    font-size: 10px;
    color: var(--clr-dark-variant);
}

.no-messages {
    font-style: italic;
    color: #888;
}

.messages-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 100%;
}
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
                <a href="admGeral.php">
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
                <a href="not.php" class="active">
                    <span class="material-symbols-outlined">mark_email_unread</span>
                    <h3>Notificações</h3>
                </a>
                <a href="logout.php">
                    <span class="material-symbols-outlined">move_item</span>
                    <h3>Sair</h3>
                </a>
            </div>
        </aside>

        <main>
            <div class="box-search">
                <input type="search" class="form-control w-25" placeholder="Pesquisar Notificações" id="pesquisar">
                <button onclick="searchData()">
                    <span class="material-symbols-outlined">search</span>
                </button>
            </div>
            <div class="recent_order">
                <h1>Notificações</h1>
                <div class="messages-container">
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='message-card'>";
                            echo "<div class='message-header'>";
                            echo "<span class='message-sender'>" . $row['nome'] . "</span>";
                            echo "<span class='message-email'>" . $row['email'] . "</span>";
                           
                            $timestamp = strtotime($row['data_']);
                            $hora_formatada = date('H:i', $timestamp);
                            $data_formatada = date('d/m/Y', $timestamp);
                            echo "<a href='delete-not.php?nome=$row[nome]'>
                            <span class='material-symbols-outlined'>
                            delete
                            </span>
                            </a>";
                            echo "</div>";
                            echo "<div class='message-body'>";
                            echo "<p>" . $row['mensagem'] . "</p>";
                            echo "</div>";
                            echo "<div class='message-meta'>";
                            echo "<span class='message-date'>" . $data_formatada . "</span>";
                            echo "<span class='message-time'>" . $hora_formatada . "</span>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='no-messages'>Nenhuma mensagem encontrada.</p>";
                    }
                    ?>
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
                        <p><b>Admin<b></p>
                        <p>Geral</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    var searchInput = document.getElementById('pesquisar');
    var searchButton = document.querySelector('button');

    searchButton.addEventListener("click", searchData);

    searchInput.addEventListener("keydown", function(event) {
        if(event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        var searchString = document.getElementById('pesquisar').value;
        window.location.href = 'not.php?search=' + searchString;
    }
    </script>
    
    <script src="js/ong-admin.js"></script>
</body>
</html>
