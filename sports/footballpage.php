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
	<link rel="stylesheet" type="text/css" href="fb_css.css">
	<link rel="stylesheet" href="jquery-ui-1.11.2/jquery-ui.min.css">
<script src="jquery-ui-1.11.2/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.2/jquery-ui.min.js"></script>
<script>
  $(function() {
    $( "#draggable1" ).draggable();
	 $( "#draggable2" ).draggable();
	 $( "#draggable3" ).draggable();
	 $( "#draggable4" ).draggable();
	 $( "#draggable5" ).draggable();
	 $( "#draggable6" ).draggable();
         $( "#draggable7" ).draggable();
         $( "#draggable8" ).draggable();
         $( "#draggable9" ).draggable();
         $( "#draggable10" ).draggable();

  });
  </script>
</head>
<title>Football</title>

<script>
var bckpic;
var copy_div;
var pics_div;
var m_div;

function up_date()
{
var currentdate = new Date(); 
var datetime = (currentdate.getMonth()+1)  + "m" +currentdate.getDate() + "d"
                + currentdate.getHours() + "h"  
                + currentdate.getMinutes() + "m" 
                + currentdate.getSeconds() + "s";
document.getElementById("up_date").innerHTML=datetime;
setTimeout(up_date,1000);
}

function disp_admin()
{
	if(document.getElementById("admin_disp").style.visibility!='visible')
	document.getElementById("admin_disp").style.visibility='visible';
	
	else
	document.getElementById("admin_disp").style.visibility='hidden';
}
</script>

<body style=" background:url(Res/football.jpg) repeat center center fixed; max-height:100%; max-width:100%;" onLoad=up_date()>
<div id="container">
<div id="container1" style="background-image:url(Res/football.jpg)">
  
  <div id="toptab">
   <a href="index.php" style="text-decoration:none"><div class="tab_ele" style="background-color:#9F0; color:#FFF; opacity:0.9">INDEX</div></a>
   <a href="team_C.php" style="text-decoration:none"><div class="tab_ele">TEAM</div></a>
  <a href="blog.php" style="text-decoration:none"><div class="tab_ele">BLOG</div></a>
   <div class="tab_ele" onClick=disp_admin()>ADMIN</div>
   <div class="tab_ele_no" style="width:69.75%">
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
   <!--<div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>
   <div class="pic_cir"; background-size:cover"></div>-->
<?php
$f= $_GET['id'];
	$images = $general->gallery($f);
	foreach($images as $reachs)
	{

	?>
<div class="pic_cir" style="background-size:cover; background-image:url(gallery/<?php echo $reachs['file_name'];?>);">
<!--<img src="gallery/<?php echo $reachs['file_name'];?>" alt ="<?php echo $reachs['file_name'];?>" height="50" width="50"/>-->
</div>
<?php
}
?>
  </div>
  
  <div class="up_comin" >
  <p style="margin-left:3%">UPCOMING</p>
  <p style="margin-left:3%; font-size:42px; margin-top:-5%" id="up_date"></p>
  <p style="margin-left:3%; font-size:24px; margin-top:-10%">ZIRCON A VS. ZIRCON C</p>
  <p style="margin-left:3%; font-size:24px; margin-top:-6%">VENUE : NSO GROUND</p>
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
    echo "<p style='text-align:center'>".$reach['postDesc']."</p>";
    echo "</div>";
	echo "</tr>";
}

