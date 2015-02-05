
<fieldset class="fieldset">
	<legend>Category</legend>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#Name').rules('add', {
				required: true,
				maxlength: 100,
				messages: {
					required: '*',
					maxlength: '100 characters allowed'
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
						Category Name
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalueshort">
						<?php echo TextBoxHelper::TextBox("Name", "Name", "form textbox required", "185", "string", "100", $this->model->getName()) ?>
						<br/>
						<span class="FormInstructionsshort">
							
						</span>
					</div>
				</td>
			</tr> 
		</table>
	</div>
</fieldset>
