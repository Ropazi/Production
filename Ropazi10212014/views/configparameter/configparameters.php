<?php include_once("classes/helpers/webincludes.php");  ?>
<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/Scripts/searchscript2.js"></script>

<div class="pageouter">


	<script type="text/javascript">
	$(document).ready(function () {
		$('#configparametersSearchForm').submit(function (event) {
			event.preventDefault();
			SubmitForm('configparameters');
		});
	});
	</script>
	<form id="configparametersSearchForm" method="post" action="<?php echo Constants::$BASEPATH ?>configparameter/configparameterspost">
		<input type="hidden" id="configparameters_hdnSortDirection" name="configparameters_hdnSortDirection" value="ASC" />
		<input type="hidden" id="configparameters_hdnSortExpression" name="configparameters_hdnSortExpression" value="ParameterName" />
		<input type="hidden" id="configparameters_hdnSortExpressionDefault" name="configparameters_hdnSortExpressionDefault" value="ParameterName" />
		<input type="hidden" id="configparameters_hdnPageIndex" name="configparameters_hdnPageIndex" value="0" />
		<input type="hidden" id="configparameters_hdnTotalPages" name="configparameters_hdnTotalPages" value="<?php $this->model->getTotalPages() ?>" />
		<input type="hidden" id="configparameters_hdnPageSize" name="configparameters_hdnPageSize" value="20" />
		<?php echo RequestStateHelper::GetFormRequestState($this->model->getRequestStateDictionary()) ?>
		<div class="QuickSearch">
			<fieldset>
				<legend>Search</legend>
				<table>
					<tr>
					</tr>
					<tr>
						<td class="vcell" colspan="8">
							<div class="centered searchbuttons">
							<?php ButtonHelper::Button("", "#", "SubmitForm('configparameters');return false;", "Search", "search.png") ?>&nbsp;&nbsp;&nbsp;
							<?php ButtonHelper::Button("", "#", "return false;", "Clear", "clear.png") ?>
							</div>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="SearchHeader">
			<?php echo ButtonHelper::Button("/", "#", "SubmitForm('configparameters');return false;", "Page Size", "pagesize.png") ?>
			<?php echo TextBoxHelper::TextBox("configparameters_txtPageSize", "configparameters_txtPageSize", "ShortTextBox", "100", "string", "3", "20") ?>&nbsp;&nbsp;&nbsp;&nbsp;
			Config Settings:&nbsp;<span id="configparameters_TotalRecords" class="fieldlabelgray bold"><?php echo $this->model->getTotalCount() ?></span>&nbsp;&nbsp;
			<?php if ($this->model->getTotalCount() == 0) { ?>
				<span id="configparameters_RecordsDisplay" style="display:none;">
			<?php } else { ?>
				<span id="configparameters_RecordsDisplay">
			<?php } ?>
				Displaying <span id="configparameters_StartRecord" class="fieldlabelgray bold"><?php echo $this->model->getStartRecord() ?></span>  through <span id="configparameters_EndRecord" class="fieldlabelgray bold"><?php echo $this->model->getEndRecord() ?></span>
			</span>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo ButtonHelper::Button("/", "configparameter/createconfigparameterget", "showmodal('/configparameter/createconfigparameterget', '3');return false;" , "Add New Config Settings", "add.png") ?>
		</div>
		<div id="configparameters_searchresult">
			<?php require("views/configparameter/_configparameterselectioncontrol.php") ?>
		</div>
	</form>
</div>
