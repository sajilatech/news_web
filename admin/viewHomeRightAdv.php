<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/common.php');
$class=new Common();
$sql="SELECT * FROM home_right_adv";
$array=$class->getResultArray($sql);
if(isset($_REQUEST['mode'])){
	$mode=$_REQUEST['mode'];
	$id=$_GET['id'];
	$view='viewHomeRightAdv.php';
	switch($mode){
		case'delete':
			$c="pri_ID='$id'";
			$row=$class->getRowByID('home_right_adv','pri_ID',$id,$condi='');
			$class->upload_file($path,$row['adv_image']);
				$class->deleteQuery('home_right_adv',$c);
				
				$originatingpage=$view.'?current_tab='.$current_tab; 
									echo '<script type="text/javascript"> 
									alert(\'Successfully deleted\'); 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit;
		break;
	}
}
include('header.php');
?>
<?php 
if(isset($_SESSION['username'])){
?>

<div id="content">
  <div id="breadCrumb"></div>
  <div class="feature"> <div id="pageName">Gallery</div></div>
  <div class="story">			
    <table width="95%"  class="gradient-style" border="0" cellspacing="0" cellpadding="0">
      <tr>
           <th>#</th>
            <th>Name </th>
             <th>Edit </th>
             <th>Delete </th>
       </tr>
       <?php 
	   		$count=1;
	   		foreach ($array as $row){?>
        <tr>
           <td><?php echo $count;?></td>
            <td><img src="../uploads/home_right_adv/<?php echo $row['adv_image'];?>"  height="75" width="145" /> </td>
            

             <td><a href="editHomeRightAdv.php?current_tab=<?php echo $current_tab;?>&id=<?php echo $row['pri_ID'];?>">
             <img src="../images/admin/edit.gif" border="0" /> </a></td>
             <td><a  onclick="confirmDelete();"href="<?php echo $view;?>?current_tab=<?php echo $current_tab;?>&mode=delete&id=<?php echo $row['pri_ID'];?>">
             <img src="../images/admin/delete.gif" /></a></td>
       </tr>
       <?php
	   		$count++; 
	   		}
		?>
    </table>
    <p>&nbsp;</p>
    
  </div>
</div>
<?php }
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