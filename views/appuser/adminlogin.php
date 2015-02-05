<?php include_once("classes/helpers/webincludes.php");  ?>


<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/scripts/blockscript.js"></script>
<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/scripts/createscript.js"></script>
<?php echo ScriptHelper::EditFormScript("adminlogin") ?>

<div class="pageouter">


	<h1 class="PageHeading" style="text-align: center;">
		Sign In
	</h1>
	<form id="adminloginEditForm" method="post" action="<?php echo Constants::$BASEPATH ?>appuser/adminloginpost">
		<div id="errors" class="errors">
		</div>
		<div id="Ctl" style="text-align: center;">
			<div id="CtlAppUserLoginControl">
				<?php require("views/appuser/_appuserlogincontrol.php") ?>
			</div>
		</div>
		<div id="pagemessage">
		</div>
		<div id="spinner" class="spinwrapper1 hdn spinner"><?php echo ImageButtonHelper::Spinner("") ?></div>
		<div class="Buttons" style="margin-left:50px;">
			<?php echo ButtonHelper::Button("/", "#", "$('#adminloginEditForm').submit();return false;", "&nbsp;&nbsp;Sign In&nbsp;&nbsp;", "save.png") ?>&nbsp;
		</div>
	</form>
</div>
