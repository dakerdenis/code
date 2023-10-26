function soapRequest(){
    let pincode=document.getElementById("pinCode");
    let complaintNumber=document.getElementById("complaintNumber")
    var responseForm=document.getElementById("responseForm")
    var div=document.createElement("div");
    var textdiv=document.createElement("div");
    var datediv=document.createElement("div");
    var filediv=document.createElement("div");
    var exceptiondiv=document.createElement("div");
    var counter=0;
    var btn=document.getElementById("btn");

    exceptiondiv.id="responException";
    filediv.id="responFile";
    datediv.id="responDate";
    textdiv.id="responText";
    div.id="response";
    var url = "https://insure.a-group.az/InsureAzSvc/GeneralComplaintSvc.asmx";
    var xhr = new XMLHttpRequest();
xhr.open("POST", url);


/****************************************************/ 
/****************************************************/ 




/****************************************************/ 
/****************************************************/ 
xhr.setRequestHeader("Content-Type", "text/xml");//xhr.setRequestHeader("Content-Type", "Access-Control-Allow-Headers: x-requested-with");

xhr.onreadystatechange = function () {
if (xhr.status === 200 ) {
var xmlResponse =xhr.responseXML.documentElement;
console.log(xmlResponse)

 var fullNodeList = xmlResponse.getElementsByTagName("GetComplaintStatusResult");
console.log(fullNodeList)

for (var i=0; i < fullNodeList.length; i++)
{
    var eachnode = new Option();
  eachnode= fullNodeList[i].childNodes[0].nodeValue;
  var xmlDoc = $.parseXML(eachnode),
      $xml = $(xmlDoc);

      console.log($xml)
  var textList=xmlDoc.getElementsByTagName("Text");
  var dateList=xmlDoc.getElementsByTagName("Date");
  var fileList=xmlDoc.getElementsByTagName("File");
  var exception=xmlDoc.getElementsByTagName("Exception");
  if(exception.item(0).textContent==""){
    for(let i=0;i<textList.length;i++){
   var firstText=textList.item(i).innerHTML;
   var prop=`
   <h4 class="file_complaint_name">${firstText}</h4>
`
textdiv.innerHTML+=prop;
 div.appendChild(textdiv);


  }


    for(let i=0;i<dateList.length;i++){
    var dateText=dateList.item(i).innerHTML;
    var dateProp=`
    <h4 class="file_complaint_date">${dateText}</h4>
    `
    datediv.innerHTML+=dateProp;
    div.appendChild(datediv);


  }


    for(let i=0;i<fileList.length;i++){
    var fileText=fileList.item(i).innerHTML;
    var x=fileText.substring(0,4)+"s"+fileText.substring(4,fileText.length);
    console.log(x);
    var fileProp=`
    <a target="_blank"  class="file_complaint_link" href="${x}">Şikayətin nəticəsi</a>`
    filediv.innerHTML+=fileProp;


  }

  }else{
    counter++;
    for(let i=0;i<exception.length;i++){
    console.log(exception.item(0).innerHTML);
    var exceptionText=`<h4>${exception.item(0).innerHTML}</h4>`
   exceptiondiv.innerHTML+=exceptionText;
   responseForm.append(exceptiondiv);
}
  }
 if(counter>0){
  btn.disabled=false;
  if(textList.length==3){
    responseForm.appendChild(div)
  responseForm.appendChild(filediv)
  }
  else{
    responseForm.appendChild(div)
    console.log(counter);
  

  }
 }
 else{
  if(textList.length==3){
    btn.disabled=true;
    responseForm.appendChild(div)
  responseForm.appendChild(filediv)
  }
  else{
    btn.disabled=true;
    responseForm.appendChild(div)
    console.log(counter);
  

  }
 }
  


}

}

};

var data = `<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-
instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
<soap:Body>
<GetComplaintStatus xmlns="http://tempuri.org/">
<pinCode>${pincode.value}</pinCode>
<complaintNumber>${complaintNumber.value}</complaintNumber>
<userName>AQWeb</userName>
<password>@QWeb</password>
</GetComplaintStatus>
</soap:Body>
</soap:Envelope>
`;


xhr.send(data);
}
