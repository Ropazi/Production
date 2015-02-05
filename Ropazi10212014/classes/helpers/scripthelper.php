<?php



	///*****************************************************************
	///<summary>
	///Class Name: ScriptHelper
	///Description: ScriptHelper utils
	///</summary>
	///*****************************************************************

	class ScriptHelper
	{


		

		///*****************************************************************
		///<summary>
		///Method Name: AutoGrowScript
		///Description: AutoGrow Script
		///</summary>
		///*****************************************************************

		public static function AutoGrowScript($id)
		{
			$script = '<script type="text/javascript">';
			$script .= '$(document).ready(function () {';
			$script .= '$(\'#' . $id . '\').autosize();';
            $script .= '});';
			$script .= '</script>';
			return $script;
		}




		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function StyleSheetMain($basepath)
		{
			$ssmain = "<link href=\"" . $basepath . "content/StyleSheetMain.css\" type=\"text/css\" rel=\"stylesheet\"/>";
			return $ssmain;
		}



		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function StyleSheetForms($basepath)
		{
			$ssforms = "<link href=\"" . $basepath . "content/StyleSheetForms.css\" type=\"text/css\" rel=\"stylesheet\"/>";
			return $ssforms;
		}



		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function StyleSheetButtons($basepath)
		{
			$ssbuttons = "<link href=\"" . $basepath . "content/StyleSheetButtons.css\" type=\"text/css\" rel=\"stylesheet\"/>";
			return $ssbuttons;
		}



		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function StyleSheetMenu($basepath)
		{
			$ssmenu = "<link href=\"" . $basepath . "content/menu.css\" type=\"text/css\" rel=\"stylesheet\"/>";
			return $ssmenu;
		}



		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function JQuery($basepath)
		{
			$jq = "<script type=\"text/javascript\" src=\"" . $basepath . "scripts/jquery-1.9.0.min.js\"></script>";
			return $jq;
		}



		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function JQueryUICSS($basepath)
		{
			$ssmenu = "<link href=\"" . $basepath . "content/themes/ui-lightness/jquery-ui.min.css\" type=\"text/css\" rel=\"stylesheet\"/>";
			return $ssmenu;
		}



		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function JQueryUI($basepath)
		{
			$jqui = "<script type=\"text/javascript\" src=\"" . $basepath . "scripts/jquery-ui-1.10.4.min.js\"></script>";
			return $jqui;
		}



		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function JQueryValidate($basepath)
		{
			$jqv = "<script type=\"text/javascript\" src=\"" . $basepath . "scripts/jquery.validate.min.js\"></script>";
			return $jqv;
		}



		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function JSCommon($basepath)
		{
			$jqc = "<script type=\"text/javascript\" src=\"" . $basepath . "content/scripts/common.js\"></script>";
			return $jqc;
		}



		///*****************************************************************
		///<summary>
		///Method Name: IncludeScript
		///Description: Include Script
		///</summary>
		///*****************************************************************

		public static function JSBlockUI($basepath)
		{
			$jqb = "<script type=\"text/javascript\" src=\"" . $basepath . "content/scripts/blockui.js\"></script>";
			return $jqb;
			
		}

		///*****************************************************************
		///<summary>
		///Method Name: EditFormScript
		///Description: Edit Form Script
		///</summary>
		///*****************************************************************
		
		public static function ImageFormScript($contextname)
		{
			$script = '<script type="text/javascript">';
			$script .= '$(document).ready(function () {';
			$script .= '$(\'#' . $contextname . 'EditForm\').validate();';
			$script .= '$(\'#' . $contextname . 'EditForm\').keypress(function (e) {';
			$script .= 'if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {';
			$script .= 'SubmitImage(\'' . $contextname . '\');';
			$script .= '}';
			$script .= '});';
			$script .= '$(\'#' . $contextname . 'EditForm\').submit(function (event) {';
			$script .= 'event.preventDefault();';
			$script .= 'SubmitImage(\'' . $contextname . '\');';
			$script .= '});';
			$script .= '});';
			$script .= '</script>';
			return $script;
		}

        ///*****************************************************************
        ///<summary>
        ///Method Name: EditFormScript
        ///Description: Edit Form Script
        ///</summary>
        ///*****************************************************************

        public static function EditFormScript($contextname)
        {
            $script = '<script type="text/javascript">';
            $script .= '$(document).ready(function () {';
            $script .= '$(\'#' . $contextname . 'EditForm\').validate();';
            $script .= '$(\'#' . $contextname . 'EditForm\').keypress(function (e) {';
            $script .= 'if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {';
            $script .= 'SubmitCE(\'' . $contextname . '\');';
            $script .= '}';
            $script .= '});';
            $script .= '$(\'#' . $contextname . 'EditForm\').submit(function (event) {';
            $script .= 'event.preventDefault();';
            $script .= 'SubmitCE(\'' . $contextname . '\');';
            $script .= '});';
            $script .= '});';
            $script .= '</script>';
            return $script;
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: EditFormScript
        ///Description: Edit Form Script
        ///</summary>
        ///*****************************************************************
        
        public static function EditFormScriptSettings($contextname)
        {
        	$script = '<script type="text/javascript">';
        	$script .= '$(document).ready(function () {';
        	//$script .= '$(\'#' . $contextname . 'EditForm\').validate();';
        	$script .= '$(\'#' . $contextname . 'EditForm\').keypress(function (e) {';
        	$script .= 'if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {';
        	$script .= 'SubmitSettings(\'' . $contextname . '\');';
        	$script .= '}';
        	$script .= '});';
        	$script .= '$(\'#' . $contextname . 'EditForm\').submit(function (event) {';
        	$script .= 'event.preventDefault();';
        	$script .= 'SubmitSettings(\'' . $contextname . '\');';
        	$script .= '});';
        	$script .= '});';
        	$script .= '</script>';
        	return $script;
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: EditFormScript
        ///Description: Edit Form Script
        ///</summary>
        ///*****************************************************************

        public static function SearchFormScript($contextname)
        {
            $script .= '<script type="text/javascript">';
            $script .= '$(document).ready(function () {';
            $script .= '$(\'#' . $contextname . 'SearchForm\').keypress(function (e) {';
            $script .= 'if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {';
            $script .= 'SubmitForm(\'' . $contextname . '\');';
            $script .= '}';
            $script .= '});';
            $script .= '$(\'#' . $contextname . 'SearchForm\').submit(function (event) {';
            $script .= 'event.preventDefault();';
            $script .= 'SubmitForm(\'' . $contextname . '\');';
            $script .= '});';
            $script .= '});';
            $script .= '</script>';
            return $script;
        }

        ///*****************************************************************
        ///<summary>
        ///Method Name: EditFormScript
        ///Description: Edit Form Script
        ///</summary>
        ///*****************************************************************

        public static function WizardFormScript($contextname)
        {
            $script = '<script type="text/javascript">';
            $script .= '$(document).ready(function () {';
            $script .= '$(\'#' . $contextname . 'EditForm\').validate();';
            $script .= '$(\'#' . $contextname . 'EditForm\').submit(function (event) {';
            $script .= 'event.preventDefault();';
            $script .= 'WizSubmit(\'' . $contextname . '\');';
            $script .= '});';
            $script .= '});';
            $script .= '</script>';
            return $script;
        }




        ///*****************************************************************
        ///<summary>
        ///Method Name: EditFormScriptSimple
        ///Description: Edit Form Script
        ///</summary>
        ///*****************************************************************

        public static function EditFormScriptSimple($contextname)
        {
            $script = '<script type=\"text/javascript\">';
            $script .= '$(document).ready(function () {';
            $script .= '$(\'#' . $contextname . 'EditForm\').validate();';
            $script .= '$(\'#' . $contextname . 'EditForm\').submit(function (event) {';
            $script .= 'event.preventDefault();';
            $script .= 'SubmitCE(\'' . $contextname . '\');';
            $script .= '});';
            $script .= '});';
            $script .= '</script>';
            return $script;
        }




		
	}
?>
