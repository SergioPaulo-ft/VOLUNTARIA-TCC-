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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $senhaAtual = $_POST['senhaVol'];
    $novaSenha = $_POST['nova-senha'];
    $confirmarSenha = $_POST['confirmar-senha'];

    $query = "SELECT senhaVol FROM voluntariocad WHERE emailVol='$logado'";
    $result = mysqli_query($conexao, $query);
    $user = mysqli_fetch_assoc($result);

    if ($senhaAtual == $user['senhaVol']) {
        if ($novaSenha == $confirmarSenha) {
            $queryUpdate = "UPDATE voluntariocad SET senhaVol='$novaSenha' WHERE emailVol='$logado'";
            if (mysqli_query($conexao, $queryUpdate)) {
                $mensagem = '';
                $mensagem = '<div class="msg sucess">Senha alterada com sucesso!</div>';
            } else {
                $mensagem = '<div class="msg error">Erro ao atualizar a senha.</div>';
            }
        } else {
            $mensagem = '<div class="msg warning">A nova senha e a confirmação não coincidem.</div>';
        }
    } else {
        $mensagem = '<div class="msg error">Erro ao verificar a senha atual.</div>';
    }
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
    <title>Voluntario | Configurações</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

:root{
    --clr-primary: #052659;
    --clr-light: rgba(132, 139, 200, 0.18);

    --clr-white: #fff;
    --clr-dark: rgb(56, 56, 56);
    --clr-dark-variant: #677483;
    --clr-color-background: #DFDFDF;
    --card-border-radius:2rem;
    --border-radius-1:0.4rem;
    --border-radius-2:0.8rem;
    --border-radius-3:1.2rem;
    --clr-verde-agua:#43B7BF;
    --card-padding: 1.8rem;
    --padding-1: 1.2rem;
    --box-shadow: 0 2rem 3rem var(--clr-light);
}

.dark-theme-variables{
    --clr-color-background: #181a1e;
    --clr-white: #202528;
    --clr-light: rgba(0,0,0,0.4);
    --clr-dark: #edeffd;
    --clr-dark-variant: #677483;
    --box-shadow: 0 2rem 3rem var(--clr-light);
}
        .senha {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 55vh;
        }

        .senha form {
            background-color: var(--clr-white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--box-shadow);
            width: 300px;
        }

        .senha .form-group {
            margin-bottom: 15px;
        }

        .senha .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: var(--clr-dark);
        }

        .senha .form-group input[type="password"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            background-color: var(--clr-light);
            color: var(--clr-dark);
        }

        .senha .form-group input[type="password"]:focus {
            outline: none;
            border-color: var(--clr-color-background);
            color: var(--clr-dark);
        }

        .senha button[type="submit"] {
            background-color: var(--clr-verde-agua);
            color: var(--clr-dark);
            font-weight: 700;
            padding: 10px;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .senha button[type="submit"]:hover {
            background-color: #357c85;
        }
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
                <a href="voluntario.php">
                    <span class="material-symbols-outlined">account_box</span>
                    <h3>Meu perfil</h3>
                </a>
                <a href="senha.php" class="active">
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
                <h1>Alterar Senha</h1>
                <div class="senha">
                
                <form method="post" action="senha.php">
                    <div class="form-group">
                        <label for="senha-atual">Senha Atual:</label>
                        <input type="password" id="senhaVol" name="senhaVol" placeholder="Senha Atual" required>
                    </div>
                    <div class="form-group">
                        <label for="nova-senha">Nova Senha:</label>
                        <input type="password" id="nova-senha" name="nova-senha" placeholder="Nova Senha" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmar-senha">Confirmar Senha:</label>
                        <input type="password" id="confirmar-senha" name="confirmar-senha" placeholder="Confirmar Nova Senha" required>
                    </div>
                    <button type="submit">Alterar Senha</button>
                    <?php if (isset($mensagem)) : ?>
                    <p><?php echo $mensagem; ?></p>
                <?php endif; ?>
                </form>
                
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

   
    <script src="js/ong-admin.js"></script>
</body>
</html>
