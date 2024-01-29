import './bootstrap';
import 'flowbite';

// navbar scroll effect
$(window).scroll(function () {
  if ($(this).scrollTop() > 50) {
      $(".navbar").addClass("navbar-scroll");
      $(".navbar").addClass("transition");
  } else {
      $(".navbar").removeClass("navbar-scroll");
      $(".navbar").addClass("transition");
  }
});

