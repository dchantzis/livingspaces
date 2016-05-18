<?php
	session_start();
	require("functions/functions.inc.php");
	require("functions/get_architects.inc.php");
	require("functions/get_projects.inc.php");
	
	$pageID = 'project';
	//$projectID = $_GET['pname']; //use the architect name as an ID
	//$resultArr = get_project_data($_GET['pname']; <-- returns 404 for no data with this parameter, or an array with all the retrieved data
	$projectID = '';
	if(isset($_GET['pid']))
	{
		$projectID = $_GET['pid'];
	}//if
	
	if(!(isset($_POST['loadtype']) && (($_POST['loadtype'] == 'json') || ($_POST['loadtype'] == 'dom')) ))
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>livingspaces</title>

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
<script type="text/javascript" src="scripts/moo-scroll.js"></script>
<script type="text/javascript" src="scripts/MooParallax.js"></script>
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
            <div id='content' class='project_content'>
                <div id='content_padding_save'>
                <?php get_projects('project_id',$projectID); ?>
                <?php /*
                    if($resultArr['pageCode'] == 404)
                        {echo "<div id='' class=''>Sorry for the sorry for the inconvenience. The page you requested was not found.</div>";}
                    */
                ?>
                </div><!--content_padding_save-->
            </div><!--content-->
            
            
            <div class='clearboth'></div>
        </div><!--content_placeholder-->
		
       <?=get_footer($pageID)?> 
	</div>
<!--wrapper-->
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
    <div id='content' class='project_content'>
        <div id='content_padding_save'>
        <?php get_projects('project_id',$projectID); ?>
        <?php /*
            if($resultArr['pageCode'] == 404)
                {echo "<div id='' class=''>Sorry for the sorry for the inconvenience. The page you requested was not found.</div>";}
            */
        ?>
        </div><!--content_padding_save-->
    </div><!--content-->
<?
	}//if( isset($_POST['loadtype']) && $_POST['loadtype'] == 'dom')
?>