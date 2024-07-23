<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tsunami</title>
    <link rel="stylesheet" href="css/Page_Tsunami.css">
    <link rel="stylesheet" href="css/respon.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/34b5bf92a4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/34b5bf92a4.css" crossorigin="anonymous">
    <script src="js/loader.js"></script>
    <script src="js/loader_tattoo.js"></script>
    <link rel="stylesheet" href="css/loader-tsunami.css">



<style>   .message-box {
    display: none;
    position: absolute;
    top: 80px;
    right: 20px;
    padding: 10px;
    border-radius: 5px;
    font-size: 30px;
    color: white;
    animation: slideInRight 1s forwards, fadeOut 6s 2s forwards;
}

@keyframes slideInRight {
    from {
        right: -200px; /* Inicia fora da tela à direita */
    }
    to {
        right: 20px; /* Termina na posição original */
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}
.message-box.success { background-color: hsl(120, 100%, 25%); }
.message-box.error { background-color: #ff0000; }
.message-box.info { background-color: #0000ff; }

  </style>

</head>
<body  background="src/Tsunami/body_tsunami2.png">
<!-- 
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
    </div> -->

    <nav>
        <ul class="links-tsunami">
            <li><a href="Home.html">Home</a></li>
            <li><a href="servico_tsunami.php">Serviços</a></li>
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

        modeToggle.addEventListener("click", () => {
            modeToggle.classList.toggle("active");
            body.classList.toggle("dark");

            if (!body.classList.contains("dark")) {
                localStorage.setItem("mode", "light-mode");
            } else {
                localStorage.setItem("mode", "dark-mode");
            }
        });
    </script>
    <scrip src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <section id="studio">
        <div class="artes">
            <main>
                <br><br><br>
              
            <main>
             
            <?php
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
$message_type = isset($_SESSION['message_type']) ? $_SESSION['message_type'] : '';
unset($_SESSION['message']);
unset($_SESSION['message_type']);
?>

            
<?php if ($message): ?>
    <div id="message-box" class="message-box <?php echo $message_type; ?>">
        <?php echo $message; ?>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var messageBox = document.getElementById('message-box');
            if (messageBox) {
                messageBox.style.display = 'block';
                setTimeout(function() {
                    messageBox.style.display = 'none';
                }, 5000);
            }
        });
    </script>
    <?php endif; ?>


    
            <form id="form0" action='alterar-catalogo-text.php' method='post'>
    <textarea name='observacao0' placeholder='Titulo site' style='width: 100%; height: 150px; border-radius: 8px; border: 1px solid #ccc; padding: 10px; font-size: 16px;'></textarea>
    <input type="hidden" name="id_horario" value="<?php echo $row['id']; ?>">
    <button type='submit' style='background-color: #242526; color: white; padding: 10px 20px; border: none; border-radius: 8px; font-size: 16px;'>Alterar</button>
</form>

<br>
<br>
<script>
        // Função para pré-visualizar a imagem selecionada
        function previewImagem() {
            const input = document.getElementById('imagem-studio');
            const preview = document.getElementById('imagem-preview');

            // Verificar se um arquivo foi selecionado
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Definir o src da imagem de pré-visualização
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Exibir a imagem
                }

                reader.readAsDataURL(input.files[0]); // Ler o arquivo como URL
            } else {
                preview.src = ''; // Limpar pré-visualização se nenhum arquivo foi selecionado
                preview.style.display = 'none'; // Esconder a imagem
            }
        }
    </script>

<form action="alterar-catalogo-imagem.php" method="post" enctype="multipart/form-data">
        <input 
            style="background-color: #242526; color: white; padding: 10px 20px; border: none; border-radius: 8px; font-size: 16px;" 
            type="file" 
            name="imagem-studio" 
            id="imagem-studio" 
            required
        />
        <button type="submit" style="background-color: #242526; color: white; padding: 10px 20px; border: none; border-radius: 8px; font-size: 16px;">Alterar</button>
    </form>


                      
                <br>
                <i class="fa-solid fa-location-dot"><a href="localização.html" id="localtsu"> Localização Studio</a></i> 
                <br>
                <br>
                <div class="descricao_tsunami">
                    <div class="couteiner">
                        
                    <form id="form1" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao">Desenvolvimento </label>
                        <textarea name='observacao1' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>
                    </div>
                </div>
            </main>
        </div>
    </section>
    <div class="image-home-tsunami3">
        <h1 class="discri-quadro-tsunami">
        <form id="form2" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao">Titulo quadros </label>
                        <textarea name='observacao2' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>

                
        <p class="discri-quadro-tsunami-bio">
        <form id="form3" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao">Subtitulo quadros</label>
                        <textarea name='observacao3' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>

                
            <br>
         
            <p class="discri-quadro-tsunami-bio">
            <form id="form5" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao">Desenvolvimento </label>
                        <textarea name='observacao5' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>

                
            <br>
         

                
        </p>
        </h1>
    </div>








    <div class="flex-container">
        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img1.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
                    <p class="card__description">
                    <form id="form7" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao"> </label>
                        <textarea name='observacao7' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>

                
                    </p>
                </figcaption>
            </figure>
        </div>

        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img2.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
                    <p class="card__description">
                    <form id="form8" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao"></label>
                        <textarea name='observacao8' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>

                
                    </p>
                </figcaption>
            </figure>
        </div>

        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img3.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
                    <p class="card__description">
                    <form id="form9" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao"></label>
                        <textarea name='observacao9' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>

                
                    </p>
                </figcaption>
            </figure>
        </div>
        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img4.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
                    <p class="card__description">
                    <form id="form10" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao"></label>
                        <textarea name='observacao10' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>

                
                    </p>
                </figcaption>
            </figure>
        </div>
        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img5.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
                    <p class="card__description">
                    <form id="form11" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao"></label>
                        <textarea name='observacao11' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>

                
                    </p>
                </figcaption>
            </figure>
        </div>
        <div class="flex">
            <figure class="card">
                <img src="src/tattoo/tattoo_tsunami/img6.jpg" width="450px" height="400px"
                    class="card__image" />
                <figcaption class="card__body">
                    <p class="card__description">
                    <form id="form12" action='alterar-catalogo-text.php' method='post'>
                        <label for="observacao"></label>
                        <textarea name='observacao12' placeholder='Titulo site'></textarea>   
                    <button type='submit' style='background-color: #242526; color: white; padding: 5px;'>Alterar</button>
                </form>

                
                    </p>
                </figcaption>
            </figure>
        </div>
    </div>
</div>

    <footer >
        <h1>CONTATO</h1>
        <ul>
            <li><i class="fa-brands fa-instagram"><a href="https://www.instagram.com/"> Studio Fulano </a></i></li>
            <li><i class="fa-brands fa-facebook"><a href="https://www.facebook.com/"> Studio Fulano </a></i></li>
            <li><i class="fa-solid fa-phone-volume"><a> (45) 3264-4942</a></i></li>
        </ul>
    </footer>
</body>
</html>