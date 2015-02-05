
<fieldset class="fieldset">
	<legend>New Post</legend>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#Title').rules('add', {
				maxlength: 500,
				messages: {
					maxlength: '500 characters allowed'
				}
			});
			$('#PriceText').rules('add', {
				maxlength: 50,
				messages: {
					maxlength: '50 characters allowed'
				}
			});
			$('#DetailText').rules('add', {
				maxlength: 2000,
				messages: {
					maxlength: '2000 characters allowed'
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
						Title
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextArea("Title", "form textbox tarea", "70", "2", $this->model->getTitle()) ?>
						<?php echo ScriptHelper::AutoGrowScript("Title") ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						Price ($)
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextBox("PriceText", "PriceText", "form textbox", "185", "string", "50", $this->model->getPriceText()) ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						Detail Description
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						<?php echo TextBoxHelper::TextArea("DetailText", "form textbox tarea", "70", "2", $this->model->getDetailText()) ?>
						<?php echo ScriptHelper::AutoGrowScript("DetailText") ?>
						<br/>
						<span class="FormInstructions">
							
						</span>
					</div>
				</td>
			</tr> 
			<tr> 
				<td class="vcell">
					<div class="fieldlabel">
						Image
						:&nbsp;
					</div>
				</td>
				<td class="vcell">
					<div class="fieldvalue">
						@Html.Raw(LabelHelper.Label("OriginalImageURLLabel", "fieldlabelgray", Model.OriginalImageURL))
						<input type="hidden" name="OriginalImageURL" value="@Model.OriginalImageURL" />
						<br/>
						<span class="FormInstructions">
						</span>
					</div>
				</td>
			</tr> 
		</table>
	</div>
</fieldset>
