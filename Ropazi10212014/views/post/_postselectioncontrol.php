
<?php include_once("classes/helpers/webincludes.php"); ?>

<div class="ContainerGrid">
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div id="GridHeaderPostSelectionControl" class="GridHeaderContent">
			<table class="standardTableHeader">
				<tr class="HeaderRow">
					<td><div class="CellHeaderML centered" title="Title" style="width:100px;">Title</div></td>
					<td><div class="CellHeaderML centered" title="Create Date" style="width:100px;">Create Date</div></td>
					<td><div class="CellHeaderML centered" title="Price ($)" style="width:100px;">Price ($)</div></td>
					<td><div class="CellHeaderML" title="Detail Description" style="width:200px;">Detail Description</div></td>
					<td><div class="CellHeaderML centered" title="Last Update" style="width:100px;">Last Update</div></td>
					<td><div class="CellHeaderML centered" title="Active?" style="width:100px;">Active?</div></td>
				</tr>
			</table>
		</div>
		<div id="GridContentPostSelectionControl" class="GridContent" onscroll="javascript:updateScroll(this,'GridHeaderPostSelectionControl');">
			<table class="standardTable">
				<?php $i = 0; ?>
				<?php foreach ($this->model->getList() as $_Post) { ?>
					<?php $i++; ?>
					<?php $TRow = "TableRow"; ?>
					<?php if ($i%2 == 0)
					{
						$TRow = "TableRow2";
					}
					?>
					
					<tr class="<?php echo $TRow ?>" onmouseover="javascript:this.className='AltRow';" onmouseout="javascript:this.className='<?php echo $TRow ?>';">
						<td><div class="CellItem centered" title="<?php echo $_Post->getTitle() ?>" style="width:100px;"><?php echo $_Post->getTitle() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo LabelHelper::ShortDateLabelForGrid($_Post->getCreateDate()) ?>" style="width:100px;"><?php echo LabelHelper::ShortDateLabelForGrid($_Post->getCreateDate()) ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_Post->getPriceText() ?>" style="width:100px;"><?php echo $_Post->getPriceText() ?></div></td>
						<td><div class="CellItem" title="<?php echo $_Post->getDetailText() ?>" style="width:200px;"><?php echo $_Post->getDetailText() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo LabelHelper::ShortDateLabelForGrid($_Post->getLastUpdateDate()) ?>" style="width:100px;"><?php echo LabelHelper::ShortDateLabelForGrid($_Post->getLastUpdateDate()) ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_Post->getIsActive() ?>" style="width:100px;"><?php echo $_Post->getIsActive() ?></div></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	<?php } ?>
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div class="GridFooter">
			<table class="standardTable">
				<tr>
					<td><?php echo ImageButtonHelper::Button("btnFirst", "First", "userpost", "First", "/content/images/first.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnPrev", "Previous", "userpost", "Previous", "/content/images/prev.gif") ?></td>
					<td><div class="demo" style="width:100px;"><div id="userpost_slider"></div></div></td>
					<td>&nbsp;&nbsp;Page&nbsp;<span id="userpost_slidertextbox"><?php echo $this->model->getCurrentPage() ?></span>&nbsp;of&nbsp;<span id="userpost_sldTotalPages"><?php echo $this->model->getTotalPages() ?></span></td>
					<td><?php echo ImageButtonHelper::Button("btnNext", "Next", "userpost", "Next", "/content/images/next.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnLast", "Last", "userpost", "Last", "/content/images/last.gif") ?></td>
				</tr>
			</table>
		</div>
	<?php } ?>
</div>
<?php if ($this->model->getTotalCount() > 0) { ?>
	<script type="text/javascript">
	$(document).ready(function () {
		$('#userpost_RecordsDisplay').show();
		$('#userpost_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');
		$('#userpost_StartRecord').text('<?php echo $this->model->getStartRecord() ?>');
		$('#userpost_EndRecord').text('<?php echo $this->model->getEndRecord() ?>');
		$('#userpost_hdnTotalPages').val('<?php echo $this->model->getTotalPages() ?>');
		$('#userpost_hdnPageIndex').val('<?php echo $this->model->getPageIndex() ?>');
		
		$('#userpost_slider').slider();
		$('#userpost_slider').slider('option', 'min', 1);
		$('#userpost_slider').slider('option', 'max', <?php echo $this->model->getTotalPages() ?>);
		$('#userpost_slider').slider('option', 'value', <?php echo $this->model->getCurrentPage() ?>);
		$('#userpost_slider').bind('slidechange', function (event, ui) { if (ui.value > $('#userpost_hdnTotalPages').val()) {return;}$('#userpost_slidertextbox').text(ui.value);$('#userpost_hdnPageIndex').val(parseInt(ui.value)-1);$('#userpostSearchForm').submit(); });
		$('#userpost_slider').bind('slide', function (event, ui) { $('#userpost_slidertextbox').text(ui.value); });
	});
	</script>
<?php } else { ?>
	<script type="text/javascript">
	$(document).ready(function () {$('#userpost_RecordsDisplay').hide();$('#userpost_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');});
	</script>
<?php } ?>
