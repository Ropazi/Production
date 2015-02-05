<?php include_once("classes/helpers/webincludes.php") ?>
<?php echo ScriptHelper::EditFormScript("configparameters") ?>
<div style="position:relative;">
	<div class="hidemodal"><img src="<?php echo Constants::$BASEPATH ?>content/images/x.png" class="hand" onclick="javascript:HideMForm('3');" /></div>
	<div class="modalicon"><img src="<?php echo Constants::$BASEPATH ?>content/images/logo.jpg" /></div>
	<h1 class="PageHeadingModal" style="text-align:center;margin-top:10px;margin-bottom:5px;">
		Config Parameters
	</h1>
	<form id="configparametersEditForm" action="<?php echo Constants::$BASEPATH ?>configparameter/createupdateconfigparameter" method="post">
		<?php echo RequestStateHelper::GetFormRequestState($this->model->getRequestStateDictionary()) ?>
		<div id="spinner" class="spinwrapper3 hdn spinner"><?php echo ImageButtonHelper::Spinner("") ?></div>
		<div id="EditFormContent">
				<?php require("views/configparameter/_configparametereditcontrol.php") ?>
		</div>
		<div id="pagemessage"></div>
		<div id="errors" class="errors"></div>
		<div class="Buttons">
			<?php echo ButtonHelper::Button("", "#", "$('#configparametersEditForm').submit();return false;", "&nbsp;&nbsp;Submit&nbsp;&nbsp;", "save.png") ?>&nbsp;
		</div>
	</form>
</div>
