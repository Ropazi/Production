<?php include_once("classes/helpers/webincludes.php");  ?>


<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/scripts/blockscript.js"></script>
<script type="text/javascript" src="<?php echo Constants::$BASEPATH ?>content/scripts/createscript.js"></script>
<?php echo ScriptHelper::EditFormScript("createpost") ?>

<div class="pageouter">


	<form id="createpostEditForm" method="post" action="<?php echo Constants::$BASEPATH ?>post/createpostpost">
		<div id="errors" class="errors">
		</div>
		<div id="Ctl">
			<div id="CtlPostEditControl">
				<?php require("views/post/_posteditcontrol.php") ?>
			</div>
		</div>
		<div id="pagemessage">
		</div>
		<div id="spinner" class="spinwrapper2 hdn spinner"><?php echo ImageButtonHelper::Spinner("") ?></div>
		<div class="Buttons">
			<?php echo ButtonHelper::Button("/", "#", "$('#createpostEditForm').submit();return false;", "&nbsp;&nbsp;Submit&nbsp;&nbsp;", "save.png") ?>&nbsp;
		</div>
	</form>
</div>
