<?php
	session_start();
	require("functions/functions.inc.php");
	require("functions/get_architects.inc.php");
	require("functions/get_projects.inc.php");
		
	$pageID = 'index';
	
	if(!(isset($_POST['loadtype']) && (($_POST['loadtype'] == 'json') || ($_POST['loadtype'] == 'dom')) ))
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>livingspaces - home</title>

<style type="text/css" media="screen"> 
	@import url(./layout/css/layout.inc.css);
</style>

<script type="text/javascript" src="scripts/mootools/mootools-core-1.3-full-compat.js"></script>
<script type="text/javascript" src="scripts/mootools/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="scripts/commonajaxfunctions.js"></script>
<script type="text/javascript" src="scripts/validatensubmit.inc.js"></script>
<script type="text/javascript" src="scripts/Fx.MorphList.js"></script>
<script type="text/javascript" src="scripts/Scrollbar.js"></script>
<!--<script type="text/javascript" src="scripts/BarackSlideshow.js"></script>-->
<script type="text/javascript" src="scripts/main.inc.js"></script>
<script type="text/javascript" src="scripts/moo-scroll.js"></script>

</head>

<body class='<?=$pageID?>'>
	
    <a name='top' id='top' /></a>
	<div id='wallpaper'></div>
	
    <?=get_header($pageID)?>
    <?=get_logo($pageID)?>
    <div id='wrapper'>
    	
        <div id='wrapper_inner'>
        
        <div id='sidebar_placeholder'>
			<?=get_sidebar($pageID)?>
      	</div>
        
        <div id='content_placeholder'>
        	<div id='content' class='index_content'>
            	<div id='content_padding_save'>

                	<div id="index_images_container"> 
                		<div>
                    		<ul id='index_images' class=''>
                                <li class='slide'>
                                    <div>
                                    <a href='javascript:Demo.scv.goto(1); imagesNaviToggleBG("index","index_images_navigation_1");' title='' class=''>
                                        <img class='' src='images/homepage/image01.jpg' title='' alt='' width='909' />
                                    </a>
                                    <?php //<span class='slide_caption'>Caption 1</span> ?>
                                    </div>
                                </li>
                                
                                <li class='slide'>
                                    <div>
                                    <a href='javascript:Demo.scv.goto(2); imagesNaviToggleBG("index","index_images_navigation_2");' title='' class=''>
                                        <img class='' src='images/homepage/image02.jpg' title='' alt='' width='909' /> 
                                    </a>
                                    <?php //<span class='slide_caption'>Caption 2</span> ?>
                                    </div>
                                </li>                               

                                <li class='slide'>
                                    <div>
                                    <a href='javascript:Demo.scv.goto(3); imagesNaviToggleBG("index","index_images_navigation_3");' title='' class=''>
                                        <img class='' src='images/homepage/image03.jpg' title='' alt='' width='909' />
                                    </a>
                                    <?php //<span class='slide_caption'>Caption 3</span> ?>
                                    </div>
                                </li>

                                <li class='slide'>
                                    <div>
                                    <a href='javascript:Demo.scv.goto(4); imagesNaviToggleBG("index","index_images_navigation_4");' title='' class=''>
                                        <img class='' src='images/homepage/image04.jpg' title='' alt='' width='909' />
                                    </a>
                                    <?php //<span class='slide_caption'>Caption 4</span> ?>
                                    </div>
                                </li>


                                <li class='slide'>
                                    <div>
                                    <a href='javascript:Demo.scv.goto(5); imagesNaviToggleBG("index","index_images_navigation_5");' title='' class=''>
                                        <img class='' src='images/homepage/image05.jpg' title='' alt='' width='909' />
                                    </a> 
                                    <?php //<span class='slide_caption'>Caption 5</span> ?>
                                    </div>
                                </li>
                                
                                
                                <li class='slide'>
                                    <div>
                                    <a href='javascript:Demo.scv.goto(6); imagesNaviToggleBG("index","index_images_navigation_6");' title='' class=''>
                                        <img class='' src='images/homepage/image06.jpg' title='' alt='' width='909' />
                                    </a>
                                    <?php //<span class='slide_caption'>Caption 6</span> ?>
                                    </div>
                                </li>
                                
 <!--                               
                                <li class='slide'>
                                    <div>
                                    <a href='javascript:Demo.scv.goto(7); imagesNaviToggleBG("index","index_images_navigation_7");' title='' class=''>
                                        <img class='' src='images/homepage/image07.jpg' title='' alt='' width='909' />
                                    </a>
                                    <?php //<span class='slide_caption'>Caption 7</span>?>
                                    </div>
                                </li>

                                <li class='slide'>
                                    <div>
                                    <a href='javascript:Demo.scv.goto(0); imagesNaviToggleBG("index","index_images_navigation_0");' title='' class=''>
                                        <img class='' src='images/homepage/image08.jpg' title='' alt='' width='909' /> 
                                    </a>
                                    <?php //<span class='slide_caption'>Caption 8</span> ?>
                                    </div>
                                </li>
                               -->
                            </ul>
                		</div>
                    </div>
        
                    <ul id='index_images_navigation'>
                    	<li>
                        	<a id='index_images_navigation_0' href='javascript:Demo.scv.goto(0);  imagesNaviToggleBG("index","index_images_navigation_0");' title='' class='bluebackground'>&nbsp;</a>
                        </li> 
                        
                    	<li>
                        	<a id='index_images_navigation_1' href='javascript:Demo.scv.goto(1);  imagesNaviToggleBG("index","index_images_navigation_1");' title='' class='graybackground'>&nbsp;</a>
                        </li>                         
                        
                    	<li>
                        	<a id='index_images_navigation_2' href='javascript:Demo.scv.goto(2);  imagesNaviToggleBG("index","index_images_navigation_2");' title='' class='graybackground'>&nbsp;</a>
                        </li>                       
                        
                    	<li>
                        	<a id='index_images_navigation_3' href='javascript:Demo.scv.goto(3);  imagesNaviToggleBG("index","index_images_navigation_3");' title='' class='graybackground'>&nbsp;</a>
                        </li>                        
                        
                    	<li>
                        	<a id='index_images_navigation_4' href='javascript:Demo.scv.goto(4);  imagesNaviToggleBG("index","index_images_navigation_4");' title='' class='graybackground'>&nbsp;</a>
                        </li>                       

						<li>
                        	<a id='index_images_navigation_5' href='javascript:Demo.scv.goto(5);  imagesNaviToggleBG("index","index_images_navigation_5");' title='' class='graybackground'>&nbsp;</a>
                        </li>
                        
                        <!--
                        <li>
                        	<a id='index_images_navigation_6' href='javascript:Demo.scv.goto(6);  imagesNaviToggleBG("index","index_images_navigation_6");' title='' class='graybackground'>&nbsp;</a>
                        </li>
                        
                        <li>
                        	<a id='index_images_navigation_7' href='javascript:Demo.scv.goto(7);  imagesNaviToggleBG("index","index_images_navigation_7");' title='' class='graybackground'>&nbsp;</a>
                        </li>
                        -->
                    </ul>
                    
				<?php
					/*
				<!--
					#######IMAGE GRID#######
                	<div id='homepagelogo_container'>
                    	<img src='layout/images/homelogo.png' />
                    </div>
                -->
				<!--
					#######IMAGE GRID#######
                	<div id='index_grid'>
                    <ul>
                    	<li class='index_grid_frow'><img src='./layout/images/indexthumb.png' width="270" height="170" /></li>
                        <li class='index_grid_frow'><img src='./layout/images/indexthumb.png' width="270" height="170" /></li>
                        <li class='index_grid_frow index_grid_fright'><img src='./layout/images/indexthumb.png' width="270" height="170" /></li>
                    	<li class='index_grid_srow'><img src='./layout/images/indexthumb.png' width="270" height="170" /></li>
                        <li class='index_grid_srow'><img src='./layout/images/indexthumb.png' width="270" height="170" /></li>
                        <li class='index_grid_srow index_grid_fright'><img src='./layout/images/indexthumb.png' width="270" height="170" /></li>
                    </ul>
                    </div>
                    <span class='clearboth'></span>
                -->
					*/
				?>
				    
                </div><!--content_padding_save-->
            </div><!--content-->
            <div class='clearboth'></div>
        </div><!--content_placeholder-->
		
       <?=get_footer($pageID)?> 
    
    	</div><!--wrapper_inner-->    
	</div><!--wrapper-->
	<div id='pageid' class='displaynone'><?=$pageID?></div>
</body>
</html>
<?
	}//if(!(isset($_POST['loadtype']) && (($_POST['loadtype'] == 'json') || ($_POST['loadtype'] == 'dom')) ))
	if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'json' )
	{
		//Not implemented
	}//if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'json' )
	if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'dom')
	{
?>
        <div id='content' class='index_content'>
            <div id='content_padding_save'>
                <img src='images/home.jpg' id='home_image' width='656' height='290'/>                
            </div><!--content_padding_save-->
        </div><!--content-->
<?
	}//if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'dom')
?>
