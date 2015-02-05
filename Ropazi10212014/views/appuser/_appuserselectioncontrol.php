
<?php include_once("classes/helpers/webincludes.php"); ?>

<div class="ContainerGrid">
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div id="GridHeaderAppUserSelectionControl" class="GridHeaderContent">
			<table class="standardTableHeader">
				<tr class="HeaderRow">
					<td><div class="CellHeaderML" style="width:23px;">&nbsp;</div></td>
					<td><div class="CellHeaderML centered" title="Email" style="width:100px;">Email</div></td>
					<td><div class="CellHeaderML centered" title="Username" style="width:100px;">Username</div></td>
					<td><div class="CellHeaderML centered" title="First Name" style="width:100px;">First Name</div></td>
					<td><div class="CellHeaderML centered" title="Last Name" style="width:100px;">Last Name</div></td>
					<td><div class="CellHeaderML centered" title="Last Login" style="width:100px;">Last Login</div></td>
					<td><div class="CellHeaderML centered" title="User Type" style="width:100px;">User Type</div></td>
					<td><div class="CellHeaderML centered" title="Date Created" style="width:100px;">Date Created</div></td>
					<td><div class="CellHeaderML centered" title="Last Update Date" style="width:100px;">Last Update Date</div></td>
					<td><div class="CellHeaderML centered" title="Disabled?" style="width:100px;">Disabled?</div></td>
					<td><div class="CellHeaderML centered" title="Email Verified?" style="width:100px;">Email Verified?</div></td>
				</tr>
			</table>
		</div>
		<div id="GridContentAppUserSelectionControl" class="GridContent" onscroll="javascript:updateScroll(this,'GridHeaderAppUserSelectionControl');">
			<table class="standardTable">
				<?php $i = 0; ?>
				<?php foreach ($this->model->getList() as $_AppUser) { ?>
					<?php $i++; ?>
					<?php $TRow = "TableRow"; ?>
					<?php if ($i%2 == 0)
					{
						$TRow = "TableRow2";
					}
					?>
					
					<tr class="<?php echo $TRow ?>" onmouseover="javascript:this.className='AltRow';" onmouseout="javascript:this.className='<?php echo $TRow ?>';">
						<td><div class="CellItem" style="width:23px;"><?php echo ImageButtonHelper::ModalEditButton(Constants::$BASEPATH, $this->model->GetRequestState("UpdateTarget") . RequestStateHelper::CreateRequestState("AppUserID", $_AppUser->getAppUserID()), $this->model->GetRequestState("ModalIndex")) ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_AppUser->getEmail() ?>" style="width:100px;"><?php echo $_AppUser->getEmail() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_AppUser->getUsername() ?>" style="width:100px;"><?php echo $_AppUser->getUsername() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_AppUser->getFirstName() ?>" style="width:100px;"><?php echo $_AppUser->getFirstName() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_AppUser->getLastName() ?>" style="width:100px;"><?php echo $_AppUser->getLastName() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo LabelHelper::ShortDateLabelForGrid($_AppUser->getLastLogin()) ?>" style="width:100px;"><?php echo LabelHelper::ShortDateLabelForGrid($_AppUser->getLastLogin()) ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_AppUser->getUserType() ?>" style="width:100px;"><?php echo $_AppUser->getUserType() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo LabelHelper::ShortDateLabelForGrid($_AppUser->getCreateDate()) ?>" style="width:100px;"><?php echo LabelHelper::ShortDateLabelForGrid($_AppUser->getCreateDate()) ?></div></td>
						<td><div class="CellItem centered" title="<?php echo LabelHelper::ShortDateLabelForGrid($_AppUser->getLastUpdateDate()) ?>" style="width:100px;"><?php echo LabelHelper::ShortDateLabelForGrid($_AppUser->getLastUpdateDate()) ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_AppUser->getDisabled() ?>" style="width:100px;"><?php echo $_AppUser->getDisabled() ?></div></td>
						<td><div class="CellItem centered" title="<?php echo $_AppUser->getEmailVerified() ?>" style="width:100px;"><?php echo $_AppUser->getEmailVerified() ?></div></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	<?php } ?>
	<?php if ($this->model->getTotalCount() > 0) { ?>
		<div class="GridFooter">
			<table class="standardTable">
				<tr>
					<td><?php echo ImageButtonHelper::Button("btnFirst", "First", "appusers", "First", "/content/images/first.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnPrev", "Previous", "appusers", "Previous", "/content/images/prev.gif") ?></td>
					<td><div class="demo" style="width:100px;"><div id="appusers_slider"></div></div></td>
					<td>&nbsp;&nbsp;Page&nbsp;<span id="appusers_slidertextbox"><?php echo $this->model->getCurrentPage() ?></span>&nbsp;of&nbsp;<span id="appusers_sldTotalPages"><?php echo $this->model->getTotalPages() ?></span></td>
					<td><?php echo ImageButtonHelper::Button("btnNext", "Next", "appusers", "Next", "/content/images/next.gif") ?></td>
					<td><?php echo ImageButtonHelper::Button("btnLast", "Last", "appusers", "Last", "/content/images/last.gif") ?></td>
				</tr>
			</table>
		</div>
	<?php } ?>
</div>
<?php if ($this->model->getTotalCount() > 0) { ?>
	<script type="text/javascript">
	$(document).ready(function () {
		$('#appusers_RecordsDisplay').show();
		$('#appusers_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');
		$('#appusers_StartRecord').text('<?php echo $this->model->getStartRecord() ?>');
		$('#appusers_EndRecord').text('<?php echo $this->model->getEndRecord() ?>');
		$('#appusers_hdnTotalPages').val('<?php echo $this->model->getTotalPages() ?>');
		$('#appusers_hdnPageIndex').val('<?php echo $this->model->getPageIndex() ?>');
		
		$('#appusers_slider').slider();
		$('#appusers_slider').slider('option', 'min', 1);
		$('#appusers_slider').slider('option', 'max', <?php echo $this->model->getTotalPages() ?>);
		$('#appusers_slider').slider('option', 'value', <?php echo $this->model->getCurrentPage() ?>);
		$('#appusers_slider').bind('slidechange', function (event, ui) { if (ui.value > $('#appusers_hdnTotalPages').val()) {return;}$('#appusers_slidertextbox').text(ui.value);$('#appusers_hdnPageIndex').val(parseInt(ui.value)-1);$('#appusersSearchForm').submit(); });
		$('#appusers_slider').bind('slide', function (event, ui) { $('#appusers_slidertextbox').text(ui.value); });
	});
	</script>
<?php } else { ?>
	<script type="text/javascript">
	$(document).ready(function () {$('#appusers_RecordsDisplay').hide();$('#appusers_TotalRecords').text('<?php echo $this->model->getTotalCount() ?>');});
	</script>
<?php } ?>
