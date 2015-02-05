<?php include_once("classes/helpers/webincludes.php"); ?>
<script type="text/javascript">
$(window).scroll(function() {
	  // Modify to adjust trigger point. You may want to add content
	  // a little before the end of the page is reached. You may also want
	  // to make sure you can't retrigger the end of page condition while
	  // content is still loading.
	  if ($(window).scrollTop() == $(document).height() - $(window).height()) {
	    loadMoreContentUser();
	  }
	});
$(window).load(function() {
	var columns = 4,
    setColumns = function () { columns = $(window).width() > 640 ? 4 : $(window).width() > 320 ? 2 : 1; };

    setColumns();
    $(window).resize(setColumns);

    $('#item-list').masonry(
	{
	    itemSelector: '.item',
	    columnWidth: function (containerWidth) { return containerWidth / columns; }
	});
});
</script>
<input type="hidden" id="hdnPageIndex" value="0" />
<input type="hidden" id="PosterID" value ="<?php echo $this->model->getAppUserID() ?>" />
<div id="container" class="banner-row">
        <?php 
        $appUser = $this->model;
        $mode = "Clippings";
        require("views/appuser/_topprofile.php");
        ?>
        
        <div id="usercatalog" style="display:none;">
			<?php
				if ($this->submodels != NULL && sizeof($this->submodels)>0){ 
					$userCatalogs = $this->submodels[2];
				} 
				else {
					$userCatalogs = NULL;
				}
			?>
			<?php require("views/usercatalog/_usercatalogeditcontrol.php") ?>
		</div>
        
        <div class="row">
        <div id="item-list">
        <?php 
        $posts = $this->submodels[1];
        require("views/post/_postlistcontrol.php"); 
        
        ?>
        </div>
  </div>
 </div>
