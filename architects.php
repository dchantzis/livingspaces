<?php
	session_start();
	require("functions/functions.inc.php");
	require("functions/get_architects.inc.php");
	require("functions/get_projects.inc.php");
	
	$pageID = 'architects';
	$projectsFilter = '';
	if(isset($_GET['filter']))
	{
		$projectsFilter = $_GET['filter'];
	}//if
	
	if(!(isset($_POST['loadtype']) && (($_POST['loadtype'] == 'json') || ($_POST['loadtype'] == 'dom')) ))
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>livingspaces - architects</title>

<style type="text/css" media="screen"> 
	@import url(./layout/css/layout.inc.css);
</style>
<script type="text/javascript" src="scripts/mootools/mootools-core-1.4.0.js"></script>
<script type="text/javascript" src="scripts/mootools/mootools-more-1.4.0.1.js"></script>
<script type="text/javascript" src="scripts/commonajaxfunctions.js"></script>
<script type="text/javascript" src="scripts/validatensubmit.inc.js"></script>
<script type="text/javascript" src="scripts/Fx.MorphList.js"></script>
<script type="text/javascript" src="scripts/Scrollbar.js"></script>
<!--<script type="text/javascript" src="scripts/BarackSlideshow.js"></script>-->
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
        	<div id='content' class='architects_content'>
            	<div id='content_padding_save'>
            	<?php get_architects('project_category',$projectsFilter); ?>
                
                
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
    <div id='content' class='architect_content'>
        <div id='content_padding_save'>
        <?php get_architects('project_category',$architectsFilter); ?>
        
        </div><!--content_padding_save-->
    </div><!--content-->
<?
	}//if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'dom')
?>