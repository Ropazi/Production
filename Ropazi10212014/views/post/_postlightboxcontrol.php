<?php include_once("classes/helpers/webincludes.php"); ?>
<?php include_once("views/post/_postcommenthelper.php"); ?>
		<script>
			$(document).ready(function() { 
				$(".nano").nanoScroller();
			});
			function addComment(){
				$.ajax({
		            type: "POST",
		            url: "/postcomment/createpostcommentpost",
		            dataType: "json",
		            data: "Comments=" + $('#input-comment').val() + "&AppUserID=" + $('#AppUserID').val() + "&PostID=" + $('#PostID').val(),
		            success: commentSuccess
		        });
			}
			function commentSuccess(result) {
				if (result.code == '204') {
			        $('#commentContainer').html(result.data);
			        
			    }
			}
			function addHeart(){
				$.ajax({
		            type: "POST",
		            url: "/postheart/createpostheartpost",
		            dataType: "json",
		            data: "AppUserID=" + $('#AppUserID').val() + "&PostID=" + $('#PostID').val(),
		            success: heartSuccess
		        });
			}
			function heartSuccess(result) {
				if (result.code == '204') {
			        $('#heart-container').removeClass('heart-container');
			        $('#heart-container').addClass('heart-container-dark');
			        $('#heart-container').text(result.data);
			        
			    }
			}
			function addClip(){
				$.ajax({
		            type: "POST",
		            url: "/userpost/createuserpostpost",
		            dataType: "json",
		            data: "AppUserID=" + $('#AppUserID').val() + "&PostID=" + $('#PostID').val(),
		            success: clipSuccess
		        });
			}
			function clipSuccess(result) {
				if (result.code == '204') {
					$('#clip-container').removeClass('clip-container');
			        $('#clip-container').addClass('clip-container-dark');
			        $('#clip-container').text(result.data);
			        
			    }
			}
		</script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=334544940055673&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<script>!function(d,s,id){
			var js,fjs=d.getElementsByTagName(s)[0];
			if(!d.getElementById(id)){
				js=d.createElement(s);js.id=id;
			js.src="https://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js,fjs);
			}
			}(document,"script","twitter-wjs");
		</script>
		<input type="hidden" name="AppUserID" id="AppUserID" value="<?php echo $this->model->getAppUserID() ?>" />
		<input type="hidden" name="PostID" id="PostID" value="<?php echo $this->model->getPostID() ?>" />
		<input type="hidden" name="BrandID" id="BrandID" value="<?php echo $this->model->getBrandID() ?>" />
		<div>
		<div id="contentWrapper" class="row">
			<div id="mainContent-lightbox" class="large-12 small-12 columns" style="margin:0px 0 0 1px;">
				<div id="mainContentLeft" class="large-9 small-9 columns clear-padding-margin" >
					<div class="row clear-padding-margin">
						<div class="large-12 columns ropazi-section-lightbox">
							<div class="large-9 columns clear-padding-margin">
								<div id="enlarged-view">
									<img src="/uploads/large_<?php echo $this->model->getLocalImageURL()?>" />
								</div>
								<div id="enlarged-description">
									<p>Clipped by <span class="dark-text" style="cursor:pointer;" onclick="javascript:location.href='/appuser/userclipping/<?php echo $post->getPosterAppUserID() ?>';event.stopPropagation();return false;"><?php echo $this->model->getUsername()?></span> from <span class="dark-text"  style="cursor:pointer;" onclick="javascript:location.href='/brand/home/<?php echo $post->getBrandID() ?>';event.stopPropagation();return false;"><?php echo $this->model->getBrandName()?></span> 2 days ago.</p>
									<div class="row clear-padding-margin">
										<div class="large-12 columns clear-padding-margin" >
											<div class="large-2 columns clear-padding-margin" >
												<img   style="cursor:pointer;" onclick="javascript:location.href='/brand/home/<?php echo $post->getBrandID() ?>';event.stopPropagation();return false;" src="/content/images/brand/<?php echo $this->model->getBrandLogo()?>_big.png" />
											</div>
											<div class="large-10 columns clear-padding-margin" >
												<p class="dark-text"><span id="description-header"><?php echo $this->model->getTitle()?></span><br />
												<?php echo $this->model->getDetailText()?></p>
											</div>
										</div>
										<div class="large-12 columns clear-padding-margin">
											<div id="show-more-wrapper">
												<div id="show-more">Show More</div>
												<div id="show-more-arrow"><img src="/content/images/down_arrow.png" /></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="mainContentRightStrip" class="large-3 small-12 columns clear-padding-margin">
								<div id="rightStrip-section1">
									<div id="product-price" class="dark-text"><span id="price-number"><?php echo $this->model->getPriceText()?></span></div>
									<div><a id="btn-buy" href="<?php echo $this->model->getPostURL()?>" target="_blank">Buy</a></div>
									<div id="from-text">from <span class="dark-text"><?php echo $this->model->getBrandName()?></span></div>
									<div id="clip-heart-section">
										<div id="clip-heart-wrapper">
											<?php if ($this->model->getClippedByUser() > 0) {
												echo '<div id="clip-container" class="clip-container-dark table-cell-style">' . $this->model->getClips() . '</div>';
											}
											else {
												echo '<div id="clip-container" class="clip-container table-cell-style" onclick="javascript:showCatalogs2(\'' . $this->model->getPostID() . '\');" style="cursor:pointer;">' .  $this->model->getClips() . '</div>';
											
											}
											?>
											<div id="clip-heart-separator"></div>
											<?php if ($this->model->getHeartByUser() > 0) {
												echo '<div id="heart-container" class="heart-container-dark table-cell-style">' . $this->model->getHearts() . '</div>';
											}
											else {
												echo '<div id="heart-container" class="heart-container table-cell-style" onclick="javascript:addHeart();" style="cursor:pointer;">' . $this->model->getHearts() . '</div>';
											
											}
											?>
											
										</div>
										<div id="usercataloglight<?php echo $post->getPostID()?>"></div>
									</div>
									<div id="share-wrapper">
										<div>Share with friends:</div>
										<div id="share-plugin-wrapper">
											<a><img src="/content/images/facebook_grayscale.png" onmouseover="(function(obj){obj.src='/content/images/facebook_color.png';})(this);"
                                            onmouseout="(function(obj){obj.src='/content/images/facebook_grayscale.png';})(this);"  /></a>
											<a href="https://twitter.com/share" data-lang="en"><img src="/content/images/twitter_grayscale.png" onmouseover="(function(obj){obj.src='/content/images/twitter_color.png';})(this);"
                                            onmouseout="(function(obj){obj.src='/content/images/twitter_grayscale.png';})(this);" /></a>
											<a><img src="/content/images/ropazi_grayscale.png" onmouseover="(function(obj){obj.src='/content/images/ropazi_color.png';})(this);"
                                            onmouseout="(function(obj){obj.src='/content/images/ropazi_grayscale.png';})(this);" /></a>
											<a><img src="/content/images/other_email_grayscale.png" onmouseover="(function(obj){obj.src='/content/images/other_email_color.png';})(this);"
                                            onmouseout="(function(obj){obj.src='/content/images/other_email_grayscale.png';})(this);" /></a>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="large-12 columns ropazi-section-lightbox" >
							<div id="comment-section">
								<p>Comments on <span class="dark-text"><?php echo $this->model->getTitle()?></span> from <span class="dark-text"  style="cursor:pointer;" onclick="javascript:location.href='/brand/home/<?php echo $post->getBrandID() ?>';event.stopPropagation();return false;"><?php echo $this->model->getBrandName()?></span></p>
								<div id="commentContainer">
								<?php 
									if (!array_key_exists(4, $this->submodels)){
										echo PostCommentHelper::ProductCommentThreadControl(NULL,$this->submodels[0]);
									}
									else {
										echo PostCommentHelper::ProductCommentThreadControl($this->submodels[4],$this->submodels[0]); 
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="mainContentRight" class="large-3 columns clear-padding-margin">
					<?php 
						$thumbPosts = $this->submodels[1];
						$title = "Related Posts";
						require("views/post/_postthumbcontrol.php");
	
					?>
					<?php 
						$thumbPosts = $this->submodels[2];
						$title = "Clipped by " . $this->model->getUsername();
						require("views/post/_postthumbcontrol.php");
						
	
					?>
					<?php 
						$thumbPosts = $this->submodels[3];
						$title = "More from " . $this->model->getBrandName();
						require("views/post/_postthumbcontrol.php");
	
					?>
					
					
					
				</div>
			</div>
		</div>
		</div>
		<script>
			$("#ropaziModal").on("opened", function() {
				$(".nano").nanoScroller();
		    });
		</script>
	