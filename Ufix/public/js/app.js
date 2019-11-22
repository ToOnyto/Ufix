
document.addEventListener("DOMContentLoaded", function () {
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll(".navbar-burger"), 0);

  if ($navbarBurgers.length > 0) {
    $navbarBurgers.forEach(function (el) {
      el.addEventListener("click", function () {
        var target = el.dataset.target;
        var $target = document.getElementById(target);
        el.classList.toggle("is-active");
        $target.classList.toggle("is-active");
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  (document.querySelectorAll(".notification .delete") || []).forEach(function ($delete) {
    $notification = $delete.parentNode;
    $delete.addEventListener("click", function () {
      $notification.parentNode.removeChild($notification);
    });
  });
});

$(document).ready(function () {
  // au clic sur un lien
  $('a.scroll').on('click', function (evt) {
    // bloquer le comportement par défaut: on ne rechargera pas la page
    evt.preventDefault(); // enregistre la valeur de l'attribut  href dans la variable target

    var target = $(this).attr('href');
    /* le sélecteur $(html, body) permet de corriger un bug sur chrome 
    et safari (webkit) */

    $('html, body') // on arrête toutes les animations en cours 
    .stop()
    /* on fait maintenant l'animation vers le haut (scrollTop) vers 
     notre ancre target */
    .animate({
      scrollTop: $(target).offset().top
    }, 1000);
  });
});

//Lorsque l'on arrive sur la page messaging, les messages les plus récents sont affichés (scrollbar vers le bas)
$(document).ready(function () {
  $("#messages").parent().scrollTop($("#messages").parent().prop('scrollHeight'));
});
//Fonction d'envoie de message dans la page messaging
function sendMessage(){
  var valueMessage = $("#message-to-send").val();
  var dt = new Date();
  var time = dt.getHours() + ":" + dt.getMinutes();
  if(valueMessage.length != 0 && !isNullOrEmpty(valueMessage)){
    $("#messages").append('<li class="clearfix"><div class="message-data has-text-right"><span class="message-data-time">'+time+', Today</span>&nbsp; &nbsp;<span class="message-data-name">Olia</span></div><div class="message other-message is-pulled-right">'+valueMessage+'</div></li>');
    $("#message-to-send").val('');
    $("#messages").parent().scrollTop($("#messages").parent().prop('scrollHeight'));
  }    
}
//Fonction pour vérifier que le message ne contient pas uniquement des espaces.
function isNullOrEmpty(str){
  return !str||!str.trim();
}

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreview').css('background-image', 'url('+e.target.result +')');
          $('#imagePreview').hide();
          $('#imagePreview').fadeIn(650);
      }
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
          $('#imagePreview2').css('background-image', 'url('+e2.target.result +')');
          $('#imagePreview2').hide();
          $('#imagePreview2').fadeIn(650);
      }
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
          $('#imagePreview3').css('background-image', 'url('+e3.target.result +')');
          $('#imagePreview3').hide();
          $('#imagePreview3').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload3").change(function() {
  readURL3(this);
});

function isSend() {
  var selectNotif = document.getElementById("notif");
  selectNotif.classList.remove('is-hidden');
}
function isDelete1() {
  var selectAds = document.getElementById("ads_delete_1");
  selectAds.classList.add('is-hidden');
}
function isDelete2() {
  var selectAds = document.getElementById("ads_delete_2");
  selectAds.classList.add('is-hidden');
}
function isDelete3() {
  var selectAds = document.getElementById("ads_delete_3");
  selectAds.classList.add('is-hidden');
}
function isDelete4() {
  var selectAds = document.getElementById("ads_delete_4");
  selectAds.classList.add('is-hidden');
}

