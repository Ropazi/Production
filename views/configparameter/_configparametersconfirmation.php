<?php include_once("classes/helpers/webincludes.php");  ?>
<script type="text/javascript">
$(document).ready(function () {
	SubmitForm('configparameters');
});
</script>
<div style="position:relative;">
	<div class="hidemodal"><img src="<?php echo Constants::$BASEPATH ?>content/images/x.png" class="hand" onclick="javascript:HideMForm('3');" /></div>
	<div class="modalicon"><img src="<?php echo Constants::$BASEPATH ?>content/images/logo.jpg" /></div>
	<h1 class="PageHeadingModal" style="text-align:center;margin-top:10px;margin-bottom:5px;">
		Config Parameters
	</h1>
	<div class="centered">
		Request Completed Successfully
		<br/><br/>
		<?php echo ButtonHelper::Button("", "#", "HideMForm('3');return false;", "&nbsp;&nbsp;Close&nbsp;&nbsp;", "ok.png") ?>&nbsp;
	</div>
</div>
