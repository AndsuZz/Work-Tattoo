function handleUpload() {
  var fileInput = document.getElementById('file-input');
  var file = fileInput.files[0];
  
  var reader = new FileReader();
  reader.onload = function(e) {
    var imageSrc = e.target.result;
    
    // Salvar a imagem localmente no localStorage
    localStorage.setItem('uploadedImage', imageSrc);
    
    // Exibir a imagem no elemento <img>
    var imgElement = document.getElementById('uploaded-image');
    imgElement.src = imageSrc;
  };
  
  reader.readAsDataURL(file);
}

window.onload = function() {
  // Verificar se existe uma imagem salva localmente
  var savedImage = localStorage.getItem('uploadedImage');
  if (savedImage) {
    var imgElement = document.getElementById('uploaded-image');
    imgElement.src = savedImage;
  }
};

