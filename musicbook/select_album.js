var xmlHttp;

function showAlbum(str) { 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return
 }
 var url="getAlbum.php?search="+str;
 xmlHttp.onreadystatechange=stateChanged;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);

}

function stateChanged() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
	document.getElementById("formalbums").innerHTML = xmlHttp.responseText;
 }
}

function showTracks(str) { 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return
 }
 var url="getTracks.php?searchtrack="+str;
 xmlHttp.onreadystatechange=stateChangedTracks;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);

}

function stateChangedTracks() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
	document.getElementById("formsongs").innerHTML = xmlHttp.responseText;
 }
}


function GetXmlHttpObject() {
var xmlHttp=null;
try
 {
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}