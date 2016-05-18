<?php
function get_projects($parameter,$value)
{

	switch($parameter)
	{
		case 'project_category':
			//search for all architects by project_category
			get_projects_by_category($value);
			break;
		case 'architect_id':
			//search for project by architect_id
			get_projects_by_architect($value);
			break;
		case 'project_id':
			//search for specific project by project_id
			get_unique_project($value);
			break;
		default:
			break;
	}//switch

}//get_architects

function get_projects_by_category($categoryName)
{
	######################
	#FUNCTION BLUEPRINT###
	######################
	
	//require_once('database.class.php');
	//$dbobj = new DataBase();
	$projectsArray = array();
	$themeName = '';

	require ( "config.inc.php");
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Cannot connect to specified host with this DB user');
	@mysql_select_db(DB_DATABASE) or die('Cannot select the database');
	
	
	switch($categoryName)
	{
		case 'landscape':
			$categoryName=''; $themeName = 'landscape';
			break;
		case 'interior':
			$categoryName=''; $themeName = 'interior';
			break;
		case 'architecture':
			$categoryName=''; $themeName = 'architecture';
			break;
		default:
			break;
	}//switch
	
	if($categoryName == '')
	{
		if($themeName == '')
		{
			$query = "SELECT p.pid,p.title,p.pdate,p.scope,p.description,p.location,p.theme, p.category,p.views,p.imagefileslocation, p.creationtimestamp FROM project p ORDER BY p.pid;";
		}//if
		else
		{
			$query = "SELECT p.pid,p.title,p.pdate,p.scope,p.description,p.location,p.theme, p.category,p.views,p.imagefileslocation, p.creationtimestamp FROM project p WHERE p.theme = '".$themeName."' ORDER BY p.pid;";
		}//else
	}//if
	else
	{
		//$query = "SELECT p.pid,p.title,p.pdate,p.scope,p.description,p.location,p.theme, p.category,p.views,p.imagefileslocation, p.creationtimestamp FROM project p WHERE p.category = '".$categoryName."' ORDER BY p.pid;";
		$query = "SELECT p.pid,p.title,p.pdate,p.scope,p.description,p.location,p.theme, p.category,p.views,p.imagefileslocation, p.creationtimestamp FROM project p ORDER BY p.pid;";
	}//else

	$result = @mysql_query($query);
	$num = @mysql_num_rows($result);
	
	if($num != 0)
	{
		for($j=0; $j<$num; $j++)
		{
			$projectsArray[$j]['pid'] = @mysql_result($result,$j,'pid');
			$projectsArray[$j]['title'] = @mysql_result($result,$j,'title');
			$projectsArray[$j]['pdate'] = @mysql_result($result,$j,'pdate');
			$projectsArray[$j]['scope'] = @mysql_result($result,$j,'scope');
			$projectsArray[$j]['description'] = @mysql_result($result,$j,'description');
			$projectsArray[$j]['location'] = @mysql_result($result,$j,'location');
			$projectsArray[$j]['theme'] = @mysql_result($result,$j,'theme');
			$projectsArray[$j]['category'] = @mysql_result($result,$j,'category');	
			$projectsArray[$j]['views'] = @mysql_result($result,$j,'views');
			$projectsArray[$j]['imagefileslocation'] = @mysql_result($result,$j,'imagefileslocation');
			$projectsArray[$j]['creationtimestamp'] = @mysql_result($result,$j,'creationtimestamp');
			$projectsArray[$j]['fileurl'] = @mysql_result($result,$j,'fileurl');
		}//
	}else{}//no query result
	if($num == 0)
	{
		echo 'No projects where found in this category.';
	}//if($num == 0)
	else if($num != 0)
	{
?>
	<div id='projects_list_container'>
        <ul id='projects_list'>
<?
		for($i=0;$i<$num;$i++)
		{
?>
			<li class='<?=$projectsArray[$i]['category']?>'>
                <a href='project.php?pid=<?=$projectsArray[$i]['pid']?>' title='' class='project_preview_link' /><img src='<?=$projectsArray[$i]['imagefileslocation']?>preview.jpg' width='90' height='357' title='' /><span class='project_category displaynone'></span></a>
                <div class='project_title'><span><?=$projectsArray[$i]['title']?></span></div>
            </li>
<?
		}//for
?>
        </ul><!--projects_list-->
    </div><!--projects_list_container-->
    <div id='projects_category_on_display' class='displaynone'><?=$categoryName?></div>
    <div id='scrollbar_leftarrow'><img src='layout/images/arr_left.png' /></div>
    <div id="scrollbar_horizontal">
    	<div id="scrollbar_knob">
        </div>
	</div>
    <div id='scrollbar_rightarrow'><img src='layout/images/arr_right.png' /></div>
<?
	}//
?>

<?php
}//get_projects_by_category($value)


