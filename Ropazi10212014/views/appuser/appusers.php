<?php include_once("classes/helpers/webincludes.php");  ?>
<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/Scripts/searchscript2.js"></script>

<div class="pageouter">


	<script type="text/javascript">
	$(document).ready(function () {
		$('#appusersSearchForm').submit(function (event) {
			event.preventDefault();
			SubmitForm('appusers');
		});
	});
	</script>
	<form id="appusersSearchForm" method="post" action="<?php echo Constants::$BASEPATH ?>appuser/appuserspost">
		<input type="hidden" id="appusers_hdnSortDirection" name="appusers_hdnSortDirection" value="ASC" />
		<input type="hidden" id="appusers_hdnSortExpression" name="appusers_hdnSortExpression" value="Email" />
		<input type="hidden" id="appusers_hdnSortExpressionDefault" name="appusers_hdnSortExpressionDefault" value="Email" />
		<input type="hidden" id="appusers_hdnPageIndex" name="appusers_hdnPageIndex" value="0" />
		<input type="hidden" id="appusers_hdnTotalPages" name="appusers_hdnTotalPages" value="<?php $this->model->getTotalPages() ?>" />
		<input type="hidden" id="appusers_hdnPageSize" name="appusers_hdnPageSize" value="20" />
		<?php echo RequestStateHelper::GetFormRequestState($this->model->getRequestStateDictionary()) ?>
		<div class="QuickSearch">
			<fieldset>
				<legend>Search</legend>
				<table>
					<tr>
						<td class="vcell">
							<div class="fieldlabelsearch">
								Email:&nbsp;
							</div>
						</td>
						<td class="vcell">
							<div class="fieldvaluesearch">
								<?php echo TextBoxHelper::TextBox("appusers_txtEmail", "appusers_txtEmail", "form textbox", "150", "string", "200","") ?>
							</div>
						</td>
						<td class="vcell">
							<div>
							</div>
						</td>
						<td class="vcell">
							<div>
							</div>
						</td>
						<td class="vcell">
							<div>
							</div>
						</td>
						<td class="vcell">
							<div>
							</div>
						</td>
						<td class="vcell">
							<div>
							</div>
						</td>
						<td class="vcell">
							<div>
							</div>
						</td>
					</tr>
					<tr>
						<td class="vcell" colspan="8">
							<div class="centered searchbuttons">
							<?php ButtonHelper::Button("", "#", "SubmitForm('appusers');return false;", "Search", "search.png") ?>&nbsp;&nbsp;&nbsp;
							<?php ButtonHelper::Button("", "#", "$('#appusers_txtEmail').val('');$('#appusersSearchForm').submit();return false;return false;", "Clear", "clear.png") ?>
							</div>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="SearchHeader">
			<?php echo ButtonHelper::Button("/", "#", "SubmitForm('appusers');return false;", "Page Size", "pagesize.png") ?>
			<?php echo TextBoxHelper::TextBox("appusers_txtPageSize", "appusers_txtPageSize", "ShortTextBox", "100", "string", "3", "20") ?>&nbsp;&nbsp;&nbsp;&nbsp;
			Users:&nbsp;<span id="appusers_TotalRecords" class="fieldlabelgray bold"><?php echo $this->model->getTotalCount() ?></span>&nbsp;&nbsp;
			<?php if ($this->model->getTotalCount() == 0) { ?>
				<span id="appusers_RecordsDisplay" style="display:none;">
			<?php } else { ?>
				<span id="appusers_RecordsDisplay">
			<?php } ?>
				Displaying <span id="appusers_StartRecord" class="fieldlabelgray bold"><?php echo $this->model->getStartRecord() ?></span>  through <span id="appusers_EndRecord" class="fieldlabelgray bold"><?php echo $this->model->getEndRecord() ?></span>
			</span>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo ButtonHelper::Button("/", "appuser/createappuserget", "showmodal('/appuser/createappuserget', '2');return false;" , "Add New Users", "add.png") ?>
		</div>
		<div id="appusers_searchresult">
			<?php require("views/appuser/_appuserselectioncontrol.php") ?>
		</div>
	</form>
</div>
