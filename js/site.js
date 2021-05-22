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

// mount splide only on homepage
if (window.location.pathname === '/' && window.location.search === '') {
  // mount splide for testimonials
  document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide').mount();
  });
}

// safe mode jquery
(function ($) {
  $(document).ready(function () {

    // masthead image changer

    function fadeInLastImg(className) {
      var backImg = $('.'+className+'-masthead-images image:first');
      backImg.hide();
      $('.'+className+'-masthead-images').append(backImg);
      backImg.fadeIn();
    };

    if (window.location.pathname === '/') {
      setInterval(function () {
        fadeInLastImg('desktop');
        fadeInLastImg('mobile');
      }, 5000);
    }

    // Accordions
    var allTitles = $('.accordion > dt');
    var allPanels = $('.accordion > dd').hide();

    $('.accordion > dt > a').click(function () {
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

    var modalIsActive = document.getElementsByClassName('modal is-active');
    // blur & clip background when modals are active 

    if (modalIsActive.length > 0) {
      document.documentElement.classList.add('is-clipped');
    }

    function modalOff() {
      modalIsActive[0].classList.remove('is-active');
      document.documentElement.classList.remove('is-clipped');
    }

    // People page template modal with extra bio info
    $('.person').on('click', function () {
      $('.' + this.id).addClass('is-active');
      $('html').addClass('is-clipped');
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

    // Set up mailchimp subscription vars
    
    if (localStorage.getItem("subscribed") === null) {
      localStorage.setItem("subscribed", "false");
    }

    if (sessionStorage.getItem("opt_out") == null) {
      sessionStorage.setItem("opt_out", "false");
    }

    // subscribe wall if on search results page or single winery page
    if (window.location.search || (window.location.pathname.indexOf("/wineries/") != -1)) {
      var subscribeWall = document.getElementById("subscribeWall"),
          htmlClasses = document.documentElement.classList;

      // check if either key is true and move if there is a true
      if (
        sessionStorage.getItem("opt_out") == "true" ||
        localStorage.getItem("subscribed") == "true"
        ) {
      } else {
        // show subscribe wall if both are false
        if (
          sessionStorage.getItem("opt_out") == "false" ||
          localStorage.getItem("subscribed") == "false"
          ) {
          subscribeWall.classList.add("is-active");
          htmlClasses.add("is-clipped");
        }
      }

      document.getElementById("optOut").onclick = function (e) {
        e.preventDefault();
        sessionStorage.setItem("opt_out", "true");
        modalOff();
      }
    } else {
      $('.modal-background, .modal-close').on('click', function () {
        modalOff()
      });
    }

    // Mailchimp subscribe ajax success error message
    $('#mc-embedded-subscribe').on('click', function () {
      event.preventDefault();
      submitSubscribeForm($("#mc-embedded-subscribe-form"), $("#mce-embedded-responses"));
    });

    $('#mc-modal-subscribe').on('click', function () {
      event.preventDefault();
      submitSubscribeForm($("#mc-modal-subscribe-form"), $("#mce-modal-responses"));
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
          setTimeout(() => {
            modalOff()
          }, 4000);
          var message = error.msg || "Sorry. Unable to subscribe. Please try again later.";
          $resultElement.html(message);
        },
        success: function (data) {

          if (data.result != "success") {
            var fullMessage = data.msg.replace('0 -', '') || data.result;

            var message = fullMessage;

            if (data.msg && data.msg.indexOf("already subscribed") >= 0) {
              message = "You're already subscribed. Thank you!";
              localStorage.setItem("subscribed", "true");
              setTimeout(() => {
                modalOff()
              }, 4000);
            }

            if (data.msg && data.msg.indexOf("too many recent signup requests") >= 0) {
              // message = "Recipeint !";
              console.log($form);
              
              // localStorage.setItem("subscribed", "true");s
              setTimeout(() => {
                modalOff()
              }, 4000);
            }

            $resultElement.html(message);

          } else {
            $resultElement.html("Thank you!");
            // log that user has subscribed in localStorage
            localStorage.setItem("subscribed", "true");
            setTimeout(() => {
              modalOff()
            }, 4000);
          }
        }
      });
    }

    // end safe mode jquery
  })
})(jQuery);


