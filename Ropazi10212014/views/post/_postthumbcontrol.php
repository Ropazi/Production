<div class="ropazi-section-lightbox small-section">
	<div class="section-header dark-text"><span><?php echo $title ?></span></div>
	<div class="nano section-content">
		<div class="nano-content">
		<div class="thumbs">
		<?php 
			foreach ($thumbPosts as $post) {
				echo '<img src="/uploads/thumb_' . $post->getLocalImageURL() . '" style="cursor:pointer;"  onclick="javascript:showmodal(\'/post/postlightboxget/' . $post->getPostID() . '\', \'5\');return false;"/>';
			} 

		?>
			
		</div>
		</div>
	</div>
</div>