<?php
// Conectar ao banco de dados
$dbHost = "localhost";
$dbName = "work-tattoo";
$dbUsername = "root";
$dbPassword = "";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Verificar se há um nome de usuário na sessão
if (isset($_SESSION['usuario'])) {
    // Pegar o nome de usuário da sessão
    $usuario = $_SESSION['usuario'];

    // Diretório de destino para salvar as imagens
    $target_dir = "imagem-estudio-tsunami/";

    // Caminho completo do arquivo de destino
    $target_file = $target_dir . basename($_FILES["imagem-studio"]["name"]);

    // Obtém a extensão do arquivo
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar se o arquivo é uma imagem
    $check = getimagesize($_FILES["imagem-studio"]["tmp_name"]);
    if ($check === false) {
        die("O arquivo enviado não é uma imagem.");
    }

    // Tenta mover o arquivo para o diretório de destino
    if (move_uploaded_file($_FILES["imagem-studio"]["tmp_name"], $target_file)) {
        // Preparar a declaração SQL
        $stmt = $conn->prepare("INSERT INTO tb_imagens_studio_tsunami (caminho_imagem, imagem) VALUES (?, ?)");
        $imagem_binaria = file_get_contents($target_file);
        $stmt->bind_param("ss", $target_file, $imagem_binaria);

        // Executar a declaração
        if ($stmt->execute()) {
            echo "Dados salvos com sucesso.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Fechar a declaração
        $stmt->close();
    } else {
        echo "Desculpe, houve um erro ao enviar o arquivo.";
    }
} else {
    echo "Usuário não encontrado na sessão.";
}

// Fechar a conexão
$conn->close();