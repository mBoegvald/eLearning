let slideIndex = 1;
showSlides(slideIndex);

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let slides = document.querySelectorAll(".slide");
  let lines = document.querySelectorAll(".line");

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (let i = 0; i < lines.length; i++) {
    lines[i].className = lines[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  lines[slideIndex - 1].className += " active";
}
