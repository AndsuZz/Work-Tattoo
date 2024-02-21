<?php
session_start();

include("conexao.php");

if (!isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_usuario WHERE usuario = '$usuario' and senha = '$password' ";

    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) > 0) {
        // Início da sessão e armazenamento de dados em variáveis de sessão
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = $password;
        header("Location: http://localhost/Work-tattoo/Home-login.php"); // Redirecionar para a página desejada
    } else {
        echo "<script>alert('Usuário ou senha incorretos.');</script>";
        header("Location: http://localhost/Work-tattoo/perfil.html");
    }
} else {
    print('Não possui nenhum usuário cadastrado');
}


?>  