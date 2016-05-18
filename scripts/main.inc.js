var doNothing = '';
var contactMessageMaxLength = 2500;
var switchContentReq = null;
var contentPath = null;
var previousSelectedID_mainNavi = null;
var previousSelectedID_secNavi = null;
var html = null;
var previousPageID = null;
var parallaxObj = null;
Demo = {};

window.addEvent('domready',function() {

	pageID = document.body.className;
	previousSelectedID_mainNavi = 'navi_main_'+pageID;
	
	if(pageID == 'index'){
		//LOGO LINK TO HOME
		doNothing = function(e){e.stop();}
		$('navi_main_index').addEvent('click',doNothing);
		initiate_projectImages_elements('index_images_container');
	}//
	
	/*
	if( (pageID == 'architects') || (pageID == 'projects') || (pageID == 'architect') || (pageID == 'project') )
		{initiate_secondaryNavigation_elements();}
	*/

	if( (pageID == 'architects') || (pageID == 'architect') )
		{initiate_secondaryNavigation_elements_architects();}

	if( (pageID == 'projects') || (pageID == 'project') )
		{initiate_secondaryNavigation_elements(pageID);}
		
	if(pageID == 'architect')
		{initiate_projectLinks_elements('architect');}
	
	if(pageID == 'architects')
		{initiate_projectLinks_elements('architects');}
		//{initiate_architectsNavigation_elements(); initiate_projectLinks_elements('architects');}
		
	if(pageID == 'projects')
		{initiate_projectLinks_elements('projects');  displaySelectedCategoryProjects();}
		//{initiate_projectsNavigation_elements(); initiate_projectLinks_elements('projects');}
		
	if(pageID == 'architect')
		{initiate_architectsProjectsNavigation_elements();}		

	if(pageID == 'project')
		{initiate_projectImages_elements('project_images_container'); initiate_description_scrollbar('project_description');}


/*
###############UNCOMMENT THE FOLLOWING CODE FOR AJAX LOAD OF JUST THE CONTENT###################
/*
	$('navi_main_index').addEvent('click', function(e){e.stop();
		previousPageID = $('pageid').innerHTML;
		$('pageid').innerHTML = 'index';
		pageID = $('pageid').innerHTML;
		loadPageContentDOM('index.php',pageID);
		set_selected_mainNavi('navi_main_index');
	});
	$('navi_main_architects').addEvent('click', function(e){e.stop();
		previousPageID = $('pageid').innerHTML;
		$('pageid').innerHTML = 'architects';
		pageID = $('pageid').innerHTML;
		loadPageContentDOM('architects.php',pageID);
		set_selected_mainNavi('navi_main_architects');
	});
	$('navi_main_projects').addEvent('click', function(e){e.stop();
		previousPageID = $('pageid').innerHTML;
		$('pageid').innerHTML = 'projects';
		pageID = $('pageid').innerHTML;
		loadPageContentDOM('projects.php',pageID);
		set_selected_mainNavi('navi_main_projects');
		initiate_projectsNavigation_elements();
	});
	$('navi_main_press').addEvent('click', function(e){e.stop();
		previousPageID = $('pageid').innerHTML;
		$('pageid').innerHTML = 'press';
		pageID = $('pageid').innerHTML;
		loadPageContentDOM('press.php',pageID);
		set_selected_mainNavi('navi_main_press');
	});
	$('navi_main_blog').addEvent('click', function(e){e.stop();
		previousPageID = $('pageid').innerHTML;
		$('pageid').innerHTML = 'blog';
		pageID = $('pageid').innerHTML;
		loadPageContentDOM('blog.php',pageID);
		set_selected_mainNavi('navi_main_blog');
	});
	$('navi_main_products').addEvent('click', function(e){e.stop();
		previousPageID = $('pageid').innerHTML;
		$('pageid').innerHTML = 'products';
		pageID = $('pageid').innerHTML;
		loadPageContentDOM('products.php',pageID);
		set_selected_mainNavi('navi_main_products');
	});
	$('navi_main_contact').addEvent('click', function(e){e.stop();
		previousPageID = $('pageid').innerHTML;
		$('pageid').innerHTML = 'contact';
		pageID = $('pageid').innerHTML;
		loadPageContentDOM('contact.php',pageID);
		set_selected_mainNavi('navi_main_contact');
	});
	*/
});

