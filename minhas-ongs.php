<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['emailVol']) || !isset($_SESSION['senhaVol'])) {
    unset($_SESSION['emailVol']);
    unset($_SESSION['senhaVol']);
    header('Location: index.php');
    exit();
} else {
    $logado = $_SESSION['emailVol'];

    // Obter o ID do usuário logado
   $sqlUser = "SELECT idvolunt, userImage FROM voluntariocad WHERE emailVol='$logado'";
    $resultUser = $conexao->query($sqlUser);
    if ($resultUser->num_rows > 0) {
        $userData = $resultUser->fetch_assoc();
        $userImage = $userData['userImage'];
        $userId = $userData['idvolunt'];
    } else {
        // Caso o usuário não seja encontrado, redireciona para o login
        header('Location: index.php');
        exit();
    }
}

// Verifica se houve submissão do formulário para inscrição
if (isset($_POST['inscrever'])) {
    $id = $_POST['id'];
    
    // Verificar se o voluntário já está inscrito na vaga
    $sqlCheck = "SELECT * FROM inscricoes WHERE idVoluntario='$userId' AND idVaga='$id'";
    $resultCheck = $conexao->query($sqlCheck);
    
    if ($resultCheck->num_rows == 0) {
        // Se o voluntário ainda não estiver inscrito, inscreva-o na vaga
        $querySelect = "SELECT inscritos FROM vagas WHERE id='$id'";
        $resultSelect = mysqli_query($conexao, $querySelect);
        if ($resultSelect && mysqli_num_rows($resultSelect) > 0) {
            $rowSelect = mysqli_fetch_assoc($resultSelect);
            $inscritos = $rowSelect['inscritos'] + 1;
            
            // Atualiza o número de inscritos
            $sqlUpdate = "UPDATE vagas SET inscritos='$inscritos' WHERE id='$id'";
            mysqli_query($conexao, $sqlUpdate);

            // Insere a inscrição na tabela de inscrições
            $sqlInsert = "INSERT INTO inscricoes (idVoluntario, idVaga) VALUES ('$userId', '$id')";
            mysqli_query($conexao, $sqlInsert);
        }
    }
}


// Lógica de pesquisa
$sql = "SELECT * FROM vagas ORDER BY id DESC";
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM vagas WHERE id LIKE '%$data%' OR nomeVaga LIKE '%$data%' ORDER BY id DESC";
}

$result = mysqli_query($conexao, $sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ong-admin.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
    <title>Voluntario | Admin</title>
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
                <a href="minhas-ongs.php" class="active">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Vagas</h3>
                </a>
                <a href="cadastrado-ongs.php">
                <span class="material-symbols-outlined">diversity_1</span>
                    <h3>Minhas Ongs</h3>
                </a>
                <a href="voluntario.php">
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
            <div class="box-search">
                <input type="search" class="form-control w-25" placeholder="Pesquisar Vagas" id="pesquisar">
                <button onclick="searchData()">
                <span class="material-symbols-outlined">
                    search
                </span>
                </button>
            </div>
            <div class="recent_order">
                <h1>Vagas</h1>
                <div class="row">
                    <?php
                    // Exibe as vagas
                    while ($row = mysqli_fetch_assoc($result)) { 
                        // Busca o nome da ONG que criou a vaga
                        $ongId = $row['idong'];
                        $sqlOng = "SELECT nomeOng FROM ongcad WHERE idong='$ongId'";
                        $resultOng = mysqli_query($conexao, $sqlOng);
                        $ongNome = "";
                        if ($resultOng && mysqli_num_rows($resultOng) > 0) {
                            $rowOng = mysqli_fetch_assoc($resultOng);
                            $ongNome = $rowOng['nomeOng'];
                        }
                    ?>
                        <div class="card">
                            <style>
                                .t {
                                    font-size: 10px;
                                    color: #43B7BF;
                                }
                            </style>
                            <form action="minhas-ongs.php" method="post">
                                <h2><?= $row['nomeVaga']; ?></h2>
                                <h5>ONG: <?= $ongNome; ?></h5>
                                <h5><?= $row['descricao']; ?></h5>
                                <h5>horário: <?php
                                    $datetime = new DateTime($row['horario']);
                                    echo $datetime->format('H:i');
                                ?></h5>
                                <h5>local: <?= $row['localizacao']; ?></h5>
                                <h5 class="t">inscritos: <?= $row['inscritos']; ?></h5>
                                
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <input type="submit" name="inscrever" value="Inscrever-se" class="btn-insc">
                            </form>
                        </div>
                    <?php } ?>
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
                        <a href="voluntario.php">
                            <?php
                            if ($userImage && file_exists("uploads-vol/$userImage")) {
                                echo '<img src="uploads-vol/' . $userImage . '" alt="Imagem do Usuário" height="100%" width="100%">';
                            } else {
                                echo '<img src="uploads-vol/default.png" alt="Imagem Padrão" height="100%" width="100%">';
                            }
                            ?>
                        </a>
                    </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <script>
        var search = document.getElementById('pesquisar');
        search.addEventListener("keydown", function(event) {
            if(event.key === "Enter") {
                searchData();
            }
        });

        function searchData() {
            window.location = 'minhas-ongs.php?search=' + search.value;
        }
    </script>
    
    <script src="js/ong-admin.js"></script>
</body>
</html>
