window.onload = async function () {
  var url = "./request.php";
  var xhr = new XMLHttpRequest();
  const name = "stalker";
  xhr.open("POST", url);

  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {};

  var data = new FormData();
  data.append("name", "stalker");

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
      "SendPolicyInformationsResult"
    );

    for (var i = 0; i < fullNodeList.length; i++) {
      var eachnode = new Option();
      eachnode = fullNodeList[i].childNodes[0].nodeValue;
      $xml = $(xmlDoc);
    }
    var xmlDoc = parser.parseFromString(eachnode, "text/xml");
    console.log(xmlDoc);

    //? Police number
    const insured = xmlDoc.querySelector("INSURED").textContent;
    document.getElementById("insured").textContent = insured;

    const program = xmlDoc.querySelector("PROGRAM").textContent;
    document.getElementById("program").textContent = program;

    const price = xmlDoc.querySelector("PRICE").textContent;
    const result = Math.floor(price);
    document.getElementById("price").textContent = result;

    const INSURANCE_START_DATE = xmlDoc.querySelector(
      "INSURANCE_START_DATE"
    ).textContent;
    const date = new Date(INSURANCE_START_DATE);

    // Get the day, month, and year components
    const day = date.getDate();
    const month = date.getMonth() + 1; // Months are zero-based, so we add 1
    const year = date.getFullYear();

    // Format the date as "day-month-year"
    const formattedDate = `${day}-${month < 10 ? "0" : ""}${month}-${year}`;

    document.getElementById("INSURANCE_START_DATE").textContent =
    formattedDate;
/********************************************* */
    const INSURANCE_END_DATE =
      xmlDoc.querySelector("INSURANCE_END_DATE").textContent;


      const date2 = new Date(INSURANCE_END_DATE);
  
      // Get the day, month, and year components
      const day2 = date2.getDate();
      const month2 = date2.getMonth() + 1; // Months are zero-based, so we add 1
      const year2 = date2.getFullYear();
  
      // Format the date as "day-month-year"
      const formattedDate2 = `${day2}-${month2 < 10 ? "0" : ""}${month2}-${year2}`;
  
      document.getElementById("INSURANCE_END_DATE").textContent =
      formattedDate2;
  });
};
