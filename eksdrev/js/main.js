$(document).ready(function() {

  $('.clients__slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.materials__slider-box').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 1000,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});

// mobile menu

var menuNav = document.querySelector('.menu-box');
var menuItem = menuNav.querySelectorAll('li.menu-item > a');
var toggleBtn = document.querySelector('#js-toggle');
var toggleArrow = toggleBtn.querySelector('.header__toggle-btn');


toggleBtn.addEventListener('click', moveMenu);

for (var i = 0; i < menuItem.length; i++) {
  menuItem[i].addEventListener('click', moveMenu);
}


function moveMenu(){
  if(menuNav.classList.contains('nav-show')) {
      toggleArrow.classList.remove('btn-arrow-top');
      toggleArrow.classList.remove('btn-arrow-bottom');
      menuNav.classList.remove('nav-show');
     } else {
      toggleArrow.classList.add('btn-arrow-top');
      toggleArrow.classList.add('btn-arrow-bottom');
      menuNav.classList.add('nav-show');
      }
};

//scroll

$("a[href*='#']").on("click", function(e){
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top - 150
        }, 777);
        e.preventDefault();
        return false;
    });

// popup windows

var popup = document.querySelector(".popup-question");
var popupS = document.querySelector(".popup-question-thanks");
var popupBtn = document.querySelectorAll(".cloud-link");
var close = document.querySelectorAll(".popup-question-close");
var winPopup = document.querySelector(".wrap");
var formMark = document.querySelectorAll(".cloud-mark");
var formTitle = document.querySelector(".cloud-title");
var z = popupBtn.length;

function showPopup() {
  popup.classList.add("modal-content-show");
  winPopup.classList.add("modal-content-show");
};

function removePopup() {
  popup.classList.add("modal-content-hide");
  winPopup.classList.add("modal-content-hide");
  popupS.classList.remove("modal-content-show");
  setTimeout(function() {
    popup.classList.remove("modal-content-show");
    winPopup.classList.remove("modal-content-show");
    popup.classList.remove("modal-content-hide");
    winPopup.classList.remove("modal-content-hide");
  }, 600);

};

function showThank() {
  winPopup.classList.add("modal-content-show");
  popup.classList.remove("modal-content-show");
  popupS.classList.add("modal-content-show");
  setTimeout(function() {
    popupS.classList.add("modal-content-hide");
    winPopup.classList.add("modal-content-hide");
  }, 59000);
  setTimeout(function() {
    popupS.classList.remove("modal-content-show");
    winPopup.classList.remove("modal-content-show");
    popupS.classList.remove("modal-content-hide");
    winPopup.classList.remove("modal-content-hide");
  }, 60000);
};

for (var i = 0; i < z; i++) {
  popupBtn[i].addEventListener('click', function(evt) {
     evt.preventDefault();
     var current = evt.currentTarget;
     if (current.classList.contains("cloud-link")) {
     var n = z;
     while(n--) {
        if(popupBtn[n] == current) {
           var x = n;
           break;
        }
     }
     showPopup();
     formTitle.value  = 'Заявка с сайта.' + formMark[x].innerText;
   } else {
      evt.preventDefault();
     }
  });
};

/*for (var i = 0; i < popupBtn.length; i++) {
  popupBtn[i].addEventListener("click", function(event) {

    event.preventDefault();

    showPopup();

  });
}
*/

for (var i = 0; i < close.length; i++) {

  close[i].addEventListener("click", function(event) {

    event.preventDefault();

    removePopup();

  });
}

window.addEventListener("keydown", function(event) {

  if (event.keyCode === 27) {

    if (popup.classList.contains("modal-content-show")) {

      removePopup();

    }

  }

});

winPopup.addEventListener("click", function(event) {

  if (winPopup.classList.contains("modal-content-show")) {

    removePopup();

  }

});


	//E-mail Ajax Send
	$(".order-form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "http://pro-tour.by/mail.php", //Change
			data: th.serialize()
		}).done(function() {
			showThank();
      setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

});
