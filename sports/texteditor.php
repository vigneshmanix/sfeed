<?php

//include database connection

		//require ('core/connect/connection.php');

		//session start

//session_start();

//check whether the session varible admin_Id is present or not

/*if(!isset($_SESSION['admin_Id']) || (trim($_SESSION['admin_Id']) == '')){

			header("location: formlogin.php");

			exit();

	}*/

	require ('core/init.php');

	?>

<html>

<head>

<script type="text/javascript" src="js/wysiwyg.js"></script>

</head>

<body onload="iFrameOn();">

<form action="post.php" name="myform" id="myform" method="post">

<p>Enter Title:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="postTitle" id="postTitle" size="80" maxlength="80"/></p>

<p>Enter Description:<input type="text" name="postDesc" id="postDesc" size="80" maxlength="80"/></p>

<p>Enter Body:<br>

<div id="wysiwyg_cp" style="padding:8px; width:700px;">

	<input type="button" onclick="iBlod()" value="B">

	<input type="button" onclick="iUnderline()" value="U">

	<input type="button" onclick="iItalic()" value="I">

	<input type="button" onclick="iFrontSize()" value="Text Size">

	<input type="button" onclick="iForeColor()" value="Text Color">

	<input type="button" onclick="iHorizontalRule()" value="HR">

	<input type="button" onclick="iUnorderedList()" value="UL">

	<input type="button" onclick="iOrderedList()" value="OL">

	<input type="button" onclick="iLink()" value="Link">

	<input type="button" onclick="iUnLink()" value="UnLink">

	<input type="button" onclick="iImage()" value="Image">

</div>

	

	

<!--Hide your normal textarea and place in the iframe replacment for it-->

<textarea style="display:none;" name="postCont" id="postCont" cols="100" rows="14"></textarea>

<iframe name="richTextField" id="richTextField" style="border:#000000 2px solid; width:700px; height:300px;"></iframe>

</p><br>

<input name="myBtn" type="button" value="Submit Data" onclick="javascript:submit_form();"/>

</form>

</body>

</html>
