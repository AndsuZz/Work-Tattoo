<?php
include('conexao.php');

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$email = $_POST['email'];

// Verificar se o email já está cadastrado
$sql_verificar = "SELECT * FROM tb_usuario WHERE email = '$email'";
$resultado_verificar = mysqli_query($conexao, $sql_verificar);

if (mysqli_num_rows($resultado_verificar) > 0) {
    echo "<script>alert('O email já está cadastrado. Por favor, escolha outro email.');</script>";
    echo "<script>window.location.href = '../Registre_user.html';</script>";
} else {
    // Criptografar a senha usando base64_encode+
    

    // Inserir novo usuário com senha criptografada
    $sql_cadastrar = "INSERT INTO tb_usuario (usuario, senha, email) VALUES ('$usuario', '$password', '$email')";

    if (mysqli_query($conexao, $sql_cadastrar)) {
        echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
        echo "<script>window.location.href = '../login.html';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar usuário: " . mysqli_error($conexao) . "');</script>";
        echo "<script>window.location.href = '../Registre_user.html';</script>";
    }
}

mysqli_close($conexao);
?>
