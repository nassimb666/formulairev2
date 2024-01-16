function checkPassword() {
    var password = document.getElementById('password').value;
    var message = document.getElementById('message');

    var minLength = 8;

    if (password.length < minLength) {
      message.textContent = 'Le mot de passe doit contenir au moins ' + minLength + ' caractères.';
    } else {
      message.textContent = 'Mot de passe valide.';
    }
  }