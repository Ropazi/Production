
<?php include_once("classes/helpers/webincludes.php"); ?>

<div class="ContainerGrid">
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div id="GridHeaderScrapeRuleSelectionControl" class="GridHeaderContent">
			<table class="standardTableHeader">
				<tr class="HeaderRow">
					<td><div class="CellHeaderML" style="width:23px;">&nbsp;</div></td>
					<td><div class="CellHeaderML centered" title="Rule Type" style="width:100px;">Rule Type</div></td>
					<td><div class="CellHeaderML" title="Selector" style="width:300px;">Selector</div></td>
					<td><div class="CellHeaderML centered" title="Element Type" style="width:100px;">Element Type</div></td>
					<td><div class="CellHeaderML" title="Notes" style="width:200px;">Notes</div></td>
				</tr>
			</table>
		</div>
		<div id="GridContentScrapeRuleSelectionControl" class="GridContent" onscroll="javascript:updateScroll(this,'GridHeaderScrapeRuleSelectionControl');">
			<table class="standardTable">
				<?php $i = 0; ?>
				<?php foreach ($this->model->getList() as $_ScrapeRule) { ?>
					<?php $i++; ?>
					<?php $TRow = "TableRow"; ?>
					<?php if ($i%2 == 0)
					{
						$TRow = "TableRow2";
					}
					?>
					
					<tr class="<?php echo $TRow ?>" onmouseover="javascript:this.className='AltRow';" onmouseout="javascript:this.className='<?php echo $TRow ?>';">
						<td><div class="CellItem" style="width:23px;"><?php echo ImageButtonHelper::ModalEditButton(Constants::$BASEPATH, $this->model->GetRequestState("UpdateTarget") . RequestStateHelper::CreateRequestState("ScrapeRuleID", $_ScrapeRule->getScrapeRuleID()), $this->model->GetRequestState("ModalIndex")) ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_ScrapeRule->getRuleType() ?>" style="width:100px;"><?php echo $_ScrapeRule->getRuleType() ?></div></td>
						<td><div class="CellItem" title="<?php echo $_ScrapeRule->getSelector() ?>" style="width:300px;"><?php echo $_ScrapeRule->getSelector() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_ScrapeRule->getElementType() ?>" style="width:100px;"><?php echo $_ScrapeRule->getElementType() ?></div></td>
						<td><div class="CellItem" title="<?php echo $_ScrapeRule->getNotes() ?>" style="width:200px;"><?php echo $_ScrapeRule->getNotes() ?></div></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	<?php } ?>
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div class="GridFooter">
			<table class="standardTable">
				<tr>
					<td><?php echo ImageButtonHelper::Button("btnFirst", "First", "scraperules", "First", "/content/images/first.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnPrev", "Previous", "scraperules", "Previous", "/content/images/prev.gif") ?></td>
					<td><div class="demo" style="width:100px;"><div id="scraperules_slider"></div></div></td>
					<td>&nbsp;&nbsp;Page&nbsp;<span id="scraperules_slidertextbox"><?php echo $this->model->getCurrentPage() ?></span>&nbsp;of&nbsp;<span id="scraperules_sldTotalPages"><?php echo $this->model->getTotalPages() ?></span></td>
					<td><?php echo ImageButtonHelper::Button("btnNext", "Next", "scraperules", "Next", "/content/images/next.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnLast", "Last", "scraperules", "Last", "/content/images/last.gif") ?></td>
				</tr>
			</table>
		</div>
	<?php } ?>
</div>
<?php if ($this->model->getTotalCount() > 0) { ?>
	<script type="text/javascript">
	$(document).ready(function () {
		$('#scraperules_RecordsDisplay').show();
		$('#scraperules_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');
		$('#scraperules_StartRecord').text('<?php echo $this->model->getStartRecord() ?>');
		$('#scraperules_EndRecord').text('<?php echo $this->model->getEndRecord() ?>');
		$('#scraperules_hdnTotalPages').val('<?php echo $this->model->getTotalPages() ?>');
		$('#scraperules_hdnPageIndex').val('<?php echo $this->model->getPageIndex() ?>');
		
		$('#scraperules_slider').slider();
		$('#scraperules_slider').slider('option', 'min', 1);
		$('#scraperules_slider').slider('option', 'max', <?php echo $this->model->getTotalPages() ?>);
		$('#scraperules_slider').slider('option', 'value', <?php echo $this->model->getCurrentPage() ?>);
		$('#scraperules_slider').bind('slidechange', function (event, ui) { if (ui.value > $('#scraperules_hdnTotalPages').val()) {return;}$('#scraperules_slidertextbox').text(ui.value);$('#scraperules_hdnPageIndex').val(parseInt(ui.value)-1);$('#scraperulesSearchForm').submit(); });
		$('#scraperules_slider').bind('slide', function (event, ui) { $('#scraperules_slidertextbox').text(ui.value); });
	});
	</script>
<?php } else { ?>
	<script type="text/javascript">
	$(document).ready(function () {$('#scraperules_RecordsDisplay').hide();$('#scraperules_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');});
	</script>
<?php } ?>
