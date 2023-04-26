<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/include.php');
$view='indexFlash.php';

?>
<?php 
  $desc='';
		$title='';
		$category=$class->getResultArray('select * from category');
  if(isset($_POST['Submit'])){
		$validator->addValidation("title","req","Enter news title");
		$validator->addValidation("desc","req","Please enter news desc");
		$desc=$_POST['desc'];
		$title=$_POST['title'];
		$name=$_FILES['file']['name'];
		$image=$_FILES['file2']['name'];
		$category_id=$_POST['category'];
	  	if($validator->ValidateForm()){
			$add_view='createIndexFlash.php';
			$temp=$_FILES['file']['tmp_name'];
			$temp2=$_FILES['file2']['tmp_name'];
			$D = @getimagesize($temp);
				/*if($D['0'] > 81 || $D['1'] > 89 ){
				$originatingpage=$add_view.'?current_tab='.$current_tab; 
								echo '<script type="text/javascript"> 
								alert(\'Home image  exceeds maximum size limit, upload in size 81 widht 89 height\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
			}
			$D2 = @getimagesize($temp2);
				if($D2['0'] > 81 || $D2['1'] > 89 ){
				$originatingpage=$add_view.'?current_tab='.$current_tab; 
								echo '<script type="text/javascript"> 
								alert(\'Home image  exceeds maximum size limit, upload in size 81 widht 89 height\'); 
								window.location = "'.$originatingpage.'"; 
								</script>'; 
								exit;
			}*/
			$path='../thumbnails/';
			$photo= $_FILES['file']['name'];
			$token = (rand()%99999999);
			$thumb="$token"."_"."$photo";
			$class->upload_file($path,$thumb);
			
			
			$path2='../photos/';
			$photo2= $_FILES['file2']['name'];
			$token2 = (rand()%99999999);
			$image="$token2"."_"."$photo2";
			move_uploaded_file($temp2,$path2.$image);
			$field=array(
				'news_title'=>$title,
				'news_desc'=>$desc,
				'news_thumb_image'=>$thumb,
				'news_image'=>$image
				//'category_ID'=>$category_id
				
			);	
				
			$insert_id=$class->InsertQuery('index_flash',$field);
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
	?>
 <?php 
  include('header.php');
	if(isset($_SESSION['username'])){

?>

<div id="content">
  <div id="breadCrumb"></div>
  <h2 id="pageName"><strong>ADD HOME PAGE FLASH IMAGES </strong></h2>
  <div class="feature"></div>
  <div class="story" style="width:60%; margin:1px auto;">
    <form method="post" enctype="multipart/form-data" >
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
          <td align="left" valign="top">Title</td>
          <td align="left" valign="top" colspan="2"><input class="inp-text" name="title" id="title" value="<?php echo $title;?>" type="text" size="30" />
          </td>
        </tr>
         <tr>
          <td align="left" valign="top">Thumb image</td>
          <td align="left" valign="top" colspan="2"><input class="inp-text" name="file" id="file"  type="file" />
          </td>
        </tr>
 <tr>
          <td align="left" valign="top">Big image</td>
          <td align="left" valign="top" colspan="2"><input class="inp-text" name="file2" id="file2"  type="file" />
          </td>
        </tr>

        <tr>
          <td align="left" valign="top">News desc</td>
          <td align="left" valign="top" colspan="2"><textarea name="desc" id="desc"  size="30" />
            <?php echo $desc;?>
            </textarea>
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
