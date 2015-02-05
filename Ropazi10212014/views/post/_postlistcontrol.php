<?php include_once("classes/helpers/webincludes.php"); ?>


<?php  $i = 0;?>
<?php foreach ($posts as $post) { 
$i++;
	?>

	<div class="item">
                <div class="outercontainer">
                    <div class="content-large-image container-position">
                        <div class="overlay-wrapper" onclick="javascript:showmodal('/post/postlightboxget/<?php echo $post->getPostID()?>', '5');return false;">
                            <div id="overlay-top-part<?php echo $i?>" class="overlay-top-part">
                                <div class="overlay-opacity">
                                </div>
                                <div id="overlay-icons<?php echo $post->getPostID()?>" class="overlay-icons">
                                    <a href="#2">
                                    <?php if ($post->getClippedByUser() > 0) { 
                                    	echo '<img class="content-picture" src="/content/images/overlay-scissor-hover.png"  onclick="event.stopPropagation();return false;" />';
                                    	
									} else {
										echo '<img class="content-picture" src="/content/images/overlay-scissor.png"  onclick="javascript:showCatalogs(\'' . $post->getPostID() .'\');event.stopPropagation();return false;" onmouseover="(function(obj){obj.src=\'/content/images/overlay-scissor-hover.png\';})(this);"  onmouseout="(function(obj){obj.src=\'/content/images/overlay-scissor.png\';})(this);" />';
									}
									?>
                                    </a>
                                    <a href="#1">
                                    <?php if ($post->getHeartByUser() > 0) { 
                                        echo '<img  onclick="javascript:event.stopPropagation();return false;" class="content-picture" src="/content/images/overrelay-heart-hover.png" />';
									} else {
										echo '<img  onclick="javascript:HeartPost(\'' .  $post->getPostID() . '\');event.stopPropagation();return false;" class="content-picture" src="/content/images/overrelay-heart.png" onmouseover="(function(obj){obj.src=\'/content/images/overrelay-heart-hover.png\';})(this);"  onmouseout="(function(obj){obj.src=\'/content/images/overrelay-heart.png\';})(this);" />';
									}?>
                                    </a>
                                </div>
								<div id="usercatalog<?php echo $post->getPostID()?>"></div>
                            </div>
                            <div class="overlay-text">
                                <?php echo $post->getTitle() ?><span class="darker-text" style="cursor:pointer;" onclick="javascript:location.href='/brand/home/<?php echo $post->getBrandID() ?>';event.stopPropagation();return false;">&nbsp;by&nbsp;<?php echo $post->getBrandName() ?></span>
                            </div>
                        </div>
                        <div class="content-image">
                            <img class="content-picture" src="/uploads/<?php echo $post->getLocalImageUrl() ?>" />
                        </div>
                    </div>
                    <div class="content-price-panel" >
                        <a class="large-8 small-8 columns price-9 no-padding">
                            <div class="padding-inner" id="div-price<?php echo $i?>">
                                <img id="brand-img<?php echo $i?>" style="cursor:pointer;" onclick="javascript:location.href='/brand/home/<?php echo $post->getBrandID() ?>';event.stopPropagation();return false;" src="/content/images/brand/<?php echo $post->getBrandLogo()?>_small.png"" />
                                <span class="price" style="cursor:pointer;" onclick="javascript:window.open('<?php echo $post->getPostURL()?>');event.stopPropagation();return false;"><?php echo sprintf("$%.0d", $post->getPrice())?><span class="buy">&nbsp;&nbsp;Buy</span></span>
                            </div>
                        </a>
                        <div class=" large-4 small-4 columns padding-inner-2 no-padding">
                            <div class="right-imgs-child">
                                <?php if ($post->getClippedByUser() > 0) {
                        	echo  '<a id="link_clips_' . $post->getPostID() . '" class="clipping_sci_active" href="javascript:void(0)"><span id="clips_' . $post->getPostID() . '">' . $post->getClips() . '</span></a>';
                        }
                        else {
							echo '<a id="link_clips_' . $post->getPostID() . '" class="clipping_sci" href="javascript:void(0)"><span id="clips_' . $post->getPostID() . '">' . $post->getClips() .'</span></a>';
						}
                        ?>
                        <?php if ($post->getHeartByUser() > 0) {
                        	echo  '<a id="link_hearts_' . $post->getPostID() . '" class="clipping_heart_active" href="javascript:void(0)"><span id="hearts_' . $post->getPostID() . '">' . $post->getHearts() . '</span></a>';
                        }
                        else {
							echo '<a id="link_hearts_' . $post->getPostID() . '" class="clipping_heart" href="javascript:void(0)"><span id="hearts_' . $post->getPostID() . '">' . $post->getHearts() .'</span></a>';
						}
                        ?>      
                            </div>
                        </div>
                    </div>
                    <div id="user-panel<?php echo $i?>" class="content-clipping-panel" style="cursor:pointer;" onclick="javascript:location.href='/appuser/userclipping/<?php echo $post->getPosterAppUserID() ?>';event.stopPropagation();return false;">
                        <div class=" large-2 small-4 columns" style="padding-left: 5px;">
                        			<?php if (strlen($post->getUserProfileImage()) > 0) {
				                		echo '<img src="/uploads/users/' . $post->getUserProfileImage() . '_small.jpg" height="25" width="25" />';
				                	} else {
				                    	echo '<img src="/content/images/content-profilepic.png" />';
				                    }
				                    ?>
                            
                        </div>
                        <div class="large-10 small-8 columns last-img">
                            <span>Clipped by <strong><?php echo $post->getUsername() ?></strong>
                                <br />
                                <span class="bottom-txt">
                                
                                <?php 
                                if (strlen($post->getCategoryName()) > 0) {
	                                if ($post->getItemGender() == "M") {
	                                	echo 'Boys ';
	                                }
                                	else if ($post->getItemGender() == "F") {
										echo 'Girls ';
									}
                                	echo $post->getCategoryName(); 
                                
                                }
                                ?>
                                
                                
                                </span></span>
                        </div>
                    </div>
                </div>
            </div>
            
 <?php } ?>

  	
        