<?php

class Users{
 
 private $db;

 public function __construct($database){
  
   $this->db=$database;

}


 //login to the teams using an accessKey
public function login($accessKey) {
 
	$query = $this->db->prepare("SELECT * FROM `Teams` WHERE `AccessKey` = '$accessKey'");
	$query->bindValue(1, $accessKey);
	
	try{
		
		$query->execute();
		$data = $query->fetch();
		$stored_accesskey = $data['AccessKey'];
		$id = $data['Id'];
		
		#hashing the supplied password and comparing it with the stored hashed password.
		if($accessKey === $stored_accesskey){
			return $id;
                       //return true;	
		}else{
			return false;	
		}
 
	}catch(PDOException $e){
		die($e->getMessage());
	}
}

// fetch team data of any sport..
public function teamdata($id) {
 
	$query = $this->db->prepare("SELECT * FROM `Teams` WHERE `Id`= '$id'");
	$query->bindValue(1, $id);
 
	try{
 
		$query->execute();
 
		return $query->fetch();
		//$data = $query->fetch();
		//$stored_accesskey = $data['AccessKey'];
		//$id = $data['Id'];
		//return $id;
 
	} catch(PDOException $e){
 
		die($e->getMessage());
	}
}


public function displaymembers($admin_id)
{
	$query = $this->db->prepare("SELECT * FROM member");
	$query->bindValue(1, $admin_id);	
	try{
		$query->execute();
        return $query->fetchAll();
		
    
		//return ($query->execute());
		 
    
    
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}

public function posts($id)
{
$query = $this->db->prepare("SELECT * FROM posts WHERE Id = '$id'");
	//$query->bindValue(1, $admin_id);
	//$q = "SELECT postTitle ,postDesc,postDate ,postID FROM posts where Id = $admin_id";
	
	try{

        $query->execute();
        return $query->fetchAll();
		 
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}
	
public function dashboard($id)
{
	$query = $this->db->prepare("SELECT * FROM comments WHERE Id = '$id'");
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

public function memberedit($admin_id,$ide1)
{
	$query = $this->db->prepare("SELECT * FROM member WHERE Id = '$admin_id' && id_member1 = '$ide1'");
try{
		$query->execute();
		$data=$query->fetch();
		return $data;
		}catch(PDOException $e){
			die($e->getMessage());
		}
}		

	

public function addpost($title,$content,$desc,$date,$admin_id)
{	
	$query = $this->db->prepare("INSERT INTO `posts`( `Id`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES ('$admin_id','$title','$desc','$content','$date')");
	try{
		
		$query->execute();
		//$data = $query->fetch();
		//$stored_accesskey = $data['AccessKey'];
		//$id = $data['Id'];
		return $query;
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}


public function addmess($id,$content)
{	
	$query = $this->db->prepare("INSERT INTO `comments`(`Id`, `messages`,`postdate`) VALUES ('$id','$content',now())");
	try{
		
		$query->execute();
		//$data = $query->fetch();
		//$stored_accesskey = $data['AccessKey'];
		//$id = $data['Id'];
		return $query;
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}


public function score($home_score,$home_name,$opp_score,$opp_name,$admin_id)
{	
	$query = $this->db->prepare("INSERT INTO `score`(`Id`, `homescore`,`homename`,`oppscore`,`oppname`,`scoredate`) VALUES ('$admin_id','$home_score','$home_name','$opp_score','$opp_name',now())");
	try{
		
		$query->execute();
		//$data = $query->fetch();
		//$stored_accesskey = $data['AccessKey'];
		//$id = $data['Id'];
		return $query;
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}


public function scoreshow($admin_id)
{
	$query = $this->db->prepare("SELECT * FROM score");
	$query->bindValue(1,$admin_id);
	try{
		
		$query->execute();
		$data = $query->fetchAll();
		//$stored_accesskey = $data['AccessKey'];
		//$id = $data['Id'];
		return $data;
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}

public function deletescore($id)
{
	$query = $this->db->prepare("DELETE FROM score WHERE score_id ='$id'");
	try{
		return $query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
	}
}
public function scoretext($score_id)
{
	$query = $this->db->prepare("SELECT * FROM `score` WHERE score_id = '$score_id'");
	try{
		$query->execute();
		return $query->fetch();
	}catch(PDOException $e){
		die($e->getMessage());
	}
}	

public function updatescore($hscore,$hname,$oscore,$oname,$id)
{
	$query = $this->db->prepare("UPDATE `score` SET `homescore`='$hscore',`homename`='$hname',`oppscore`='$oscore',`oppname`='$oname'  WHERE `score_id`='$id'");
	try{
		return $query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
		}
}

public function viewwebsite($admin_id)
{
	$query = $this->db->prepare("SELECT postTitle ,postDesc,postDate ,postCont FROM posts");
	$query->bindValue(1,$admin_id);
	try{
		
		$query->execute();
		$data = $query->fetchAll();
		//$stored_accesskey = $data['AccessKey'];
		//$id = $data['Id'];
		return $data;
		}catch(PDOException $e){
 
		die($e->getMessage());
	}
}




public function uploadPhoto($file_name,$id) {


			//$query = $this->db->prepare("INSERT INTO `member` (Id,file_name, post_date) VALUES ('$admin_id','$file_name', now()) WHERE id_member1 ='$con' ");
		$query=$this->db->prepare("UPDATE `member` SET `file_name`='$file_name' WHERE `id_member1`='$id'");
		        $query->bindValue(1,$admin_id);
        try{

                $query->execute();
                $data = $query->fetch();
                //$stored_accesskey = $data['AccessKey'];
                //$id = $data['Id'];
                return $query;
                }catch(PDOException $e){
 
                die($e->getMessage());
        }

    
    }

public function uploadgallery($file_name,$admin_id) {


			$query = $this->db->prepare("INSERT INTO `upload` (Id,file_name, post_date) VALUES ('$admin_id','$file_name', now())");
//$query =$this->db->prepare("UPDATE `upload` SET `Id`='$admin_id',`file_name`='$file_name',`post_date`=now() ");
		        $query->bindValue(1,$admin_id);
        try{

                $query->execute();
                $data = $query->fetch();
                
                return $data;
                }catch(PDOException $e){
 
                die($e->getMessage());
        }

    
    }


public function deletegallery($admin_id,$id) {


			$query = $this->db->prepare("DELETE FROM `upload` WHERE Id = '$admin_id' && pic_id = '$id'");
		        $query->bindValue(1,$admin_id);
        try{

                $query->execute();
                return $query;
                }catch(PDOException $e){
 
                die($e->getMessage());
        }

    
    }
public function showgallery($admin_id)

{

		$query = $this->db->prepare("SELECT * FROM `upload` where Id ='$admin_id'");
		try{
				
				
				// $data = $query->fetch();
				
				$query->execute();
		$data = $query->fetchAll();
		return $data;
			
			}catch(PDOException $e){
			
				die($e->getMessage());
			}
}


public function deletemember($id)
{
	$query = $this->db->prepare("DELETE FROM member WHERE id_member1 ='$id'");
	try{
		return $query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
	}
}	


public function deleteblog($admin_id,$id)
{
	$query = $this->db->prepare("DELETE FROM comments WHERE Id ='$admin_id' && comment_id ='$id'");
	try{
		return $query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
	}
}	
public function showPhoto($admin_id)

{

		$query = $this->db->prepare("SELECT * FROM `upload` where Id ='$admin_id'");
		try{
				
				
				// $data = $query->fetch();
				
				$query->execute();
		$data = $query->fetchAll();
		return $data;
			
			}catch(PDOException $e){
			
				die($e->getMessage());
			}
}

public function delete($po_id)
{
	$query = $this->db->prepare("DELETE FROM posts WHERE postID ='$po_id'");
	try{
		return $query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
	}
}

public function text($pos_id)
{
	$query = $this->db->prepare("SELECT * FROM `posts` WHERE postID = '$pos_id'");
	try{
		$query->execute();
		return $query->fetch();
	}catch(PDOException $e){
		die($e->getMessage());
	}
}

public function member($admin_id)
{
	$query = $this->db->prepare("SELECT * FROM `member` where Id ='$admin_id'");
	$query->bindValue(1,$admin_id);
	try{
		
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}catch(PDOException $e){
		die($e->getMessage());
	}
}


public function updatemembers($id,$membername,$dept,$age,$rollno,$postion)
{
	$query = $this->db->prepare("UPDATE `member` SET `membername`='$membername',`age`='$age',`rollno`='$rollno',`dept`='$dept',`pos`='$postion'  WHERE `id_member1`='$id'");
	try{
		return $query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
		}
}

public function textedit($data)
{
	$query = $this->db->prepare("INSERT INTO messages VALUES(NULL, $data)");
	try{
		return $query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
		}
}

public function addmember($admin_id,$name,$age,$rollno,$dept,$position)
{
	$query = $this->db->prepare("INSERT INTO `member`( `Id`, `membername`, `age`, `rollno`, `dept`, `pos`) VALUES ('$admin_id','$name','$age','$rollno','$dept','$position')");
try{
	return $query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
	}

}	


public function delmember($id)
{
	$query = $this->db->prepare("DELETE FROM `member` WHERE id_member1 ='$id'" );
try{
	return $query->execute();
	}catch(PDOException $e){
		die($e->getMessage());
	}

}	


public function updatepost($title,$content,$desc,$date,$pos_id){

	$query = $this->db->prepare("update posts set postTitle='$title', postCont='$content' ,postDesc='$desc',postDate='$date' WHERE postID ='$pos_id' ");
	try{
		return $query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
}
}


	
?>
