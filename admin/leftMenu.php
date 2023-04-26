<div id="navBar">
		<div id="sectionLinks">
			<ul>
            <?php if($current_tab=='news'){?>
            			<li><a href="createNews.php?current_tab=news">CREATE</a></li>
                        <li><a href="viewNews.php?current_tab=news">VIEW/EDIT</a></li>
             <?php }
			 		else if($current_tab=='adv'){
			 		?>
						<li><a href="createHomeRightAdv.php?current_tab=adv">ADD RIGHT SIDE ADVERTISEMENTS</a></li>
                        <li><a href="viewHomeRightAdv.php?current_tab=adv">VIEW/EDIT</a></li>
                       
				<?php
						}
						else if($current_tab=='home'){
					
					?>
                    		<li><a href="createIndexFlash.php?current_tab=home">CREATE HOME PAGE FLASH</a></li>
                    		<li><a href="indexFlash.php?current_tab=home">HOME PAGE FLASH</a></li>
                    		 <li><a href="viewIndexRightAdv.php?current_tab=home">HOME PAGE TOP RIGHT ADVERTISEMENT</a></li>
                             <li><a href="indexNews.php?current_tab=home">HOME PAGE NEWS</a></li>
                             
                     <?php
					 	}
						else if($current_tab=='banner'){
						?>
                         <li><a href="createBanner.php?current_tab=banner">ADD RIGHT/LEFT  BANNER</a></li>
                        <li><a href="viewBanner.php?current_tab=banner">VIEW/EDIT RIGHT/LEFT  BANNER</a></li>
                        <li><a href="viewTopBanner.php?current_tab=banner">VIEW/EDIT TOPS BANNERS</a></li>
                        <?php
						}
						?>
			</ul>
		</div>
 </div>