<?php
require('include/common.php');
$class= new Common();
$category_array=$class->getResultArray("SELECT * FROM category WHERE category_ID BETWEEN 2 AND 7");
$latest_news_array=$class->getResultArray("SELECT * FROM news  WHERE category_ID= '2' ORDER BY news_ID desc LIMIT 3");
$other_news_array=$class->getResultArray("SELECT * FROM news ORDER BY news_ID desc LIMIT 10");
$index_right_adv=$class->getResultArray('SELECT * FROM index_right_adv');
$condition="category_ID= '1'";
$index_left_banner=$class->getResultArray("SELECT * FROM  right_banner WHERE ".$condition. "AND position= 'left'");
$index_right_banner=$class->getResultArray("SELECT * FROM right_banner WHERE ".$condition. "AND position= 'right'");
$lifestyle=$class->getRowByID('index_news','category_ID','4',$condition='');
$sports=$class->getRowByID('index_news','category_ID','3',$condition='');
$health=$class->getRowByID('index_news','category_ID','5',$condition='');
$classifieds=$class->getRowByID('index_news','category_ID','7',$condition='');
$travel=$class->getRowByID('index_news','category_ID','6',$condition='');
$special=$class->getRowByID('index_news','news_ID','2',$condition='');
$kerala=$class->getRowByID('index_news','news_ID','1',$condition='');
$health_array=$class->getResultArray("SELECT * FROM news WHERE  category_ID='5'");
$sports_array=$class->getResultArray("SELECT * FROM news WHERE  category_ID='3'");
$travel_array=$class->getResultArray("SELECT * FROM news WHERE  category_ID='6'");
$classifieds_array=$class->getResultArray("SELECT * FROM news WHERE  category_ID='7'");
$adv1=$class->getRowByID('index_adv','pri_ID','1',$condition='');
$adv2=$class->getRowByID('index_adv','pri_ID','2',$condition='');
$adv3=$class->getRowByID('index_adv','pri_ID','3',$condition='');
$adv4=$class->getRowByID('index_adv','pri_ID','4',$condition='');
$index_flash=$class->getResultArray("SELECT * FROM  index_flash");
$top_banner=$class->getRowByID('top_banner','category_ID','1',$condi='');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name="description" content="Janabhumi Malayalam Varthakal "/>
<title>Janabhumi Malayala varatha</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="font/font.css" type="text/css" charset="utf-8" />


 
<script type="text/javascript" src="js/compressed.js"></script><!--top slider-->


<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>

<div id="frame">

<div id="top_add">
  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','730','height','90','src','add/add','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','add/add' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="730" height="90">
    <param name="movie" value="add/<?php echo $top_banner['adv_image'];?>" />
    <param name="quality" value="high" />
    <embed src="add/<?php echo $top_banner['adv_image'];?>" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="730" height="90"></embed>
  </object>
</noscript></div>


<div id="tm_srch">
<div id="janaboomi"></div>
<div id="date"><?php echo date('d M Y',time());?></div>

<div id="search">
<form method="get" action="#">
<input class="input-text" type="text" title="searchfield" value="Search" name="q" onfocus="clearText(this)" onblur="clearText(this)" />
<input type="submit" value="Search" id="submit" name="submit" class="submit_btn">
</form>
</div>
</div>




<div id="header">
<div id="logo"></div>
<div id="header_lft_add"><img src="uploads/top_banner/<?php echo $top_banner['adv_image2'];?>" /></div>
</div>

<div id="menu">
<div id="menu_in">
    
	    <ul>
            <li><a class="current" href="index.php">Home</a></li>
        <?php
			 
			foreach($category_array as $category){ 
		?>
            <li><a href="home.php?id=<?php echo $category['category_ID'];?>" <?php if($cat_id==$category['category_ID']){echo 'class="current"';}?>><?php echo $category['category_name'];?></a></li>
		<?php
			}
			?>
            <li> <a href="photos.php">Photos</a></li>
            <li> <a href="videos.php" >Videos</a></li>
             <li> <a href="contact.php" >Contact</a></li>
        </ul>
    
    </div>

</div>

<div id="flash_news"><h1>Flash News</h1>
<p>
<marquee onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 6, 0);" scrollamount="10" direction="left" scrolldelay="170" behavior="scroll">hergeuuytgerutgurgut knfkgjnkfjdhgjkbfhj gfjfdhdfiughiusdoifhiodshiufhdisuhg dgfiuuihiudfhgihiusgfihdogjojhgiuh </marquee>
</p>
</div>

