<?php include_once("classes/uihelpers/posthelper.php");  ?>
<?php $i = 1; $css = "";?>
<?php foreach ($appusers as $appuser) { ?>
<?php if ($i % 2 == 0) {
	$css = " margin-left";
}
else {
	$css = "";
}
	?>
<div class=" large-6 small-12 columns grid-view<?php echo $css;?>">
                    <div class="grid-pic-container">
                    	<?php if (strlen($appuser->getProfileImage()) > 0) {
	                		echo '<img src="https://s3-us-west-2.amazonaws.com/ropazi-product-images/uploads/users/' . $appuser->getProfileImage() . '_small.jpg" height="41" width="42" />';
	                	} else {
	                    	echo '<img src="/content/images/pic2.png" />';
	                    }
	                    ?>
                        
                        <a href="javascript:void(0)">
                            <img src="/content/images/clip_hover.png"><span><?php echo $appuser->getClips(); ?></span></a> <a href="javascript:void(0)">
                                <img src="/content/images/clip2_hover.png"><span><?php echo $appuser->getHearts(); ?></span></a>
                    </div>
                    <div class="grid-txt-container">
                        <div class="header">
                            <span class="inner-txt"><?php echo $appuser->getFirstName() . " " . $appuser->getLastName() ?><br>
                                <span class="ropazi-red">@<?php echo $appuser->getUsername() ?></span></span>
                        <?php if ($appuser->getHeartedByUser() > 0) {
                        	echo '<img id="userheartimgg_' . $appuser->getAppUserID() . '" src="/content/images/grid-heart-small-dark.png" style="cursor:pointer;" onclick="javascript:FollowUser3(\''. $appuser->getAppUserID() . '\');"/>';
                        } else {
							echo '<img id="userheartimgg_' . $appuser->getAppUserID() . '" src="/content/images/grid-heart-small.png" style="cursor:pointer;" onclick="javascript:FollowUser3(\''. $appuser->getAppUserID() . '\');"/>';
						}
						?>
                        </div>
                        <div class="prof-txt">
                            <?php echo $appuser->getAboutMe() ?><span class="ropazi-red"> See Full Bio</span></div>
                        <div class="grid-pics-container">
                            <?php echo PostHelper::getUserPosts($appuser->getAppUserID());?>
                       </div>
                    </div>
                </div>
<?php $i++;?>
<?php } ?>