var link = document.querySelector('.booking-title');
var popup = document.querySelector('.booking-form');

popup.classList.add('form-hide');

link.addEventListener('click', function(event) {
  event.preventDefault();
  if (popup.classList.contains('form-hide')) {
    popup.classList.add('form-popup');
    popup.classList.remove('form-hide');
    popup.classList.remove('form-hiding');
  } else if (popup.classList.contains('form-popup')) {
    popup.classList.add('form-hiding');
    popup.classList.add('form-hide');
    popup.classList.remove('form-popup');
  }
});

window.addEventListener('keydown', function(event) {
  if (event.keyCode === 27) {
    if (popup.classList.contains('form-popup')) {
      popup.classList.add('form-hiding');
      popup.classList.add('form-hide');
      popup.classList.remove('form-popup');
    }
  }
});
