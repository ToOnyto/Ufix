'use strict';

document.addEventListener('DOMContentLoaded', function () {
  new TypeIt('#txtRun', {
    strings: ["Hello !", "Bienvenue sur UFix !"],
    speed: 100,
    breakLines: false,
    waitUntilVisible: true
  }).go();
});