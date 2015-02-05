
<?php include_once("classes/helpers/webincludes.php"); ?>

<div class="ContainerGrid">
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div id="GridHeaderBrandCategorySelectionControl" class="GridHeaderContent">
			<table class="standardTableHeader">
				<tr class="HeaderRow">
					<td><div class="CellHeaderML" style="width:23px;">&nbsp;</div></td>
					<td><div class="CellHeaderML" title="Category Name" style="width:300px;">Category Name</div></td>
				</tr>
			</table>
		</div>
		<div id="GridContentBrandCategorySelectionControl" class="GridContent" onscroll="javascript:updateScroll(this,'GridHeaderBrandCategorySelectionControl');">
			<table class="standardTable">
				<?php $i = 0; ?>
				<?php foreach ($this->model->getList() as $_BrandCategory) { ?>
					<?php $i++; ?>
					<?php $TRow = "TableRow"; ?>
					<?php if ($i%2 == 0)
					{
						$TRow = "TableRow2";
					}
					?>
					
					<tr class="<?php echo $TRow ?>" onmouseover="javascript:this.className='AltRow';" onmouseout="javascript:this.className='<?php echo $TRow ?>';">
						<td><div class="CellItem" style="width:23px;"><?php echo ImageButtonHelper::ModalEditButton(Constants::$BASEPATH, $this->model->GetRequestState("UpdateTarget") . RequestStateHelper::CreateRequestState("BrandCategoryID", $_BrandCategory->getBrandCategoryID()), $this->model->GetRequestState("ModalIndex")) ?></div></td>
						<td><div class="CellItem" title="<?php echo $_BrandCategory->getName() ?>" style="width:300px;"><?php echo $_BrandCategory->getName() ?></div></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	<?php } ?>
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div class="GridFooter">
			<table class="standardTable">
				<tr>
					<td><?php echo ImageButtonHelper::Button("btnFirst", "First", "brandcategories", "First", "/content/images/first.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnPrev", "Previous", "brandcategories", "Previous", "/content/images/prev.gif") ?></td>
					<td><div class="demo" style="width:100px;"><div id="brandcategories_slider"></div></div></td>
					<td>&nbsp;&nbsp;Page&nbsp;<span id="brandcategories_slidertextbox"><?php echo $this->model->getCurrentPage() ?></span>&nbsp;of&nbsp;<span id="brandcategories_sldTotalPages"><?php echo $this->model->getTotalPages() ?></span></td>
					<td><?php echo ImageButtonHelper::Button("btnNext", "Next", "brandcategories", "Next", "/content/images/next.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnLast", "Last", "brandcategories", "Last", "/content/images/last.gif") ?></td>
				</tr>
			</table>
		</div>
	<?php } ?>
</div>
<?php if ($this->model->getTotalCount() > 0) { ?>
	<script type="text/javascript">
	$(document).ready(function () {
		$('#brandcategories_RecordsDisplay').show();
		$('#brandcategories_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');
		$('#brandcategories_StartRecord').text('<?php echo $this->model->getStartRecord() ?>');
		$('#brandcategories_EndRecord').text('<?php echo $this->model->getEndRecord() ?>');
		$('#brandcategories_hdnTotalPages').val('<?php echo $this->model->getTotalPages() ?>');
		$('#brandcategories_hdnPageIndex').val('<?php echo $this->model->getPageIndex() ?>');
		
		$('#brandcategories_slider').slider();
		$('#brandcategories_slider').slider('option', 'min', 1);
		$('#brandcategories_slider').slider('option', 'max', <?php echo $this->model->getTotalPages() ?>);
		$('#brandcategories_slider').slider('option', 'value', <?php echo $this->model->getCurrentPage() ?>);
		$('#brandcategories_slider').bind('slidechange', function (event, ui) { if (ui.value > $('#brandcategories_hdnTotalPages').val()) {return;}$('#brandcategories_slidertextbox').text(ui.value);$('#brandcategories_hdnPageIndex').val(parseInt(ui.value)-1);$('#brandcategoriesSearchForm').submit(); });
		$('#brandcategories_slider').bind('slide', function (event, ui) { $('#brandcategories_slidertextbox').text(ui.value); });
	});
	</script>
<?php } else { ?>
	<script type="text/javascript">
	$(document).ready(function () {$('#brandcategories_RecordsDisplay').hide();$('#brandcategories_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');});
	</script>
<?php } ?>
