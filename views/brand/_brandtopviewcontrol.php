<div class="row" id="top-profile">
            <div class="large-7 columns no-padding">
                <div id="profile-large-pic">
                    <img src="/content/images/brand/<?php echo $this->model->getBrandLogo()?>_big.png" />
                </div>
                <div id="profile-content">
                    <div id="profiler-name" style="cursor:pointer;">
                    <?php if ($this->model->getHeartByUser() > 0) {
                        	echo '<img id="brandheartimg" src="/content/images/heart-dark.png" style="cursor:pointer;" onclick="javascript:HeartBrand(\'' . $this->model->getBrandID() . '\');return false;">&nbsp;' . $this->model->getBrandName() . '</div>';
                        }
                        else {
							echo '<img id="brandheartimg" src="/content/images/grid-heart.png" style="cursor:pointer;" onclick="javascript:HeartBrand(\'' . $this->model->getBrandID() . '\');return false;">&nbsp;' . $this->model->getBrandName() . '</div>';
                        }
                        ?>
                    <div class="pad-top-5" id="profiler-content">
                        <?php echo $this->model->getAboutBrand() ?></div>
                    <div class="pad-top-10" id="profiler-message">
                        Message: <a href="javascript:void(0)">@<?php echo $this->model->getBrandCode() ?></a></div>
                    <div id="profiler-onweb">
                        On the Web: <a href="javascript:void(0)"><?php echo $this->model->getWebsite() ?></a>
                        <img src="/content/images/fb.png">
                        <img src="/content/images/twitter.png">
                    </div>
                </div>
            </div>
            <div class="large-5 columns no-padding">
                <a class="circle-active" id="clippings"><?php echo $this->model->getClips() ?>
                    <br />
                    Clippings</a> <a class="not-active" id="brand_followers_<?php echo $this->model->getBrandID() ?>"><?php echo $this->model->getFollowers() ?> Followers</a>
            </div>
        </div>
 </div>