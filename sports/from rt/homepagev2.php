
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
			header('Location: home.php');
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transiti onal//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>The BasketBall Team of NITT</title>

<link href="stylev2.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="functions.js"></script>
<link rel="stylesheet" href="FlipClock-master/compiled/flipclock.css">
<script src="jquery.min.js"></script>
<script src="FlipClock-master/compiled/flipclock.js"></script>

</head>
<body>

<style>
    body { 
          background: url(/images/bgbb.jpg) repeat center center fixed; 
         -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          max-height: 100%;
          max-width: 100%;
}
</style>


<div class="cf">
	<ul>
<li><a href="#"><h2>HOME</h2></a>
</li>

<li><a href="#"><h2>TEAM</h2></a>
</li>
<li><a href="#"><h2>MATCHES</h2></a>
</li>

<li><a href="#"><h2>GALLERY</h2></a>
		
</li>
</ul>
</div>

<div id="container">
    <div class="subscribe">
      <div id="to"><h2>ADMIN</h2></div>
	<?php if(empty($errors) === false){
 
			echo '<p>' . implode('</p><p>', $errors) . '</p>';			
 
		} 
		?>
      <form method="POST" action="">
     
        <input type="text" class="email_field" name="key" size="18" placeholder="Enter access Key" />
        <input type="hidden" value="sicanstudios" name="uri"/>
        <input type="hidden" name="loc" value="en_US"/>
        <input class="email_btn" name="submit" type="submit" />
     
      </form>
    </div>
  </div>

<p><h1>The BasketBall Team</h1></p>


<div class="clock"><h2>HOME</h2></div>
<div class="clock"><h2>AWAY</h2></div>

<style type="text/css">
    .clock{
        margin:2em;
        position: relative;
        float:right;
        left:950px;
        top: 50px;
    }
    .clock h2{
        color: black;
        font-weight: bold;
        float: left;
        position: relative;
        left: -50px;
        top: 30px;
        font-size: 200%;
    }
</style>

        <script type="text/javascript">
            var clock;

            $(document).ready(function() {
                clock = new FlipClock($('.clock'), {
                    clockFace: 'Counter',
                    autoStart: true
                });
            });
        </script>

<ul class="slides">
    <input type="radio" name="radio-btn" id="img-1" checked />
    <li class="slide-container">
    <div class="slide">
      <img src="http://farm9.staticflickr.com/8072/8346734966_f9cd7d0941_z.jpg" />
        </div>
    <div class="nav">
      <label for="img-6" class="prev">&#x2039;</label>
      <label for="img-2" class="next">&#x203a;</label>
    </div>
    </li>

    <input type="radio" name="radio-btn" id="img-2" />
    <li class="slide-container">
        <div class="slide">
          <img src="http://farm9.staticflickr.com/8504/8365873811_d32571df3d_z.jpg" />
        </div>
    <div class="nav">
      <label for="img-1" class="prev">&#x2039;</label>
      <label for="img-3" class="next">&#x203a;</label>
    </div>
    </li>

    <input type="radio" name="radio-btn" id="img-3" />
    <li class="slide-container">
        <div class="slide">
          <img src="http://farm9.staticflickr.com/8068/8250438572_d1a5917072_z.jpg" />
        </div>
    <div class="nav">
      <label for="img-2" class="prev">&#x2039;</label>
      <label for="img-4" class="next">&#x203a;</label>
    </div>
    </li>

    <input type="radio" name="radio-btn" id="img-4" />
    <li class="slide-container">
        <div class="slide">
          <img src="http://farm9.staticflickr.com/8061/8237246833_54d8fa37f0_z.jpg" />
        </div>
    <div class="nav">
      <label for="img-3" class="prev">&#x2039;</label>
      <label for="img-5" class="next">&#x203a;</label>
    </div>
    </li>

    <input type="radio" name="radio-btn" id="img-5" />
    <li class="slide-container">
        <div class="slide">
          <img src="http://farm9.staticflickr.com/8055/8098750623_66292a35c0_z.jpg" />
        </div>
    <div class="nav">
      <label for="img-4" class="prev">&#x2039;</label>
      <label for="img-6" class="next">&#x203a;</label>
    </div>
    </li>

    <input type="radio" name="radio-btn" id="img-6" />
    <li class="slide-container">
        <div class="slide">
          <img src="http://farm9.staticflickr.com/8195/8098750703_797e102da2_z.jpg" />
        </div>
    <div class="nav">
      <label for="img-5" class="prev">&#x2039;</label>
      <label for="img-1" class="next">&#x203a;</label>
    </div>
    </li>

    <li class="nav-dots">
      <label for="img-1" class="nav-dot" id="img-dot-1"></label>
      <label for="img-2" class="nav-dot" id="img-dot-2"></label>
      <label for="img-3" class="nav-dot" id="img-dot-3"></label>
      <label for="img-4" class="nav-dot" id="img-dot-4"></label>
      <label for="img-5" class="nav-dot" id="img-dot-5"></label>
      <label for="img-6" class="nav-dot" id="img-dot-6"></label>
    </li>
</ul>

<br><br><br><br><br>

<div>
    <ul style="list-style-type: none;" class="members">
        <li>
                <img src="http://img.bleacherreport.net/img/images/photos/002/647/827/hi-res-182603684-rajon-rondo-of-the-boston-celtics-poses-for-a-picture_crop_exact.jpg?w=1500&h=1500&q=85" width="175" height="175">
                <h2 style="float:right;">asdfghjklqwtyuiopzxcvbnm</h2>
        </li>
         <li>
                <img src="http://img.bleacherreport.net/img/images/photos/002/647/827/hi-res-182603684-rajon-rondo-of-the-boston-celtics-poses-for-a-picture_crop_exact.jpg?w=1500&h=1500&q=85" width="175" height="175">
                <h2 style="float:right;">asdfghjklqwtyuiopzxcvbnm</h2>
        </li>
         <li>
                <img src="http://img.bleacherreport.net/img/images/photos/002/647/827/hi-res-182603684-rajon-rondo-of-the-boston-celtics-poses-for-a-picture_crop_exact.jpg?w=1500&h=1500&q=85"width="175" height="175">
                <h2 style="float:right;">asdfghjklqwtyuiopzxcvbnm</h2>
        </li>
         <li>
                <img src="http://img.bleacherreport.net/img/images/photos/002/647/827/hi-res-182603684-rajon-rondo-of-the-boston-celtics-poses-for-a-picture_crop_exact.jpg?w=1500&h=1500&q=85" width="175" height="175">
                <h2 style="float:right;">asdfghjklqwtyuiopzxcvbnm</h2>
        </li>
    </ul>
</div>

</body>
</html>
