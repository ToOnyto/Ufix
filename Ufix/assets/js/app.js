document.addEventListener("DOMContentLoaded", () => {
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll(".navbar-burger"), 0);
    if ($navbarBurgers.length > 0) {
      $navbarBurgers.forEach(el => {
        el.addEventListener("click", () => {
          const target = el.dataset.target;
          const $target = document.getElementById(target);

      el.classList.toggle("is-active");
      $target.classList.toggle("is-active");
    });
  });
}
});

document.addEventListener("DOMContentLoaded", () => {
(document.querySelectorAll(".notification .delete") || []).forEach(
  $delete => {
    $notification = $delete.parentNode;
    $delete.addEventListener("click", () => {
      $notification.parentNode.removeChild($notification);
    });
  }
);
});

const $ = require('jquery');

$(document).ready(function(){
// au clic sur un lien
$('a.scroll').on('click', function(evt){
   // bloquer le comportement par défaut: on ne rechargera pas la page
   evt.preventDefault(); 
   // enregistre la valeur de l'attribut  href dans la variable target
      var target = $(this).attr('href');
          /* le sélecteur $(html, body) permet de corriger un bug sur chrome 
          et safari (webkit) */
      $('html, body')
   // on arrête toutes les animations en cours 
   .stop()
   /* on fait maintenant l'animation vers le haut (scrollTop) vers 
    notre ancre target */
   .animate({scrollTop: $(target).offset().top}, 1000 );
});
});

