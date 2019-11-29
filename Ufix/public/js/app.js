document.addEventListener("DOMContentLoaded", function() {
  var $navbarBurgers = Array.prototype.slice.call(
    document.querySelectorAll(".navbar-burger"),
    0
  );

  if ($navbarBurgers.length > 0) {
    $navbarBurgers.forEach(function(el) {
      el.addEventListener("click", function() {
        var target = el.dataset.target;
        var $target = document.getElementById(target);
        el.classList.toggle("is-active");
        $target.classList.toggle("is-active");
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", function() {
  (document.querySelectorAll(".notification .delete") || []).forEach(function(
    $delete
  ) {
    $notification = $delete.parentNode;
    $delete.addEventListener("click", function() {
      $notification.parentNode.removeChild($notification);
    });
  });
});

$(document).ready(function() {
  // au clic sur un lien
  $("a.scroll").on("click", function(evt) {
    // bloquer le comportement par défaut: on ne rechargera pas la page
    evt.preventDefault(); // enregistre la valeur de l'attribut  href dans la variable target

    var target = $(this).attr("href");
    /* le sélecteur $(html, body) permet de corriger un bug sur chrome 
    et safari (webkit) */

    $("html, body") // on arrête toutes les animations en cours
      .stop()
      /* on fait maintenant l'animation vers le haut (scrollTop) vers 
     notre ancre target */
      .animate(
        {
          scrollTop: $(target).offset().top
        },
        1000
      );
  });
});

//Lorsque l'on arrive sur la page messaging, les messages les plus récents sont affichés (scrollbar vers le bas)
$(document).ready(function() {
  $("#messages")
    .parent()
    .scrollTop(
      $("#messages")
        .parent()
        .prop("scrollHeight")
    );
});
//Fonction d'envoie de message dans la page messaging
function sendMessage() {
  var valueMessage = $("#message-to-send").val();
  var dt = new Date();
  var time = dt.getHours() + ":" + dt.getMinutes();
  if (valueMessage.length != 0 && !isNullOrEmpty(valueMessage)) {
    $("#messages").append(
      '<li class="clearfix"><div class="message-data has-text-right"><span class="message-data-time">' +
        time +
        ', Today</span>&nbsp; &nbsp;<span class="message-data-name">Olia</span></div><div class="message other-message is-pulled-right">' +
        valueMessage +
        "</div></li>"
    );
    $("#message-to-send").val("");
    $("#messages")
      .parent()
      .scrollTop(
        $("#messages")
          .parent()
          .prop("scrollHeight")
      );
  }
}
//Fonction pour vérifier que le message ne contient pas uniquement des espaces.
function isNullOrEmpty(str) {
  return !str || !str.trim();
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#imagePreview").css(
        "background-image",
        "url(" + e.target.result + ")"
      );
      $("#imagePreview").hide();
      $("#imagePreview").fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function() {
  readURL(this);
});

function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e2) {
      $("#imagePreview2").css(
        "background-image",
        "url(" + e2.target.result + ")"
      );
      $("#imagePreview2").hide();
      $("#imagePreview2").fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload2").change(function() {
  readURL2(this);
});

function readURL3(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e3) {
      $("#imagePreview3").css(
        "background-image",
        "url(" + e3.target.result + ")"
      );
      $("#imagePreview3").hide();
      $("#imagePreview3").fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload3").change(function() {
  readURL3(this);
});

function isSend() {
  var selectNotif = document.getElementById("notif");
  selectNotif.classList.remove("is-hidden");
}
function isDelete1() {
  var selectAds = document.getElementById("ads_delete_1");
  selectAds.classList.add("is-hidden");
}
function isDelete2() {
  var selectAds = document.getElementById("ads_delete_2");
  selectAds.classList.add("is-hidden");
}
function isDelete3() {
  var selectAds = document.getElementById("ads_delete_3");
  selectAds.classList.add("is-hidden");
}
function isDelete4() {
  var selectAds = document.getElementById("ads_delete_4");
  selectAds.classList.add("is-hidden");
}

// --------------------- SLIDER
var sliderImage = $(".slider__images-image");

sliderImage.each(function(index) {
  $(".js__slider__pagers").append("<li>" + (index + 1) + "</li>");
});

// set up vars
var sliderPagers = "ol.js__slider__pagers li",
  sliderPagersActive = ".js__slider__pagers li.active",
  sliderImages = ".js__slider__images",
  sliderImagesItem = ".slider__images-item",
  sliderControlNext = ".slider__control--next",
  sliderControlPrev = ".slider__control--prev",
  sliderSpeed = 5000,
  lastElem = $(sliderPagers).length - 1,  
  sliderTarget;

// add css heigt to slider images list
function checkImageHeight() {
  var sliderHeight = $(".slider__images-image:visible").height();
  $(sliderImages).css("height", sliderHeight + "px");
}

sliderImage.on("load", function() {
  checkImageHeight();
  $(sliderImages).addClass("loaded");
});
$(window).resize(function() {
  checkImageHeight();
});

// set up first slide
$(sliderPagers)
  .first()
  .addClass("active");
$(sliderImagesItem)
  .hide()
  .first()
  .show();

// transition function
function sliderResponse(sliderTarget) {
  $(sliderImagesItem)
    .fadeOut(300)
    .eq(sliderTarget)
    .fadeIn(300);
  $(sliderPagers)
    .removeClass("active")
    .eq(sliderTarget)
    .addClass("active");
}

// pager controls
$(sliderPagers).on("click", function() {
  if (!$(this).hasClass("active")) {
    sliderTarget = $(this).index();
    sliderResponse(sliderTarget);
    resetTiming();
  }
});

// next/prev controls
$(sliderControlNext).on("click", function() {
  sliderTarget = $(sliderPagersActive).index();
  sliderTarget === lastElem
    ? (sliderTarget = 0)
    : (sliderTarget = sliderTarget + 1);
  sliderResponse(sliderTarget);
  resetTiming();
});
$(sliderControlPrev).on("click", function() {
  sliderTarget = $(sliderPagersActive).index();
  lastElem = $(sliderPagers).length - 1;
  sliderTarget === 0
    ? (sliderTarget = lastElem)
    : (sliderTarget = sliderTarget - 1);
  sliderResponse(sliderTarget);
  resetTiming();
});

// slider timing
function sliderTiming() {
  sliderTarget = $(sliderPagersActive).index();
  sliderTarget === lastElem
    ? (sliderTarget = 0)
    : (sliderTarget = sliderTarget + 1);
  sliderResponse(sliderTarget);
}

// slider autoplay
var timingRun = setInterval(function() {
  sliderTiming();
}, sliderSpeed);

function resetTiming() {
  clearInterval(timingRun);
  timingRun = setInterval(function() {
    sliderTiming();
  }, sliderSpeed);
}
