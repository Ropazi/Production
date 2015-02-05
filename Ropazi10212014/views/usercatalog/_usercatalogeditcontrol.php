<div class="overlay-item-clip">
		<div class="overlay-item-clip-header large-12 columns">
			<div class="overlay-item-clip-heading large-11 columns">Clip to...</div>
			<div class="overlay-item-clip-close-btn large-1 columns">X</div>
		</div>
		<div class="overlay-item-clip-form large-12 columns">
			<div class="overlay-item-clip-input large-10 columns"><input type="text" class="catalogname" value="" onclick="javascript:event.stopPropagation();return false;"/></div>
			<div class="overlay-item-clip-add-btn large-2 columns"><a href="#" onclick="javascript:ClipPost2(postid, $(this).parent().parent().find('input.catalogname').val());event.stopPropagation();return false;" onmouseover="javascript:$(this).css('color','red');" onmouseout="javascript:$(this).css('color', 'black');">+</a></div>
		</div>
		<div class="overlay-item-clip-options large-12 columns nano" style="height:60%;">
			<ul class="nano-content"  onclick="javascript:event.stopPropagation();return false;">
			<?php 
				if ($userCatalogs != NULL and sizeof($userCatalogs) > 0) {
					foreach ($userCatalogs as $userCatalog) {
			?>
				<li style="cursor:pointer;" onclick="javascript:$('input.catalogname').val($(this).text());event.stopPropagation();return false;"><a href="javascript:void(0);"><?php echo $userCatalog->getCatalogName() ?></a></li>
					<?php } ?>
			<?php } ?>
			</ul>
		</div>
</div>
