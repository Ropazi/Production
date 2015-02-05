
<fieldset class="fieldset">
	<legend>Brand Detail</legend>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#BrandName').rules('add', {
				required: true,
				maxlength: 100,
				messages: {
					required: '*',
					maxlength: '100 characters allowed'
				}
			});
			$('#BrandCode').rules('add', {
				required: true,
				maxlength: 25,
				messages: {
					required: '*',
					maxlength: '25 characters allowed'
				}
			});
			$('#Website').rules('add', {
				required: true,
				maxlength: 100,
				messages: {
					required: '*',
					maxlength: '100 characters allowed'
				}
			});
			$('#BrandLogo').rules('add', {
				maxlength: 300,
				messages: {
					maxlength: '300 characters allowed'
				}
			});
			$('#Tier').rules('add', {
				required: false,
				digits: true,
				messages: {
					digits: 'Should be numeric'
				}
			});
		});
	</script>

	<?php if (strlen($this->model->getPageMessage()) > 0) { ?>
		<div class="infobox"><?php echo $this->model->getPageMessage() ?></div>
	<?php } ?>

	<div style="position:relative;">
		<table>
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						<span class="reqd">*</span>
						Brand Name
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox("BrandName", "BrandName", "form textbox required", "185", "string", "100", $this->model->getBrandName()) ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						<span class="reqd">*</span>
						Code
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox("BrandCode", "BrandCode", "form textbox required", "185", "string", "25", $this->model->getBrandCode()) ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						<span class="reqd">*</span>
						Website
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox("Website", "Website", "form textbox required", "185", "string", "100", $this->model->getWebsite()) ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						Logo
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextArea("BrandLogo", "form textbox tarea", "70", "2", $this->model->getBrandLogo()) ?>
						<?php echo ScriptHelper::AutoGrowScript("BrandLogo") ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						Approve?
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						@Html.Raw(CheckBoxHelper.CheckBox("IsApproved", "IsApproved", "form textbox", "true", Model.IsApproved))
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						Customer Tier
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						@Html.Raw(DropDownHelper.DropDown("Tier", "form dropdown", "78", "1;2;3;4;5", true, Model.Tier))
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						Featured?
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						@Html.Raw(CheckBoxHelper.CheckBox("IsFeatured", "IsFeatured", "form textbox", "true", Model.IsFeatured))
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
		</table>
	</div>
</fieldset>