<div id="cln_10"></div>
<div id="cln_10"></div>

<div id="cln">
<div id="lft">







<div id="left_slider"><!--left slider satart-->

<ul id="slideshow">
<?php 
	foreach($index_flash as $f){
	?>
		<li>
			<h3><?php echo $f['news_title'];?></h3>

			<span>photos/<?php echo $f['news_image'];?></span>
			<p><?php echo $f['news_desc'];?> </p>
			<a href="http://www.google.co.in/"><img src="thumbnails/<?php echo $f['news_thumb_image'];?>" alt="<?php echo $f['news_title'];?>" /></a>
		</li>
        <?php
		}
		?>
		
		
	</ul>
    
    
    
    <div id="wrapper">
		<div id="fullsize">
			<div id="imgprev" class="imgnav" title="Previous Image"></div>

			<div id="imglink"></div>
			<div id="imgnext" class="imgnav" title="Next Image"></div>
			<div id="image"></div>
			<div id="information">
				<h3></h3>
				<p></p>
			</div>
		</div>
		<div id="thumbnails">

			<div id="slideleft" title="Slide Left"></div>
			<div id="slidearea">
				<div id="slider"></div>
			</div>
			<div id="slideright" title="Slide Right"></div>
		</div>
	</div>
    

</div><!--left slider End-->


<div id="cln_10"></div>
<div id="cln"><img src="img/web_add.png" /></div>
<div id="cln_10"></div>



</div>
<div id="center">
<h1>LATEST NEWS</h1>
<?php
	foreach($latest_news_array as $latest){
	?>
<div id="cln">
<h2><a href="details.php?n=<?php echo $latest['news_ID'];?>"><?php echo $latest['news_title'];?></a></h2>

<div id="news_pic"><a href="details.php?n=<?php echo $latest['news_ID'];?>.php"><img src="uploads/news_thumb/<?php echo $latest['news_thumb_image'];?>" /></a></div>
<div id="news"><p>	<?php echo $latest['news_desc'];?></p></div>
</div>

<div id="cln_10"></div>
<?php
}
?>
<div id="more"><a href="home.php">more...</a></div>

</div>

<div id="rgt">
<?php
	$count=1;
	foreach($index_right_adv as $adv){
?>
<div id="cln"><img src="uploads/index_right_adv/<?php echo $adv['adv_image'];?>" /></div>
<?php
	if($count<=1){
		echo '<div id="cln_10"></div>';
	}
	$count++;
}
?>


</div>

</div>


<div id="cln_10"></div>
<div id="cln_10"></div>

<div id="cln">
<div id="lft"><img src="img/1.png" height="84" width="290" /></div>
<div id="center"><img src="img/1.png" height="84" width="370" /></div>
<div id="rgt"><img src="img/1.png" height="84" width="300" /></div>
</div>

<div id="cln_10"></div>
<div id="cln_10"></div>

<div id="cln">

<div id="lft">
<h1>Other News</h1>
<ul class="latest_news">
<?php 
	foreach($other_news_array as $row){
	?>                        <li><a href="details.php?n=<?php echo $row['news_ID'];?>"><?php echo $row['news_title'];?> </a></li>
    <?php
	}
	?>
</ul>
</div>


<div id="center"><img src="uploads/index_adv/<?php echo $adv1['adv_image'];?>"  border="0"/></div>





<div id="rgt"><!--<img src="img/Untitled-1.jpg" />-->


