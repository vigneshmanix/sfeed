
<?php
require ('core/init.php');
$admin_id= $_SESSION['id'];


if(isset($_POST['buttonsave'])===true)
{
	
	$membername=mysql_escape_String($_POST['member_name']);
	$dept=mysql_escape_String($_POST['department']);
	$age=mysql_escape_String($_POST['age']);
	$rollno=mysql_escape_String($_POST['rollno']);
	$postion=mysql_escape_String($_POST['position']);
	$data = $users->addmember($admin_id,$membername,$dept,$age,$rollno,$postion);
	
}

?>




<script type="text/javascript" src="http://ajax.googleapis.com/
	ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!--
<script type="text/javascript">
/*
$(document).ready(function(){
$("#btn").click(function()
{ alert('jk'); */
function x(){
 alert('s');
var name = $("#member_name").val();
var dept =$("#department").val();
var ageof = $("#age").val(); 
var rollnum =$("#rollno").val();
var pos =$("#position").val();

//var datastring ='member_name='+name+'department='+dept+'age='+age+'rollno='+rollno+'position='+position;
if(name.length>0&&dept.length > 0&& ageof.length > 0&& rollnum.length > 0&& pos.length >0)
{
$.ajax({
url : "index2.php
type : "POST",
async : false, 
data : {
 		'buttonsave' :1,
		'member_name' :name,
		'deptment' :dept,
		'age' : ageof,
		'rollno' : rollnum,
		'position' : pos

},
success : function(result){
alert("member is added");
header('Location: edit_home.php');
			}
		});
}
else
{
	alert("Enter the fields");
	//$("#member_name").focus();
}
	});
});
</script>
-->
<body>
<table class="mytable">

<tr>
	<td>MemberName</td>
	<td>:</td>
	<td><input type="text" id="member_name" name="member_name"  ></td>
	</tr>
		<td>Department</td>
		<td>:</td>
		<td><input type="text" id="department" name="department" ></td>
		</tr>
		<tr>
		<td>Age</td>
		<td>:</td>
		<td><input type="number" id="age" name="age"></td>
		</tr>
		<tr>
		<td>Rollno</td>
		<td>:</td>
		<td><input type="text" id="rollno" name="rollno" ></td>
		</tr>
		<tr>
		<td>Position</td>
		<td>:</td>
		<td><input type="text" id="position" name="position">
		</tr>
	<tr>
          <td><input type ="button" id="btn" value="insert" ></td>
	</tr>
</table>
</body>
<script type="text/javascript">

$(document).ready(function(){
$("#btn").click(function()
{ 
var name = $("#member_name").val();
var dept =$("#department").val();
var ageof = $("#age").val(); 
var rollnum =$("#rollno").val();
var pos =$("#position").val();

//var datastring ='member_name='+name+'department='+dept+'age='+age+'rollno='+rollno+'position='+position;
if(name.length>0&&dept.length > 0&& ageof.length > 0&& rollnum.length > 0&& pos.length >0)
{
$.ajax({
url : "index2.php
type : "POST",
async : false, 
data : {
 		'buttonsave' :1,
		'member_name' :name,
		'deptment' :dept,
		'age' : ageof,
		'rollno' : rollnum,
		'position' : pos

},
success : function(result){
alert("member is added");
header('Location: edit_home.php');
			}
		});
}
else
{
	alert("Enter the fields");
	//$("#member_name").focus();
}
	});
});
</script>
	 


<?php


if(isset($_POST["post_file"])){

	if($_POST["post_file"] != ""){

		$valid_files = array("png", "jpg", "gif"); // include the valid image file extensions

		$file_name	 = $_FILES["your_file"]["name"]; // get the image name you posting

		$file_name_exp = explode(".", $file_name); // explode the uploaded image to get extension

		$file_extension = $file_name_exp[1]; // get extension

		if(in_array($file_extension, $valid_files)){ // check that image is valid or not

			$change_file_name = strtolower(str_replace(" ", "_", $file_name_exp[0])); // change the image name

			$file_name		  = $change_file_name.".".$file_extension; // join the new image name and its extension

			$folder_name	  = "uploads/"; // get the directory name which you want to upload the image make sure this directory has 0755 permision

			$target			  = $folder_name.$file_name; 

			$temp_name		  = $_FILES["your_file"]["tmp_name"]; // get the temp name of the image

			$move			  = move_uploaded_file($temp_name, $target); // move_uploaded_file function will let us to copy the file from your local drive to your root directory

			if($move){

				 $r = $users->uploadPhoto($file_name,$admin_id);
				//mysql_query("INSERT INTO `upload` (file_name, post_date) VALUES ('$file_name', now())");
				echo "<script type=\"text/javascript\">window.location = 'upload1.php?result=success';</script>";	

			}else{

				echo "<script type=\"text/javascript\">window.location = 'index2.php?result=error';</script>";	

			}

		}else{

			echo "<script type=\"text/javascript\">window.location = 'index2.php?result=error';</script>";	

		}

	}else{

		echo "<script type=\"text/javascript\">window.location = 'index2.php?result=error';</script>";	

	}

}

?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Upload image in php by Asif18</title>

<style type="text/css">

body{

	font-family:Arial;

	color:#333333;

	font-size:14px;

}

.mytable{

	margin:0 auto;

	padding:10px;

	border:#007EB2 dashed 2px;

	font-weight:bold;

}

.mytable tr{

	line-height:70px;

}

.button{

	background:#007EB2;

	border:none;

	padding:8px 10px;

	text-align:center;

	color:#FFF;

	cursor:pointer;

	border=radius:2px;

}

h2, h3{

	margin:0;

	padding:0;

	text-align:center;

}

.error{

	color:#F33C21;

}

.success{

	color:#008040;

}

</style>

</head>



<body>

<h2>Image Upload in php</h2>

<?php if(isset($_GET["result"]) && $_GET["result"] == "error"){ echo "<h3 class=\"error\">Oops! something went wrong. Please upload again</h3>"; } ?>

<?php if(isset($_GET["result"]) && $_GET["result"] == "success"){ echo "<h3 class=\"success\"> Image uploaded successfully</h3>"; header('Location: edit_home.php');} ?>

<br/>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

<table class="mytable">

<tr>

	<td><label>Select an image : </label></td>

	<td><input type="file" name="your_file" /></td>

</tr>

<tr>

	<td colspan="2"  align="center"><input type="submit" name="post_file" class="button" value="Upload This Image" /></td>

</tr>

<tr>

	<td colspan="2"  align="center"><input type="button" onClick="window.location='?view_images';" name="view_images" class="button" value="View Images" /></td>

</tr>

<tr>
<td colspan="2"  align="center"><a href ="edit_home.php"><input type="button" name="Edit_page" class="button" value="Edit_page" /></a></td>
</tr>
</table>

</form>

<?php

if(isset($_GET["view_images"])){

?>
<br/>
<table class="mytable">
<tr>
	
	<td><label>Imagename</label></td>
	<td><label>Image</label></td>
	</tr>
<?php
	$images = $users->showPhoto($admin_id);
	$i =0;
	

	foreach($images as $reachs)
	{
		$i = $i+1;
		$imagename = $reachs['file_name'];
	?>

<td><label><?php echo $imagename ;?></label></td>
<td></label><img src="uploads/<?php echo $reachs['file_name'];?>" alt ="<?php echo $reachs['file_name']; ?> title="<?php echo $reachs['file_name'];?>" height="50" width="50"/></label></td>
<?php
}
?>
</table>

<?php
}

?>





</body>

</html>
