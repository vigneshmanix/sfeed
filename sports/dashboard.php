
		<div id="bar">

		<button><a href="dashboard.php">DashBoard</a></button>

		<button><a href="register.php">users</a></button>

		<button><a href="viewwebsite.php">View website</a></button>

		<button><a href="logout.php">Logout</a></button>
		<button><a href="texteditor.php">Addpost</a></button>

		</div>


<?php 



		require ('core/init.php');

		$admin_id= $_SESSION['id'];

		$data = $users->posts($admin_id);

                echo "<table border='1'>
		<tr>
		<th>postTitle</th>
		<th>postDesc</th>
		<th>postDate</th>
		<th>Action</th>
		</tr>";
		

                //echo mysql_num_rows($data);

               
		foreach($data as $reach)
		{
		   	
		      echo "<tr>";
	              echo "<td>".$reach['postTitle']."</td>";
		      echo "<td>".$reach['postDesc']."</td>";
		      echo "<td>".$reach['postDate']."</td>";
		      echo "<td>";
			echo '<div >';
			echo"<a href='textedit.php?id=".$reach['postID']."'><input type='button'  name='edit' value='Edit'></a>";
			echo "<a href='delete.php?id=".$reach['postID']."'><input type='button'  name='delete' value='Delete'></a>";
			
			echo '</div>';
			echo "</td>";


		      /*echo "</tr>";
			echo "<tr>";
			echo "<td>".$reach['message']."</td>";
			echo "</tr>";*/

			
		}
                   
		 echo "</table>";
		
		//$r=mysql_fetch_assoc($row)
		
		//$r = $users->fetchAll($data);
		//echo $r."hi";
		//$data = $query->fetch();
		//$reaches = $users->fetchAll($data);
		
		

?>









<!doctype html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="css/style.css" >

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css"/>

	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>

	<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

	<script src="js/adminhome.js" type="text/javascript"></script>

	<title>DashBoard</title>

</head>

<body>

		

	

		

	

</body>

</html>