function initiate_architectsNavigation_elements()
{
	/*
	###############UNCOMMENT THE FOLLOWING CODE FOR AJAX LOAD OF JUST THE CONTENT###################
	/*
	$each($$('#architects_list li a'), function(el) {
		el.addEvent('click', function(e){e.stop();
			$('pageid').innerHTML = 'architect';
			pageID = $('pageid').innerHTML;
			loadPageContentDOM(el.href,pageID);
		});
  	});	
	*/
}//initiate_architectsNavigation_elements
function initiate_architectsProjectsNavigation_elements()
{
	/*
	###############UNCOMMENT THE FOLLOWING CODE FOR AJAX LOAD OF JUST THE CONTENT###################
	/*
	$each($$('#architect_projects li a'), function(el) {
		el.addEvent('click', function(e){e.stop();
			$('pageid').innerHTML = 'project';
			pageID = $('pageid').innerHTML;
			loadPageContentDOM(el.href,pageID);
		});
  });
	*/
}//initiate_architectsProjectsNavigation_elements
function initiate_projectsNavigation_elements()
{
		/*
	###############UNCOMMENT THE FOLLOWING CODE FOR AJAX LOAD OF JUST THE CONTENT###################
	/*
	$each($$('#projects_list li a'), function(el) {
		el.addEvent('click', function(e){e.stop();
			$('pageid').innerHTML = 'project';
			pageID = $('pageid').innerHTML;
			loadPageContentDOM(el.href,pageID);
		});
  });	
	*/
}//initiate_projectsNavigation_elements

function displaySelectedCategoryProjects()
{
	selectedCategory = $('projects_category_on_display').innerHTML;

	if(selectedCategory!='')
	{
		$$('#projects_list li').addClass('displaynone');
		visibleProjectsCounter = 0;
		$each($$('#projects_list li'), function(el2) {
			if(el2.hasClass(selectedCategory)){
				el2.removeClass('displaynone');
				visibleProjectsCounter++;
			}//if
		});
		
		if(visibleProjectsCounter<=7){
			$('scrollbar_leftarrow').addClass('displaynone');
			$('scrollbar_horizontal').addClass('displaynone');
			$('scrollbar_rightarrow').addClass('displaynone');
		}
		if(visibleProjectsCounter>7){
			$('scrollbar_leftarrow').removeClass('displaynone');
			$('scrollbar_horizontal').removeClass('displaynone');
			$('scrollbar_rightarrow').removeClass('displaynone');
		}
	}//if
}//displaySelectedCategoryProjects()

function initiate_projectImages_elements(containerID)
{
	if(containerID == 'project_images_container') {
		parallaxObj = new MooParallax($(document.body).getElements('.parallax'));
		Demo.scv = new Scroller($(containerID), {duration: 400, autostart: false, selectBy: 'class', autostart_dir:"forward",leftm:0,topm:0});
		
	}
	else
	{
		Demo.scv = new Scroller($(containerID), {duration: 2000, autostart: true, selectBy: 'class', autostart_dir:"forward",leftm:0,topm:0});
	}
}//initiate_projectImages_elements(containerID)

function imagesNaviToggleBG(type,objID)
{
	if(type == 'project'){containerID = '#project_images_navigation'}
	if(type == 'index'){containerID = '#index_images_navigation'}
	
	$$(containerID+' li a').removeClass('bluebackground');
	$$(containerID+' li a').addClass('graybackground');
	$(objID).addClass('bluebackground');
}//imagesNaviToggleBG(containerID,objID)

/*
function initiate_biography_scrollbar()
{
	var numberOfCharacters = $('architect_bio').innerHTML;
	numberOfCharacters = numberOfCharacters.length;
	if(numberOfCharacters > 392)
	{
		var myScrollbar = new ScrollBar('architect_bio', 'scrollbar_vertical', 'scrollbar_knob', {
			mode: 'vertical',
			offset: -1
		});
		myScrollbar.set(0);
	}//if
	else
	{
		$('scrollbar_vertical').dispose();
	}//else
}//initiate_biography_scrollbar
*/

