package com.example.myapplication;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.koushikdutta.ion.Ion;

public class MainActivity2 extends AppCompatActivity {
    // Declaração de variáveis para os botões, imagem e textos
    Button bt_logout, bt_vagas;
    ImageView fotop;
    TextView Sobre_Mim, User_Name;
    // Array contendo as extensões de imagem suportadas
    String[] imageExtensions = {"png", "jpg", "jpeg", "gif"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);

        // Inicializando os componentes da interface
        bt_vagas = findViewById(R.id.bt_vagas);
        bt_logout = findViewById(R.id.bt_logout);
        fotop = findViewById(R.id.foto_perfil);
        Sobre_Mim = findViewById(R.id.sobre_mim);
        User_Name = findViewById(R.id.nome_txt);

        // Exibindo informações na tela obtidas da MainActivity
        User_Name.setText(MainActivity.nomex);
        Sobre_Mim.setText(MainActivity.descricaox);

        // Tentando carregar a imagem do perfil do usuário com diferentes extensões
        loadProfileImage("https://voluntaria.000webhostapp.com/uploads-vol/" + MainActivity.idVol);

        // Configurando o botão de logout
        bt_logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Iniciando a tela de login (MainActivity) e finalizando a atual (MainActivity2)
                Intent telaLogin = new Intent(MainActivity2.this, MainActivity.class);
                startActivity(telaLogin);
                finish();
            }
        });

        // Configurando o botão de acesso à tela de vagas
        bt_vagas.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Iniciando a tela de vagas (MainActivity3) e finalizando a atual (MainActivity2)
                Intent telaVagas = new Intent(MainActivity2.this, MainActivity3.class);
                startActivity(telaVagas);
                finish();
            }
        });
    }

    // Método para iniciar o carregamento da imagem do perfil
    private void loadProfileImage(final String baseUrl) {
        // Chama o método auxiliar para tentar carregar a imagem com a primeira extensão
        loadProfileImageWithExtension(baseUrl, 0);
    }

    // Método auxiliar que tenta carregar a imagem com diferentes extensões
    private void loadProfileImageWithExtension(final String baseUrl, final int index) {
        if (index >= imageExtensions.length) {
            // Se todas as extensões falharem, exibir uma imagem padrão do drawable
            fotop.setImageResource(R.drawable.perfil);
            return;
        }

        // Construindo a URL da imagem com a extensão atual
        final String imageUrl = baseUrl + "." + imageExtensions[index];
        Ion.with(this)
                .load(imageUrl) // Carrega a imagem da URL
                .intoImageView(fotop) // Define a imagem carregada no ImageView
                .setCallback((e, result) -> {
                    if (e != null) {
                        // Se houve erro, tentar a próxima extensão
                        loadProfileImageWithExtension(baseUrl, index + 1);
                    }
                });
    }
}
