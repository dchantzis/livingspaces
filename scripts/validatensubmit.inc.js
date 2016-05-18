var showErrors = true;
// initialize the validation requests cache
var validateNsubmitCache = new Array();
var validateNsubmitServerAddress;
var tempStrArr = new Array();

var clint = null;
var documentClassName = null;
var conditionalFlag = null;
var urlString = null;
var loaderID = null;
var messages = null;
var responseStrArr = null;

var formValues = new Array();
var formValuesNames = new Array();


function validateNsubmitMultipleValues(pageURL)
{
	//type can be 'dom' or 'json'
	
	validateNsubmitServerAddress = pageURL;
	conditionalFlag = false;
	urlString = 'loadtype=dom';

	// only continue if xmlHttp isn't void
	if (xmlHttp)
	{
		validateNsubmitCache.push(urlString);
		//alert(validateNsubmitServerAddress+'?'+urlString);
		sendXMLRequestValidateNsubmit('multipleValues');
	}//if

}//validateNsubmitMultipleValues(formID)


function sendXMLRequestValidateNsubmit(type)
{
	// try to connect to the server
	try
	{
		// continue only if the XMLHttpRequest object isn't busy
		// and the cache is not empty
		if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0) && validateNsubmitCache.length > 0)
		{
			// get a new set of parameters from the cache
			var cacheEntry = validateNsubmitCache.shift();
			// make a server request to validate the extracted data
			xmlHttp.open("POST", validateNsubmitServerAddress, true);
			xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

			if(type=='singleValue'){xmlHttp.onreadystatechange = handleRequestStateChangeValidateNSubmit;}
			else if(type=='multipleValues'){xmlHttp.onreadystatechange = handleRequestStateChangeValidateNSubmitMultipleValues;}
			xmlHttp.send(cacheEntry);		
		}//if
	}//try
	catch (e)
	{
		// display an error when failing to connect to the server
		displayError(e.toString(), "submit");
	}//catch
}//sendXMLRequestValidateNsubmit(type)

/*
function handleContactMeForm()
{
	contactName = $('contact_name').value;
	contactEmail = $('contact_email').value;
	contactRegarding = $('contact_regarding').value;
	contactMessage = $('contact_message').value;
	
	if( (contactName == '[type your name][required]') || (contactName == '[type your name]') )
		{contactName = '';}
	if( (contactEmail == '[type your email][required]') || (contactEmail == '[type your email]') )
		{contactEmail = '';}
	if( (contactRegarding == '[regarding][not required]') || (contactRegarding == '[regarding]') )
		{$('contact_regarding').value = '[regarding][not required]';}
	if( (contactMessage == '[type your message][required]') || (contactMessage == '[type your message]') )
		{contactMessage = '';}
		
	formValuesNames[0] = 'name'; formValues[0] = contactName;
	formValuesNames[1] = 'email'; formValues[1] = contactEmail;
	formValuesNames[2] = 'regarding'; formValues[2] = contactRegarding;
	formValuesNames[3] = 'message'; formValues[3] = contactMessage; alert(contactMessage);

}//handleContactMeForm()
*/

function readResponseValidateNsubmitMultipleValues()
{		
	// retrieve the server's response
	var formID = '';
	var loaderID = '';
	var messages = '';

	try {var responseObj = eval("(" + xmlHttp.responseText + ")");}
	catch(e)
	{
		try
			{var responseObj = eval("(" + xmlHttp.responseText + ")");}
		catch(e)
			{alert('Expected JSON response, FAILED: '+e.toString()); return 0;}//{return 0;}//
	}//catch
	
	responsetype = responseObj.responsetype;

	if(responsetype!='routine')
	{
		switch(responsetype)
		{
			case 'formsubmitionerror':
				//formSubmitionErrorReporter(formID,'json');
				break;
			case 'validationerror':
				//validationErrorReporter(formID,'json');
				break;
			case 'systemerror':
				//systemerror(formID,'json');
				break;
			default:
				break;
		}//switch
		return 0;
	}//if
	else{}//OK

	var resultsArray = new Array();
	resultsArray[0] = responseObj.responsetype;
	resultsArray[1] = responseObj.wallpaper;
	resultsArray[2] = responseObj.title;
	resultsArray[3] = responseObj.pagefile;
	resultsArray[4] = responseObj.description;
	resultsArray[5] = responseObj.images;
	resultsArray[6] = responseObj.video;
	resultsArray[7] = responseObj.flash;
	resultsArray[8] = responseObj.prevproject;
	resultsArray[9] = responseObj.nextproject;
	resultsArray[10] = responseObj.currentprojectid;
	
	loadPageContent(resultsArray);

	sendXMLRequestValidateNsubmit('multipleValues');
}//readResponseValidateNsubmitMultipleValues()


function formSubmitionErrorReporter(formID,responseFormat)
{
}//formSubmitionErrorReporter(formID,responseFormat)

function validationErrorReporter(formID,responseFormat)
{
}//validationErrorReporter(formID,responseFormat)


function errorMessages(fieldID,errorCode)
{
}//errorMessages(element, fieldID, errorCode)