
<?php foreach ($appusers as $appuser) { ?>
<div class=" large-12 small-12 columns list-view">
                    <div class="large-5 columns list-pic-container no-padding">
                        <div>
                        <?php if (strlen($appuser->getProfileImage()) > 0) {
	                		echo '<img src="https://s3-us-west-2.amazonaws.com/ropazi-product-images/uploads/users/' . $appuser->getProfileImage() . '_big.jpg" height="59" width="61" />';
	                	} else {
	                    	echo '<img src="/content/images/large-pic1.png" />';
	                    }
	                    ?>
                            
                        </div>
                        <div>
                        <?php if ($appuser->getHeartedByUser() > 0) {
                        	echo '<img id="userheartimg_' .$appuser->getAppUserID() . '" src="/content/images/heart-dark.png" style="cursor:pointer;" onclick="javascript:FollowUser2(\''. $appuser->getAppUserID() . '\');"/>';
                        } else {
							echo '<img id="userheartimg_' .$appuser->getAppUserID() . '" src="/content/images/grid-heart.png" style="cursor:pointer;" onclick="javascript:FollowUser2(\''. $appuser->getAppUserID() . '\');"/>';
						}
						?>
                           
                        </div>
                        <div class="listview-txt">
                            <span><?php echo $appuser->getFirstName() . " " . $appuser->getLastName() ?><br>
                                <span class="ropazi-red">@<?php echo $appuser->getUsername() ?></span></span></div>
                    </div>
                    <div class="large-7 small-12 columns">
                        <div class="pad-top-5">
                            <?php echo $appuser->getAboutMe() ?></div>
                    </div>
                </div>
<?php } ?>