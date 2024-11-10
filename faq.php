
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/faq.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/all.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <style>
        .contact{
            color: #052659;
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <!--header-->
    <header class="header">

        <a href="index.php"><img src="imagens/logo.png" alt="" class="logo"></a>
        
    
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="quemSomos.php">quem somos</a>
            <a href="faq.php">faq</a>
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
        <h1>FAQ</h1>
        <div class="container"> 
            <div class="caixa"> 
                <div class="container-faq">
                    <div class="container-pergunta">
                       <h3>1) O SITE É CONFIÁVEL? </h3>
                       <p>Sim, o modo de cadastro da ong é feito por um de nossos administradores e, após diversas entrevistas, passado ao coordenador da ONG. Mesmo após tudo iss o monitoramento dessas contas segue sendo feito pelos nossos administradores.</p>
                    </div>
                </div>

                <div class="container-faq">
                    <div class="container-pergunta">
                        <h3>2) ONDE ME INSCREVO?</h3>
                        <p>Assim que você se cadastra no nosso site, você será levado para uma página com as vagas em destaque listadas, apenas é necessario clicar em "Me Inscrever."</p>
                    </div>
                </div> 

                <div class="container-faq">
                    <div class="container-pergunta">
                        <h3>3) COMO CADASTRO MINHA ONG?</h3>
                        <p>O diretor da ONG deverá entrar em contato com a nossa equipe por meio do Fale Conosco e pedir acesso à conta da ONG, previamente ou posteriormente criado por um de nossos administradores.</p>
                    </div>  
                </div> 
            </div>
            <div class="caixa">
                <div class="container-faq">
                    <div class="container-pergunta">
                        <h3>4) COMO ENCONTRO O APLICATIVO?</h3>
                        <p>O link para download do aplicativo poderá ser encontrado na tela inicial ou em qualquer página ao descer até o rodapé e clicar em Baixar.</p>
                    </div> 
                </div>  
    
                <div class="container-faq">
                    <div class="container-pergunta">
                        <h3>5) QUALQUER PESSOA PODE PARTICIPAR?</h3>
                        <p>Sim, contanto que tenha mais que 18 anos de idade.</p>
                    </div>
                </div> 
                <div class="container-faq">
                    <div class="container-pergunta">
                        <h3>6) COMO POSSO REDEFINIR A MINHA SENHA?</h3>
                        <p>Na área de de login, terá um botão de "Esqueci a minha senha", ao responder os dados necessários no formulário um email será enviado com os passos para redefinir a senha. </p>
                    </div>
                </div> 
            </div>
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

    
        </div>
        
    </main>
    <!--footer-->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>redes-socias</h3>
                <div class="share">
                    <a  href="https://www.bing.com/ck/a?!&&p=6d978976266f3f4eJmltdHM9MTcwOTc2OTYwMCZpZ3VpZD0zNDc5YmNjMC1lODYxLTY5NWYtMDRkYS1hZmVlZTlkMDY4NWUmaW5zaWQ9NTIxMQ&ptn=3&ver=2&hsh=3&fclid=3479bcc0-e861-695f-04da-afeee9d0685e&psq=face&u=a1aHR0cHM6Ly9wdC1ici5mYWNlYm9vay5jb20v&ntb=1">
                        <i class="fab fa-facebook-f"></i></a>
                    <a  href="https://www.bing.com/ck/a?!&&p=fe227bdec83dfc4bJmltdHM9MTcwOTc2OTYwMCZpZ3VpZD0zNDc5YmNjMC1lODYxLTY5NWYtMDRkYS1hZmVlZTlkMDY4NWUmaW5zaWQ9NTIwOA&ptn=3&ver=2&hsh=3&fclid=3479bcc0-e861-695f-04da-afeee9d0685e&psq=instagram&u=a1aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS8&ntb=1">
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