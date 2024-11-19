<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUEM SOMOS</title>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/quemSomos.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/all.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
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
        <h1>QUEM SOMOS</h1>
        <div class="container-kanye">

            <div class="texto">
                <p>‎ ‎ ‎ ‎ ‎Olá! Somos a Voluntária, e nossa missão começou com a identificação de um problema que afeta milhares de jovens brasileiros que buscam ingressar no mercado de trabalho. Desde então, já impactamos positivamente a vida de mais de 1000 jovens em todo o Brasil, além de colaborar com mais de 500 ONGs. Para conhecer um pouco mais sobre nós, convidamos você a conhecer a equipe que trabalhou incansavelmente para fazer da Voluntária uma realidade.</p>
            </div>
            
            <div class="container-icone">

         
                    <div class="box-icone">
                        <img src="imagens/sobre-nos_victoria.png" width="50px" alt="" srcset="">
                        <div>
                            <h4>Victoria Gomes</h4>
                            <p>20 anos</p>
                            <p>Web-Designer.</p> 
                        </div>
                    </div>
                    <div class="box-icone">
                        <img src="imagens/sobre-nos_leticia.png" width="50px" alt="" srcset="">
                        <div>
                            <h4>Leticia Pereira</h4>
                            <p>17 anos</p>
                            <p>Documentaçao.</p> 
                        </div>
                    </div>
                    <div class="box-icone">
                        <img src="imagens/sobre-nos_malu.png" width="50px" alt="" srcset="">
                        <div>
                            <h4>Maria Luiza</h4>
                            <p>18 anos</p>
                            <p>Documentaçao.</p> 
                        </div>
                    </div>
                    <div class="box-icone">
                        <img src="imagens/sobre-nos_giulia.png" width="50px" alt="" srcset="">
                        <div>
                            <h4>Giulia Marques</h4>
                            <p>18 anos</p>
                            <p>Banco de Dados.</p> 
                        </div>
                    </div>
            
            
                    <div class="box-icone">
                        <img src="imagens/sobre-nos_julia.png" width="50px" alt="" srcset="">
                        <div>
                            <h4>Julia Veroneze</h4>
                            <p>18 anos</p>
                            <p>Back-end.</p> 
                        </div>
                    </div>
                    <div class="box-icone">
                        <img src="imagens/sobre-nos_samira.png" width="50px" alt="" srcset="">
                        <div>
                            <h4>Samira Campos</h4>
                            <p>17 anos</p>
                            <p>Designer.</p> 
                        </div>
                    </div>
                    <div class="box-icone">
                        <img src="imagens/sobre-nos_guilherme.png" width="50px" alt="" srcset="">
                        <div>
                            <h4>Guilherme Elias</h4>
                            <p>19 anos</p>
                            <p>Designer.</p> 
                        </div>
                    </div>
                    <div class="box-icone">
                        <img src="imagens/sobre-nos_sergio.png" width="50px" alt="" srcset="">
                        <div>
                            <h4>Sergio Paulo</h4>
                            <p>23 anos</p>
                            <p>Back-end.</p> 
                        </div>
                    </div>
               
            </div>
            
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