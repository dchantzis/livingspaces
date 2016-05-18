<?php	
	reset($_GET);
	if(isset($_GET['type']))
	{ 
		if(!preg_match("/^[0-9]([0-9]*)/",$_GET['type'])){$_GET['type'] = NULL; }
		else{$getType = $_GET['type']; }
		unset($_GET['type']);
	}else { $getType = NULL; }
	
	switch($getType)
	{
		case 501:
			$pageID = $_POST['pageID'];
			get_sidebar($pageID);
			break;
		default:
			break;
	}//
?>
<?php
/*##########################
###########################*/
function get_header($pageID)
{
	//find the selected link
	switch($pageID)
    {
    	case 'index': $selected_index = 'selected';  break;
		case 'architects': case 'architect': $selected_architects = 'selected';  break;
		case 'projects': case 'project': $selected_projects = 'selected';  break;
		case 'press': $selected_press = 'selected';  break;
		case 'blog': $selected_blog = 'selected';  break;
		case 'products': $selected_products = 'selected';  break;
		case 'contact': $selected_contact = 'selected';  break;
		default: $selected_index = 'selected';  break;
    }//switch
?>
    <div id='header'>        
        <ul id='navi_main'>
            <li class='' id=''><a href='index.php' id='navi_main_index' class='<?=$selected_index?>' title=''>home</a></li>
            <li class='' id=''><a href='architects.php' id='navi_main_architects' class='<?=$selected_architects?>' title=''>architects</a></li>
            <li class='' id=''><a href='projects.php' id='navi_main_projects' class='<?=$selected_projects?>' title=''>projects</a></li>
            <li class='' id=''><a href='press.php' id='navi_main_press' class='<?=$selected_press?>' title=''>press</a></li>
            <li class='' id=''><a href='http://livingspacesgr.tumblr.com/' target='_blank' id='navi_main_blog' class='<?=$selected_blog?>' title=''>blog</a></li>
            <li class='' id=''><a href='products.php' id='navi_main_products' class='<?=$selected_products?>' title=''>products</a></li>
            <li class='last' id=''><a href='contact.php' id='navi_main_contact' class='<?=$selected_contact?>' title=''>contact</a></li>
        </ul><!--navi_main-->
        <div class='clearboth'></div>
    </div><!--header-->
<?
}//get_header($pageID)


