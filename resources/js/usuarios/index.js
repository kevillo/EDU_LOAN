const customAlert = document.querySelector('.custom-alert');

// Muestra la alerta
customAlert.classList.add('show');

// Oculta la alerta después de 3 segundos
setTimeout(function () {
    customAlert.classList.add('hide');
}, 3000);

// Elimina la alerta después de 4 segundos
setTimeout(function () {
    customAlert.remove();
}, 4000);