<!-- Facebook Like Badge START --><div style="width: 100%;"><div style="background: #3B5998;padding: 5px;"><img src="http://www.facebook.com/images/fb_logo_small.png" alt="Facebook"/><img src="http://badge.facebook.com/badge/171866259568225.100000415223617.338837001.png" alt="" width="0" height="0"/></div><div style="background: #EDEFF4;display: block;border-right: 1px solid #D8DFEA;border-bottom: 1px solid #D8DFEA;border-left: 1px solid #D8DFEA;margin: 0px;padding: 0px 0px 5px 0px;"><div style="background: #EDEFF4;display: block;padding: 5px;"><table cellspacing="0" cellpadding="0" border="0"><tr><td valign="top"><img src="http://www.facebook.com/images/icons/fbpage.gif" alt=""/></td><td valign="top"><p style="color: #808080;font-family: verdana;font-size: 11px;margin: 0px 0px 0px 0px;padding: 0px 8px 0px 8px;"><a href="http://www.facebook.com/chandresh.royal.7" target="_TOP" style="color: #3B5998;font-family: verdana;font-size: 11px;font-weight: normal;margin: 0px;padding: 0px 0px 0px 0px;text-decoration: none;" title="Chandresh Royal">Chandresh Royal</a> likes</p></td></tr></table></div><div style="background: #FFFFFF;clear: both;display: block;margin: 0px;overflow: hidden;padding: 5px;"><table cellspacing="0" cellpadding="0" border="0"><tr><td valign="middle"><a href="http://www.facebook.com/pages/Neomiritcom/171866259568225" target="_TOP" style="border: 0px;color: #3B5998;font-family: verdana;font-size: 12px;font-weight: bold;margin: 0px;padding: 0px;text-decoration: none;" title="Neomirit.com"><img src="http://www.facebook.com/profile/pic.php?oid=AWwxkXYlb4Zw_CfaM7ZzORXh-sskFjniOuEa4YldsKYZMx9EftY7OmhpuTCSrFa1110&size=square" style="border: 0px;margin: 0px;padding: 0px;" alt="Neomirit.com"/></a></td><td valign="middle" style="padding: 0px 8px 0px 8px;"><a href="http://www.facebook.com/pages/Neomiritcom/171866259568225" target="_TOP" style="border: 0px;color: #3B5998;font-family: verdana;font-size: 12px;font-weight: bold;margin: 0px;padding: 0px;text-decoration: none;" title="Neomirit.com">Neomirit.com</a></td></tr></table></div></div><div style="display: block;float: right;margin: 0px;padding: 4px 0px 0px 0px;"><a href="http://www.facebook.com/badges/like.php" target="_TOP" style="color: #3B5998;font-family: verdana;font-size: 11px;font-weight: none;margin: 0px;padding: 0px;text-decoration: none;" title="Create your Like Badge">Create your Like Badge</a></div></div><!-- Facebook Like Badge END -->


</div>








<div id="cln_10"></div>
<div id="cln_10"></div>

<div id="cln">
<div id="lft"><img src="img/1.png" height="84" width="290" /></div>
<div id="center"><img src="img/1.png" height="84" width="370" /></div>
<div id="rgt"><img src="img/1.png" height="84" width="300" /></div>
</div>




</div>

<div id="cln_10"></div>
<div id="cln_10"></div>



<div id="cln">
<div id="left_2">
<h1><a href="home_details.php?n=<?php echo $lifestyle['news_ID'];?>"><?php
				 $lifestyle_category=$class->getRowByID('category','category_ID',$lifestyle['category_ID'],$condi='');
				 echo $lifestyle_category['category_name'];
				 ?></a></h1>
<div id="cln_10"></div>
<div id="lifestyle_pic"><img src="uploads/news_thumb/<?php echo $lifestyle['news_thumb_image'];?>" /></div>
<div id="lifestyle_text">
<h2><a href="home_details.php?n=<?php echo $lifestyle['news_ID'];?>"><?php echo $lifestyle['news_title'];?></a></h2>
<p><?php echo $lifestyle['news_desc'];?></p>
<div id="more"><a href="home_details.php?n=<?php echo $lifestyle['news_ID'];?>">more...</a></div>
</div>
</div>

<div id="rgt">
<h1><a href="home_details.php?n=<?php echo $kerala['news_ID'];?>"><?php echo $kerala['news_title'];?></a></h1>
<div id="cln_10"></div>

<div id="lifestyle_pic">
<img src="uploads/news_thumb/<?php echo $kerala['news_thumb_image'];?>" />
</div>

<div id="cln_10"></div>
<p><?php echo $kerala['news_desc'];?></p>
<div id="more"><a href="home_details.php?n=<?php echo $kerala['news_ID'];?>">more...</a></div>
</div>




<div id="cln_10"></div>
<div id="cln_10"></div>





<div id="cln">

<div id="lft"><img src="img/1.png" height="84" width="290" /></div>
<div id="center"><img src="img/1.png" height="84" width="370" /></div>
<div id="rgt"><img src="img/1.png" height="84" width="300" /></div>
</div>


</div>




<div id="cln_10"></div>
<div id="cln_10"></div>




<div id="cln">

