<?php
session_start(); // Iniciar a sessão no início do script

include("conexao.php");

// Verificar se o formulário foi enviado e se os campos não estão vazios
if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Use prepared statements para evitar SQL Injection
    $stmt = $conexao->prepare("SELECT * FROM tb_usuario WHERE usuario = ? AND senha = ?");
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o usuário foi encontrado
    if ($result->num_rows > 0) {
        // Obter os dados do usuário
        $row = $result->fetch_assoc();
        $id = $row['id'];

        // Verificar o ID do usuário
        if ($id == 95) {
            // Redirecionar o usuário com ID 95 para uma URL diferente
            header("Location: http://localhost/Work-tattoo/adm/tsunami_adm.php");
            exit; // Certifique-se de sair para evitar redirecionamento adicional
        } elseif ($id == 101) {
            // Redirecionar o usuário com ID 101 para outra URL específica
            header("Location: http://localhost/Work-tattoo/adm/servico_diana.php");
            exit; // Certifique-se de sair para evitar redirecionamento adicional
        } else {
            // Início da sessão e armazenamento de dados em variáveis de sessão
            $_SESSION['usuario'] = $usuario;
            $_SESSION['password'] = $password;
            header("Location: http://localhost/Work-tattoo/Home-login.php"); // Redirecionar para a página desejada
            exit; // Saia do script após o redirecionamento
        }
    } else {
        // Se o usuário não foi encontrado
        echo "<script>alert('Usuário ou senha incorretos.');</script>";
        header("Location: http://localhost/Work-tattoo/perfil.html");
        exit; // Saia do script após o redirecionamento
    }
} else {
    // Se o formulário não foi enviado corretamente
    print('Não possui nenhum usuário cadastrado ou campos estão vazios.');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
