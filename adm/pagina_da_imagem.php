
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
        
            <h2>
                <section id="studio">

                <?php
if (isset($_GET['imagem'])) {
    $caminho_imagem = $_GET['imagem'];
    echo "<img src='" . $caminho_imagem . "' class='tamanho-imagem' alt='Imagem de tatuagem'>";
} else {
    echo "Nenhuma imagem encontrada.";
}

?>

</body>

</html>