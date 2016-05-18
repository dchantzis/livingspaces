<?php

function get_architects($parameter,$value)
{

	switch($parameter)
	{
		case 'project_category':
			//search for all architects by project_category
			get_architects_by_category($value);
			break;
		case 'project_id':
			//search for all architects by project_id
			get_architects_by_project($value);
			break;
		case 'architect_id':
			//search for specific architect
			get_unique_architect($value);
			break;
		default:
			break;
	}//switch

}//get_architects

function get_architects_by_category($categoryName)
{
	$projectsArray = array();
	$imagesArray = array();
	$architectsArray = array();
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
			$query = "SELECT a.aid, a.name, a.name, a.email, a.avatar, a.biography, a.views, a.creationtimestamp, i.fileurl
FROM architect a, image i WHERE a.aid = i.aid AND i.imagetype = 'preview' AND i.pid = 0 ORDER BY a.aid;";
		}//if
		else
		{
			$query = "SELECT DISTINCT(a.aid), a.name, a.name, a.email, a.avatar, a.biography, a.views, a.creationtimestamp, i.fileurl
			FROM architect a, project p, architecttoproject ap, image i WHERE a.aid = ap.aid AND ap.pid = p.pid AND p.theme='".$themeName."' AND a.aid = i.aid AND i.imagetype = 'preview' AND i.pid = 0 ORDER BY a.aid;";	
		}//else
	}//if
	else
	{
		$query = "SELECT DISTINCT(a.aid), a.name, a.name, a.email, a.avatar, a.biography, a.views, a.creationtimestamp, i.fileurl
			FROM architect a, project p, architecttoproject ap, image i WHERE a.aid = ap.aid AND ap.pid = p.pid AND p.category='".$categoryName."' AND a.aid = i.aid AND i.imagetype = 'preview' AND i.pid = 0 ORDER BY a.aid;";
	}//else


	$result = @mysql_query($query);
	$num = @mysql_num_rows($result);
	
	if($num != 0)
	{
		for($i=0; $i<$num; $i++)
		{
			$architectsArray[$i]['aid'] = @mysql_result($result,$i,'aid');
			$architectsArray[$i]['name'] = @mysql_result($result,$i,'name');
			$architectsArray[$i]['email'] = @mysql_result($result,$i,'email');
			$architectsArray[$i]['avatar'] = @mysql_result($result,$i,'avatar');
			$architectsArray[$i]['fileurl'] = @mysql_result($result,$i,'fileurl');
			$architectsArray[$i]['biography'] = @mysql_result($result,$i,'biography');
			$architectsArray[$i]['views'] = @mysql_result($result,$i,'views');
			$architectsArray[$i]['creationtimestamp'] = @mysql_result($result,$i,'creationtimestamp');
		}//for
	?>
       	<div id='architects_list_container'>
        <ul id='architects_list'>
    <?php
		for($i=0; $i<$num; $i++)
		{
	?>
            <li>
                <a href='architect.php?aid=<?=$architectsArray[$i]['aid']?>' tite='<?=$architectsArray[$i]['name']?>' class='architect_preview_link' /><img src='<?=$architectsArray[$i]['fileurl']?>' width='90' height='357' title='' /></a>
                <div class='architect_name'><span><?=$architectsArray[$i]['name']?></span></div>
            </li>
     <?php
	 	}//for
	 ?>       
        </ul><!--architects_list-->
        </div><!--architects_list_container-->
        <div id='scrollbar_leftarrow'><img src='layout/images/arr_left.png' /></div>
        <div id="scrollbar_horizontal">
            <div id="scrollbar_knob">
            </div>
        </div>
        <div id='scrollbar_rightarrow'><img src='layout/images/arr_right.png' /></div>
       <?php

	}//if
	else
	{
		echo 'No architects where found in this category.';
	}//else

}//get_architects_by_category($value)







function get_architects_by_project($projectID)
{
?>
<?php
}//get_architects_by_project($value)








