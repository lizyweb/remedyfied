document.addEventListener('DOMContentLoaded', () => {
  
    //Page Slider
  
    function pageSlider() {
      $('.page-slider').slick({
          fade: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          dots: false,
          speed: 600,
          arrows: true,
          prevArrow: '<button type="button" class="carousel-control left" aria-label="carousel-control"><i class="fas fa-chevron-left"></i></button>',
          nextArrow: '<button type="button" class="carousel-control right" aria-label="carousel-control"><i class="fas fa-chevron-right"></i></button>'
      });
  }
  pageSlider();
  
  });

  document.addEventListener('DOMContentLoaded', () => {
    "use strict";
  
    window.onpageshow = function(event) {
      if (event.persisted) {
        location.reload(); // Reload the page when navigated back to
      }
    };
  
  });