function initiate_description_scrollbar(containerID)
{
	var numberOfCharacters = $('project_description').innerHTML;
	numberOfCharacters = numberOfCharacters.length;
	if(numberOfCharacters > 492)
	{
		var myScrollbar = new ScrollBar('project_description', 'scrollbar_vertical', 'scrollbar_knob', {
			mode: 'vertical',
			offset: -1,
			scroll: {
				duration: 1000,
				transition: 'sine:in:out'
			},
			knob: {
				duration: 1000,
				transition: 'sine:in:out'
			}
		});
		var containerHeight = $('project_description').offsetHeight;
		$('scrollbar_uparrow').addEvent('click', function(){
			myScrollbar.set(0); 
		});
		$('scrollbar_downarrow').addEvent('click', function(){
			myScrollbar.set(containerHeight);
		});
		myScrollbar.set(0);
	}//if
	else
	{
		$('scrollbar_uparrow').dispose();
		$('scrollbar_vertical').dispose();
		$('scrollbar_downarrow').dispose();
	}//else
}//initiate_description_scrollbar(containerID, divID)

function initiate_scrollbar_architect_vertical()
{
	var myScrollbar2 = new ScrollBar('architect_details_container', 'scrollbar_vertical_p', 'scrollbar_knob_p', {
		mode: 'vertical',
		offset: -1,
		scroll: {
			duration: 1000,
			transition: 'sine:in:out'
		},
		knob: {
			duration: 1000,
			transition: 'sine:in:out'
		}
	});
	var containerHeight = $('architect_details_container').offsetHeight;
	$('scrollbar_uparrow').addEvent('click', function(){
		myScrollbar2.set(0); 
	});
	$('scrollbar_downarrow').addEvent('click', function(){
		myScrollbar2.set(containerHeight);
	});
	myScrollbar2.set(0);
}//initiate_scrollbar_architect_vertical()

function initiate_scrollbar(containerID,ulID)
{
	
		var numberOfEntries = $$('#'+ulID+' li').length;
		if(numberOfEntries > 6)
		{
			var containerWidth = (numberOfEntries*115);
			$$('#'+containerID+' ul').setStyle('width', containerWidth+'px');
		
			var myScrollbar = new ScrollBar(containerID, 'scrollbar_horizontal', 'scrollbar_knob', {
				offset: -1,
				scroll: {
					duration: 1000,
					transition: 'sine:in:out'
				},
				knob: {
					duration: 1000,
					transition: 'sine:in:out'
				}
			});
			myScrollbar.set(0);
			
			var liEntries = $$('#'+ulID+' li');
			$('scrollbar_leftarrow').addEvent('click', function(){
				//var a = parseInt($('scrollbar_knob').getStyle('left'))-100;
				myScrollbar.set(0); 
			});
			$('scrollbar_rightarrow').addEvent('click', function(){
				myScrollbar.set(containerWidth);
			});
		}else{
			$('scrollbar_leftarrow').dispose();
			$('scrollbar_horizontal').dispose();
			$('scrollbar_rightarrow').dispose();
		}//
}//initiate_scrollbar(pageID)

function initiate_projectLinks_elements(pageID)
{
	switch(pageID)
	{
		case 'architect':
			$each($$('.architect_project_grid li a'), function(el) {
				var tween = new Fx.Tween(el,{ 'duration':'300', link:'cancel' });
				el.addEvents({
				  'mouseenter' : function() { tween.start('opacity',0.7) },
				  'mouseleave' : function() { tween.start('opacity',1) }
				});
			  });
			//initiate_biography_scrollbar();
			initiate_scrollbar_architect_vertical();
		break;
		case 'architects':
			$each($$('#architects_list li a'), function(el) {
				var tween = new Fx.Tween(el,{ 'duration':'300', link:'cancel' });
				el.addEvents({
				  'mouseenter' : function() { tween.start('opacity',0.7) },
				  'mouseleave' : function() { tween.start('opacity',1) }
				});
			  });
			initiate_scrollbar('architects_list_container','architects_list');
		break;
		case 'project':
			$each($$('#projects_list li a'), function(el) {
				var tween = new Fx.Tween(el,{ 'duration':'300', link:'cancel' });
				el.addEvents({
				  'mouseenter' : function() { tween.start('opacity',0.7) },
				  'mouseleave' : function() { tween.start('opacity',1) }
				});
			  });
			initiate_description_scrollbar('project_description');
		break;
		case 'projects':
			$each($$('#projects_list li a'), function(el) {
				var tween = new Fx.Tween(el,{ 'duration':'300', link:'cancel' });
				el.addEvents({
				  'mouseenter' : function() { tween.start('opacity',0.7) },
				  'mouseleave' : function() { tween.start('opacity',1) }
				});
			  });
			initiate_scrollbar('projects_list_container','projects_list');
		break;
	}//switch
}//initiate_projectLinks_elements()

