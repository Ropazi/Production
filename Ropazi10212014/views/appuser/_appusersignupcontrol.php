
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
	<script type="text/javascript">
		$(document).ready(function () {
			$('#Email').watermark('Your email address', {className: 'wcss'});
			$('#Password').watermark('Choose a password', {className: 'wcss'});
		});
	</script>
<div class="controlborder">
	<?php if (strlen($this->model->getPageMessage()) > 0) { ?>
		<div class="infobox"><?php echo $this->model->getPageMessage() ?></div>
	<?php } ?>

	<div style="position:relative;">
		<table>
			<tr> 
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox2(Constants::$BASEPATH, "Email", "Email", "textboxlarge", "224", "string", "200", LabelHelper::EmailText($this->model->getEmail()), "mailicon.png" ) ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox2(Constants::$BASEPATH, "Password", "Password", "textboxlarge", "224", "string", "100", $this->model->getPassword(), "passwordicon.png") ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
		</table>
	</div>
</div>
