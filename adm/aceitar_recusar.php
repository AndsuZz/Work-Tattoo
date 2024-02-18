<?php
$dbHost = "localhost";
$dbName = "work-tattoo";
$dbUsername = "root";
$dbPassword = "";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
   // Exibir os horários marcados em uma tabela
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_horario = $_POST["id_horario"];
    $acao = $_POST["acao"];
    $observacao = $_POST["observacao"];

    // Atualizar a coluna 'evento_aceito' com base na ação
    $evento_aceito = ($acao == "Aceitar") ? "Aceito" : "Recusado";

    // Atualizar o banco de dados
    $updateSql = "UPDATE tb_marcar_horario SET evento_aceito = ?, observacao_tatuador = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ssi", $evento_aceito, $observacao, $id_horario);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Atualização bem-sucedida.";
    } else {
        echo "Erro ao atualizar o banco de dados: " . $stmt->error;
    }

    $stmt->close();
}   
?>
