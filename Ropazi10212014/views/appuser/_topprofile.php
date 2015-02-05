<div id="top-profile" class="row">
            <div class="large-7 columns no-padding">
                <div id="profile-large-pic">
                	<?php if (strlen($appUser->getProfileImage()) > 0) {
                		echo '<img src="/uploads/users/' . $appUser->getProfileImage() . '_big.jpg" />';
                	} else {
                    	echo '<img src="/content/images/pic.png" />';
                    }
                    ?>
                </div>
                <div id="profile-content">
                    <div id="profiler-name">
                        <?php if ($appUser->getHeartedByUser() > 0) {
                        	echo '<img id="userheartimg" src="/content/images/heart-dark.png" style="cursor:pointer;" onclick="javascript:FollowUser(\'' .$appUser->getAppUserID() . '\');return false;">&nbsp;';
                        }
                        else {
							echo '<img id="userheartimg" src="/content/images/grid-heart.png" style="cursor:pointer;" onclick="javascript:FollowUser(\'' .$appUser->getAppUserID() . '\');return false;">&nbsp;';
                        }
                        ?>
                        
                        <?php echo $appUser->getFirstName() . " " . $appUser->getLastName() ?></div>
                    <div id="profiler-content" class="pad-top-5">
                        <?php echo $appUser->getAboutMe() ?></div>
                    <div id="profiler-message" class="pad-top-10">
                        Message: <a href="javascript:void(0)">@<?php $appUser->getUsername() ?></a></div>
                    <div id="profiler-onweb">
                        On the Web: <a href="javascript:void(0)">My Blog</a>
                        <img src="/content/images/fb.png" />
                        <img src="/content/images/twitter.png" />
                    </div>
                </div>
            </div>
            <div class="large-5 columns no-padding">
                <a id="clippings" <?php if ($mode == "Clippings") {echo 'class="circle-active"';}else{echo 'class="not-active"';}?> href="/appuser/userclipping/<?php echo $appUser->getAppUserID() ?>">
                    <?php echo $appUser->getClips() ?> <br/> Clippings</a>
                <a id="followers" <?php if ($mode == "Followers") {echo 'class="circle-active"';}else{echo 'class="not-active"';}?> href="/appuser/userfollower/<?php echo $appUser->getAppUserID() ?>">
                    <?php echo $appUser->getFollowers() ?> <br/> Followers</a>
                <a id="following" <?php if ($mode == "Following") {echo 'class="circle-active"';}else{echo 'class="not-active"';}?> href="/appuser/userfollowing/<?php echo $appUser->getAppUserID() ?>">
                    <?php echo $appUser->getFollowing() ?> <br/>Following</a>
            </div>
        </div>