<div id="left_2">
<h1><a href="home_details.php?n=<?php echo $special['news_ID'];?>">Janabhumi News Special</a></h1>
<div id="cln_10"></div>
<div id="lifestyle_pic"><img src="uploads/news_thumb/<?php echo $special['news_thumb_image'];?>" /></div>
<div id="lifestyle_text">
<h2><a href="home_details.php?n=<?php echo $special['news_ID'];?>"><?php echo $special['news_title'];?></a></h2>
<p><?php echo $special['news_desc'];?></p>
<div id="more"><a href="home_details.php?n=<?php echo $special['news_ID'];?>">more...</a></div>
</div>
</div>

<div id="rgt">
<img src="uploads/index_adv/<?php echo $adv2['adv_image'];?>"  border="0"/>
</div>
</div>





<div id="cln_10"></div>
<div id="cln_10"></div>






<div id="cln">
<div id="Lft_long_add">
<?php
	$count=1;
	foreach($index_left_banner as $banner){
?>
<img src="uploads/right_banner/<?php echo $banner['adv_image'];?>" />
	
<?php
	if($count <=1){
		echo '<div id="cln_10"></div>';
	}
	$count++;
}
?>
</div>

<div id="news_center"><!--center start-->


<div id="center_3">

<h1><a href="home_details.php?n=<?php echo $health['news_ID'];?>"><?php
				 $health_category=$class->getRowByID('category','category_ID',$health['category_ID'],$condi='');
				 echo $health_category['category_name'];
				 ?>
</a></h1>
<h2><a href="home_details.php?n=<?php echo $health['news_ID'];?>"><?php echo $health['news_title'];?></a></h2>
<div id="lifestyle_pic"><a href="home_details.php?n=<?php echo $health['news_ID'];?>"><img src="uploads/news_thumb/<?php echo $health['news_thumb_image'];?>"></a></div>
<div id="news_3"><p><?php echo $health['news_desc'];?></p></div>

<div id="cln_10"></div>
<ul class="latest_news">
<?php 
	foreach($health_array as $array){
	?>
<li><a href="home_details.php?n=<?php echo $array['news_ID'];?>"><?php echo $array['news_title'];?> </a></li>
<?php
}
?></ul>

<div id="more"><a href="home_details.php?n=<?php echo $health['news_ID'];?>">more...</a></div>

</div>




<div id="center_3_r">
<h1><a href="home_details.php?n=<?php echo $sports['news_ID'];?>"><?php $sports_category=$class->getRowByID('category','category_ID',$sports['category_ID'],$condi='');
				 echo $sports_category['category_name'];
				 ?>
</a></h1>

<div id="cln">
<h2><a href="home_details.php?n=<?php echo $sports['news_ID'];?>"><?php echo $sports['news_title'];?></a></h2>
<div id="lifestyle_pic"><a href="home_details.php?n=<?php echo $sports['news_ID'];?>"><img src="uploads/news_thumb/<?php echo $sports['news_thumb_image'];?>"></a></div>
<div id="news_3"><p><?php echo $sports['news_desc'];?><p></div>

<div id="cln_10"></div>
<ul class="latest_news">
<?php 
	foreach($sports_array as $array){
	?>
<li><a href="home_details.php?n=<?php echo $array['news_ID'];?>"><?php echo $array['news_title'];?> </a></li>
<?php
}
?>
</ul>
</div>

<div id="more"><a href="home_details.php?n=<?php echo $sports['news_ID'];?>">more...</a></div>

</div>


<div id="cln_10"></div>
<div id="cln_10"></div>


<div id="center_3">
<div id="cln_10"></div>

<div id="cln_10"></div>
<div id="cln_10"></div>
<div id="cln_10"></div>
<img src="uploads/index_adv/<?php echo $adv3['adv_image'];?>"  border="0"/>
</div>




<div id="center_3_r">
<h1><a href="home_details.php?n=<?php echo $travel['news_ID'];?>"><?php
				 $travel_category=$class->getRowByID('category','category_ID',$travel['category_ID'],$condi='');
				 echo $travel_category['category_name'];
				 ?></a></h1>

<div id="cln">
<h2><a href="home_details.php?n=<?php echo $travel['news_ID'];?>"><?php echo $travel['news_title'];?></a></h2>
<div id="lifestyle_pic"><a href="home_details.php?n=<?php echo $travel['news_ID'];?>"><img src="uploads/news_thumb/<?php echo $travel['news_thumb_image'];?>"></a></div>

