<?php
 //for other general functionalities...
class General{
private $db;

 public function __construct($database){
  
   $this->db=$database;


}

public function posts($f)
{
$query = $this->db->prepare("SELECT * FROM posts WHERE Id = '$f'");
	//$query->bindValue(1, $admin_id);
	//$q = "SELECT postTitle ,postDesc,postDate ,postID FROM posts where Id = $admin_id";
	
	try{

        $query->execute();
        return $query->fetchAll();
		 
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}
public function postnews($f)
{
$query = $this->db->prepare("SELECT * FROM posts WHERE Id = '$f'");
        //$query->bindValue(1, $admin_id);
        //$q = "SELECT postTitle ,postDesc,postDate ,postID FROM posts where Id = $admin_id";

        try{

        $query->execute();
        return $query->fetch();

                }catch(PDOException $e){

                die($e->getMessage());
        }
}

public function score($f)
{
	$query = $this->db->prepare("SELECT * FROM `score` where Id ='$f'");
	
	try{
		
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}catch(PDOException $e){
		die($e->getMessage());
	}
}
public function member($f)
{
	$query = $this->db->prepare("SELECT * FROM `member` where Id ='$f'");
	
	try{
		
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}catch(PDOException $e){
		die($e->getMessage());
	}
}


public function gallery($f)

{

		$query = $this->db->prepare("SELECT * FROM `upload` where Id ='$f'");
		try{
				
				
				// $data = $query->fetch();
				
		$query->execute();
		$data = $query->fetchAll();
		return $data;
			
			}catch(PDOException $e){
			
				die($e->getMessage());
			}
}

public function generalgallery()

{

                $query = $this->db->prepare("SELECT * FROM `upload`");
                try{


                                // $data = $query->fetch();

                $query->execute();
                $data = $query->fetchAll();
                return $data;

                        }catch(PDOException $e){

                                die($e->getMessage());
                        }
}

public function dashboard($id)
{
	$query = $this->db->prepare("SELECT * FROM comments WHERE Id='$id'");
	//$query->bindValue(1, $admin_id);
	//$q = "SELECT postTitle ,postDesc,postDate ,postID FROM posts where Id = $admin_id";
	
	try{

        $query->execute();
        return $query->fetchAll();
		
    
		//return ($query->execute());
		 
    
    
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}
public function team($team_id)
{
	$query =$this->db->prepare("SELECT Team FROM Teams WHERE Id='$team_id' ");
	try{
	$query->execute();
	return $query->fetch();

	}catch(PDOException $e){
		die($e->getMessage());
	}
}
}
?>
