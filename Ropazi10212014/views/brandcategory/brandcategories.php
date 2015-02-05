<?php include_once("classes/helpers/webincludes.php");  ?>
<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/Scripts/searchscript2.js"></script>

<div class="pageouter">


	<script type="text/javascript">
	$(document).ready(function () {
		$('#brandcategoriesSearchForm').submit(function (event) {
			event.preventDefault();
			SubmitForm('brandcategories');
		});
	});
	</script>
	<form id="brandcategoriesSearchForm" method="post" action="<?php echo Constants::$BASEPATH ?>brandcategory/brandcategoriespost">
		<input type="hidden" id="brandcategories_hdnSortDirection" name="brandcategories_hdnSortDirection" value="ASC" />
		<input type="hidden" id="brandcategories_hdnSortExpression" name="brandcategories_hdnSortExpression" value="CategoryName" />
		<input type="hidden" id="brandcategories_hdnSortExpressionDefault" name="brandcategories_hdnSortExpressionDefault" value="CategoryName" />
		<input type="hidden" id="brandcategories_hdnPageIndex" name="brandcategories_hdnPageIndex" value="0" />
		<input type="hidden" id="brandcategories_hdnTotalPages" name="brandcategories_hdnTotalPages" value="<?php $this->model->getTotalPages() ?>" />
		<input type="hidden" id="brandcategories_hdnPageSize" name="brandcategories_hdnPageSize" value="20" />
		<?php echo RequestStateHelper::GetFormRequestState($this->model->getRequestStateDictionary()) ?>
		<div class="QuickSearch">
			<fieldset>
				<legend>Search</legend>
				<table>
					<tr>
						<td class="vcell">
							<div class="fieldlabelsearch">
								Category Name:&nbsp;
							</div>
						</td>
						<td class="vcell">
							<div class="fieldvaluesearch">
								<?php echo TextBoxHelper::TextBox("brandcategories_txtName", "brandcategories_txtName", "form textbox", "150", "string", "100","") ?>
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
							<?php ButtonHelper::Button("", "#", "SubmitForm('brandcategories');return false;", "Search", "search.png") ?>&nbsp;&nbsp;&nbsp;
							<?php ButtonHelper::Button("", "#", "$('#brandcategories_txtName').val('');$('#brandcategoriesSearchForm').submit();return false;return false;", "Clear", "clear.png") ?>
							</div>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<div class="SearchHeader">
			<?php echo ButtonHelper::Button("/", "#", "SubmitForm('brandcategories');return false;", "Page Size", "pagesize.png") ?>
			<?php echo TextBoxHelper::TextBox("brandcategories_txtPageSize", "brandcategories_txtPageSize", "ShortTextBox", "100", "string", "3", "20") ?>&nbsp;&nbsp;&nbsp;&nbsp;
			Category:&nbsp;<span id="brandcategories_TotalRecords" class="fieldlabelgray bold"><?php echo $this->model->getTotalCount() ?></span>&nbsp;&nbsp;
			<?php if ($this->model->getTotalCount() == 0) { ?>
				<span id="brandcategories_RecordsDisplay" style="display:none;">
			<?php } else { ?>
				<span id="brandcategories_RecordsDisplay">
			<?php } ?>
				Displaying <span id="brandcategories_StartRecord" class="fieldlabelgray bold"><?php echo $this->model->getStartRecord() ?></span>  through <span id="brandcategories_EndRecord" class="fieldlabelgray bold"><?php echo $this->model->getEndRecord() ?></span>
			</span>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo ButtonHelper::Button("/", "brandcategory/createbrandcategoryget", "showmodal('/brandcategory/createbrandcategoryget', '3');return false;" , "Add New Category", "add.png") ?>
		</div>
		<div id="brandcategories_searchresult">
			<?php require("views/brandcategory/_brandcategoryselectioncontrol.php") ?>
		</div>
	</form>
</div>