<div id="news_3"><p><?php echo $travel['news_desc'];?></p></div>

<div id="cln_10"></div>
<ul class="latest_news">
<?php 
	foreach($travel_array as $array){
	?>
<li><a href="home_details.php?n=<?php echo $array['news_ID'];?>"><?php echo $array['news_title'];?> </a></li>
<?php
}
?>
</ul>
</div>

<div id="more"><a href="home_details.php?n=<?php echo $travel['news_ID'];?>">more...</a></div>

</div>






<div id="cln_10"></div>
<div id="cln_10"></div>


<div id="center_3">
<h1><a href="home_details.php?n=<?php echo $classifieds['news_ID'];?>"><?php
				 $classifieds_category=$class->getRowByID('category','category_ID',$classifieds['category_ID'],$condi='');
				 echo $classifieds_category['category_name'];
				 ?></a></h1>

<div id="cln">
<h2><a href="home_details.php?n=<?php echo $classifieds['news_ID'];?>">e;rjjhrthreh</a></h2>
<div id="lifestyle_pic"><a href="home_details.php?n=<?php echo $classifieds['news_ID'];?>"><img src="uploads/news_thumb/<?php echo $classifieds['news_thumb_image'];?>"></a></div>
<div id="news_3"><p><?php echo $classifieds['news_title'];?></p></div>

<div id="cln_10"></div>
<ul class="latest_news">
<?php 
	foreach($classifieds_array as $array){
	?>
<li><a href="home_details.php?n=<?php echo $array['news_ID'];?>"><?php echo $array['news_title'];?> </a></li>
<?php
}
?></ul>
</div>

<div id="more"><a href="home_details.php?n=<?php echo $classifieds['news_ID'];?>">more...</a></div>

</div>




<div id="center_3_r">
<div id="cln_10"></div>
<div id="cln_10"></div>
<div id="cln_10"></div>
<?php echo $adv4['adv_image'];?>
<div id="cln_10"></div>
<img src="uploads/index_adv/<?php echo $adv4['adv_image'];?>"  border="0"/>
</div>














</div><!--center End-->



<div id="rgt_long_add">
<?php
	$count=1;
	foreach($index_right_banner as $banner){
?>
<img src="uploads/right_banner/<?php echo $banner['adv_image'];?>" />
	
<?php
	if($count <=1){
		echo '<div id="cln_10"></div>';
	}
	$count++;
}
?></div>



</div>


<div id="cln_10"></div>
<div id="cln_10"></div>


<div id="cln">
<div id="footer"><!-- footer starts -->
<div class="footer_social">
<span>FOLLOW US ON</span>
<a href="www.facebook.com/"><img alt="" title="Be a facebook fan" src="img/facebook.png"></a>
<a href="www.twitter.com/"><img alt="" title="Follow us on twitter" src="img/twitter.png"></a>
<a href="#"><img alt="" title="Dail a Comment" src="img/linked-in.png"></a>
</div>
<div class="footer_copyright">
<p><img alt="" src="img/copy_right.png"> 2012 Janabhuminews - <a href="#">Privacy Policy</a></p>
</div>

<div class="site_by">
<a href="#">Site by chandu</a>
</div>
<div class="footer_links">

<ul class="footer_list">
<li><a href="index.php">Home</a></li>
 <?php
			 
			foreach($category_array as $category){ 
		?>
            <li><a href="home.php?id=<?php echo $category['category_ID'];?>" <?php if($cat_id==$category['category_ID']){echo 'class="current"';}?>><?php echo $category['category_name'];?></a></li>
		<?php
			}
			?>
            <li> <a href="photos.php">Photos</a></li>
            <li> <a href="videos.php" >Videos</a></li>
 <li class="last"><a href="contact.php">Contact</a></li>
</ul>

</div>



</div>
</div>

<div id="cln_10"></div>


</div><!--frame end-->







<script type="text/javascript">
	$('slideshow').style.display='none';
	$('wrapper').style.display='block';
	var slideshow=new TINY.slideshow("slideshow");
	window.onload=function(){
		slideshow.auto=true;
		slideshow.speed=5;
		slideshow.link="linkhover";
		slideshow.info="information";
		slideshow.thumbs="slider";
		slideshow.left="slideleft";
		slideshow.right="slideright";
		slideshow.scrollSpeed=4;
		slideshow.spacing=5;
		slideshow.active="#fff";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");
	}
</script>



</body>
</html>
