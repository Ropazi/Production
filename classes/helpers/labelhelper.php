<?php



	///*****************************************************************
	///<summary>
	///Class Name: LabelHelper
	///Description: LabelHelper Class
	///</summary>
	///*****************************************************************

	class LabelHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: Label
		///Description: Label
		///</summary>
		///*****************************************************************

		public static function Label($name, $css, $value)
		{
			return "<span id=\"" . $name . "\" class=\"" . $css . "\">" . $value . "</span>";
		}
        

		///*****************************************************************
		///<summary>
		///Method Name: DateLabel
		///Description: DateLabel
		///</summary>
		///*****************************************************************

		public static function DateLabel($name, $css, $val)
		{
			
			return "<span id=\"" . $name . "\" class=\"" . $css . "\">" . date('d/m/y H:i:s',$val) . "</span>";
		}


		///*****************************************************************
		///<summary>
		///Method Name: ShortDateLabel
		///Description: ShortDateLabel
		///</summary>
		///*****************************************************************

		public static function ShortDateLabel($name, $css, $val)
		{
			return "<span id=\"" . $name . "\" class=\"" . $css . "\">" . date('d/m/y',$val) . "</span>";
		}


		///*****************************************************************
		///<summary>
		///Method Name: DateLabelForGrid
		///Description: DateLabelForGrid
		///</summary>
		///*****************************************************************

		public static function DateLabelForGrid($val)
		{
			return date('d/m/y',$val);
		}


		///*****************************************************************
		///<summary>
		///Method Name: ShortDateLabelForGrid
		///Description: ShortDateLabelForGrid
		///</summary>
		///*****************************************************************

		public static function ShortDateLabelForGrid($val)
		{
			return $val;
		}

		///*****************************************************************
		///<summary>
		///Method Name: ShortDateLabelForGrid
		///Description: ShortDateLabelForGrid
		///</summary>
		///*****************************************************************
		
		public static function EmailText($val)
		{
			return $val;
		}
		///*****************************************************************
		///<summary>
		///Method Name: ImageLabelForGrid
		///Description: Boolean field label
		///</summary>
		///*****************************************************************

		public static function ImageLabelForGrid($val, $basePath)
		{
			if ($val == true)
			{
				return "<img src=\"" . $basePath + "Content/Images/yes.png\" title=\"" . $val . "\" />";
			}
			return "";
		}


		
	}
?>
