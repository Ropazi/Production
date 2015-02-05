<?php include_once("classes/helpers/webincludes.php");  ?>


<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/scripts/blockscript.js"></script>
<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/scripts/searchscript2.js"></script>

<div class="pageouter">


	<script type="text/javascript">
	$(document).ready(function () {
		$('#searchbrandsSearchForm').submit(function (event) {
			event.preventDefault();
			SubmitForm('searchbrands');
		});
	});
	</script>
	<form id="searchbrandsSearchForm" method="post" action="<?php echo Constants::$BASEPATH ?>brand/searchbrandspost">
		<input type="hidden" id="searchbrands_hdnSortDirection" name="searchbrands_hdnSortDirection" value="DESC" />
		<input type="hidden" id="searchbrands_hdnSortExpression" name="searchbrands_hdnSortExpression" value="LastUpdateDate" />
		<input type="hidden" id="searchbrands_hdnSortExpressionDefault" name="searchbrands_hdnSortExpressionDefault" value="LastUpdateDate" />
		<input type="hidden" id="searchbrands_hdnPageIndex" name="searchbrands_hdnPageIndex" value="0" />
		<input type="hidden" id="searchbrands_hdnTotalPages" name="searchbrands_hdnTotalPages" value="<?php $this->model->getTotalPages() ?>" />
		<input type="hidden" id="searchbrands_hdnPageSize" name="searchbrands_hdnPageSize" value="20" />
		<?php echo RequestStateHelper::GetFormRequestState($this->model->getRequestStateDictionary()) ?>
		<div class="QuickSearch">
			<fieldset>
				<legend>Search</legend>
				<table>
					<tr>
						<td class="vcell">
							<div class="fieldlabelsearch">
								Brand Name:&nbsp;
							</div>
						</td>
						<td class="vcell">
							<div class="fieldvaluesearch">
								<?php echo TextBoxHelper::TextBox("searchbrands_txtBrandName", "searchbrands_txtBrandName", "form textbox", "150", "string", "100","") ?>
							</div>
						</td>
						<td class="vcell">
							<div class="fieldlabelsearch">
								Code:&nbsp;
							</div>
						</td>
						<td class="vcell">
							<div class="fieldvaluesearch">
								<?php echo TextBoxHelper::TextBox("searchbrands_txtBrandCode", "searchbrands_txtBrandCode", "form textbox", "150", "string", "25","") ?>
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
							<?php ButtonHelper::Button("", "#", "SubmitForm('searchbrands');return false;", "Search", "search.png") ?>&nbsp;&nbsp;&nbsp;
							<?php ButtonHelper::Button("", "#", "$('#searchbrands_txtBrandName').val('');$('#searchbrands_txtBrandCode').val('');$('#searchbrandsSearchForm').submit();return false;return false;", "Clear", "clear.png") ?>
							</div>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="SearchHeader">
			<?php echo ButtonHelper::Button("/", "#", "SubmitForm('searchbrands');return false;", "Page Size", "pagesize.png") ?>
			<?php echo TextBoxHelper::TextBox("searchbrands_txtPageSize", "searchbrands_txtPageSize", "ShortTextBox", "100", "string", "3", "20") ?>&nbsp;&nbsp;&nbsp;&nbsp;
			Brand:&nbsp;<span id="searchbrands_TotalRecords" class="fieldlabelgray bold"><?php echo $this->model->getTotalCount() ?></span>&nbsp;&nbsp;
			<?php if ($this->model->getTotalCount() == 0) { ?>
				<span id="searchbrands_RecordsDisplay" style="display:none;">
			<?php } else { ?>
				<span id="searchbrands_RecordsDisplay">
			<?php } ?>
				Displaying <span id="searchbrands_StartRecord" class="fieldlabelgray bold"><?php echo $this->model->getStartRecord() ?></span>  through <span id="searchbrands_EndRecord" class="fieldlabelgray bold"><?php echo $this->model->getEndRecord() ?></span>
			</span>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo ButtonHelper::Button("/", "brand/createbrandget", "showmodal('/brand/createbrandget', '2');return false;" , "Add New Brand", "add.png") ?>
		</div>
		<div id="searchbrands_searchresult">
			<?php require("views/brand/_brandselectioncontrol.php") ?>
		</div>
	</form>
</div>
