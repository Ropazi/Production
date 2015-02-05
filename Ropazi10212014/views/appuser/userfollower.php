
<div id="container" class="banner-row">
        <?php 
        $appUser = $this->model;
        $mode = "Followers";
        require("views/appuser/_topprofile.php");
        ?>
        <div id="middle-content" class="row">
            <div class="large-3 columns no-padding">
            	<?php 
            		$appusers = $this->submodels[1];
            		require("views/appuser/_whotofollow.php");
            	?>
            
            
                <?php 
						$thumbPosts = $this->submodels[2];
						$title = "Recent Clips By Followers";
						require("views/post/_postthumbcontrol.php");
	
				?>
            </div>
            <div class=" large-9 small-12 columns no-right-padding list-view-display ">
                <div class=" large-12 small-12 columns no-right-padding">
                    <a id="lst-view" class="header-selector-list grid" href="/appuser/userfollowergrid/<?php echo $appUser->getAppUserID();?>"></a><span class=" header-selector-list list">
                    </span>
                </div>
                <?php 
						$appusers = $this->submodels[3];
						require("views/appuser/_appuserslistcontrol.php");
	
				?>
            </div>
        </div>
    </div>
