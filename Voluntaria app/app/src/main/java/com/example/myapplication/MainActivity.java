package com.example.myapplication;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.gson.JsonObject;
import com.koushikdutta.async.future.FutureCallback;
import com.koushikdutta.ion.Ion;

public class MainActivity extends AppCompatActivity {
    private EditText txtlogin, txtsenha;
    private Button bt_login, bt_save, btnQuemSomos, btnFAQ; // Adicionando botões para Quem Somos e FAQ

    String INDEX = "https://voluntaria.000webhostapp.com";
    String Host = "https://voluntaria.000webhostapp.com/app/";
    String url;
    String ret;
    public static String nomex, descricaox, idVol;
    public static String loginx, senhax;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Inicializando os componentes da interface
        bt_login = findViewById(R.id.bt_login);
        bt_save = findViewById(R.id.bt_save);
        txtlogin = findViewById(R.id.email_txt);
        txtsenha = findViewById(R.id.senha_txt);

        // Configurando o botão de login
        bt_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                logar();
            }
        });

        // Configurando o botão para abrir a tela de cadastro
        bt_save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent it = new Intent(MainActivity.this, MainActivity6.class);
                MainActivity.this.startActivity(it);
            }
        });

        // Configurando o botão "Quem Somos"
        btnQuemSomos = findViewById(R.id.btnQuemSomos);
        btnQuemSomos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, MainActivity5.class);
                startActivity(intent);
            }
        });

        // Configurando o botão "FAQ"
        btnFAQ = findViewById(R.id.btnFAQ);
        btnFAQ.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, MainActivity4.class);
                startActivity(intent);
            }
        });
    }

    private void logar() {
        url = Host + "login.php";

        // Realizando a requisição HTTP para verificar o login
        Ion.with(MainActivity.this)
                .load(url)
                .setBodyParameter("usuario", txtlogin.getText().toString())
                .setBodyParameter("senha", txtsenha.getText().toString())
                .asJsonObject()
                .setCallback(new FutureCallback<JsonObject>() {
                    @Override
                    public void onCompleted(Exception e, JsonObject result) {
                        // Verificando o resultado da requisição
                        if (e != null) {
                            Toast.makeText(MainActivity.this, "Erro ao realizar login", Toast.LENGTH_SHORT).show();
                            return;
                        }

                        ret = result.get("status").getAsString();
                        if (ret.equals("ok")) {
                            nomex = result.get("nomeVol").getAsString();
                            descricaox = result.get("descricao").getAsString();
                            idVol = result.get("idvolunt").getAsString();
                            loginx = txtlogin.getText().toString();
                            senhax = txtsenha.getText().toString();

                            // Iniciando a MainActivity2 se o login for bem-sucedido
                            Intent trocar = new Intent(MainActivity.this, MainActivity2.class);
                            MainActivity.this.startActivity(trocar);
                        } else {
                            // Exibindo mensagem de erro se o login falhar
                            Toast.makeText(MainActivity.this, "Email ou senha não existem", Toast.LENGTH_LONG).show();
                        }
                    }
                });
    }
}
