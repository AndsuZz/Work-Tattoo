<!DOCTYPE html> 

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home-user-login.css">
    <link rel="icon" type="image/png" href="src/work-tattoo/logo2.svg">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/home.css">
    <script src="https://kit.fontawesome.com/34b5bf92a4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/34b5bf92a4.css" crossorigin="anonymous">
</head>

<body class="white">
    <nav>
    <div class="nav-bar">
    
            <span class="logo navLogo"><a href="Port_Worktattos.html">Work tattoos </a></span>
            
    <?php
session_start();

if (isset($_SESSION['usuario'])) {
    $nomeUsuario = $_SESSION['usuario'];
    echo "<h1 class='login-nome'>Seja bem vindo(a) $nomeUsuario</h1>";
} else {
    // Se o usuário não estiver logado, você pode exibir uma mensagem diferente ou redirecioná-los para a página de login.
    echo "Você não está logado. Por favor, faça o login primeiro.";
  header("Location: http://localhost/Work-tattoo/login.html"); 
}
?>
            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon fa-2x'></i>
                    <i class='bx bx-sun sun fa-2x'></i>
                </div>
                <a href="perfil.html"><i class="fa-regular fa-user fa-2x"  style="margin-right: 23px;"></i></a>
                <a href="agenda-user.php"><i class="fa-regular fa-calendar-days fa-2x" style="margin-right: 24px;"></i></a>
                <a href="sql/logout.php" action="sql/logout.php" method="post"><i class="fa-solid fa-right-to-bracket fa-2x"></i></a>
                
            </div>
        </div>
   
    </div>
    </nav>



    <script>

        const body = document.querySelector("body"),
            nav = document.querySelector("nav"),
            modeToggle = document.querySelector(".dark-light"),
            searchToggle = document.querySelector(".searchToggle"),
            sidebarOpen = document.querySelector(".sidebarOpen"),
            siderbarClose = document.querySelector(".siderbarClose");

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

        // js code to toggle search box
        searchToggle.addEventListener("click", () => {
            searchToggle.classList.toggle("active");
        });


        //   js code to toggle sidebar
        sidebarOpen.addEventListener("click", () => {
            nav.classList.add("active");
        });

        body.addEventListener("click", e => {
            let clickedElm = e.target;

            if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
                nav.classList.remove("active");
            }
        });

    </script>
    <div class="flex-container">
        <div class="flex">
          <figure class="card">
            <a href="tsunami-login.html">
              <img src="src/Tsunami/Tsunami-tatuador.jpg"  class="card__image" />
              <figcaption class="card__body">
                <h2 class="card__title">TSUNAMI</h2>
                <p class="card__description">
                  Especialista em traços Dark-work
                </p>
              </figcaption>
            </a>
          </figure>
        </div>
    
        <div class="flex">
          <figure class="card">
            <a href="diana-login.html">
              <img src="src/diana/Diana_home.jpg" class="card__image" />
              <figcaption class="card__body">
                <h2 class="card__title">DIANA</h2>
                <p class="card__description">
                  Especialista em tatuagens coloridas
                </p>
              </figcaption>
            </figure>
          </a>
        </div>
    
        <div class="flex">
          <figure class="card">
            <img src="src/pablo/pablo2.png" class="card__image" />
            <figcaption class="card__body">
              <h2 class="card__title">PABLO</h2>
              <p class="card__description">
                Especialista em tatuagens realistas
              </p>
            </figcaption>
          </figure>
        </div>

        
      </div>
</body>

</html>