document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.querySelector(".login-form");
    const navbar = document.querySelector(".header .navbar");
    const cadastroForm = document.querySelector(".cadastro-form");
    const loginButton = document.querySelector("#login-btn");
    const menuButton = document.querySelector("#menu-btn");

    // Função para ativar/desativar o formulário de login
    loginButton.addEventListener("click", ()=>{
        loginForm.classList.toggle("active");
        navbar.classList.remove("active");
    }
    );

    // Função para ativar/desativar o menu
    menuButton.addEventListener("click", ()=>{
        loginForm.classList.remove("active");
        navbar.classList.toggle("active");
    });

    
    // desativando login, cadastro e menu ao rolar a tela 
    window.addEventListener("scroll", () => {
        loginForm.classList.remove("active");
        navbar.classList.remove("active");
        cadastroForm.classList.remove("active");
    });

    // Ativando cadastro
    document.querySelector("#btn-cadastro").addEventListener("click", () => {
        cadastroForm.classList.toggle("active");
    });

    // Fechando o formulário de cadastro
    document.querySelector(".cadastro-form .close-btn").addEventListener("click", () => {
        cadastroForm.classList.remove("active");
    });

    // Função para avançar para a próxima imagem na galeria
    let count = 1;
    setInterval(() => {
        count = count < 4 ? count + 1 : 1;
        document.getElementById("radio" + count).checked = true;
    }, 2000);
});
