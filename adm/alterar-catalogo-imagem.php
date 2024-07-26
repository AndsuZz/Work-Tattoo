<?php
session_start(); // Iniciar a sessão no início do script

include("conexao.php");

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    die("Usuário não está autenticado. <a href='perfil.html'>Faça login</a> para continuar.");
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se o arquivo foi enviado corretamente
    if (isset($_FILES['imagem-studio']) && $_FILES['imagem-studio']['error'] == 0) {
        // Diretório de destino para salvar as imagens
        $target_dir = "../adm/imagem-estudio-tsunami/";

        // Caminho completo do arquivo de destino
        $target_file = $target_dir . basename($_FILES["imagem-studio"]["name"]);

        // Obtém a extensão do arquivo
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Permitir certos formatos de arquivo
        $valid_extensions = ["jpg", "jpeg", "png", "gif"];

        if (in_array($imageFileType, $valid_extensions)) {
            // Tenta mover o arquivo para o diretório de destino
            if (move_uploaded_file($_FILES["imagem-studio"]["tmp_name"], $target_file)) {
                // Agora você pode salvar o caminho do arquivo no banco de dados
                $caminho_tattoo = $target_file;

                // Verificar se há um nome de usuário na sessão
                if (isset($_SESSION['usuario'])) {
                    // Pegar o nome de usuário da sessão
                    $usuario = $_SESSION['usuario'];

                    // Preparar a declaração SQL correta
                    $sql = "INSERT INTO tb_imagens_studio_tsunami (caminho_imagem, imagem) VALUES (?, ?)";

                    // Preparar e executar a declaração SQL
                    $stmt = $conexao->prepare($sql);

                    // Abrir o arquivo como um BLOB para ser enviado ao banco de dados
                    $fp = fopen($target_file, "rb");
                    $imagem_blob = fread($fp, filesize($target_file));
                    fclose($fp);

                    // Bind de parâmetros
                    $stmt->bind_param("sb", $caminho_tattoo, $imagem_blob);

                    if ($stmt->execute()) {
                        echo "<script>alert('Imagem cadastrada com sucesso!');</script>";
                        echo "<script>window.location.href = 'Tsunami_adm.php';</script>";
                    } else {
                        echo "Erro ao cadastrar imagem: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Usuário não está autenticado.";
                }
            } else {
                echo "Desculpe, houve um erro ao enviar o arquivo.";
            }
        } else {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        }
    } else {
        echo "Nenhum arquivo foi enviado ou houve um erro no upload.";
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
