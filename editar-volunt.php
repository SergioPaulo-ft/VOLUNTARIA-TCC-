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
} else {
    echo "Erro ao recuperar os dados do usuário.";
    exit();
}
// Verifica se o usuário está logado
if (!isset($_SESSION['emailVol']) || !isset($_SESSION['senhaVol'])) {
    header('Location: index.php');
    exit();
}

if (!empty($_GET['idvolunt'])) {
    $idvolunt = $_GET['idvolunt'];
    $sqlSelect = "SELECT * FROM voluntariocad WHERE idvolunt=$idvolunt";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $imagem = $user_data['userImage']; // Ajuste aqui para pegar a imagem corretamente
        $nomeVol = $user_data['nomeVol'];
        $emailVol = $user_data['emailVol'];
        $celular = $user_data['celular'];
        $cep = $user_data['cep'];
        $numero = $user_data['numero'];
        $dataNasc = $user_data['dataNasc'];
        $descricao = $user_data['descricao'];
    } else {
        header('Location: voluntario.php');
        exit();
    }
} else {
    header('Location: voluntario.php');
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
    <title>Editar Perfil | Voluntário</title>
    <style>
       
       h1 {
           margin-bottom: 20px;
       }

       form {
           max-width: 500px;
           margin: 0 auto;
           background-color: var(--clr-white);
           border-radius: 10px;
           padding: 20px;
           box-shadow: var(--box-shadow);
           width: 500px;
       }

       label {
           font-weight: bold;
           display: block;
           margin-bottom: 2px;
           color: var(--clr-dark);
       }

       .box {
           width: 100%;
           padding: 7px;
           margin-bottom: 15px;
           border: 1px solid;
           border-color: var(--clr-color-background);
           color: var(--clr-dark);
           border-radius: 4px;
           box-sizing: border-box;
           background-color: var(--clr-light);
       }

       .file-upload {
           position: relative;
           overflow: hidden;
           display: inline-block;
           margin-bottom: 20px;
       }

       .file-upload input[type='file'] {
           position: absolute;
           top: 0;
           right: 0;
           bottom: 0;
           left: 0;
           width: 100%;
           height: 100%;
           cursor: pointer;
           opacity: 0;
       }

       .file-upload-label {
           display: block;
           padding: 5px 8px;
           background-color: var(--clr-verde-agua);
           color: white;
           border-radius: 50%;
           cursor: pointer;
       }

       .file-upload-label:hover {
           background-color: #357c85;
       }

       

       .image-container {
           position: relative;
           width: 100px;
           height: 100px;
           margin: 0 auto 20px;
           border: 2px dashed #ccc;
           border-radius: 50px;
           cursor: pointer;
       }

      img {
           max-width: 100%;
           max-height: 100%;
           display:flex;
           margin: auto;
       }

       img:after {
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
           color: #666;
       }

       img:hover:after {
           color: #333;
       }

       
       .btn {
           background-color: var(--clr-verde-agua);
           color: var(--clr-dark);
           font-weight: 700;
           padding: 10px;
           border-radius: 50px;
           cursor: pointer;
           transition: background-color 0.3s ease;
           width: 100%;
       }

       .btn:hover {
           background-color: #357c85;
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
                <a href="voluntario.php" class="active">
                    <span class="material-symbols-outlined">arrow_back</span>
                    <h3>Voltar</h3>
                </a>
            </div>
        </aside>
        <main>
            <div class="recent_order">
                <h1>Editar Perfil Voluntário</h1>
                <form action="salvar-vol-conta.php" class="atlzDadosOng" id="atlzDadosOng" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="idvolunt" id="idvolunt" class="box" value="<?php echo $idvolunt; ?>" required>
                    <img src="uploads-vol/<?php echo $imagem; ?>" alt="Imagem do Voluntário" width="100"><br>
                    <label class="file-upload">
                    
                        <span class="file-upload-label">
                            <span class="material-symbols-outlined">
                            add_photo_alternate
                            </span>
                        </span>
                        <input type="file" name="imagem" id="imagem">
                    </label>
                    

                    <label for="nomeVol">Nome:</label>
                    <input type="text" name="nomeVol" id="nomeVol" class="box" value="<?php echo $nomeVol; ?>" required>
                    
                    <label for="celular">Celular:</label>
                    <input type="number" name="celular" id="celular" class="box" value="<?php echo $celular; ?>" required>

                    <label for="cep">Cep:</label>
                    <input type="number" name="cep" id="cep" class="box" value="<?php echo $cep; ?>" required>

                    <label for="numero">Número:</label>
                    <input type="number" name="numero" id="numero" class="box" value="<?php echo $numero; ?>" required>

                    <label for="dataNasc">Data de Nascimento:</label>
                    <input type="date" name="dataNasc" id="dataNasc" class="box" value="<?php echo $dataNasc; ?>" required>
                    
                    <label for="descricao">Descrição:</label>
                    <input type="text" name="descricao" id="descricao" class="box" value="<?php echo $descricao; ?>" required>

                    <input type="submit" class="btn" id="update" name="update" value="Salvar">
                </form>
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
