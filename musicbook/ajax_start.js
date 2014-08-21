var xmlHttp; //just a container right now, haven't defined what's in it right now

function liveSearch(str) { //AJAX function for live search
xmlHttp=GetXmlHttpObject(); //calling function GetXmlHttpObject
if (xmlHttp==null) { //if there's still nothing in var xmlHttp pop up this alert and then stop
 alert ("Browser does not support HTTP Request");
 return;
 }
var url="searchfriends.php?searchfriends="+str; //sending as url element (because only one field and more secure and so you can bookmark it) //searchpeople.php will be saved in same folder as index and live_search etc. // php?searchstring --> ? is sending searchstring through php to function // +str (is the value of the form?)
xmlHttp.onreadystatechange=searchChanged; //activating listener onreadystatechange (paying attention to any differences in its content) run searchChanged when things change//we don't have searchChanged yet... will be VERY similar to formSubmitted
xmlHttp.open("GET",url,true); //GET has little space (wouldn't use for big forms)
xmlHttp.send(null);
}

function liveSearchBands(str) { //AJAX function for live search
xmlHttp=GetXmlHttpObject(); //calling function GetXmlHttpObject
if (xmlHttp==null) { //if there's still nothing in var xmlHttp pop up this alert and then stop
 alert ("Browser does not support HTTP Request");
 return;
 }
var url="searchbands.php?searchbands="+str; //sending as url element (because only one field and more secure and so you can bookmark it) //searchpeople.php will be saved in same folder as index and live_search etc. // php?searchstring --> ? is sending searchstring through php to function // +str (is the value of the form?)
xmlHttp.onreadystatechange=searchChanged; //activating listener onreadystatechange (paying attention to any differences in its content) run searchChanged when things change//we don't have searchChanged yet... will be VERY similar to formSubmitted
xmlHttp.open("GET",url,true); //GET has little space (wouldn't use for big forms)
xmlHttp.send(null);
}

function liveSearchAlbums(str) { //AJAX function for live search
xmlHttp=GetXmlHttpObject(); //calling function GetXmlHttpObject
if (xmlHttp==null) { //if there's still nothing in var xmlHttp pop up this alert and then stop
 alert ("Browser does not support HTTP Request");
 return;
 }
var url="searchalbums.php?searchalbums="+str; //sending as url element (because only one field and more secure and so you can bookmark it) //searchpeople.php will be saved in same folder as index and live_search etc. // php?searchstring --> ? is sending searchstring through php to function // +str (is the value of the form?)
xmlHttp.onreadystatechange=searchChanged; //activating listener onreadystatechange (paying attention to any differences in its content) run searchChanged when things change//we don't have searchChanged yet... will be VERY similar to formSubmitted
xmlHttp.open("GET",url,true); //GET has little space (wouldn't use for big forms)
xmlHttp.send(null);
}

function liveSearchTracks(str) { //AJAX function for live search
xmlHttp=GetXmlHttpObject(); //calling function GetXmlHttpObject
if (xmlHttp==null) { //if there's still nothing in var xmlHttp pop up this alert and then stop
 alert ("Browser does not support HTTP Request");
 return;
 }
var url="searchtracks.php?searchtracks="+str; //sending as url element (because only one field and more secure and so you can bookmark it) //searchpeople.php will be saved in same folder as index and live_search etc. // php?searchstring --> ? is sending searchstring through php to function // +str (is the value of the form?)
xmlHttp.onreadystatechange=searchChanged; //activating listener onreadystatechange (paying attention to any differences in its content) run searchChanged when things change//we don't have searchChanged yet... will be VERY similar to formSubmitted
xmlHttp.open("GET",url,true); //GET has little space (wouldn't use for big forms)
xmlHttp.send(null);
}

function loginForm(thisform) { //will be called when we submit our form (onsubmit = "loginForm(this)") "this" turns into "thisform" here
	xmlHttp=GetXmlHttpObject(); //calls last method on page (how that function gets run) it's a subway car? (packages up info to send...somewhere) should return xmlhttp object
	if (xmlHttp==null) { //if there's still nothing in var xmlHttp pop up this alert and then stop
 alert ("Browser does not support HTTP Request");
 return; //return nothing means it will just shut down and not do anything else
 }
 var formdata = ""; //"" specifies this var will be a string //populating var xmlHttp (subway car)
 formdata = "user=" + thisform.elements['user'].value + "&password=" + thisform.elements['password'].value//""username" does NOT have to be the same as the name or id in the form, can be anything (if you change it here you need to change it in php)//don't have spaces between username and = //go to thisform(login_form) go to the elements and select username and get its value//and get password's value too//can also be document.getElementByID and access form directly (can walk down the tree)
	xmlHttp.onreadystatechange=formSubmitted; //activating listener onreadystatechange (paying attention to any differences in its content) run formSubmitted when things change
	xmlHttp.open("POST", "loginValidate.php",true); // POST knows what to look for? //login.php is where it knows where to go //true is whether it's asynchrenous is on (it always is)
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //necessary for when you submit a form //general structure for method that will submit form
	xmlHttp.setRequestHeader("Content-length", formdata.length); //necessary for when you submit a form //formdata.length - getting formdata from the var we made above (the string that will populate xmlHttp
	xmlHttp.setRequestHeader("Connection", "close"); //necessary for when you submit a form
	xmlHttp.send(formdata); //send formdata to xmlHttp to actually put content into it
	return false;
}

function addToCart(add) { 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return
 }
 var url="add_product.php?getproduct="+add;
 xmlHttp.onreadystatechange=productAdded;
 xmlHttp.open("GET",url,true);
 xmlHttp.send(null);

}

function productAdded() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
	document.getElementById("added").innerHTML = xmlHttp.responseText;
 }
}

function formSubmitted() { //only when loginForm hears a change will it run this
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { //the content is loaded you may continue //4 means changed, it's a state, means complete
document.getElementById("message").innerHTML = xmlHttp.responseText; //message is the div we made under the form //innerHTML will replace any content that is already in div id=message
 } 
}

function searchChanged() { //only when live_search hears a change will it run this
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { //the content is loaded you may continue //4 means changed, it's a state, means complete
document.getElementById("friendslist").innerHTML = xmlHttp.responseText; //results is the div we made under the form //innerHTML will replace any content that is already in div id=results
 } 
}

function GetXmlHttpObject() { //won't change at all ever....if we use this way of doing things? //will make sure you're using the right browser?
xmlHttp=null;
try
 {
 xmlHttp=new XMLHttpRequest(); //as far as firefox and others need to go (as long as everything works)
 }
catch (e) //e is shortcut for error
 {
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); //ActiveX for explorer?
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp; //all that puts content into the xmlHttp var
}