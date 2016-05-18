<?php
	session_start();
	require("functions/functions.inc.php");
	require("functions/get_architects.inc.php");
	require("functions/get_projects.inc.php");
	
	$pageID = 'contact';
	
	if(!(isset($_POST['loadtype']) && (($_POST['loadtype'] == 'json') || ($_POST['loadtype'] == 'dom')) ))
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>livingspaces - contact</title>

<style type="text/css" media="screen"> 
	@import url(./layout/css/layout.inc.css);
</style>
<script type="text/javascript" src="scripts/mootools/mootools-core-1.3-full-compat.js"></script>
<script type="text/javascript" src="scripts/mootools/mootools-more.js"></script>
<script type="text/javascript" src="scripts/commonajaxfunctions.js"></script>
<script type="text/javascript" src="scripts/validatensubmit.inc.js"></script>
<script type="text/javascript" src="scripts/Fx.MorphList.js"></script>
<script type="text/javascript" src="scripts/BarackSlideshow.js"></script>
<script type="text/javascript" src="scripts/main.inc.js"></script>
</head>

<body class='<?=$pageID?>'>
	
    <a name='top' id='top' />
	<div id='wallpaper'></div>
	
    <?=get_logo($pageID)?>
    <?=get_header($pageID)?>
    <div id='wrapper'>
        <div id='sidebar_placeholder'>
			<?=get_sidebar($pageID)?>
      	</div>
                
        <div id='content_placeholder'>
            <div id='content' class='contact_content'>
                <div id='content_padding_save'>
                
                	<ul id='contact_ul'>
                    	<li>
                        	<div class='cul_theme'>Architecture</div>
                            [coming soon]                            
                        </li>
                        <li>
                        	<div class='cul_theme'>Interior Design</div>
                            <div class='cul_name'><a href='' class=''>Mariana Vafiadis</a></div>
                            <div class='cul_mob'>+30 694 4183911</div>
                            <div class='cul_email'><a href='' class=''>mvafiadis@livingspaces.gr</a></div>
                        </li>
                        <li>
                        	<div class='cul_theme'>Landscape Architecture</div>
                            <div class='cul_name'><a href='' class=''>Stavros Vafiadis</a></div>
                            <div class='cul_mob'>+30 694 4778561</div>
                            <div class='cul_email'><a href='' class=''>svafiadis@livingspaces.gr</a></div>
                        </li>
                    
                    </ul>
                
                </div><!--content_padding_save-->
            </div><!--content-->

            <div class='clearboth'></div>
        </div><!--content_placeholder-->
		
       <?=get_footer($pageID)?> 
        
	</div><!--wrapper-->
	<div id='pageid' class='displaynone'><?=$pageID?></div>
</body>
</html>
<?
	}//if(!(isset($_POST['loadtype']) && (($_POST['loadtype'] == 'json') || ($_POST['loadtype'] == 'dom')) ))
	if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'json' )
	{
		//
	}//if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'json' )
	if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'dom')
	{
?>
    <div id='content' class='contact_content'>
        <div id='content_padding_save'>
        contact
        </div><!--content_padding_save-->
    </div><!--content-->
<?
	}//if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'dom')
?>