$(document).ready(function () {
  $("#hero-slider").owlCarousel({
    nav: true,
    items: 1,
    navText: [
      "<i class='fas fa-angle-left'></i>",
      "<i class='fas fa-angle-right'></i>",
    ],
    navContainer: "#slider-hero-nav",
  });

  $("#unit-slider").owlCarousel({
    loop: true,
    nav: true,
    items: 3,
    dots: false,
    margin: 20,
    navText: [
      "<i class='fas fa-angle-left'></i>",
      "<i class='fas fa-angle-right'></i>",
    ],
    navContainer: "#unit-slider-1",
  });

  $("#pengurus-slider").owlCarousel({
    loop: true,
    nav: true,
    items: 2,
    dots: false,
    margin: 20,
    navText: [
      "<i class='fas fa-angle-left'></i>",
      "<i class='fas fa-angle-right'></i>",
    ],
    navContainer: "#slider-pengurus",
  });
});
