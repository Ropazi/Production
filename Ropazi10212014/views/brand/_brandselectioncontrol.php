
<?php include_once("classes/helpers/webincludes.php"); ?>

<div class="ContainerGrid">
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div id="GridHeaderBrandSelectionControl" class="GridHeaderContent">
			<table class="standardTableHeader">
				<tr class="HeaderRow">
					<td><div class="CellHeaderML" title="Brand Name" style="width:150px;">Brand Name</div></td>
					<td><div class="CellHeaderML centered" title="Code" style="width:100px;">Code</div></td>
					<td><div class="CellHeaderML centered" title="Website" style="width:100px;">Website</div></td>
					<td><div class="CellHeaderML centered" title="Approve?" style="width:100px;">Approve?</div></td>
					<td><div class="CellHeaderML centered" title="Date Created" style="width:100px;">Date Created</div></td>
					<td><div class="CellHeaderML centered" title="Last Updated" style="width:100px;">Last Updated</div></td>
					<td><div class="CellHeaderML centered" title="Customer Tier" style="width:100px;">Customer Tier</div></td>
					<td><div class="CellHeaderML centered" title="Featured?" style="width:100px;">Featured?</div></td>
				</tr>
			</table>
		</div>
		<div id="GridContentBrandSelectionControl" class="GridContent" onscroll="javascript:updateScroll(this,'GridHeaderBrandSelectionControl');">
			<table class="standardTable">
				<?php $i = 0; ?>
				<?php foreach ($this->model->getList() as $_Brand) { ?>
					<?php $i++; ?>
					<?php $TRow = "TableRow"; ?>
					<?php if ($i%2 == 0)
					{
						$TRow = "TableRow2";
					}
					?>
					
					<tr class="<?php echo $TRow ?>" onmouseover="javascript:this.className='AltRow';" onmouseout="javascript:this.className='<?php echo $TRow ?>';">
						<td><div class="CellItem" title="<?php echo $_Brand->getBrandName() ?>" style="width:150px;"><?php echo $_Brand->getBrandName() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_Brand->getBrandCode() ?>" style="width:100px;"><?php echo $_Brand->getBrandCode() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_Brand->getWebsite() ?>" style="width:100px;"><?php echo $_Brand->getWebsite() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_Brand->getIsApproved() ?>" style="width:100px;"><?php echo $_Brand->getIsApproved() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo LabelHelper::ShortDateLabelForGrid($_Brand->getCreateDate()) ?>" style="width:100px;"><?php echo LabelHelper::ShortDateLabelForGrid($_Brand->getCreateDate()) ?></div></td>
						<td><div class="CellItem centered" title="<?php echo LabelHelper::ShortDateLabelForGrid($_Brand->getLastUpdateDate()) ?>" style="width:100px;"><?php echo LabelHelper::ShortDateLabelForGrid($_Brand->getLastUpdateDate()) ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_Brand->getTier() ?>" style="width:100px;"><?php echo $_Brand->getTier() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_Brand->getIsFeatured() ?>" style="width:100px;"><?php echo $_Brand->getIsFeatured() ?></div></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	<?php } ?>
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div class="GridFooter">
			<table class="standardTable">
				<tr>
					<td><?php echo ImageButtonHelper::Button("btnFirst", "First", "searchbrands", "First", "/content/images/first.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnPrev", "Previous", "searchbrands", "Previous", "/content/images/prev.gif") ?></td>
					<td><div class="demo" style="width:100px;"><div id="searchbrands_slider"></div></div></td>
					<td>&nbsp;&nbsp;Page&nbsp;<span id="searchbrands_slidertextbox"><?php echo $this->model->getCurrentPage() ?></span>&nbsp;of&nbsp;<span id="searchbrands_sldTotalPages"><?php echo $this->model->getTotalPages() ?></span></td>
					<td><?php echo ImageButtonHelper::Button("btnNext", "Next", "searchbrands", "Next", "/content/images/next.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnLast", "Last", "searchbrands", "Last", "/content/images/last.gif") ?></td>
				</tr>
			</table>
		</div>
	<?php } ?>
</div>
<?php if ($this->model->getTotalCount() > 0) { ?>
	<script type="text/javascript">
	$(document).ready(function () {
		$('#searchbrands_RecordsDisplay').show();
		$('#searchbrands_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');
		$('#searchbrands_StartRecord').text('<?php echo $this->model->getStartRecord() ?>');
		$('#searchbrands_EndRecord').text('<?php echo $this->model->getEndRecord() ?>');
		$('#searchbrands_hdnTotalPages').val('<?php echo $this->model->getTotalPages() ?>');
		$('#searchbrands_hdnPageIndex').val('<?php echo $this->model->getPageIndex() ?>');
		
		$('#searchbrands_slider').slider();
		$('#searchbrands_slider').slider('option', 'min', 1);
		$('#searchbrands_slider').slider('option', 'max', <?php echo $this->model->getTotalPages() ?>);
		$('#searchbrands_slider').slider('option', 'value', <?php echo $this->model->getCurrentPage() ?>);
		$('#searchbrands_slider').bind('slidechange', function (event, ui) { if (ui.value > $('#searchbrands_hdnTotalPages').val()) {return;}$('#searchbrands_slidertextbox').text(ui.value);$('#searchbrands_hdnPageIndex').val(parseInt(ui.value)-1);$('#searchbrandsSearchForm').submit(); });
		$('#searchbrands_slider').bind('slide', function (event, ui) { $('#searchbrands_slidertextbox').text(ui.value); });
	});
	</script>
<?php } else { ?>
	<script type="text/javascript">
	$(document).ready(function () {$('#searchbrands_RecordsDisplay').hide();$('#searchbrands_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');});
	</script>
<?php } ?>
