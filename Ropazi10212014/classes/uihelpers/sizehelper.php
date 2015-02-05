<?php 
	include_once("classes/utils/commonutils.php");
	include_once("classes/domain/size.php");
	include_once("classes/business/sizebo.php");
	include_once("classes/utils/constants.php");
	///*****************************************************************
	///<summary>
	///Class Name: SizeHelper
	///Description: SizeHelper utils
	///</summary>
	///*****************************************************************

	class SizeHelper
	{


		
        
        ///*****************************************************************
        ///<summary>
        ///Method Name: getSizes
        ///Description: getSizes
        ///</summary>
        ///*****************************************************************

        public static function getSizes()
        {
        	$rVal = '<li style="cursor:pointer;" onclick="javascript:$(\'#hdnSize\').val(\'\');$(\'#displaySize\').text(\'---\');">---</li>';
        	$sizeBO = new SizeBO(NULL);
        	$sizes = $sizeBO->SelectAllSize();
        	foreach($sizes as $size){
        		$rVal .= '<li style="cursor:pointer;" onclick="javascript:$(\'#hdnSize\').val(\'' . $size->getSizeName() . '\');$(\'#displaySize\').text(\'' . $size->getSizeName() . '\');">' . $size->getSizeName() . '</li>';
        	}
        	return $rVal;
           
        }
		
	}
?>