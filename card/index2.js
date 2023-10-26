window.onload = async function () {
  var url = "./request2.php";
  var xhr = new XMLHttpRequest();
  const name = document.getElementById("polis_number").value;
  xhr.open("POST", url);

  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {};

  var data = new FormData();
  data.append("name", name);

  $.ajax({
    method: "POST",
    url: url,
    data: {
      name: name,
    },
  }).done(function (data) {
    var xmlResponse = JSON.parse(data);
    parser = new DOMParser();
    xmlResponse = parser.parseFromString(
      xmlResponse,
      "text/xml"
    ).documentElement;
    //  console.log(xmlResponse);

    var fullNodeList = xmlResponse.getElementsByTagName(
      "GetPolicyInformationsResult"
    );

    for (var i = 0; i < fullNodeList.length; i++) {
      var eachnode = new Option();
      eachnode = fullNodeList[i].childNodes[0].nodeValue;
      $xml = $(xmlDoc);
    }
    var xmlDoc = parser.parseFromString(eachnode, "text/xml");
    console.log(xmlDoc);
    var collateralNameElements = xmlDoc.querySelectorAll("COLLATERAL_NAME");
    const main__content__elements_wrapper = document.querySelector(
      ".main__content__elements_wrapper"
    );

    collateralNameElements.forEach((element) => {
      const daker = document.createElement("div");
      daker.classList.add("main__content_daker");


      const circle = document.createElement("div");
      circle.classList.add("circle");

      const pElement = document.createElement("p");
      pElement.textContent = element.textContent;

      main__content__elements_wrapper.appendChild(daker);
      daker.appendChild(circle);
      daker.appendChild(pElement);
    });
  });
};
