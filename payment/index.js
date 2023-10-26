

  
  const desc_police = document.getElementById("desc_police").value;
  const amount = document.getElementById("amount").value;
  const currency = document.getElementById("currency").value;
  const rrn = document.getElementById("rrn").value;
  const timestamp = document.getElementById("timestamp").value;


  var url = "./addpayment.php";
  var xhr = new XMLHttpRequest();
  xhr.open("POST", url);

  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {};

  var data = new FormData();

  data.append("desc_police", desc_police);
  data.append("amount", amount);
  data.append("currency", currency);
  data.append("rrn", rrn);
  data.append("timestamp", timestamp);

  $.ajax({
    method: "POST",
    url: url,
    data: {
      desc_police: desc_police,
      amount: amount,
      currency: currency,
      rrn: rrn,
      timestamp: timestamp,
    },
  }).done(function (data) {
    var xmlResponse = JSON.parse(data);
    parser = new DOMParser();
    xmlResponse = parser.parseFromString(
      xmlResponse,
      "text/xml"
    ).documentElement;
    var fullNodeList = xmlResponse.getElementsByTagName("AddPaymentResult");

    for (var i = 0; i < fullNodeList.length; i++) {
      var eachnode = new Option();
      eachnode = fullNodeList[i].childNodes[0].nodeValue;
      $xml = $(xmlDoc);
    }
    var xmlDoc = parser.parseFromString(eachnode, "text/xml");
    console.log(xmlDoc);
  });

  //  const callbackFunction = document.getElementById("callbackFunction");
  //  callbackFunction.submit();

