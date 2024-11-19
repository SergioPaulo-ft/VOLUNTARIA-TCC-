<?php
include_once('conexao.php');
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM vagas WHERE id=$id";
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $nomeVaga = $user_data['nomeVaga'];
                $descricao = $user_data['descricao'];
                $horario = $user_data['horario'];
                $localizacao = $user_data['localizacao'];
            }
            
        }
        else
        {
            header('Location: ong-admin.php');
        }
        
    }
    else
    {
        header('Location: ong-admin.php');
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
   
     

    <title>ONG | Editar Vagas</title>
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../imagens/logo.png" alt="" width="58px">
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
                <h1>Editar Vagas</h1>
                <form action="saveEdit.php" class="addVaga" id="addVaga" method="POST">
                    <label for="nomeVaga">Nome da vaga</label>
                    <input type="text" name="nomeVaga" id="nomeVaga" value="<?php echo $nomeVaga?>" class="box" required>
                
          
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" value="<?php echo $descricao?>" class="box" required>
                
              
                    <label for="horario">Horário</label>
                    <input type="time" name="horario" id="horario" value="<?php echo $horario?>" class="box" required>
               
               
                    <label for="local">Local</label>
                    <input type="text" name="localizacao" id="localizacao" value="<?php echo $localizacao?>" class="box" required>
                    
                    <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" class="btn" id="update" name="update">
                       
                </form>
                    
      
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
                        <p><b>Ong</b></p>
                        <p>Admin</p>
                        <small class="text-muted"></small>
                    </div>
                    <div class="profile-photo">
                        <a href="ong-admin-conta">
                        <?php
                            echo '<img width="100%" src="uploads/user" alt="">';
                        ?>
                        </a>
                    </div>
                </div>
            </div>

           
        </div>
        
    </div>
    <script src="../js/ong-admin.js"></script>
</body>
</html>