var vid = document.getElementById("courseVideo");

if (document.querySelector(".btn").disabled) {
  vid.addEventListener("timeupdate", calculateBorder);
  function calculateBorder() {
    var current = document.querySelector("video").currentTime;
    var full = document.querySelector("video").duration;

    var percent = (current / full) * 100;
    document.querySelector(".btn").style.background =
      "linear-gradient(90deg, #f8bd9e " +
      percent +
      "%, #c9c9c9 " +
      percent +
      "%";

    vid.addEventListener("ended", () => {
      document.querySelector("button").disabled = false;
      document.querySelector(".btn").style.backgroundColor = "#5e5657";
    });
  }
}
