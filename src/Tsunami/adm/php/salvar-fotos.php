<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se algum dado foi enviado via POST

    // Obtém o texto editado pelo usuário
    $editedText1 = $_POST['editedText1'];
    $editedText2 = $_POST['editedText2'];

    // Salva o texto editado no localStorage do navegador
    echo "<script>localStorage.setItem('editedText1', '" . $editedText1 . "');</script>";
    echo "<script>localStorage.setItem('editedText2', '" . $editedText2 . "');</script>";

    // Verifica se um arquivo de imagem foi enviado
    if (isset($_FILES['uploadedImage']) && $_FILES['uploadedImage']['error'] === UPLOAD_ERR_OK) {
        $targetDir = 'uploads/'; // Diretório onde as imagens serão salvas
        $targetFile = $targetDir . basename($_FILES['uploadedImage']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($imageFileType, $allowedExtensions)) {
            // Move o arquivo de imagem para o diretório de destino
            if (move_uploaded_file($_FILES['uploadedImage']['tmp_name'], $targetFile)) {
                // Salva o caminho da imagem no localStorage do navegador
                echo "<script>localStorage.setItem('uploadedImage', '" . $targetFile . "');</script>";
            } else {
                echo "Erro ao fazer upload da imagem.";
            }
        } else {
            echo "Formato de arquivo inválido. Apenas imagens JPG, JPEG, PNG e GIF são permitidas.";
        }
    }

    // Obtém o modo de exibição (dark ou light)
    $mode = $_POST['mode'];

    // Salva o modo de exibição no localStorage do navegador
    echo "<script>localStorage.setItem('mode', '" . $mode . "');</script>";
}
?>
