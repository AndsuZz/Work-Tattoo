

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Agenda</title>
    <link rel="icon" type="image/png" href="src/work-tattoo/logo2.svg">
    <link rel="stylesheet" href="sql/login.php">
    
    
    

</head>

<body>

    <main>
        <div class="left-login">
        <?php
session_start();

if (isset($_SESSION['usuario'])) {
    $nomeUsuario = $_SESSION['usuario'];
    echo "<h1 class='login-nome'>Obrigado (a) $nomeUsuario<br> Por ter escolhido a plataforma</h1>";
}
?>
            <img class="left-login-image" src="src/work-tattoo/logo1.png">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Agenda</h1>
                <?php


$dbHost = "localhost";
$dbName = "work-tattoo";
$dbUsername = "root";
$dbPassword = "";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    die("Usuário não autenticado.");// Ou você pode redirecionar para a página de login
}

// Nome do usuário que você deseja verificar
$usuario = $_SESSION['usuario']; // Obtém o nome do usuário da sessão

// Consulta SQL para obter os horários marcados pelo usuário
$sql = "SELECT * FROM tb_marcar_horario_diana WHERE usuario = '$usuario'";
$sql1 = "SELECT * FROM tb_marcar_horario WHERE usuario = '$usuario'";

$result = $conn->query($sql);
$result1 = $conn->query($sql1);

if ($result->num_rows > 0 ){
    // Exibir os horários marcados pelo usuário
    echo "<h2 class='titulo-agenda'>Horários marcados por $usuario:</h2>";
    echo "<ul> <br>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<table style='border: 2px solid #FF3131;'>";

        // Exibir os dados comuns das duas tabelas
        echo "<tr>
                <td class='nome-agenda'>Tatuador:</td>
                <td class='agenda'>" . $row["origem_formulario"] . "</td>
              </tr>
              <tr>
                <td class='nome-agenda'>Tattoo ou Piercing:</td>
                <td class='agenda'>" . $row["tattoo_piercing"] . "</td>
              </tr>
              <tr>
                <td class='nome-agenda'>Status:</td>
                <td class='agenda'>" . $row["evento_aceito"] . "</td>
              </tr>
              <tr>
                <td class='nome-agenda'>Data:</td>
                <td class='agenda'>" . $row["data"] . "</td>
              </tr>
              <tr>
                <td class='nome-agenda'>Turno:</td>
                <td class='agenda'>" . $row["turno"] . "</td>
              </tr>
              <tr>
                <td class='nome-agenda'> Resposta do Tatuador: </td>
                <td class='agenda'>" . $row["observacao_tatuador"] . "</td>
              </tr>";

        // Adicione aqui outras informações específicas de cada tabela, se necessário

        echo "</table><br><br>";
    }
    echo "</ul>";

} else {
    echo "<h2 class='nome-agenda'>Nenhum horário marcado por $usuario. </h2>"; 
}

if ($result1->num_rows > 0) {
   
    echo "<ul>";
    while ($row = $result1->fetch_assoc()) {
        echo "<table style='border: 2px solid #FF3131;'>";

        // Exibir os dados comuns das duas tabelas
        echo "<tr>
                <td class='nome-agenda'>Tatuador:</td>
                <td class='agenda'>" . $row["origem_formulario"] . "</td>
              </tr>
              <tr>
                <td class='nome-agenda'>Status:</td>
                <td class='agenda'>" . $row["evento_aceito"] . "</td>
              </tr>
              <tr>
                <td class='nome-agenda'>Data:</td>
                <td class='agenda'>" . $row["data"] . "</td>
              </tr>
              <tr>
                <td class='nome-agenda'>Turno:</td>
                <td class='agenda'>" . $row["turno"] . "</td>
              </tr>
              <tr>
                <td class='nome-agenda'> Resposta do Tatuador: </td>
                <td class='agenda'>" . $row["observacao_tatuador"] . "</td>
              </tr>";

        // Adicione aqui outras informações específicas de cada tabela, se necessário

        echo "</table><br><br>";
    }
    echo "</ul>";

}
$conn->close();
?>

            </div>
        </div>
    </main>

    <script src="js/scriptpassword.js"></script>
    <script src="js/scriptlogin.js"></script>
</body>

</html>