function set_selected_mainNavi(selectedID)
{
	if((selectedID != 'navi_main_project')&&(selectedID != 'navi_main_architect'))
	{
		$$('#navi_main a').removeClass('selected');
		$(selectedID).className = 'selected';
		previousSelectedID_mainNavi = selectedID;
	}//if
}//set_selected_mainNavi(selectedID)

function loadPageContentDOM(contentPath,pageID)
{
	//alert(previousPageID+' '+pageID);
	//load the new content
	if($('content')){$('content').dispose();}
	
	switchContentReq = new Request.HTML({url:contentPath, 
		onSuccess: function(html) {switchSiteContents('success',html,'content_placeholder');}, 
		onFailure: function() {switchSiteContents('failure',html,'content_placeholder');}
	}).post({'loadtype': 'dom'});
	switchContentReq.send();
	
	//load the new sidebar
	if(previousPageID != pageID)
	{
	if($('sidebar')){$('sidebar').dispose();}
	if((pageID == 'architects')||(pageID == 'projects')||(pageID == 'architect')||(pageID == 'project'))
	{
		contentPath = 'functions/functions.inc.php?type=501';
		switchContentReq = new Request.HTML({url:contentPath, 
			onSuccess: function(html) {
				switchSiteContents('success',html,'sidebar_placeholder');
				initiate_secondaryNavigation_elements(pageID);
				pageID = pageID;
				if(pageID == 'architects'){initiate_architectsNavigation_elements(); initiate_projectLinks_elements('architects');}
				else if(pageID == 'architect'){set_selected_mainNavi('navi_main_architects'); initiate_projectLinks_elements('architect'); initiate_architectsProjectsNavigation_elements();}
				else if(pageID == 'projects'){initiate_projectsNavigation_elements(); initiate_projectLinks_elements('projects');}
				else if(pageID == 'project'){set_selected_mainNavi('navi_main_projects'); initiate_projectLinks_elements('project'); initiate_projectImages_elements('project_images_container');}
			}, 
			onFailure: function() {switchSiteContents('failure',html,'sidebar_placeholder');}
		}).post({'pageID': pageID});
		switchContentReq.send();
	}//if
	}
	
}//loadPageContentDOM()

function switchSiteContents(type,html,domPlaceholder){
	if(type=='success'){$(domPlaceholder).set('text', ''); $(domPlaceholder).adopt(html);}//success
	else if(type=='failure') { $(domPlaceholder).set('text', 'Error: Unable to load page.'); alert('Error: Unable to load page.');}//failure
}//switchSiteContents()


function initiate_secondaryNavigation_elements_architects()
{
	//remove the 'selected' class from all the trigger elements
	$$('#navi_sec div').removeClass('selected');
}//initiate_secondaryNavigation_elements_architects()

