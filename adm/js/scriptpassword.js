let btn = document.querySelector('.fa-eye');
btn.addEventListener('click', function() {
  
    let input = document.querySelector('#password');

    if(input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
        
        
    } else {
        
        input.setAttribute('type', 'password');
       
    }
    this.classList.toggle('fa-eye-slash');
});
