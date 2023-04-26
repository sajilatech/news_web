<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/common.php');
include('../include/formvalidator.php');
$class= new Common();
if(isset($_POST['Submit'])){
	 $validator = new FormValidator();
    $validator->addValidation("category_id","req","Please select category");
}
?>
  <?php 
  $category=$class->getResultArray('select * from category');
  $page='home';
		$category_id='';
  if(isset($_POST['Submit'])){
		$category_id=$_POST['category_id'];
		$page=$_POST['page'];
  		$name=$_FILES['file']['name'];
	  	if($validator->ValidateForm()){
						$path='../uploads/home_right_adv/';
						$photo= $_FILES['file']['name'];
						$token = (rand()%99999999);
						$name="$token"."_"."$photo";
						$class->upload_file($path,$name);
					$field=array(
						'adv_image'=>$name,
						'page'=>$page,
						'category_ID'=>$category_id
					);	
						
			$insert_id=$class->InsertQuery('home_right_adv',$field);

								$view='viewHomeRightAdv.php';
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
  
  include('header.php');?>
<?php 
	if(isset($_SESSION['username'])){

?>
<div id="content">
	<div id="breadCrumb"></div>
	<h2 id="pageName"><strong>ADD  RIGHT ADVERTISEMENT </strong></h2>
	<div class="feature"></div>
	<div class="story" style="width:60%; margin:1px auto;">
	<form method="post" enctype="multipart/form-data" >
        <table width="100%" border="0" cellspacing="1" cellpadding="3">
     
   
            <tr>
                <td align="left" valign="top">Advertisement</td>
                <td align="left" valign="top" colspan="2">
                  <input class="inp-text" name="file" id="file"  type="file" size="30" />											  </td>
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
         <td align="left" valign="top">Page</td>
          <td align="left" valign="top" ><input  type="radio" name="page"  value="home"  id="home" <?php if($page=='home'){ echo 'checked="checked"' ;}?> /><input  type="radio" name="page" id="details" value="details" <?php if($page=='details'){ echo 'checked="checked"' ;}?> />
          </td>
        </tr>
              
    <tr>
    <td align="center" colspan="2"><input class="button" type="submit" alt="SUBMIT" name="Submit" value="SUBMIT" />
<!--<input type="button" class="button" value="Cancel" onclick="cancelAction()" />--></td>
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