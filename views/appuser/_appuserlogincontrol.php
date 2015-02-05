
<div class="controlborder">
	<script type="text/javascript">
		$(document).ready(function () {
			$('#Email').rules('add', {
				required: true,
				maxlength: 50,
				messages: {
					required: '*',
					maxlength: '50 characters allowed'
				}
			});
			$('#Password').rules('add', {
				required: true,
				maxlength: 15,
				messages: {
					required: '*',
					maxlength: '15 characters allowed'
				}
			});
		});
	</script>

	<?php if (strlen($this->model->getPageMessage()) > 0) { ?>
		<div class="infobox"><?php echo $this->model->getPageMessage() ?></div>
	<?php } ?>

	<div style="position:relative;width:600px;margin:0px auto;">
		<table>
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						<span class="reqd">*</span>
						Email
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox("Email", "Email", "form textbox required", "185", "string", "200", LabelHelper::EmailText($this->model->getEmail())) ?>
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
						Password
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox("Password", "Password", "form textbox required", "185", "string", "100", $this->model->getPassword()) ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
		</table>
	</div>
</div>
