function validate() {
  if (event.type == "submit") {
    var oForm = event.target;

    var aElements = oForm.querySelectorAll("[data-validate]");
  } else {
    var aElements = [event.target];
  }

  for (let i = 0; i < aElements.length; i++) {
    aElements[i].classList.remove("invalid");
    let sValidateType = aElements[i].getAttribute("data-validate");
    switch (sValidateType) {
      case "string":
        var sData = aElements[i].value;
        var reg = /^[A-Za-z]{2,20}$/;
        if (!reg.test(sData)) {
          aElements[i].classList.add("invalid");
        }

        break;
      //   case "integer":
      //     var sData = aElements[i].value;
      //     var reg = /^\d+$/;
      //     if (!reg.test(sData)) {
      //       aElements[i].classList.add("invalid");
      //       break;
      //     }

      //     var iMin = parseInt(aElements[i].getAttribute("data-min"));
      //     var iMax = parseInt(aElements[i].getAttribute("data-max"));

      //     if (sData < iMin || sData > iMax) {
      //       aElements[i].classList.add("invalid");
      //     }
      //     break;
      case "email":
        var sData = aElements[i].value;
        var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!reg.test(sData)) {
          aElements[i].classList.add("invalid");
        }
        break;
      case "password":
        var sData = aElements[i].value;
        var reg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,32}$/;
        if (!reg.test(sData)) {
          aElements[i].classList.add("invalid");
        }
        break;
    }
  }
  if (oForm) {
    return oForm.querySelectorAll(".invalid").length ? false : true;
  }
}
