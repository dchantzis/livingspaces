var contactMessageMaxLength = 2500;
var projects = new Array(); for(var i=0; i<26; i++){projects[i] = new Array();}
var myworkEntriesSlider = new Array();

function init_filter_functionality()
{ 
	projects[0][0] = 'dimitrioschantzis_v2'; projects[0][1] = 'all::..::web::..::';
	projects[1][0] = 'retinadestruction'; projects[1][1] = 'all::..::web::..::msc::..::';
	projects[2][0] = 'tidbittv'; projects[2][1] = 'all::..::web::..::commercial::..::';
	projects[3][0] = 'illustrations'; projects[3][1] = 'all::..::illustration::..::';
	projects[4][0] = 'drjones'; projects[4][1] = 'all::..::bbinding::..::design::..::';
	projects[5][0] = 'indexdothtml'; projects[5][1] = 'all::..::web::..::design::..::msc::..::';
	projects[6][0] = 'digitalmarketplace'; projects[6][1] = 'all::..::theoretical::..::msc::..::';
	projects[7][0] = 'rapidportfolio'; projects[7][1] = 'all::..::web::..::msc::..::';
	projects[8][0] = 'cfpmaflash'; projects[8][1] = 'all::..::web::..::flash::..::msc::..::';
	projects[9][0] = 'cfpmawebsite'; projects[9][1] = 'all::..::web::..::msc::..::';
	projects[10][0] = 'medianculture'; projects[10][1] = 'all::..::theoretical::..::msc::..::';
	projects[11][0] = '3dsteampunk'; projects[11][1] = 'all::..::3d::..::msc::..::';
	projects[12][0] = 'dynamicaviationphotography'; projects[12][1] = 'all::..::web::..::';
	projects[13][0] = 'syzygy'; projects[13][1] = 'all::..::web::..::commercial::..::';
	projects[14][0] = 'dimitrioschantzis_v1'; projects[14][1] = 'all::..::web::..::';
	projects[15][0] = 'jamesdoe_v3'; projects[15][1] = 'all::..::web::..::';
	projects[16][0] = 'paperreview'; projects[16][1] = 'all::..::web::..::tei::..::';
	projects[17][0] = 'jamesdoe_v2'; projects[17][1] = 'all::..::web::..::';
	projects[18][0] = 'evolutionaryalgorithms'; projects[18][1] = 'all::..::theoretical::..::tei::..::';
	projects[19][0] = 'neurofuzzy'; projects[19][1] = 'all::..::theoretical::..::tei::..::';
	projects[20][0] = '3dmansion'; projects[20][1] = 'all::..::3d::..::tei::..::';
	projects[21][0] = 'jamesdoe_v1'; projects[21][1] = 'all::..::web::..::';
	projects[22][0] = 'megacomicbooks'; projects[22][1] = 'all::..::web::..::tei::..::';
	projects[23][0] = 'ccms'; projects[23][1] = 'all::..::java::..::tei::..::';
	//projects[24][0] = 'ealerts'; projects[24][1] = 'all::..::web::..::tei::..::';
	projects[24][0] = 'oams'; projects[24][1] = 'all::..::theoretical::..::tei::..::';
	
	$$('a.mywork_filters').addEvent('click',function(e){e.stop();	
		//$('loader').removeClass('displaynone');
		$$('a.mywork_filters').removeClass('selected');
		$(this).addClass('selected');
			
		$$('li.mywork_li').addClass('displaynone');
		filterName = $(this).id.split('mywork_filter_');
		filterName = filterName[1];

		for(var i=0; i<projects.length; i++)
		{
			tempProjectID = projects[i][0];
			
			tempProjectCatArr = projects[i][1].split('::..::');
			for(var j=0; j<tempProjectCatArr.length; j++)
				{if(tempProjectCatArr[j] == filterName){  $$('#'+tempProjectID).removeClass('displaynone'); break;}}
		}//for
		//$('loader').addClass('displaynone');
	});
	
}//init_filter_functionality()

function init_fade_effect_mywork_entries()
{
	//$$('li.mywork_li').fade(0.9);
	//$$('li.mywork_li').addEvent('click',function(e){e.stop();});
}//init_fade_effect_mywork_entries()

function init_toggle_mywork_entries()
{
	$$('div.mywork_body').show();
	
	$$('div.mywork_title').addEvent('click',function(e){e.stop();
		togglerID = $(this).get('id');
	
		entryID = togglerID.split('_body_toggler');
		entryID = entryID[0];

		if($(entryID+'_a_toggler').innerHTML == '[more]'){$(entryID+'_a_toggler').innerHTML = '[less]';}
		else{$(entryID+'_a_toggler').innerHTML == '[more]';}
		
		//var myVerticalSlide = new Fx.Slide(entryID+'_body');
		$$('#'+entryID+'_body').toggle();
		//myVerticalSlide.toggle();
	});
}//init_toggle_mywork_entries()

function init_contactme_elements()
{
	$('contact_name').addEvent('click',function(e){e.stop(); if($('contact_name').value=='[type your name][required]'){$('contact_name').value='';}});
	$('contact_name').addEvent('blur',function(e){e.stop(); if($('contact_name').value==''){$('contact_name').value='[type your name][required]';}});
	
	$('contact_email').addEvent('click',function(e){e.stop(); if($('contact_email').value=='[type your email][required]'){$('contact_email').value='';}});
	$('contact_email').addEvent('blur',function(e){e.stop(); if($('contact_email').value==''){$('contact_email').value='[type your email][required]';}});
	
	$('contact_regarding').addEvent('click',function(e){e.stop(); if($('contact_regarding').value=='[regarding][not required]'){$('contact_regarding').value='';}});
	$('contact_regarding').addEvent('blur',function(e){e.stop(); if($('contact_regarding').value==''){$('contact_regarding').value='[regarding][not required]';}});
	
	$('contact_message').addEvent('click',function(e){e.stop(); if($('contact_message').value=='[type your message][required]'){$('contact_message').value='';}});
	$('contact_message').addEvent('focus',function(e){e.stop(); if($('contact_message').value=='[type your message][required]'){$('contact_message').value='';}});
	$('contact_message').addEvent('blur',function(e){e.stop(); if($('contact_message').value==''){$('contact_message').value='[type your message][required]';}});
	
	$('contact_message').addEvent('keyup',function(e){e.stop(); countChars('contact_message','scounter',contactMessageMaxLength);});
	$('contact_send').addEvent('click',function(e){e.stop(); validateNsubmitMultipleValues('contact'); });
}//init_contactme_elements()

function countChars(fieldID,counterID,maxChars)
{
	var remainingChars = maxChars-$(fieldID).value.length;
	$(counterID).innerHTML = remainingChars;
	if(remainingChars<=99) {$(counterID).style.color="#FF0000";}
	if(remainingChars>99) {$(counterID).style.color="#999999";}
}//countChars(elementID)
