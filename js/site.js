// Nav toggle
document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);
        const $navbar = document.getElementById('mainNavigation');

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
        $navbar.classList.toggle('is-active');

      });
    });
  }

});

// mount splide for testimonials
document.addEventListener( 'DOMContentLoaded', function () {
  new Splide( '.splide' ).mount();
} );

// safe mode jquery
(function ($) {
  $(document).ready(function () {

    // masthead image changer
    var _intervalId;

    function fadeInLastImg() {
      var backImg = $('.masthead-images image:first');
      backImg.hide();
      $('.masthead-images').append(backImg);
      backImg.fadeIn()
    };

    _intervalId = setInterval(function () {
      fadeInLastImg();
    }, 5000);

    // Accordions
    var allTitles = $('.accordion > dt');
    var allPanels = $('.accordion > dd').hide();
    
    $('.accordion > dt > a').click(function() {
      if ($(this).parent().hasClass('active')) {
        $(this).parent().removeClass('active');
        $(this).parent().next().slideUp();
        return false;
      }

      allPanels.slideUp();
      allTitles.removeClass('active');
      $(this).parent().addClass('active');
      $(this).parent().next().slideDown();
      return false;
    });

    // People page template modal with extra bio info
    $('.person').on('click', function () {
      $('.' + this.id).addClass('is-active');
      $('html').addClass('is-clipped');
    });

    $('.modal-background, .modal-close').on('click', function () {
      $('.modal').removeClass('is-active');
      $('html').removeClass('is-clipped');
    });

    // Interview & Featured Wine image expander
    $('.expander.image').on('click', function () {
      $('.' + this.id).addClass('is-active');
      $('html').addClass('is-clipped');
    });

    $('a[href*="#"]:not([href="#"])').click(function (e) {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        $(this.hash).prop("checked", false);
      }
    });

    // Open accordion on nav click
    if (window.location.hash) {
      var hash = window.location.hash;

      console.log(hash);

      $(hash).prop("checked", false);

      $('html, body').animate({
        scrollTop: $(hash).offset().top - 20
      }, 300, 'swing');
    }

    // Mailchimp subscribe ajax message

    $('#mc-embedded-subscribe').on('click', function () {
      event.preventDefault();
      submitSubscribeForm($("#mc-embedded-subscribe-form"), $("#mce-responses"));
    });

    function submitSubscribeForm($form, $resultElement) {
      $.ajax({
        type: "GET",
        url: $form.attr("action"),
        data: $form.serialize(),
        cache: false,
        dataType: "jsonp",
        jsonp: "c",
        contentType: "application/json; charset=utf-8",
  
        error: function (error) {
          console.log('error');
          var message = error.msg || "Sorry. Unable to subscribe. Please try again later.";
          $resultElement.html(message);
        },
        success: function (data) {
          console.log('success');
          console.log(data);
          
          if (data.result != "success") {
            var fullMessage = data.msg.replace('0 -', '') || data.result;
  
            var message = fullMessage;
  
            if (data.msg && data.msg.indexOf("already subscribed") >= 0) {
              message = "You're already subscribed. Thank you!";
            }
  
            $resultElement.html(message);
  
          } else {
            $resultElement.html("Thank you!");
          }
        }
      });
    }

  })
})(jQuery);


