<?php 

try {
	$db = new PDO("mysql:host=localhost;dbname=booksearch_sports", "booksearch", "xRvvVfRuhERXDvW8");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    die($e->getMessage());
}



?>
