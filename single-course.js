document.querySelector("button").disabled = true;

var vid = document.getElementById("courseVideo");
vid.onended = function () {
  document.querySelector("button").disabled = false;
};
