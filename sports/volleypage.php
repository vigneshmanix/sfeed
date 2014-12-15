
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

	<link rel="stylesheet" type="text/css" href="css/vb_css.css">

	<title> Volleyball </title>

    

    <style>

	</style>

    

    <script>

	</script>

    

</head>



<body background="Res/vb.jpg" style="background-size:cover">

	

    <div id="container">

    

    	<div id="top_panel">

        

        	<div class="top_btn" id="live">LIVE</div>

            <div class="top_btn" id="lat_news">LATEST NEWS</div>

            <div class="top_btn" id="team">TEAM</div>

            <div class="top_btn" id="gallery">GALLERY</div>

            <div class="top_btn" id="admin-btn">ADMIN</div>

            <div class="top_btn" id="ac-code">

            <?php if(empty($errors) === false){
 
			echo '<p>' . implode('</p><p>', $errors) . '</p>';			
 
		} 
		?>
  
   <form action="" method="post" target="">
  <input type="password" name="key"  class="a_code"/>
  <input class="a-btn" name="submit" type="submit" value="LogIn" />
  </form>            


            </div>

            

            

        </div>

        

        <div id="content">

            

            <p style=" margin-left:58%; font-size:40px; background-color:#000; color:#FFF;">SETS</p>

                   

        	<p style="margin-left:10%; font-size:50px; background-color:#00F; color:#FFF;">NITT</p>

            <p style="margin-left:50%; font-size:50px; margin-top:-12%; color:#FFF;">15 - 14 - 21</p>

            <p style="margin-left:10%; font-size:50px; background-color:#900; color:#FFF;">NITC</p>

            <p style="margin-left:50%; font-size:50px; margin-top:-12%; color:#FFF;">11 - 13 - 4</p>

            <p style="margin-left:40%; font-size:30px; color:#FFF; background-color:#060">VENUE:</p>

            <p style="margin-left:40%; font-size:30px; color:#FFF; background-color:#060">COMPETITION:</p>

            <p style="margin-left:40%; font-size:30px; color:#FFF; background-color:#060">STATUS:</p>

        

        </div>

        

        <!--<div id="content">

            

            <div id="box">

            	<p style="margin-left:3%; margin-top:2%;">LATEST NEWS</p>

            

            	<div class="news_ele">

    				<p id="news_hdline" style="margin-top:2%">DIAMOND HOSTEL WINS THE AAVEG FOOTBALL CUP</p>

    				<p id="news_date" style=" margin-top:-5%; font-size:12px; float:right">26th Aug 2014</p>

    			</div>

            

            </div>

        

        </div>-->

        

        <!--<div id="content">

            

            <div id="team_box">

            	<p style="margin-left:3%; margin-top:2%;">TEAM SHEET</p>

            

            	<div class="pla_ele">

    				<div class="pla_pic" style="background-image:url(../Res/470294651-463453.jpg)"></div>

                    <div class="pla_data">

                    	<div class="name">JON STANFORD</div>

                        <div class="info">CSE IInd YR</div>

                    </div>

    			</div>

                

                <div class="pla_ele">

    				<div class="pla_pic"></div>

                    <div class="pla_data">

                    	<div class="name"></div>

                        <div class="info"></div>

                    </div>

    			</div>

                

                <div class="pla_ele">

    				<div class="pla_pic"></div>

                    <div class="pla_data">

                    	<div class="name"></div>

                        <div class="info"></div>

                    </div>

    			</div>

            

            </div>

        

        </div>-->

        

            

            <!--<div id="pic_wall">

            	<p style="margin-left:3%; margin-top:2%;">GALLERY</p>

                

                <div id="pic_cont">

                	<div id="pic_1"></div>

                    <div id="pic_2"></div>

                    <div id="pic_3"></div>

                    <div id="pic_4"></div>

                    <div id="pic_5"></div>

                    <div id="pic_6"></div>

                    <div id="pic_7"></div>

                    <input type="button" id="forw" class="gal_btn" value="Next"/>

                    <input type="button" id="back" class="gal_btn" value="Previous"/>

                </div>

            

          

            </div>-->

        

        </div>

        

        

    </div>

    

</body>

<script>

var ele_live=document.getElementById("live");

var ele_latnews=document.getElementById("lat_news");

var ele_team=document.getElementById("team");

var ele_gallery=document.getElementById("gallery");

var con=document.getElementById("content");



ele_live.onclick=function(){

	document.getElementById("content").innerHTML="<p style='margin-left:58%; font-size:40px; background-color:#000; color:#FFF;'>SETS</p>"+

        	"<p style='margin-left:10%; font-size:50px; background-color:#00F; color:#FFF;'>NITT</p>"

            +"<p style='margin-left:50%; font-size:50px; margin-top:-12%; color:#FFF;'>15 - 14 - 21</p>"

            +"<p style='margin-left:10%; font-size:50px; background-color:#900; color:#FFF;'>NITC</p>"

            +"<p style='margin-left:50%; font-size:50px; margin-top:-12%; color:#FFF;'>11 - 13 - 4</p>"

            +"<p style='margin-left:40%; font-size:30px; color:#FFF; background-color:#060'>VENUE:</p>"

            +"<p style='margin-left:40%; font-size:30px; color:#FFF; background-color:#060'>COMPETITION:</p>"

            +"<p style='margin-left:40%; font-size:30px; color:#FFF; background-color:#060'>STATUS:</p>";

	return true;

};



