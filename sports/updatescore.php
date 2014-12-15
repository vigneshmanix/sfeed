<?php
require('core/init.php');
$admin_id = $_SESSION['id'];
$id = $_GET['id'];

$hscore = $_POST['homescore'];
$hname = stripslashes($_POST['homename']);
$oscore =$_POST['oppscore'];
$oname =stripslashes($_POST['oppname']);
$gametime = $_POST['gametime'];
$r = $users->updatescore($hscore,$hname,$oscore,$oname,$id,$gametime);


if (!$r) {

  die('Error: ' . mysql_error());

}

header('location:edit_home.php');

?>
