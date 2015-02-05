
<div class="controlborder">
	<script type="text/javascript">
		$(document).ready(function () {
			$('#ParameterName').rules('add', {
				required: true,
				maxlength: 50,
				messages: {
					required: '*',
					maxlength: '50 characters allowed'
				}
			});
			$('#ParameterValue').rules('add', {
				required: true,
				maxlength: 150,
				messages: {
					required: '*',
					maxlength: '150 characters allowed'
				}
			});
			$('#Comments').rules('add', {
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
					<div class="fieldlabelshort">
						<span class="reqd">*</span>
						Parameter Name
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalueshort">
						<?php echo TextBoxHelper::TextBox("ParameterName", "ParameterName", "form textbox required", "185", "string", "50", $this->model->getParameterName()) ?>
						<br/>
						<span class="FormInstructionsshort">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabelshort">
						<span class="reqd">*</span>
						Parameter Value
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalueshort">
						<?php echo TextBoxHelper::TextBox("ParameterValue", "ParameterValue", "form textbox required", "185", "string", "150", $this->model->getParameterValue()) ?>
						<br/>
						<span class="FormInstructionsshort">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabelshort">
						Comments
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalueshort">
						<?php echo TextBoxHelper::TextArea("Comments", "form textbox tarea", "70", "2", $this->model->getComments()) ?>
						<?php echo ScriptHelper::AutoGrowScript("Comments") ?>
						<br/>
						<span class="FormInstructionsshort">
							
						</span>
					</div>
				</td>
			</tr> 
		</table>
	</div>
</div>
