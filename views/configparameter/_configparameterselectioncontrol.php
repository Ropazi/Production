
<?php include_once("classes/helpers/webincludes.php"); ?>

<div class="ContainerGrid">
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div id="GridHeaderConfigParameterSelectionControl" class="GridHeaderContent">
			<table class="standardTableHeader">
				<tr class="HeaderRow">
					<td><div class="CellHeaderML" style="width:23px;">&nbsp;</div></td>
					<td><div class="CellHeaderML" title="Parameter Name" style="width:200px;">Parameter Name</div></td>
					<td><div class="CellHeaderML" title="Parameter Value" style="width:300px;">Parameter Value</div></td>
					<td><div class="CellHeaderML centered" title="Date Modified" style="width:125px;">Date Modified</div></td>
					<td><div class="CellHeaderML" title="Comments" style="width:400px;">Comments</div></td>
				</tr>
			</table>
		</div>
		<div id="GridContentConfigParameterSelectionControl" class="GridContent" onscroll="javascript:updateScroll(this,'GridHeaderConfigParameterSelectionControl');">
			<table class="standardTable">
				<?php $i = 0; ?>
				<?php foreach ($this->model->getList() as $_ConfigParameter) { ?>
					<?php $i++; ?>
					<?php $TRow = "TableRow"; ?>
					<?php if ($i%2 == 0)
					{
						$TRow = "TableRow2";
					}
					?>
					
					<tr class="<?php echo $TRow ?>" onmouseover="javascript:this.className='AltRow';" onmouseout="javascript:this.className='<?php echo $TRow ?>';">
						<td><div class="CellItem" style="width:23px;"><?php echo ImageButtonHelper::ModalEditButton(Constants::$BASEPATH, $this->model->GetRequestState("UpdateTarget") . RequestStateHelper::CreateRequestState("ParameterID", $_ConfigParameter->getParameterID()), $this->model->GetRequestState("ModalIndex")) ?></div></td>
						<td><div class="CellItem" title="<?php echo $_ConfigParameter->getParameterName() ?>" style="width:200px;"><?php echo $_ConfigParameter->getParameterName() ?></div></td>
						<td><div class="CellItem" title="<?php echo $_ConfigParameter->getParameterValue() ?>" style="width:300px;"><?php echo $_ConfigParameter->getParameterValue() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo LabelHelper::ShortDateLabelForGrid($_ConfigParameter->getDateModified()) ?>" style="width:125px;"><?php echo LabelHelper::ShortDateLabelForGrid($_ConfigParameter->getDateModified()) ?></div></td>
						<td><div class="CellItem" title="<?php echo $_ConfigParameter->getComments() ?>" style="width:400px;"><?php echo $_ConfigParameter->getComments() ?></div></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	<?php } ?>
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div class="GridFooter">
			<table class="standardTable">
				<tr>
					<td><?php echo ImageButtonHelper::Button("btnFirst", "First", "configparameters", "First", "/content/images/first.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnPrev", "Previous", "configparameters", "Previous", "/content/images/prev.gif") ?></td>
					<td><div class="demo" style="width:100px;"><div id="configparameters_slider"></div></div></td>
					<td>&nbsp;&nbsp;Page&nbsp;<span id="configparameters_slidertextbox"><?php echo $this->model->getCurrentPage() ?></span>&nbsp;of&nbsp;<span id="configparameters_sldTotalPages"><?php echo $this->model->getTotalPages() ?></span></td>
					<td><?php echo ImageButtonHelper::Button("btnNext", "Next", "configparameters", "Next", "/content/images/next.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnLast", "Last", "configparameters", "Last", "/content/images/last.gif") ?></td>
				</tr>
			</table>
		</div>
	<?php } ?>
</div>
<?php if ($this->model->getTotalCount() > 0) { ?>
	<script type="text/javascript">
	$(document).ready(function () {
		$('#configparameters_RecordsDisplay').show();
		$('#configparameters_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');
		$('#configparameters_StartRecord').text('<?php echo $this->model->getStartRecord() ?>');
		$('#configparameters_EndRecord').text('<?php echo $this->model->getEndRecord() ?>');
		$('#configparameters_hdnTotalPages').val('<?php echo $this->model->getTotalPages() ?>');
		$('#configparameters_hdnPageIndex').val('<?php echo $this->model->getPageIndex() ?>');
		
		$('#configparameters_slider').slider();
		$('#configparameters_slider').slider('option', 'min', 1);
		$('#configparameters_slider').slider('option', 'max', <?php echo $this->model->getTotalPages() ?>);
		$('#configparameters_slider').slider('option', 'value', <?php echo $this->model->getCurrentPage() ?>);
		$('#configparameters_slider').bind('slidechange', function (event, ui) { if (ui.value > $('#configparameters_hdnTotalPages').val()) {return;}$('#configparameters_slidertextbox').text(ui.value);$('#configparameters_hdnPageIndex').val(parseInt(ui.value)-1);$('#configparametersSearchForm').submit(); });
		$('#configparameters_slider').bind('slide', function (event, ui) { $('#configparameters_slidertextbox').text(ui.value); });
	});
	</script>
<?php } else { ?>
	<script type="text/javascript">
	$(document).ready(function () {$('#configparameters_RecordsDisplay').hide();$('#configparameters_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');});
	</script>
<?php } ?>