ele_latnews.onclick=function(){

	document.getElementById("content").innerHTML="<div id='box'><p style='margin-left:3%; margin-top:2%;'>LATEST NEWS</p>"+

            	"<div class='news_ele'>"+

    				"<p id='news_hdline' style='margin-top:2%'>DIAMOND HOSTEL WINS THE AAVEG FOOTBALL CUP</p>"

    				+"<p id='news_date' style=' margin-top:-5%; font-size:12px; float:right'>26th Aug 2014</p>"

    			+"</div>"

            +"</div>";

};



ele_team.onclick=function(){

	document.getElementById("content").innerHTML="<div id='team_box'>"

            	+"<p style='margin-left:3%; margin-top:2%;'>TEAM SHEET</p>"

            

            	+"<div class='pla_ele'>"

    				+"<div class='pla_pic' style='background-image:url(../Res/470294651-463453.jpg)'></div>"

                    +"<div class='pla_data'>"

                    	+"<div class='name'>JON STANFORD</div>"

                        +"<div class='info'>CSE IInd YR</div>"

                    +"</div>"

    			+"</div>"

                

                +"<div class='pla_ele'>"

    				+"<div class='pla_pic'></div>"

                    +"<div class='pla_data'>"

                    	+"<div class='name'></div>"

                        +"<div class='info'></div>"

                   +"</div>"

    			+"</div>"

                

                

            

            +"</div>";



};



var img_arr=['url(Res/v-1.jpg)','url(Res/v-2.jpg)','url(Res/v-3.jpg)','url(Res/v-4.jpg)','url(Res/v-5.jpg)','url(Res/v-6.jpg)','url(Res/v-7.jpg)','url(Res/v-8.jpg)','url(Res/v-9.jpg)','url(Res/v-10.jpg)','url(Res/v-11.jpg)','url(Res/v-12.jpg)','url(Res/v-13.jpg)','url(Res/v-14.jpg)'];

  



ele_gallery.onclick=function(){

	document.getElementById("content").innerHTML="<div id='pic_wall'>"+

            	"<p style='margin-left:3%; margin-top:2%;'>GALLERY</p>"

                

                +"<div id='pic_cont'>"

                	+"<div id='pic_1'></div>"

                    +"<div id='pic_2'></div>"

                    +"<div id='pic_3'></div>"

                    +"<div id='pic_4'></div>"

                    +"<div id='pic_5'></div>"

                    +"<div id='pic_6'></div>"

                    +"<div id='pic_7'></div>"

                    +"<input type='button' id='forw' class='gal_btn' value='Next'/>"

                    +"<input type='button' id='back' class='gal_btn' value='Previous'/>"

                +"</div>"

            

          

           +"</div>";

		   

		     // INITIAL CASE

    document.getElementById("pic_1").style.backgroundImage=img_arr[0];

	document.getElementById("pic_2").style.backgroundImage=img_arr[1];

	document.getElementById("pic_3").style.backgroundImage=img_arr[2];

	document.getElementById("pic_4").style.backgroundImage=img_arr[3];

	document.getElementById("pic_5").style.backgroundImage=img_arr[4];

	document.getElementById("pic_6").style.backgroundImage=img_arr[5];

	document.getElementById("pic_7").style.backgroundImage=img_arr[6];

	

	var ele_forw=document.getElementById("forw");

var ele_back=document.getElementById("back");



var i=0;

var len=img_arr.length;



ele_forw.onclick=function(){

	if((i+6)<len)

	{

		i=i+1;

	document.getElementById("pic_1").style.backgroundImage=img_arr[i];

	document.getElementById("pic_2").style.backgroundImage=img_arr[i+1];

	document.getElementById("pic_3").style.backgroundImage=img_arr[i+2];

	document.getElementById("pic_4").style.backgroundImage=img_arr[i+3];

	document.getElementById("pic_5").style.backgroundImage=img_arr[i+4];

	document.getElementById("pic_6").style.backgroundImage=img_arr[i+5];

	document.getElementById("pic_7").style.backgroundImage=img_arr[i+6];

	}

	return true;

};



ele_back.onclick=function(){

	

	if((i-1)>=0)

	{

		i=i-1;

	document.getElementById("pic_1").style.backgroundImage=img_arr[i];

	document.getElementById("pic_2").style.backgroundImage=img_arr[i+1];

	document.getElementById("pic_3").style.backgroundImage=img_arr[i+2];

	document.getElementById("pic_4").style.backgroundImage=img_arr[i+3];

	document.getElementById("pic_5").style.backgroundImage=img_arr[i+4];

	document.getElementById("pic_6").style.backgroundImage=img_arr[i+5];

	document.getElementById("pic_7").style.backgroundImage=img_arr[i+6];

	}

	return true;

};







};



var ele_admin_pan=document.getElementById("ac-code");

var ele_admin=document.getElementById("admin-btn");





ele_admin.onclick=function()

{

	if(ele_admin_pan.style.visibility!='visible')

	ele_admin_pan.style.visibility='visible';

	else

	ele_admin_pan.style.visibility='hidden'

};



</script>

</html>
