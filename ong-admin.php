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
    } else {
        // Caso o usuário não seja encontrado, redireciona para o login
        header('Location: index.php');
        exit();
    }
}

// Inserir uma nova vaga associada à ONG logada
if (isset($_POST['submit'])) {
    $nomeVaga = $_POST['nomeVaga'];
    $descricao = $_POST['descricao'];
    $horario = $_POST['horario'];
    $localizacao = $_POST['localizacao'];

    $result = mysqli_query($conexao, "INSERT INTO vagas (nomeVaga, descricao, horario, localizacao, idong) VALUES ('$nomeVaga', '$descricao', '$horario', '$localizacao', '$userId')");
}

// Filtrar as vagas da ONG logada
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM vagas WHERE (id LIKE '%$data%' OR nomeVaga LIKE '%$data%') AND idong='$userId' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM vagas WHERE idong='$userId' ORDER BY id DESC";
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
                <a href="ong-admin.php" class="active">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Vagas</h3>
                </a>
                <a href="ong-admin-conta.php">
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
            <div class="box-search">
                <input type="search" class="form-control w-25" placeholder="Pesquisar Vagas" id="pesquisar">
                <button onclick="searchData()">
                <span class="material-symbols-outlined">search</span>
                </button>
            </div>
            <div class="recent_order">
                <h1>Vagas</h1>
                <form action="ong-admin.php" class="addVaga" id="addVaga" method="post">
                    <label for="nomeVaga">Nome da vaga</label>
                    <input type="text" name="nomeVaga" id="nomeVaga" class="box" placeholder="Nome da Vaga" required>
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" class="box" placeholder="Descrição" required>
                    <label for="horario">Horário</label>
                    <input type="time" name="horario" id="horario" class="box">
                    <label for="local">Local</label>
                    <input type="text" name="localizacao" id="localizacao" class="box" placeholder="Localização" required>
                    <input type="submit" class="btn" id="submit" name="submit" value="Adicionar vaga">
                </form>
                <div>
                    <table class="table" id="tabela-ongadmin">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome da Vaga</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Horário</th>
                                <th scope="col">Localização</th>
                                <th scope="col">Inscritos</th>
                                <th scope="col">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($user_data = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$user_data['id']."</td>";
                                echo "<td>".$user_data['nomeVaga']."</td>";
                                echo "<td>".$user_data['descricao']."</td>";
                                echo "<td>".$user_data['horario']."</td>";
                                echo "<td>".$user_data['localizacao']."</td>";
                                echo "<td>".$user_data['inscritos']."</td>";
                                echo "<td>
                                <a href='editar.php?id=$user_data[id]'>
                                <span class='material-symbols-outlined'>edit</span>
                              </a>
                              <a href='visualizar-inscritos.php?id=$user_data[id]'>
                              <span class='material-symbols-outlined'>group</span>
                            </a>
                              <a href='delete.php?id=$user_data[id]'>
                              <span class='material-symbols-outlined'>delete</span>
                              </a>
                                </td>";
                            }
                            ?>
                        </tbody>
                    </table>
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
                        <?php
                        echo "<p><b>$logado</b></p>";
                        ?>
                        <p>Admin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var search = document.getElementById('pesquisar');
        search.addEventListener("keydown", function(event){
            if(event.key === "Enter")
            {
                searchData();
            }
        });
        function searchData(){
            window.location = 'ong-admin.php?search='+search.value;
        }
    </script>
    <script src="js/ong-admin.js"></script>
</body>
</html>
