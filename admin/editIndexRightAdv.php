<?php 
session_start();
$current_tab=$_GET['current_tab'];
$id=$_GET['id'];
include('../include/common.php');
include('../include/formvalidator.php');
$class= new Common();
$validator = new FormValidator();
$row=$class->getRowByID('index_right_adv','pri_ID',$id,$condition='');
  if(isset($_POST['Submit'])){
	  if($validator->ValidateForm()){
		if(!$_FILES["file"]["name"]){
					if($row['adv_image']==''){
						$originatingpage='editIndexRightAdv.php?current_tab='.$current_tab.'&id='.$id; 
									echo '<script type="text/javascript"> 
									alert(\'Select a image to upload\'); 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit;
						
					}
					else{
							$name=$row['adv_image'];
							$old_name='';
					}
		}
		else{
				$class->_delete_file('../uploads/index_right_adv/',$row['adv_image']);
			$path='../uploads/index_right_adv/';
			$photo= $_FILES['file']['name'];
			$token = (rand()%99999999);
					$name="$token"."_"."$photo";
	
					$class->upload_file($path,$name);			
		}
			$field=array(
						'adv_image'=>$name
					);	

					
					
					
			$condi="pri_ID='$id'";
			$class->UpdateQuery('index_right_adv',$field,$condi); 
			$view='viewIndexRightAdv.php';
			$originatingpage=$view.'?current_tab='.$current_tab; 
							echo '<script type="text/javascript"> 
							alert(\'Successfully created\'); 
							window.location = "'.$originatingpage.'"; 
							</script>'; 
							exit;
		}
		else{
			$error_hash = $validator->GetErrors();
			foreach($error_hash as $inpname => $inp_err){
				echo "<div class='validation_errors'><center><p><font color='red'>$inp_err</font></p>\n</center></div>";
			}         
		}
	}
	else{
		$image=$row['adv_image'];
}
 include('header.php'); 
?>
<?php if(isset($_SESSION['username'])){?>
<div id="content">
	<div id="breadCrumb"></div>
	<h2 id="pageName"><strong> HOME PAGE TOP RIGHT  ADVERTISEMENT </strong></h2>
	<div class="feature"></div>
	<div class="story" style="width:90%; margin:1px auto;">
	<form method="post" enctype="multipart/form-data" >
        <table width="99%" border="0" cellspacing="1" cellpadding="3">
          
            <tr>
                <td align="left" valign="top">Advertisement</td>
                <td align="left" valign="top" colspan="2">
                  <input class="inp-text" name="file" id="file"  type="file" size="18" />	<img src="../uploads/index_right_adv/<?php echo $image;?>"  height="50" width="50"/>											  </td>
          </tr>
   
        
           
            
    <tr>
    <td align="centre">
    <input class="button" type="submit" alt="SUBMIT" name="Submit" value="SUBMIT" />
<input type="button" class="button" value="Cancel" onclick="cancelAction()" />
</td>
    </tr>
    </table>
	</form>
    <p>&nbsp;</p>
  </div>
</div>

<?php 
	}
	else{
	$originatingpage='login.php';
							echo '<script type="text/javascript"> 
							alert(\'Session expired, please login again\'); 
							window.location = "'.$originatingpage.'"; 
							</script>'; 
							exit;
	}
?>
<!--end content -->
<?php include('leftMenu.php');?>
<?php include('footer.php');?>