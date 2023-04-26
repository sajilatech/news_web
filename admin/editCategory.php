<?php 
session_start();
$current_tab=$_GET['current_tab'];
$id=$_GET['id'];
include('../include/include.php');
$row=$class->getRowByID('category','category_id',$id,$condition='');
  if(isset($_POST['Submit'])){
		$validator->addValidation("name","req","Please enter category name");
		$name=$_POST['name'];
	  if($validator->ValidateForm()){
	  	$old_name=$row['category_name'];
			$field=array(
						'category_name'=>$name
					);	
			$condi="category_id='$id'";
			$class->UpdateQuery('category',$field,$condi); 
			$view='viewCategory.php';
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
		$name=$row['category_name'];
}
 include('header.php'); 
?>
<?php if(isset($_SESSION['username'])){?>
<div id="content">
	<div id="breadCrumb"></div>
	<h2 id="pageName"><strong>EDIT CATEGORY </strong></h2>
	<div class="feature"></div>
	<div class="story" style="width:90%; margin:1px auto;">
	<form method="post" enctype="multipart/form-data" >
        <table width="99%" border="0" cellspacing="1" cellpadding="3">
          
            <tr>
                <td align="left" valign="top">Name</td>
                <td align="left" valign="top" colspan="2">
                  <input class="inp-text" name="name" id="name" value="<?php echo $name;?>" type="text" size="30" />												  </td>
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