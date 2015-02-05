
<div id="container" class="banner-row">
        <?php 
        $appUser = $this->model;
        $mode = "Following";
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
                    <span class="header-selector-grid grid"></span><a id="grd-view" class=" header-selector-grid list" href="/appuser/userfollowing/<?php echo $appUser->getAppUserID();?>"></a>
                    </span>
                </div>
                <?php 
						$appusers = $this->submodels[3];
						require("views/appuser/_appusersgridcontrol.php");
	
				?>
            </div>
        </div>
    </div>
