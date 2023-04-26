<?php
require('include/common.php');
$class= new Common();
$category_array=$class->getResultArray("SELECT * FROM category WHERE category_ID BETWEEN 2 AND 7");
$top_banner=$class->getRowByID('top_banner','category_ID','9',$condi='');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name="description" content="Janabhumi Malayalam Varthakal "/>
<title>Janabhumi Malayala varatha</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="font/font.css" type="text/css" charset="utf-8" />

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
<div id="date">FRIDAY, AUGUST 03, 2012</div>

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
          <li> <a href="index.php">HOME</a></li>
        <?php
			 
			foreach($category_array as $category){ 
		?>
            <li><a href="home.php?id=<?php echo $category['category_ID'];?>" <?php if($cat_id==$category['category_ID']){echo 'class="current"';}?>><?php echo $category['category_name'];?></a></li>
		<?php
			}
			?>
            <li> <a href="photos.php">Photos</a></li>
            <li> <a href="videos.php" class="current">Videos</a></li>
            <li> <a href="contact.php">Contacts</a></li>

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


<div id="details">
<p style="font-family:Arial, Helvetica, sans-serif;">Coming soon</p>
</div>




<div id="rgt">
<div id="cln"><img src="img/add_2.png" /></div>
<div id="cln_10"></div>
<div id="cln"><img src="img/center_300.png" /></div>
<div id="cln_10"></div>
<div id="cln"><img src="img/center_300_2.png" /></div>
<div id="cln_10"></div>
<div id="cln"><img src="img/add_2.png" /></div>
</div>





<div id="Lft_long_add">
<img src="img/lng_add_2.png">
<div id="cln_10"></div>
<img src="img/lng_add.png">
</div>





</div>


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
<li><a href="index.html">Home</a></li>
<li><a href="home.php">Latest News</a></li>
<li><a href="#">Sports</a></li>
<li><a href="#">Life Style</a></li>
<li><a href="#">Health</a></li> 
<li><a href="#">Travel</a></li> 
<li><a href="videos.html">Videos</a></li> 
<li><a href="photos.html">Photos</a></li>
<li><a href="#">Classifieds</a></li>
<li class="last"><a href="contact.html">Contact</a></li>
</ul>

</div>



</div>
</div>

<div id="cln_10"></div>


</div><!--frame end-->




</body>
</html>
