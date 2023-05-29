var audio = document.getElementById("audio");
var imageContainer = document.querySelector(".rotation-container");

var rotatingImage = document.querySelector('.rotating-image');
var rotationStarted = false;

function ZI(){
  if (!rotationStarted) {
    rotatingImage.style.animation = 'rotation-on-hover 4s infinite linear';
    rotationStarted = true;
  }
};

function ZO() {
  rotatingImage.style.animation = 'none';
  rotationStarted = false;
};

function playAudio(selector) {
  audio.play();
  imageContainer.classList.add("zoomed");
  ZI()
}

function pauseAudio(selector) {
  audio.pause();
  imageContainer.classList.remove("zoomed");
  ZO();
}