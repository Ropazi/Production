<?php include_once("classes/helpers/webincludes.php");  ?>


<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/scripts/blockscript.js"></script>
<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/scripts/searchscript2.js"></script>

<div class="pageouter">


	<script type="text/javascript">
	$(document).ready(function () {
		$('#searchpostSearchForm').submit(function (event) {
			event.preventDefault();
			SubmitForm('searchpost');
		});
	});
	</script>
	<form id="searchpostSearchForm" method="post" action="<?php echo Constants::$BASEPATH ?>post/searchpostpost">
		<input type="hidden" id="searchpost_hdnSortDirection" name="searchpost_hdnSortDirection" value="ASC" />
		<input type="hidden" id="searchpost_hdnSortExpression" name="searchpost_hdnSortExpression" value="Title" />
		<input type="hidden" id="searchpost_hdnSortExpressionDefault" name="searchpost_hdnSortExpressionDefault" value="Title" />
		<input type="hidden" id="searchpost_hdnPageIndex" name="searchpost_hdnPageIndex" value="0" />
		<input type="hidden" id="searchpost_hdnTotalPages" name="searchpost_hdnTotalPages" value="<?php $this->model->getTotalPages() ?>" />
		<input type="hidden" id="searchpost_hdnPageSize" name="searchpost_hdnPageSize" value="20" />
		<?php echo RequestStateHelper::GetFormRequestState($this->model->getRequestStateDictionary()) ?>
		<div class="QuickSearch">
			<fieldset>
				<legend>Search</legend>
				<table>
					<tr>
						<td class="vcell">
							<div class="fieldlabelsearch">
								Title:&nbsp;
							</div>
						</td>
						<td class="vcell">
							<div class="fieldvaluesearch">
								<?php echo TextBoxHelper::TextBox("searchpost_txtTitle", "searchpost_txtTitle", "form textbox", "150", "string", "500","") ?>
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
							<?php ButtonHelper::Button("", "#", "SubmitForm('searchpost');return false;", "Search", "search.png") ?>&nbsp;&nbsp;&nbsp;
							<?php ButtonHelper::Button("", "#", "$('#searchpost_txtTitle').val('');$('#searchpostSearchForm').submit();return false;return false;", "Clear", "clear.png") ?>
							</div>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="SearchHeader">
			<?php echo ButtonHelper::Button("/", "#", "SubmitForm('searchpost');return false;", "Page Size", "pagesize.png") ?>
			<?php echo TextBoxHelper::TextBox("searchpost_txtPageSize", "searchpost_txtPageSize", "ShortTextBox", "100", "string", "3", "20") ?>&nbsp;&nbsp;&nbsp;&nbsp;
			Post:&nbsp;<span id="searchpost_TotalRecords" class="fieldlabelgray bold"><?php echo $this->model->getTotalCount() ?></span>&nbsp;&nbsp;
			<?php if ($this->model->getTotalCount() == 0) { ?>
				<span id="searchpost_RecordsDisplay" style="display:none;">
			<?php } else { ?>
				<span id="searchpost_RecordsDisplay">
			<?php } ?>
				Displaying <span id="searchpost_StartRecord" class="fieldlabelgray bold"><?php echo $this->model->getStartRecord() ?></span>  through <span id="searchpost_EndRecord" class="fieldlabelgray bold"><?php echo $this->model->getEndRecord() ?></span>
			</span>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo ButtonHelper::Button("/", "post/createpostget", "showmodal('/post/createpostget', '2');return false;" , "Add New Post", "add.png") ?>
		</div>
		<div id="searchpost_searchresult">
			<?php require("views/post/_postselectioncontrol.php") ?>
		</div>
	</form>
</div>
