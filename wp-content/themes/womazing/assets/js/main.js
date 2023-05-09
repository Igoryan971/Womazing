/**FIRST SCREEN SLIDER **/
$(document).ready(function () {
  $(".offer-wrapper").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    fade: false,
    autoplay: false,
    autoplaySpeed: 4000,
    asNavFor: ".photo-wrapper",
  });
  $(".photo-wrapper").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: ".offer-wrapper",
    dots: false,
    arrows: false,
    infinite: true,
    speed: 500,
    fade: false,
    cssEase: "linear",
    centerMode: false,
    focusOnSelect: false,
  });
  $(".slider-wrapper").slick({
    infinite: true,
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          arrows: false,
        },
      },
    ],
  });
});

/*Табы категории магазина*/
$(document).ready(function () {
  $(".categories-wrapper").each(function () {
    let ths = $(this);
    ths
      .find("#menu-categories > li > a")
      .click(function () {
        ths
          .find("#menu-categories > li > a")
          .removeClass("active")
          .eq($(this).index())
          .addClass("active");
      })
      .eq(0)
      .addClass("active");
  });
});
/*Табы размеры */
$(document).ready(function () {
  $(".size-wrapper").each(function () {
    let ths = $(this);
    ths
      .find(".size__item")
      .click(function () {
        ths
          .find(".size__item")
          .removeClass("active")
          .eq($(this).index())
          .addClass("active");
      })
      .eq(0)
      .addClass("active");
  });
});
/*Табы цвет */
$(document).ready(function () {
  $(".color-wrapper").each(function () {
    let ths = $(this);
    ths
      .find(".color__item")
      .click(function () {
        ths
          .find(".color__item")
          .removeClass("active")
          .eq($(this).index())
          .addClass("active");
      })
      .eq(0)
      .addClass("active");
  });
});

/* HAMBURGER */
$(document).ready(function () {
  $(".hamburger").on("click", function () {
    $(".hamburger__menu").toggleClass("active");
    $(".hamburger").toggleClass("active");
  });
});
/*Arrow-down */
$(document).ready(function () {
  $(".arrow-down").click(function () {
    var el = $(this).attr("href");
    $("body, html").animate({ scrollTop: $(el).offset().top + "px" }, "show");
    return false;
  });
});

/* Прибитая шапка */

$(window).on("scroll load resize", function () {
  var pixelTop = $(window).scrollTop();
  if (pixelTop > 0 && $(document).width() > 998) {
    $(".header").addClass("active");
    $("body#bodyAll").addClass("scroll");
  } else if (pixelTop < 1) {
    $(".header").removeClass("active");
    $("body#bodyAll").removeClass("scroll");
  }
});
/* Прибитая шапка главная страница*/

$(window).on("scroll load resize", function () {
  var pixelTop = $(window).scrollTop();
  if (pixelTop > 832 && $(document).width() > 998) {
    $(".header-main").addClass("active");
    $("body#bodyMain").addClass("scroll-main");
  } else if (pixelTop < 832) {
    $(".header-main").removeClass("active");
    $("body#bodyMain").removeClass("scroll-main");
  }
});

/*Modal window */

$(document).ready(function () {
  $("#tel__logo").on("click", function () {
    $("#wrapper-modal").addClass("active");
    $("body").addClass("active");
  });
  $("#mobile-tel__logo").on("click", function () {
    $("#wrapper-modal").addClass("active");
    $("body").addClass("active");
  });
  $("#overlay").on("click", function () {
    $("#wrapper-modal").removeClass("active");
    $("body").removeClass("active");
  });
  $("#btn-close").on("click", function () {
    $("#wrapper-modal").removeClass("active");
    $("body").removeClass("active");
  });
  $(".valid__btn").on("click", function () {
    $("#wrapper-modal__valid").removeClass("active");
    $("body").removeClass("active");
  });
  $("#overlay__valid").on("click", function () {
    $("#wrapper-modal__valid").removeClass("active");
    $("body").removeClass("active");
  });
});

$(document).ready(function () {
  $.validator.addMethod("regex", function (value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  });
  $(".js-form").validate({
    rules: {
      name: {
        required: true,
      },
      tel: {
        required: true,
        regex: "^([+]+)*[0-9\x20\x28\x29-]{5,20}$",
      },
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      name: "Пожалуйста, введите Ваше имя",
      tel: {
        required: "Пожалуйста, введите корректный номер телефона",
      },
      email: {
        required: "Пожалуйста, введите корректный e-mail",
      },
    },
    submitHandler: function (form) {
      $(".js-form").submit(function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
          type: "POST",
          url: "/send2.php",
          data: form_data,
          success: function () {
            $("#wrapper-modal").removeClass("active");
            $("#wrapper-modal__valid").addClass("active");
          },
          error: function (response) {
            console.log("нет");
          },
        });
      });
    },
  });
});

/*Контакты */

$(document).ready(function () {
  $.validator.addMethod("regex", function (value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  });
  $(".contact-form").validate({
    rules: {
      name: {
        required: true,
      },
      tel: {
        required: true,
        regex: "^([+]+)*[0-9\x20\x28\x29-]{5,20}$",
      },
      email: {
        required: true,
        email: true,
      },
      message: {
        required: true,
      },
    },
    messages: {
      name: "Пожалуйста, введите Ваше имя",
      tel: {
        required: "Пожалуйста, введите корректный номер телефона",
      },
      email: {
        required: "Пожалуйста, введите корректный e-mail",
      },
      message: {
        required: "Пожалуйста, введите сообщение",
      },
    },
    submitHandler: function (form2) {
      $(".contact-form").submit(function (e) {
        e.preventDefault();
        let form_data_cont = $(this).serialize();
        $.ajax({
          type: "POST",
          url: "/send-contact.php",
          data: form_data_cont,
          success: function () {
            $(".message-success").fadeIn("show");
            console.log("да");
          },
          error: function (response2) {
            console.log("нет");
          },
        });
      });
    },
  });
});
