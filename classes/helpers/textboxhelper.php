<?php



	///*****************************************************************
	///<summary>
	///Class Name: TextBoxHelper
	///Description: TextBoxHelper Class
	///</summary>
	///*****************************************************************

	class TextBoxHelper
	{
		
		
		public static function TextBox($name, $id, $css, $width, $type, $maxLength, $value)
		{
			if (strpos($name, "ssword") > 0){
				return "<input type=\"password\" name=\"" . $name . "\" id=\"" . $id . "\" class=\"" . $css . "\" style=\"width:" . $width . "px;\" maxlength=\"" . $maxLength . "\" value=\"" . $value . "\" />";
			}
			else {
				return "<input type=\"text\" name=\"" . $name . "\" id=\"" . $id . "\" class=\"" . $css . "\" style=\"width:" . $width . "px;\" maxlength=\"" . $maxLength . "\" value=\"" . $value . "\" />";
			}
			
		}
		public static function TextBox2($basePath, $name, $id, $css, $width, $type, $maxLength, $value, $icon)
		{
			if (strpos($name, "ssword") > 0){
				return "<input type=\"password\" name=\"" . $name . "\" id=\"" . $id . "\" class=\"" . $css . "\" style=\"width:" . $width . "px;padding-left:30px;background-image:url('". $basePath . "content/images/" . $icon . "');background-repeat:no-repeat;background-position:5px 6px;\" maxlength=\"" . $maxLength . "\" value=\"" . $value . "\" />";
			}
			else {
				return "<input type=\"text\" name=\"" . $name . "\" id=\"" . $id . "\" class=\"" . $css . "\" style=\"width:" . $width . "px;padding-left:30px;background-image:url('". $basePath . "content/images/" . $icon . "');background-repeat:no-repeat;background-position:5px 12px;\" maxlength=\"" . $maxLength . "\" value=\"" . $value . "\" />";
			}
				
		}

		public static function TextArea($name, $css, $cols, $rows, $value)
		{
			return "<textarea name=\"". $name . "\" id=\"" . $name . "\" class=\"" . $css . "\" cols=\"" . $cols . "\" rows=\"" . $rows . "\">" . $value . "</textarea>";
		}
        
	}
?>
