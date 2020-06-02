var header = document.querySelector("nav");
var sticky = header.offsetTop;
var navHeight = header.offsetHeight;

window.addEventListener("scroll", () => {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    document.querySelector("body").style.paddingTop = navHeight + "px";
  } else {
    header.classList.remove("sticky");
    document.querySelector("body").style.paddingTop = "0px";
  }
});
