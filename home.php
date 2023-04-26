<?php
require('include/common.php');
$class= new Common();
$category_array=$class->getResultArray("SELECT * FROM category WHERE category_ID BETWEEN 2 AND 7");
if(isset($_REQUEST['id'])){
	$cat_id=$_REQUEST['id'];
}
else{
	$cat_id=1;
}

$condi='category_ID='.$cat_id;
$and="page= 'home'";
 $sql="SELECT * FROM home_right_adv WHERE ".$condi." AND ".$and;
$right_adv=$class->getResultArray($sql);
$sql_news='SELECT * FROM news WHERE category_ID ='.$cat_id.' ORDER BY news_ID DESC';
$news_array=$class->getResultArray($sql_news); 
$flash_array=$class->getResultArray('SELECT * FROM news_flash  WHERE category_ID='.$cat_id);
$top_banner=$class->getRowByID('top_banner','category_ID',$cat_id,$condi='');echo $top_banner['adv_image'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name="description" content="Janabhumi Malayalam Varthakal "/>
<title>Janabhumi Malayala varatha</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="font/font.css" type="text/css" charset="utf-8" />
<script language="javascript" src="js/jquery.js">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script language="javascript">
function Slideshow(news_flash_id){
	$.ajax({
				type : 'POST',
				url:'ajax/news_flash.php',
				data:{'by_id' : news_flash_id},
				success: function(option_tags) {
					$('#div_news_flash').html(option_tags);
				}
	});	
	
}

</script>
<script type="text/javascript">
$(document).ready(function() {
	var autoPlayTime=7000;
	autoPlayTimer = setInterval( autoPlay, autoPlayTime);
	function autoPlay(){
		Slidebox('next');
	}
	$('#slidebox .next').click(function () {
		Slidebox('next','stop');
	});
	$('#slidebox .previous').click(function () {
		Slidebox('previous','stop');
	});
	var yPosition=($('#slidebox').height()-$('#slidebox .next').height())/2;
	$('#slidebox .next').css('top',yPosition);
	$('#slidebox .previous').css('top',yPosition);
	$('#slidebox .thumbs a:first-child').removeClass('thumb').addClass('selected_thumb');
	$("#slidebox .content").each(function(i){
		slideboxTotalContent=i*$('#slidebox').width();	
		$('#slidebox .container').css("width",slideboxTotalContent+$('#slidebox').width());
	});
});

function Slidebox(slideTo,autoPlay){
    var animSpeed=1000; //animation speed
    var easeType='easeInOutExpo'; //easing type
	var sliderWidth=$('#slidebox').width();
	var leftPosition=$('#slidebox .container').css("left").replace("px", "");
	if( !$("#slidebox .container").is(":animated")){
		if(slideTo=='next'){ //next
			if(autoPlay=='stop'){
				clearInterval(autoPlayTimer);
			}
			if(leftPosition==-slideboxTotalContent){
				$('#slidebox .container').animate({left: 0}, animSpeed, easeType); //reset
				$('#slidebox .thumbs a:first-child').removeClass('thumb').addClass('selected_thumb');
				$('#slidebox .thumbs a:last-child').removeClass('selected_thumb').addClass('thumb');
			} else {
				$('#slidebox .container').animate({left: '-='+sliderWidth}, animSpeed, easeType); //next
				$('#slidebox .thumbs .selected_thumb').next().removeClass('thumb').addClass('selected_thumb');
				$('#slidebox .thumbs .selected_thumb').prev().removeClass('selected_thumb').addClass('thumb');
			}
		} else if(slideTo=='previous'){ //previous
			if(autoPlay=='stop'){
				clearInterval(autoPlayTimer);
			}
			if(leftPosition=='0'){
				$('#slidebox .container').animate({left: '-'+slideboxTotalContent}, animSpeed, easeType); //reset
				$('#slidebox .thumbs a:last-child').removeClass('thumb').addClass('selected_thumb');
				$('#slidebox .thumbs a:first-child').removeClass('selected_thumb').addClass('thumb');
			} else {
				$('#slidebox .container').animate({left: '+='+sliderWidth}, animSpeed, easeType); //previous
				$('#slidebox .thumbs .selected_thumb').prev().removeClass('thumb').addClass('selected_thumb');
				$('#slidebox .thumbs .selected_thumb').next().removeClass('selected_thumb').addClass('thumb');
			}
		} else {
			var slide2=(slideTo-1)*sliderWidth;
			if(leftPosition!=-slide2){
				clearInterval(autoPlayTimer);
				$('#slidebox .container').animate({left: -slide2}, animSpeed, easeType); //go to number
				$('#slidebox .thumbs .selected_thumb').removeClass('selected_thumb').addClass('thumb');
				var selThumb=$('#slidebox .thumbs a').eq((slideTo-1));
				selThumb.removeClass('thumb').addClass('selected_thumb');
			}
		}
	}
}
</script>


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
            <li> <a href="videos.php">Videos</a></li>
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
<div id="left_2">


<div id="slidebox">
<div class="next"></div>
<div class="previous"></div>
<div class="thumbs">
<a href="#" onClick="Slidebox('1');return false" class="thumb">1</a> 
<a href="#" onClick="Slidebox('2');return false" class="thumb">2</a> 
<a href="#" onClick="Slidebox('3');return false" class="thumb">3</a> 
<a href="#" onClick="Slidebox('4');return false" class="thumb">4</a> 

<?php /*?><?php
	$count=1;
	foreach($flash_array as $flash){
?>
<a  style="cursor:pointer;" onClick="Slideshow('<?php echo $flash['news_flash_ID'];?>');return false" class="thumb"><?php echo $count;?></a> 
<?php
	$count++;
}
?>
<?php */?></div>

	<div class="container">
    <!--<div class="content">
        	<div>
            
            <div id="cln">
            <div id="ltest_pic"><a href="news_details.html"><img src="img/letest_pic.jpg" /></a></div>
            <div id="text_box"><h2><a href="news_details.html">fsdfsdfnsd bfjbhsdfjdshb</a></h2>
            <p>sdgsdgsgsdgsdgsdg kjsdb jhgbdsbhj</p></div>
            </div>
            
            </div>
        </div><div class="content">
        	<div>
            
            <div id="cln">
            <div id="ltest_pic"><a href="news_details.html"><img src="img/letest_pic.jpg" /></a></div>
            <div id="text_box"><h2><a href="news_details.html">fsdfsdfnsd bfjbhsdfjdshb</a></h2>
            <p>sdgsdgsgsdgsdgsdg kjsdb jhgbdsbhj</p></div>
            </div>
            
            </div>
        </div><div class="content">
        	<div>
            
            <div id="cln">
            <div id="ltest_pic"><a href="news_details.html"><img src="img/letest_pic.jpg" /></a></div>
            <div id="text_box"><h2><a href="news_details.html">fsdfsdfnsd bfjbhsdfjdshb</a></h2>
            <p>sdgsdgsgsdgsdgsdg kjsdb jhgbdsbhj</p></div>
            </div>
            
            </div>
        </div>-->
    <div id="div_news_flash">
    <?php 
		foreach ($flash_array as $flash){
			$news_row=$class->getRowByID('news','news_ID',$flash['news_ID'],$condition='');
		?>
        <div class="content">
        	<div>
            
            <div id="cln">
            <div id="ltest_pic"><a href="details.php?n=<?php echo $flash['news_ID'];?>"><img src="uploads/news_flash/<?php echo $flash['news_flash_image'];?>" /></a></div>
            <div id="text_box"><h2><a href="details.php?n=<?php echo $flash['news_ID'];?>"><?php echo $news_row['news_title'];?></a></h2>
            <p><?php echo $news_row['news_desc'];?></p></div>
            </div>
            
            </div>
        </div>
    	<!--<div class="content">
        	<div>
            
            <div id="cln">
            <div id="ltest_pic"><a href="details.php?n=<?php echo $flash['news_ID'];?>"><img src="uploads/news_flash/<?php echo $flash['news_flash_image'];?>" /></a></div>
            <div id="text_box"><h2><a href="details.php?n=<?php echo $flash['news_ID'];?>"><?php echo $news_row['news_title'];?></a></h2>
            <p><?php echo $news_row['news_desc'];?></p></div>
            </div>
            
            </div>
        </div>-->
        <?php
			}
			?>
            </div>
        
        
        
	</div>
</div>


<div id="cln_10"></div>
<div id="cln_10"></div>



<?php
$count=1;
foreach($news_array as $row){
	if($count == 1){	
		echo '<div id="ltst_lft">';
	}
	 if($count ==7){
		echo '</div><div id="ltst_rgt">';
	}
		
?>

<div id="cln">
<h2><a href="details.php?n=<?php echo $row['news_ID'];?>"><?php echo $row['news_title'];?></a></h2>
<div id="news_pic"><?php echo $row['news_thumb_image'];?><a href="details.php?n=<?php echo $row['news_ID'];?>"><img src="uploads/news_thumb/<?php echo $row['news_thumb_image'];?>"></a></div>
<div id="ltst_news"><p>	<?php echo $row['news_desc'];?></p></div>
</div>


<div id="cln_10"></div>
<div id="cln_10"></div>

<?php
	$count++;
	}
	?>



</div>





<!--<div id="ltst_rgt">


<div id="cln">
<h2><a href="details.php">jfjfdhiutgfksdf</a></h2>
<div id="news_pic"><a href="details.php"><img src="img/news_pic.png"></a></div>
<div id="ltst_news"><p>	ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....</p></div>
</div>


<div id="cln_10"></div>
<div id="cln_10"></div>



<div id="cln">
<h2><a href="details.php">jfjfdhiutgfksdf</a></h2>
<div id="news_pic"><a href="details.php"><img src="img/news_pic.png"></a></div>
<div id="ltst_news"><p>	ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....</p></div>
</div>


<div id="cln_10"></div>
<div id="cln_10"></div>


<div id="cln">
<h2><a href="#">jfjfdhiutgfksdf</a></h2>
<div id="news_pic"><a href="#"><img src="img/news_pic.png"></a></div>
<div id="ltst_news"><p>	ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....</p></div>
</div>


<div id="cln_10"></div>
<div id="cln_10"></div>



<div id="cln">
<h2><a href="#">jfjfdhiutgfksdf</a></h2>
<div id="news_pic"><a href="#"><img src="img/news_pic.png"></a></div>
<div id="ltst_news"><p>	ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....</p></div>
</div>


<div id="cln_10"></div>
<div id="cln_10"></div>



<div id="cln">
<h2><a href="#">jfjfdhiutgfksdf</a></h2>
<div id="news_pic"><a href="#"><img src="img/news_pic.png"></a></div>
<div id="ltst_news"><p>	ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....</p></div>
</div>


<div id="cln_10"></div>
<div id="cln_10"></div>



<div id="cln">
<h2><a href="#">jfjfdhiutgfksdf</a></h2>
<div id="news_pic"><a href="#"><img src="img/news_pic.png"></a></div>
<div id="ltst_news"><p>	ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....</p></div>
</div>


<div id="cln_10"></div>
<div id="cln_10"></div>



<div id="cln">
<h2><a href="#">jfjfdhiutgfksdf</a></h2>
<div id="news_pic"><a href="#"><img src="img/news_pic.png"></a></div>
<div id="ltst_news"><p>	ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....</p></div>
</div>



</div>-->








</div>


<div id="rgt">
<?php
	foreach($right_adv as $row){ 
	?>
<div id="cln"><img src="uploads/home_right_adv/<?php echo $row['adv_image'];?>" /></div>
<div id="cln_10"></div>
<?php
	}
	?>
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