function initiate_secondaryNavigation_elements(pageID)
{
	
	//remove the 'selected' class from all the trigger elements
	$$('#navi_sec div').removeClass('selected');
	
	/*#####################################
	ARCHITECTURE SECONDARY NAVIGATION 
	#####################################*/
	var navi_sec_architectureSlider = new Fx.Slide('navi_sec_sub_architecture', {duration: 300}); //set the element to slide in/out
	navi_sec_architectureSlider.slideOut();
	$$('#navi_sec_sub_architecture span').fade('toggle');
	//$$('#navi_sec_sub_architecture span').set('tween', {duration: 3000}).fade('out');

	//execute the animation when the appropriate button is pressed
	$('navi_sec_architecture_div').addEvent('click',function(e){e.stop();
		execute_sec_navi_animation(navi_sec_architectureSlider,'architecture');
	});

	/*#####################################
	INTERIOR SECONDARY NAVIGATION 
	#####################################*/
	var navi_sec_interiorSlider = new Fx.Slide('navi_sec_sub_interior', {duration: 300}); //set the element to slide in/out
	navi_sec_interiorSlider.slideOut();
	$$('#navi_sec_sub_interior span').fade('toggle');
	//$$('#navi_sec_sub_interior span').set('tween', {duration: 3000}).fade('out');
	
	//execute the animation when the appropriate button is pressed
	$('navi_sec_interior_div').addEvent('click',function(e){e.stop();
		execute_sec_navi_animation(navi_sec_interiorSlider,'interior');
	});
	
	/*#####################################
	LANDSCAPE SECONDARY NAVIGATION 
	#####################################*/
	var navi_sec_landscapeSlider = new Fx.Slide('navi_sec_sub_landscape', {duration: 300});//set the element to slide in/out
	navi_sec_landscapeSlider.slideOut();
	$$('#navi_sec_sub_landscape span').fade('toggle');
	//$$('#navi_sec_sub_landscape span').set('tween', {duration: 3000}).fade('out');

	//execute the animation when the appropriate button is pressed
	$('navi_sec_landscape_div').addEvent('click',function(e){e.stop();
		execute_sec_navi_animation(navi_sec_landscapeSlider,'landscape');
	});

	if(pageID == 'projects'){
		$each($$('#navi_sec span a'), function(el) {
			el.addEvent('click', function(e){e.stop();
				$$('#navi_sec span a').removeClass('selected');
				el.addClass('selected');
				explodedStrArr = el.id.split('_');
				//alert(explodedStrArr[4]);
				$$('#projects_list li').addClass('displaynone');
				
				visibleProjectsCounter = 0;
				$each($$('#projects_list li'), function(el2) {
					if(el2.hasClass(explodedStrArr[4])){
						el2.removeClass('displaynone');
						visibleProjectsCounter++;
					}//if
				});
				
				if(visibleProjectsCounter<=7){
					$('scrollbar_leftarrow').addClass('displaynone');
					$('scrollbar_horizontal').addClass('displaynone');
					$('scrollbar_rightarrow').addClass('displaynone');
				}
				if(visibleProjectsCounter>7){
					$('scrollbar_leftarrow').removeClass('displaynone');
					$('scrollbar_horizontal').removeClass('displaynone');
					$('scrollbar_rightarrow').removeClass('displaynone');
				}
				
				//loadPageContentDOM(el.href,pageID);
			});
		});
	}//if

/*
###############UNCOMMENT THE FOLLOWING CODE FOR AJAX LOAD OF JUST THE CONTENT###################
/*
	$each($$('#navi_sec span a'), function(el) {
		el.addEvent('click', function(e){e.stop();
			if((pageID == 'architect') || (pageID == 'architects')){$('pageid').innerHTML = 'architects'; pageID = 'architects'; }
			else if((pageID == 'project') || (pageID == 'projects')){$('pageid').innerHTML = 'projects'; pageID = 'projects'; }
			//pageID = $('pageid').innerHTML;
			loadPageContentDOM(el.href,pageID);
		});
  });	
*/


}//initiate_secondaryNavigation_elements_architects()

function execute_sec_navi_animation(buttonObj,subMenuID)
{
	subLinksCounter = $$('#navi_sec_sub_'+subMenuID+' span').length;
	if(!buttonObj.open)
	{
		//alert(buttonObj.open);
		//add the 'select' class to the trigger element
		$('navi_sec_'+subMenuID+'_div').addClass('selected');
		buttonObj.toggle().chain(function(){
			function fadeInSecondaryNavi(i)
			{
				if(i<subLinksCounter){
					if(i==subLinksCounter-1){$$('#navi_sec_sub_'+subMenuID+' span')[i].set('tween', {duration: 50}).get('tween').start('opacity',1);}
					else{$$('#navi_sec_sub_'+subMenuID+' span')[i].set('tween',{duration: 50}).get('tween').start('opacity',1).chain(function(){fadeInSecondaryNavi(i+1)});}
				}//if
			}//function
			fadeInSecondaryNavi(0);
		}).wait(0);					
	}
	else if(buttonObj.open)
	{
			//alert(buttonObj.open);
			//remove the 'select' class to the trigger element
			$('navi_sec_'+subMenuID+'_div').removeClass('selected');
			function fadeOutSecondaryNavi(i)
			{
				if((subLinksCounter-1)>=0){
					if(i==0){$$('#navi_sec_sub_'+subMenuID+' span')[i].set('tween', {duration: 50}).get('tween').start('opacity',0).chain(function(){buttonObj.toggle()});}
					else{$$('#navi_sec_sub_'+subMenuID+' span')[i].set('tween',{duration: 50}).get('tween').start('opacity',0).chain(function(){fadeOutSecondaryNavi(i-1)});}
				}//if
			}//function
			fadeOutSecondaryNavi(subLinksCounter-1);				
	}
}//execute_sec_navi_animation(buttonObj)



