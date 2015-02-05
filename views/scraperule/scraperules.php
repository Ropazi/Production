<?php include_once("classes/helpers/webincludes.php");  ?>
<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/Scripts/searchscript2.js"></script>

<div class="pageouter">


	<script type="text/javascript">
	$(document).ready(function () {
		$('#scraperulesSearchForm').submit(function (event) {
			event.preventDefault();
			SubmitForm('scraperules');
		});
	});
	</script>
	<form id="scraperulesSearchForm" method="post" action="<?php echo Constants::$BASEPATH ?>scraperule/scraperulespost">
		<input type="hidden" id="scraperules_hdnSortDirection" name="scraperules_hdnSortDirection" value="ASC" />
		<input type="hidden" id="scraperules_hdnSortExpression" name="scraperules_hdnSortExpression" value="RuleType" />
		<input type="hidden" id="scraperules_hdnSortExpressionDefault" name="scraperules_hdnSortExpressionDefault" value="RuleType" />
		<input type="hidden" id="scraperules_hdnPageIndex" name="scraperules_hdnPageIndex" value="0" />
		<input type="hidden" id="scraperules_hdnTotalPages" name="scraperules_hdnTotalPages" value="<?php $this->model->getTotalPages() ?>" />
		<input type="hidden" id="scraperules_hdnPageSize" name="scraperules_hdnPageSize" value="20" />
		<?php echo RequestStateHelper::GetFormRequestState($this->model->getRequestStateDictionary()) ?>
		<div class="QuickSearch">
			<fieldset>
				<legend>Search</legend>
				<table>
					<tr>
						<td class="vcell">
							<div class="fieldlabelsearch">
								Rule Type:&nbsp;
							</div>
						</td>
						<td class="vcell">
							<div class="fieldvaluesearch">
								<?php echo DropDownHelper::DropDown("scraperules_txtRuleType", "form textbox", "153", "Image;Price;Title;Description", TRUE, "") ?>
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
							<?php ButtonHelper::Button("", "#", "SubmitForm('scraperules');return false;", "Search", "search.png") ?>&nbsp;&nbsp;&nbsp;
							<?php ButtonHelper::Button("", "#", "$('#scraperules_txtRuleType').val('');$('#scraperulesSearchForm').submit();return false;return false;", "Clear", "clear.png") ?>
							</div>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="SearchHeader">
			<?php echo ButtonHelper::Button("/", "#", "SubmitForm('scraperules');return false;", "Page Size", "pagesize.png") ?>
			<?php echo TextBoxHelper::TextBox("scraperules_txtPageSize", "scraperules_txtPageSize", "ShortTextBox", "100", "string", "3", "20") ?>&nbsp;&nbsp;&nbsp;&nbsp;
			Scrape Rules:&nbsp;<span id="scraperules_TotalRecords" class="fieldlabelgray bold"><?php echo $this->model->getTotalCount() ?></span>&nbsp;&nbsp;
			<?php if ($this->model->getTotalCount() == 0) { ?>
				<span id="scraperules_RecordsDisplay" style="display:none;">
			<?php } else { ?>
				<span id="scraperules_RecordsDisplay">
			<?php } ?>
				Displaying <span id="scraperules_StartRecord" class="fieldlabelgray bold"><?php echo $this->model->getStartRecord() ?></span>  through <span id="scraperules_EndRecord" class="fieldlabelgray bold"><?php echo $this->model->getEndRecord() ?></span>
			</span>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo ButtonHelper::Button("/", "scraperule/createscraperuleget", "showmodal('/scraperule/createscraperuleget', '3');return false;" , "Add New Scrape Rules", "add.png") ?>
		</div>
		<div id="scraperules_searchresult">
			<?php require("views/scraperule/_scraperuleselectioncontrol.php") ?>
		</div>
	</form>
</div>
