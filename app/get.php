<?php
// Conexão com o banco de dados
$con = mysqli_connect("localhost", "id21913919_sitezinho123456", "123@Entra", "id21913919_voluntaria");

// Verificar a conexão
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Verificar se foi fornecido um ID de voluntário via GET
if (isset($_GET['id_voluntario'])) {
  // Filtrar o ID do voluntário para evitar injeção de SQL
  $id_voluntario = mysqli_real_escape_string($con, $_GET['id_voluntario']);

  // Consulta para obter os dados do voluntário
  $result = mysqli_query($con, "SELECT * FROM Voluntario WHERE id_voluntario = $id_voluntario");

  // Verificar se a consulta retornou resultados
  if ($row = mysqli_fetch_assoc($result)) {
    // Array associativo contendo os dados do voluntário
    $response = array(
      'nome' => $row['nome'],
      'bio' => $row['bio'],
    );

    // Enviar os dados como JSON
    echo json_encode($response);
  } else {
    // Se o voluntário não for encontrado
    echo "Voluntário não encontrado.";
  }
} else {
  // Se nenhum ID de voluntário foi fornecido
  echo "ID de voluntário não fornecido.";
}

// Fechar a conexão
mysqli_close($con);
?>
