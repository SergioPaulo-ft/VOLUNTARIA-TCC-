<?php
include_once('conexao.php');

// Definindo a variável de mensagem
$mensagem = '';

// Verifica se o formulário de cadastro de voluntário foi enviado
if (isset($_POST['submit'])) {
    $nomeVol = $_POST['nomeVol'];
    $emailVol = $_POST['emailVol'];
    $senhaVol = $_POST['senhaVol'];
    $celular = $_POST['celular'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $dataNasc = $_POST['dataNasc'];

    // Verifica se o e-mail já existe na tabela de voluntários
    
    $check_query = "SELECT * FROM voluntariocad WHERE emailVol='$emailVol'";
    $check_result = mysqli_query($conexao, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $mensagem = '<div id="success" class="msg error" style="text-align: center; padding: 10px; z-index: 9999;">E-mail já cadastrado!</div>';
    } else {
        // Se o e-mail não estiver duplicado, insira os dados
        $result = mysqli_query($conexao, "INSERT INTO voluntariocad(nomeVol,emailVol,senhaVol,celular,cep,numero,dataNasc) 
        VALUES ('$nomeVol','$emailVol','$senhaVol','$celular','$cep','$numero','$dataNasc')");
        
        // Verifica se o cadastro foi bem-sucedido
        if ($result) {
            $mensagem = '<div id="success" class="msg success" style="text-align: center; padding: 10px; z-index: 9999;">Cadastro realizado com sucesso!</div>';
        } else {
            $mensagem = '<div id="success" class="msg error" style="text-align: center; padding: 10px; z-index: 9999;">Erro ao cadastrar voluntário!</div>';
        }
    }

}

// Verifica se o formulário de mensagem foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit-faq'])) {
    // Obtém os dados do formulário de mensagem
    $nomeFaq = $_POST['nomeFaq'];
    $emailFaq = $_POST['emailFaq'];
    $mens = $_POST['area'];
    
    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES ('$nomeFaq', '$emailFaq', '$mens')";
    
    // Executa a consulta SQL
    if ($conexao->query($sql) === TRUE) {
        $mensagem = '<div id="success" class="msg sucess" style="text-align: center; padding: 10px; z-index: 9999;">Mensagem enviada com sucesso!</div>';
    } else {
        $mensagem = '<div id="success" class="msg error" style="text-align: center; padding: 10px; z-index: 9999;">Erro ao enviar mensagem!</div>';
    }
}

if (isset($_GET['login']) && $_GET['login'] === 'failed') {
    $mensagem = '<div id="success-msg" class="msg error" style="text-align: center; padding: 10px; z-index: 9999;">Não foi possível fazer login. Verifique suas credenciais.</div>';
}
// Fecha a conexão com o banco de dados
$conexao->close();
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOLUNTARIA | Home</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/all.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!-- links css -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">

    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Adicionando script para mensagem temporária -->
    <style>
         .msg.success { background-color: #d4edda; color: #155724; }
        .msg.error { background-color: #f8d7da; color: #721c24; }
        .msg.warning { background-color: #fff3cd; color: #856404; }
        /* Estilo para ajustar a posição da mensagem temporária */
        #success-msg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            z-index: 9999;
        }
    </style>
    </style>
</head>
<body>
    <!--header-->
    <header class="header">
        <a href="index.php"><img src="imagens/logo.png" alt="" class="logo"></a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="quemSomos.php">Quem Somos</a>
            <a href="faq.php">FAQ</a>
        </nav>
        <div class="icons">
            <div id="login-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
        <!--login-form-->
        <?php
// Verifica se os cookies existem e preenche os campos
$emailCookie = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
$senhaCookie = isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '';
$checked = isset($_COOKIE['email']) ? 'checked' : '';
?>

<form action="testeLogin.php" class="login-form" name="LoginForm" id="LoginForm" method="post">
    <h3>login</h3>
    <input required type="email" name="email" id="email" class="box" placeholder="Email" value="<?php echo $emailCookie; ?>">
    <input required type="password" name="senha" id="senha" class="box" placeholder="Senha" value="<?php echo $senhaCookie; ?>">
    <div class="remember">
        <input type="checkbox" name="remember" id="remember" <?php echo $checked; ?>>
        <label for="remember">Lembrar-me</label>
    </div>
    <input type="submit" class="btn" id="Logar" name="submit"></input>
    <span id="resp-form-login"></span>
</form>

    </header>
    <main>
        <!--home-->
        <section class="home" id="home">
            <div class="content">
                <h3>Junte-se à nossa comunidade e faça parte da mudança, impactando vidas!</h3>
                <center><button class="btn" id="btn-cadastro"><span>Cadastrar-se</span></button></center>
            </div>
            <img src="imagens/principal.png" alt="" id="principal">
        </section>
        <!--form cadastro-->
        <div class="center">
            <div class="popup cadastro-form">
                <div class="close-btn">&times;</div>
                <form action="index.php" class="form" id="Form-Cadastro" method="POST">
                    <h3>cadastro</h3>
                    <div class="form-element">
                        <label for="Nome">Nome</label>
                        <input required  type="text" name="nomeVol" id="nomeVol" class="box" placeholder="Nome">
                    </div>
                    <div class="form-element">
                        <label for="Email">Email</label>
                        <input required type="email" name="emailVol" id="emailVol" class="box" placeholder="Email">
                    </div>
                    <div class="form-element">
                        <label for="Senha">Senha</label>
                        <input required type="password" name="senhaVol" id="senhaVol" class="box" placeholder="Senha">
                    </div>
                    <div class="form-element">
                        <label for="Celular">Celular</label>
                        <input required type="number" name="celular" id="celular" class="box" placeholder="Celular">
                    </div>
                    <div class="form-element">
                        <label for="Cep">Cep</label>
                        <input required type="number" name="cep" id="cep" class="box" placeholder="Cep">
                    </div>
                    <div class="form-element">
                        <label for="Número">Número</label>
                        <input required type="number" name="numero" id="numero" class="box" placeholder="Número">    
                    </div>
                    <div class="form-element">
                        <label for="DtaNascimento">Data de Nascimento</label>
                        <input required type="date" name="dataNasc" id="dataNasc" class="box" placeholder="DtaNascimento">
                    </div>
                    <div class="form-element">
                        <input type="submit" value="Enviar" class="btn" name="submit" id="submit">
                    </div>
                    <span id="resp-form"></span>
                </form>
            </div>
        </div>
        <!-- Exibição da mensagem temporária de sucesso -->
        <?php if (isset($mensagem)) : ?>
        <div id="success-msg"><?php echo $mensagem; ?></div>
    <?php endif; ?>
    <script>
            // Adicionar script para fazer a mensagem desaparecer após alguns segundos
            setTimeout(function() {
                var element = document.getElementById('success-msg');
                if (element) {
                    element.parentNode.removeChild(element);
                }
            }, 2000); // 5000 milissegundos = 5 segundos
        </script>
        <!--galeria-->
        <img src="imagens/ondacinza.png" alt="" class="wave">
        <section class="gallery" id="gallery">
            <h2 class="heading">Projetos</h2>
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="slide first">
                        <img src="imagens/proj1.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="imagens/proj2.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="imagens/proj3.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="imagens/proj4.jpg" alt="">
                    </div>

                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>
                </div>


                <div class="manual-navigation">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <label for="radio4" class="manual-btn"></label>
                </div>
            </div>
        </section>
        <img src="imagens/ondacinza.png" alt="" class="wave-revert" >
        
        <!--aplicativo-->
        
        <section class="aplicativo">
            <div class="content">
                <h3>Acompanhe o seu perfil com o nosso <b>aplicativo</b></h3>
                <a href="">
                    <center><button class="btn">
                        <span>Saiba Mais</span>
                    </button></center>
                </a>
            </div>
            
            <img src="imagens/app.png" width="500px" alt="">
        </section>

            <!--contato-->
            <section class="contact" id="contact">
                
                <h2 class="heading">
                    FALE CONOSCO!
                    <i class="fa-regular fa-comment"></i>
                </h2>
               

                <form action="index.php" method="POST">
                    <div class="inputBox">
                        <input type="text" name="nomeFaq" id="nomeFaq" placeholder="nome">
                        <input type="email" name="emailFaq" id="emailFaq" placeholder="email">
                    </div>

                    <textarea name="area" id="area" cols="30" rows="10" placeholder="escreva aqui..."></textarea>
                    <div class="inputBox">
                        <input type="submit" name="submit-faq" id="submit-faq" class="btn">
                    </div>
                   
                </form>
                
            </section>
            
            
            
        
    </main>

    <!--footer-->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>redes-socias</h3>
                <div class="share">
                    <a  href="https://www.bing.com/ck/a?!&&p=6d978976266f3f4eJmltdHM9MTcwOTc2OTYwMCZpZ3VpZD0zNDc5YmNjMC1lODYxLTY5NWYtMDRkYS1hZmVlZTlkMDY4NWUmaW5zaWQ9NTIxMQ&ptn=3&ver=2&hsh=3&fclid=3479bcc0-e861-695f-04da-afeee9d0685e&psq=face&u=a1aHR0cHM6Ly9wdC1ici5mYWNlYm9vay5jb20v&ntb=1">
                        <i class="fab fa-facebook-f"></i></a>
                    <a  href="https://www.instagram.com/voluntaria_br?igsh=NnplejdqdW02MnB0&utm_source=qr">
                        <i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="box">
                <h3>explore</h3>
                <a href="quemSomos.php" class="links"><i class="fas fa-arrow-right"></i> Quem Somos</a>
                <a href="" class="links"><i class="fas fa-arrow-right"></i> Nossos Projetos</a>
                <a href="" class="links"><i class="fas fa-arrow-right"></i> Baixar</a>
                <a href="faq.php" class="links"><i class="fas fa-arrow-right"></i> FAQ</a>
            </div>
            <div class="box">
                <h3>contato</h3>
                <a href="" class="links"><i class="fas fa-phone"></i> (11) 0000-0000</a>
                <a href="" class="links"><i class="fas fa-envelope"></i> voluntaria@gmail.com</a> 
            </div>
        </div>
        <div class="credit">&copy; 2024 Voluntaria. Todos os direitos reservados.</div>
        
    </section>
    <script src="js/ajax-cadastro.js" ></script>
    <script src="js/ajax-login.js"></script>
    <script src="js/home.js" ></script>
</body>
</html>