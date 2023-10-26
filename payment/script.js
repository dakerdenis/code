const firstForm = document.getElementById("firstForm");

//! Первая форма
firstForm.addEventListener("submit", async function sendFirstFormData(event) {
  event.preventDefault();
  var sigorta_nomresi = document.getElementById("sigorta_nomresi").value;

  // проверка ввёл ли джиндыр номер полиса
  document.getElementById("sigortaError").textContent = "";
  if (sigorta_nomresi === "") {
    document.getElementById("sigortaError").textContent = "Name is required.";
  } else {
    // вызов отправки первого апи запроса
    console.log("Отправка запроса в апи.");
    await sendFirstApi(sigorta_nomresi);
  }
});

//! отправка первой формы
async function sendFirstApi(customer_police) {
  var url = "./request.php";
  var xhr = new XMLHttpRequest();
  xhr.open("POST", url);

  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {};

  var data = new FormData();
  data.append("name", customer_police);

  $.ajax({
    method: "POST",
    url: url,
    data: {
      name: customer_police,
    },
  }).done(function (data) {
    var xmlResponse = JSON.parse(data);
    parser = new DOMParser();
    xmlResponse = parser.parseFromString(
      xmlResponse,
      "text/xml"
    ).documentElement;
    //  console.log(xmlResponse);

    var fullNodeList = xmlResponse.getElementsByTagName("GetPolicyInfo2Result");

    for (var i = 0; i < fullNodeList.length; i++) {
      var eachnode = new Option();
      eachnode = fullNodeList[i].childNodes[0].nodeValue;
      $xml = $(xmlDoc);
    }
    var xmlDoc = parser.parseFromString(eachnode, "text/xml");
    const myArray = [];

    if (!xmlDoc.querySelector("INSURER_CUSTOMER")) {
      document.getElementById("sigortaError").textContent =
        "Invalid Police number";
      console.log("error 228");
      return;
    } else {
      //создание второй формы и удаление первой формы
      document.getElementById("firstForm").style.display = "none";
      document.getElementById("secondForm").style.display = "flex";
    }

    //? Police number
    const PolicyValue = xmlDoc.querySelector("POLICY_NUMBER").textContent;
    myArray.push(PolicyValue);

    //? Customer Name
    const insurerCustomer =
      xmlDoc.querySelector("INSURER_CUSTOMER").textContent;
    myArray.push(insurerCustomer);

    //? Police cost
    const premium_debt = xmlDoc.querySelector("PREMIUM").textContent;
    const premium = parseFloat(premium_debt);
    myArray.push(premium);

    //? overall borc
    const debt_row = xmlDoc.querySelector("DEBT").textContent;
    const debt = parseFloat(debt_row);
    myArray.push(debt);

    //? borc for today
    const debtfortoday_row = xmlDoc.querySelector("DEBT_FOR_TODAY").textContent;
    const debtfortoday = parseFloat(debtfortoday_row);
    myArray.push(debtfortoday);

    const stalker = myArray;
    createSecondForm(stalker);
  });
}

//! создание второй формы
async function createSecondForm(responce_answer) {
  const police_number = responce_answer[0];
  const client_name = responce_answer[1];
  const premium = responce_answer[2];
  const debtoverall = responce_answer[3];
  const debtfortoday = responce_answer[4];
  document.getElementById("police_number").textContent = police_number;
  document.getElementById("client_name").textContent = client_name;
  document.getElementById("premium").textContent = premium;
  document.getElementById("debtoverall").textContent = debtoverall;
  document.getElementById("debtfortoday").textContent = debtfortoday;

  document.getElementById("secondPoliceNumber").value = police_number;

  const payment_amount = document.getElementById("payment_amount");

  payment_amount.placeholder =
  debtfortoday +" dən " + Math.ceil(debtoverall) + " dək məbləği daxil edin ";
  const secondForm = document.getElementById("secondForm");
  secondForm.addEventListener("submit", async function sendSecondForm(event) {
  });
}



  // event.preventDefault();
  // const payment_amount_send = document.getElementById("payment_amount").value;
  // const secondPoliceNumber_send = document.getElementById("secondPoliceNumber").value;
  // await addPayment(secondPoliceNumber_send,payment_amount_send);


async function changeInput() {
  const secondPoliceNumber = document.getElementById("payment_amount");
}
