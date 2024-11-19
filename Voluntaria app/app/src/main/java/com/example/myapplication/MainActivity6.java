
package com.example.myapplication;

import android.os.AsyncTask;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.myapplication.R;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.Locale;
import java.util.Map;

public class MainActivity6 extends AppCompatActivity {

    private EditText editUsername, editEmail, editPassword, editDataNasc, editPhone, editCep, editHouseNumber, editDescricao;
    private Button btLogin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main6);

        editUsername = findViewById(R.id.editUsername);
        editEmail = findViewById(R.id.editEmail);
        editPassword = findViewById(R.id.editPassword);
        editDataNasc = findViewById(R.id.editDataNasc);
        editPhone = findViewById(R.id.editPhone);
        editCep = findViewById(R.id.editCep);
        editHouseNumber = findViewById(R.id.editHouseNumber);
        editDescricao = findViewById(R.id.editDescricao);
        btLogin = findViewById(R.id.btLogin);

        btLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                cadastrarVoluntario();
            }
        });

        // Aplicando a máscara no campo de Data de Nascimento (DD/MM/AAAA)
        editDataNasc.addTextChangedListener(new TextWatcher() {
            private static final char SEPARATOR = '/';
            private static final int MAX_LENGTH = 10;

            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {}

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {}

            @Override
            public void afterTextChanged(Editable s) {
                String input = s.toString();
                if (input.length() == 3 && !input.contains(String.valueOf(SEPARATOR))) {
                    input = input.substring(0, 2) + SEPARATOR + input.substring(2);
                    editDataNasc.setText(input);
                    editDataNasc.setSelection(input.length());
                } else if (input.length() == 6 && !input.substring(5).equals(String.valueOf(SEPARATOR))) {
                    input = input.substring(0, 5) + SEPARATOR + input.substring(5);
                    editDataNasc.setText(input);
                    editDataNasc.setSelection(input.length());
                }
            }
        });
    }

    private void cadastrarVoluntario() {
        String nome = editUsername.getText().toString().trim();
        String email = editEmail.getText().toString().trim();
        String senha = editPassword.getText().toString().trim();
        String dataNasc = editDataNasc.getText().toString().trim();
        String telefone = editPhone.getText().toString().trim();
        String cep = editCep.getText().toString().trim();
        String numero = editHouseNumber.getText().toString().trim();
        String descricao = editDescricao.getText().toString().trim();

        // Converte a data do formato brasileiro para o formato ISO
        dataNasc = convertDataToISO(dataNasc);

        new CadastroTask().execute(nome, email, senha, dataNasc, telefone, cep, numero, descricao);
    }

    // Função para converter a data do formato brasileiro para o formato ISO
    private String convertDataToISO(String data) {
        try {
            SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy", Locale.getDefault());
            Date date = sdf.parse(data);
            sdf = new SimpleDateFormat("yyyy-MM-dd", Locale.getDefault());
            return sdf.format(date);
        } catch (Exception e) {
            e.printStackTrace();
            return data; // Se houver erro, retorna a data original
        }
    }

    private class CadastroTask extends AsyncTask<String, Void, String> {

        @Override
        protected String doInBackground(String... params) {
            String nomeVol = params[0];
            String emailVol = params[1];
            String senhaVol = params[2];
            String dataNasc = params[3];
            String celular = params[4];
            String cep = params[5];
            String numero = params[6];
            String descricao = params[7];

            try {
                URL url = new URL("https://voluntaria.000webhostapp.com/app/salvar.php");
                HttpURLConnection conn = (HttpURLConnection) url.openConnection();
                conn.setRequestMethod("POST");
                conn.setDoOutput(true);
                conn.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");

                Map<String, String> postDataParams = new HashMap<>();
                postDataParams.put("nomeVol", nomeVol);
                postDataParams.put("emailVol", emailVol);
                postDataParams.put("senhaVol", senhaVol);
                postDataParams.put("dataNasc", dataNasc);
                postDataParams.put("celular", celular);
                postDataParams.put("cep", cep);
                postDataParams.put("numero", numero);
                postDataParams.put("descricao", descricao);

                StringBuilder postData = new StringBuilder();
                for (Map.Entry<String, String> param : postDataParams.entrySet()) {
                    if (postData.length() != 0) postData.append('&');
                    postData.append(URLEncoder.encode(param.getKey(), "UTF-8"));
                    postData.append('=');
                    postData.append(URLEncoder.encode(param.getValue(), "UTF-8"));
                }

                OutputStream os = conn.getOutputStream();
                os.write(postData.toString().getBytes("UTF-8"));
                os.flush();
                os.close();

                int responseCode = conn.getResponseCode();
                if (responseCode == HttpURLConnection.HTTP_OK) {
                    BufferedReader in = new BufferedReader(new InputStreamReader(conn.getInputStream()));
                    String inputLine;
                    StringBuilder response = new StringBuilder();

                    while ((inputLine = in.readLine()) != null) {
                        response.append(inputLine);
                    }
                    in.close();
                    return response.toString();
                } else {
                    return "Erro: " + responseCode;
                }
            } catch (Exception e) {
                e.printStackTrace();
                return "Exception: " + e.getMessage();
            }
        }

        @Override
        protected void onPostExecute(String result) {
            super.onPostExecute(result);
            Toast.makeText(MainActivity6.this, result, Toast.LENGTH_LONG).show();
        }
    }
}
