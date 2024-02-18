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

// Obter os dados do formulário
$data = $_POST['data'];
$turno = $_POST['turno'];
$tattoo_piercing = $_POST['tattoo-piercing'];
$observacao = $_POST['observacao'];
// Recupera também a origem do formulário
$origem_formulario = $_POST['origem_formulario'];
// Diretório de destino para salvar as imagens
$target_dir = "../adm/tattoo-agendamentos-tsunami/";

// Caminho completo do arquivo de destino
$target_file = $target_dir . basename($_FILES["imagem-tattoo"]["name"]);

// Obtém a extensão do arquivo
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Tenta mover o arquivo para o diretório de destino
if (move_uploaded_file($_FILES["imagem-tattoo"]["tmp_name"], $target_file)) {
    
    // Agora você pode salvar o caminho do arquivo no banco de dados
    $caminho_tattoo = $target_file;

    // Restante do seu código para salvar no banco de dados
    // ...

} else {
    echo "Desculpe, houve um erro ao enviar o arquivo.";
}


// Permitir certos formatos de arquivo
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Verificar se há um nome de usuário na sessão
if (isset($_SESSION['usuario'])) {
  // Pegar o nome de usuário da sessão
  $usuario = $_SESSION['usuario'];

  // Atualizar o caminho da imagem para a URL correspondente
  $caminho_tattoo = "" . $target_file;

  // Fazer algo com o nome de usuário, como inserir na tabela
  $sql = "INSERT INTO tb_marcar_horario_diana (data, turno, observacao, tattoo, usuario, caminho_tattoo, origem_formulario, tattoo_piercing)
          VALUES ('$data', '$turno', '$observacao', '$target_file', '$usuario', '$caminho_tattoo' , '$origem_formulario', '$tattoo_piercing')";
  
  if ($conn->query($sql) === TRUE) {
    echo "Dados salvos com sucesso.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Fechar a conexão
$conn->close();
?>
