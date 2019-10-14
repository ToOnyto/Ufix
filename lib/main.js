'use strict';

document.addEventListener('DOMContentLoaded', function () {

  // Initialisation du texte de l'accueil s'écrivant tout seul
  new TypeIt('#txtRun', {
    strings: ["Bonjour !", "Bienvenue sur notre site !"],
    speed: 80,
    breakLines: false,
    waitUntilVisible: true
  }).go();

  // Fonctions qui replace les éléments de la première phase pour faire apparaitre la seconde phase
  function mouveAfterTimeout() {
    document.getElementById('logo').classList.add("mouveLogo");
    document.getElementById('nom').classList.add("mouveName");
    document.getElementById('txtRun').classList.add("hideTxtIntro");
  }
  setTimeout(mouveAfterTimeout, 4500);

  setTimeout(function () {
    document.getElementById('txtRun').style.display = "none";
  }, 4800);

  setTimeout(function () {
    document.getElementById('dpFooter2Phase').classList.remove("dpNone");
    document.getElementById('dpFooter2Phase').classList.add("dpFooter");
    document.getElementById('timer').classList.remove("dpNone");
    document.getElementById('timer').classList.add("dpFooter");
    document.getElementById('idBody').classList.remove("dpNone");
    document.getElementById('idBody').classList.add("dpBody");
  }, 5500);

  // Création du timer 
  var countDownDate = new Date("October 28, 2019 14:00:00").getTime();

  var x = setInterval(function () {
    var now = new Date().getTime();
    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
    var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
    var seconds = Math.floor(distance % (1000 * 60) / 1000);

    document.getElementById("timer").innerHTML = "Le site UFix sra disponible dans : " + days + " jours, " + hours + " heures et " + minutes + " minutes !";

    if (distance < 0) {
      clearInterval(x);
      document.getElementById("timer").innerHTML = "Le site est en ligne !";
    }
  }, 1000);

  // Resize logo on mobile
  var resolution = document.documentElement.clientWidth;
  var permute = document.getElementById('logoSVG');

  if (resolution <= 769) {
    permute.classList.remove('sizeLogoOnDesktop');
    permute.classList.add('sizeLogoOnMobile');
  }
  if (resolution > 769) {
    permute.classList.remove('sizeLogoOnMobile');
    permute.classList.add('sizeLogoOnDesktop');
  }
});