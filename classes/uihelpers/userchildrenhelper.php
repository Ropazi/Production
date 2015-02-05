<?php 
	include_once("classes/utils/commonutils.php");
	include_once("classes/domain/userchildren.php");
	include_once("classes/utils/constants.php");
	///*****************************************************************
	///<summary>
	///Class Name: UserChildrenHelper
	///Description: UserChildrenHelper utils
	///</summary>
	///*****************************************************************

	class UserChildrenHelper
	{


		
        
        ///*****************************************************************
        ///<summary>
        ///Method Name: getChildren
        ///Description: getChildren
        ///</summary>
        ///*****************************************************************

        public static function getChildren($userChildren)
        {
        	$rVal = '';
        	$mask = '';
        	if ($userChildren != NULL && sizeof($userChildren) > 0) {
        		$rVal .= '<input type="hidden" name="childrenCount" id="childrenCount" value="' . sizeof($userChildren) . '" />';
        	}
        	else {
        		$rVal .= '<input type="hidden" name="childrenCount" id="childrenCount" value="1" />';
        	}
        	$rVal .= '<table id="childrenTable">';
        	$i = 1;
        	if ($userChildren != NULL && sizeof($userChildren) > 0) {
	        	foreach($userChildren as $userChild) {
		        	$rVal .= '<tr>';
		        	$rVal .= '<td class="children-col1">';
		        	$rVal .= '<span>' . $i . '.</span>';
		        	$rVal .= '</td>';
		        	$rVal .= '<td class="children-col2">';
		        	$rVal .= '<input type="hidden" name="UserChildrenID' . $i . '" value="' . $userChild->getUserChildrenID() . '" />';
		        	$rVal .= '<select name="gender' . $i . '" id="gender' . $i . '" class="custom-arrow-dropdown">';
		        	if ($userChild->getGender() == "Male"){
		        		$rVal .= '<option value="Male" selected>Male</option>';
		        	}
		        	else {
		        		$rVal .= '<option value="Female" selected>Female</option>';
		        	}
		        	$rVal .= '</select>';
		        	$rVal .= '</td>';
		        	$rVal .= '<td class="children-col3">';
		        	$rVal .= '<input type="text" name="dateOfBirth' . $i .'" id="dateOfBirth' . $i .'"  value="' . $userChild->getDateOfBirth() . '" onfocus="javascript:$(this).mask(\'99/99/9999\');" onchange="javascript:calculateAge($(this).val(), \'' . $i . '\');" />';
		        	$rVal .= '</td>';
		        	$rVal .= '<td>';
		        	$rVal .= '<input class="center-text" type="text" name="displayAge' . $i .'" id="displayAge' . $i .'" value="' . $userChild->getDisplayAge() . '" />';
		        	$rVal .= '</td>';
		        	$rVal .= '</tr>';
		        	$mask .= '$("#dateOfBirth' . $i . '").mask("99/99/9999");';
		        	$i++;
	        	}
        	}
        	else {
        		$rVal .= '<tr>';
        		$rVal .= '<td class="children-col1">';
        		$rVal .= '<span>' . $i . '.</span>';
        		$rVal .= '</td>';
        		$rVal .= '<td class="children-col2">';
        		$rVal .= '<input type="hidden" name="UserChildrenID' . $i . '" value="0" />';
        		$rVal .= '<select  name="gender' . $i . '" id="gender' . $i . '" class="custom-arrow-dropdown">';
        		$rVal .= '<option value="Gender" selected="selected">Gender</option>';
        		$rVal .= '<option value="Male">Male</option>';
        		$rVal .= '<option value="Female">Female</option>';
        		$rVal .= '</select>';
        		$rVal .= '</td>';
        		$rVal .= '<td class="children-col3">';
        		$rVal .= '<input type="text" name="dateOfBirth' . $i .'" id="dateOfBirth' . $i .'"   value="" onfocus="javascript:$(this).mask(\'99/99/9999\');" onchange="javascript:calculateAge($(this).val(), \'' . $i . '\');" />';
        		$rVal .= '</td>';
        		$rVal .= '<td>';
        		$rVal .= '<input class="center-text" name="displayAge' . $i .'" id="displayAge' . $i .'" type="text" value="0yr 0mo" />';
        		$rVal .= '</td>';
        		$rVal .= '</tr>';
        		$mask .= '$("#dateOfBirth' . $i . '").watermark("Birthday 00/00/0000");';
        	}
        	
        	$rVal .= '</table>';
        	$script = '<script type="text/javascript">' . $mask . '</script>';
        	$rVal .= $script;
        	return $rVal;
        }
		
	}
?>