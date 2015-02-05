<?php 


	///*****************************************************************
	///<summary>
	///Class Name: DropDownHelper
	///Description: DropDownHelper Class
	///</summary>
	///*****************************************************************

	class DropDownHelper
	{


		public static function DropDown($name, $css, $width, $options, $empty, $value)
		{
			$html = "";
			$html .= "<select name=\"". $name . "\" id=\"" . $name . "\" class=\"" . $css . "\" style=\"width:" . $width . "px;\">";
			if ($empty == TRUE)
			{
				$html .= "<option value=\"\">---Select---</option>";
			}
			$optionlist = explode(';', $options);
			foreach ($optionlist as $option)
			{
                
                    if ($option == $value)
                    {
                        $html .= "<option value=\"" . $option . "\" selected>" . $option . "</option>";
                    }
                    else
                    {
                        $html .= "<option value=\"" . $option . "\">" . $option . "</option>";
                    }
			}
			$html .= "</select>";
			return $html;
		}

		public static function StateDropDown($selectedState){
			$rVal = "";
			$states = array("", "AK","AL",	"AR",	"AZ",	"CA",	"CO",	"CT",	"DC",	"DE",	"FL",	"GA",	"HI",	"IA",	"ID",	"IL",	"IN",	"KS",	"KY",	"LA",	"MA",	"MD",	"ME",	"MI",	"MN",	"MO",	"MS",	"MT",	"NC",	"ND",	"NE",	"NH",	"NJ",	"NM",	"NV",	"NY",	"OH",	"OK",	"OR",	"PA",	"RI",	"SC",	"SD",	"TN",	"TX",	"UT",	"VA",	"VT",	"WA",	"WI",	"WV",	"WY");
				
			$rVal .= '<select name="State" class="custom-arrow-dropdown">';
			foreach($states as $state){
				if ($state == $selectedState){
					$rVal .= '<option value="'. $state . '" selected="selected">' . $state . '</option>';
				}
				else {
					$rVal .= '<option value="'. $state . '">' . $state . '</option>';
				}
			}
			$rVal .= '</select>';
			
			return $rVal;
		}

		
	}
?>