function get_projects_by_architect($architectID)
{
?>
<?php
}//get_projects_by_architect($value)


function get_unique_project($projectID)
{
	//require_once('database.class.php');
	//$dbobj = new DataBase();
	$projectsArray = array();
	$imagesArray = array();
	$architectsArray = array();
	$architectsList = '';

	require ( "config.inc.php");
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Cannot connect to specified host with this DB user');
	@mysql_select_db(DB_DATABASE) or die('Cannot select the database');
	
	$query = "SELECT p.pid,p.title,p.pdate,p.scope,p.description,p.location,p.theme,p.category,p.views,p.imagefileslocation, p.creationtimestamp
			FROM project p
			WHERE p.pid = '".$projectID."';";
	$result = @mysql_query($query);
	$num = @mysql_num_rows($result);
	
	if($num != 0)
	{
		$j=0;
		$projectsArray[$j]['pid'] = @mysql_result($result,$j,'pid');
		$projectsArray[$j]['title'] = @mysql_result($result,$j,'title');
		$projectsArray[$j]['pdate'] = @mysql_result($result,$j,'pdate');
		$projectsArray[$j]['scope'] = @mysql_result($result,$j,'scope');
		$projectsArray[$j]['description'] = @mysql_result($result,$j,'description');
		$projectsArray[$j]['location'] = @mysql_result($result,$j,'location');
		$projectsArray[$j]['theme'] = @mysql_result($result,$j,'theme');
		$projectsArray[$j]['category'] = @mysql_result($result,$j,'category');
		$projectsArray[$j]['views'] = @mysql_result($result,$j,'views');
		$projectsArray[$j]['imagefileslocation'] = @mysql_result($result,$j,'imagefileslocation');
		$projectsArray[$j]['creationtimestamp'] = @mysql_result($result,$j,'creationtimestamp');


		//GET ALL THE IMAGES OF THIS PROJECT
		$query02 = "SELECT * FROM image WHERE pid='".$projectID."' AND imagetype='regular' ORDER BY iid;";
		$result02 = @mysql_query($query02);
		$num02 = @mysql_num_rows($result02);
		if($num02 != 0)
		{
			for($i=0; $i<$num02; $i++)
			{
				$imagesArray[$i]['iid'] = @mysql_result($result02,$i,'iid');
				$imagesArray[$i]['pid'] = @mysql_result($result02,$i,'pid');
				$imagesArray[$i]['aid'] = @mysql_result($result02,$i,'aid');
				$imagesArray[$i]['caption'] = @mysql_result($result02,$i,'caption');
				$imagesArray[$i]['fileurl'] = @mysql_result($result02,$i,'fileurl');
			}//for
		}//if
		else
		{
			//no images found for this project
		}//else
		
		
		//GET THE ARCHITECTS NAMES OF THIS PROJECT
		$query03 = "SELECT a.aid, a.name FROM architect a, architecttoproject ap WHERE ap.pid='".$projectID."' AND ap.aid=a.aid;";
		$result03 = @mysql_query($query03);
		$num03 = @mysql_num_rows($result03);
		if($num03 != 0)
		{
			for($z=0; $z<$num03; $z++)
			{
				$architectsArray[$z]['aid'] = @mysql_result($result03,$z,'aid');
				$architectsArray[$z]['name'] = @mysql_result($result03,$z,'name');
				
				if($z==0){$comma = '';}else{$comma = ', ';}
				$architectsList = $architectsList.$comma."<a href='architect.php?aid=".$architectsArray[$z]['aid']."'>".strtolower($architectsArray[$z]['name'])."</a>";
			}//for
			
			
			
		}//if
		else
		{
			//no architects found for this project
		}//else
?>
	<div id='project_data'>
    	<div id='project_data_padding_save'>
           	<div id="project_images_container"> 
                <div>
                <ul id='project_images' class=''>
<?php
				if($num02 != 0)
				{
					$imageLinkPointer = 0;
					for($i=0;$i<$num02;$i++)
					{
						$className = '';
						$imageLinkPointer = $i;
						if($i==($num02-1)){ $imageLinkPointer=-1; }
						
						$imageSize = getimagesize($imagesArray[$i]['fileurl']);
						if( ($imageSize[0]=='509') && ($imageSize[1]=='353')){}
							else {$className = 'parallax'; }
?>
					<li class='slide'>
                        <div class='<?=$className?>' style='width:509px; height:353px'>
                    	<a href='javascript:Demo.scv.goto(<?=($imageLinkPointer+1)?>); imagesNaviToggleBG("project","project_images_navigation_<?=($imageLinkPointer+1)?>");' title='<?=$imagesArray[$i]['caption']?>' class=''>
                        	<img class='project_images' src='<?=$imagesArray[$i]['fileurl']?>' style='width:<?=$imageSize[0]?>px; height:<?=$imageSize[1]?>px;' title='' alt='project image' />
                        </a>
                        </div>
                    </li>
<?
					}//for
				}//if
				else{}
?>
                </ul><!--project_image-->
                </div>
            </div>
            
            <ul id='project_images_navigation'>
<?php
				if($num02 != 0)
				{
					for($i=0;$i<$num02;$i++)
					{
						$linkClass='graybackground';
						if($i==0){$linkClass='bluebackground';}
?>
					 <li><a id='project_images_navigation_<?=$i?>' href='javascript:Demo.scv.goto(<?=$i?>);  imagesNaviToggleBG("project","project_images_navigation_<?=$i?>");' title='<?=$imagesArray[$i]['caption']?>' class='<?=$linkClass?>'>&nbsp;</a></li>
<?
					}//for
				}//if
				else{}
?>
            </ul>
            
            <div id='project_details'>
                <div id='project_info'>
                    <div id='project_title'><b>Project:</b> <?=$projectsArray[$j]['title']?></div>
                    <div id='project_location'><b>Location:</b> <?=$projectsArray[$j]['location']?></div>
                    <div id='project_date'><b>Year:</b> <?=$projectsArray[$j]['pdate']?></div>                  
                    <div id='project_architects'><b>Architect:</b> <?=$architectsList?></div>
                    <div id='project_scope'><b>Scope:</b> <?=$projectsArray[$j]['scope']?></div>
                </div><!--project_info-->
                
                <div id='project_description_container'>
                    <div id='project_description'><div><?=$projectsArray[$j]['description']?></div></div><!--project_description-->
                    
                    <div id='scrollbar_uparrow'><img src='layout/images/arr_up.png'/></div>
                    <div id='scrollbar_vertical'><div id='scrollbar_knob'></div></div>
                	<div id='scrollbar_downarrow'><img src='layout/images/arr_down.png'  /></div>
                </div><!--project_description_container-->
                
            </div><!--project_details-->
        </div><!--project_data_padding_save-->
    </div><!--project_data-->
<?		
	}else{}//no query result
?>

<?php
}//get_unique_project($value)


?>
