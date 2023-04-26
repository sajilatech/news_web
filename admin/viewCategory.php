<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/include.php');
$sql="SELECT * FROM category";
$category_array=$class->getResultArray($sql);
if(isset($_REQUEST['mode'])){
	$mode=$_REQUEST['mode'];
	$id=$_GET['id'];
	switch($mode){
		case'delete':
			$c="category_id='$id'";
			$row=$class->getRowByID('category','category_id',$id,$condi='');
			$product_row=$class->getRowByID('products','category_ID',$row['category_ID'],'');
			if($product_row>0){
				$error="Cannot be delete, this category related to products";
				$originatingpage=$view.'?current_tab='.$current_tab.'&error='.$error; 
										echo '<script type="text/javascript"> 
										window.location = "'.$originatingpage.'"; 
										</script>'; 
										exit;
			}
			else{
				rmdir('../uploads/'.$row['category_name']);
				$class->deleteQuery('category',$c);
				$view='viewCategory.php';
				$originatingpage=$view.'?current_tab='.$current_tab; 
									echo '<script type="text/javascript"> 
									alert(\'Successfully deleted\'); 
									window.location = "'.$originatingpage.'"; 
									</script>'; 
									exit;
			}
	}
}
include('header.php');
?>
<?php 
if(isset($_SESSION['username'])){
?>

<div id="content">
  <div id="breadCrumb"></div>
  <div class="feature"> <div id="pageName">Category</div></div>
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
	   		foreach ($category_array as $row){?>
        <tr>
           <td><?php echo $count;?></td>
            <td><?php echo $row['category_name'];?> </td>
            

             <td><a href="editCategory.php?current_tab=<?php echo $current_tab;?>&id=<?php echo $row['category_ID'];?>">
             <img src="../images/admin/edit.gif" border="0" /> </a></td>
             <td><a  onclick="confirmDelete();"href="viewCategory.php?current_tab=<?php echo $current_tab;?>&mode=delete&id=<?php echo $row['category_ID'];?>">
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