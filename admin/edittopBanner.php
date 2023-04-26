<?php 
session_start();
$current_tab=$_GET['current_tab'];
$id=$_GET['id'];
include('../include/common.php');
include('../include/formvalidator.php');
$class= new Common();
$validator = new FormValidator();
$row=$class->getRowByID('top_banner','pri_ID',$id,$condition='');
	$category=$class->getResultArray('select * from category');
  if(isset($_POST['Submit'])){
    $validator->addValidation("category_id","req","Please select category");
		$category_id=$_POST['category_id'];
	  if($validator->ValidateForm()){
	  $path2='../uploads/top_banner';
	  $path='../add';
	 $temp= $_FILES["file"]["tmp_name"];
		if(!$_FILES["file"]["name"]){
					if($row['adv_image']==''){
						$originatingpage='editTopBanner.php?current_tab='.$current_tab.'&id='.$id; 
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
	
						move_uploaded_file($temp,$path.'/'.$name);			
		}
			
		if(!$_FILES["file2"]["name"]){
					if($row['adv_image2']==''){
						$originatingpage='editBanner.php?current_tab='.$current_tab.'&id='.$id; 
									echo '<script type="text/javascript"> 
									alert(\'Select a image to upload\'); 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit;
						
					}
					else{
							$name2=$row['adv_image2'];
							$old_name='';
					}
		}
		else{
				$class->_delete_file($path2,$row['adv_image2']);
			$photo2= $_FILES['file2']['name'];
			$temp2= $_FILES['file2']['tmp_name'];
			$token2 = (rand()%99999999);
					$name2="$token2"."_"."$photo2";
	
					move_uploaded_file($temp2,$path2.'/'.$name2);			
		}
			$field=array(
						'adv_image'=>$name,
						'adv_image2'=>$name2,
						'category_ID'=>$category_id
					);	

					
					
					
			$condi="pri_ID='$id'";
			$class->UpdateQuery('top_banner',$field,$condi); 
			$view='viewTopBanner.php';
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
		$image=$row['adv_image'];
		$image2=$row['adv_image2'];
}
 include('header.php'); 
?>
<?php if(isset($_SESSION['username'])){?>
<div id="content">
	<div id="breadCrumb"></div>
	<h2 id="pageName"><strong>EDIT TOP BANNER </strong></h2>
	<div class="feature"></div>
	<div class="story" style="width:90%; margin:1px auto;">
	<form method="post" enctype="multipart/form-data" >
        <table width="99%" border="0" cellspacing="1" cellpadding="3">
          
            <tr>
                <td align="left" valign="top">Top banner</td>
                <td align="left" valign="top" colspan="2">
                  <input class="inp-text" name="file" id="file"  type="file" size="18" />	<img src="../add/<?php echo $image;?>"  height="50" width="50"/>											  </td>
          </tr>
           <tr>
                <td align="left" valign="top">Top left banner</td>
                <td align="left" valign="top" colspan="2">
                  <input class="inp-text" name="file2" id="file2"  type="file" size="18" />	<img src="../uploads/top_banner/<?php echo $image2;?>"  height="50" width="50"/>											  </td>
          </tr>
    <tr>
          <td align="left" valign="top">Category</td>
          <td align="left" valign="top" colspan="2">
          <select name="category_id" >
          		<option value="">--Category--</option>
                <?php 
					foreach($category as $cat){
					?>
                    <option value="<?php echo $cat['category_ID'];?>" <?php if($category_id==$cat['category_ID']){ echo 'selected';}?>><?php echo $cat['category_name'];?></option>
                    <?php
					}
					?>
             </select>
          </td>
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