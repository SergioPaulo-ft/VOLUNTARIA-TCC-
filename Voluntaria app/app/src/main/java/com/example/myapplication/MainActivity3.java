package com.example.myapplication;

import android.graphics.Color;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import androidx.appcompat.app.AppCompatActivity;
import com.koushikdutta.async.future.FutureCallback;
import com.koushikdutta.ion.Ion;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class MainActivity3 extends AppCompatActivity {

    private LinearLayout container;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main3);

        container = findViewById(R.id.container);

        carregarVagas();

        findViewById(R.id.bt_voltar).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }

    private void carregarVagas() {
        String url = "https://voluntaria.000webhostapp.com/app/buscar_vagas.php";

        Ion.with(MainActivity3.this)
                .load(url)
                .setBodyParameter("idVoluntario", MainActivity.idVol)
                .asString()
                .setCallback(new FutureCallback<String>() {
                    @Override
                    public void onCompleted(Exception e, String result) {
                        if (e != null) {
                            e.printStackTrace();
                            return;
                        }

                        try {
                            JSONArray vagasArray = new JSONArray(result);

                            if (vagasArray.length() == 0) {
                                addNoVagasMessage();
                                return;
                            }

                            for (int i = 0; i < vagasArray.length(); i++) {
                                JSONObject vagaObj = vagasArray.getJSONObject(i);
                                String nomeVaga = vagaObj.getString("nomeVaga");
                                String descricao = vagaObj.getString("descricao");
                                String nomeOng = vagaObj.getString("nomeOng");
                                String userImage = vagaObj.getString("userImage");

                                addVagaToContainer(nomeVaga, descricao, nomeOng, userImage);
                            }
                        } catch (JSONException jsonException) {
                            jsonException.printStackTrace();
                        }
                    }
                });
    }

    private void addVagaToContainer(String nomeVaga, String descricao, String nomeOng, String userImage) {
        LinearLayout vagaLayout = new LinearLayout(this);
        vagaLayout.setOrientation(LinearLayout.VERTICAL);
        vagaLayout.setPadding(16, 16, 16, 16);
        vagaLayout.setBackgroundResource(R.drawable.vaga_background);
        vagaLayout.setLayoutParams(new LinearLayout.LayoutParams(
                LinearLayout.LayoutParams.MATCH_PARENT,
                LinearLayout.LayoutParams.WRAP_CONTENT));
        vagaLayout.setGravity(Gravity.CENTER_HORIZONTAL);

        TextView textView = new TextView(this);
        textView.setText(nomeVaga + " - " + nomeOng + "\n" + descricao);
        textView.setTextSize(18);
        textView.setTextColor(Color.BLACK);
        textView.setPadding(0, 0, 0, 8);
        textView.setGravity(Gravity.CENTER_HORIZONTAL);
        vagaLayout.addView(textView);

        ImageView imageView = new ImageView(this);
        LinearLayout.LayoutParams imageParams = new LinearLayout.LayoutParams(
                LinearLayout.LayoutParams.MATCH_PARENT,
                400); // Set a fixed height for the image view
        imageView.setLayoutParams(imageParams);
        imageView.setScaleType(ImageView.ScaleType.CENTER_CROP);
        vagaLayout.addView(imageView);

        Ion.with(this)
                .load(userImage)
                .intoImageView(imageView)
                .setCallback(new FutureCallback<ImageView>() {
                    @Override
                    public void onCompleted(Exception e, ImageView result) {
                        if (e != null) {
                            imageView.setImageResource(R.drawable.ong); // Use the default image from drawable
                        }
                    }
                });

        container.addView(vagaLayout);
    }

    private void addNoVagasMessage() {
        TextView noVagasMessage = new TextView(this);
        noVagasMessage.setText("O voluntário não se inscreveu em nenhuma vaga ainda.");
        noVagasMessage.setTextSize(18);
        noVagasMessage.setTextColor(Color.RED);
        noVagasMessage.setGravity(Gravity.CENTER_HORIZONTAL);
        noVagasMessage.setPadding(16, 16, 16, 16);

        container.addView(noVagasMessage);
    }
}