/*##########################
###########################*/
function get_sidebar($pageID)
{
	switch($pageID)
	{
		case 'architects':
		case 'architect':
?>
        <div id='sidebar'>
        	<ul id='navi_sec'>
            	<li id='' class=''>
               		<div class='navi_sec_sub_title selected' id='navi_sec_architecture_div'><a href='architects.php?filter=architecture' id='navi_sec_architecture' class='a_navi_sec_title' title=''>architecture</a></div>
                </li><!---->
            	<li id='' class=''>
               		<div class='navi_sec_sub_title selected' id='navi_sec_interior_div'><a href='architects.php?filter=interior' id='navi_sec_interior' class='a_navi_sec_title' title=''>interior</a></div>
                </li><!---->
            	<li id='' class=''>
               		<div class='navi_sec_sub_title selected' id='navi_sec_landscape_div'><a href='architects.php?filter=landscape' id='navi_sec_landscape' class='a_navi_sec_title' title=''>landscape</a></div>
                </li><!---->
            </ul><!--navi_sec-->
        </div><!--sidebar-->
<?
			break;
		case 'projects':
		case 'project':
?>
        <div id='sidebar'>
        	<ul id='navi_sec'>
            	<li id='' class=''>
               		<div class='navi_sec_sub_title selected' id='navi_sec_architecture_div'><a href='projects.php?filter=architecture' id='navi_sec_architecture' class='a_navi_sec_title' title=''>architecture</a></div>
                    <div id='navi_sec_sub_architecture' class=''>
                    	<span id='navi_sec_sub_architecture_option01_span' class='navi_sec_sub_link'><a href='#' id='navi_sec_sub_architecture_option01' class='' title=''>option #01</a></span>
                        <span id='navi_sec_sub_architecture_option02_span' class='navi_sec_sub_link'><a href='#' id='navi_sec_sub_architecture_option02' class='' title=''>option #02</a></span>
                        <span id='navi_sec_sub_architecture_option03_span' class='navi_sec_sub_link'><a href='#' id='navi_sec_sub_architecture_option03' class='' title=''>option #03</a></span>
                        <span id='navi_sec_sub_architecture_option04_span' class='navi_sec_sub_link'><a href='#' id='navi_sec_sub_architecture_option04' class='' title=''>option #04</a></span>
                    </div><!--navi_sec_architecture_sub-->
                </li><!---->
            	<li id='' class=''>
               		<div class='navi_sec_sub_title selected' id='navi_sec_interior_div'><a href='projects.php?filter=interior' id='navi_sec_interior' class='a_navi_sec_title' title=''>interior</a></div>
                    <div id='navi_sec_sub_interior' class=''>
                    	<span id='navi_sec_sub_interior_option01_span' class='navi_sec_sub_link'>
                        	<a href='projects.php?filter=bathrooms' id='navi_sec_sub_interior_bathrooms' class='' title=''>bathrooms</a></span>
                        <span id='navi_sec_sub_interior_option02_span' class='navi_sec_sub_link'>
                        	<a href='projects.php?filter=bedrooms' id='navi_sec_sub_interior_bedrooms' class='' title=''>bedrooms</a></span>
                        <span id='navi_sec_sub_interior_option03_span' class='navi_sec_sub_link'>
                        	<a href='projects.php?filter=kitchens' id='navi_sec_sub_interior_kitchens' class='' title=''>kitchens</a></span>
                        <span id='navi_sec_sub_interior_option04_span' class='navi_sec_sub_link'>
                        	<a href='projects.php?filter=livingareas' id='navi_sec_sub_interior_livingareas' class='' title=''>living areas</a></span>
                        <span id='navi_sec_sub_interior_option05_span' class='navi_sec_sub_link'>
                        	<a href='projects.php?filter=outdoor' id='navi_sec_sub_interior_outdoor' class='' title=''>outdoor</a></span>
                        <span id='navi_sec_sub_interior_option06_span' class='navi_sec_sub_link'>
                        	<a href='projects.php?filter=studiospaces' id='navi_sec_sub_interior_studiospaces' class='' title=''>studio spaces</a></span>
                    </div><!--navi_sec_sub_arch-->
                </li><!---->
            	<li id='' class=''>
               		<div class='navi_sec_sub_title selected' id='navi_sec_landscape_div'><a href='projects.php?filter=landscape' id='navi_sec_landscape' class='a_navi_sec_title' title=''>landscape</a></div>
                    <div id='navi_sec_sub_landscape' class=''>
                    	<span id='navi_sec_sub_landscape_option01_span' class='navi_sec_sub_link'><a href='projects.php?filter=housing' id='navi_sec_sub_landscape_housing' class='' title=''>housing</a></span>
                        <span id='navi_sec_sub_landscape_option02_span' class='navi_sec_sub_link'><a href='projects.php?filter=islandhomes' id='navi_sec_sub_landscape_islandhomes' class='' title=''>island homes</a></span>
                        <span id='navi_sec_sub_landscape_option03_span' class='navi_sec_sub_link'><a href='projects.php?filter=businessbuildings' id='navi_sec_sub_landscape_businessbuildings' class='' title=''>business buildings</a></span>
                        <span id='navi_sec_sub_landscape_option04_span' class='navi_sec_sub_link'><a href='projects.php?filter=hotels' id='navi_sec_sub_landscape_hotels' class='' title=''>hotels</a></span>
                        <span id='navi_sec_sub_landscape_option05_span' class='navi_sec_sub_link'><a href='projects.php?filter=sportsgrounds' id='navi_sec_sub_landscape_sportsgrounds' class='' title=''>sports grounds</a></span>                     
                        <span id='navi_sec_sub_landscape_option06_span' class='navi_sec_sub_link'><a href='projects.php?filter=balconies' id='navi_sec_sub_landscape_balconies' class='' title=''>balconies</a></span>
                        <?php /*
                        <span id='navi_sec_sub_landscape_option07_span' class='navi_sec_sub_link'><a href='projects.php?filter=offices' id='navi_sec_sub_landscape_offices' class='' title=''>offices</a></span>
                        <span id='navi_sec_sub_landscape_option07_span' class='navi_sec_sub_link'><a href='projects.php?filter=logistics' id='navi_sec_sub_landscape_logistics' class='' title=''>logistics</a></span>
                        */
						?>
                    </div><!--navi_sec_sub_arch-->
                </li><!---->
            </ul><!--navi_sec-->
            
        </div><!--sidebar-->
<?
			break;
		default:
			//return nothing
			break;//default:
	}//switch
}//get_sidebar($pageID)


/*##########################
###########################*/
function get_navi_sub($pageID)
{
?>
<?
}//get_navi_sub($pageID)


/*##########################
###########################*/
function get_logo($pageID)
{
?>
    <div id='logo_container'>
        <a href='index.php' id='logo'><img src='layout/images/logo.png'  /></a>
    </div><!--logo-->
<?
}////get_logo($pageID)


/*##########################
###########################*/
function get_footer($pageID)
{
?>
    <div id='footer'>&nbsp;</div><!--footer-->
<?
}//get_footer($pageID)


/*##########################
some stuff to load in all pages..
pre-load images and stuff like that
###########################*/
function get_stuffToLoad()
{
?>

<?
}//get_stuffToLoad()

?>