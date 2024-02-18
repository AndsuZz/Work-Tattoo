function handleEdit() {
  var paragraph = document.getElementById('editable-paragraph');
  var editedText = prompt('Digite o novo texto:', paragraph.innerText);
  
  if (editedText !== null) {
    paragraph.innerText = editedText;
    
    // Salvar o texto editado localmente no localStorage
    localStorage.setItem('editedText', editedText);
  }
}

window.onload = function() {
  // Verificar se há um texto editado salvo localmente
  var savedText = localStorage.getItem('editedText');
  if (savedText) {
    var paragraph = document.getElementById('editable-paragraph');
    paragraph.innerText = savedText;
  }
};
