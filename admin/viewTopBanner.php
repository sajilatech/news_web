<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/common.php');
$class=new Common();
$sql="SELECT * FROM top_banner";
$array=$class->getResultArray($sql);
include('header.php');
?>
<?php 
if(isset($_SESSION['username'])){
?>

<div id="content">
  <div id="breadCrumb"></div>
  <div class="feature"> <div id="pageName">VIEW TOP BANNERS</em></div></div>
  <div class="story">			
    <table width="95%"  class="gradient-style" border="0" cellspacing="0" cellpadding="0">
      <tr>
           <th>#</th>
           <th>Page</th>
            <th>Top left </th>
             <th>Edit </th>
       </tr>
       <?php 
	   		$count=1;
	   		foreach ($array as $row){?>
        <tr>
           <td><?php echo $count;?></td>
            <td><?php $cat_row=$class->getRowByID('category','category_ID',$row['category_ID'],$condition=''); echo $cat_row['category_name'];?> </td>
            <td><img src="../uploads/top_banner/<?php echo $row['adv_image2'];?>"  height="75" width="145" /> </td>
             <td><a href="editTopBanner.php?current_tab=<?php echo $current_tab;?>&id=<?php echo $row['pri_ID'];?>">
             <img src="../images/admin/edit.gif" border="0" /> </a></td>
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