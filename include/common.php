<?php 
class Common{
	
	public function __construct(){
	require_once 'configuration.php';
		$cnt = mysqli_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');
		if($cnt){
				$db_found=mysqli_select_db($cnt,$db_database);
		}
		//return $cnt;
	}
	
	function connection(){
		$db_host		= 'localhost';
		$db_user		= 'root';
		$db_pass		= '';
		$db_database	= 'janabhumi'; 
		$cnt = mysqli_connect($db_host,$db_user,$db_pass,$db_database);
		return $cnt;
	
	}
	
	public function authenticate($username,$pass,$table){
		$cnt=$this->connection();
		$loginName=$username;
		$password=trim(md5($pass));
		$login_sql="SELECT * FROM $table WHERE username='$loginName' AND password ='$password'";
		//print_r($login_sql);exit; 
		$query=mysqli_query($cnt,$login_sql);
		$row=mysqli_num_rows($query);
			return $row;
	}
	
	public function ExecuteQuery($sql){
	//To execute all type of queries
		$cnt=$this->connection();
		$this->sql=$sql;
		$this->result  = mysqli_query($cnt,$this->sql) or die (mysqli_error($cnt)."<br>Please check the following query-<br>".$this->sql);
		return $this->result;
	 }
	 
	public function InsertQuery($tableName,$dataArray){
	//Function to insert all the data in to the table 
		$cnt=$this->connection();
		$this->tableName=$tableName;
		$this->dataArray=$dataArray;
		if(is_array($this->dataArray)){
			$this->query 	    = "INSERT INTO $this->tableName SET ";
			$arrayCount			= sizeof($this->dataArray);
			$count				= 1;
			while(list($key,$val)  = each($this->dataArray)){
				if ($count==$arrayCount)
				$this->query  .=" $key='".$this->cleanUserInput($val)."'";
				else
				$this->query  .="$key='".$this->cleanUserInput($val)."', ";
				$count ++;	
			}//End Of while loop	\
			$this->result = $this->ExecuteQuery($this->query);//Calling the execute query
			$id=mysqli_insert_id($cnt);
			return;
		}//end Of if loop
	}//End of insertquery Function..
	
	function UpdateQuery($tableName,$dataArray,$condition=""){
	//Function to Update a table	
		$this->tableName=$tableName;
		$this->dataArray=$dataArray;
		if(is_array($this->dataArray)){
			$this->query	    = "UPDATE  $this->tableName SET ";
			$arrayCount			= sizeof($this->dataArray);
			$count				= 1;
			while(list($key,$val)  = each($this->dataArray)){				
				if ($count==$arrayCount)
					$this->query .=" $key='".$this->cleanUserInput($val)."'";
				else
					$this->query .="$key='".$this->cleanUserInput($val)."', ";
					$count ++;	
			}//End Of while loop	
			if ($condition!=""){
				$this->query   .= " WHERE  $condition ";
			}//end of if 
			//print($this->query);exit;
			$this->result = $this->ExecuteQuery($this->query);//Calling the execute query 
			return $this->result;
		}//end of if
	}//End of updatequery Function...
	
	function deleteQuery($tableName,$condition=""){	 
	//Delete function
	 	$this->tableName=$tableName;
		$this->query = "DELETE FROM $this->tableName ";
		if($condition!=""){

			$this->query  .= " WHERE $condition";
		}
		$this->result = $this->ExecuteQuery($this->query);//Calling the execute query 	
		return $this->result;
	}//End Of deletequery	
	
