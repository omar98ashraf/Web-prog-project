function process() {

    name = document.getElementById("username").value;

    var xhr = new XMLHttpRequest();

    xhr.open("GET","username.php?name=" + name,true);

    xhr.onreadystatechange = function () {

     if( xhr.readyState == 4  && xhr.status == 200)
     {
         xmlResponse= xhr.responseXML;  //returns a Document containing the HTML or XML retrieved by the request
         XMLDocument=xmlResponse.documentElement; // returns the Element that is the root element of the document (for example, the html element for HTML documents).
         message=XMLDocument.firstChild.data; // returns the first child node of the XML root file

         document.getElementById("underInput").innerHTML='<span style=color:red> '+message+'</span>';

              }
}
    xhr.send(null);
     setTimeout('process()',1000);

}
