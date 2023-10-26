


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

    const info__block = document.getElementById('info__block');
    info__block.classList.add("info__block_active");

    var btn=document.getElementById("btn");

    exceptiondiv.id="responException";
    filediv.id="responFile";
    datediv.id="responDate";
    textdiv.id="responText";
    div.id="response";
    var url = "https://a-group.az/complaints/request.php";
    var xhr = new XMLHttpRequest();
xhr.open("POST", url);


xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

xhr.onreadystatechange = function () {


};



var data = new FormData();
data.append('pincode', pincode.value);
data.append('complaintNumber', complaintNumber.value);

console.log(data);

$.ajax({
  method: "POST",
  url: url,
  data: {
    pincode: pincode.value, complaintNumber: complaintNumber.value
  }
}).done(function(data) {
  info__block.classList.remove("info__block_active");
    var xmlResponse = JSON.parse(data);
    parser = new DOMParser();
    xmlResponse = parser.parseFromString(xmlResponse,"text/xml").documentElement;
    console.log(xmlResponse)
    
     var fullNodeList = xmlResponse.getElementsByTagName("GetComplaintStatusResult");
    console.log(fullNodeList)
    
    for (var i=0; i < fullNodeList.length; i++)
    {
      info__block.classList.remove("info__block_active");
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
     info__block.classList.remove("info__block_active");
    
      }
    
    
        for(let i=0;i<dateList.length;i++){
          info__block.classList.remove("info__block_active");
        var dateText=dateList.item(i).innerHTML;
        var dateProp=`
        <h4 class="file_complaint_date">${dateText}</h4>
        `
        datediv.innerHTML+=dateProp;
        
        div.appendChild(datediv);

    
      }
    
    
        for(let i=0;i<fileList.length;i++){
          info__block.classList.remove("info__block_active");
        var fileText=fileList.item(i).innerHTML;
        var x=fileText.substring(0,4)+"s"+fileText.substring(4,fileText.length);
        console.log(x);
        var fileProp=`
        <a target="_blank"  class="file_complaint_link" href="${x}">Şikayətin nəticəsi ( yükləyin )</a>`
        filediv.innerHTML+=fileProp;


      }
    
      }else{
        counter++;
        info__block.classList.remove("info__block_active");
        for(let i=0;i<exception.length;i++){
        console.log(exception.item(0).innerHTML);
        var exceptionText=`<h4>${exception.item(0).innerHTML}</h4>`
       exceptiondiv.innerHTML+=exceptionText;
       responseForm.append(exceptiondiv);

    }
      }
     if(counter>0){
      info__block.classList.remove("info__block_active");
      btn.disabled=false;
      if(textList.length==3){
        info__block.classList.remove("info__block_active");
        responseForm.appendChild(div)
      responseForm.appendChild(filediv)
      }
      else{
        info__block.classList.remove("info__block_active");
        responseForm.appendChild(div)
        console.log(counter);

    
      }
     }
     else{
      info__block.classList.remove("info__block_active");
      if(textList.length==3){
        info__block.classList.remove("info__block_active");
        btn.disabled=true;
        responseForm.appendChild(div)
      responseForm.appendChild(filediv)

      }
      else{
        btn.disabled=true;
        responseForm.appendChild(div)
        console.log(counter);
        info__block.classList.remove("info__block_active");
    
      }
     }
      
    
    
    }
});
}