	function upload_file($path,$name){
	
			if ($_FILES["file"]["error"] > 0){
				echo "Return Code: ".$_FILES["file"]["error"]."<br />";
			}
			else{
				 if (file_exists($path."/".$_FILES["file"]["name"])){
					echo $_FILES["file"]["name"]."already exists.";
				 }
				 else{
					  $move= move_uploaded_file($_FILES["file"]["tmp_name"],$path."/".$name);
				   }
			}
	}
	function _delete_file($upload_path,$file_name){
		$my_file = './'.$upload_path."/".$file_name;
		if(is_file($my_file))
		{
			//print_r($my_file);
			unlink($my_file);
		} 
		else{
			print_r("not delete");
		}
		return;
	} 
	function delete_files($mydir){
		$d = dir($mydir."/"); 
			while($entry = $d->read()) { 
			 if ($entry!= "." && $entry!= "..") { 
			 unlink($mydir."/".$entry); 
			 } 
			} 
			$d->close(); 
			rmdir($mydir); 
	}
	public function cleanUserInput($insertValue){
	//Function for cleaning user inputs
		$this->insertValue=$insertValue;
		if (!get_magic_quotes_gpc()){
			$this->insertValue 	= addslashes($this->insertValue);
		}
		else{
			$this->insertValue 	= stripslashes($this->insertValue);
			$this->insertValue	= addslashes($this->insertValue);
		}
		return 	trim($this->insertValue);
	}
	
	function view($table){
		$cnt=$this->connection();
		$sql="SELECT * FROM $table";
		$result=mysqli_query($cnt,$sql);
		return $result;
	
	}
	
	function view_by_id($table,$cond){
		$sql="select * from $table WHERE $cond";
		$result=mysqli_query($sql);
		return $result;
	}
	function getRowByID($tableName,$idFieldName,$id,$condition){
		$this->tableName=$tableName;
		$this->query = "SELECT * FROM ".$this->tableName." WHERE ".$idFieldName."='".$id."'";
		if($condition!=""){
			$this->query  .= " AND ".$condition;
		}
		//print_r($this->query);
		$this->result = $this->ExecuteQuery($this->query);//Calling the execute query 
		$this->row = mysqli_fetch_assoc($this->result);
		return $this->row;
	}
	public function getResultArray($sql){
		//To execute all type of queries
		$cnt=$this->connection();
		$this->sql=$sql;
		$this->result  = mysqli_query($cnt,$this->sql) or die (mysqli_error()."<br>Please check the following query-<br>".$this->sql);
		$this->resultArray=array();
		while($this->row=mysqli_fetch_assoc($this->result)){
			$this->resultArray[]=$this->row;
		}
		//print_r($this->resultArray);
		return $this->resultArray;
	}
	function getCount($table){
				
				$sql="SELECT COUNT(*) FROM $table";
				$result =mysqli_query($sql);
						return $result;
		}
	public function redirect($location){
		//Function to redirect to a location
		$this->redirectLocation=$location;
		header('location:'.$this->redirectLocation);
		exit;
	}
	
	function excuteQuery($sql){
		$result=mysqli_query($sql);
		return $result;
	
	}
	
	function create_zip($files = array(),$destination,$overwrite = false) {
	  //if the zip file already exists and overwrite is false, return false
	  if(file_exists($destination) && !$overwrite) { return false; }
	  //vars
	  $valid_files = array();
	  //if files were passed in...
	  if(is_array($files)) {
		//cycle through each file
		foreach($files as $file) {
		  //make sure the file exists
		  if(file_exists($file)) {
			$valid_files[] = $file;
		  }
		}
	  }
	  //if we have good files...
	  if(count($valid_files)) {
		//create the archive
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
		  return false;
		}
		//add the files
		foreach($valid_files as $file) {
		 $zipped= $zip->addFile($file,$file);
		}
		//debug
		//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
		
		//close the zip -- done!
		$zip->close();
		//print_r($destination);
		//echo 'check to make sure the file exists';
		return file_exists($destination);
	  }
	  else{
		return false;
	  }
	}
  function checkUnique($field,$value,$table){
  	$cnt=$this->connection();
		$sql="SELECT * FROM $table WHERE ".$field."='$value'";
		$result=mysqli_query($cnt,$sql);
		$num_rows=mysqli_num_rows($result); print_r($num_rows);
			return $num_rows;
	}
}
?>