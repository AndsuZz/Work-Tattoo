<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviço Tsunami</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="css/servico_tsunami.css">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<script src="https://kit.fontawesome.com/34b5bf92a4.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=FontName" rel="stylesheet">
<link rel="stylesheet" href="https://kit.fontawesome.com/34b5bf92a4.css" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rye&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="src/work-tattoo/logo2.svg">
<script src="js/loader.js"></script>
<script src="js/loader_tattoo.js"></script>
<link rel="stylesheet" href="css/loader-tsunami.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" type='text/css'>
</head>

<body>
    <!-- background="src/Tsunami/body_tsunami2.png" -->

    <div class="loader">
        <div class="loader-bottom"></div>
        <div class="loader-cup">
            <div class="loader-liquid"></div>
        </div>

        <div class="tattoo-machine">
            <img src="src/loader/loader_work_tattoo.png" alt="" srcset="">
        </div>

        <P class="p">
            CARREGANDO
        <div class="col-3">
            <div class="snippet" data-title="dot-falling">
                <div class="stage">
                    <div class="dot-falling"></div>
                </div>
            </div>
        </div>
        </P>
    </div>



    <nav>
        <ul class="links-tsunami">
            <li><a href="Tsunami_adm.php">Home</a></li>
            <li id="artista"><a href="catalogo_tsunami.html">Sobre o tatuador</a></li>
            <li>
                <div class="darkLight-searchBox">
                    <div class="dark-light">
                        <i class='bx bx-moon moon'></i>
                        <i class='bx bx-sun sun'></i>
                    </div>
            </li>
        </ul>
    </nav>
    </div>
    <Script>
        const body = document.querySelector("body"),
            nav = document.querySelector("nav"),
            modeToggle = document.querySelector(".dark-light"),
            searchToggle = document.querySelector(".searchToggle"),
            sidebarOpen = document.querySelector(".sidebarOpen"),
            sidebarClose = document.querySelector(".sidebarClose");

        let getMode = localStorage.getItem("mode");
        if (getMode && getMode === "dark-mode") {
            body.classList.add("dark");
        }

        // js code to toggle dark and light mode
        modeToggle.addEventListener("click", () => {
            modeToggle.classList.toggle("active");
            body.classList.toggle("dark");

            // js code to keep user selected mode even page refresh or file reopen
            if (!body.classList.contains("dark")) {
                localStorage.setItem("mode", "light-mode");
            } else {
                localStorage.setItem("mode", "dark-mode");
            }
        });
    </Script>
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>

    
    <div class="artes">
        <main class="main">
            <section id="studio">
            <div class="right-login">
                <div class="card-login">
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

    // Consulta para obter todos os horários marcados
    $sql = "SELECT mh.*, tu.email AS email
    FROM tb_marcar_horario mh 
    LEFT JOIN tb_usuario tu ON mh.usuario = tu.usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     

        echo "<div class='tb'>" .
        "<table border='1' >
            <tr class='tb'>
            <th class='tb'>Usuário</th>
                <th class='tb'>Data</th>
                <th class='tb'>Turno</th>
                <th class='tb'>Observação</th>
                <th class='tb'>Tattoo</th>
                <th class='tb'>Email para contato</th>
                <th class='tb'>Ação</th>
                <th class='tb'>Aceitar ou recusar</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["usuario"] . "</td>
            <td>" . $row["data"] . "</td>
            <td>" . $row["turno"] . "</td>
            <td>" . $row["observacao"] . "</td>
            <td>";
        
        $id_imagem = $row["id"]; // Obtém o ID da imagem do resultado da consulta
        
        // Consulta SQL para obter o caminho da imagem a partir do ID
        $sql_imagem = "SELECT caminho_tattoo FROM tb_marcar_horario WHERE id = $id_imagem";
        $result_imagem = $conn->query($sql_imagem);
        
        if ($result_imagem->num_rows > 0) {
            // Exibir a imagem como um link para abri-la em outra página
            $row_imagem = $result_imagem->fetch_assoc();
            $caminho_imagem = $row_imagem['caminho_tattoo'];
            // Criando um link em torno da imagem
            echo "<a href=\"pagina_da_imagem.php?imagem=$caminho_imagem\" target=\"_blank\" alt=\"Imagem de tatuagem\">Imagem do serviço</a>";
        } else {
            echo "Nenhuma imagem encontrada para o ID fornecido.";
        }
        echo "</td>
            <td> <a href="  .'mailto:' . $row["email"] . ">Envie um e-mail</a>
            </td>
            <td>
            <form action='aceitar_recusar.php' method='post'>
            <input type='hidden' name='id_horario' value='" . $row["id"] . "'>
            <textarea name='observacao' placeholder='Observação'></textarea>       
    </td>;
    <td>
            <button type='submit' name='acao' value='Aceitar' style='background-color: #242526; color: white; padding: 5px;'>Aceitar</button>
            <button type='submit' name='acao' value='Recusar' style='background-color: #242526; color: white; padding: 5px'>Recusar</button>
        </form>
       
               
            </td>
            
    </td>;

                
            
    </tr>";
}
    
    "</div>";
    echo "</table></div>
</div>  ";
    
    
} else {
    echo "Nenhum horário marcado.";
}


$conn->close();
?>


<footer>
        <h1>CONTATO</h1>
        <ul>

            <li><i class="fa-brands fa-instagram"><a href="https://www.instagram.com/"> Instagram Tsunami Tattoo</a></i></li>

            <li><i class="fa-brands fa-facebook"><a href="https://www.facebook.com/"> Facebook Tsunami Tattoo</a></i></li>

            <li><i class="fa-solid fa-phone-volume"><a> (45) 3264-4942 Whatsapp Tsunami</a></i></li>

        </ul>

    </footer>
</body>

</html> 