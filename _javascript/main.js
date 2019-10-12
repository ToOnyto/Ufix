document.addEventListener('DOMContentLoaded', function () {
  
  // Initialisation du texte de l'accueil s'écrivant tout seul
  new TypeIt('#txtRun', {
    strings: ["Hello !", "Welcome to our website !"],
    speed: 80,
    breakLines: false,
    waitUntilVisible: true
  }).go();

  // Fonction qui replace les éléments de la première phase pour faire apparaitre la seconde phase
  function mouveAfterTimeout() {
    document.getElementById('logo').classList.add("mouveLogo");
    document.getElementById('nom').classList.add("mouveName");
    document.getElementById('txtRun').classList.add("hideTxtIntro");
    document.getElementById('dpHead2Phase').classList.remove("dpNoneHead");
    document.getElementById('dpHead2Phase').classList.add("dpTimer");
  }
  setTimeout(mouveAfterTimeout, 4500);

  function mouveAfterTimeout2() {
    document.getElementById('txtRun').style.display = "none";
  }
  setTimeout(mouveAfterTimeout2, 5000);

  // Création du timer 
  var countDownDate = new Date("October 28, 2019 14:00:00").getTime();

  var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById("timer").innerHTML = "The website went online in " + days + " days and " + hours + ":"
    + minutes + ":" + seconds;
    
    if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "The website is online !";
    }
  }, 1000);

  // Resize logo on mobile
  var resolution = document.documentElement.clientWidth;
  var permute = document.getElementById('logoSVG')

  if (resolution <= 769) {
      permute.classList.remove('sizeLogoOnDesktop');
      permute.classList.add('sizeLogoOnMobile');
  }
  if (resolution > 769) {
    permute.classList.remove('sizeLogoOnMobile');
    permute.classList.add('sizeLogoOnDesktop');
}
});
