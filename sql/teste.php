<?php
// conexao.php
$dbHost = "localhost";
$dbName = "work-tattoo";
$dbUsername = "root";
$dbPassword = "";

// Criando conexão
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificando conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
// Consultar o último registro na tabela
$sql = "SELECT caminho_imagem FROM tb_imagens_studio_tsunami ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se houver resultados, buscar o caminho da imagem
    $row = $result->fetch_assoc();
    $caminho_imagem = $row['caminho_imagem'];

    // Exibir o caminho para debug
    echo "<p>Caminho da imagem: " . htmlspecialchars($caminho_imagem) . "</p>";

    // Verificar se o caminho é relativo ou absoluto
    if (!file_exists($caminho_imagem)) {
        // Se o caminho não existir, tente corrigir se for relativo
        $caminho_imagem = __DIR__ . '/' . $caminho_imagem;
    }

    // Verificar se o caminho é acessível e se a imagem existe
    if (file_exists($caminho_imagem)) {
        // Exibir a imagem
        echo "<h2>Última Imagem Cadastrada:</h2>";
        echo "<img src='" . htmlspecialchars($caminho_imagem) . "' alt='Última Imagem Cadastrada' style='max-width: 100%; height: auto;'/>";
    } else {
        echo "<p>O arquivo de imagem não foi encontrado ou o caminho está incorreto.</p>";
        echo "<p>Caminho verificado: " . htmlspecialchars($caminho_imagem) . "</p>";
    }
} else {
    echo "Nenhuma imagem encontrada.";
}

// Fechar a conexão
$conn->close();
?>
