<?php 
session_start();
$current_tab=$_GET['current_tab'];
include('../include/common.php');
$class=new Common();
$sql="SELECT * FROM index_news WHERE news_ID != '1' AND news_ID != '2'";
$array=$class->getResultArray($sql);
$other=$class->getResultArray("SELECT * FROM index_news limit 2");
$edit='editIndexNews.php';
include('header.php');
?>
<?php 
if(isset($_SESSION['username'])){
?>

<div id="content">
  <div id="breadCrumb"></div>
  <div class="feature"> <div id="pageName">HOME PAGE NEWS</div></div>
  <div class="story">			
    <table width="95%"  class="gradient-style" border="0" cellspacing="0" cellpadding="0">
      <tr>
           <th>#</th>
           <th>Category</th>
            <th>Title </th>
             <th>Edit </th>
       </tr>
       <?php 
	   		$count=1;
	   		foreach ($array as $row){?>
        <tr>
           <td><?php echo $count;?></td>
             <td><?php 
			 $cat_row=$class->getRowByID('category','category_ID',$row['category_ID'],$condition='');  echo $cat_row['category_name'];?></td>
            <td><?php echo $row['news_title'];?> </td>
            

             <td><a href="<?php echo $edit;?>?current_tab=<?php echo $current_tab;?>&id=<?php echo $row['news_ID'];?>">
             <img src="../images/admin/edit.gif" border="0" /> </a></td>
       </tr>
       <?php
	   		$count++; 
	   		}
		?>
       </table>
         <table width="95%"  class="gradient-style" border="0" cellspacing="0" cellpadding="0">
      <tr>
           <th>#</th>
            <th>Title </th>
            <th>Description</th>
             <th>Edit </th>
          </tr>
        <?php 
			foreach($other as $row){
			?>
             <tr>
           <td><?php echo $count;?></td>
            <td><?php echo $row['news_title'];?> </td>
            <td><?php echo $row['news_desc'];?>

             <td><a href="<?php echo $edit;?>?current_tab=<?php echo $current_tab;?>&id=<?php echo $row['news_ID'];?>">
             <img src="../images/admin/edit.gif" border="0" /> </a></td>
       </tr>
 
            <?php
			}
			?>
    
</table>    <p>&nbsp;</p>
    
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