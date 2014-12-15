<?php
require('core/init.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SPORTS_BLOG</title>
<head>
<link href="jquery-ui-1.11.2/jquery-ui.css" rel="stylesheet">
	<style>
	
	.demoHeaders {
		margin-top: 2em;
	}
body {
    background-color: #b0c4de;
}

	
	</style>
</head>
<body>
<div id="tabs">
<ul>
		<li><a href="#tabs-1">Blog</a></li>
		
		
	</ul>
<?php


	$content = $general->dashboard();
	foreach($content as $reach)
		{     	
		 $team_id = $reach['Id'];
		 $name = $general->team($team_id);
		//if($team_id=='2')
		//{
		
		echo '<div id="tabs-1">';
		echo '<h3>'.$name['Team'].'</h3>';
		echo '<div style=" border-width:5px; border-style:outset;">'.$reach['messages'].'</div>';	
		//echo'</div>';
		//}
		/*else if($team_id=='1')
		{
		echo'</div>';
		echo '<div id="tabs-2">';
		echo '<h3>'.$name['Team'].'</h3>';
		echo '<div>'.$reach['messages'].'</div>';
		
		}	
		else
		if($team_id=='3')
		{
		echo'</div>';
		echo '<div id="tabs-3">';
		echo '<h3>'.$name['Team'].'</h3>';
		echo '<div>'.$reach['messages'].'</div>';
		

		}*/
		}

?>
</div>
</body>
<script src="jquery-ui-1.11.2/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.2/jquery-ui.js"></script>
<script>
$( "#tabs" ).tabs();
//$( "#accordion1" ).accordion();
//$( "#accordion2" ).accordion();
</script>
</html>

