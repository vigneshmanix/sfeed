<!doctype html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<link rel="stylesheet" type="text/css" href="css/stylemember.css" >

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css"/>

	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>

	<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

	

	<script type="text/javascript" src="http://ajax.googleapis.com/
	ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type ="text/javascript">
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
$("#name_"+ID).hide();
$("#dept_"+ID).hide();
$("#age_"+ID).hide();
$("#rollno_"+ID).hide();
$("#position_"+ID).hide();
$("#first_input_"+ID).show();
$("#second_input_"+ID).show();
$("#third_input_"+ID).show();
$("#frouth_input_"+ID).show();
$("#last_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();
var second=$("#second_input_"+ID).val();
var third=$("#third_input_"+ID).val();
var foruth=$("#foruth_input_"+ID).val();
var last=$("#last_input_"+ID).val();
var dataString = 'id='+ ID +'&name='+first+'&dept='+second+'&age='+third+'&rollno='+foruth+'&pos='+last;
//$("#first_"+ID).html('<img src="load.jpg">' ); 

if(first.length>0&& last.length>0)
{

$.ajax({
type: "POST",
url: "member_edit_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
$("#name_"+ID).html(first);
$("#dept_"+ID).html(second);
$("#age_"+ID).html(third);
$("#rollno_"+ID).html(frouth);
$("#position_"+ID).html(last);
}
});
}
else
{
alert('Enter something.');
}

});

// Edit input box click action
$(".editbox").mouseup(function()
{
return false
});



// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>

	<title>Member</title>

</head>
</html>	
<table>
<?php
require ('core/init.php');



		//$user 	= $users->teamdata($_SESSION['id']);

		$admin_id= $_SESSION['id'];

		$data = $users->member($admin_id);
               
		foreach($data as $reach)
		{
		   	
			$name=$reach['membername'] ;
			$dept = $reach['dept'];
			$id =$reach['id_member1'];
			$age =$reach['age'];
			$rollno =$reach['rollno'];
			$pos =$reach['pos'];
			
			
                    
		
?>
		<tr id="<?php echo $id; ?>" class="edit_tr">

<td class="edit_td">
<span id="name_<?php echo $id; ?>" class="text"><?php echo $name; ?></span>
<input type="text" value="<?php echo $name; ?>" class="editbox" id="first_input_<?php echo $id; ?>" />
 </td>

<td class="edit_td">
<span id="dept_<?php echo $id; ?>" class="text"><?php echo $dept; ?></span>
<input type="text" value="<?php echo $dept; ?>" class="editbox" id="second_input_<?php echo $id; ?>"/>
</td>

<td class="edit_td">
<span id="age_<?php echo $id; ?>" class="text"><?php echo $age; ?></span>
<input type="text" value="<?php echo $age; ?>" class="editbox" id="third_input_<?php echo $id; ?>"/>
</td>

<td class="edit_td">
<span id="rollno_<?php echo $id; ?>" class="text"><?php echo $rollno; ?></span>
<input type="text" value="<?php echo $rollno; ?>" class="editbox" id="frouth_input_<?php echo $id; ?>"/>
</td>

<td class="edit_td">
<span id="position_<?php echo $id; ?>" class="text"><?php echo $pos; ?></span>
<input type="text" value="<?php echo $pos; ?>" class="editbox" id="last_input_<?php echo $id; ?>"/>
</td>
<td colspan="2" align="center"><input type ="button" value="edit" name="edit" ></td>
<td><a href='#' class='delete' id='$id'> Delete</a></td>
	</tr>
<?php
}
?>
<tr>
<td colspan="2" align="center"><div id="d2"></div></td></tr>
</table>
	
<script type="text/javascript">
function ds(id)
{

	
var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","del.php?delete="+document.getElementById("delete").value,false);
xmlhttp.send(null);

document.getElementById("d2").innerHTML=xmlhttp.responseText;
}

</script>
<body>
<form name="form1" action="" method="POST">
<table >
	<tr>
		<td>MemberName</td>
		<td>:</td>
		<td><input type="text" id="member_name" name="member_name">
	
	
		<td>Age</td>
		<td>:</td>
		<td><input type="number" id="age" name="age">
	
	
	
		<td>Rollno</td>
		<td>:</td>
		<td><input type="text" id="rollno" name="rollno">
		
	
		<td>Department</td>
		<td>:</td>
		<td><input type="text" id="dept" name="dept">
	
	
		<td>Position</td>
		<td>:</td>
		<td><input type="text" id="position" name="position">
	
	      
	
	</tr>
<tr>
<td colspan="2" align="center"><div id="d1"></div></td></tr>
</table>
<input type="button" id="insert" value="insert" onClick="as();">
</form>
</body>
<script type="text/javascript">
function as()
{
	
var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","ins.php?member_name="+document.getElementById("member_name").value+"&age="+document.getElementById("age").value+"&rollno="+document.getElementById("rollno").value+"&dept="+document.getElementById("dept").value+"&position="+document.getElementById("position").value,false);
xmlhttp.send(null);

document.getElementById("d1").innerHTML=xmlhttp.responseText;
}
</script>

