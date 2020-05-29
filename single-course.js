var vid = document.getElementById("courseVideo");

if (document.querySelector(".btn").disabled) {
  vid.addEventListener("timeupdate", calculateBorder);
  function calculateBorder() {
    var current = document.querySelector("video").currentTime;
    var full = document.querySelector("video").duration;

    var percent = (current / full) * 100;
    document.querySelector(".btn").style.borderImageSource =
      "linear-gradient(90deg, #5e5657 " +
      percent +
      "%, transparent " +
      percent +
      "%";

    vid.addEventListener("ended", () => {
      document.querySelector("button").disabled = false;
      document.querySelector(".btn").style.border = "2px solid #5e5657";
    });
  }
}
