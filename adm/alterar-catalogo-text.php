<?php
// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Obter os dados do formulário
    $observacoes = [];
    for ($i = 0; $i <= 12; $i++) {
        $observacao = isset($_POST['observacao' . $i]) ? $_POST['observacao' . $i] : '';
        $observacoes[] = $observacao;
    }

    // Verificar se existem dados para atualizar
    $checkIfExists = "SELECT * FROM tb_observacoes_texto WHERE id = 5"; // Supondo que o ID seja 5
    $result = $conn->query($checkIfExists);

    if ($result->num_rows > 0) {
        // Construir a consulta SQL para atualizar
        $updateQuery = "UPDATE tb_observacoes_texto SET ";
        $updates = [];
        for ($i = 0; $i < count($observacoes); $i++) {
            if ($observacoes[$i] !== '') {
                $updates[] = "observacao" . $i . " = '" . $conn->real_escape_string($observacoes[$i]) . "'";
            }
        }
        $updateQuery .= implode(", ", $updates) . " WHERE id = 5"; // Supondo que o ID seja 5

        // Executar a consulta de atualização
        if (!empty($updates)) {
            if ($conn->query($updateQuery) === TRUE) {
                echo "Dados atualizados com sucesso.";
            } else {
                echo "Error: " . $updateQuery . "<br>" . $conn->error;
            }
        } else {
            echo "Nenhum dado para atualizar.";
        }
    } else {
        // Se não existem dados para atualizar, realizar uma inserção
        $insertObservacao = isset($_POST['observacao0']) ? $_POST['observacao0'] : '';

        $insertQuery = "INSERT INTO tb_observacoes_texto (observacao0, observacao1, observacao2, observacao3, observacao4, observacao5, observacao6, observacao7, observacao8, observacao9, observacao10, observacao11, observacao12)
            VALUES ('" . $conn->real_escape_string($insertObservacao) . "', '" . implode("', '", array_map(array($conn, 'real_escape_string'), $observacoes)) . "')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "Novo registro criado com sucesso.";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
