
let slideIndex = 1;

function retrieveNom() {
    // recupere les query parameters
    let parameters = new URLSearchParams(document.location.search);
    // recupere email passé en GET
    let nom = parameters.get("nom");
    console.log("retrieveNom "+nom);
    writeNom(nom);
}
// Écrit l'email dans la balise P
function writeNom(nom) {
    let plat = document.getElementById("plat");
// Insert du code html entre les balises <p></p>
    plat.innerHTML = nom;
}


// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.querySelectorAll(".slideshow-container > .mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
  }
  
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}

function initToggle(){
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    /*
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
    */
   content.classList.toggle("visible");
  });
}
}
