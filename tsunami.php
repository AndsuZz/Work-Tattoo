<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tsunami</title>
    <link rel="stylesheet" href="css/Page_Tsunami.css">
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
            <li><a href="Home.html">Home</a></li>
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


    <script>
        function isElementInViewport(element) {
            var rect = element.getBoundingClientRect();
            return (
                rect.bottom >= 0 &&
                rect.right >= 0 &&
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.left <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function addAnimationClass() {
            var imageElement = document.querySelector('.image-home-tsunami');
            imageElement.classList.add('visible');
        }


        window.addEventListener('scroll', scrollHandler);
    </script>


    <div class="artes">
        <main class="main">

            <section id="studio">
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
    $sql = "SELECT observacao0 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["observacao0"] . "</h2><br>"; // Outputting HTML using echo
        }
    }
?>

            </section>
            <h2>
            <?php
include("sql/conexao.php");

// Verifique se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Consulta para obter o ID da imagem (presumindo que a consulta já foi feita anteriormente)
$sql = "SELECT id FROM tb_imagens_studio_tsunami ORDER BY id DESC LIMIT 1";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_imagem = $row["id"]; // Obtém o ID da imagem do resultado da consulta
    
    // Consulta SQL para obter o caminho da imagem a partir do ID
    $sql_imagem = "SELECT caminho_imagem FROM tb_imagens_studio_tsunami WHERE id = $id_imagem";
    $result_imagem = $conexao->query($sql_imagem);
    
    if ($result_imagem->num_rows > 0) {
        // Exibir a imagem como um link para abri-la em outra página
        $row_imagem = $result_imagem->fetch_assoc();    
        $caminho_imagem = $row_imagem['caminho_imagem'];
        
        // Construir a URL da imagem com base no caminho
        $url_imagem = "http://localhost/Work-Tattoo/adm/imagem-estudio-tsunami/" . $caminho_imagem;
        
        // Criar um link para a imagem
        echo "<a href=\"paginateste.php?imagem=$url_imagem\" target=\"_blank\" alt=\"Imagem de tatuagem\">Imagem da Tattoo</a>";
    } else {
        echo "Nenhuma imagem encontrada para o ID fornecido.";
    }
} else {
    echo "Nenhuma imagem encontrada.";
}

$conexao->close();
?>




<br>
            <i class="fa-solid fa-location-dot"><a href="localização.html" id="localtsu" class="discri-imagem-home">
                Localização Studio
                </a></i>
            </h2>
            
            <script>
                function isElementInViewport(element) {
                    var rect = element.getBoundingClientRect();
                    return (
                        rect.bottom >= 0 &&
                        rect.right >= 0 &&
                        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                        rect.left <= (window.innerWidth || document.documentElement.clientWidth)
                    );
                }
            
                function addAnimationClassOnScroll() {
                    var animatedElement = document.getElementById('animatedElement');
                    if (isElementInViewport(animatedElement)) {
                        animatedElement.classList.add('visible'); // Adicione a classe ao elemento pai
                        window.removeEventListener('scroll', addAnimationClassOnScroll);
                    }
                }
            
                window.addEventListener('scroll', addAnimationClassOnScroll);
            </script>
               
        
            <h2>
                <section id="studio">

                    

                    <br>
                    <br>
                    <div class="descricao-tsunami" id="animatedElement">
                        <div class="container" id="animatedElement2">
                            <h2>
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
    $sql = "SELECT observacao1 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo " <h2>
            <p class='discr-tsunami'>" . $row["observacao1"] . "</h2><br>"; // Outputting HTML using echo
        }
    }
?>
                                </p>
                            </h2>
                        </div>
                    </div>
    </div>


    
    <!-- 
   <div>
    <img class="image-home-tsunami2">
</div> -->


    <script>
        function isElementInViewport(element) {
            var rect = element.getBoundingClientRect();
            return (
                rect.bottom >= 0 &&
                rect.right >= 0 &&
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.left <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function addAnimationClass() {
            var element = document.querySelector('.discri-quadro-tsunami');
            element.classList.add('visible');
            var imageElement = document.querySelector('.image-home-tsunami3');
            imageElement.classList.add('visible');
        }

        function scrollHandler() {  
            var imageElement = document.querySelector('.image-home-tsunami3');
            if (isElementInViewport(imageElement)) {
                addAnimationClass();
                window.removeEventListener('scroll', scrollHandler);
            }
        }

        window.addEventListener('scroll', scrollHandler);
    </script>

    
    <div class="image-home-tsunami3">
        
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


    $sql = "SELECT observacao2 FROM tb_observacoes_texto"; //
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h1 class='discri-quadro-tsunami'> " . $row["observacao2"] . 
            "<br>" ; 
        }
    }
?>
         
        
        
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


    $sql = "SELECT observacao3 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='discri-quadro-tsunami-bio'>" . $row["observacao3"] .  "";
        }
    }
?>
        </p><br>
            
            
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
    $sql = "SELECT observacao4 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='discri-quadro-tsunami-bio'>" . $row["observacao4"] . " </p>
            </h1>
        </div>"; // Outputting HTML using echo
        }
    }
?>
       







    <script>

        document.addEventListener('DOMContentLoaded', function () {
            function isElementInViewport(element) {
                var rect = element.getBoundingClientRect();
                return (
                    rect.bottom >= 0 &&
                    rect.right >= 0 &&
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.left <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }
        
            function addAnimationClass() {
                var cardContainers = document.querySelectorAll('.flex');
                cardContainers.forEach(function (container) {
                    container.classList.add('animation');
                });
            }
        
            function scrollHandler() {  
                var cardContainers = document.querySelectorAll('.flex');
                cardContainers.forEach(function (container) {
                    if (isElementInViewport(container)) {
                        addAnimationClass();
                    }
                });
            }
        
            window.addEventListener('scroll', scrollHandler);
        });
    </script>   
    <div class="flex-container">
        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img1.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
                    
                  
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


    $sql = "SELECT observacao7 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='card__description'>" . $row["observacao7"] .  "    </p>";
        }
    }
?>
                
                </figcaption>
            </figure>
        </div>

        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img2.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
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


    $sql = "SELECT observacao8 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='card__description'>" . $row["observacao8"] .  "    </p>";
        }
    }
?>
   
                </figcaption>
            </figure>
        </div>

        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img3.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
                
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


    $sql = "SELECT observacao9 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='card__description_text_long'>" . $row["observacao9"] .  "    </p>";
        }
    }
?>
   
                </figcaption>
            </figure>
        </div>
        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img4.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
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


    $sql = "SELECT observacao10 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='card__description'>" . $row["observacao10"] .  "    </p>";
        }
    }
?>
                </figcaption>
            </figure>
        </div>
        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img5.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
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


    $sql = "SELECT observacao11 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='card__description'>" . $row["observacao11"] .  "    </p>";
        }
    }
?>
                </figcaption>
            </figure>
        </div>
        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img6.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
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


    $sql = "SELECT observacao12 FROM tb_observacoes_texto"; // Assuming 'observacao' is a column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p class='card__description'>" . $row["observacao12"] .  "    </p>";
        }
    }
?>
                </figcaption>
            </figure>
        </div>
    </div>
</div>


<section id="studio">
    <h2>Para marcar Horario é preciso criar uma conta</h2>
    <br>
<h3> <i class="fa-sharp fa-solid fa-marker"><a href="horario_cli_tsunami.html" id="cadastro"> Marcar
    Horario</a></i>
</h3>
<br>
</section>
    <br>
    <br>
    </section>


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