?>
    <!--<div class="match_ele">
    <p style="text-align:center">HOME  4 - 1 NITK</p>
    <p style="font-size:12px; margin-left:1.5%">MUNIR (4'), MESSI (26',44',67'), RONALDO (90')</p>
    </div>-->
    
    
  </div>
  

</div>
<div id="container2" style="background-image:url(Res/football_formation.jpg)">
 <div id="r_cont">
  <div id="list">
  <div id="toptab2">
     <!--<div class="tab_ele">BACK</div>
     </div>-->
  
     <div id="banner" >TEAMSHEET</div> 
  </div> 
  
  <?php
	$f= $_GET['id'];
	$data = $general->member($f);
		foreach($data as $reach)
		{
			
       			echo "<div class='pla_det'>";  
         		echo "<p style='margin-top:1.5%; margin-left:5%;'>".$reach['membername']."</p>";
         		echo "<p style='margin-top:-8%; margin-left:45%; font-size:10px;'>".$reach['dept']."</p>";
         		echo "<p style='margin-top:-8%; margin-left:30%; font-size:10px;'>".$reach['age']."</p>";
         		echo "<p style='margin-top:-8%; margin-left:54% ; font-size:24px;'>".$reach['pos']."</p>";
			$id_mem= $reach['id_member1'];
		


	?>
  
    <div class='pl_pic'>
	<img src="uploads/<?php echo $reach['file_name'];?>" alt ="<?php echo $reach['file_name'];?>" height="55" width="70"/>

    </div>
     
 
 </div>
<?php
}
?>
</div>
 </div>
 
 <div id="pla_map">
  
	<?php
	$f = $_GET['id'];
	$data = $general->member($f);
	foreach($data as $reach)
	{
		if($reach['pos']=="CB")
		{
		echo '<div class="ui-widget-content pla" style="margin-left:70%" id="draggable1">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';
		}
		if($reach['pos']=="ST")
		{
		echo '<div class="ui-widget-content pla" style="margin-left:20%; margin-top:15%;"id="draggable2">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';
		}
		if($reach['pos']=="RB")
		{
		echo '<div class="ui-widget-content pla" style="margin-left:70%"id="draggable3">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';

		}
		if($reach['pos']=="LB")
		{

		echo '<div class="ui-widget-content pla" id="draggable4">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';
		}

		if($reach['pos']=="RCM")
		{
		echo '<div class="ui-widget-content pla" style="margin-left:45%; margin-top:-56%;"id="draggable5">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';
		
		}

		if($reach['pos']=="LCM")
		{

		echo '<div class="ui-widget-content pla" style="margin-left:45%; margin-top:10%;"id="draggable">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';
		}
		if($reach['pos']=="GK")
		{

		echo '<div class="ui-widget-content pla" style="margin-left:85%; margin-top:-35%;"id="draggable">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';
		}
		if($reach['pos']=="CM")
		{

		echo '<div class="ui-widget-content pla" style="margin-left:70%; margin-top:8%;"id="draggable">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';
		}
		if($reach['pos']=="LF")
		{

		echo '<div class="ui-widget-content pla" style="margin-left:70%; margin-top:8%;"id="draggable">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';
		}
		if($reach['pos']=="RF")
		{

		echo '<div class="ui-widget-content pla" style="margin-left:15%; margin-top:-55%;"id="draggable">';
		echo "<p class='big_txt'>".$reach['pos']."</p>";
		echo "<p class='sm_txt'>".$reach['membername']."</p>";
		echo '</div>';
		}
		
	}
?>
   <!--<p class="big_txt">RB</p>
   <p class="sm_txt">Karnik Hegde</p>
   </div>
   
   <div class="pla" style="margin-left:70%; margin-top:8%;">
   <p class="big_txt">CB</p>
   <p class="sm_txt">Mahonring Shaiza</p>
   </div>
   
   <div class="pla" style="margin-left:70%; margin-top:8%;">
   <p class="big_txt">CB</p>
   <p class="sm_txt">Carriena Lyngdoh</p>
   </div>
   
   <div class="pla" style="margin-left:70%; margin-top:8%;">
   <p class="big_txt">LB</p>
   <p class="sm_txt">Sherine Davis</p>
   </div>
   
   <div class="pla" style="margin-left:45%; margin-top:-56%;">
   <p class="big_txt">RCM</p>
   <p class="sm_txt">Shahabas Shamsad</p>
   </div>
   
   <div class="pla" style="margin-left:45%; margin-top:10%;">
   <p class="big_txt">CM</p>
   <p class="sm_txt">Vishnu Bala</p>
   </div>
   
   <div class="pla" style="margin-left:45%; margin-top:10%;">
   <p class="big_txt">LCM</p>
   <p class="sm_txt">Rafael Pepe</p>
   </div>
   
   <div class="pla" style="margin-left:15%; margin-top:-55%;">
   <p class="big_txt">RF</p>
   <p class="sm_txt">Bencho Laura</p>
   </div>
   
   <div class="pla" style="margin-left:20%; margin-top:15%;">
   <p class="big_txt">ST</p>
   <p class="sm_txt">Alester Fraser</p>
	
   </div>
   
   <div class="pla" style="margin-left:15%; margin-top:15%;">
   <p class="big_txt">LF</p>
   <p class="sm_txt">Marko Vietto</p>
   </div>
   
   <div class="pla" style="margin-left:85%; margin-top:-35%;">
   <p class="big_txt">GK</p>
   <p class="sm_txt">Angam Nameirakpam</p>
   </div>-->
   
   
   
   
   



 </div>
  
</div>
</div>
</body>

</html>
