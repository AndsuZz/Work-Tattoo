<?php
// Conectar ao banco de dados
$dbHost = "localhost";
$dbName = "work-tattoo";
$dbUsername = "root";
$dbPassword = "";

$conn = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
// Verificar a conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Diretório de destino para salvar as imagens
$target_dir = "web-site-tsunami/";

// Caminho completo do arquivo de destino
$target_file = $target_dir . basename($_FILES["imagem-tattoo"]["name"]);

// Obtém a extensão do arquivo
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Tenta mover o arquivo para o diretório de destino
if (move_uploaded_file($_FILES["imagem-tattoo"]["tmp_name"], $target_file)) {
    
    // Agora você pode salvar o caminho do arquivo no banco de dados
    $caminho_tattoo = $target_file;

    // Verificar se há um nome de usuário na sessão
    if (isset($_SESSION['usuario'])) {
      // Pegar o nome de usuário da sessão
      $usuario = $_SESSION['usuario'];

      // Fazer algo com o nome de usuário, como inserir na tabela
      $sql = "INSERT INTO tb_imagens_tattoo_studio_tsunami (studio_id, caminho_imagem)
              VALUES ('$usuario', '$caminho_tattoo')";
      
      if ($conn->query($sql) === TRUE) {
        echo "Imagem cadastrada com sucesso.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
} else {
    echo "Desculpe, houve um erro ao enviar o arquivo.";
}

// Fechar a conexão
$conn->close();
?>
