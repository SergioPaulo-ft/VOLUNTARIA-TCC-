<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ong-admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
    <title>ONG | Inscritos</title>
    <style>
        /* Estilos para os cards */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            background-color: var(--clr-white);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            color: var(--clr-dark);
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Estilos para a mensagem de retorno */
        .message {
            margin: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            text-align: center;
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
                <a href="ong-admin.php" class="active">
                    <span class="material-symbols-outlined">arrow_back</span>
                    <h3>Voltar</h3>
                </a>
            </div>
        </aside>
        <main>
            <div class="recent_order">
                <h1>Inscritos</h1>
                <div class="row">
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

                        // Verificar se o ID da vaga está presente na URL
                        if (!isset($_GET['id'])) {
                            // Se o ID da vaga não estiver presente, redirecione para a página anterior ou exiba uma mensagem de erro
                            header('Location: ong-admin.php');
                            exit();
                        }

                        // Recuperar o ID da vaga da URL
                        $vaga_id = $_GET['id'];

                        // Consulta SQL para selecionar os inscritos na vaga específica
                        $sql = "SELECT v.nomeVol, v.emailVol, v.celular, v.descricao AS descricao_voluntario 
                        FROM inscricoes i 
                        JOIN voluntariocad v ON i.idVoluntario = v.idvolunt 
                        WHERE i.idVaga = $vaga_id";
                        $result = mysqli_query($conexao, $sql);

                        // Verificar se foram encontrados inscritos
                        if (mysqli_num_rows($result) > 0) {
                        // Exibir os inscritos
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='card'>";
                        echo "<strong>Nome do Voluntário:</strong> " . $row['nomeVol'] . "<br>";
                        echo "<strong>Email do Voluntário:</strong> " . $row['emailVol'] . "<br>";
                        echo "<strong>Celular do Voluntário:</strong> " . $row['celular'] . "<br>";
                        echo "<strong>Descrição do Voluntário:</strong> " . $row['descricao_voluntario'] . "<br><br>";
                        echo "</div>";
                        }
                        } else {
                        echo "<div class='message'>Nenhum inscrito encontrado para esta vaga.</div>";
                        }


                        // Fechar a conexão com o banco de dados, se necessário
                        mysqli_close($conexao);
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
