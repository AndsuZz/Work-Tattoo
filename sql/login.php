<!DOCTYPE html>
<html>
<head>
    <style>
        #alertBox {
            display: none;
            position: fixed;
            width: 300px;
            height: 150px;
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            padding: 20px;
            border-radius: 5px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }
        #alertBox p {
            text-align: center;
        }
        #alertBox button {
            display: block;
            width: 100px;
            margin: 20px auto 0;
            padding: 5px;
            border: none;
            color: #721c24;
            background-color: #f5c6cb;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div id="alertBox">
        <p id="alertMessage"></p>
        <button onclick="closeAlert()">OK</button>
    </div>

    <script>
        function showAlert(message) {
            document.getElementById('alertMessage').innerText = message;
            document.getElementById('alertBox').style.display = 'block';
        }

        function closeAlert() {
            document.getElementById('alertBox').style.display = 'none';
        }
    </script>

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
            header("Location: http://localhost/TCC%2020-10/Home-login.php"); // Redirecionar para a página desejada
        } else {
            echo "<script>showAlert('Usuário ou senha incorretos.');</script>";
        }
    } else {
       echo "<script>showAlert('Não possui nenhum usuário cadastrado');</script>";
    }
    ?>
</body>
</html>

