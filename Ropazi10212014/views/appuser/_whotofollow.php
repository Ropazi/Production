<div id="whotofollow">
				
				<div class="ropazi-section small-section">
                    <div class="section-header dark-text">
                        <span>Who to Follow</span></div>
                    <div class="nano section-content has-scrollbar" style="height: 225px;">
                        <div class="nano-content" tabindex="0" style="right: -17px;">
                            <div class="leftp-content-box">
                                
                                <?php foreach ($appusers as $appuser) { ?>
                                <div class="custom-panel">
                                    <?php if ($appuser->getHeartedByUser() > 0) {
			                        	echo '<img id="userheartimgf_' . $appuser->getAppUserID() . '" src="/content/images/dark-heart.png" style="cursor:pointer;" onclick="javascript:FollowUser4(\''. $appuser->getAppUserID() . '\');"/>';
			                        } else {
										echo '<img id="userheartimgf_' . $appuser->getAppUserID() . '" src="/content/images/light-heart.png" style="cursor:pointer;" onclick="javascript:FollowUser4(\''. $appuser->getAppUserID() . '\');"/>';
									}
									?>
                                    
                                    <?php if (strlen($appuser->getProfileImage()) > 0) {
				                		echo '<img src="/uploads/users/' . $appuser->getProfileImage() . '" height="25" width="25" />';
				                	} else {
				                    	echo '<img src="/content/images/pic-sml1.png">';
				                    }
				                    ?>
                                    
                                    <span class="inner-txt"><?php echo $appuser->getFirstName() . " " . $appuser->getLastName() ?><br>
                                        <span class="inner-txt-bottom">@<?php echo $appuser->getUsername() ?></span></span>
                                    <div class="right-imgs">
                                        <a href="javascript:void(0)">
                                            <img src="/content/images/clip_hover.png" /><span><?php echo $appuser->getClips() ?></span></a> <a href="javascript:void(0)">
                                                <img src="/content/images/clip2_hover.png" /><span><?php echo $appuser->getHearts() ?></span></a>
                                    </div>
                                </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                        <div class="nano-pane">
                            <div class="nano-slider" style="height: 174px; transform: translate(0px, 72px);">
                            </div>
                        </div>
                    </div>
                </div>
</div>