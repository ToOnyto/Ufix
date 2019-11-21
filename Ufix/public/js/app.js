
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
