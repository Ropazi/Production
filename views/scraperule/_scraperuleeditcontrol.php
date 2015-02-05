
<div class="controlborder">
	<script type="text/javascript">
		$(document).ready(function () {
			$('#BrandID').rules('add', {
				required: true,
				digits: true,
				messages: {
					required: '*', 
					digits: 'Should be numeric'
				}
			});
			$('#RuleType').rules('add', {
				required: true,
				maxlength: 100,
				messages: {
					required: '*',
					maxlength: '100 characters allowed'
				}
			});
			$('#Selector').rules('add', {
				required: true,
				maxlength: 1000,
				messages: {
					required: '*',
					maxlength: '1000 characters allowed'
				}
			});
			$('#ElementType').rules('add', {
				required: true,
				maxlength: 100,
				messages: {
					required: '*',
					maxlength: '100 characters allowed'
				}
			});
			$('#Notes').rules('add', {
				maxlength: 500,
				messages: {
					maxlength: '500 characters allowed'
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
						Brand
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox("BrandID", "BrandID", "form textbox required", "75", "int", "100", $this->model->getBrandID()) ?>
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
						Rule Type
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox("RuleType", "RuleType", "form textbox required", "185", "string", "100", $this->model->getRuleType()) ?>
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
						Selector
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextArea("Selector", "form textbox tarea required", "70", "2", $this->model->getSelector()) ?>
						<?php echo ScriptHelper::AutoGrowScript("Selector") ?>
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
						Element Type
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox("ElementType", "ElementType", "form textbox required", "185", "string", "100", $this->model->getElementType()) ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						Notes
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextArea("Notes", "form textbox tarea", "70", "2", $this->model->getNotes()) ?>
						<?php echo ScriptHelper::AutoGrowScript("Notes") ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
		</table>
	</div>
</div>