function get_unique_architect($architectID)
{

	/*$architectID = 1;*/
	$projectsArray = array();
	$imagesArray = array();
	$architectsArray = array();

	
	require ( "config.inc.php");
	@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Cannot connect to specified host with this DB user');
	@mysql_select_db(DB_DATABASE) or die('Cannot select the database');

	$query = "SELECT *
			FROM architect a, image i
			WHERE a.aid = '".$architectID."' AND a.aid = i.aid AND i.imagetype='avatar';";
	$result = @mysql_query($query);
	$num = @mysql_num_rows($result);

	if($num != 0)
	{
		$i=0;
		$architectsArray[$i]['aid'] = @mysql_result($result,$i,'aid');
		$architectsArray[$i]['name'] = @mysql_result($result,$i,'name');
		$architectsArray[$i]['email'] = @mysql_result($result,$i,'email');
		$architectsArray[$i]['avatar'] = @mysql_result($result,$i,'avatar');
		$architectsArray[$i]['biography'] = @mysql_result($result,$i,'biography');
		$architectsArray[$i]['views'] = @mysql_result($result,$i,'views');
		$architectsArray[$i]['fileurl'] = @mysql_result($result,$i,'fileurl');
		$architectsArray[$i]['creationtimestamp'] = @mysql_result($result,$i,'creationtimestamp');
		
?>

			<div id='architect_details_container'>
            <div>
               <div id='architect_details'>
                	<div id='architect_avatar'>
                    	<img src='<?=$architectsArray[$i]['fileurl']?>' width='137' height='144' title='' alt='architect profile picture' />
                    </div><!--architect_avatar-->
                    
                    <div id='architect_info'>
                    	<div class='architect_info_padding_save'>
                        	<!--
                            <div id='architect_name'><?=$architectsArray[$i]['name']?></div>
                            <div id='architect_email'><?=$architectsArray[$i]['email']?></div>
                            -->
                            <div id='architect_bio'><?=$architectsArray[$i]['biography']?></div>

                        </div><!--architect_bio_padding_save-->
                    </div><!--architect_bio-->
                </div><!--architect_details-->
<?		
		
		
		//GET ALL THE PROJECTS OF THIS ARCHITECT
		$query02 = "SELECT *
				FROM architecttoproject ap, project p
				WHERE ap.aid = '".$architectID."' AND ap.pid= p.pid ORDER BY p.category ASC;";
		$result02 = @mysql_query($query02);
		$num02 = @mysql_num_rows($result02);
		
		if($num02 != 0)
		{
			for($j=0; $j<$num02; $j++)
			{
				$projectsArray[$j]['pid'] = @mysql_result($result02,$j,'pid');
				$projectsArray[$j]['title'] = @mysql_result($result02,$j,'title');
				$projectsArray[$j]['pdate'] = @mysql_result($result02,$j,'pdate');
				$projectsArray[$j]['scope'] = @mysql_result($result02,$j,'scope');
				$projectsArray[$j]['description'] = @mysql_result($result02,$j,'description');
				$projectsArray[$j]['location'] = @mysql_result($result02,$j,'location');
				$projectsArray[$j]['theme'] = @mysql_result($result02,$j,'theme');
				$projectsArray[$j]['category'] = @mysql_result($result02,$j,'category');
				$projectsArray[$j]['imageslist'] = @mysql_result($result02,$j,'imageslist');
				$projectsArray[$j]['views'] = @mysql_result($result02,$j,'views');
				$projectsArray[$j]['imagefileslocation'] = @mysql_result($result02,$j,'imagefileslocation');
				$projectsArray[$j]['creationtimestamp'] = @mysql_result($result02,$j,'creationtimestamp');
				//$projectsArray[$j]['fileurl'] = @mysql_result($result02,$j,'fileurl');
			}//for

			?>
            
            <?php
			
			$currentCategory = '';
			$nextCategory = '';
			for($j=0; $j<$num02; $j++)
			{
				if($j==0)
					{$currentCategory = $projectsArray[$j]['category']; $changeCategory = 1;}
				if($j!=0)
				{
					$nextCategory = $projectsArray[$j]['category'];
					if($currentCategory != $nextCategory)
						{$currentCategory = $nextCategory; $changeCategory = 1;}
					else
						{$currentCategory = $nextCategory; $changeCategory = 0;}
				}//if
				
				if($changeCategory == 1)
				{
					if($j!=0)
					{
					?>
                    	</ul>
					</div>
					<?
					}
				?>
                	
                	
                    <div class='architect_projects_list'>
                    <div class='project_category_title'>
						<?php
							switch($currentCategory)
							{
								case 'sportsgrounds':
									echo 'sports grounds';
									break;
								case 'businessbuildings':
									echo 'business buildings';
									break;
								case 'islandhomes':
									echo 'island homes';
									break;
								case 'livingareas':
									echo 'living areas';
									break;
								case 'studiospaces':
									echo 'studio spaces';
									break;
								default:
									echo $currentCategory;
									break;
							};
						?>
                    </div>
                    <ul class='architect_project_grid'>
                <?php
				}//
				
					//if($changeCategory == 1){echo "<li class='architect_project_grid_li_fp'>"; $currentCategoryProjectNumber = 1;}
					//else {echo "<li>";}	
					
				?>
                	<li>
                	<a href='project.php?pid=<?=$projectsArray[$j]['pid']?>' class='project_thumb_link'>
					<img src='<?=$projectsArray[$j]['imagefileslocation']?>thumb.jpg' width='142' height='80' title='' alt='project thubmnail image' /></a>
					<span class='project_title'><span><?=$projectsArray[$j]['title']?></span></span>
				</li>
            <?php
				if($j == $num02-1){echo "</ul></div>";}
			}//for
			?>
            	</div>
            </div><!--architect_details_container-->
            
            <div id='scrollbar_uparrow'><img src='layout/images/arr_up.png' /></div>
            <div id="scrollbar_vertical_p">
                <div id="scrollbar_knob_p">
                </div>
            </div>
            <div id='scrollbar_downarrow'><img src='layout/images/arr_down.png' /></div>
            <?php	
		}//if
		else
		{
		}//else
	
			
	}//if
	else
	{
	}//else
?>

                

                
<?php
}//get_unique_architect($value)


?>
