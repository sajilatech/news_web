<?php 
session_start();
$current_tab=$_GET['current_tab'];
$id=$_GET['id'];
include('../include/common.php');
include('../include/formvalidator.php');
$class= new Common();
$validator = new FormValidator();
$row=$class->getRowByID('right_banner','pri_ID',$id,$condition='');
	$category=$class->getResultArray('select * from category');
	$path='../uploads/index_adv';
  if(isset($_POST['Submit'])){
	  if($validator->ValidateForm()){
	  $path='../uploads/index_adv/';
		if(!$_FILES["file"]["name"]){
					if($row['adv_image']==''){
						$originatingpage='editBanner.php?current_tab='.$current_tab.'&id='.$id; 
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
				$class->_delete_file($path,$row['adv_image']);
			$photo= $_FILES['file']['name'];
			$token = (rand()%99999999);
					$name="$token"."_"."$photo";
	
					$class->upload_file($path,$name);			
		}

			$field=array(
						'adv_image'=>$name
					);	

					
					
					
			$condi="pri_ID='$id'";
			$class->UpdateQuery('index_adv',$field,$condi); 
			$view='indexAdv.php';
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
		$category_id=$row['category_ID'];
		$page=$row['page'];
		$position=$row['position'];
		$image=$row['adv_image'];
}
 include('header.php'); 
?>
<?php if(isset($_SESSION['username'])){?>
<div id="content">
	<div id="breadCrumb"></div>
	<h2 id="pageName"><strong>EDIT RIGHT BANNER </strong></h2>
	<div class="feature"></div>
	<div class="story" style="width:90%; margin:1px auto;">
	<form method="post" enctype="multipart/form-data" >
        <table width="99%" border="0" cellspacing="1" cellpadding="3">
          
            <tr>
                <td align="left" valign="top">Advertisement</td>
                <td align="left" valign="top" colspan="2">
                  <input class="inp-text" name="file" id="file"  type="file" size="18" />	<img src=<?php echo $path;?>"/<?php echo $image;?>"  height="50" width="50"/>											  </td>
          </tr>
    <tr>
          <td align="left" valign="top">Category</td>
          <td align="left" valign="top" colspan="2">
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
	$originatingpage='index.php';
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