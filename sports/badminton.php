<?php
require ('core/init.php');

if (empty($_POST) === false) {
 
	$accessKey = trim($_POST['key']);
	
 
	if (empty($accessKey) === true ) {
		$errors[] = 'Sorry, but we need your access key for team.';
	} else {
 
		$login = $users->login($accessKey);
		if ($login === false) {
			$errors[] = 'Sorry, that accessKey is invalid';
		}else {
			// username/password is correct and the login method of the $users object returns the user's id, which is stored in $login
 
 			$_SESSION['id'] =  $login;// The user's id is now set into the user's session  in the form of $_SESSION['id']     
			echo $_SESSION['id'];
			if(isset($_SESSION['id']))
			{
			#Redirect the user team to home.php.
			header('Location: edit_home.php');
			}
			else
			{
				echo "cannot open without login";
			} 
			exit();
		}
	}
} 
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bad_css.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<title>Badminton</title>

<script>
var bckpic;
var copy_div;
var pics_div;
var m_div;

function disp_admin()
{
	if(document.getElementById("admin_disp").style.visibility!='visible')
	document.getElementById("admin_disp").style.visibility='visible';
	
	else
	document.getElementById("admin_disp").style.visibility='hidden';
}


</script>

<body style=" background:url(Res/1.jpg) repeat center center fixed; max-height:100%; max-width:100%;" onLoad=up_date()>
<script src="js/bootstrap.min.js"></script>

<div id="container1" style="background-image:url(Res/1.jpg)">
  
  <div id="toptab">
   <a href="index.php" style="text-decoration:none"><div class="tab_ele" style="background-color:#9F0; color:#FFF; opacity:0.9">INDEX</div></a>
   <div class="tab_ele" onClick=disp_admin()>ADMIN</div>
   <div class="tab_ele_no" style="width:84%">
   	<div id="admin_disp">

<?php if(empty($errors) === false){
 
			echo '<p>' . implode('</p><p>', $errors) . '</p>';			
 
		} 
		?>
  
   <form action="" method="post" target="">
  <input type="password" name="key"  id="acc_code"/>
  <input class="btn" name="submit" type="submit" value="LogIn" />
  </form>
   </div>
  </div>
</div>  
  <div id="pics">
   <p style="margin-left:3%"> DAYS OF GLORY</p>
   <?php
	$f= $_GET['id'];
	$images = $general->gallery($f);
	foreach($images as $reachs)
	{

	?>
<div class="pic_cir"; background-size:contain; background-image:url('');">
<img src="gallery/<?php echo $reachs['file_name'];?>" alt ="<?php echo $reachs['file_name'];?>" height="50" width="50"/>
</div>
<?php
}
?>
   <!--<div id="pic_cir" style="background-size:cover; background-image:url(Res/pntr.png)"></div>-->
  </div>
  
  <div class="up_comin" >
  <p style="margin-left:3%">LIVE</p>
  <p style="margin-left:73%; font-size:18px; margin-top:-15%">SET #1</p>
  <p style="margin-left:3%; font-size:24px;">NITK</p>
  <p style="margin-left:73%; font-size:24px; margin-top:-20%">19</p>
  <p style="margin-left:3%; font-size:24px; margin-top:0%">NITT</p>
  <p style="margin-left:73%; font-size:24px; margin-top:-20%">11</p>
  </div>
  
  <div id="news" >
  <p style="margin-left:3%">LATEST UPDATES</p>
   
    
<?php
$f= $_GET['id'];
$data = $general->posts($f);
foreach($data as $reach)
{
		   	
      echo "<tr>";
      
    echo "<div class='news_ele'>";
    echo "<p id='news_hdline' style='margin-top:2%'>".$reach['postTitle']."</p>";
    echo "<p id='news_date' style='margin-top:-5%; font-size:12px; float:right'>".$reach['postDate']."</p>";
    echo "</div>";
	echo "</tr>";
}

?>
    

  </div>
  
  <div id="matches">
  <p style="margin-left:3%">MATCHES</p>
    

<?php
$f= $_GET['id'];
$data = $general->posts($f);
foreach($data as $reach)
{
		   	
      echo "<tr>";
      
    echo "<div class='match_ele'>";
    echo "<p style='text-align:center; margin-top:1%'>".$reach['postDesc']."</p>";
    echo "</div>";
	echo "</tr>";
}

?>
   <!-- <p style="text-align:center; margin-top:1%; margin-left:-70%">NITT</p>
    <p style="text-align:center; margin-top:-15%; margin-left:30%">10 19  15</p>
    <p style="text-align:center; margin-top:-5%; margin-left:-70%">NITK</p>
    <p style="text-align:center; margin-top:-15%; margin-left:30%">21 19  21</p>
    <p style="text-align:center; margin-top:-6%; margin-left:-70%">WON</p>
    </div>-->
  </div>
  
  <div id="team-list">
  	<p style="margin-left:4%">TEAM</p>
    

<?php
	$f= $_GET['id'];
	$data = $general->member($f);
		foreach($data as $reach)
		{
			
       			echo "<div class='pla_det'>";  
         		echo "<p style='margin-top:1%; margin-left:5%;'>".$reach['membername']."</p>";
			echo"<p style='margin-top:-8%; margin-left:5%;'>".$reach['dept']."</p>";
			echo"<p style='margin-top:-8%; margin-left:5%;'>".$reach['pos']."</p>";
		


	?>
  <div class='pl_pic'>
	<img src="uploads/<?php echo $reach['file_name'];?>" alt ="<?php echo $reach['file_name'];?>" height="82" width="75"/>

    </div>
     
<?php
}?>
    
  

</div>
<script>
var flag;
var f;
var i=0;
var img;
document.getElementById("pic_cir").onclick=function()
{
	var ele=document.getElementById("pic_cir");
		var y=document.getElementById("pic_cir").style.maxHeight;
		var x=document.getElementById("pic_cir").style.width;
	
    f=0;
	var con_h=251;
	var con_w=243;
	flag=0;
	img=['url(Res/bbl_1.jpg)','url(Res/bdm_1.jpg)','url(Res/hk_1.jpg)','url(Res/hbl_1.jpg)','url(Res/vbl_1.jpg)','url(Res/fbl_1.jpg)'];
		var sI=setInterval(function(){
			ele.style.height=con_h/1.09;
			con_h=con_h/1.09;
			
			ele.style.width=con_w/1.09;
			con_w=con_w/1.09;
			
			f=f+1;
			if(f==15)
			{
				var v=0;
				if(i==5)
				i=0;
				ele.style.backgroundImage=img[i];
				i=i+1;
		var sI2=setInterval(function(){
			ele.style.height=con_h*1.09;
			con_h=con_h*1.09;
			
			ele.style.width=con_w*1.09;
			con_w=con_w*1.09;
			
			v=v+1;
			if(v==15)
			{
				clearInterval(sI2);
			}
			},30);

				clearInterval(sI);
			}
			},30);
			
	
			
		return true;
}

</script>
</body>

</html>
