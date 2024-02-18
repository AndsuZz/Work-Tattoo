<?php
session_start();

include("conexao.php");

if (!isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_usuario WHERE usuario = '$usuario' and senha = '$password' ";

    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) > 0) {
        // Obter os dados do usuário
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];

        // Verificar o ID do usuário
        if ($id == 95) {
            // Redirecionar o usuário com ID 91 para uma URL diferente
            header("Location: http://localhost/TCC%2020-10/adm/tsunami_adm.php");
            exit; // Certifique-se de sair para evitar redirecionamento adicional
        } elseif ($id == 101) {
            // Redirecionar o usuário com ID 101 para outra URL específica
            header("Location: http://localhost/TCC%2020-10/adm/servico_diana.php");
            exit; // Certifique-se de sair para evitar redirecionamento adicional
        } else {
            // Início da sessão e armazenamento de dados em variáveis de sessão
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['password'] = $password;
            header("Location: http://localhost/TCC%2020-10/Home-login.php"); // Redirecionar para a página desejada
        }
    } else {
        echo "<script>alert('Usuário ou senha incorretos.');</script>";
        header("Location: http://localhost/TCC%2020-10/perfil.html");
    }
} else {
    print('Não possui nenhum usuário cadastrado');
}
?>
